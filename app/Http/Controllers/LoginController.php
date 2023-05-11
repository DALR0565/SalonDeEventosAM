<?php

namespace App\Http\Controllers;

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
        $usuarioEncontrado = Usuario::where('correo',$correo)->first();
        if( is_null($usuarioEncontrado) ){
            return redirect()->back();
        }else{
            $claveUsuario = $usuarioEncontrado->clave;
            $coincide = Hash::check($clave,$claveUsuario);
            if($coincide){
                Auth::guard('guard_usuario')->login($usuarioEncontrado);
                $_SESSION['AuthGuard']= 'guard_usuario';
                if($usuarioEncontrado->rol == "Gerente"){
                    return redirect(route('usuarios.index'));
                }else{
                    return redirect('/');                   
                }
            }
        }
        return redirect()->back()->with("Por favor verifique sus credenciales.");
    }

    public function cerrarSesion(){
        Auth::logout();
        return redirect('/');
    }
}
