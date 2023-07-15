<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/header.php');

include('../app/controllers/proveedores/show_proveedores.php');

?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Datos del Proveedor: <b><?php echo $proveedor['nombre'].' '.$proveedor['apellido'];?></b></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../index.php">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="index.php">Listado de Proveedores</a></li>
                        <li class="breadcrumb-item active">Datos del Proveedor</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Datos del Proveedor</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>CUIL:</label>
                                                <input type="number" value="<?php echo $proveedor['cuil'];?>" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Nombre:</label>
                                                <input type="text" value="<?php echo $proveedor['nombre'];?>" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Apellido:</label>
                                                <input type="text" value="<?php echo $proveedor['apellido'];?>" class="form-control" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Dirección:</label>
                                                <textarea class="form-control" cols="30" rows="3" disabled><?php echo $proveedor['direccion'];?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Email:</label>
                                                <input type="email" value="<?php echo $proveedor['email'];?>" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Celular:</label>
                                                <input type="number" value="<?php echo $proveedor['celular'];?>" class="form-control" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Teléfono:</label>
                                                <input type="number" value="<?php echo $proveedor['telefono'];?>" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Empresa:</label>
                                                <input type="text" value="<?php echo $proveedor['empresa'];?>" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Usuario:</label>
                                                <input type="text" value="<?php echo $proveedor['usuario'];?>" class="form-control" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="row">
                                        <div class="col-md-4">
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
    </div>
</div>

<?php include('../layout/footer.php'); ?>