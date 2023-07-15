<?php
    include('../../config.php');

    $id = $_POST['id_usuarios'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $rol_id = $_POST['rol_id'];
    $contrasena = $_POST['contrasena'];
    $contrasena_2 = $_POST['contrasena_2'];

    if($contrasena == "")
    {
        $sql = "UPDATE usuarios SET nombre = '$nombre', email = '$email', rol_id = '$rol_id', actualizacion = '$fecha' WHERE id_usuarios = $id";
            $query = $connect->prepare($sql);
            $query->execute();

            session_start();
            $_SESSION['mensaje'] = "Se actualizó correctamente el usuario.";
            $_SESSION['icono'] = 'success';

            header('location:'.$url.'/usuarios/');
    }
    else
    {
        if ($contrasena == $contrasena_2)
        {
            //Encripta la contraseña
            $contrasena = password_hash($contrasena, PASSWORD_DEFAULT);

            $sql = "UPDATE usuarios SET nombre = '$nombre', email = '$email', contrasena = '$contrasena', rol_id = '$rol_id', actualizacion = '$fecha' WHERE id_usuarios = $id";
            $query = $connect->prepare($sql);
            $query->execute();

            session_start();
            $_SESSION['mensaje'] = "Se actualizó correctamente el usuario.";
            $_SESSION['icono'] = 'success';

            header('location:'.$url.'/usuarios/');
        }
        else
        {
            //echo "Error las contraseñas no son iguales";
            session_start();
            $_SESSION['mensaje'] = "Error las contraseñas no son iguales.";
            $_SESSION['icono'] = 'error';

            header('location:'.$url.'/usuarios/edit.php?id='.$id);
        }
    }
