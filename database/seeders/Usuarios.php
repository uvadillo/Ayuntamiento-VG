<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Obra;

class Usuarios extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
        ->count(4)
        ->state([
            "role" => "coordinador"
        ])
        ->create();

        User::factory()
        ->count(6)
        ->state([
            "role" => "tecnico"
        ])
        ->create();

        User::factory()
        ->count(10)
        ->state([
            "role" => "solicitante"
        ])
        ->has(
            Obra::factory()
            ->count(2)
            )
        ->create();
    }
}
