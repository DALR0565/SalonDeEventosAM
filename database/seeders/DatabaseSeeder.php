<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        //Se inserta datos primero en las entidades fuertes.
        $this->call(PaqueteSeeder::class);
        $this->call(ServicioSeeder::class);
        //$this->call(UsuarioSeeder::class);
        $this->call(ClienteSeeder::class);
        $this->call(GerenteSeeder::class);
        $this->call(EventoSeeder::class);
        $this->call(AbonoSeeder::class);
        $this->call(GastoSeeder::class);
    }
}
