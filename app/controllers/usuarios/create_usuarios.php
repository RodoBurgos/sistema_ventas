<?php
    include('../../config.php');

    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $rol = $_POST['rol_id'];
    $contrasena = $_POST['contrasena'];
    $contrasena_2 = $_POST['contrasena_2'];

    if ($contrasena == $contrasena_2)
    {
        //Encripta la contraseña
        $contrasena = password_hash($contrasena, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios(nombre,email,contrasena,rol_id,creacion) VALUES('$nombre','$email','$contrasena','$rol','$fecha')";
        $query = $connect->prepare($sql);
        $query->execute();

        session_start();
        $_SESSION['mensaje'] = "Se registro correctamente el usuario.";
        $_SESSION['icono'] = 'success';

        header('location:'.$url.'/usuarios/');
    }
    else
    {
        //echo "Error las contraseñas no son iguales";
        session_start();
        $_SESSION['mensaje'] = "Error las contraseñas no son iguales.";
        $_SESSION['icono'] = 'error';

        header('location:'.$url.'/usuarios/create.php');
    }
