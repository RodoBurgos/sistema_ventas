<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/header.php');

include('../app/controllers/compras/cargar_compras.php');

//Mensaje de alerta
if (isset($_SESSION['mensaje'])) {
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
                    <h1 class="m-0">Actualizar Compra</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../index.php">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="index.php">Listado de Compras</a></li>
                        <li class="breadcrumb-item active">Actualizar Compra</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
                <div class="row">
                    <div class="col-md-9">
                        <div class="card card-success">
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
                                                                                        $('#seleccionar<?php echo $datos['id_productos']; ?>').click(function(e)
                                                                                        {
                                                                                            var producto_id = "<?php echo $datos['id_productos']; ?>";
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

                                                                                            $('#producto_id').val(producto_id);
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
                                                            <input type="text" hidden id="id_compra" value="<?php echo $compra['id_compra_deta'];?>" class="form-control">
                                                            <input type="text" hidden id="producto_id" value="<?php echo $compra['id_productos'];?>" class="form-control">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Codigo:</label>
                                                                    <input type="text" class="form-control" id="codigo" value="<?php echo $compra['codigo'];?>" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Nombre del producto:</label>
                                                                    <input type="text" class="form-control" id="nombre" value="<?php echo $compra['producto'];?>" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="categoria_id">Categoria:</label>
                                                                    <input type="text" class="form-control" id="categoria" value="<?php echo $compra['categoria'];?>" disabled>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="">Descripción</label>
                                                                    <textarea cols="50" rows="3" id="descripcion" disabled><?php echo $compra['descripcion'];?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="">Stock:</label>
                                                                    <input type="number" class="form-control" id="stock" value="<?php echo $compra['stock'];?>" style="background-color: yellow;" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="">Stock mínimo:</label>
                                                                    <input type="number" class="form-control" id="stock_minimo" value="<?php echo $compra['stock_minimo'];?>" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="">Stock máximo:</label>
                                                                    <input type="number" class="form-control" id="stock_maximo" value="<?php echo $compra['stock_maximo'];?>" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="">Precio de compra:</label>
                                                                    <input type="number" class="form-control" id="precio_compra" value="<?php echo $compra['precio_compra'];?>" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="">Precio de venta:</label>
                                                                    <input type="number" class="form-control" id="precio_venta" value="<?php echo $compra['precio_venta'];?>" disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="">Imagen del producto</label>
                                                            <br>
                                                            <img src="<?php echo $url.'/productos/img_productos/'.$compra['imagen'];?>" id="imagen" width="50%">
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
                                                                                            var proveedor_id = "<?php echo $datos['id_proveedores']; ?>";
                                                                                            var cuil = "<?php echo $datos['cuil']; ?>";
                                                                                            var nombre_proveedor = "<?php echo $datos['nombre']; ?>";
                                                                                            var apellido = "<?php echo $datos['apellido']; ?>";
                                                                                            var direccion = "<?php echo $datos['direccion']; ?>";
                                                                                            var email = "<?php echo $datos['email']; ?>";
                                                                                            var celular = "<?php echo $datos['celular']; ?>";
                                                                                            var telefono = "<?php echo $datos['telefono']; ?>";
                                                                                            var empresa = "<?php echo $datos['empresa']; ?>";

                                                                                            $('#proveedor_id').val(proveedor_id);
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
                                                <input type="text" hidden id="proveedor_id" value="<?php echo $compra['id_proveedores'];?>" class="form-control">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>CUIL:</label>
                                                        <input type="number" id="cuil" value="<?php echo $compra['cuil'];?>" class="form-control" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Nombre:</label>
                                                        <input type="text" id="nombre_proveedor" value="<?php echo $compra['proveedor'];?>" class="form-control" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Apellido:</label>
                                                        <input type="text" id="apellido" value="<?php echo $compra['apellido'];?>" class="form-control" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Dirección:</label>
                                                        <input type="text" id="direccion" value="<?php echo $compra['direccion'];?>" class="form-control" disabled>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Email:</label>
                                                        <input type="email" id="email" value="<?php echo $compra['email'];?>" class="form-control" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Celular:</label>
                                                        <input type="number" id="celular" value="<?php echo $compra['celular'];?>" class="form-control" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Teléfono:</label>
                                                        <input type="number" id="telefono" value="<?php echo $compra['telefono'];?>" class="form-control" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Empresa:</label>
                                                        <input type="text" id="empresa" value="<?php echo $compra['empresa'];?>" class="form-control" disabled>
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
                                <div class="card card-outline card-success">
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
                                                    <label for="">Nº Compra</label>
                                                    <input type="number" id="num_compra" value="<?php echo $compra['num_compra'];?>" style="text-align: center;" class="form-control" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Fecha de la compra</label>
                                                    <input type="date" id="fecha_compra" value="<?php echo $compra['fecha_compra'];?>" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Comprobante de la compra</label>
                                                    <input type="text" id="comprobante" value="<?php echo $compra['comprobante'];?>" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Stock Actual</label>
                                                    <?php
                                                        $stock_actual = $compra['stock'] - $compra['cantidad'];
                                                    ?>
                                                    <input type="number" id="stock_actual" value="<?php echo $stock_actual;?>" style="background-color: yellow;text-align:center;" class="form-control" disabled>
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
                                                    <input type="number" id="cantidad" value="<?php echo $compra['cantidad'];?>" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Precio Unitario</label>
                                                    <input type="number" id="precio_unitario" value="<?php echo $compra['precio_unitario'];?>" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Total de la compra</label>
                                                    <input type="number" id="total_compras" value="<?php echo $compra['total_compra'];?>" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button id="actualizar-compra" class="btn btn-success btn-block">Actualizar compra</button>
                                                <br>
                                                <a href="index.php" class="btn btn-danger btn-block">Cancelar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="respuesta-compra"></div>
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

    //Calcula el stock total
    $('#cantidad').keyup(function() {
        //alert('estamos presionando el input');
        sumar_stock();
        calcular_total();
    });

    sumar_stock();
    function sumar_stock()
    {
        var stock_actual = $('#stock_actual').val();
        var cantidad = $('#cantidad').val();

        stock_total = parseInt(stock_actual) + parseInt(cantidad);

        $('#stock_total').val(stock_total);
    }

    //Calcula el precio actual
    $('#precio_unitario').keyup(function() {
        calcular_total();
    });

    calcular_total();
    function calcular_total()
    {
        var cantidad = $('#cantidad').val();
        var precio_unitario = $('#precio_unitario').val();

        total_compra = precio_unitario * cantidad;

        $('#total_compras').val(parseFloat(total_compra).toFixed(2));
    }

    //Actualizar la compra
    $('#actualizar-compra').click(function()
    {
        var id_compra = $('#id_compra').val();
        var producto_id = $('#producto_id').val();
        var num_compra = $('#num_compra').val();
        var fecha_compra = $('#fecha_compra').val();
        var proveedor_id = $('#proveedor_id').val();
        var comprobante = $('#comprobante').val();
        var cantidad = $('#cantidad').val();
        var precio_unitario = $('#precio_unitario').val();
        var total_compras = $('#total_compras').val();
        var usuario_id = $('#usuario_id').val();
        var stock_total = $('#stock_total').val();

        if (producto_id == "")
        {
            $('#producto_id').focus();
            alert("Debe seleccionar un producto.");
        } 
        else if(fecha_compra == "")
        {
            $('#fecha_compra').focus();
            alert("Debe ingresar una fecha.");
        }
        else if(proveedor_id == "")
        {
            $('#proveedor_id').focus();
            alert("Debe seleccionar un proveedor.");
        }
        else if(comprobante == "")
        {
            $('#comprobante').focus();
            alert("Debe ingresar el tipo de comprobante.");
        }
        else if(cantidad == "")
        {
            $('#cantidad').focus();
            alert("Debe ingresar un cantidad.");
        }
        else if(precio_unitario == "")
        {
            $('#precio_unitario').focus();
            alert("Debe ingresar el precio unitario.");
        }
        else if(total_compras == "")
        {
            $('#total_compras').focus();
            alert("Debe ingresar el total de la compra.");
        }
        else
        {
            var url = "../app/controllers/compras/update_compras.php";

            $.get(url,{
                id_compra:id_compra,
                producto_id:producto_id,
                num_compra:num_compra,
                fecha_compra:fecha_compra,
                proveedor_id:proveedor_id,
                comprobante:comprobante,
                cantidad:cantidad,
                precio_unitario:precio_unitario,
                total_compras:total_compras,
                stock_total:stock_total
            },function(datos)
            {
                $('#respuesta-compra').html(datos);
            })
        }
    });
</script>