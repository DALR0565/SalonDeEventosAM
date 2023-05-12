<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Evento extends Model
{
    use HasFactory;
    public function paquete(){
        return $this->belongsTo('App\Models\Paquete');
    }
    
    public function servicio(){
        return $this->belongsToMany('App\Models\Servicio');
    }

    public function usuario(){
        return $this->belongsTo('App\Models\Usuario');
    }

    public function existe($array,$id){
        foreach($array as $elemento){
            if($elemento->id == $id){
                return true;
            }
        }
        return false;
    }
}
