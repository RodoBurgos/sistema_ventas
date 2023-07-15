<?php
    include('../../config.php');

    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];

    $contador = 0;

    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $query = $connect->prepare($sql);
    $query->execute();

    $usuarios = $query->fetchAll( PDO::FETCH_ASSOC);

    foreach ($usuarios as $usuario)
    {
        $contador = $contador + 1;
        $usuario['id_usuarios'];
        $email_tabla = $usuario['email'];
        $contrasena_tabla = $usuario['contrasena'];
    }

    //Verifica la contraseña incriptada
    if(($contador > 0) && (password_verify($contrasena, $contrasena_tabla)))
    {
        echo "Datos correctos.";
        session_start();
        $_SESSION['session_email'] = $email;

        header('location:'.$url.'/index.php');
    }
    else
    {
        //echo "Datos incorrectos, vuelva a intertarlo.";
        session_start();
        $_SESSION['mensaje'] = "Datos incorrectos, verifique sus datos.";

        header('location:'.$url.'/login');
    }
?>