<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SisVenta PHP</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo $url;?>/public/template/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $url;?>/public/template/dist/css/adminlte.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo $url;?>/public/template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo $url;?>/public/template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo $url;?>/public/template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!--Select2-->
  <link rel="stylesheet" href="<?php echo $url;?>/public/template/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo $url;?>/public/template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- jQuery -->
  <script src="<?php echo $url;?>/public/template/plugins/jquery/jquery.min.js"></script>

  <!--Ionicons-->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!--SweetAlert2-->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <!--Bootstrap select-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
</head>

<body class="hold-transition sidebar-mini">
  <!--Mensaje de bienvenida al sistema
  <script>
    Swal.fire(
      'Bienvenido al sistema',
      '<?php //echo $sesion_email; ?>!',
      'success'
    )
  </script>-->
  
  <div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Sistema de Ventas PHP</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <?php echo $sesion_email;?>
            <span class="badge badge-warning navbar-badge"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-header bg-primary"><?php echo $nombre_session;?></span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fa fa-fas fa-user"></i> Mi Perfil
            </a>

            <div class="dropdown-divider"></div>
            <a href="<?php echo $url; ?>/app/controllers/login/cerrar_session.php" class="dropdown-item dropdown-footer bg-secondary" title="Cerrar Sesión">Cerrar Sesión</a>
          </div>
        </li>
      </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a href="#" class="brand-link">
        <img src="<?php echo $url;?>/public/img/logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Sistema de Ventas</span>
      </a>

      <div class="sidebar">
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="<?php echo $url;?>/" class="nav-link active">
                <i class="fas fa-house"></i> Inicio
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo $url;?>/usuarios" class="nav-link active">
                <i class="fa fa-fas fa-users"></i> Usuarios
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo $url;?>/roles" class="nav-link active">
                <i class="fa fa-fas fa-address-card"></i> Roles
              </a>
            </li>

            <li class="nav-item">
              <a href="<?php echo $url;?>/categorias" class="nav-link active">
                <i class="fa fa-fas fa-tags"></i> Categorias
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo $url;?>/productos" class="nav-link active">
                <i class="fa fa-fas fa-list"></i> Productos
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo $url;?>/proveedores" class="nav-link active">
                <i class="fa fa-fas fa-truck"></i> Proveedores
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo $url;?>/compras" class="nav-link active">
                <i class="fa fa-fas fa-cart-plus"></i> Compras
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </aside>
    