<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;
    public function paquetes(){
        return $this->belongsTo('App\Models\Paquete');
    }
    
    public function servicios(){
        return $this->belongsToMany('App\Models\Servicio');
    }

    public function usuarios(){
        return $this->belongsTo('App\Models\Usuario');
    }

    public function clientes(){
        return $this->belongsTo('App\Models\Cliente');
    }

    public function fotos(){
        return $this->HasMany('App\Models\Foto');
    }

    public function abonos(){
        return $this->hasMany('App\Models\Abono');
    }

    public function es_contratado($serviciosContratados,$idServicio){
        foreach($serviciosContratados as $servicioContratado){
            if($servicioContratado->id == $idServicio){
                return true;
            }
        }
        return false;
    }
}
