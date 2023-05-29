<?php

namespace Database\Seeders;

use App\Models\Abono;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AbonoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $abono = new Abono();
        $abono->cantidad = 500;
        $abono->descripcion = "Se abono al evento";
        $abono->gerente_id = 1;
        //$abono->empleado_id = 0;
        $abono->evento_id = 2;
        $abono->save();

        $abono = new Abono();
        $abono->cantidad = 500;
        $abono->descripcion = "Se abono al evento";
        $abono->gerente_id = 1;
        //$abono->empleado_id = 0;
        $abono->evento_id = 2;
        $abono->save();

        //////////
        $abono = new Abono();
        $abono->cantidad = 300;
        $abono->descripcion = "Se abono al evento";
        $abono->gerente_id = 1;
        //$abono->empleado_id = 1;
        $abono->evento_id = 3;
        $abono->save();

        $abono = new Abono();
        $abono->cantidad = 400;
        $abono->descripcion = "Se abono al evento";
        $abono->gerente_id = 1;
        //$abono->empleado_id = 1;
        $abono->evento_id = 3;
        $abono->save();
        ///////////
        $abono = new Abono();
        $abono->cantidad = 100;
        $abono->descripcion = "Se abono al evento";
        $abono->gerente_id = 1;
        //$abono->empleado_id = 1;
        $abono->evento_id = 5;
        $abono->save();

        $abono = new Abono();
        $abono->cantidad = 200;
        $abono->descripcion = "Se abono al evento";
        $abono->gerente_id = 1;
        //$abono->empleado_id = 1;
        $abono->evento_id = 5;
        $abono->save();
        ///////////
        $abono = new Abono();
        $abono->cantidad = 700;
        $abono->descripcion = "Se abono al evento";
        $abono->gerente_id = 1;
        //$abono->empleado_id = 1;
        $abono->evento_id = 8;
        $abono->save();

        $abono = new Abono();
        $abono->cantidad = 200;
        $abono->descripcion = "Se abono al evento";
        $abono->gerente_id = 1;
        //$abono->empleado_id = 1;
        $abono->evento_id = 8;
        $abono->save();

    }
}
