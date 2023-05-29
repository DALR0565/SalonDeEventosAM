<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Gerente;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
                    return redirect()->back();
                    //USUARIO NO EXISTE
                }else{
                    $claveEmpleado = $usuarioEncontrado->clave;
                    $coincide = Hash::check($clave,$claveEmpleado);
                    if($coincide){
                        Auth::guard('guard_empleado')->login( $usuarioEncontrado );
                        $_SESSION['AuthGuard']= 'guard_empleado';
                        return redirect(route('empleados.index'));
                    }else{
                        return redirect()->back();
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
                    return redirect()->back();
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
                return redirect()->back();
                //Retornar que la contrasena no coincide
            } 
        }
    }



    public function cerrarSesion(){
        Auth::logout();
        return redirect('/');
    }
}
