<?php

namespace App\Http\Controllers;

use App\Models\Gerente;
use App\Http\Requests\StoreGerenteRequest;
use App\Http\Requests\UpdateGerenteRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GerenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gerentes = Gerente::all();
        return view('Gerente.gerenteGerentes',compact('gerentes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('gerentes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGerenteRequest $request)
    {
        $this->authorize('create');
        $gerente = new Gerente();
        $gerente->nombres = $request->input('nombres');
        $gerente->apellidos = $request->input('apellidos');
        $gerente->edad = $request->input('edad');
        $gerente->sexo = $request->input('sexo');
        $gerente->correo = $request->input('correo');
        $gerente->clave = Hash::make($request->input('clave'));
        $gerente->telefono = $request->input('telefono');
        $gerente->save();

        Auth::guard('guard_gerente')->login($gerente);
        $_SESSION['AuthGuard'] = 'guard_gerente';
        
        return redirect(route('inicio'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Gerente $gerente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gerente $gerente)
    {
        return view('gerentes.edit', compact('gerente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGerenteRequest $request, Gerente $gerente)
    {
        $gerente->nombres = $request->input('nombres');
        $gerente->apellidos = $request->input('apellidos');
        $gerente->edad = $request->input('edad');
        $gerente->sexo = $request->input('sexo');
        $gerente->correo = $request->input('correo');
        $gerente->clave = Hash::make($request->input('clave'));
        $gerente->telefono = $request->input('telefono');
        $gerente->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gerente $gerente)
    {
        $gerente->delete();
        return redirect(route('gerentes.index'));
    }
}
