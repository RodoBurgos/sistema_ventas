<?php

    $sql = "SELECT p.*, c.nombre as categoria FROM productos as p INNER JOIN categorias as c ON p.categoria_id=c.id_categorias";
    $query_productos = $connect->prepare($sql);
    $query_productos->execute();

    $datos_productos = $query_productos->fetchAll( PDO::FETCH_ASSOC);