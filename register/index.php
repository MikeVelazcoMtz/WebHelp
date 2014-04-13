<?php 
  require '../clases/classMySql.php';
  $conexion = new mySqlx();
  $data = $conexion->getUsersList();

  function createArray($data)
  {// crea un array javascript a partir de un array PHP
    echo "\n\t\t\tvar usersArray = new Array();\n";
    for ($i=0; $i < count($data) ; $i++) { 
      echo "\t\t\tusersArray[". $i ."] = '". $data[$i] ."';\n";
    }
   
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <!-- Set the viewport width to device width for mobile -->
    <meta content="width=device-width" name="viewport" />
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>Bienvenido a WebHelp</title>
    <!-- ARCHIVOS NECESARIOS PARA UTILIZAR FOUNDATION -->
    <!--
  <script src="javascripts/jquery.js"></script><script src="javascripts/jquery.foundation.mediaQueryToggle.js"></script><script src="javascripts/jquery.foundation.forms.js"></script><script src="javascripts/jquery.foundation.reveal.js"></script><script src="javascripts/jquery.foundation.orbit.js"></script><script src="javascripts/jquery.foundation.navigation.js"></script><script src="javascripts/jquery.foundation.buttons.js"></script><script src="javascripts/jquery.foundation.tabs.js"></script><script src="javascripts/jquery.foundation.tooltips.js"></script><script src="javascripts/jquery.foundation.accordion.js"></script><script src="javascripts/jquery.placeholder.js"></script><script src="javascripts/jquery.foundation.alerts.js"></script><script src="javascripts/jquery.foundation.topbar.js"></script><script src="javascripts/jquery.foundation.joyride.js"></script><script src="javascripts/jquery.foundation.clearing.js"></script><script src="javascripts/jquery.foundation.magellan.js"></script>  -->
    <link href="../css/form.css" rel="stylesheet" />
    <link href="../css/foundation.min.css" rel="stylesheet" />
    <link href="../css/app.css" rel="stylesheet" />
    <style type="text/css">
  body{
  	background-color: #CCC
  }
  input::-webkit-input-placeholder {
    text-shadow: black 0.1em 0.1em 0.2em;
    font-weight: bold;
  }
  input:-moz-placeholder {
    text-shadow: black 0.1em 0.1em 0.2em;
    font-weight: bold;
  }
</style> <script src="../js/modernizr.foundation.js"></script>
    <script src="../js/jquery.js"></script>    
    <script src="../js/foundation.min.js"></script>
    <script src="../js/app.js"></script>
    <script src="../js/jquery.customforms.js" type="text/javascript" charset="utf-8"></script>
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
      <section>
        <ul class="left">
          <li><a href="../index.php" class="a">Inicio</a></li>
          <li><a href="#" class="a">Captura de Boletines de ayuda</a></li>
          <li>
            <a href="#" class="a">¿Nuevo en WebHelp?</a>
          </li>
        </ul>
      </section>
    </nav>
    <div class="reveal-modal" id="about">
      <h1>Acerca de WebHelp</h1>
      <br>
      <hr>
      <p>
        WebHelp Es un sistema que permite a sus usuarios realizar un registro de quejas online que facilita la operacion dentro de su organizacion haciendo mas accesible y simple la comunicacion de dudas o comentarios.
      </p>
      <br>
      <p>
        Nuestro sistema esta desarrollado por medio de tecnologias web responsive pudiendo ser posible realizar el registro con facilidad en cualquier tipo de dispositivo desde una PC hasta un Smartphone con las mismas comodidades.
      </p>
    </div>
    <div class="reveal-modal" id="loginModal">
      <h1 style="font-family:tahoma">Login de usuario</h1>
      <hr />
      <form method="post" action="login.php"> 
        <a class="close-reveal-modal">x</a>
        <label for="user">Nombre de Usuario</label> 
        <br />
        <input type="text" id="user" placeholder="Nombre de Usuario" /> 
        <br />
        <label for="password">Contraseña</label> 
        <br />
        <input type="password" id="password" placeholder="Contraseña" /> 
        <a class="button" id="login" href="#">Acceder</a>
      </form>
    </div>
    <div class="row">
      <div class="panel twelve columns">
        
        <br />
        <br />
        <div align="center" class="twelve columns">
          <div class="panel twelve columns">
          	<h1>Registro de Usuarios</h1>
            <div class="six columns">
            <form class="custom"> 
                <label for="name">Nombre: <span style="color: red; text-shadow:1px 1px 1px #969696" title="Campo obligatorio"> *</span></label>
                <input id="name" name="nombre" type="text" class="obligado" >
                <label for="pat">Apellido Paterno:<span style="color: red; text-shadow:1px 1px 1px #969696" title="Campo obligatorio"> *</span></label>
                <input id="pat" name="paterno" type="text" class="obligado">
                <label for="mat">Apellido Materno:<span style="color: red; text-shadow:1px 1px 1px #969696" title="Campo obligatorio"> *</span></label>
                <input id="mat" name="materno" type="text" class="obligado">
                <label for="nick">Nickname:<span style="color: red; text-shadow:1px 1px 1px #969696" title="Campo obligatorio"> *</span></label>
                <input id="nick" name="nick" type="text" class="obligado" placeholder="tuNickname">
                <label for="pass">Password:<span style="color: red; text-shadow:1px 1px 1px #969696" title="Campo obligatorio"> *</span></label>
                <input id="pass" name="pass" type="password" class="obligado" placeholder="ingrese su password">
                <label for="conf">Confirme Password:<span style="color: red; text-shadow:1px 1px 1px #969696" title="Campo obligatorio"> *</span></label>
                <input id="conf" name="conf" type="password" class="obligado" placeholder="confirme su password">
                <label for="dir">Direccion:<span style="color: red; text-shadow:1px 1px 1px #969696" title="Campo obligatorio"> *</span></label>
                <input name="dir" id="dir" type="text"  class="obligado"placeholder="Calle Torres #315 Gomez Palacio, Dgo.">
                <label for="tel">Telefono:<span style="color: red; text-shadow:1px 1px 1px #969696" title="Campo obligatorio"> *</span></label>
                <input name="tel" id="tel" type="text"  class="obligado"placeholder="Telefono: 7321111">
                <label for="email">Direccion de Correo Electronico:<span style="color: red; text-shadow:1px 1px 1px #969696" title="Campo obligatorio"> *</span></label>
                <input name="email" id="email" type="text" class="obligado" placeholder="Ej.: youremail@mail.com">
                <label for="type">Tipo de Usuario</label>
                <select  id="type" name="type">  
                    <option value="1">Administrador</option>
                    <option value="2">Usuario Comun</option>
                </select>
                <br/>
                <br/>
                <a class="button" id="reg" >Registrar</a>
            </form>
       		</div>
       		<div class="five columns" style="text-align: left">
       			<h5>Breve descripcion del Formulario:</h5>
       			<p>Este es el formulario de Registro de usuarios para el sistema WebHelp.</p>
       			<br />
       			<p>
       				Los campos son los siguientes:
       			</p>
       			<ul>
       				<li>Nombre, Apellido paterno y Apellido materno: Contienen el Nombre del usuario.</li>
       				<li>Nickname: Es el nombre del usuario con el cual sera posible acceder al sistema.</li>
       				<li>Password y Confirme Password: Permiten registrar la contrasña con la que sera posible acceder al sistema.</li>
       				<li>Direccion: Forma parte de la informacion complementaria del usuario. En ella es posible registrar todos los datos necesarios de la direccion.</li>
       				<li>Direccion de Correo Electronico: Es la direccion de E-mail con la que sera posible comunicarnos contigo.</li>
       				<li>
       					Tipo de Usuario: Los tipos de usuario permiten definir que acciones podra realizar.
       					<ul>
       						<li>Administrador: Es el usuario que adminsitra las cuentas y mensajes del sistema. Posee todos los privilegios para realizar un control total del sistema.</li>
       						<li>Usuario comun: Es el usuario que realiza el registro de dudas, comentarios u otra informacion. Solamente administra sus datos y los mensajes que ha enviado.</li>
       					</ul>
       				</li>
       			</ul>
       		</div>
          </div>
        </div>
      </div>
    </div>
    <footer>
      <hr />
      <div class="six columns">
        <p>© 2013. Copyright en tramite.</p>
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
    <script type="text/javascript" charset="utf-8">
        $(document).ready(function(){
          var num = 0;

        	
          $('#nick').bind("keyup",function(){
            <?php 
            createArray($data);
            ?>
            console.log($(this).val());
            for (var i = usersArray.length - 1; i >= 0; i--) 
            {
              if (usersArray[i]== $(this).val().trim()) 
              {
                $("label:contains('Nickname')>span").text("Usuario ya registrado!!!");
                $(this).css('background-color','red');
                
              }else
              {
                $("label:contains('Nickname')>span").text("*");
                $(this).css('background-color','white'); 
              }
            };
          });

          $("#reg").click(function(){// Registro de Usuarios
            num =0;
        		$(".obligado").each(function(index) {
				      if($(this).val().length == 0)
              {
				  	   $(this).css('background-color','red');
               num++;
				      }
				    });
            if(num > 0){
              alert("Campos Vacios. Revise su Formulario.");
            }else{
              $.post("regUser.php",$('form').serialize(),function(info){
                  if(info == 0)
                  {
                    alert("Ha sucedido un Error.");
                  }
                  else
                  {
                    alert("Registro Satisfactorio.");
                    $('input').val('');
                  }
              });
            }
        	});


          $("#conf").bind('blur',function(){// Validacion de Contrasenia
            if($(this).val().length < 5 || $(this).val().trim() != $("#pass").val())
            {
              alert("Las Contraseñas no coinciden");
              $("#pass,#conf").css("background-color","red");
            }
            else
            {
              $("#pass,#conf").css("background-color","white");

            }
          });

          
          $(".obligado").keyup(function(){// Coloreado de Inputs
            if($(this).css("background-color") == "rgb(255, 0, 0)" && $(this).val().trim().length > 5)
            {
              $(this).css("background-color","white");
            }
          });

          $("#email").keyup(function(){// Validacion de direccion de Correo
            if (/^[A-Za-z][A-Za-z0-9_]*@[A-Za-z0-9_]+\.[A-Za-z0-9_.]+[A-za-z]$/.test($(this).val()))
            {
              $(this).css('background-color','white');
            }
            else
            {
                $(this).css('background-color','red');
            }
          });


        });
        
    </script>
  </body>
</html>
