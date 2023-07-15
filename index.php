<?php
include('app/config.php');
include('layout/sesion.php');
include('layout/header.php');

include('app/controllers/compras/listado_compras.php');
include('app/controllers/usuarios/listado_usuarios.php');
include('app/controllers/productos/listado_productos.php');
include('app/controllers/proveedores/listado_proveedores.php');
?>

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Bienvenido al Sistema de Ventas</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active"></li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
              <?php
                  $contador_compras = 0;

                  foreach ($datos_compras as $datos_compra)
                  {
                    $contador_compras = $contador_compras + 1;
                  }
                ?>
                <h3><?php echo $contador_compras; ?></h3>

                <p>Compras Registradas</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Para ventas</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <?php
                  $contador_usuarios = 0;

                  foreach ($datos_usuarios as $datos_usu)
                  {
                    $contador_usuarios = $contador_usuarios + 1;
                  }
                ?>
                <h3><?php echo $contador_usuarios; ?></h3>

                <p>Usuarios Registrados</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?php echo $url;?>/usuarios" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <?php
                  $contador_productos = 0;

                  foreach ($datos_productos as $datos_produ)
                  {
                    $contador_productos = $contador_productos + 1;
                  }
                ?>
                <h3><?php echo $contador_productos; ?></h3>

                <p>Productos Registrados</p>
              </div>
              <div class="icon">
                <i class="fa fa-fas fa-list"></i>
              </div>
              <a href="<?php echo $url;?>/productos" class="small-box-footer">Más información  <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <?php
                  $contador_proveedores = 0;

                  foreach ($datos_proveedores as $datos_prove)
                  {
                    $contador_proveedores = $contador_proveedores + 1;
                  }
                ?>
                <h3><?php echo $contador_proveedores; ?></h3>

                <p>Proveedores Registrados</p>
              </div>
              <div class="icon">
                <i class="fa fa-fas fa-truck"></i>
              </div>
              <a href="<?php echo $url;?>/proveedores" class="small-box-footer">Más información  <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
        </div>
      </div>
    </section>
  </div>

<?php include('layout/footer.php'); ?>