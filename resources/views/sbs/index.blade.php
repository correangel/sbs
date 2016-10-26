@include('sbs/header')

<div class="">

  <div id="slider" class="sl-slider-wrapper">

    <div class="sl-slider">

      @foreach($propiedades_slider as $propiedad)

        <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
          <div class="sl-slide-inner">
            <div class="bg-img" style="background-image: url(/img/{{ $propiedad->imagen }})"></div>
            <h2><a href="property-detail/{{ $propiedad->id_operatoria }}">{{ $propiedad->titulo }}</a></h2>
            <blockquote>
              <p class="location"><span class="glyphicon glyphicon-map-marker"></span> {{ $propiedad->ubicacion }}</p>
              <p>{{ $propiedad->descripcion_corta }}</p>
              <cite>{{ $propiedad->importe }}</cite>
            </blockquote>
          </div>
        </div>

      @endforeach

    </div><!-- /sl-slider -->



    <nav id="nav-dots" class="nav-dots">
      <span class="nav-dot-current"></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </nav>

  </div><!-- /slider-wrapper -->
</div>



<div class="banner-search">
  <div class="container">
    <!-- banner -->
    <h3>Venta y Alquiler</h3>

    {!! Form::open(array('url' => '/buysalerent', 'method' => 'get')) !!}

      {!! Form::token() !!}

    <div class="searchbar">
      <div class="row">
        <div class="col-lg-7 col-sm-7">
          {!! Form::text('titulo', request('titulo'), array('class' => 'form-control', 'placeholder' => 'Buscar propiedades') ) !!}
          <div class="row">

            <div class="col-lg-2 col-sm-2 ">
              {!! Form::select('operatoria', $salida_operatoria, request('operatoria'), array('class' => 'form-control') ) !!}
            </div>
            <div class="col-lg-3 col-sm-3">
              {!! Form::select('estado_inmueble', $salida_estado_inmueble, request('estado_inmueble'), array('class' => 'form-control') ) !!}
            </div>
            <div class="col-lg-4 col-sm-4">
              {!! Form::select('tipo_propiedad', $salida_tipos_propiedad, request('tipo_propiedad'), array('class' => 'form-control') ) !!}
            </div>
            <div class="col-lg-3 col-sm-3">
              <button class="btn btn-success"  onclick="window.location.href='buysalerent'">Buscar</button>
            </div>

          </div>
        </div>
      </div>
    </div>

    {!! Form::close() !!}

  </div>


</div>
<!-- banner -->
<div class="container">
  <div class="properties-listing spacer"> <a href="buysalerent" class="pull-right viewall">Ver todo el listado</a>
    <h2>Propiedades destacadas</h2>
    <div id="owl-example" class="owl-carousel">
      
      @foreach($propiedades_destacadas as $propiedad)

      <div class="properties">
        <div class="image-holder"><img src="img/{{ $propiedad->imagen_thumb }}" class="img-responsive" alt="properties"/>
          @if($propiedad->estado == 'Activo')
            <div class="status sold">
          @else($propiedad->estado == 'Nuevo')
            <div class="status new">
          @endif
            {{ $propiedad->estado }}
          </div>
        </div>
        <h4><a href="property-detail/{{ $propiedad->id_operatoria }}">{{ $propiedad->localidad }}</a></h4>
        <p class="price">Precio: {{ $propiedad->importe }}</p>
        <div class="listing-detail"><span data-toggle="tooltip" data-placement="bottom" data-original-title="Ambientes">{{ $propiedad->ambientes }}</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Baños">{{ $propiedad->banos }}</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Estacionamiento">{{ $propiedad->cocheras }}</span> </div>
        <a class="btn btn-primary" href="property-detail/{{ $propiedad->id_operatoria }}">Detalles</a>
      </div>

      @endforeach

    </div>
  </div>
  <div class="spacer">
    <div class="row">
      <div class="col-lg-6 col-sm-9 recent-view">
        <h3>Sobre nosotros</h3>
        <p>El trozo de texto estándar de Lorem Ipsum usado desde el año 1500 es reproducido debajo para aquellos interesados. Las secciones 1.10.32 y 1.10.33 de "de Finibus Bonorum et Malorum" por Cicero son también reproducidas en su forma original exacta, acompañadas por versiones en Inglés de la traducción realizada en 1914 por H. Rackham.<br><a href="about">Leer mas</a></p>

      </div>
      <div class="col-lg-5 col-lg-offset-1 col-sm-3 recommended">
        <h3>Propiedades recomendadas</h3>
        <div id="myCarousel" class="carousel slide">
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1" class=""></li>
            <li data-target="#myCarousel" data-slide-to="2" class=""></li>
            <li data-target="#myCarousel" data-slide-to="3" class=""></li>
          </ol>

          <!-- Carousel items -->

          <div class="carousel-inner">

          @foreach($propiedades_recomendadas as $id => $propiedad)
            @if($id == 0)
              <div class="item active">
            @else
              <div class="item">
            @endif
              <div class="row">
                <div class="col-lg-4"><img src="img/{{ $propiedad->imagen_thumb }}" class="img-responsive" alt="properties"/></div>
                <div class="col-lg-8">
                  <h5><a href="property-detail/{{ $propiedad->id_operatoria }}">{{ $propiedad->localidad }}</a></h5>
                  <p class="price">{{ $propiedad->importe }}</p>
                  <a href="property-detail/{{ $propiedad->id_operatoria }}" class="more">Detalles</a> </div>
              </div>
            </div>

            @endforeach

          </div>

          <!-- Fin Carousel items -->

        </div>
      </div>
    </div>
  </div>
</div>
@include('sbs/footer')
