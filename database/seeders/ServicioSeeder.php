<?php

namespace Database\Seeders;

use App\Models\Servicio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $servicio = new Servicio();
        $servicio->nombre = "Mantelería";
        $servicio->precio = 800;
        $servicio->detalles = "Este es el servicio de mantelería";
        $servicio->save();

        $servicio = new Servicio();
        $servicio->nombre = "Meseros";
        $servicio->precio = 1500;
        $servicio->detalles = "Este es el servicio de meseros";
        $servicio->save();

        $servicio = new Servicio();
        $servicio->nombre = "Aire Acondicionado";
        $servicio->precio = 500;
        $servicio->detalles = "Este es el servicio de aire acondicionado";
        $servicio->save();
    }
}
