<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => "admin@admin.com",
            'password' => Hash::make("Jm12345"),
            'phone' => "626307478",
            'name' => "Admin",
            'surname' => "Admin",
            'dni' => "Admin",
            //'role' => "coordinador",
            'birthdate' => "2020-05-05",
            'place_of_birth' => "Miranda",
            'postal_code' => "09200",
            'street_name' => "Olarizu",
            'number' => "3",
            'floor' => "3",
            'door' => "D",
            'city' => "Miranda",
        ]);
    }
}