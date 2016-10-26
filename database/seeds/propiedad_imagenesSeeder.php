<?php

use Illuminate\Database\Seeder;

class propiedad_imagenesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\propiedad_imagenes::create([
            'propiedad' => 1,
            'nombre_archivo' => '14768864284.jpg',
            'rol' => 'P',
            'orden' => 0,
        ]);
        \App\propiedad_imagenes::create([
            'propiedad' => 1,
            'nombre_archivo' => '14768864281.jpg',
            'rol' => 'L',
            'orden' => 1,
        ]);
        \App\propiedad_imagenes::create([
            'propiedad' => 1,
            'nombre_archivo' => '14768864285.jpg',
            'rol' => 'L',
            'orden' => 2,
        ]);
    }
}
