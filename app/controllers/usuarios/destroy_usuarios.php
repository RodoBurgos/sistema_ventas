<?php
    include('../../config.php');

    $id_usuarios = $_POST['id_usuarios'];

    $sql = "DELETE FROM usuarios WHERE id_usuarios = $id_usuarios";
    $query_usuarios = $connect->prepare($sql);

    if ($query_usuarios->execute())
    {
        session_start();
        $_SESSION['mensaje'] = "Se elimino correctamente el usuario.";
        $_SESSION['icono'] = 'success';

        header('location:'.$url.'/usuarios/');
    }
    else
    {
        session_start();
        $_SESSION['mensaje'] = "Error al eliminar al usuario.";
        $_SESSION['icono'] = 'error';

        header('location:'.$url.'/usuarios/');
    }
    
    

    
