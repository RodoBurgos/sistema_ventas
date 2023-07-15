<?php

    $sql = "SELECT u.id_usuarios, u.nombre,u.email,r.nombre as rol FROM usuarios as u INNER JOIN roles as r ON u.rol_id=r.id_roles";
    $query_usuarios = $connect->prepare($sql);
    $query_usuarios->execute();

    $datos_usuarios = $query_usuarios->fetchAll( PDO::FETCH_ASSOC);