<?php
    include('../../config.php');

    $id = $_POST['id_proveedores'];
    $cuil = $_POST['cuil'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $direccion = $_POST['direccion'];
    $email = $_POST['email'];
    $celular = $_POST['celular'];
    $telefono = $_POST['telefono'];
    $empresa = $_POST['empresa'];
    $usuario_id = $_POST['usuario_id'];

    $sql = "UPDATE proveedores SET cuil='$cuil',nombre='$nombre',apellido='$apellido',direccion='$direccion',email='$email',celular='$celular',
        telefono='$telefono',empresa='$empresa',fyh_actualizacion='$fecha' WHERE id_proveedores = $id";

    $query = $connect->prepare($sql);

    if($query->execute())
    {
        session_start();
        $_SESSION['mensaje'] = "Se actualizó correctamente al proveedor.";
        $_SESSION['icono'] = 'success';

        header('location:'.$url.'/proveedores/');
    }
    else
    {
        //echo "Error al guardar";
        session_start();
        $_SESSION['mensaje'] = "Error al actualizar al proveedor.";
        $_SESSION['icono'] = 'error';

        header('location:'.$url.'/proveedores/edit.php?id='.$id);
    }