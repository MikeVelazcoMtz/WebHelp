<?php 
    session_start();
    require '../clases/classMySql.php';
    $mysql = new mySqlx();
    
    if ( isset( $_POST['action'] ) && isset( $_POST['id'] ) )
    {
        switch ($_POST['action'])
        {
           case 'deactivate':
               $mysql->cancelComment( $_POST['id'], $_SESSION['userid'] );
               break;
           case 'remove':
               $mysql->dropComment( $_POST['id'] );
               break;
        }   
    }
    else
        echo 0;
?>