<?php 
    require '../clases/classMySql.php';
    session_start();
    $jsON = array(array());
    $i = 0;
    $conexion = new mySqlx();
    $qry = "SELECT * FROM usuario WHERE usuarioid= " . $_SESSION['userid'] . ";";
    $result = $conexion->consulta($qry);
    //echo mysql_num_rows($result);
    while ($d = mysqli_fetch_assoc($result)) {
        $jsON[$i] = $d; 
        $i++;
    }

    echo json_encode($jsON);

    
?>