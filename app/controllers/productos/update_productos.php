<?php
    include('../../config.php');

    $id = $_POST['id_productos'];
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $stock = $_POST['stock'];
    $stock_minimo = $_POST['stock_minimo'];
    $stock_maximo = $_POST['stock_maximo'];
    $precio_compra = $_POST['precio_compra'];
    $precio_venta = $_POST['precio_venta'];
    $categoria_id = $_POST['categoria_id'];

    $estado = "Activo";


    if ($_FILES['imagen']['name'] != null)
    {
        
        $nombreDelArchivo = date('Y-m-d H-i-s');
        $filename = $nombreDelArchivo."__".$_FILES['imagen']['name'];
        $location = "../../../productos/img_productos/".$filename;

        move_uploaded_file($_FILES['imagen']['tmp_name'], $location);

        $sql = "UPDATE productos SET nombre='$nombre',descripcion='$descripcion',stock='$stock',stock_minimo='$stock_minimo',stock_maximo='$stock_maximo',
            precio_compra='$precio_compra',precio_venta='$precio_venta',imagen='$filename',categoria_id='$categoria_id',fyh_actualizacion='$fecha' 
            WHERE id_productos = $id";

        $query = $connect->prepare($sql);

        if($query->execute())
        {
            session_start();
            $_SESSION['mensaje'] = "Se actualizó correctamente el producto.";
            $_SESSION['icono'] = 'success';

            header('location:'.$url.'/productos/');
        }
        else
        {
            //echo "Error al guardar";
            session_start();
            $_SESSION['mensaje'] = "Error al actualizar el producto.";
            $_SESSION['icono'] = 'error';

            header('location:'.$url.'/productos/edit.php?id='.$id);
        }
    }
    else
    {
        $sql = "UPDATE productos SET nombre='$nombre',descripcion='$descripcion',stock='$stock',stock_minimo='$stock_minimo',stock_maximo='$stock_maximo',
            precio_compra='$precio_compra',precio_venta='$precio_venta',categoria_id='$categoria_id',fyh_actualizacion='$fecha' 
            WHERE id_productos = $id";

        $query = $connect->prepare($sql);

        if($query->execute())
        {
            session_start();
            $_SESSION['mensaje'] = "Se actualizó correctamente el producto.";
            $_SESSION['icono'] = 'success';

            header('location:'.$url.'/productos/');
        }
        else
        {
            //echo "Error al guardar";
            session_start();
            $_SESSION['mensaje'] = "Error al actualizar el producto.";
            $_SESSION['icono'] = 'error';

            header('location:'.$url.'/productos/edit.php?id='.$id);
        }
    }

?>