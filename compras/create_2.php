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
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Nueva Compra</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="../app/controllers/compras/create2_compras.php" method="post">
                                <input type="hidden" name="usuario_id" value="<?php echo $id_usuarios; ?>">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Proveedor</label>
                                            <select name="proveedor_id" class="form-control selectpicker" data-live-search="true">
                                                <?php
                                                include('../app/controllers/proveedores/listado_proveedores.php');

                                                foreach ($datos_proveedores as $proveedor) {
                                                ?>
                                                    <option value="<?php echo $proveedor['id_proveedores']; ?>">
                                                        <?php echo $proveedor['nombre'] . ' ' . $proveedor['apellido']; ?>
                                                    </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Tipo de Comprobante</label>
                                            <input type="text" name="tipo_comprobante" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Nº de Comprobante</label>
                                            <input type="text" name="num_comprobante" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Fecha y Hora</label>
                                            <input type="text" value="<?php echo $fecha; ?>" class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <h5>Detalle de la compra</h5>
                                <div class="border border-primary">
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="">Producto</label>
                                                <select id="productoid" name="productoid" class="form-control selectpicker" data-live-search="true">
                                                    <?php
                                                    include('../app/controllers/productos/listado_productos.php');

                                                    foreach ($datos_productos as $produ) {
                                                    ?>
                                                        <option value="<?php echo $produ['id_productos']; ?>">
                                                            <?php echo $produ['nombre']; ?>
                                                        </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-2">
                                                <label for="">Cantidad</label>
                                                <input type="number" id="cantidad" name="cantidad" class="form-control" placeholder="Cantidad...">
                                            </div>

                                            <div class="form-group col-md-2">
                                                <label for="">Precio Unitario</label>
                                                <input type="number" id="p_compra" name="p_compra" class="form-control" placeholder="Precio de compra...">
                                            </div>

                                            <div class="form-group col-md-2">
                                                <label for="">Descuento %</label>
                                                <input type="number" id="descuento" name="descuento" value="0" class="form-control" placeholder="Descuento...">
                                            </div>

                                            <div class="form-group col-md-2">
                                                <button type="button" id="btn_agregar" class="btn btn-info">Agregar</button>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <table id="detalle" class="table table-striped table-bordered table-condensed table-hover table-sm">
                                                <thead style="background-color: #A9D0F5">
                                                    <th style="width: 10px;">Acción</th>
                                                    <th>Producto</th>
                                                    <th>Cantidad</th>
                                                    <th>Precio Compra</th>
                                                    <th>Descuento</th>
                                                    <th>Importe</th>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th colspan="6" class="text-right">
                                                            <h4 id="total">Total $ </h4>
                                                        </th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" id="guardar" class="btn btn-primary">Guardar Compra</button>
                                            <a href="index.php" class="btn btn-danger">Cancelar</a>
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

<?php include('../layout/footer.php'); ?>

<!--Para hacer el detalle de la compra-->
<script>
    $(document).ready(function() {
        $('#btn_agregar').click(function() {
            agregar();
        });
    });

    var cont = 0;
    total = "";
    subtotal = [];
    importe = [];

    $('#guardar').hide();

    function agregar() {
        producto_id = $('#productoid').val();
        producto = $('#productoid option:selected').text();
        cantidad = $('#cantidad').val();
        precio_compra = $('#p_compra').val();
        descuento = $('#descuento').val();

        if (producto_id != "" && cantidad != "" && precio_compra != "") {
            subtotal[cont] = (cantidad * precio_compra);
            porcentaje = (subtotal[cont] * descuento) / 100;

            importe[cont] = subtotal[cont] - porcentaje;

            total = parseFloat(total + importe[cont]);

            var fila = '<tr class="selected" id="fila' + cont + '"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar(' + cont + ');">X</button></td><td><input type="hidden" name="producto_id[]" value="' + producto_id + '">' + producto + '</td><td><input type="hidden" name="cantidad_producto[]" readonly class="form-control" value="' + cantidad + '">' + cantidad + '</td><td><input type="hidden" name="precio_compra[]" readonly class="form-control" value="' + precio_compra + '">' + precio_compra + '</td><td><input type="hidden" name="descuento_[]" class="form-control" readonly value="' + descuento + '">' + descuento + '%</td><td><input type="hidden" name="importe[]" class="form-control" readonly value="' + importe[cont] + '">' + importe[cont] + '</td></tr>';
            cont++;

            limpiar();


            $('#total').html('<input type="hidden" id="total_compras" name="total_compras" readonly class="form-control-plaintext" value="' + total + '"><td>TOTAL $ ' + total + '</td>');

            evaluar();

            $('#detalle').append(fila);
        } else {
            alert("Error. Debe ingresar un producto, una cantidad, etc.");
        }
    }

    function limpiar() {
        $('#cantidad').val("");
        $('#p_compra').val("");
        $('#descuento').val("");
    }

    function evaluar() {
        if (total > 0) {
            $('#guardar').show();
        } else {
            $('#guardar').hide();
        }
    }

    function eliminar(index) {
        if (confirm("¿Seguro quieres quitar este producto?")) {
            total = total - subtotal[index];
            $('#total').html(total);
            $('#fila' + index).remove();
            evaluar();

            alert("El producto se quito exitosamente.")
        } else {

        }

        /*alert("Seguro quieres eliminar?");
        total = total - subtotal[index];
        $('#total').html(total);
        $('#fila' + index).remove();
        evaluar();*/
    }
</script>