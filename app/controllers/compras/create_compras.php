<?php
    include('../../config.php');

    $producto_id = $_GET['producto_id'];
    $num_compra = $_GET['num_compra'];
    $fecha_compra = $_GET['fecha_compra'];
    $proveedor_id = $_GET['proveedor_id'];
    $comprobante = $_GET['comprobante'];
    $cantidad = $_GET['cantidad'];
    $precio_unitario = $_GET['precio_unitario'];
    $total_compras = $_GET['total_compras'];
    $usuario_id = $_GET['usuario_id'];
    $stock_total = $_GET['stock_total'];

    $sql = "INSERT INTO compra_detalles(producto_id,num_compra,fecha_compra,proveedor_id,comprobante,cantidad,precio_unitario,total_compra,usuario_id,fyh_creacion) 
        VALUES('$producto_id','$num_compra','$fecha_compra','$proveedor_id','$comprobante','$cantidad','$precio_unitario','$total_compras','$usuario_id','$fecha')";

    $query = $connect->prepare($sql);

    if($query->execute())
    {
        $sql_producto = "UPDATE productos SET stock=$stock_total, fyh_actualizacion='$fecha' WHERE id_productos=$producto_id";
        $query_producto = $connect->prepare($sql_producto);
        $query_producto->execute();

        session_start();
        $_SESSION['mensaje'] = "Se registro correctamente la compra.";
        $_SESSION['icono'] = 'success';

        //header('location:'.$url.'/categorias/');
?>
        <script>
            location.href = "<?php echo $url;?>/compras/";
        </script>
<?php
    }
    else
    {
        //echo "Error al guardar";
        session_start();
        $_SESSION['mensaje'] = "Error al registrar la compra.";
        $_SESSION['icono'] = 'error';

        //header('location:'.$url.'/categorias/');
        ?>
        <script>
            location.href = "<?php echo $url;?>/compras/create.php";
        </script>
<?php
    }