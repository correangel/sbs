@extends('layouts.app')

@section('content')

@include('partials/errors')
<!-- Single button -->
<script>
    $(document).ready(function(){
        var i=1;
        $("#add_row").click(function(){
            $('#addr'+i).html("<td>"+ (i+1) +'</td><td>{!! Form::select("operatoria[]", $combo_operatorias, null, array('class' => 'form-control input-md') ) !!} </td><td>{!! Form::select('moneda[]', $combo_monedas, null, array('class' => 'form-control input-md') ) !!}</td><td>{!! Form::text('importe[]', null, array('class' => 'form-control input-md') ) !!}</td><td>{!! Form::select('operatoria_estado[]', $combo_estados, null, array('class' => 'form-control')) !!}</td>');

            $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
            i++;
        });
        $("#delete_row").click(function(){
            if(i>1){
                $("#addr"+(i-1)).html('');
                i--;
            }
        });

    });
</script>

<div class="form-group-row">

    {!! Form::open(array('url' => 'propiedades/' . $propiedad->id , 'method' => 'put', 'enctype' => 'multipart/form-data', 'files' => true)) !!}

        {!! Form::token() !!}

        <table class="table table-bordered table-inverse">
            <tr class="table-active">
                <td class="table-active">
                    <table class="table table-bordered table-inverse">
                        <tr class="table-active">
                            <td class="table-active" width="60%">

                                Titulo            {!! Form::text('titulo', $propiedad->titulo, array('class' => 'form-control') ) !!}
                                Descripcion corta {!! Form::text('descripcion_corta', $propiedad->descripcion_corta, array('class' => 'form-control') ) !!}
                                Descripcion       {!! Form::textarea('descripcion', $propiedad->descripcion, array('size' => '30x4', 'class' => 'form-control') ) !!}
                                URL Mapa        {!! Form::text('ubicacion_url', $propiedad->ubicacion_url, array('class' => 'form-control') ) !!}
                                Ubicación       {!! Form::text('ubicacion', $propiedad->ubicacion, array('class' => 'form-control') ) !!}
                                Localidad       {!! Form::text('localidad', $propiedad->localidad, array('class' => 'form-control') ) !!}

                            </td>
                            <td class="table-active" width="15%">

                                Tipo de propiedad   <div>{!! Form::select('tipo_propiedad', $combo_tipos_propiedad, null, array('class' => 'form-control') ) !!}</div>
                                Estado del inmueble <div>{!! Form::select('estado_inmueble', $combo_estados_inmueble, null, array('class' => 'form-control') ) !!}</div>
                                Ambientes       {!! Form::number('ambientes', $propiedad->ambientes, array('class' => 'form-control') ) !!}
                                Habitaciones    {!! Form::number('habitaciones', $propiedad->habitaciones, array('class' => 'form-control') ) !!}
                                Toilette        {!! Form::number('toilette', $propiedad->toilette, array('class' => 'form-control') ) !!}
                                Baños           {!! Form::number('banos', $propiedad->banos, array('class' => 'form-control') ) !!}
                                Cocheras        {!! Form::number('cocheras', $propiedad->cocheras, array('class' => 'form-control') ) !!}

                            </td>
                            <td class="table-active" width="15%">

                                Servicios           <div>{!! Form::select('servicios', $combo_servicios, null, array('multiple data-actions-box'=>true, 'class' => 'selectpicker', 'name'=>'servicios[]')) !!}</div>
                                Caracteristicas     <div>{!! Form::select('caracteristicas', $combo_caracteristicas, null, array('multiple data-actions-box'=>true, 'class' => 'selectpicker', 'name'=>'caracteristicas[]')) !!}</div>
                                Antigüedad      {!! Form::number('antiguedad', $propiedad->antiguedad, array('class' => 'form-control') ) !!}
                                Sup. total      {!! Form::number('superficie_total', $propiedad->superficie_total, array('class' => 'form-control') ) !!}
                                Sup. Cubierta   {!! Form::number('superficie_cubierta', $propiedad->superficie_cubierta, array('class' => 'form-control') ) !!}
                                Fecha publicación  {!! Form::date('fecha_publicacion', date('Y-m-d'), array('class' => 'form-control') ) !!}
                                Expensas        {!! Form::text('expensas', $propiedad->expensas, array('class' => 'form-control') ) !!}

                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    Imagen de portada {!! Form::file('imagen_portada', array('class' => 'form-control')) !!}
                    Imagenes (No agregar nuevamente la de portada) {!! Form::file('images[]', array('multiple'=>true, 'class' => 'form-control')) !!}
                </td>
            </tr>
            <tr>
                <td>
                    <table class="table table-bordered table-inverse">
                        <tr class="table-active">
                            @if(!empty($propiedad->imagenes))
                                @foreach($propiedad->imagenes as $imagen)
                                <td class="table-active">
                                    <img src="{{ url('/') }}/img/{{ $imagen->nombre_archivo }}" class="img-responsive" alt="properties">
                                </td>
                                @endforeach
                            @endif
                        </tr>
                        <tr>
                            @if(!empty($propiedad->imagenes))
                                @foreach($propiedad->imagenes as $id => $imagen)
                                <td align="center">
                                    Eliminar {{ Form::checkbox('imagen_checkbox_' . $imagen->id ,  1, false) }}
                                </td>
                                @endforeach
                            @endif
                        </tr>
                        <tr>
                            @if(!empty($propiedad->imagenes))
                                @foreach($propiedad->imagenes as $id => $imagen)
                                <td align="center">
                                    {{ Form::number('imagen_orden_' . $imagen->id , $imagen->orden, array('class' => 'form-control')) }}
                                    @if($imagen->rol == 'P')
                                        Imagen de portada
                                    @endif
                                </td>
                                @endforeach
                            @endif
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>

                    <!-- OPERATORIAS -->
                    <div>
                        <div class="row clearfix">
                            <div class="col-md-12 column">
                                <table class="table table-bordered table-hover" id="tab_logic">
                                    <thead>
                                    <tr >
                                        <th class="text-center">
                                            #
                                        </th>
                                        <th class="text-center">
                                            Operatoria
                                        </th>
                                        <th class="text-center">
                                            Moneda
                                        </th>
                                        <th class="text-center">
                                            Importe
                                        </th>
                                        <th class="text-center">
                                            Estado
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($propiedad->operatorias as $id => $operatoria)
                                    <tr id='addr0'>
                                        <td>
                                            {{ $id + 1 }}
                                        </td>
                                        <td>
                                            {{ Form::hidden('id_operatoria[]', $operatoria->id) }}
                                            {!! Form::select('operatoria[]', $combo_operatorias, $operatoria->operatoria, array('class' => 'form-control') ) !!}
                                        </td>
                                        <td>
                                            {!! Form::select('moneda[]', $combo_monedas, $operatoria->moneda, array('class' => 'form-control') ) !!}
                                        </td>
                                        <td>
                                            {!! Form::text('importe[]', $operatoria->importe, array('class' => 'form-control') ) !!}
                                        </td>
                                        <td>
                                            {!! Form::select('operatoria_estado[]', $combo_estados, $operatoria->estado, array('class' => 'form-control')) !!}
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr id='addr1'></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <a id="add_row" class="btn btn-default pull-left">Agregar operatoria</a><a id='delete_row' class="pull-right btn btn-default">Eliminar última operatoria</a>
                    </div>

                    <!-- FIN OPERATORIAS -->


                </td>
            </tr>
        </table>
    <table width="100%" class="table">
        <tr>
            <td width="80%">
                {!! Form::submit('Guardar', array('class'=> 'btn btn-primary form-control')) !!}
            </td><td width="20%">
                <a href="{{ url('/') }}/propiedades" class="btn btn-danger">Cancelar</a>
            </td>
        </tr>
    </table>
        {!! Form::close() !!}
</div>
@endsection
