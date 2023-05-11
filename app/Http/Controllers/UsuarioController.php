<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = Usuario::all();
        return view('Empleado.gerenteUsuarios',compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUsuarioRequest $request)
    {
        $usuario = new Usuario();
        $usuario->nombres = $request->input('nombres');
        $usuario->apellidos = $request->input('apellidos');
        $usuario->edad = $request->input('edad');
        $usuario->sexo = $request->input('sexo');
        $usuario->correo = $request->input('correo');
        $usuario->clave = Hash::make($request->input('clave'));
        $usuario->telefono = $request->input('telefono');
        $usuario->save();
        $usuarioEncontrado = Usuario::where('correo',$usuario->correo)->first();
        //Se crea la session
        Auth::guard('guard_usuario')->login($usuarioEncontrado);
        $_SESSION['AuthGuard']= 'guard_usuario';
        if($usuario->rol == "Gerente"){
            return redirect(route('usuarios.index'));
        }else{
            return redirect(route('inicio'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        return view('usuarios.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUsuarioRequest $request, Usuario $usuario)
    {
        $usuario->nombres = $request->input('nombres');
        $usuario->apellidos = $request->input('apellidos');
        $usuario->edad = $request->input('edad');
        $usuario->sexo = $request->input('sexo');
        $usuario->correo = $request->input('correo');
        $usuario->clave = Hash::make($request->input('clave'));
        $usuario->telefono = $request->input('telefono');
        $usuario->save();
        return redirect(route('usuarios.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return redirect(route('usuarios.index'));
    }
}
