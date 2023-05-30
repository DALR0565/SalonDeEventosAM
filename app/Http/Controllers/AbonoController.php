<?php

namespace App\Http\Controllers;

use App\Models\Abono;
use App\Http\Requests\StoreAbonoRequest;
use App\Http\Requests\UpdateAbonoRequest;
use App\Models\Empleado;
use App\Models\Evento;
use App\Models\Gerente;
use Illuminate\Support\Facades\Auth;

class AbonoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Evento $evento)
    {
        //$abono = Abono::all();
        return view('eventos.abono.index',compact('evento'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Evento $evento)
    {
        return view('eventos.abono.create',compact('evento'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAbonoRequest $request, Evento $evento)
    {
        $this->authorize('create',[Abono::class, $evento]);
        $abono = new Abono();
        $abono->cantidad = $request->input('cantidad');
        $abono->descripcion = $request->input('descripcion');
        $abono->evento_id = $evento->id;
        if(Auth::user() instanceof Gerente){
            $abono->gerente_id = Auth::user()->id;
        }else if(Auth::user() instanceof Empleado){
            $abono->empleado_id = Auth::user()->id;
        }

        $total = $evento->paquetes->precio;
        $servicios = $evento->servicios;
        if(!empty($servicios)){
            foreach($servicios as $servicio){
                $total = $total + $servicio->precio;
            }
        }
        $abonado = 0;
        $abonos = $evento->abonos;
        foreach($abonos as $abonoUno){
            $abonado = $abonado + $abonoUno->cantidad;
        }
        $abonado = $abonado + $request->input('cantidad');
        if($total >= $abonado){
            $abono->save();
            return view('eventos.abono.index',compact('evento'));
        }else{
            $error = "Se ha excedido el limite permitido de abonos";
            return view('eventos.abono.index',compact('evento'))->with('error',$error);
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Evento $evento, Abono $abono)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evento $evento, Abono $abono)
    {
        return view('eventos.abono.edit', compact('abono,evento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAbonoRequest $request, Evento $evento, Abono $abono)
    {
        $this->authorize('update',$abono);
        $abono->cantidad = $request->input('cantidad');
        $abono->descripcion = $request->input('descripcion');
        $abono->save();

        return redirect()->route('eventos.abonos.index',$evento->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evento $evento, Abono $abono)
    {
        $this->authorize('delete',$abono);
        $abono->delete();
        return redirect()->route('eventos.abonos.index',$evento->id);
    }
}
