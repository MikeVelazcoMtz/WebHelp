<?php
    require 'clases/classMySql.php';
	$user = $_POST["user"];
	$pass = $_POST["password"];
	$conexion = new mySqlx();
	$type = $conexion->login($user,$pass);
	$_SESSION["welcome"] = FALSE;
	if(!empty($type['tipo_usuario']))
	{
		switch ($type['tipo_usuario']) 
		{
			case 1:
				echo "admin/index.php";
				break;
			
			case 2:
				echo 'user/index.php';
				break;
		}
	}
	else
		echo "0";
?>