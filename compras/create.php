<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/header.php');


?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Realizar una nueva Compra</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../index.php">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="index.php">Listado de Compras</a></li>
                        <li class="breadcrumb-item active">Realizar una nueva Compra</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Nueva Compra</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div style="display: flex;">
                                        <h5>Datos del producto</h5>
                                        <div style="width: 20px;"></div>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#buscar-producto">
                                            <i class="fas fa-search"></i> Buscar productos
                                        </button>

                                        <!--Modal buscar producto-->
                                        <div class="modal fade" id="buscar-producto">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-primary">
                                                        <h4 class="modal-title">Buscar Producto</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="table table-responsive">
                                                            <table id="tabla_productos" class="table table-bordered table-striped table-sm">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Nº</th>
                                                                        <th>Seleccionar</th>
                                                                        <th>Categoria</th>
                                                                        <th>Producto</th>
                                                                        <th>Imagen</th>
                                                                        <th>Descripcion</th>
                                                                        <th>Stock</th>
                                                                        <th>Stock Minimo</th>
                                                                        <th>Stock Maximo</th>
                                                                        <th>Precio Compra</th>
                                                                        <th>Precio Venta</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    include('../app/controllers/productos/listado_productos.php');

                                                                    $numero = 0;
                                                                    foreach ($datos_productos as $datos) {
                                                                    ?>
                                                                        <tr>
                                                                            <td><?php echo $numero = $numero + 1; ?></td>
                                                                            <td>
                                                                                <button class="btn btn-info" id="seleccionar<?php echo $datos['id_productos']; ?>">Seleccionar</button>
                                                                                <script>
                                                                                    $('#seleccionar<?php echo $datos['id_productos']; ?>').click(function(e) {
                                                                                        var codigo = "<?php echo $datos['codigo']; ?>";
                                                                                        var nombre = "<?php echo $datos['nombre']; ?>";
                                                                                        var categoria = "<?php echo $datos['categoria']; ?>";
                                                                                        var descripcion = "<?php echo $datos['descripcion']; ?>";
                                                                                        var stock = "<?php echo $datos['stock']; ?>";
                                                                                        var stock_minimo = "<?php echo $datos['stock_minimo']; ?>";
                                                                                        var stock_maximo = "<?php echo $datos['stock_maximo']; ?>";
                                                                                        var precio_compra = "<?php echo $datos['precio_compra']; ?>";
                                                                                        var precio_venta = "<?php echo $datos['precio_venta']; ?>";

                                                                                        var ruta = "<?php echo $url . '/productos/img_productos/' . $datos['imagen']; ?>";


                                                                                        $('#codigo').val(codigo);
                                                                                        $('#nombre').val(nombre);
                                                                                        $('#categoria').val(categoria);
                                                                                        $('#descripcion').val(descripcion);
                                                                                        $('#stock').val(stock);
                                                                                        $('#stock_actual').val(stock);
                                                                                        $('#stock_minimo').val(stock_minimo);
                                                                                        $('#stock_maximo').val(stock_maximo);
                                                                                        $('#precio_compra').val(precio_compra);
                                                                                        $('#precio_venta').val(precio_venta);

                                                                                        $('#imagen').attr({
                                                                                            src: ruta
                                                                                        });

                                                                                        $('#buscar-producto').modal('toggle');
                                                                                    });
                                                                                </script>
                                                                            </td>
                                                                            <td><?php echo $datos['categoria']; ?></td>
                                                                            <td><?php echo $datos['nombre']; ?></td>
                                                                            <td>
                                                                                <img src="<?php echo $url . '/productos/img_productos/' . $datos['imagen']; ?>" width="30px">
                                                                            </td>
                                                                            <td><?php echo $datos['descripcion']; ?></td>
                                                                            <td><?php echo $datos['stock']; ?></td>
                                                                            <td><?php echo $datos['stock_minimo']; ?></td>
                                                                            <td><?php echo $datos['stock_maximo']; ?></td>
                                                                            <td><?php echo $datos['precio_compra']; ?></td>
                                                                            <td><?php echo $datos['precio_venta']; ?></td>
                                                                        </tr>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    
                                    <!--Detalle del producto buscado-->
                                    <div class="row" style="font-size: 12px;">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Codigo:</label>
                                                                <input type="text" class="form-control" id="codigo" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Nombre del producto:</label>
                                                                <input type="text" class="form-control" id="nombre" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="categoria_id">Categoria:</label>
                                                                <input type="text" class="form-control" id="categoria" disabled>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="">Descripción</label>
                                                                <textarea cols="50" rows="3" id="descripcion" disabled></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="">Stock:</label>
                                                                <input type="number" class="form-control" id="stock" style="background-color: yellow;" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="">Stock mínimo:</label>
                                                                <input type="number" class="form-control" id="stock_minimo" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="">Stock máximo:</label>
                                                                <input type="number" class="form-control" id="stock_maximo" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="">Precio de compra:</label>
                                                                <input type="number" class="form-control" id="precio_compra" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="">Precio de venta:</label>
                                                                <input type="number" class="form-control" id="precio_venta" disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Imagen del producto</label>
                                                        <br>
                                                        <img src="" id="imagen" width="50%">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>

                                    <div style="display: flex;">
                                        <h5>Datos del proveedor</h5>
                                        <div style="width: 20px;"></div>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#buscar-proveedor">
                                            <i class="fas fa-search"></i> Buscar proveedor
                                        </button>

                                        <!--Modal buscar proveedor-->
                                        <div class="modal fade" id="buscar-proveedor">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-primary">
                                                        <h4 class="modal-title">Buscar Proveedor</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="table table-responsive">
                                                            <table id="tabla_proveedores" class="table table-bordered table-striped table-sm">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Nº</th>
                                                                        <th>Seleccionar</th>
                                                                        <th>CUIL</th>
                                                                        <th>Nombre</th>
                                                                        <th>Apellido</th>
                                                                        <th>Direccion</th>
                                                                        <th>Email</th>
                                                                        <th>Celular</th>
                                                                        <th>Telefono</th>
                                                                        <th>Empresa</th> 
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    include('../app/controllers/proveedores/listado_proveedores.php');

                                                                    $numero = 0;
                                                                    foreach ($datos_proveedores as $datos) {
                                                                    ?>
                                                                        <tr>
                                                                            <td><?php echo $numero = $numero + 1; ?></td>
                                                                            <td>
                                                                                <button class="btn btn-info" id="seleccionar_proveedor<?php echo $datos['id_proveedores']; ?>">Seleccionar</button>
                                                                                <script>
                                                                                    $('#seleccionar_proveedor<?php echo $datos['id_proveedores']; ?>').click(function(e)
                                                                                    {
                                                                                        var cuil = "<?php echo $datos['cuil']; ?>";
                                                                                        var nombre_proveedor = "<?php echo $datos['nombre']; ?>";
                                                                                        var apellido = "<?php echo $datos['apellido']; ?>";
                                                                                        var direccion = "<?php echo $datos['direccion']; ?>";
                                                                                        var email = "<?php echo $datos['email']; ?>";
                                                                                        var celular = "<?php echo $datos['celular']; ?>";
                                                                                        var telefono = "<?php echo $datos['telefono']; ?>";
                                                                                        var empresa = "<?php echo $datos['empresa']; ?>";

                                                                                        $('#cuil').val(cuil);
                                                                                        $('#nombre_proveedor').val(nombre_proveedor);
                                                                                        $('#apellido').val(apellido);
                                                                                        $('#direccion').val(direccion);
                                                                                        $('#email').val(email);
                                                                                        $('#celular').val(celular);
                                                                                        $('#telefono').val(telefono);
                                                                                        $('#empresa').val(empresa);

                                                                                        $('#buscar-proveedor').modal('toggle');
                                                                                    });
                                                                                </script>
                                                                            </td>
                                                                            <td><?php echo $datos['cuil']; ?></td>
                                                                            <td><?php echo $datos['nombre']; ?></td>
                                                                            <td><?php echo $datos['apellido']; ?></td>
                                                                            <td><?php echo $datos['direccion']; ?></td>
                                                                            <td><?php echo $datos['email']; ?></td>
                                                                            <td><?php echo $datos['celular']; ?></td>
                                                                            <td><?php echo $datos['telefono']; ?></td>
                                                                            <td><?php echo $datos['empresa']; ?></td>
                                                                        </tr>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
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
                                                    <input type="number" id="cuil" class="form-control" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Nombre:</label>
                                                    <input type="text" id="nombre_proveedor" class="form-control" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Apellido:</label>
                                                    <input type="text" id="apellido" class="form-control" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Dirección:</label>
                                                    <input type="text" id="direccion" class="form-control" disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Email:</label>
                                                    <input type="email" id="email" class="form-control" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Celular:</label>
                                                    <input type="number" id="celular" class="form-control" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Teléfono:</label>
                                                    <input type="number" id="telefono" class="form-control" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Empresa:</label>
                                                    <input type="text" id="empresa" class="form-control" disabled>
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
                            <div class="card card-outline card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Detalle de la compra</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <?php
                                                    include('../app/controllers/compras/listado_compras.php');

                                                    $contador_num_compra = 1;

                                                    foreach ($datos_compras as $datos)
                                                    {
                                                        $contador_num_compra = $contador_num_compra + 1;
                                                    }
                                                ?>
                                                <label for="">Nº Compra</label>
                                                <input type="number" name="num_compra" style="text-align: center;" class="form-control" value="<?php echo $contador_num_compra;?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Fecha de la compra</label>
                                                <input type="date" name="" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Comprobante de la compra</label>
                                                <input type="text" name="" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Stock Actual</label>
                                                <input type="number" id="stock_actual" style="background-color: yellow;text-align:center;" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Stock Total</label>
                                                <input type="number" id="stock_total" style="text-align:center;" class="form-control" readonly>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Cantidad</label>
                                                <input type="number" id="cantidad" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Precio Unitario</label>
                                                <input type="number" id="precio_unitario" name="" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Total de la compra</label>
                                                <input type="number" id="total_compras" name="" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="hidden" name="" value="<?php echo $id_usuarios;?>" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <a href="index.php" class="btn btn-danger">Cancelar</a>
                                            <button type="submit" class="btn btn-primary">Guardar compra</button>
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

<script>
    //Datatables de productos
    $(function() {
        $("#tabla_productos").DataTable({
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ de _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando 0 de 0 de un total de 0 registros.",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ registros",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
        }).buttons().container().appendTo('#tabla_productos_wrapper .col-md-6:eq(0)');
    });

    //Datatables de proveedores
    $(function() {
        $("#tabla_proveedores").DataTable({
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ de _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando 0 de 0 de un total de 0 registros.",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ registros",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
        }).buttons().container().appendTo('#tabla_proveedores_wrapper .col-md-6:eq(0)');
    });

    //Calcula el stock total y el precio actual
    $('#cantidad').keyup(function()
    {
        //alert('estamos presionando el input');
        var stock_actual = $('#stock_actual').val();
        var cantidad = $('#cantidad').val();

        stock_total = parseInt(stock_actual) + parseInt(cantidad);
        
        $('#stock_total').val(stock_total);
    });

    //Calcula el precio actual
    $('#precio_unitario').keyup(function()
    {
        var cantidad = $('#cantidad').val();
        var precio_unitario = $('#precio_unitario').val();

        total_compra = precio_unitario * cantidad;

        $('#total_compras').val(parseFloat(total_compra).toFixed(2));
    });
</script>