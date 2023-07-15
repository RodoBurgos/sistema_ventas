<?php
    include('../../config.php');

    $id = $_GET['id_categoria'];
    $nombre = $_GET['nombre'];

    $sql = "UPDATE categorias SET nombre = '$nombre', fyh_actualizacion = '$fecha' WHERE id_categorias = $id";
    $query = $connect->prepare($sql);

    if($query->execute())
    {   
        session_start();
        $_SESSION['mensaje'] = "Se actualizó correctamente la categoria.";
        $_SESSION['icono'] = 'success';

        //header('location:'.$url.'/roles/');
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
        $_SESSION['mensaje'] = "Error al actualizar la categoria.";
        $_SESSION['icono'] = 'error';

        //header('location:'.$url.'/categorias/');
        ?>
        <script>
            location.href = "<?php echo $url;?>/categorias";
        </script>
<?php
    }