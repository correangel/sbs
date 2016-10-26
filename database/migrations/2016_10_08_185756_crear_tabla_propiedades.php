<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPropiedades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propiedades', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('estado_inmueble');              // FK-Nuevo, Usado
            $table->date('fecha_publicacion');
            $table->float('expensas'); 
            $table->integer('habitaciones');
            $table->integer('ambientes');
            $table->integer('toilette');
            $table->integer('banos');
            $table->integer('cocheras');
            $table->integer('antiguedad');
            $table->integer('superficie_total');
            $table->integer('superficie_cubierta');
            $table->integer('propiedad_servicios')->nullable();         //FK
            $table->integer('propiedad_caracteristicas')->nullable();   //FK- Ejemplo apto profesional, credito, mascotas
            $table->mediumText('ubicacion')->nullable();
            $table->mediumText('ubicacion_url')->nullable();            // GoogleMaps
            $table->mediumText('localidad')->nullable();
            $table->string('titulo');
            $table->mediumText('descripcion_corta')->nullable();
            $table->text('descripcion')->nullable();
            $table->integer('tipo_propiedad');      // FK-Depto, PH, Oficina
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
        Schema::dropIfExists('propiedades');
    }
}
