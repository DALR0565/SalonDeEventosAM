<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abono extends Model
{
    use HasFactory;
    public function gerente(){
        return $this->belongsTo('App\Models\Gerente','gerente_id', 'id');
    }

    public function empleado(){
        return $this->belongsTo('App\Models\Empleado','empleado_id','id');
    }


    public function evento(){
        return $this->belongsTo('App\Models\Evento','evento_id','id');
    }
}
