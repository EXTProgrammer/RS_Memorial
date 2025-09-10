<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "mural_upload";

    $mysqli = new mysqli($host, $user, $pass, $db);

    /*checar conexão*/
    if($mysqli->connect_errno){
        echo "Connect failed: " . $mysqli->connect_error;
        exit();
    }
?>