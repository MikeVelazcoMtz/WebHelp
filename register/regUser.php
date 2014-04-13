<?php  
	require '../clases/classMySql.php';
	$nombre = $_POST["nombre"];
	$paterno = $_POST["paterno"];
	$materno = $_POST["materno"];
	$user = $_POST["nick"];
	$pass = $_POST["pass"];
	$address = $_POST["dir"];
	$mail = $_POST["email"];
	$type = $_POST["type"];
	$tel = $_POST["tel"];
	
	$conexion = new mySqlx();// Nueva Instancia de la clase...
	$result = $conexion->regUser($nombre, $paterno, $materno, $user, $pass, $address, $tel, $mail, $type);
	
	if($result){
		echo 1;
	}else{
		echo 0;
	}
	// $conexion->regUser($nombre, $paterno, $materno, $user, $pass, $address, $tel, $mail, $type);
	
	

?>

