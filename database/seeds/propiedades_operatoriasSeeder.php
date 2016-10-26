<?php

use Illuminate\Database\Seeder;

class propiedades_operatoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\propiedades_operatoria::create([
            'operatoria' => 1,      // Venta
            'propiedad' => 1,
            'importe' => rand(40000, 180000),
            'moneda' => 2,          // Dolar
            'estado' => 1           // Activo
        ]);
        \App\propiedades_operatoria::create([
            'operatoria' => 2,      // Alquiler
            'propiedad' => 1,
            'importe' => rand(40000, 180000),
            'moneda' => 1,          // Peso
            'estado' => 1           // Activo
        ]);

        \App\propiedades_operatoria::create([
            'operatoria' => 1,      // Venta
            'propiedad' => 2,
            'importe' => rand(40000, 180000),
            'moneda' => 2,          // Dolar
            'estado' => 1           // Activo
        ]);
        \App\propiedades_operatoria::create([
            'operatoria' => 1,      // Venta
            'propiedad' => 3,
            'importe' => rand(40000, 180000),
            'moneda' => 2,          // Dolar
            'estado' => 1           // Activo
        ]);
        \App\propiedades_operatoria::create([
            'operatoria' => 1,      // Venta
            'propiedad' => 4,
            'importe' => rand(40000, 180000),
            'moneda' => 2,          // Dolar
            'estado' => 1           // Activo
        ]);
        \App\propiedades_operatoria::create([
            'operatoria' => 1,      // Venta
            'propiedad' => 5,
            'importe' => rand(40000, 180000),
            'moneda' => 2,          // Dolar
            'estado' => 1           // Activo
        ]);
        \App\propiedades_operatoria::create([
            'operatoria' => 1,      // Venta
            'propiedad' => 6,
            'importe' => rand(40000, 180000),
            'moneda' => 2,          // Dolar
            'estado' => 1           // Activo
        ]);
        \App\propiedades_operatoria::create([
            'operatoria' => 1,      // Venta
            'propiedad' => 7,
            'importe' => rand(40000, 180000),
            'moneda' => 2,          // Dolar
            'estado' => 1           // Activo
        ]);
        \App\propiedades_operatoria::create([
            'operatoria' => 1,      // Venta
            'propiedad' => 8,
            'importe' => rand(40000, 180000),
            'moneda' => 2,          // Dolar
            'estado' => 1           // Activo
        ]);
        \App\propiedades_operatoria::create([
            'operatoria' => 1,      // Venta
            'propiedad' => 9,
            'importe' => rand(40000, 180000),
            'moneda' => 2,          // Dolar
            'estado' => 1           // Activo
        ]);
        \App\propiedades_operatoria::create([
            'operatoria' => 1,      // Venta
            'propiedad' => 10,
            'importe' => rand(40000, 180000),
            'moneda' => 2,          // Dolar
            'estado' => 1           // Activo
        ]);
    }
}
