<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    public function eventos(){
        return $this->belongsTo('App\Models\Evento','evento_id', 'id');
    }
    use HasFactory;
}
