<?php 
	session_start();
	if(!empty($_SESSION['name'])){
		$name = $_SESSION["name"];
	}else
	{
		$name = 'Usuario Invalido';
	}
	function alert($name)
	{
		if($name == 'Usuario Invalido')
		{
			echo "alert('Usuario Invalido. Redireccionando');\nlocation.href = '../index.html';";
		}
		else{
			echo "alert('Bienvenido ".$name.".');";
		}
	}
?>
<!DOCTYPE html>
<html >
  <head>
    <!-- Set the viewport width to device width for mobile -->
    <meta content="width=device-width" name="viewport" />
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>WebHelp - Bienvenido <?php echo $name; ?> </title>
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
    </style> 
    <script src="../js/modernizr.foundation.js"></script>
    <script src="../js/jquery.js"></script>    
    <script src="../js/foundation.min.js"></script>
    <script src="../js/app.js"></script>
    <script src="../js/jquery.customforms.js" type="text/javascript" charset="utf-8"></script>
  </head>
  <body>
    <nav class="top-bar">
      <ul>
        <li class="name">
          <h1><a href="#">Bienvenido a WebHelp tu plataforma de Ayuda</a></h1>
        </li>
        <li class="toggle-topbar"><br />
        </li>
      </ul>
      <section>
        <ul class="left">
          <li><a href="../index.php" class="a">Inicio</a></li>
          <li><a href="#" class="a">Captura de Boletines de ayuda</a></li>
          <li><a href="#" class="a">¿Nuevo en WebHelp?</a></li>
        </ul>
        <ul class="right">
        	<li class='has-dropdown'>
        		<a href='#'><?php echo $name; ?></a>
			<ul class="dropdown">
            	<li style='text-align:right'><a  href="modInfo.php?id=<?php echo $_SESSION['userid']; ?>" >Modificar mi Info</a></li>
            	<li style='text-align:right'><a href="../clases/logout.php">Cerrar Sesion</a></li>
          </ul>
        	</li>
        </ul>
      </section>
    </nav>
    <div class="reveal-modal" id="loginModal">
      <h1 style="font-family:tahoma">Login de usuario</h1>
      <hr />
      <form method="post" action="login.php"> <a class="close-reveal-modal">x</a>
        <label for="user">Nombre de Usuario</label> <br />
        <input type="text" id="user" placeholder="Nombre de Usuario" /> <br />
        <label for="password">Contraseña</label> <br />
        <input type="password" id="password" placeholder="Contraseña" /> <a class="button"
          id="login"
          href="#">Acceder</a>
      </form>
    </div>
    <div class="row">
    	<div class="twelve columns panel">
    		<h1>Bienvenido <?php echo $name; ?></h1>
    		<hr>
    		<h4 style='text-align:center;' >Eliga la Accion que desee realizar</h4>
      	<div class="six columns" style="text-align:center;">
  				<h5>Modificar mi Informacion</h5>
          <a href="modInfo.php" id="login" class="button" >Acceder</a>
  			</div>
    		<div class="six columns" style="text-align:center;">
    			<h5>Registrar comentario</h5>
          <a href="newMessage.php" id="login" class="button" >Acceder</a>
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
          /* jshint ignore:start */
            <?php 
              alert($name);
            ?>
          /* jshint ignore:end */
        });        

    </script>
  </body>
</html>
<!DOCTYPE html>
	<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<title>WebHelp - Bienvenido <?php echo $name; ?> </title>
			<link rel="stylesheet" href="">
			<script src='../js/jquery.js'></script>
			<script>
				$(document).ready(function(){
					
				});
			</script>
	</head>
	<body>
		
	</body>
</html>