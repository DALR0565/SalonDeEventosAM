<?php

namespace App\Policies;

use App\Models\Abono;
use App\Models\Empleado;
use App\Models\Evento;
use App\Models\Gerente;
//use App\Models\Usuario;
use Illuminate\Foundation\Auth\User as Usuario;
use Illuminate\Auth\Access\Response;

class AbonoPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Usuario $usuario): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Usuario $usuario, Abono $abono): bool
    {
        $eventos = $abono->eventos;
        if($usuario instanceof Empleado || $usuario instanceof Empleado){
            if($eventos->confirmacion == "Confirmado"){
                return true;
            }
        }
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Usuario $usuario, Evento $evento): bool
    {
        $abonos = $evento->abonos;
        if($usuario instanceof Gerente || $usuario instanceof Empleado){
            if($evento->confirmacion == "Confirmado"){
                $total = $evento->paquetes->precio;
                $servicios = $evento->servicios;
                if(!empty($servicios)){
                    foreach($servicios as $servicio){
                        $total = $total + $servicio->precio;
                    }
                }
                $abonado = 0;
                foreach($abonos as $abono){
                    $abonado = $abonado + $abono->cantidad;
                }
                return $total >= $abonado;
            }
        }
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Usuario $usuario, Abono $abono): bool
    {
        return $usuario instanceof Gerente;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Usuario $usuario, Abono $abono): bool
    {
        return $usuario instanceof Gerente;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Usuario $usuario, Abono $abono): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Usuario $usuario, Abono $abono): bool
    {
        //
    }
}
