<?php

namespace Database\Seeders;

use App\Models\Evento;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now=Carbon::now();

        $evento = new Evento();
        $evento->nombre = "Fiesta de Miguel";
        $evento->fecha = $now->format('Y-m-d');
        $evento->hora_de_inicio = $now->format('H:i');
        $evento->hora_de_cierre = $now->format('H:i');;
        $evento->numero_de_invitados = 5;
        $evento->confirmacion = 'Pendiente'; ///Checar el tipo de dato y cambiarlo
        $evento->detalles = "Esta es la fiesta de miguel";
        $evento->paquete_id = 1;
        $evento->usuario_id = 2;
        $evento->save();

        $evento = new Evento();
        $evento->nombre = "Fiesta de Kevin";
        $evento->fecha = $now->format('Y-m-d');
        $evento->hora_de_inicio = $now->format('H:i');
        $evento->hora_de_cierre = $now->format('H:i');;
        $evento->numero_de_invitados = 12;
        $evento->confirmacion = 'Confirmado';
        $evento->detalles = "";
        $evento->paquete_id = 1;
        $evento->usuario_id = 2;
        $evento->save();

        $evento = new Evento();
        $evento->nombre = "Fiesta de Many";
        $evento->fecha = $now->format('Y-m-d');
        $evento->hora_de_inicio = $now->format('H:i');
        $evento->hora_de_cierre = $now->format('H:i');;
        $evento->numero_de_invitados = 13;
        $evento->confirmacion = 'Confirmado';
        $evento->detalles = "";
        $evento->paquete_id = 2;
        $evento->usuario_id = 3;
        $evento->save();

        $evento = new Evento();
        $evento->nombre = "Fiesta de Daniel";
        $evento->fecha = $now->format('Y-m-d');
        $evento->hora_de_inicio = $now->format('H:i');
        $evento->hora_de_cierre = $now->format('H:i');;
        $evento->numero_de_invitados = 10;
        $evento->confirmacion = 'Pendiente';
        $evento->detalles = "";
        $evento->paquete_id = 2;
        $evento->usuario_id = 4;
        $evento->save();

        $evento = new Evento();
        $evento->nombre = "Fiesta de Jorge";
        $evento->fecha = $now->format('Y-m-d');
        $evento->hora_de_inicio = $now->format('H:i');
        $evento->hora_de_cierre = $now->format('H:i');;
        $evento->numero_de_invitados = 9;
        $evento->confirmacion = 'Confirmado';
        $evento->detalles = "";
        $evento->paquete_id = 3;
        $evento->usuario_id = 4;
        $evento->save();

        $evento = new Evento();
        $evento->nombre = "Fiesta de Geovanny";
        $evento->fecha = $now->format('Y-m-d');
        $evento->hora_de_inicio = $now->format('H:i');
        $evento->hora_de_cierre = $now->format('H:i');;
        $evento->numero_de_invitados = 8;
        $evento->confirmacion = 'Pendiente';
        $evento->detalles = "";
        $evento->paquete_id = 3;
        $evento->usuario_id = 2;
        $evento->save();

        $evento = new Evento();
        $evento->nombre = "Fiesta de Angel";
        $evento->fecha = $now->format('Y-m-d');
        $evento->hora_de_inicio = $now->format('H:i');
        $evento->hora_de_cierre = $now->format('H:i');;
        $evento->numero_de_invitados = 7;
        $evento->confirmacion = 'Pendiente';
        $evento->detalles = "";
        $evento->paquete_id = 4;
        $evento->usuario_id = 2;
        $evento->save();

        $evento = new Evento();
        $evento->nombre = "Fiesta de Leonardo";
        $evento->fecha = $now->format('Y-m-d');
        $evento->hora_de_inicio = $now->format('H:i');
        $evento->hora_de_cierre = $now->format('H:i');;
        $evento->numero_de_invitados = 9;
        $evento->confirmacion = 'Confirmado';
        $evento->detalles = "";
        $evento->paquete_id = 4;
        $evento->usuario_id = 3;
        $evento->save();

        $evento = new Evento();
        $evento->nombre = "Fiesta del jueves";
        $evento->fecha = $now->format('Y-m-d');
        $evento->hora_de_inicio = $now->format('H:i');
        $evento->hora_de_cierre = $now->format('H:i');;
        $evento->numero_de_invitados = 11;
        $evento->confirmacion = 'Confirmado';
        $evento->detalles = "";
        $evento->paquete_id = 1;
        $evento->usuario_id = 2;
        $evento->save();

        $evento = new Evento();
        $evento->nombre = "Fiesta de Omar";
        $evento->fecha = $now->format('Y-m-d');
        $evento->hora_de_inicio = $now->format('H:i');
        $evento->hora_de_cierre = $now->format('H:i');;
        $evento->numero_de_invitados = 10;
        $evento->confirmacion = 'Pendiente';
        $evento->detalles = "";
        $evento->paquete_id = 1;
        $evento->usuario_id = 3;
        $evento->save();

    }
}
