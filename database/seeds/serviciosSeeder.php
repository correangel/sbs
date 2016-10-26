<?php

use Illuminate\Database\Seeder;

class serviciosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\servicios::create(['descripcion' => 'Agua corriente']);
        \App\servicios::create(['descripcion' => 'Luz']);
        \App\servicios::create(['descripcion' => 'Telefono']);
        \App\servicios::create(['descripcion' => 'Internet']);
    }
}
