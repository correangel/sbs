<?php

use Illuminate\Database\Seeder;

class propiedades_tiposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\propiedades_tipos::create(['descripcion' => 'Departamento']);
        \App\propiedades_tipos::create(['descripcion' => 'PH']);
        \App\propiedades_tipos::create(['descripcion' => 'Oficina']);
        \App\propiedades_tipos::create(['descripcion' => 'Cochera']);
    }
}
