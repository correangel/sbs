<?php

use Illuminate\Database\Seeder;

class propiedadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\propiedades::create([
            'estado_inmueble' => 1,              // FK-Nuevo => Usado
            'fecha_publicacion' => 'now()',
            'expensas' => rand(350, 2800),
            'habitaciones' => rand(1, 4),
            'ambientes' => rand(1, 4),
            'toilette' => 0,
            'banos' => rand(1, 2),
            'cocheras' => rand(0, 1),
            'antiguedad' => rand(10, 40),
            'superficie_total' => rand(56, 140),
            'superficie_cubierta' => rand(56, 140),
            'ubicacion' => 'Combatientes de Malvinas ' . rand(56, 5400) . ', CABA',
            'ubicacion_url' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3284.951802422815!2d-58.47761754948851!3d-34.5800860803697!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb66de6acc06f%3A0xc6e85bb9c3ed66be!2sCombatientes+de+Malvinas+3400%2C+C1431FTB+CABA!5e0!3m2!1ses-419!2sar!4v1476153392219" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>',            // GoogleMaps
            'localidad' => 'Villa Urquiza',
            'titulo' => 'Departamento 3 ambientes',
            'descripcion_corta' => 'Cómodo departamento estratégicamente ubicado. Un barrio joven y muy buscado. Super luminoso',
            'descripcion' => 'A solo 2 cuadras del subte "D" estación Congreso de Tucumán y menos de una cuadra de Av. Cabildo. Mucho sol => luz  => casi a estrenar!! Pisos nuevos de porcelanato => baño con ducha escocesa nuevo todo => cocina nueva sin uso => termotanque nuevo sin uso. Mesada nueva. Recién pintado. Listo para mudarse. Cocina separada con espacio para lavarropas => cocina y termotanque Puerta blindada.',
            'tipo_propiedad' => 1      // FK-Depto => PH => Oficina
        ]);
        /*
        \App\propiedades::create([
            'estado_inmueble' => 1,              // FK-Nuevo => Usado
            'fecha_publicacion' => 'now()',
            'expensas' => rand(350, 2800),
            'habitaciones' => rand(1, 4),
            'ambientes' => rand(1, 4),
            'toilette' => 0,
            'banos' => rand(1, 2),
            'cocheras' => 1,
            'antiguedad' => rand(10, 40),
            'superficie_total' => rand(56, 140),
            'superficie_cubierta' => rand(56, 140),
            'ubicacion' => '11 de Septiembre ' . rand(56, 5400) . ', CABA',
            'ubicacion_url' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3284.951802422815!2d-58.47761754948851!3d-34.5800860803697!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb66de6acc06f%3A0xc6e85bb9c3ed66be!2sCombatientes+de+Malvinas+3400%2C+C1431FTB+CABA!5e0!3m2!1ses-419!2sar!4v1476153392219" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>',            // GoogleMaps
            'localidad' => 'Villa Urquiza',
            'titulo' => 'Unico 2 amb mas escritorio',
            'descripcion_corta' => 'Cómodo departamento estratégicamente ubicado. Un barrio joven y muy buscado. Super luminoso',
            'descripcion' => 'A solo 2 cuadras del subte "D" estación Congreso de Tucumán y menos de una cuadra de Av. Cabildo. Mucho sol => luz  => casi a estrenar!! Pisos nuevos de porcelanato => baño con ducha escocesa nuevo todo => cocina nueva sin uso => termotanque nuevo sin uso. Mesada nueva. Recién pintado. Listo para mudarse. Cocina separada con espacio para lavarropas => cocina y termotanque Puerta blindada.',
            'tipo_propiedad' => 1      // FK-Depto => PH => Oficina
        ]);
        \App\propiedades::create([
            'estado_inmueble' => 1,              // FK-Nuevo => Usado
            'fecha_publicacion' => 'now()',
            'expensas' => rand(350, 2800),
            'habitaciones' => rand(1, 4),
            'ambientes' => rand(1, 4),
            'toilette' => 0,
            'banos' => rand(1, 2),
            'cocheras' => 1,
            'antiguedad' => rand(10, 40),
            'superficie_total' => rand(56, 140),
            'superficie_cubierta' => rand(56, 140),
            'ubicacion' => 'Av. Cabildo ' . rand(56, 5400) . ', CABA',
            'ubicacion_url' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3284.951802422815!2d-58.47761754948851!3d-34.5800860803697!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb66de6acc06f%3A0xc6e85bb9c3ed66be!2sCombatientes+de+Malvinas+3400%2C+C1431FTB+CABA!5e0!3m2!1ses-419!2sar!4v1476153392219" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>',            // GoogleMaps
            'localidad' => 'Villa Urquiza',
            'titulo' => 'Excelente duplex',
            'descripcion_corta' => 'Cómodo departamento estratégicamente ubicado. Un barrio joven y muy buscado. Super luminoso',
            'descripcion' => 'A solo 2 cuadras del subte "D" estación Congreso de Tucumán y menos de una cuadra de Av. Cabildo. Mucho sol => luz  => casi a estrenar!! Pisos nuevos de porcelanato => baño con ducha escocesa nuevo todo => cocina nueva sin uso => termotanque nuevo sin uso. Mesada nueva. Recién pintado. Listo para mudarse. Cocina separada con espacio para lavarropas => cocina y termotanque Puerta blindada.',
            'tipo_propiedad' => 1      // FK-Depto => PH => Oficina
        ]);
        \App\propiedades::create([
            'estado_inmueble' => 1,              // FK-Nuevo => Usado
            'fecha_publicacion' => 'now()',
            'expensas' => rand(350, 2800),
            'habitaciones' => rand(1, 4),
            'ambientes' => rand(1, 4),
            'toilette' => 0,
            'banos' => rand(1, 2),
            'cocheras' => 1,
            'antiguedad' => rand(10, 40),
            'superficie_total' => rand(56, 140),
            'superficie_cubierta' => rand(56, 140),
            'ubicacion' => 'Paso ' . rand(56, 5400) . ', CABA',
            'ubicacion_url' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3284.951802422815!2d-58.47761754948851!3d-34.5800860803697!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb66de6acc06f%3A0xc6e85bb9c3ed66be!2sCombatientes+de+Malvinas+3400%2C+C1431FTB+CABA!5e0!3m2!1ses-419!2sar!4v1476153392219" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>',            // GoogleMaps
            'localidad' => 'Villa Urquiza',
            'titulo' => 'Semipiso',
            'descripcion_corta' => 'Cómodo departamento estratégicamente ubicado. Un barrio joven y muy buscado. Super luminoso',
            'descripcion' => 'A solo 2 cuadras del subte "D" estación Congreso de Tucumán y menos de una cuadra de Av. Cabildo. Mucho sol => luz  => casi a estrenar!! Pisos nuevos de porcelanato => baño con ducha escocesa nuevo todo => cocina nueva sin uso => termotanque nuevo sin uso. Mesada nueva. Recién pintado. Listo para mudarse. Cocina separada con espacio para lavarropas => cocina y termotanque Puerta blindada.',
            'tipo_propiedad' => 1      // FK-Depto => PH => Oficina
        ]);
        \App\propiedades::create([
            'estado_inmueble' => 1,              // FK-Nuevo => Usado
            'fecha_publicacion' => 'now()',
            'expensas' => rand(350, 2800),
            'habitaciones' => rand(1, 4),
            'ambientes' => rand(1, 4),
            'toilette' => 0,
            'banos' => rand(1, 2),
            'cocheras' => 1,
            'antiguedad' => rand(10, 40),
            'superficie_total' => rand(56, 140),
            'superficie_cubierta' => rand(56, 140),
            'ubicacion' => 'Triunvirato ' . rand(56, 5400),
            'ubicacion_url' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3284.951802422815!2d-58.47761754948851!3d-34.5800860803697!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb66de6acc06f%3A0xc6e85bb9c3ed66be!2sCombatientes+de+Malvinas+3400%2C+C1431FTB+CABA!5e0!3m2!1ses-419!2sar!4v1476153392219" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>',            // GoogleMaps
            'localidad' => 'Villa Urquiza',
            'titulo' => 'Dueño vende departamento',
            'descripcion_corta' => 'Cómodo departamento estratégicamente ubicado. Un barrio joven y muy buscado. Super luminoso',
            'descripcion' => 'A solo 2 cuadras del subte "D" estación Congreso de Tucumán y menos de una cuadra de Av. Cabildo. Mucho sol => luz  => casi a estrenar!! Pisos nuevos de porcelanato => baño con ducha escocesa nuevo todo => cocina nueva sin uso => termotanque nuevo sin uso. Mesada nueva. Recién pintado. Listo para mudarse. Cocina separada con espacio para lavarropas => cocina y termotanque Puerta blindada.',
            'tipo_propiedad' => 1      // FK-Depto => PH => Oficina
        ]);
        \App\propiedades::create([
            'estado_inmueble' => 1,              // FK-Nuevo => Usado
            'fecha_publicacion' => 'now()',
            'expensas' => rand(350, 2800),
            'habitaciones' => rand(1, 4),
            'ambientes' => rand(1, 4),
            'toilette' => 0,
            'banos' => rand(1, 2),
            'cocheras' => 1,
            'antiguedad' => rand(10, 40),
            'superficie_total' => rand(56, 140),
            'superficie_cubierta' => rand(56, 140),
            'ubicacion' => 'Av. Gral Paz ' . rand(56, 5400) . ', CABA',
            'ubicacion_url' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3284.951802422815!2d-58.47761754948851!3d-34.5800860803697!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb66de6acc06f%3A0xc6e85bb9c3ed66be!2sCombatientes+de+Malvinas+3400%2C+C1431FTB+CABA!5e0!3m2!1ses-419!2sar!4v1476153392219" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>',            // GoogleMaps
            'localidad' => 'Villa Urquiza',
            'titulo' => 'PH 5 ambientes ent. indep.',
            'descripcion_corta' => 'Cómodo departamento estratégicamente ubicado. Un barrio joven y muy buscado. Super luminoso',
            'descripcion' => 'A solo 2 cuadras del subte "D" estación Congreso de Tucumán y menos de una cuadra de Av. Cabildo. Mucho sol => luz  => casi a estrenar!! Pisos nuevos de porcelanato => baño con ducha escocesa nuevo todo => cocina nueva sin uso => termotanque nuevo sin uso. Mesada nueva. Recién pintado. Listo para mudarse. Cocina separada con espacio para lavarropas => cocina y termotanque Puerta blindada.',
            'tipo_propiedad' => 1      // FK-Depto => PH => Oficina
        ]);
        \App\propiedades::create([
            'estado_inmueble' => 1,              // FK-Nuevo => Usado
            'fecha_publicacion' => 'now()',
            'expensas' => rand(350, 2800),
            'habitaciones' => rand(1, 4),
            'ambientes' => rand(1, 4),
            'toilette' => 0,
            'banos' => rand(1, 2),
            'cocheras' => 1,
            'antiguedad' => rand(10, 40),
            'superficie_total' => rand(56, 140),
            'superficie_cubierta' => rand(56, 140),
            'ubicacion' => 'Av. de Mayo ' . rand(56, 5400) . ', CABA',
            'ubicacion_url' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3284.951802422815!2d-58.47761754948851!3d-34.5800860803697!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb66de6acc06f%3A0xc6e85bb9c3ed66be!2sCombatientes+de+Malvinas+3400%2C+C1431FTB+CABA!5e0!3m2!1ses-419!2sar!4v1476153392219" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>',            // GoogleMaps
            'localidad' => 'Villa Urquiza',
            'titulo' => 'Departamento 3 ambientes',
            'descripcion_corta' => 'Cómodo departamento estratégicamente ubicado. Un barrio joven y muy buscado. Super luminoso',
            'descripcion' => 'A solo 2 cuadras del subte "D" estación Congreso de Tucumán y menos de una cuadra de Av. Cabildo. Mucho sol => luz  => casi a estrenar!! Pisos nuevos de porcelanato => baño con ducha escocesa nuevo todo => cocina nueva sin uso => termotanque nuevo sin uso. Mesada nueva. Recién pintado. Listo para mudarse. Cocina separada con espacio para lavarropas => cocina y termotanque Puerta blindada.',
            'tipo_propiedad' => 1      // FK-Depto => PH => Oficina
        ]);
        \App\propiedades::create([
            'estado_inmueble' => 1,              // FK-Nuevo => Usado
            'fecha_publicacion' => 'now()',
            'expensas' => rand(350, 2800),
            'habitaciones' => rand(1, 4),
            'ambientes' => rand(1, 4),
            'toilette' => 0,
            'banos' => rand(1, 2),
            'cocheras' => 1,
            'antiguedad' => rand(10, 40),
            'superficie_total' => rand(56, 140),
            'superficie_cubierta' => rand(56, 140),
            'ubicacion' => 'Ciudad de la Paz ' . rand(56, 5400) . ', CABA',
            'ubicacion_url' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3284.951802422815!2d-58.47761754948851!3d-34.5800860803697!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb66de6acc06f%3A0xc6e85bb9c3ed66be!2sCombatientes+de+Malvinas+3400%2C+C1431FTB+CABA!5e0!3m2!1ses-419!2sar!4v1476153392219" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>',            // GoogleMaps
            'localidad' => 'Villa Urquiza',
            'titulo' => 'Semipiso en Belgrano',
            'descripcion_corta' => 'Cómodo departamento estratégicamente ubicado. Un barrio joven y muy buscado. Super luminoso',
            'descripcion' => 'A solo 2 cuadras del subte "D" estación Congreso de Tucumán y menos de una cuadra de Av. Cabildo. Mucho sol => luz  => casi a estrenar!! Pisos nuevos de porcelanato => baño con ducha escocesa nuevo todo => cocina nueva sin uso => termotanque nuevo sin uso. Mesada nueva. Recién pintado. Listo para mudarse. Cocina separada con espacio para lavarropas => cocina y termotanque Puerta blindada.',
            'tipo_propiedad' => 1      // FK-Depto => PH => Oficina
        ]);
        \App\propiedades::create([
            'estado_inmueble' => 1,              // FK-Nuevo => Usado
            'fecha_publicacion' => 'now()',
            'expensas' => rand(350, 2800),
            'habitaciones' => rand(1, 4),
            'ambientes' => rand(1, 4),
            'toilette' => 0,
            'banos' => rand(1, 2),
            'cocheras' => 1,
            'antiguedad' => rand(10, 40),
            'superficie_total' => rand(56, 140),
            'superficie_cubierta' => rand(56, 140),
            'ubicacion' => 'Echeverría ' . rand(56, 5400) . ', CABA',
            'ubicacion_url' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3284.951802422815!2d-58.47761754948851!3d-34.5800860803697!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb66de6acc06f%3A0xc6e85bb9c3ed66be!2sCombatientes+de+Malvinas+3400%2C+C1431FTB+CABA!5e0!3m2!1ses-419!2sar!4v1476153392219" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>',            // GoogleMaps
            'localidad' => 'Villa Urquiza',
            'titulo' => 'Amplio dos ambientes',
            'descripcion_corta' => 'Cómodo departamento estratégicamente ubicado. Un barrio joven y muy buscado. Super luminoso',
            'descripcion' => 'A solo 2 cuadras del subte "D" estación Congreso de Tucumán y menos de una cuadra de Av. Cabildo. Mucho sol => luz  => casi a estrenar!! Pisos nuevos de porcelanato => baño con ducha escocesa nuevo todo => cocina nueva sin uso => termotanque nuevo sin uso. Mesada nueva. Recién pintado. Listo para mudarse. Cocina separada con espacio para lavarropas => cocina y termotanque Puerta blindada.',
            'tipo_propiedad' => 1      // FK-Depto => PH => Oficina
        ]);
        \App\propiedades::create([
            'estado_inmueble' => 1,              // FK-Nuevo => Usado
            'fecha_publicacion' => 'now()',
            'expensas' => rand(350, 2800),
            'habitaciones' => rand(1, 4),
            'ambientes' => rand(1, 4),
            'toilette' => 0,
            'banos' => rand(1, 2),
            'cocheras' => 1,
            'antiguedad' => rand(10, 40),
            'superficie_total' => rand(56, 140),
            'superficie_cubierta' => rand(56, 140),
            'ubicacion' => 'Valentín Gomez ' . rand(56, 5400) . ', CABA',
            'ubicacion_url' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3284.951802422815!2d-58.47761754948851!3d-34.5800860803697!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb66de6acc06f%3A0xc6e85bb9c3ed66be!2sCombatientes+de+Malvinas+3400%2C+C1431FTB+CABA!5e0!3m2!1ses-419!2sar!4v1476153392219" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>',            // GoogleMaps
            'localidad' => 'Villa Urquiza',
            'titulo' => 'PH 3 ambientes',
            'descripcion_corta' => 'Cómodo departamento estratégicamente ubicado. Un barrio joven y muy buscado. Super luminoso',
            'descripcion' => 'A solo 2 cuadras del subte "D" estación Congreso de Tucumán y menos de una cuadra de Av. Cabildo. Mucho sol => luz  => casi a estrenar!! Pisos nuevos de porcelanato => baño con ducha escocesa nuevo todo => cocina nueva sin uso => termotanque nuevo sin uso. Mesada nueva. Recién pintado. Listo para mudarse. Cocina separada con espacio para lavarropas => cocina y termotanque Puerta blindada.',
            'tipo_propiedad' => 1      // FK-Depto => PH => Oficina
        ]);
        */
    }
}
