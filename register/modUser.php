<?php 
  session_start();
  if(!empty($_SESSION['name']))
  {
    $name = $_SESSION["name"];
  }else
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
  input::-webkit-input-placeholder {
    text-shadow: black 0.1em 0.1em 0.2em;
    font-weight: bold;
  }
  input:-moz-placeholder 
  {
    text-shadow: black 0.1em 0.1em 0.2em;
    font-weight: bold;
  }
  div[id=msg]{
    background: red;
    border-radius: 5px;    
    margin-bottom: 15px;
    padding: 10px;
    font-family: Arial;
    font-weight: 700;
    color: white;
  }
  [id=msg]>div{
    float: right;
    border-radius: 5px;
    width: 15px;
    height: 15px;
    text-align: center;
  }
  [id=msg]>div:hover{
    background: rgb(207, 7, 7);

  }
</style> <script src="../js/modernizr.foundation.js"></script>
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
          <h1><a href="#">WebHelp: tu plataforma de Ayuda</a></h1>
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
    <div class="row">
        <div align="center" class="twelve columns">
          <div class="panel twelve columns">
          	<h1>Gestion de Usuarios</h1>
            <div class="twelve columns" >              
            </div>
            <form class="custom">
            <div class="four columns"> 
            	<label for="name">Nombre:</label>
            	<input type="hidden" name="id" id='id' />
                <input id="name" name="nombre" type="text" class="obligado" >
           		<label for="nick">Nickname:</label>
                <input id="nick" name="nick" type="text" class="obligado" placeholder="tuNickname">
                <label for="email">Direccion de Correo Electronico:</label>
                <input name="email" id="email" type="text" class="obligado" placeholder="Ej.: youremail@mail.com">
           </div>
            <div class="four columns">           
                <label for="pat">Apellido Paterno:</label>
                <input id="pat" name="paterno" type="text" class="obligado">                
                <label for="pass">Password:</label>
                <input id="pass" name="pass" type="text" class="obligado" placeholder="ingrese su password">             
                <label for="tel">Telefono:</label>
                <input name="tel" id="tel" type="text"  class="obligado"placeholder="Telefono: 7321111">               
            </div>
            <div class="four columns">
            	<label for="mat">Apellido Materno:</label>
                <input id="mat" name="materno" type="text" class="obligado">
                <label for="dir">Direccion:</label>
                <input name="dir" id="dir" type="text"  class="obligado"placeholder="Calle Torres #315 Gomez Palacio, Dgo.">
               <label for="type">Tipo de Usuario:</label>
                <select  id="type" name="type" >  
                    <option value="1" selected="selected">Administrador</option>
                    <option value="2">Usuario Comun</option>
                </select>  
            </div>
            <div class="twelve columns">
            	
                <br />
                <br />
              <a class="button" id="reg" >Registrar</a>
            </div>	           
            </form>
          </div>
        </div>
        <div id="result" class="twelve columns">
        <div id="msg">
          Para modificar un usuario solo es necesario hacer click sobre la fila. Automaticamente se llenara el formulario.
          <div>x</div>
        </div>
		  <table class="responsive">
    		<thead>
    			<tr>
    				<th>ID</th>
    				<th>Nombre</th>
    				<th>Usuario</th>
    				<th>Contraseña</th>
    				<th>Direccion</th>
    				<th>Telefono</th>
    				<th>E-mail</th>
    				<th>Tipo de Usuario</th>
    				<th>Eliminar</th>
    			</tr>
    		</thead>
    		<tbody></tbody>	
    	</table>
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
        $('.dropdown').css('width','150px');
        $(".dropdown>ul").css('width','150px');	

        function cargaTabla(){
          $.ajax({
            url: 'usersTable.php',
            dataType: 'json',
            type: 'post',
              success:  function(returnData){
                //console.log(returnData);
                var table;
                $.each(returnData, function(index) {
                  var type = "";  
                  switch(returnData[index].tipo_usuario)
                  {
                    case "1":
                      type = "Administrador";
                      break;
                    case "2":
                      type = "Usuario Comun";
                      break;
                  }
                    table += "<tr class='"+returnData[index].usuarioid+"'>";
                    table += "<td>"+returnData[index].usuarioid+"</td>";
                    table += "<td class='"+returnData[index].nombre+"."+returnData[index].ap_pat+"."+returnData[index].ap_mat+"'>"+returnData[index].nombre+" "+returnData[index].ap_pat+" "+returnData[index].ap_mat+"</td>";
                    table += "<td>";
                    table += returnData[index].usuario+"</td><td>"+returnData[index].pass+"</td>";
                    table += "<td>"+returnData[index].direccion+"</td>";
                    table += "<td>"+returnData[index].telefono+"</td>";
                    table += "<td>"+returnData[index].e_mail+"</td>";
                    table += "<td>"+type+"</td>";
                    table += "<td><input type='checkbox' class='del' value='"+returnData[index].usuarioid+"'></td>";
                    table += "</tr>";
                });
              
                $("#result>table>tbody").empty().append($("#result").text()+table);
                /* jshint ignore:start */
                <?php 
                  if(!empty($_GET['id']))
                  {
                    echo "$('tr.".$_GET['id']."').click();"; 
                  }
                ?>
                /* jshint ignore:end */
              },
              error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
              }    
            });// Carga de tabla de Usuarios
          }
        
          cargaTabla();

          
          $('.del').live('click', function(){//eliminacion de registros
            var id = $(this).val();
            if(confirm("¿Realmente desea eliminar al usuario seleccionado?"))
            {
              $.post('delUser.php',{id:$(this).val()},function(data){
                switch(parseInt(data, 10))
                {
                  case 0:
                    alert("Ha sucedido un Error.");                    
                    break;
                  case 1:
                    alert("Registro Satisfactorio");
                    $("tr."+id).remove();
                    $("input").val('');
                    cargaTabla();
                    break;
                  case 2:
                    alert("No puede eliminar a su propio usuario.");
                    break;
                  default:
                    alert("Ha sucedido un Error.");
                    break;
                }
              });
            }
          });

          $("#reg").click(function(){// Modificacion de Usuarios
            if($("#id").val().length !== 0)
            {
              num = 0;

              $(".obligado").each(function(index) {
                if($(this).val().length === 0)
                {
                  $(this).css('background-color','red');
                  num++;
                }
              });

              if(num > 0)
              {
                alert("Campos Vacios. Revise su Formulario.");
              }
              else
              {
                $.post("modifyUser.php",$('form').serialize(),function(info){
                 // console.log(info);
                  if(info === 0)
                  {
                    alert("Ha sucedido un Error.");
                  }
                  else
                  {
                    alert("Registro Satisfactorio.");
                    $('input').val('');
                    cargaTabla();
                  }
                });
              }
            }
            else
            {
              alert("Seleccione un registro a modificar.");
            }        
          });

          $(".obligado").keyup(function(){// Coloreado de Inputs
            if($(this).css("background-color") == "rgb(255, 0, 0)" && $(this).val().length > 5)
            {
              $(this).css("background-color","white");
            }
          });

          $("tr").live('click',function(){
            var clas = $(this).attr('class');
            $(".obligado").css('background-color','white');
            var info = [];
    
            $("."+clas+">td").each(function(index) {
              if(index != 1)
              {
                info[index] = $(this).text();
              }
              else
              {					
                info[index] = $(this).attr('class');
              }
              //console.log(info[index]+" "+index);
            });

            $("#id").val(info[0]);
            var name = info[1].split(".");
            $("#name").val(name[0]);
            $("#pat").val(name[1]);
            $("#mat").val(name[2]);
            $("#nick").val(info[2]);
            $("#pass").val(info[3]);
            $("#dir").val(info[4]);
            $("#tel").val(info[5]);
            $("#email").val(info[6]);

            switch(info[7])
            {
              case "Usuario Comun":
                $("#type").val(2);
                $(".dropdown>a.current").text("Usuario Comun");
                break;
              case "Administrador":
                $("#type").val(1);
                $(".dropdown>a.current").text("Administrador");
                break;
            }
          });	

          $("#msg>div").click(function(){
            $(this).parent().slideUp(1000);
          });

      });
        
    </script>
  </body>
</html>
