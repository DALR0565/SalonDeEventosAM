<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Servicio extends Model
{
    /*public function paquete(){
        return $this->belongsToMany('App\Models\Paquete');
    }*/

    public function eventos(){
        return $this->belongsToMany('App\Models\Evento','evento_servicio');
    }

    use HasFactory;
}
