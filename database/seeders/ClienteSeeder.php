<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cliente = new Cliente();
        $cliente->nombres = "Hugo";
        $cliente->apellidos = "";
        $cliente->edad = 22;
        $cliente->sexo = "H";
        $cliente->correo = "hugo@gmail.com";
        $cliente->clave = '$2y$10$ScBU0RysDhZMp7iE0IhW/unOKDOUR.94TRmgN6hCNTKHoE5V8YZ0i';
        $cliente->telefono = "";
        $cliente->save();

        $cliente = new Cliente();
        $cliente->nombres = "Paco";
        $cliente->apellidos = "";
        $cliente->edad = 28;
        $cliente->sexo = "H";
        $cliente->correo = "paco@gmail.com";
        $cliente->clave = '$2y$10$ScBU0RysDhZMp7iE0IhW/unOKDOUR.94TRmgN6hCNTKHoE5V8YZ0i';
        $cliente->telefono = "";
        $cliente->save();

        $cliente = new Cliente();
        $cliente->nombres = "Luis";
        $cliente->apellidos = "";
        $cliente->edad = 20;
        $cliente->sexo = "H";
        $cliente->correo = "luis@gmail.com";
        $cliente->clave = '$2y$10$ScBU0RysDhZMp7iE0IhW/unOKDOUR.94TRmgN6hCNTKHoE5V8YZ0i';
        $cliente->telefono = "";
        $cliente->save();

    }
}
