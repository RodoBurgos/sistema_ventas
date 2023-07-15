<?php
    include('../../config.php');

    $nombre = $_POST['nombre'];

    $sql = "INSERT INTO roles(nombre,creacion) VALUES('$nombre','$fecha')";
    $query = $connect->prepare($sql);

    if($query->execute())
    {
        session_start();
        $_SESSION['mensaje'] = "Se registro correctamente el rol.";
        $_SESSION['icono'] = 'success';

        header('location:'.$url.'/roles/');
    }
    else
    {
        //echo "Error al guardar";
        session_start();
        $_SESSION['mensaje'] = "Error al registrar el rol.";
        $_SESSION['icono'] = 'error';

        header('location:'.$url.'/roles/create.php');
    }
