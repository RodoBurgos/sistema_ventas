<?php
  include('../app/config.php');
  include('../layout/sesion.php');
  include('../layout/header.php');

  //Mensaje de alerta
  if (isset($_SESSION['mensaje']))
  {
      $respuesta = $_SESSION['mensaje'];
      $icono = $_SESSION['icono'];
?>
      <script>
          Swal.fire({
              position: 'top-center',
              icon: '<?php echo $icono; ?>',
              title: '<?php echo $respuesta; ?>',
              showConfirmButton: false,
              timer: 2000
          });
      </script>
<?php
      //Destruye una sesion especifica
      unset($_SESSION['mensaje'],$_SESSION['icono']);
  }
?>

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Registrar un nuevo Rol</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../index.php">Inicio</a></li>
              <li class="breadcrumb-item"><a href="index.php">Listado de Roles</a></li>
              <li class="breadcrumb-item active">Registrar un nuevo Rol</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Nuevo Rol</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <form action="../app/controllers/roles/create_roles.php" method="post">
                      <div class="form-group">
                        <label for="nombre">Nombre del rol</label>
                        <input type="text" name="nombre" class="form-control" placeholder="Ingrese un nombre del rol..." required>
                      </div>

                      <div class="form-group">
                        <a href="index.php" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                      </div>
                    </form>
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