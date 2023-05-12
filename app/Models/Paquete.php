<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Paquete extends Model
{
    public function evento(){
        return $this->HasMany('App\Models\Evento');
    }

    /*public function servicio(){
        return $this->belongsToMany('App\Models\Servicio');
    }*/
    
    use HasFactory;
    
}
