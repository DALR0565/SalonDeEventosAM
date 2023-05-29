<?php

namespace App\Observers;

use App\Models\Bitacora;
use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Evento;
use App\Models\Gerente;
use Illuminate\Support\Facades\Auth;

class ObserverEvento
{
    /**
     * Handle the Evento "created" event.
     */
    public function created(Evento $evento): void
    {
        $aviso = new Bitacora();
        if(Auth::guest()){
            $aviso->usuario = "Seeder";
            $aviso->rol="Seeder";
        }else{
            $aviso->usuario = Auth::user()->nombres;
            if(Auth::user() instanceof Gerente){
                $aviso->rol="Gerente";
            }else if(Auth::user() instanceof Cliente){
                $aviso->rol="Cliente";
            }else if(Auth::user() instanceof Empleado){
                $aviso->rol="Empleado";
            }
        }
        $aviso->accion="se creo el evento: ".$evento->nombre;
        $aviso->save();
    }

    /**
     * Handle the Evento "updated" event.
     */
    public function updated(Evento $evento): void
    {
        $aviso = new Bitacora();
        if(Auth::guest()){
            $aviso->usuario = "Seeder";
        }else{
            $aviso->usuario = Auth::user()->nombres;
            if(Auth::user() instanceof Gerente){
                $aviso->rol="Gerente";
            }else if(Auth::user() instanceof Cliente){
                $aviso->rol="Cliente";
            }else if(Auth::user() instanceof Empleado){
                $aviso->rol="Empleado";
            }
        }
        $aviso->accion="se actualizo el evento: ".$evento->nombre;
        $aviso->save();
    }

    /**
     * Handle the Evento "deleted" event.
     */
    public function deleted(Evento $evento): void
    {
        $aviso = new Bitacora();
        if(Auth::guest()){
            $aviso->usuario = "Seeder";
        }else{
            $aviso->usuario = Auth::user()->nombres;
            if(Auth::user() instanceof Gerente){
                $aviso->rol="Gerente";
            }else if(Auth::user() instanceof Cliente){
                $aviso->rol="Cliente";
            }else if(Auth::user() instanceof Empleado){
                $aviso->rol="Empleado";
            }
        }
        $aviso->accion="se elimino el evento: ".$evento->nombre;
        $aviso->save();
    }

    /**
     * Handle the Evento "restored" event.
     */
    public function restored(Evento $evento): void
    {
        //
    }

    /**
     * Handle the Evento "force deleted" event.
     */
    public function forceDeleted(Evento $evento): void
    {
        //
    }
}
