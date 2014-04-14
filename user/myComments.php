<?php // CASOS : 0 = NO LEIDO, 1 = LEIDO, 2= CANCELADO 
    session_start();
    if(!empty($_SESSION['name']))
    {
        require '../clases/classMySql.php';
        $mysql = new mySqlx();
        $dataArray = $mysql->getComments($_SESSION['userid']);
        $name = $_SESSION["name"];
    }
    else
        require '../clases/logout.php';

    function inboxTable($dataList)
    {
        if ($dataList)
        {
            for ($i=0; $i < count($dataList) ; $i++) 
            { 

                echo "<tr>";
                echo "  <td>";
                echo $dataList[$i]['usuarioid'];
                echo "  </td>";
                echo "  <td>";
                echo $dataList[$i]['fecha'];
                echo "  </td>";
                echo "  <td>";
                echo $dataList[$i]['comentario'];
                echo "  </td>";
                echo "  <td>";
                switch ( $dataList[$i]['estatus'] )
                {
                    case 0:
                        echo "No leido";
                        echo "  </td>";
                        echo "  <td>";
                        echo "<a data-action='deactivate' data-id='" . $dataList[$i]['regid'] . "' href='#'>Desactivar</a>";
                        break;
                    case 1:
                        echo "Leido";
                        echo "  </td>";
                            echo "  <td>";
                            echo "<a data-action='deactivate' data-id='" . $dataList[$i]['regid'] . "' href='#'>Desactivar</a>";
                        break;
                    case 2:
                        echo "Cancelado";
                        echo "  </td>";
                        echo "  <td>";
                        echo "<a data-action='deactivate' data-id='0' href='#'>Desactivar</a>";
                        break;
                }
                // if ( $dataList[$i]['estatus'] == 0 )
                // {
                //     echo "      Activo";
                //     echo "  </td>";
                //     echo "  <td>";
                //     echo "<a data-action='deactivate' data-id='" . $dataList[$i]['regid'] . "' href='#'>Desactivar</a>";
                // }
                // else
                // {
                //     echo "      Activo";
                //     echo "  </td>";
                //     echo "  <td>";
                //     echo "<a data-action='deactivate' data-id='0' href='#'>Desactivar</a>";
                // }
                
                echo "/<a data-action='remove' data-id='" . $dataList[$i]['regid'] . "' href='#'>Eliminar</a>" ;
                echo "  </td>";
                echo "<tr>";
            } 
        }
        else
        {
            echo "<tr>";
            echo "  <td colspan='5'>";
            echo "    <h1 style='color:red'>No existe registro de comentarios.</h1>";
            echo "  </td>";
            echo "<tr>";
        }
    }

    function generateSelect($status)
    {
        
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
    <link rel="stylesheet" href="../css/responsive-tables.css" type="text/css" />
    <style type="text/css">
          body{
            background-color: #CCC
          }
    </style>

    <script src="../js/modernizr.foundation.js"></script>
    <script src="../js/jquery.js"></script>    
    <script src="../js/foundation.min.js"></script>
    <script src="../js/app.js"></script>
    <script src="../js/jquery.customforms.js" type="text/javascript"></script>
    <script src="../js/responsive-tables.js" type="text/javascript" ></script>
  </head>
  <body>
    <nav class="top-bar">
      <ul>
        <li class="name">
          <h1><a href="#">WebHelp: tu plataforma de Ayuda</a></h1>
        </li>
        <li class="toggle-topbar"><br />
        </li>
      </ul>
      <section>
        <ul class="left">
          <li><a href="index.php" class="a">Inicio</a></li>
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
    <div class="row">
        <div class="twelve columns panel">
            <h1>Mis Boletines de ayuda.</h1>
            <hr />
            <div id="result" >
                <table class="responsive">
                    <thead>
                        <tr>
                            <th style="min-width:20%;">Usuario</th>
                            <th style="min-width:20%;">Fecha</th>
                            <th style="min-width:20%;">Comentario</th>
                            <th style="min-width:20%;">Estado</th>
                            <th>Desactivar/Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            if (count($dataArray))
                                inboxTable($dataArray);
                        ?>
                    </tbody>    
                </table>
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
          <li><a href="http://www.wordpress.com">Wordpress</a></li>
          <li><a href="http://www.google.com.mx">Google</a></li>
          <li><a href="http://mx.yahoo.com">Yahoo</a></li>
          <li><a href="http://www.facebook.com">Facebook</a></li>
        </ul>
      </div>
    </footer>
    <script type="text/javascript" charset="utf-8">
        $(document).ready(function(){
            $('td a').click(function(event) {
                var action = $(this).data().action;
                var id     = $(this).data().id;
                if (id)
                {
                    message = "El boletin fue ";
                    message += (action === "deactivate") ? "desactivado satisfactoriamente." : "eliminado satisfactoriamente.";
                    $.post('modComments.php',{ 'action' : action, 'id' : id } , function(data, textStatus, xhr) {
                        switch( parseInt( data, 10 ) )
                        {
                            case 1:
                                alert(message);
                                location.reload();
                                break;
                            case 0:
                                alert("Ha sucedido un error. Recargando...");
                                location.reload();
                                break;
                        }
                    });
                }
                else
                {
                    alert("El boletin ya ha sido desactivado.");
                }
                
            });
        }); 
    </script>
  </body>
</html>
