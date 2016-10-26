@include('sbs/header')
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="#">Home</a> / Registro</span>
    <h2>Registro</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="spacer">
<div class="row register">
  <div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">


                <input type="text" class="form-control" placeholder="Nombre completo" name="form_name">
                <input type="text" class="form-control" placeholder="Ingrese el email" name="form_email">
                <input type="password" class="form-control" placeholder="Clave" name="form_phone">
                <input type="password" class="form-control" placeholder="Confirmar clave" name="form_phone">

                <textarea rows="6" class="form-control" placeholder="Dirección" name="form_message"></textarea>
      <button type="submit" class="btn btn-success" name="Submit">Registrar</button>
          


                
        </div>
  
</div>
</div>
</div>

@include('sbs/footer')