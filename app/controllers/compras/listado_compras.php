<?php

    $sql = "SELECT c.id_compra_deta, c.num_compra, c.fecha_compra, prov.nombre as proveedor, prov.apellido, c.comprobante, c.cantidad, c.precio_compra as precio_unitario, c.total_compra, 
        prov.nombre as proveedor, prov.apellido,
        prod.id_productos, prod.codigo, prod.nombre as producto, prod.descripcion, prod.stock, prod.stock_minimo, prod.stock_maximo, prod.precio_compra, 
        prod.precio_venta, prod.imagen,
        cat.nombre as categoria 
        FROM compra_detalles as c 
        INNER JOIN proveedores as prov ON c.proveedor_id = prov.id_proveedores 
        INNER JOIN productos as prod ON prod.id_productos = c.producto_id 
        INNER JOIN categorias as cat ON prod.categoria_id = cat.id_categorias";

    $query_compras = $connect->prepare($sql);
    $query_compras->execute();

    $datos_compras = $query_compras->fetchAll( PDO::FETCH_ASSOC);