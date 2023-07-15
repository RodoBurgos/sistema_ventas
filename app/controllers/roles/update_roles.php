<?php
    include('../../config.php');

    $id = $_POST['id_rol'];
    $nombre = $_POST['nombre'];

    $sql = "UPDATE roles SET nombre = '$nombre', actualizacion = '$fecha' WHERE id_roles = $id";
    $query = $connect->prepare($sql);

    if($query->execute())
    {   
        session_start();
        $_SESSION['mensaje'] = "Se actualizó correctamente el rol.";
        $_SESSION['icono'] = 'success';

        header('location:'.$url.'/roles/');
    }
    else
    {
        //echo "Error al actualizar";
        session_start();
        $_SESSION['mensaje'] = "Error al actualizar el rol.";
        $_SESSION['icono'] = 'error';

        header('location:'.$url.'/roles/edit.php?id='.$id);
    }
