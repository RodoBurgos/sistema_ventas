<?php
    include('../../config.php');

    $cuil = $_POST['cuil'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $direccion = $_POST['direccion'];
    $email = $_POST['email'];
    $celular = $_POST['celular'];
    $telefono = $_POST['telefono'];
    $empresa = $_POST['empresa'];
    $usuario_id = $_POST['usuario_id'];

    $sql = "INSERT INTO proveedores(cuil,nombre,apellido,direccion,email,celular,telefono,empresa,usuario_id,fyh_creacion) 
        VALUES('$cuil','$nombre','$apellido','$direccion','$email','$celular','$telefono','$empresa','$usuario_id','$fecha')";

    $query = $connect->prepare($sql);

    if($query->execute())
    {
        session_start();
        $_SESSION['mensaje'] = "Se registro correctamente al proveedor.";
        $_SESSION['icono'] = 'success';

        header('location:'.$url.'/proveedores/');
    }
    else
    {
        //echo "Error al guardar";
        session_start();
        $_SESSION['mensaje'] = "Error al registrar al proveedor.";
        $_SESSION['icono'] = 'error';

        header('location:'.$url.'/proveedores/create.php');
    }
