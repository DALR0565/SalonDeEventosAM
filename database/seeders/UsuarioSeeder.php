<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuario = new Usuario();
        $usuario->nombres = "Carlos";
        $usuario->apellidos = "";
        $usuario->edad = 25;
        $usuario->sexo = "H";
        $usuario->correo = "carlos@gmail.com";
        $usuario->clave = '$2y$10$ScBU0RysDhZMp7iE0IhW/unOKDOUR.94TRmgN6hCNTKHoE5V8YZ0i';
        $usuario->telefono = "";
        $usuario->rol = "Gerente";
        $usuario->save();

        $usuario = new Usuario();
        $usuario->nombres = "Hugo";
        $usuario->apellidos = "";
        $usuario->edad = 22;
        $usuario->sexo = "H";
        $usuario->correo = "hugo@gmail.com";
        $usuario->clave = '$2y$10$ScBU0RysDhZMp7iE0IhW/unOKDOUR.94TRmgN6hCNTKHoE5V8YZ0i';
        $usuario->telefono = "";
        $usuario->save();

        $usuario = new Usuario();
        $usuario->nombres = "Paco";
        $usuario->apellidos = "";
        $usuario->edad = 28;
        $usuario->sexo = "H";
        $usuario->correo = "paco@gmail.com";
        $usuario->clave = '$2y$10$ScBU0RysDhZMp7iE0IhW/unOKDOUR.94TRmgN6hCNTKHoE5V8YZ0i';
        $usuario->telefono = "";
        $usuario->save();

        $usuario = new Usuario();
        $usuario->nombres = "Luis";
        $usuario->apellidos = "";
        $usuario->edad = 20;
        $usuario->sexo = "H";
        $usuario->correo = "luis@gmail.com";
        $usuario->clave = '$2y$10$ScBU0RysDhZMp7iE0IhW/unOKDOUR.94TRmgN6hCNTKHoE5V8YZ0i';
        $usuario->telefono = "";
        $usuario->save();
    }
}
