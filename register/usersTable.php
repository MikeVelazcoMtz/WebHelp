<?php 
	require '../clases/classMySql.php';
	$jsON = array(array());
	$i = 0;
	$conexion = new mySqlx();
	$qry = "SELECT * FROM usuario;";
	$result = $conexion->consulta($qry);
	//echo mysql_num_rows($result);
	while ($d = mysqli_fetch_assoc($result)) {
		$jsON[$i] = $d;	
		$i++;
	}

	echo json_encode($jsON);

	
?>