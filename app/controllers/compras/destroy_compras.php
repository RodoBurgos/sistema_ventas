<?php
    include('../../config.php');

    $id_compra = $_POST['id_compra'];
    $producto_id = $_POST['producto_id'];
    $stock = $_POST['stock'];
    $cantidad = $_POST['cantidad'];

    $connect->beginTransaction();

    $sql = "DELETE FROM compra_detalles WHERE id_compra_deta = $id_compra";
    $query = $connect->prepare($sql);

    if ($query->execute())
    {
        $stock_anterior = $stock - $cantidad;
        
        $sql_producto = "UPDATE productos SET stock=$stock_anterior, fyh_actualizacion='$fecha' WHERE id_productos=$producto_id";
        $query_producto = $connect->prepare($sql_producto);
        $query_producto->execute();

        $connect->commit();

        session_start();
        $_SESSION['mensaje'] = "Se eliminó correctamente la compra.";
        $_SESSION['icono'] = 'success';

        header('location:'.$url.'/compras/');
    }
    else
    {
        $connect->rollBack();

        session_start();
        $_SESSION['mensaje'] = "Error al eliminar la compra.";
        $_SESSION['icono'] = 'error';

        header('location:'.$url.'/compras/');
    }
    