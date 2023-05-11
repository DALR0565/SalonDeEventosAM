<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Http\Requests\StoreEventoRequest;
use App\Http\Requests\UpdateEventoRequest;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eventos = Evento::all();
        return view('Cliente.clienteEventos',compact('eventos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('eventos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventoRequest $request)
    {
        $evento = new Evento();
        $evento->nombre = $request->input('nombre');
        $evento->fecha = $request->input('fecha');
        $evento->hora_de_inicio = $request->input('hora_de_inicio');
        $evento->hora_de_cierre = $request->input('hora_de_cierre');
        $evento->numero_de_invitados = $request->input('numero_de_invitados');
        //$evento->confirmacion = $request->input('confirmacion');
        $evento->detalles = $request->input('detalles');
        $evento->paquete_id = $request->input('paquete_id');
        $evento->usuario_id = $request->input('usuario_id');
        $evento->save();
        return redirect(route('Cliente.clienteEventos'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Evento $evento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evento $evento)
    {
        return view('eventos.edit', compact('evento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventoRequest $request, Evento $evento)
    {
        $evento->nombre = $request->input('nombre');
        $evento->fecha = $request->input('fecha');
        $evento->hora_de_inicio = $request->input('hora_de_inicio');
        $evento->hora_de_cierre = $request->input('hora_de_cierre');
        $evento->numero_de_invitados = $request->input('numero_de_invitados');
        $evento->confirmacion = $request->input('confirmacion');
        $evento->paquete_id = $request->input('paquete_id');
        $evento->usuario_id = $request->input('usuario_id');
        $evento->save();
        return redirect(route('Cliente.clienteEventos'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evento $evento)
    {
        $evento->delete();
        return redirect(route('Cliente.clienteEventos'));
    }
}
