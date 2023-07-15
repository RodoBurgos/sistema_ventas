<?php
  include('../app/config.php');
  include('../layout/sesion.php');
  include('../layout/header.php');

  include('../app/controllers/usuarios/update_traerDatos.php');

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
            <h1 class="m-0">Actualizar Usuario</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../index.php">Inicio</a></li>
              <li class="breadcrumb-item"><a href="index.php">Listado de Usuarios</a></li>
              <li class="breadcrumb-item active">Actualizar Usuario</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Actualizar Usuario</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <form action="../app/controllers/usuarios/update_usuarios.php" method="post">
                        <input type="text" name="id_usuarios" value="<?php echo $id_usuario;?>" hidden>
                      <div class="form-group">
                        <label for="nombre">Nombre Completo</label>
                        <input type="text" name="nombre" class="form-control" value="<?php echo $nombre; ?>" placeholder="Nombre completo del usuario..." required>
                      </div>

                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" value="<?php echo $email; ?>" placeholder="Ingrese su correo electronico..." required>
                      </div>

                      <div class="form-group">
                        <label for="rol_id">Seleccione un rol</label>
                        <select name="rol_id" class="form-control select2">
                          <?php
                            include('../app/controllers/roles/listado_roles.php');
                            foreach ($datos_roles as $datos_rol) 
                            {
                              $rol_tabla = $datos_rol['nombre'];
                          ?>    
                              <option value="<?php echo $datos_rol['id_roles'];?>"
                                <?php
                                  if($rol_tabla == $rol)
                                  {
                                ?>
                                    selected="selected"
                                <?php
                                  }
                                ?>
                              ><?php echo $rol_tabla?></option>
                          <?php
                            }
                          ?>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="contrasena">Contraseña</label>
                        <input type="text" name="contrasena" class="form-control">
                      </div>

                      <div class="form-group">
                        <label for="contrasena_2">Verificar contraseña</label>
                        <input type="text" name="contrasena_2" class="form-control">
                      </div>

                      <div class="form-group">
                        <a href="index.php" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-success">Actualizar</button>
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