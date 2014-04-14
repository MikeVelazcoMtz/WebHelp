<?php
    require '../clases/classMySql.php';
    $mysql = new mySqlx();
    session_start();
    if (isset($_POST) && isset($_SESSION))
    {
        if($_POST['status'] != 2)
            $mysql->updateComment($_POST['status'],$_POST['id']);
        else
            $mysql->cancelComment($_POST['id'],$_SESSION['userid']);
    }
    else
        echo 0;
?>