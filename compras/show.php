<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/header.php');

include('../app/controllers/compras/cargar_compras.php');

?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Detalle de la Compra: <b>Nº <?php echo $compra['num_compra'];?></b></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../index.php">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="index.php">Listado de Compras</a></li>
                        <li class="breadcrumb-item active">Detalle de la Compra</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
                <div class="row">
                    <div class="col-md-9">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Datos de la compra</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">

                                        <!--Detalle del producto buscado-->
                                        <div class="row" style="font-size: 12px;">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Codigo:</label>
                                                                    <input type="text" class="form-control" value="<?php echo $compra['codigo'];?>" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Nombre del producto:</label>
                                                                    <input type="text" class="form-control" value="<?php echo $compra['producto'];?>" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="categoria_id">Categoria:</label>
                                                                    <input type="text" class="form-control" value="<?php echo $compra['categoria'];?>" disabled>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="">Descripción</label>
                                                                    <textarea cols="50" rows="3" disabled><?php echo $compra['descripcion'];?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="">Stock:</label>
                                                                    <input type="number" class="form-control" value="<?php echo $compra['stock'];?>" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="">Stock mínimo:</label>
                                                                    <input type="number" class="form-control" value="<?php echo $compra['stock_minimo'];?>" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="">Stock máximo:</label>
                                                                    <input type="number" class="form-control" value="<?php echo $compra['stock_maximo'];?>" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="">Precio de compra:</label>
                                                                    <input type="number" class="form-control" value="<?php echo $compra['precio_compra'];?>" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="">Precio de venta:</label>
                                                                    <input type="number" class="form-control" value="<?php echo $compra['precio_venta'];?>" disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="">Imagen del producto</label>
                                                            <br>
                                                            <img src="<?php echo $url.'/productos/img_productos/'.$compra['imagen'];?>" width="50%">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>

                                        <!--Detalle del proveedor buscado-->
                                        <div class="row" style="font-size: 12px;">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>CUIL:</label>
                                                        <input type="number" value="<?php echo $compra['cuil'];?>" disabled class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Nombre:</label>
                                                        <input type="text" value="<?php echo $compra['proveedor'];?>" disabled class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Apellido:</label>
                                                        <input type="text" class="form-control" value="<?php echo $compra['apellido'];?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Dirección:</label>
                                                        <input type="text" class="form-control" value="<?php echo $compra['direccion'];?>" disabled>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Email:</label>
                                                        <input type="email" class="form-control" value="<?php echo $compra['email'];?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Celular:</label>
                                                        <input type="number" class="form-control" value="<?php echo $compra['celular'];?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Teléfono:</label>
                                                        <input type="number" class="form-control" value="<?php echo $compra['telefono'];?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Empresa:</label>
                                                        <input type="text" class="form-control" value="<?php echo $compra['empresa'];?>" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-outline card-info">
                                    <div class="card-header">
                                        <h3 class="card-title">Detalle de la compra</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row" style="font-size: 12px;">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Nº Compra</label>
                                                    <input type="number" style="text-align: center;" class="form-control" value="<?php echo $compra['num_compra'];?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="font-size: 12px;">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Fecha de la compra</label>
                                                    <input type="date" class="form-control" value="<?php echo $compra['fecha_compra'];?>" disabled>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Comprobante de la compra</label>
                                                    <input type="text" class="form-control" value="<?php echo $compra['comprobante'];?>" disabled>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Cantidad</label>
                                                    <input type="number" class="form-control" value="<?php echo $compra['cantidad'];?>" disabled>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Precio Unitario</label>
                                                    <input type="number" class="form-control" value="<?php echo $compra['precio_unitario'];?>" disabled>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Total de la compra</label>
                                                    <input type="number" class="form-control" value="<?php echo $compra['total_compra'];?>" disabled>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Usuario</label>
                                                    <input type="text" class="form-control" value="<?php echo $compra['usuario'];?>" disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <a href="index.php" class="btn btn-secondary btn-block">Volver</a>
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
