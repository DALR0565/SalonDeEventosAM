<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Gerente;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{

    public function login(){
        return view('Login.login');
    }

    public function validarUsuario(Request $request){
        //Obtenemos el usuario y contrasena
        
        $correo= $request->input('correo');
        $clave= $request->input('clave');
        $usuarioEncontrado = Cliente::where('correo',$correo)->first();

        if(is_null($usuarioEncontrado)){
            $usuarioEncontrado = Gerente::where('correo',$correo)->first();
            if(is_null($usuarioEncontrado)){
                $usuarioEncontrado = Empleado::where('correo',$correo)->first();
                if(is_null($usuarioEncontrado)){
                    $error = "Error:\nUsuario no existe";
                    return view('Login.login')->with('error',$error);
                    //USUARIO NO EXISTE
                }else{
                    $claveEmpleado = $usuarioEncontrado->clave;
                    $coincide = Hash::check($clave,$claveEmpleado);
                    if($coincide){
                        Auth::guard('guard_empleado')->login( $usuarioEncontrado );
                        $_SESSION['AuthGuard']= 'guard_empleado';
                        return redirect(route('abonos.index'));
                    }else{
                        $error = "Error:\nContrasena no coincide";
                        return view('Login.login')->with('error',$error);
                        //Retornar que la contrasena no coincide
                    } 
                }
            }else{
                $claveGerente = $usuarioEncontrado->clave;
                $coincide = Hash::check($clave,$claveGerente);
                if($coincide){
                    Auth::guard('guard_gerente')->login( $usuarioEncontrado );
                    $_SESSION['AuthGuard']= 'guard_gerente';
                    return redirect(route('clientes.index'));
                }else{
                    $error = "Error:\nContrasena no coincide";
                        return view('Login.login')->with('error',$error);
                    //Retornar que la contrasena no coincide
                } 
            }
        }else{
            $claveCliente = $usuarioEncontrado->clave;
            $coincide = Hash::check($clave,$claveCliente);
            if($coincide){
                Auth::guard('guard_cliente')->login( $usuarioEncontrado );
                $_SESSION['AuthGuard']= 'guard_cliente';
                return redirect(route('inicio'));
            }else{
                $error = "Error:\nContrasena no coincide";
                return view('Login.login')->with('error',$error);
                //Retornar que la contrasena no coincide
            } 
        }
    }



    public function cerrarSesion(){
        Auth::logout();
        Session::flush();
        return redirect('/');
    }
}
