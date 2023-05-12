<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Http\Requests\StoreEventoRequest;
use App\Http\Requests\UpdateEventoRequest;
use App\Models\Servicio;
use Illuminate\Support\Facades\Auth;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eventos = Evento::all();
        return view('Empleado.gerenteEventos',compact('eventos'));
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
        $evento->confirmacion = "Pendiente";
        $evento->detalles = $request->input('detalles');
        $evento->paquete_id = $request->input('paquete_id');
        $evento->usuario_id = Auth::user()->id;
        
        $evento->save();

        //Llenamos la tabla de paquete eventos.
        
        $arrayID = $request->input('servicio_id');
        $evento->servicio()->attach($arrayID);
        
        return redirect(route('eventos.index'));
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
        //Lo que queramos mantener su valor simplemente lo comentamos
        $evento->nombre = $request->input('nombre');
        $evento->fecha = $request->input('fecha');
        $evento->hora_de_inicio = $request->input('hora_de_inicio');
        $evento->hora_de_cierre = $request->input('hora_de_cierre');
        $evento->numero_de_invitados = $request->input('numero_de_invitados');
        //$evento->confirmacion = "Pendiente"; Mantiene su valor
        $evento->detalles = $request->input('detalles');
        $evento->paquete_id = $request->input('paquete_id');
        //$evento->usuario_id = Auth::user()->id; Mantiene su valor
        $evento->save();

        //Primero eliminamos los servicios que se tienen actualmente
        foreach($evento->servicio as $servicio){
            $evento->servicio()->detach($servicio->id);
        }
        //Despues se colocan los nuevos servicios
        $arrayID = $request->input('servicio_id');
        $evento->servicio()->attach($arrayID);

        return redirect(route('eventos.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evento $evento)
    {
        $evento->delete();
        return redirect(route('eventos.index'));
    }
}
