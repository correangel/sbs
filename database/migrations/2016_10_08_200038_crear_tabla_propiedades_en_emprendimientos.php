<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPropiedadesEnEmprendimientos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propiedades_emprendimientos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('emprendimiento');
            $table->integer('propiedad');
            $table->integer('estado');          //FK-estados
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('propiedades_emprendimientos');
    }
}
