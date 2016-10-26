<?php

use Illuminate\Database\Seeder;

class monedasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\monedas::create(['descripcion' => 'Pesos', 'unidad' => '$']);
        \App\monedas::create(['descripcion' => 'Dolares', 'unidad' => 'us$']);
    }
}
