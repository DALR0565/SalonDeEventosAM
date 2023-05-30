<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abono extends Model
{
    use HasFactory;
    public function gerentes(){
        return $this->belongsTo('App\Models\Gerente','gerente_id', 'id');
    }

    public function empleados(){
        return $this->belongsTo('App\Models\Empleado','empleado_id','id');
    }


    public function eventos(){
        return $this->belongsTo('App\Models\Evento','evento_id','id');
    }
}
