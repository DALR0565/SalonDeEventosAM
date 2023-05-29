<?php

namespace App\Observers;

use App\Models\Bitacora;
use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Gerente;
use App\Models\Servicio;
use Illuminate\Support\Facades\Auth;

class ObserverServicio
{
    /**
     * Handle the Servicio "created" event.
     */
    public function created(Servicio $servicio): void
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
        $aviso->accion="se creo el servicio: ".$servicio->nombre;
        $aviso->save();
    }

    /**
     * Handle the Servicio "updated" event.
     */
    public function updated(Servicio $servicio): void
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
        $aviso->accion="se actualizo el servicio: ".$servicio->nombre;
        $aviso->save();
    }

    /**
     * Handle the Servicio "deleted" event.
     */
    public function deleted(Servicio $servicio): void
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
        $aviso->accion="se elimino el servicio: ".$servicio->nombre;
        $aviso->save();
    }

    /**
     * Handle the Servicio "restored" event.
     */
    public function restored(Servicio $servicio): void
    {
        //
    }

    /**
     * Handle the Servicio "force deleted" event.
     */
    public function forceDeleted(Servicio $servicio): void
    {
        //
    }
}
