<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        
        //----- DATOS MAESTROS -----------------
        $this->call(estadosSeeder::class);
        $this->call(operatioriasSeeder::class);
        $this->call(monedasSeeder::class);
        $this->call(estados_inmueblesSeeder::class);
        $this->call(emprendimientos_estado_avancesSeeder::class);
        $this->call(caracteristicasSeeder::class);
        $this->call(serviciosSeeder::class);
        $this->call(propiedades_tiposSeeder::class);
        $this->call(ambientes_tiposSeeder::class);
        
        //----- CREACION DE REGISTROS PARA TEST (COMENTAR) -----------------
        /*
        $this->call(propiedadesSeeder::class);
        $this->call(propiedad_imagenesSeeder::class);
        $this->call(propiedades_operatoriasSeeder::class);
        */
    }
}
