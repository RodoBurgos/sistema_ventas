<?php
    include('../../config.php');

    $id_proveedor = $_POST['id_proveedores'];

    $sql = "DELETE FROM proveedores WHERE id_proveedores = $id_proveedor";
    $query_proveedores = $connect->prepare($sql);

    if ($query_proveedores->execute())
    {
        session_start();
        $_SESSION['mensaje'] = "Se eliminó correctamente al proveedor.";
        $_SESSION['icono'] = 'success';

        header('location:'.$url.'/proveedores/');
    }
    else
    {
        session_start();
        $_SESSION['mensaje'] = "Error al eliminar al proveedor.";
        $_SESSION['icono'] = 'error';

        header('location:'.$url.'/proveedores/');
    }
    