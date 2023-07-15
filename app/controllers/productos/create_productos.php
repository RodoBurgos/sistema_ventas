<?php
    include('../../config.php');

    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $stock = $_POST['stock'];
    $stock_minimo = $_POST['stock_minimo'];
    $stock_maximo = $_POST['stock_maximo'];
    $precio_compra = $_POST['precio_compra'];
    $precio_venta = $_POST['precio_venta'];
    $categoria_id = $_POST['categoria_id'];
    $usuario_id = $_POST['usuario_id'];

    $estado = "Activo";

    $imagen = $_POST['imagen'];

    $nombreDelArchivo = date('Y-m-d H-i-s');
    $filename = $nombreDelArchivo."__".$_FILES['imagen']['name'];
    $location = "../../../productos/img_productos/".$filename;

    move_uploaded_file($_FILES['imagen']['tmp_name'], $location);

    $sql = "INSERT INTO productos(codigo,nombre,descripcion,stock,stock_minimo,stock_maximo,precio_compra,precio_venta,estado,imagen,categoria_id,usuario_id,fyh_creacion) 
        VALUES('$codigo','$nombre','$descripcion','$stock','$stock_minimo','$stock_maximo','$precio_compra','$precio_venta','$estado','$filename','$categoria_id','$usuario_id','$fecha')";
    $query = $connect->prepare($sql);

    if($query->execute())
    {
        session_start();
        $_SESSION['mensaje'] = "Se registro correctamente el producto.";
        $_SESSION['icono'] = 'success';

        header('location:'.$url.'/productos/');
    }
    else
    {
        //echo "Error al guardar";
        session_start();
        $_SESSION['mensaje'] = "Error al registrar el producto.";
        $_SESSION['icono'] = 'error';

        header('location:'.$url.'/productos/create.php');
    }
?>