<?php

namespace Database\Seeders;

use App\Models\Paquete;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class PaqueteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $paquete = new Paquete();
        $paquete->nombre = "Bodas";
        $paquete->descripcion = "Este es el paquete de Bodas";
        $paquete->precio = 3500;
        $paquete->imagen = "boda.jpg";
        $paquete->gerente_id = 1;
        $paquete->save();

        $paquete = new Paquete();
        $paquete->nombre = "XV años";
        $paquete->descripcion = "Este es el paquete de XV años";
        $paquete->precio = 2500;
        $paquete->imagen = "xv.jpg";
        $paquete->gerente_id = 1;
        $paquete->save();

        $paquete = new Paquete();
        $paquete->nombre = "Fiesta infantil";
        $paquete->descripcion = "Este es el paquete de Fiesta infantil";
        $paquete->precio = 1800;
        $paquete->imagen = "fiestainfantil.jpg";
        $paquete->gerente_id = 1;
        $paquete->save();

        $paquete = new Paquete();
        $paquete->nombre = "Bautizos";
        $paquete->descripcion = "Este es el paquete de Bautizos";
        $paquete->precio = 2000;
        $paquete->imagen = "bautizo.jpg";
        $paquete->gerente_id = 1;
        $paquete->save();

    }
}
