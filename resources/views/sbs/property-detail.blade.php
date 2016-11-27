@include('sbs/header')
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="#">Home</a> / Venta</span>
    <h2>Venta</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="properties-listing spacer">

<div class="row">
<div class="col-lg-3 col-sm-4 hidden-xs">

<div class="hot-properties hidden-xs">
<h4>Propiedades destacadas</h4>

    @foreach ($propiedades_destacadas as $propiedad_dest)

        <div class="row">
            <div class="col-lg-4 col-sm-5"><img src="{{ url('/') }}/img/{{ $propiedad_dest->imagen_thumb }}" class="img-responsive img-circle" alt="properties"/></div>
            <div class="col-lg-8 col-sm-7">
              <h5><a href="{{ url('/') }}/property-detail/{{ $propiedad_dest->id_operatoria }}">{{ $propiedad_dest->titulo }}</a></h5>
              <p class="price">{{ $propiedad_dest->importe }}</p> </div>
        </div>

    @endforeach

</div>


<!--  ANUNCIOS

<div class="advertisement">
  <h4>Anuncios</h4>
  <img src="{{ url('/') }}/images/advertisements.jpg" class="img-responsive" alt="advertisement">

</div>

  FIN ANUNCIOS  -->

</div>

<div class="col-lg-9 col-sm-8 ">

<h2>{{ $propiedad->titulo }}</h2>
<div class="row">
  <div class="col-lg-8">
  <div class="property-images">
    <!-- Slider Starts -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators hidden-xs">
      @foreach($propiedad->imagenes as $id => $imagen)
          @if($id == 0)
            <li data-target="#myCarousel" data-slide-to="{{ $id }}" class="active"></li>
          @else
            <li data-target="#myCarousel" data-slide-to="{{ $id }}" class="active"></li>
          @endif
      @endforeach
      </ol>
      <div class="carousel-inner">
          @foreach($propiedad->imagenes as $id => $imagen)
            @if($id == 0)
                <div class="item active">
            @else
                <div class="item">
            @endif
                    <img src="{{ url('/') }}/img/{{ $imagen->nombre_archivo }}" class="properties" alt="properties" />
                </div>
          @endforeach

      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div>
<!-- #Slider Ends -->

  </div>




  <div class="spacer"><h4><span class="glyphicon glyphicon-th-list"></span> Detalles</h4>
  <p>{{ $propiedad->descripcion_corta }}
      </p>
  <p>{{ $propiedad->descripcion }}</p>

  </div>
  <div><h4><span class="glyphicon glyphicon-map-marker"></span> Ubicación</h4>
<div class="well"><div class="google-maps">{!! $propiedad->ubicacion_url !!}</div></div>
  </div>

  </div>
  <div class="col-lg-4">
  <div class="col-lg-12  col-sm-6">
<div class="property-info">
<p class="price">{{ $propiedad->operatorias[0]->unidad . ' ' . number_format($propiedad->operatorias[0]->importe, 0, ',', '.') }}</p>
  <p class="area"><span class="glyphicon glyphicon-map-marker"></span>{{ $propiedad->ubicacion }}</p>
  
  <div class="profile">
  <span class="glyphicon glyphicon-user"></span> Detalles del agente
  <p>Juan Martín Busso<br></p>
  </div>
</div>

    <h6><span class="glyphicon glyphicon-home"></span> Disponibilidad</h6>
    <div class="listing-detail">
    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Ambientes">{{ $propiedad->ambientes }}</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Baños">{{ $propiedad->banos }}</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Estacionamiento">{{ $propiedad->cocheras }}</span> </div>

</div>
<div class="col-lg-12 col-sm-6 ">
<div class="enquiry">
  <h6><span class="glyphicon glyphicon-envelope"></span> Consultenos</h6>
  <form role="form">
                <input type="text" class="form-control" placeholder="Nombre completo"/>
                <input type="text" class="form-control" placeholder="email@ejemplo.com"/>
                <input type="text" class="form-control" placeholder="Telefomo"/>
                <textarea rows="6" class="form-control" placeholder="Que está buscando?"></textarea>
      <button type="submit" class="btn btn-primary" name="Submit">Enviar mensaje</button>
      </form>
 </div>         
</div>
  </div>
</div>
</div>
</div>
</div>
</div>

@include('sbs/footer')
