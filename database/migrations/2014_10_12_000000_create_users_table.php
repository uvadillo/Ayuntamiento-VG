<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Trabajador;
use App\Models\Obra;
use Illuminate\Support\Facades\Hash;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            //Datos login
            $table->string("email")->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string("password");

            //Datos personales
            $table->string("name");
            $table->string("surname");
            $table->string("dni")->unique();
            $table->string("phone")->nullable();            
            $table->date("birthdate")->nullable();

            //Rol
            $table->enum("role",["solicitante","coordinador","tecnico"])->default("solicitante");

            //Direccion
            $table->string("place_of_birth")->nullable();
            $table->string("postal_code")->nullable();
            $table->string("street_name")->nullable();
            $table->string("number")->nullable();
            $table->string("floor")->nullable();
            $table->string("door")->nullable();
            $table->string("city")->nullable();
            $table->string("province")->nullable();

            //Otros
            $table->rememberToken();
            $table->timestamps();

        });
        
            //Crear usuarios
            Trabajador::create([
                'email' => "admin@admin.com",
                'password' => Hash::make("Jm12345"),
                'name' => "Admin",
                'surname' => "Admin",
                'dni' => "Admin",
                'role' => "coordinador",
            ]);

            User::create([
                'email' => "user@user.com",
                'password' => Hash::make("Jm12345"),
                'phone' => "626307478",
                'name' => "User",
                'surname' => "User",
                'dni' => "User",
                'birthdate' => "2020-05-05",
                'place_of_birth' => "Miranda",
                'postal_code' => "09200",
                'street_name' => "Olarizu",
                'number' => "3",
                'floor' => "3",
                'door' => "D",
                'city' => "Miranda",
                'province' => "Burgos"
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
