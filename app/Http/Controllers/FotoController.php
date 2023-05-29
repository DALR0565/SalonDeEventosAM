<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Evento;
use App\Http\Requests\StoreFotoRequest;
use App\Http\Requests\UpdateFotoRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Evento $evento)
    {
        return view('eventos.foto.index',compact('evento'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Evento $evento)
    {
        return view('eventos.foto.create',compact('evento'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFotoRequest $request, Evento $evento)
    {
        //$this->authorize('create',Foto::class);
        if ($request->hasFile('imagenes')) {
            $imagenes = $request->file('imagenes');
    
            foreach ($imagenes as $archivo) {
                //$archivo = $request->file('imagen');
                $nombreDelArchivo = $archivo->getClientOriginalName();
                $imagen = Storage::disk('publico')->putFileAs('',$archivo,$nombreDelArchivo);
                $foto = new Foto();
                $foto->imagen = $imagen;
                $foto->descripcion = $request->input('descripcion');
                $foto->evento_id = $evento->id;
                $foto->save();
            }
        }
        return view('eventos.foto.index', compact('evento'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Evento $evento, Foto $foto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evento $evento, Foto $foto)
    {
        return view('eventos.foto.edit', compact('foto','evento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFotoRequest $request, Evento $evento, Foto $foto)
    {
        if ($request->hasFile('imagenes')) {
            $imagenes = $request->file('imagenes');
    
            foreach ($imagenes as $archivo) {
                //$archivo = $request->file('imagen');
                $nombreDelArchivo = $archivo->getClientOriginalName();
                $imagen = Storage::disk('publico')->putFileAs('',$archivo,$nombreDelArchivo);
                $foto->imagen = $imagen;
                $foto->descripcion = $request->input('descripcion');
                $foto->evento_id = $evento->id;
                $foto->save();
            }
        }
        return redirect()->route('eventos.fotos.index', $evento->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evento $evento, Foto $foto)
    {
        $this->authorize('delete', $foto);
        Storage::disk('publico')->delete(asset("imagenes/$foto->imagen"));
        $foto->delete();
        return redirect()->route('eventos.fotos.index', $evento->id);
    }
}
