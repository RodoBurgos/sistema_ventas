<?php
    $id_rol = $_GET['id'];

    $sql = "SELECT * FROM roles WHERE id_roles = $id_rol";
    $query_roles = $connect->prepare($sql);
    $query_roles->execute();

    $datos_roles = $query_roles->fetchAll( PDO::FETCH_ASSOC);

    foreach ($datos_roles as $datos)
    {
        $nombre = $datos['nombre'];
    }