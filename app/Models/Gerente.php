<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Gerente extends Authenticatable
{
    use HasFactory;
    public function abonos(){
        return $this->hasMany('App\Models\Abono');
    }

    public function gastos(){
        return $this->hasMany('App\Models\Gasto');
    }

    public function paquetes(){
        return $this->hasMany('App\Models\Paquete');
    }

}
