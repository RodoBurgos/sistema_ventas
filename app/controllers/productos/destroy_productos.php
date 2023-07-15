<?php
    include('../../config.php');

    $id_producto = $_POST['id_productos'];

    $sql = "DELETE FROM productos WHERE id_productos = $id_producto";
    $query_productos = $connect->prepare($sql);

    if ($query_productos->execute())
    {
        session_start();
        $_SESSION['mensaje'] = "Se elimino correctamente el producto.";
        $_SESSION['icono'] = 'success';

        header('location:'.$url.'/productos/');
    }
    else
    {
        session_start();
        $_SESSION['mensaje'] = "Error al eliminar el producto.";
        $_SESSION['icono'] = 'error';

        header('location:'.$url.'/productos/');
    }
    