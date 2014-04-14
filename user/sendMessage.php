<?php 
    session_start();
    require '../clases/classMySql.php';
    $mysql = new mySqlx();
    if ( isset($_POST['comentario']) )
        $mysql->regComment( htmlentities($_POST['comentario']), $_SESSION['userid'] );
?>