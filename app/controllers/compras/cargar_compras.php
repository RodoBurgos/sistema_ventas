<?php

    $id_compra = $_GET['id'];

    $sql = "SELECT c.id_compra_deta, c.num_compra, c.fecha_compra, prov.nombre as proveedor, prov.apellido, c.comprobante, c.cantidad, c.precio_unitario, c.total_compra, 
        prov.id_proveedores,prov.cuil,prov.nombre as proveedor, prov.apellido,prov.direccion,prov.email,prov.celular,prov.telefono,prov.empresa,
        prod.id_productos, prod.codigo, prod.nombre as producto, prod.descripcion, prod.stock, prod.stock_minimo, prod.stock_maximo, prod.precio_compra, 
        prod.precio_venta, prod.imagen,
        cat.nombre as categoria, 
        u.nombre as usuario
        FROM compra_detalles as c 
        INNER JOIN proveedores as prov ON c.proveedor_id = prov.id_proveedores 
        INNER JOIN productos as prod ON prod.id_productos = c.producto_id 
        INNER JOIN categorias as cat ON prod.categoria_id = cat.id_categorias 
        INNER JOIN usuarios as u ON u.id_usuarios = c.usuario_id
        WHERE c.id_compra_deta=$id_compra";

    $query_compras = $connect->prepare($sql);
    $query_compras->execute();

    $datos_compras = $query_compras->fetchAll( PDO::FETCH_ASSOC);

    foreach ($datos_compras as $compra)
    {
        $compra['id_compra_deta'];
        
        $compra['id_productos'];
        $compra['codigo'];
        $compra['producto'];
        $compra['categoria'];
        $compra['descripcion'];
        $compra['stock'];
        $compra['stock_minimo'];
        $compra['stock_maximo'];
        $compra['precio_compra'];
        $compra['precio_venta'];
        $compra['imagen'];

        $compra['id_proveedores'];
        $compra['cuil'];
        $compra['proveedor'];
        $compra['apellido'];
        $compra['direccion'];
        $compra['email'];
        $compra['celular'];
        $compra['telefono'];
        $compra['empresa'];

        $compra['num_compra'];
        $compra['fecha_compra'];
        $compra['comprobante'];
        $compra['cantidad'];
        $compra['precio_unitario'];
        $compra['total_compra'];
        $compra['usuario'];
        
    }