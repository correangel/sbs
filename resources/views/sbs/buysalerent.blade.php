
@include('sbs/header')

<!-- banner -->
<div class="inside-banner">
    <div class="container">
        <span class="pull-right"><a href="index.php">Home</a> / Ventas y Alquileres</span>
        <h2>Ventas y Alquileres</h2>
    </div>
</div>
<!-- banner -->


<div class="container">
    <div class="properties-listing spacer">

        <div class="row">
            <div class="col-lg-3 col-sm-4 ">

                {!! Form::open(array('url' => 'buysalerent', 'method' => 'get')) !!}

                {!! Form::token() !!}

                <div class="search-form"><h4><span class="glyphicon glyphicon-search"></span> Buscar por</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            {!! Form::select('operatoria', $filtro_operatoria, request('operatoria'), array('class' => 'form-control') ) !!}
                        </div>
                        <div class="col-lg-6">
                            {!! Form::select('estado_inmueble', $filtro_estado_inmueble, request('estado_inmueble'), array('class' => 'form-control') ) !!}
                            <!-- <script> $(function() { $('#importe').maskMoney(); }) </script>  -->
                        </div>
                        <div class="col-lg-6">
                            {!! Form::text('importe_desde', request('importe_desde'), array('class' => 'form-control', 'placeholder' => 'Importe desde', 'id' => '#importe') ) !!}
                        </div>
                        <div class="col-lg-6">
                            {!! Form::text('importe_hasta', request('importe_hasta'), array('class' => 'form-control', 'placeholder' => 'Importe hasta', 'id' => '#importe') ) !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            {!! Form::select('tipo_propiedad', $filtro_tipos_propiedad, request('tipo_propiedad'), array('class' => 'form-control') ) !!}
                        </div>
                    </div>

                    {!! Form::submit('Buscar', array("class" => "btn btn-primary")) !!}

                </div>

                {!! Form::close() !!}

                <div class="hot-properties hidden-xs">
                    <h4>Propiedades destacadas</h4>

                    @foreach ($propiedades_destacadas as $propiedad)

                    <div class="row">
                        <div class="col-lg-4 col-sm-5"><img src="{{ url('/') }}/img/{{ $propiedad->imagen_thumb }}" class="img-responsive img-circle" alt="properties"></div>
                        <div class="col-lg-8 col-sm-7">
                            <h5><a href="property-detail/{{ $propiedad->id_operatoria }}">{{ $propiedad->titulo }}</a></h5>
                            <p class="price">{{ $propiedad->importe }}</p> </div>
                    </div>

                    @endforeach

                </div>


            </div>

            <div class="col-lg-9 col-sm-8">
                <div class="sortby clearfix">
                    <div class="pull-left result">Mostando:
                        <?php
                        echo ( $propiedades->count()) . ' de ' . $propiedades->total()
                        ?> </div>
                    <div class="pull-right">
                        <select class="form-control">
                            <option>Ordenar por</option>
                            <option>Menor precio</option>
                            <option>Mayor precio</option>
                        </select></div>

                </div>


                <div class="row">
                @foreach ($propiedades as $propiedad)
                    <!-- properties -->
                        <div class="col-lg-4 col-sm-4">
                            <div class="properties">
                                <div class="image-holder"><img src="img/{{ $propiedad->imagen_thumb }}" class="img-responsive" alt="properties">
                                    @if($propiedad->estado == 'Activo')
                                        <div class="status sold">
                                    @else($propiedad->estado == 'Nuevo')
                                        <div class="status new">
                                    @endif
                                        {{ $propiedad->estado }}
                                    </div>
                                        </div>
                                        <h4><a href="property-detail/{{ $propiedad->id_operatoria }}">{{ $propiedad->localidad }}</a></h4>
                                        <p class="price">Precio:  {{ $propiedad->importe }}</p>
                                        <div class="listing-detail"><span data-toggle="tooltip" data-placement="bottom" data-original-title="Ambientes">{{ $propiedad->ambientes }}</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Baños">{{ $propiedad->banos }}</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Estacionamiento">{{ $propiedad->cocheras }}</span></div>
                                        <a class="btn btn-primary" href="property-detail/{{ $propiedad->id_operatoria }}">Detalles</a>
                                </div>
                            <!-- properties -->
                            </div>
                            @endforeach
                        </div>
                        <div class="center">
                            {!! $propiedades->render() !!}
                        </div>
                </div>
            </div>
        </div>
    </div>


@include('sbs/footer')