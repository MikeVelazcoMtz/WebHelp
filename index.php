<?php
  require 'clases/classMySql.php';
  session_start();
  session_destroy();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <!-- Set the viewport width to device width for mobile -->
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Bienvenido a WebHelp</title>
    <!-- ARCHIVOS NECESARIOS PARA UTILIZAR FOUNDATION -->
    <!--
    <script src="javascripts/jquery.js"></script><script src="javascripts/jquery.foundation.mediaQueryToggle.js"></script><script src="javascripts/jquery.foundation.forms.js"></script><script src="javascripts/jquery.foundation.reveal.js"></script><script src="javascripts/jquery.foundation.orbit.js"></script><script src="javascripts/jquery.foundation.navigation.js"></script><script src="javascripts/jquery.foundation.buttons.js"></script><script src="javascripts/jquery.foundation.tabs.js"></script><script src="javascripts/jquery.foundation.tooltips.js"></script><script src="javascripts/jquery.foundation.accordion.js"></script><script src="javascripts/jquery.placeholder.js"></script><script src="javascripts/jquery.foundation.alerts.js"></script><script src="javascripts/jquery.foundation.topbar.js"></script><script src="javascripts/jquery.foundation.joyride.js"></script><script src="javascripts/jquery.foundation.clearing.js"></script><script src="javascripts/jquery.foundation.magellan.js"></script>
    -->
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/foundation.min.css">
    <link rel="stylesheet" href="css/app.css">
    <style type="text/css">
      body{
        background-color: #CCC
      }
    </style>
    <script src="js/modernizr.foundation.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script src="js/app.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
      $("#status").hide();
      $("img").hide().fadeIn(1000);
      
      $('#slider').orbit({
        "bullets" : true,
        "animation" : "horizontal-push"
      });
      
      $("#login").bind('click', function(){
        if($("#user").val().toString() === '' || $("#password").val().toString() === "")
          $("#status").text("Uno de los campos esta Vacio, revise porfavor").slideDown();
        else
        {
          $.post("login.php",{user:$("#user").val(), password:$("#password").val()},function (data){
            if(parseInt(data, 10) === 0)
              alert('Datos incorrectos');
            else
              location.href = data;
          });
        }
      }); 

    });
    </script>
  </head>
  <body>
    <nav class="top-bar">
      <ul>
        <li class="name">
          <h1><a href="#">WebHelp</a></h1>
        </li>
        <li class="toggle-topbar"><br />
        </li>
      </ul>
      <section >
        <ul class="left">
          <li class="divider show-for-medium-and-up"></li>
          <li class="has-dropdown">
            <a href="#">Usuario</a>
            <ul class="dropdown">
              <li><a href="#" data-reveal-id="loginModal">Aun no te has Logueado</a></li>
              <li><a href="#">¿Nuevo en WebHelp?</a></li>
            </ul>
          </li>
        </ul>
        <ul class="right">
          <li>
            <a href="#" data-reveal-id="msj" class="a">Captura de Boletines de ayuda</a>
          </li>
          <li>
            <a href="#" data-reveal-id="about" class="a">¿Nuevo en WebHelp?</a>
          </li>
        </ul>
      </section>
    </nav>
    <!-- TERMINA LA SECCION  DEL MENU -->
    <AUDIO id="so" volume="50" autoplay="autoplay" src="img/Lectura.ogg"></AUDIO>
    <div class="reveal-modal" id="msj" >
      <a class="close-reveal-modal">x</a>
      <h3>Acerca de los Boletines de Ayuda</h3>
      <hr />
      <p>¿Alguna vez te ha pasado que tienes alguna duda, comentario sugerencia o queja que desees compartir a tu organizacion?. </p>
      <p>Pues te encuentras en el lugar correcto.</p>
      <p>WebHelp tiene como objetivo hacer llegar lo mas rapido posible la retroalimentacion que desees hacer llegar a la organizacion a la que perteneces. ¿Como?, muy simple solo es necesario <a href="register/index.php">Registrarse</a> y enviar en forma de mensajes cortos la informacion que tu desees.</p>
    </div>
    <div class="reveal-modal" id="about" style="text-align:center">
      <a class="close-reveal-modal">x</a>
      <h1>Acerca de WebHelp</h1>
      <hr>
      <p>
      WebHelp Es un sistema que permite a sus usuarios realizar un registro de quejas online que facilita la operacion dentro de su organizacion haciendo mas accesible y simple la comunicacion de dudas o comentarios.
      </p>
      <p>
      Nuestro sistema esta desarrollado por medio de tecnologias web responsive pudiendo ser posible realizar el registro con facilidad en cualquier tipo de dispositivo desde una PC hasta un Smartphone con las mismas comodidades.
      </p>
      <a href="register/index.php" class="button success radius">Registrese Ahora</a>
    </div>
    <div id="loginModal" class="reveal-modal">
      <h1 style="font-family:tahoma">Login de usuario</h1>
      <hr />
      <form action="login.php" method="post">
        <a class="close-reveal-modal">x</a>
        <div id="status"></div>
        <label for="user">Nombre de Usuario</label>
        <br />
        <input type="text" placeholder="Nombre de Usuario" id="user"/>
        <br />
        <label for="password">Contraseña</label>
        <br />
        <input type="password" placeholder="Contraseña" id="password"/>
        <a href="#" id="login" class="button" >Acceder</a>
        <br />
        <br />
        o puede <a href="register/index.php">Registrarse</a>
      </form>
    </div>
    <div class="row">
      <div class="panel twelve columns">
        <div class=" twelve columns">
          <p style="text-align:center"><img src="img/banner.png" width="670" height="173" id="imagen" title="WebHelp" /></p>
        </div>
        <br />
        <br />
        <div class="twelve columns" align="center">
          <div class="panel twelve columns" style='background-color:white;'>
            <div id="slider">
              <img src="img/3.jpeg" width="826"  height="390"/>
              <img src="img/2.jpg" width="826"  height="390" />
              <img src="img/1.jpg" width="826"  height="390" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer>
      <hr />
      <div class="six columns">
        <p>&copy; 2013. Copyright en tramite.</p>
      </div>
      <div class="six columns">
        <ul class="link-list right">
          <li><a href="www.wordpress.com">Wordpress</a></li>
          <li><a href="www.google.com.mx">Google</a></li>
          <li><a href="mx.yahoo.com">Yahoo</a></li>
          <li><a href="www.facebook.com">Facebook</a></li>
        </ul>
      </div>
    </footer>
  </body>
</html>