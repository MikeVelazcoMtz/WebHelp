<?php
    require '../clases/classMySql.php';
    $mysql = new mySqlx();
    if (isset($_POST))
        $mysql->updateComment($_POST['status'],$_POST['id']);
    else
        echo 0;
?>