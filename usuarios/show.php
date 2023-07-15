<?php
  include('../app/config.php');
  include('../layout/sesion.php');
  include('../layout/header.php');
  include('../app/controllers/usuarios/show_usuarios.php');
?>

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Datos del Usuario: <b><?php echo $nombre;?></b></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../index.php">Inicio</a></li>
              <li class="breadcrumb-item"><a href="index.php">Listado de Usuarios</a></li>
              <li class="breadcrumb-item active">Datos del Usuario</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Datos del Usuario</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                        <label for="nombre">Nombre Completo</label>
                        <input type="text" value="<?php echo $nombre;?>" class="form-control" disabled>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" value="<?php echo $email;?>" class="form-control" disabled>
                    </div>

                    <div class="form-group">
                        <label for="rol">Rol del Usuario</label>
                        <input type="text" value="<?php echo $rol;?>" class="form-control" disabled>
                    </div>

                    <div class="form-group">
                        <a href="index.php" class="btn btn-secondary">Volver</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php include('../layout/footer.php'); ?>