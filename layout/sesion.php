<?php

  session_start();
  if (isset($_SESSION['session_email'])) {
    //echo "Si existe la sesion".$_SESSION['session_email'];
    $sesion_email = $_SESSION['session_email'];

    $sql = "SELECT * FROM usuarios WHERE email='$sesion_email'";
    $query = $connect->prepare($sql);
    $query->execute();

    $usuarios = $query->fetchAll( PDO::FETCH_ASSOC);

    foreach ($usuarios as $usuario)
    {
      $id_usuarios = $usuario['id_usuarios'];
      $nombre_session = $usuario['nombre'];
    }
  }
  else
  {
    //echo "No existe la session";
    header('location: ' . $url . '/login');
  }
?>