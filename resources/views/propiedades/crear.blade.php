@extends('layouts.app')

@section('content')

@include('partials/errors')
<!-- Single button -->
<script>
    $(document).ready(function(){
        var i=1;
        $("#add_row").click(function(){
            $('#addr'+i).html("<td>"+ (i+1) +'</td><td>{!! Form::select("operatoria[]", $combo_operatorias, null, array('class' => 'form-control input-md') ) !!} </td><td>{!! Form::select('moneda[]', $combo_monedas, null, array('class' => 'form-control input-md') ) !!}</td><td>{!! Form::text('importe[]', old('importe'), array('class' => 'form-control input-md') ) !!}</td>');

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

    {!! Form::open(array('url' => 'propiedades', 'method' => 'post', 'enctype' => 'multipart/form-data', 'files' => true)) !!}

        {!! Form::token() !!}

        <table class="table table-bordered table-inverse">
            <tr class="table-active">
                <td class="table-active">
                    <table class="table table-bordered table-inverse">
                        <tr class="table-active">
                            <td class="table-active" width="60%">

                                Titulo            {!! Form::text('titulo', old('titulo'), array('class' => 'form-control') ) !!}
                                Descripcion corta {!! Form::text('descripcion_corta', old('descripcion_corta'), array('class' => 'form-control') ) !!}
                                Descripcion       {!! Form::textarea('descripcion', old('descripcion'), array('size' => '30x4', 'class' => 'form-control') ) !!}
                                URL Mapa        {!! Form::text('ubicacion_url', old('ubicacion_url'), array('class' => 'form-control') ) !!}
                                Ubicación       {!! Form::text('ubicacion', old('ubicacion'), array('class' => 'form-control') ) !!}
                                Localidad       {!! Form::text('localidad', old('localidad'), array('class' => 'form-control') ) !!}

                            </td>
                            <td class="table-active" width="15%">

                                Tipo de propiedad   <div>{!! Form::select('tipo_propiedad', $combo_tipos_propiedad, null, array('class' => 'form-control') ) !!}</div>
                                Estado del inmueble <div>{!! Form::select('estado_inmueble', $combo_estados_inmueble, null, array('class' => 'form-control') ) !!}</div>
                                Ambientes       {!! Form::number('ambientes', old('ambientes'), array('class' => 'form-control') ) !!}
                                Habitaciones    {!! Form::number('habitaciones', old('habitaciones'), array('class' => 'form-control') ) !!}
                                Toilette        {!! Form::number('toilette', old('toilette'), array('class' => 'form-control') ) !!}
                                Baños           {!! Form::number('banos', old('banos'), array('class' => 'form-control') ) !!}
                                Cocheras        {!! Form::number('cocheras', old('cocheras'), array('class' => 'form-control') ) !!}
                                Imagen de portada {!! Form::file('imagen_portada', array('class' => 'form-control')) !!}
                            </td>
                            <td class="table-active" width="15%">
                                Servicios           <div>{!! Form::select('servicios', $combo_servicios, null, array('multiple data-actions-box'=>true, 'class' => 'selectpicker', 'name'=>'servicios[]')) !!}</div>
                                Caracteristicas     <div>{!! Form::select('caracteristicas', $combo_caracteristicas, null, array('multiple data-actions-box'=>true, 'class' => 'selectpicker', 'name'=>'caracteristicas[]')) !!}</div>
                                Antigüedad      {!! Form::number('antiguedad', old('antiguedad'), array('class' => 'form-control') ) !!}
                                Sup. total      {!! Form::number('superficie_total', old('superficie_total'), array('class' => 'form-control') ) !!}
                                Sup. Cubierta   {!! Form::number('superficie_cubierta', old('superficie_cubierta'), array('class' => 'form-control') ) !!}
                                Fecha publicación  {!! Form::date('fecha_publicacion', date('Y-m-d'), array('class' => 'form-control') ) !!}
                                Expensas        {!! Form::text('expensas', old('expensas'), array('class' => 'form-control') ) !!}
                                Imagenes (No agregar nuevamente la de portada) {!! Form::file('images[]', array('multiple'=>true, 'class' => 'form-control')) !!}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>

                    <!-- OPERATORIAS -->
                    <div class="container">
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
                                    <tr id='addr0'>
                                        <td>
                                            1
                                        </td>
                                        <td>
                                            {!! Form::select('operatoria[]', $combo_operatorias, null, array('class' => 'form-control') ) !!}
                                        </td>
                                        <td>
                                            {!! Form::select('moneda[]', $combo_monedas, null, array('class' => 'form-control') ) !!}
                                        </td>
                                        <td>
                                            {!! Form::text('importe[]', old('importe'), array('class' => 'form-control') ) !!}
                                        </td>
                                        <td>
                                            {!! Form::select('operatoria_estado', $combo_estados, null, array('class' => 'form-control')) !!}
                                        </td>
                                    </tr>
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
    <table width="100%">
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
