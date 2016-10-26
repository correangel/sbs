<?php

use Illuminate\Database\Seeder;
use App\estados;

class estadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        estados::create(['descripcion' => 'Activo']);
        estados::create(['descripcion' => 'Suspendido']);
        estados::create(['descripcion' => 'Baja']);
        estados::create(['descripcion' => 'Reservado']);
        estados::create(['descripcion' => 'Vendido']);
        estados::create(['descripcion' => 'Alquilado']);
    }
}
