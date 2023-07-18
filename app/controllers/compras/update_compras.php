<?php
    include('../../config.php');

    $id_compra = $_GET['id_compra'];
    $producto_id = $_GET['producto_id'];
    $num_compra = $_GET['num_compra'];
    $fecha_compra = $_GET['fecha_compra'];
    $proveedor_id = $_GET['proveedor_id'];
    $comprobante = $_GET['comprobante'];
    $cantidad = $_GET['cantidad'];
    $precio_unitario = $_GET['precio_unitario'];
    $total_compras = $_GET['total_compras'];
    $stock_total = $_GET['stock_total'];

    $connect->beginTransaction();

    $sql = "UPDATE compra_detalles SET producto_id='$producto_id', num_compra='$num_compra', fecha_compra='$fecha_compra', proveedor_id='$proveedor_id', 
        comprobante='$comprobante', cantidad='$cantidad', precio_unitario='$precio_unitario', total_compra='$total_compras', fyh_actualizacion='$fecha' WHERE id_compra_deta=$id_compra";

    $query = $connect->prepare($sql);

    if($query->execute())
    {
        $sql_producto = "UPDATE productos SET stock=$stock_total, fyh_actualizacion='$fecha' WHERE id_productos=$producto_id";
        $query_producto = $connect->prepare($sql_producto);
        $query_producto->execute();

        $connect->commit();

        session_start();
        $_SESSION['mensaje'] = "Se actualizó correctamente la compra.";
        $_SESSION['icono'] = 'success';
?>
        <script>
            location.href = "<?php echo $url;?>/compras/";
        </script>
<?php
    }
    else
    {
        $connect->rollBack();

        session_start();
        $_SESSION['mensaje'] = "Error al actualizar la compra.";
        $_SESSION['icono'] = 'error';

?>
        <script>
            location.href = "<?php echo $url.'/compras/edit.php?id='.$id_compra;?>";
        </script>
<?php
    }