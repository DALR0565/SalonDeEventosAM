<?php

namespace App\Policies;

use App\Models\Cliente;
use App\Models\Evento;
//use App\Models\Usuario;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Foundation\Auth\User as Usuario;
use Illuminate\Auth\Access\Response;


class EventoPolicy
{
    use HandlesAuthorization;
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
    public function view(Usuario $usuario, Evento $evento): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Usuario $usuario): bool
    {
        if($usuario instanceof Cliente){
            return true;
        }
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Usuario $usuario, Evento $evento): bool
    {
        if($usuario instanceof Cliente && $usuario->id == $evento->cliente_id){
            if($evento->confirmacion == "Pendiente"){
                return true;
            }
        }
        return false;
    }

    public function updateImagenes(Usuario $usuario, Evento $evento):bool
    {
        if($usuario instanceof Cliente && $usuario->id == $evento->cliente_id){
            if($evento->confirmacion == "Confirmado"){
                return true;
            }
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Usuario $usuario, Evento $evento): bool
    {
        if($usuario instanceof Cliente && $usuario->id == $evento->cliente_id){
            if($evento->confirmacion == "Pendiente"){
                return true;
            }
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Usuario $usuario, Evento $evento): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Usuario $usuario, Evento $evento): bool
    {
        //
    }
}
