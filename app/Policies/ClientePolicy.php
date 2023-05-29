<?php

namespace App\Policies;

use App\Models\Cliente;
use App\Models\Gerente;
//use App\Models\Usuario;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Foundation\Auth\User as Usuario;
use Illuminate\Auth\Access\Response;

class ClientePolicy
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
    public function view(Usuario $usuario, Cliente $cliente): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Usuario $usuario): bool
    {
        return $usuario instanceof Gerente;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Usuario $usuario, Cliente $cliente): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Usuario $usuario, Cliente $cliente): bool
    {
        if($usuario instanceof Gerente && ($cliente->eventos->count() > 0)){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Usuario $usuario, Cliente $cliente): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Usuario $usuario, Cliente $cliente): bool
    {
        //
    }
}
