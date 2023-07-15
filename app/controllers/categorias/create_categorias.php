<?php
    include('../../config.php');

    $nombre = $_GET['nombre'];
    $usuario_id = $_GET['usuario_id'];

    $sql = "INSERT INTO categorias(nombre,usuario_id,fyh_creacion) VALUES('$nombre','$usuario_id','$fecha')";
    $query = $connect->prepare($sql);

    if($query->execute())
    {
        session_start();
        $_SESSION['mensaje'] = "Se registro correctamente la categoria.";
        $_SESSION['icono'] = 'success';

        //header('location:'.$url.'/categorias/');
?>
        <script>
            location.href = "<?php echo $url;?>/categorias";
        </script>
<?php
    }
    else
    {
        //echo "Error al guardar";
        session_start();
        $_SESSION['mensaje'] = "Error al registrar la categoria.";
        $_SESSION['icono'] = 'error';

        //header('location:'.$url.'/categorias/');
        ?>
        <script>
            location.href = "<?php echo $url;?>/categorias";
        </script>
<?php
    }