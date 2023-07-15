<?php
    $id_proveedor = $_GET['id'];

    $sql = "SELECT p.id_proveedores, p.cuil,p.nombre, p.apellido, p.direccion, p.email, p.celular, p.telefono, p.empresa, u.nombre as usuario FROM proveedores as p 
            INNER JOIN usuarios as u ON p.usuario_id=u.id_usuarios WHERE p.id_proveedores = $id_proveedor";

    $query_proveedores = $connect->prepare($sql);
    $query_proveedores->execute();

    $datos_proveedores = $query_proveedores->fetchAll( PDO::FETCH_ASSOC);

    foreach ($datos_proveedores as $proveedor)
    {
        $proveedor['id_proveedores'];
        $proveedor['cuil'];
        $proveedor['nombre'];
        $proveedor['apellido'];
        $proveedor['direccion'];
        $proveedor['email'];
        $proveedor['celular'];
        $proveedor['telefono'];
        $proveedor['empresa'];
        $proveedor['usuario'];
    }