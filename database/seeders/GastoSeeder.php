<?php

namespace Database\Seeders;

use App\Models\Gasto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GastoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gasto = new Gasto();
        $gasto->cantidad = 100;
        $gasto->descripcion = "Cobro de refrescos";
        $gasto->gerente_id = 1;
        $gasto->evento_id = 2;
        $gasto->save();
        //
        $gasto = new Gasto();
        $gasto->cantidad = 100;
        $gasto->descripcion = "Cobro de comida";
        $gasto->gerente_id = 1;
        $gasto->evento_id = 3; 
        $gasto->save();
        //
        $gasto = new Gasto();
        $gasto->cantidad = 100;
        $gasto->descripcion = "Cobro de mesa";
        $gasto->gerente_id = 1;
        $gasto->evento_id = 5; 
        $gasto->save();
        //
        $gasto = new Gasto();
        $gasto->cantidad = 100;
        $gasto->descripcion = "Cobro de cena";
        $gasto->gerente_id = 1;
        $gasto->evento_id = 8; 
        $gasto->save();
    }
}
