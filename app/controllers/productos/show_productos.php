<?php
    $id_producto = $_GET['id'];

    $sql = "SELECT p.*, c.nombre as categoria, u.nombre as usuario FROM productos as p INNER JOIN categorias as c ON p.categoria_id=c.id_categorias 
            INNER JOIN usuarios as u ON p.usuario_id=u.id_usuarios WHERE p.id_productos=$id_producto";
    $query_productos = $connect->prepare($sql);
    $query_productos->execute();

    $datos_productos = $query_productos->fetchAll( PDO::FETCH_ASSOC);

    foreach ($datos_productos as $producto)
    {
        $producto['id_productos'];
        $producto['codigo'];
        $producto['nombre'];
        $producto['categoria'];
        $producto['descripcion'];
        $producto['stock'];
        $producto['stock_minimo'];
        $producto['stock_maximo'];
        $producto['precio_compra'];
        $producto['precio_venta'];
        $producto['estado'];
        $producto['imagen'];
        $producto['usuario'];
    }