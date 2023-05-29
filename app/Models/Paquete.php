<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Paquete extends Model
{
    public function eventos(){
        return $this->hasMany('App\Models\Evento');
    }
    
    use HasFactory;
    
}
