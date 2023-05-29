<?php

namespace Database\Seeders;

use App\Models\Gerente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GerenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gerente = new Gerente();
        $gerente->nombres = "Carlos";
        $gerente->apellidos = "";
        $gerente->edad = 25;
        $gerente->sexo = "H";
        $gerente->correo = "carlos@gmail.com";
        $gerente->clave = '$2y$10$ScBU0RysDhZMp7iE0IhW/unOKDOUR.94TRmgN6hCNTKHoE5V8YZ0i';
        $gerente->telefono = "";
        $gerente->save();
    }
}
