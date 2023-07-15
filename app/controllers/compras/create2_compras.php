<?php
$conexion=mysqli_connect("localhost","root","","sisventas_php");

try
{
    $conexion->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);

    //Compra
    $proveedor_id = $_POST['proveedor_id'];
    $tipo_comprobante = $_POST['tipo_comprobante'];
    $num_comprobante = $_POST['num_comprobante'];
    $total_compras = $_POST['total_compras'];
    $estado = 'Pagado';
    $usuario_id = $_POST['usuario_id'];

    $url = "http://localhost/Trabajos/sisventas_php";
    date_default_timezone_set("America/Argentina/Salta");
    $fecha = date("Y-m-d H:i:s");

    $sql="INSERT INTO compras (proveedor_id, tipo_comprobante, num_comprobante, total_compras, estado, usuario_id, fyh_creacion)
            VALUES ('$proveedor_id', '$tipo_comprobante', '$num_comprobante', '$total_compras', '$estado', '$usuario_id', '$fecha')";

    $query_compras=$conexion->query($sql);

    if (!$query_compras)
        throw new Exception($conexion->error);
    else
    {  
        //Detalle de compra
        $producto_id = $_POST['producto_id'];
        $cantidad = $_POST['cantidad_producto'];
        $precio_compra = $_POST['precio_compra'];
        $descuento = $_POST['descuento_'];
        $importe = $_POST['importe'];

        $cont = 0;

        while ($cont < count($producto_id))
        {
            $producto_id[$cont];
            $cantidad[$cont];
            $precio_compra[$cont];
            $descuento[$cont];
            $importe[$cont];

            $sql="INSERT INTO detalle_compras (producto_id, compra_id, cantidad, precio_compra, descuento, importe, fyh_creacion)
                VALUES ('$producto_id[$cont]',".$conexion->insert_id.",'$cantidad[$cont]','$precio_compra[$cont]','$descuento[$cont]','$importe[$cont]','$fecha[$cont]')";

            $cont = $cont + 1;
        }

        $query_detalle_compras=$conexion->query($sql);

        if (!$query_detalle_compras)
            throw new Exception($conexion->error);
            
        else
        {
            $conexion->commit();
            
            session_start();
            $_SESSION['mensaje'] = "Se registro correctamente la compra.";
            $_SESSION['icono'] = 'success';

            header('location:'.$url.'/compras/');
        }
    }
}
catch (Exception $ex)
{
    $conexion->rollback();
    echo "Ocurrió un error al intentar grabar la Venta! " . $ex->getMessage();
}
