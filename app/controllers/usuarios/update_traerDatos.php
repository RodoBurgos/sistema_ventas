<?php
    $id_usuario = $_GET['id'];

    $sql = "SELECT u.id_usuarios,u.nombre,u.email,r.nombre as rol FROM usuarios as u INNER JOIN roles as r ON u.rol_id=r.id_roles 
    WHERE u.id_usuarios=$id_usuario";
    $query_usuarios = $connect->prepare($sql);
    $query_usuarios->execute();

    $datos_usuarios = $query_usuarios->fetchAll( PDO::FETCH_ASSOC);

    foreach ($datos_usuarios as $datos)
    {
        $nombre = $datos['nombre'];
        $email = $datos['email'];
        $rol = $datos['rol'];
    }