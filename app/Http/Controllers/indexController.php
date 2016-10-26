<?php

namespace App\Http\Controllers;

use App\caracteristicas;
use App\estados;
use App\estados_inmuebles;
use App\monedas;
use App\operatorias;
use App\propiedad_caracteristicas;
use App\propiedad_imagenes;
use App\propiedades;
use App\propiedades_operatoria;
use App\propiedades_tipos;
use App\servicios;
use App\propiedad_servicios;

use App\Http\Requests;

class indexController extends Controller
{
    function lista()
    {
        //---- BUSCADOR ---------------------
        // Obtener datos para filtros
        $tipos_propiedad = propiedades_tipos::all();
        $salida_tipos_propiedad[ '-1' ] = "Tipo de propiedad";
        foreach($tipos_propiedad as $tipo){
            $salida_tipos_propiedad[ $tipo['id'] ] = $tipo['descripcion'];
        }
        $operatorias = operatorias::all();
        foreach($operatorias as $operatoria){
            $salida_operatoria[ $operatoria['id'] ] = $operatoria['descripcion'];
        }
        $estados_inmuebles = estados_inmuebles::all();
        foreach($estados_inmuebles as $estado_inmueble){
            $salida_estado_inmueble[ $estado_inmueble['id'] ] = $estado_inmueble['descripcion'];
        }
        //---- FIN BUSCADOR ---------------------

        //---- SLIDER -------------------------------
        $propiedades_slider = propiedades::buscar( request(), 5 );
        //dd($propiedades_slider);
        //---- FIN SLIDER ---------------------------

        //---- DESTACADOS ---------------------------
        $propiedades_destacadas = propiedades::buscar( request(), 10 );
        //dd($propiedades_destacadas);
        //---- FIN DESTACADOS -----------------------

        //---- RECOMENDADAS ---------------------------
        $propiedades_recomendadas = propiedades::buscar( request(), 4 );
        //dd($propiedades_recomendadas);
        //---- FIN RECOMENDADAS -----------------------

        $datos_vista = compact(
            'propiedades_slider',
            'propiedades_destacadas',
            'propiedades_recomendadas',
            'salida_tipos_propiedad',
            'salida_operatoria',
            'salida_estado_inmueble'
        );
        return view('sbs/index', $datos_vista);
    }

    function mostrar($id)
    {
        $propiedades = propiedades::find($id);
        dd($propiedades);
    }
}
