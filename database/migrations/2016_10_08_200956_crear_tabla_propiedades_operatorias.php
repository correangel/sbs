<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPropiedadesOperatorias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propiedades_operatorias', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('operatoria');  // FK-operatorias
            $table->integer('propiedad');   // FK-propiedades
            $table->float('importe');
            $table->integer('moneda');      // FK-monedas
            $table->integer('estado');      // FK-estados
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
        Schema::dropIfExists('propiedades_operatorias');
    }
}
