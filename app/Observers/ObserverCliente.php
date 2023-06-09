<?php

namespace App\Observers;

use App\Models\Bitacora;
use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Gerente;
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
        $aviso->accion="se creo el cliente: ".$cliente->nombres;
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
        $aviso->accion="se actualizo el cliente: ".$cliente->nombres;
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
            $aviso->usuario = Auth::user()->nombres;
            if(Auth::user() instanceof Gerente){
                $aviso->rol="Gerente";
            }else if(Auth::user() instanceof Cliente){
                $aviso->rol="Cliente";
            }else if(Auth::user() instanceof Empleado){
                $aviso->rol="Empleado";
            }
        }
        $aviso->accion="se elimino el cliente: ".$cliente->nombres;
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
