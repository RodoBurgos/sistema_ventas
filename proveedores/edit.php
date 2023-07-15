<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/header.php');

include('../app/controllers/proveedores/show_proveedores.php');

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
    unset($_SESSION['mensaje'], $_SESSION['icono']);
}
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Actualizar Proveedor</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../index.php">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="index.php">Listado de Proveedores</a></li>
                        <li class="breadcrumb-item active">Actualizar Proveedor</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Actualizar Proveedor</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="../app/controllers/proveedores/update_proveedores.php" method="POST">
                                        <div class="row">
                                            <input type="text" name="id_proveedores" value="<?php echo $proveedor['id_proveedores']?>" class="form-control" hidden>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>CUIL:</label>
                                                    <input type="number" name="cuil" value="<?php echo $proveedor['cuil']?>" class="form-control" maxlength="11" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength)" placeholder="CUIL..." required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Nombre:</label>
                                                    <input type="text" name="nombre" value="<?php echo $proveedor['nombre']?>" class="form-control" placeholder="Nombre del proveedor..." required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Apellido:</label>
                                                    <input type="text" name="apellido" value="<?php echo $proveedor['apellido']?>" class="form-control" placeholder="Apellido del proveedor..." required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Dirección:</label>
                                                    <textarea name="direccion" class="form-control" cols="30" rows="3" placeholder="Dirección..." required><?php echo $proveedor['direccion']?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Email:</label>
                                                    <input type="email" name="email" value="<?php echo $proveedor['email']?>" class="form-control" placeholder="Email..." required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Celular:</label>
                                                    <input type="number" name="celular" value="<?php echo $proveedor['celular']?>" maxlength="11" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength)" class="form-control" placeholder="Celular" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Teléfono:</label>
                                                    <input type="number" name="telefono" maxlength="11" value="<?php echo $proveedor['telefono']?>" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength)" class="form-control" placeholder="Teléfono...">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Empresa:</label>
                                                    <input type="text" name="empresa" value="<?php echo $proveedor['empresa']?>" class="form-control" placeholder="Empresa...">
                                                </div>
                                            </div>
                                        </div>

                                        <hr>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <a href="index.php" class="btn btn-secondary">Cancelar</a>
                                                    <button type="submit" class="btn btn-success">Actualizar</button>
                                                </div>
                                            </div>
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