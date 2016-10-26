


<div class="footer">

<div class="container">



<div class="row">
            <div class="col-lg-3 col-sm-3">
                   <h4>Información</h4>
                   <ul class="row">
                <li class="col-lg-12 col-sm-12 col-xs-3"><a href="{{ url('/') }}/about">Sobre nosotros</a></li>
<!--                <li class="col-lg-12 col-sm-12 col-xs-3"><a href="agents.php">Agentes</a></li>   -->
<!--                <li class="col-lg-12 col-sm-12 col-xs-3"><a href="blog.php">Blog</a></li>   -->
                <li class="col-lg-12 col-sm-12 col-xs-3"><a href="{{ url('/') }}/contact">Contacto</a></li>
              </ul>
            </div>
            
            <div class="col-lg-3 col-sm-3">
                    <h4>Newsletter</h4>
                    <p>Obtenga novedades de las últimas propiedades en el mercado.</p>
                    <form class="form-inline" role="form">
                            <input type="text" placeholder="Ingrese su dirección de email" class="form-control">
                                <button class="btn btn-success" type="button">Notificarme!</button></form>
            </div>
            
            <div class="col-lg-3 col-sm-3">
                    <h4>Siganos</h4>
                    <a href="#"><img src="{{ url('/') }}/images/facebook.png" alt="facebook"></a>
                    <a href="#"><img src="{{ url('/') }}/images/twitter.png" alt="twitter"></a>
                    <a href="#"><img src="{{ url('/') }}/images/linkedin.png" alt="linkedin"></a>
                    <a href="#"><img src="{{ url('/') }}/images/instagram.png" alt="instagram"></a>
            </div>

             <div class="col-lg-3 col-sm-3">
                    <h4>Contactenos</h4>
                    <p><b>SBS Servicios inmobiliarios.</b><br>
<span class="glyphicon glyphicon-map-marker"></span> 5678 Calle, CABA <br>
<span class="glyphicon glyphicon-envelope"></span> info@sbsinmobiliaria.com.ar<br>
<span class="glyphicon glyphicon-earphone"></span> (+5411) 4567-7890</p>
            </div>
        </div>
<p class="copyright">Copyright 2016. Todos los derechos reservados.	</p>


</div></div>




<!-- Modal -->
<div id="loginpop" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="row">
        <div class="col-sm-6 login">
        <h4>Iniciar sesión</h4>
          <form class="" role="form">
        <div class="form-group">
          <label class="sr-only" for="exampleInputEmail2">Dirección de email</label>
          <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Ingresar email">
        </div>
        <div class="form-group">
          <label class="sr-only" for="exampleInputPassword2">Clave</label>
          <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Clave">
        </div>
        <div class="checkbox">
          <label>
            <input type="checkbox"> Recordarme
          </label>
        </div>
        <button type="submit" class="btn btn-success">Ingresar</button>
      </form>          
        </div>
        <div class="col-sm-6">
          <h4>Registro para nuevos usuarios</h4>
          <p>Registrese y obtenga las novedades de las últimas propiedades en el mercado.</p>
          <button type="submit" class="btn btn-info"  onclick="window.location.href='{{ url('/') }}/register.php'">Registrarse</button>
        </div>

      </div>
    </div>
  </div>
</div>
<!-- /.modal -->



</body>
</html>



