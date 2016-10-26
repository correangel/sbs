<?php

use Illuminate\Database\Seeder;

class emprendimientos_estado_avancesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\emprendimientos_estado_avances::create(['descripcion' => 'No iniciado']);
        \App\emprendimientos_estado_avances::create(['descripcion' => 'Iniciado']);
        \App\emprendimientos_estado_avances::create(['descripcion' => 'Finalizado']);
    }
}
