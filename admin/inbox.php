<?php // CASOS : 0 = NO LEIDO, 1 = LEIDO, 2= CANCELADO 
  session_start();
  if(!empty($_SESSION['name']))
  {
    require '../clases/classMySql.php';
    $mysql = new mySqlx();
    $dataArray = $mysql->getComments();
    $name = $_SESSION["name"];
  }
  else
  {
    require '../clases/logout.php';
  }
  function inboxTable($dataList)
  {
    if ($dataList)
    {
      for ($i=0; $i < count($dataList) ; $i++) 
      { 
        echo "<tr>";
        echo "  <td>";
        echo $dataList[$i]['regid'];
        echo "  </td>";
        echo "  <td>";
        echo $dataList[$i]['usuarioid'];
        echo "  </td>";
        echo "  <td>";
        echo $dataList[$i]['fecha'];
        echo "  </td>";
        echo "  <td>";
        echo "<a data-comment='" . $dataList[$i]['comentario'] . "' data-regid='" . $dataList[$i]['regid'] . "'>comentario</a>" ;
        echo "  </td>";
        echo "  <td>";
        echo generateSelect($dataList[$i]['estatus'], $dataList[$i]['regid']);
        echo "  </td>";
        echo "<tr>";
      } 
    }
    else
    {
      echo "<tr>";
        echo "  <td colspan='4'>";
        echo "    <h1 style='color:red'>No existe registro de comentarios.</h1>";
        echo "  </td>";
        echo "<tr>";
    }
  }

  function generateSelect($status, $regid)
  {
    echo "<select  data-regid='" . $regid . "'>";
      switch ($status) 
      {
        case 0:
          echo "<option selected='selected' value='0'>";
          echo "No leido";
          echo "</option>";
          echo "<option value='1'>";
          echo "Leido";
          echo "</option>";
          echo "<option value='2'>";
          echo "Cancelado";
          echo "</option>";
          break;
        case 1:
          echo "<option value='0'>";
          echo "No leido";
          echo "</option value='1'>";
          echo "<option selected='selected'>";
          echo "Leido";
          echo "</option>";
          echo "<option value='2'>";
          echo "Cancelado";
          echo "</option>";
          break;
        case 2:
          echo "<option value='0'>";
          echo "No leido";
          echo "</option>";
          echo "<option value='1'>";
          echo "Leido";
          echo "</option>";
          echo "<option selected='selected' value='2'>";
          echo "Cancelado";
          echo "</option>";
          break;
      }
    echo "</select>";
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
    <!-- <link rel="stylesheet" href="../css/responsive-tables.css" type="text/css" /> -->
    <style type="text/css">
		  body{
		  	background-color: #CCC
		  }
	  </style>
	  <script src="../js/modernizr.foundation.js"></script>
    <script src="../js/jquery.js"></script>    
    <script src="../js/foundation.min.js"></script>
    <script src="../js/app.js"></script>
    <script src="../js/jquery.customforms.js" type="text/javascript" charset="utf-8"></script>
    <script src="../js/responsive-tables.js" type="text/javascript" charset="utf-8"></script>
  </head>
  <body>
    <nav class="top-bar">
      <ul>
        <li class="name">
          <h1><a href="#">WebHelp, tu plataforma de Ayuda</a></h1>
        </li>
        <li class="toggle-topbar"><br />
        </li>
      </ul>
      <section>
        <ul class="left">
          <li><a href="../admin/" class="a">Inicio</a></li>
        </ul>
      </section>
      <ul class="right">
          <li class='has-dropdown'>
            <a href='#'><?php echo $name; ?></a>
          <ul class="dropdown">
              <li style='text-align:right'><a  href="modUser.php?id=<?php echo $_SESSION['userid']; ?>" >Modificar mi Info</a></li>
              <li style='text-align:right'><a href="../clases/logout.php">Cerrar Sesion</a></li>
          </ul>
          </li>
        </ul>
    </nav>
    <!-- TERMINA LA SECCION  DEL MENU -->
    <!-- Inicia seccion de reveal -->
      <div id="myModal" class="reveal-modal">
        <h1 id="title"></h1>
        <p class="lead" id="comment"></p>
        <a class="close-reveal-modal">&#215;</a>
      </div>
    <!-- termina seccion de reveal -->
    <div class="row">
        <div id="result" class="twelve columns panel">
          <h1>Comentarios Registrados</h1>
          <hr />
          <form action="." class="custom">         
          	<table class="responsive">
      				<thead>
      					<tr>
                  <th>ID</th>
      						<th>Usuario</th>
      						<th>Fecha</th>
      						<th>Comentario</th>
      						<th>Estado</th>
      					</tr>
      				</thead>
        			<tbody>
        				<?php 
                  if (count($dataArray))
                    inboxTable($dataArray);
                ?>
        			</tbody>	
      		  </table>
          </form>
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
          $('a').click(function(event) {
            if ($(this).data().comment)
            {
              $("#title").text( "Comentario #" + $(this).data().regid );
              $("#comment").text( $(this).data().comment );
              $("#myModal").reveal();
            }
          });
          $("select").change(function(event) {

            if (confirm("¿Esta seguro que desea cambiar el Registro " + $(this).data().regid + " al estado de " + $(this).val() + "?"))
            {
              $.post('changeStatus.php', {status : $(this).val(), id: $(this).data().regid } , function(data, textStatus, xhr) {
                if(parseInt(data) === 1)
                  alert("Modificacion satisfactoria.");
                else
                  alert("La modificacion ha fallado");
                location.reload();
              });
            }
          });
        });	
    </script>
  </body>
</html>
