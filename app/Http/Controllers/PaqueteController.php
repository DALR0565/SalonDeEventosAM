<?php

namespace App\Http\Controllers;

use App\Models\Paquete;
use App\Http\Requests\StorePaqueteRequest;
use App\Http\Requests\UpdatePaqueteRequest;
use Illuminate\Support\Facades\Storage;

class PaqueteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paquetes = Paquete::all();
        if(request()->expectsJson()){
            return response()->json($paquetes);

        }else{
            return view('Gerente.gerentePaquetes',compact('paquetes'));
        }
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('paquetes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePaqueteRequest $request)
    {
        $paquete = new Paquete();
        $paquete->nombre = $request->input('nombre');
        $paquete->descripcion = $request->input('descripcion');
        $paquete->precio = $request->input('precio');
        //Validacion de la imagen
        $request->validate([
            'imagen' => 'required|image|max:2048'
        ]);
        $archivo = $request->file('imagen');
        $nombreDelArchivo = $archivo->getClientOriginalName();
        $imagen = Storage::disk('publico')->putFileAs('',$archivo,$nombreDelArchivo);
        $paquete->imagen = $imagen;
        $paquete->save();
        return redirect(route('paquetes.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Paquete $paquete)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paquete $paquete)
    {
        return view('paquetes.edit', compact('paquete'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaqueteRequest $request, Paquete $paquete)
    {
        $this->authorize($paquete);
        $paquete->nombre = $request->input('nombre');
        $paquete->descripcion = $request->input('descripcion');
        $paquete->precio = $request->input('precio');
        
        $request->validate([
            'imagen' => 'required|image|max:2048'
        ]);
        $archivo = $request->file('imagen');
        $nombreDelArchivo = $archivo->getClientOriginalName();
        $imagen = Storage::disk('publico')->putFileAs('',$archivo,$nombreDelArchivo);
        $paquete->imagen = $imagen;
        $paquete->save();
        return redirect(route('paquetes.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paquete $paquete)
    {
        $this->authorize('delete',$paquete);
        $paquete->delete();
        return redirect(route('paquetes.index'));
    }
}
