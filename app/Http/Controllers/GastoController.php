<?php

namespace App\Http\Controllers;

use App\Models\Gasto;
use App\Http\Requests\StoreGastoRequest;
use App\Http\Requests\UpdateGastoRequest;

class GastoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gasto = Gasto::all();
        return view('gastos.index',compact('gasto'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('gastos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGastoRequest $request)
    {
        $gasto = new Gasto();
        $gasto->cantidad = $request->input('cantidad');
        $gasto->descripcion = $request->input('descripcion');
        $gasto->save();
        return redirect(route('gastos.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Gasto $gasto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gasto $gasto)
    {
        return view('gastos.edit', compact('gasto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGastoRequest $request, Gasto $gasto)
    {
        $gasto->cantidad = $request->input('cantidad');
        $gasto->descripcion = $request->input('descripcion');
        $gasto->save();
        return redirect(route('gastos.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gasto $gasto)
    {
        $gasto->delete();
        return redirect(route('gastos.index'));
    }
}
