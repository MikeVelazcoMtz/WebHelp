<?php
	require '../clases/classMySql.php';
	$id = $_POST["id"];
	$conexion = new mySqlx();// Nueva Instancia de la clase...
	$result = $conexion->delUser($id);
	
	if (is_numeric($result)) 
	{
		echo $result;
	}
	else
	{
		echo 0;
	}
?>