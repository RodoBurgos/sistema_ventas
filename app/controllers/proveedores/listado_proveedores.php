<?php

    $sql = "SELECT * FROM proveedores";
    $query_proveedores = $connect->prepare($sql);
    $query_proveedores->execute();

    $datos_proveedores = $query_proveedores->fetchAll( PDO::FETCH_ASSOC);