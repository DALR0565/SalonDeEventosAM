<?php

namespace Database\Seeders;

use App\Models\Paquete;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
        $paquete->precio = 150;
        $paquete->save();

        $paquete = new Paquete();
        $paquete->nombre = "XV años";
        $paquete->descripcion = "Este es el paquete de XV años";
        $paquete->precio = 250;
        $paquete->save();

        $paquete = new Paquete();
        $paquete->nombre = "Fiesta infantil";
        $paquete->descripcion = "Este es el paquete de Fiesta infantil";
        $paquete->precio = 120;
        $paquete->save();

        $paquete = new Paquete();
        $paquete->nombre = "Bautizos";
        $paquete->descripcion = "Este es el paquete de Bautizos";
        $paquete->precio = 320;
        $paquete->save();

    }
}
