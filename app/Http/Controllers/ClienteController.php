<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use App\Models\Gerente;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //No se usa clientes en la vista home
        $clientes = Cliente::all();
        return view('Gerente.gerenteClientes',compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClienteRequest $request)
    {
        $cliente = new Cliente();
        $cliente->nombres = $request->input('nombres');
        $cliente->apellidos = $request->input('apellidos');
        $cliente->edad = $request->input('edad');
        $cliente->sexo = $request->input('sexo');
        $cliente->correo = $request->input('correo');
        $cliente->clave = Hash::make($request->input('clave'));
        $cliente->telefono = $request->input('telefono');
        $cliente->save();
        //$usuarioEncontrado = Usuario::where('correo',$usuario->correo)->first();
        //Se crea la session
        if(Auth::guest()){
            Auth::guard('guard_cliente')->login($cliente);
            $_SESSION['AuthGuard']= 'guard_cliente';
            return redirect(route('inicio'));
        }else if(Auth::user() instanceof Gerente){
            return redirect(route('clientes.index'));
        }else{
            return redirect(route('abonos.index'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClienteRequest $request, Cliente $cliente)
    {
        $cliente->nombres = $request->input('nombres');
        $cliente->apellidos = $request->input('apellidos');
        $cliente->edad = $request->input('edad');
        $cliente->sexo = $request->input('sexo');
        $cliente->correo = $request->input('correo');
        $cliente->clave = Hash::make($request->input('clave'));
        $cliente->telefono = $request->input('telefono');
        /*if($request->input('rol') == 'Gerente'){

        }*/
        $cliente->save();

        return redirect(route('clientes.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect(route('clientes.index'));
    }
}
