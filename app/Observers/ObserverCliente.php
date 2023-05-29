<?php

namespace App\Observers;

use App\Models\Bitacora;
use App\Models\Cliente;
use Illuminate\Support\Facades\Auth;

class ObserverCliente
{
    /**
     * Handle the Cliente "created" event.
     */
    public function created(Cliente $cliente): void
    {
        $aviso = new Bitacora();
        if(Auth::guest()){
            $aviso->usuario = "Seeder";
        }else{
            $aviso->usuario = Auth::user()->nombre;
        }
        $aviso->accion="se creo el evento";
        $aviso->rol="Cliente";
        $aviso->save();
    }

    /**
     * Handle the Cliente "updated" event.
     */
    public function updated(Cliente $cliente): void
    {
        $aviso = new Bitacora();
        if(Auth::guest()){
            $aviso->usuario = "Seeder";
        }else{
            $aviso->usuario = Auth::user()->nombre;
        }
        $aviso->accion="se actualizo el evento";
        $aviso->rol="Cliente";
        $aviso->save();
    }

    /**
     * Handle the Cliente "deleted" event.
     */
    public function deleted(Cliente $cliente): void
    {
        $aviso = new Bitacora();
        if(Auth::guest()){
            $aviso->usuario = "Seeder";
        }else{
            $aviso->usuario = Auth::user()->nombre;
        }
        $aviso->accion="se borro el evento";
        $aviso->rol="Cliente";
        $aviso->save();
    }

    /**
     * Handle the Cliente "restored" event.
     */
    public function restored(Cliente $cliente): void
    {
        //
    }

    /**
     * Handle the Cliente "force deleted" event.
     */
    public function forceDeleted(Cliente $cliente): void
    {
        //
    }
}
