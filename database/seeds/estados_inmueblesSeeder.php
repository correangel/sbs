<?php

use Illuminate\Database\Seeder;

class estados_inmueblesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\estados_inmuebles::create(['descripcion' => 'Nuevo']);
        \App\estados_inmuebles::create(['descripcion' => 'Usado']);
    }
}
