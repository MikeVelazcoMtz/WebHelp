<?php  
	require '../clases/classMySql.php';
	$nombre = htmlentities($_POST["nombre"]);
	$paterno = htmlentities($_POST["paterno"]);
	$materno = htmlentities($_POST["materno"]);
	$user = htmlentities($_POST["nick"]);
	$pass = htmlentities($_POST["pass"]);
	$address = htmlentities($_POST["dir"]);
	$mail = htmlentities($_POST["email"]);
	$type = $_POST["type"];
	$tel = $_POST["tel"];
	
	$conexion = new mySqlx();
	$result = $conexion->regUser($nombre, $paterno, $materno, $user, $pass, $address, $tel, $mail, $type);
	
	if($result)
		echo 1;
	else
		echo 0;
?>