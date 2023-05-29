<?php

namespace App\Http\Controllers;

use App\Models\Abono;
use App\Http\Requests\StoreAbonoRequest;
use App\Http\Requests\UpdateAbonoRequest;
use App\Models\Empleado;
use App\Models\Gerente;
use Illuminate\Support\Facades\Auth;

class AbonoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abono = Abono::all();
        return view('abonos.index',compact('abono'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('abonos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAbonoRequest $request)
    {
        $abono = new Abono();
        $abono->cantidad = $request->input('cantidad');
        $abono->descripcion = $request->input('descripcion');
        $abono->evento_id = $request->input('evento_id');
        if(Auth::user() instanceof Gerente){
            $abono->gerente_id = Auth::user()->id;
        }else if(Auth::user() instanceof Empleado){
            $abono->empleado_id = Auth::user()->id;
        }
        
        $abono->save();
        return redirect(route('abonos.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Abono $abono)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Abono $abono)
    {
        return view('abonos.edit', compact('abono'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAbonoRequest $request, Abono $abono)
    {
        $abono->cantidad = $request->input('cantidad');
        $abono->descripcion = $request->input('descripcion');
        $abono->save();

        return redirect(route('abonos.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Abono $abono)
    {
        $abono->delete();
        return redirect(route('abonos.index'));
    }
}
