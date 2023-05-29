<?php

namespace Database\Seeders;

use App\Models\Empleado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $empleado = new Empleado();
        $empleado->nombres = "Joaquin";
        $empleado->apellidos = "";
        $empleado->edad = 22;
        $empleado->sexo = "H";
        $empleado->correo = "joaquin@gmail.com";
        $empleado->clave = '$2y$10$ScBU0RysDhZMp7iE0IhW/unOKDOUR.94TRmgN6hCNTKHoE5V8YZ0i';
        $empleado->telefono = "";
        $empleado->save();
    }
}
