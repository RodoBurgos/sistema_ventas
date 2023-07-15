<?php
    $server="localhost";
    $user="root";
    $pass="";
    $dbname="sisventas_php";
    
    $dsn="mysql:host=$server;dbname=$dbname";

    try
    {
        $connect=new PDO($dsn,$user,$pass);
        $connect->exec("SET character_set_connection = 'utf8'");
        $connect->exec("SET NAMES 'UTF8'");

        //echo "La conexión a la base de datos fue exitosa.";
    }
    catch(PDOException $error)
    {
        echo "Error al conectarse a la base de datos.";
    }

    $url = "http://localhost/Trabajos/sisventas_php";

    date_default_timezone_set("America/Argentina/Salta");
    $fecha = date("Y-m-d H:i:s");
?>