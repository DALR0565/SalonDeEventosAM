<?php

namespace App\Policies;

use App\Models\Cliente;
use App\Models\Evento;
use App\Models\Foto;
//use App\Models\Usuario;
use Illuminate\Foundation\Auth\User as Usuario;
use Illuminate\Auth\Access\Response;

class FotoPolicy
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
    public function view(Usuario $usuario, Foto $foto): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Usuario $usuario): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Usuario $usuario, Foto $foto): bool
    {
        $evento = Evento::find($foto->evento_id);
        if(!empty($evento)){
            if($usuario->id == $evento->cliente_id){
                if($evento->confirmacion == "Confirmado"){
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Usuario $usuario, Foto $foto): bool
    {
        $evento = Evento::find($foto->evento_id);
        if(!empty($evento)){
            if($usuario->id == $evento->cliente_id){
                if($evento->confirmacion == "Confirmado"){
                    return true;
                }
            }
        }
        
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Usuario $usuario, Foto $foto): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Usuario $usuario, Foto $foto): bool
    {
        //
    }
}
