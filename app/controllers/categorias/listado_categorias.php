<?php

    $sql = "SELECT * FROM categorias";
    $query_categorias = $connect->prepare($sql);
    $query_categorias->execute();

    $datos_categorias = $query_categorias->fetchAll( PDO::FETCH_ASSOC);