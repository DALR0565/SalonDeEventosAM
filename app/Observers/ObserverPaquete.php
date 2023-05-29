<?php

namespace App\Observers;

use App\Models\Bitacora;
use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Gerente;
use App\Models\Paquete;
use Illuminate\Support\Facades\Auth;

class ObserverPaquete
{
    /**
     * Handle the Paquete "created" event.
     */
    public function created(Paquete $paquete): void
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
        $aviso->accion="se creo el paquete: ".$paquete->nombre;
        $aviso->save();

    }

    /**
     * Handle the Paquete "updated" event.
     */
    public function updated(Paquete $paquete): void
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
        $aviso->accion="se actualizo el paquete: ".$paquete->nombre;
        $aviso->save();
    }

    /**
     * Handle the Paquete "deleted" event.
     */
    public function deleted(Paquete $paquete): void
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
        $aviso->accion="se elimino el paquete: ".$paquete->nombre;
        $aviso->save();
    }

    /**
     * Handle the Paquete "restored" event.
     */
    public function restored(Paquete $paquete): void
    {
        //
    }

    /**
     * Handle the Paquete "force deleted" event.
     */
    public function forceDeleted(Paquete $paquete): void
    {
        //
    }
}
