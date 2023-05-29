<?php

namespace App\Observers;

use App\Models\Bitacora;
use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Gerente;
use Illuminate\Support\Facades\Auth;

class ObserverGerente
{
    /**
     * Handle the Gerente "created" event.
     */
    public function created(Gerente $gerente): void
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
        $aviso->accion="se creo el gerente: ".$gerente->nombres;
        $aviso->save();

    }

    /**
     * Handle the Gerente "updated" event.
     */
    public function updated(Gerente $gerente): void
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
        $aviso->accion="se actualizo el gerente: ".$gerente->nombres;
        $aviso->save();
    }

    /**
     * Handle the Gerente "deleted" event.
     */
    public function deleted(Gerente $gerente): void
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
        $aviso->accion="se elimino el gerente: ".$gerente->nombres;
        $aviso->save();
    }

    /**
     * Handle the Gerente "restored" event.
     */
    public function restored(Gerente $gerente): void
    {
        //
    }

    /**
     * Handle the Gerente "force deleted" event.
     */
    public function forceDeleted(Gerente $gerente): void
    {
        //
    }
}
