tipo_construcciones<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\TipoObra;

class CreateTiposObrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipos_obras', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->timestamps();
        });

        TipoObra::create([
            "name" => "Demolicion",
        ]);
        TipoObra::create([
            "name" => "Reforma",
        ]);
        TipoObra::create([
            "name" => "Construccion",
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipos_obras');
    }
}
