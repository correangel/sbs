<?php

use Illuminate\Database\Seeder;

class caracteristicasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\caracteristicas::create(['descripcion' => 'Apto profesional']);
        \App\caracteristicas::create(['descripcion' => 'Apto credito']);
    }
}
