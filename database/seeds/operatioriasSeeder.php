<?php

use Illuminate\Database\Seeder;

class operatioriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\operatorias::create(['descripcion' => 'Venta']);
        \App\operatorias::create(['descripcion' => 'Alquiler']);
    }
}
