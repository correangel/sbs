<?php

use Illuminate\Database\Seeder;

class ambientes_tiposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\ambientes_tipos::create(['descripcion' => 'Hall']);
        \App\ambientes_tipos::create(['descripcion' => 'Lavadero']);
        \App\ambientes_tipos::create(['descripcion' => 'Balcon']);
        \App\ambientes_tipos::create(['descripcion' => 'Ascensor']);
    }
}
