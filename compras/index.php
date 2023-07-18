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
                    <h1 class="m-0">Listado de Compras</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../index.php">Inicio</a></li>
                        <li class="breadcrumb-item active">Listado de Compras</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <a href="create.php" class="btn btn-primary"><i class="fa fa-fas fa-plus"></i> Nueva Compra</a>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Compras registradas</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table table-responsive">
                                <table id="tabla_compras" class="table table-bordered table-striped table-sm">
                                        <thead>
                                            <tr>
                                                <th>Nº</th>
                                                <th>Nº Compra</th>
                                                <th>Fecha</th>
                                                <th>Comprobante</th>
                                                <th>Proveedor</th>
                                                <th>Producto</th>
                                                <th>Cantidad</th>
                                                <th>Precio de compra</th>
                                                <th>Total</th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                include('../app/controllers/compras/listado_compras.php');

                                                $numero = 0;
                                                foreach ($datos_compras as $datos)
                                                {
                                            ?>
                                                    <tr>
                                                        <td><?php echo $numero = $numero + 1; ?></td>
                                                        <td><?php echo $datos['num_compra']; ?></td>
                                                        <td><?php echo $datos['fecha_compra']; ?></td>
                                                        <td><?php echo $datos['comprobante']; ?></td>
                                                        <td><?php echo $datos['proveedor'].' '.$datos['apellido']; ?></td>
                                                        <td>
                                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-producto<?php echo $datos['id_compra_deta'];?>">
                                                                <?php echo $datos['producto'];?> 
                                                            </button>
                                                            
                                                            <?php include('modal_detalle_producto.php');?>
                                                        </td>
                                                        <td><?php echo $datos['cantidad']; ?></td>
                                                        <td><?php echo $datos['precio_unitario']; ?></td>
                                                        <td><?php echo $datos['total_compra']; ?></td>
                                                        <td>
                                                            <a href="show.php?id=<?php echo $datos['id_compra_deta'];?>" class="btn btn-secondary btn-sm" title="Ver"><i class="fas fa-eye"></i></a>
                                                            <a href="edit.php?id=<?php echo $datos['id_compra_deta'];?>" class="btn btn-success btn-sm" title="Editar"><i class="fas fa-edit"></i></a>
                                                            
                                                            <form action="../app/controllers/compras/destroy_compras.php" method="POST" class="formulario-eliminar">
                                                                <input type="text" name="id_compra" value="<?php echo $datos['id_compra_deta'];?>" hidden>
                                                                <input type="text" name="producto_id" value="<?php echo $datos['id_productos'];?>" hidden>
                                                                <input type="text" name="stock" value="<?php echo $datos['stock'];?>" hidden>
                                                                <input type="text" name="cantidad" value="<?php echo $datos['cantidad'];?>" hidden>
                                                                <button type="submit" class="btn btn-danger btn-sm" title="Eliminar"><i class="fas fa-trash"></i></button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                            <?php
                                                }
                                            ?>
                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <?php include('../layout/footer.php');?>

    <script>
        $(function() 
        {
            $("#tabla_compras").DataTable({
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
                "buttons": [
                    {
                        extend: 'collection',
                        text: 'Reportes',
                        orientation: 'landscape',
                        buttons:[
                            {
                                text:'Copiar',
                                extend:'copy',
                            },
                            {
                                extend: 'pdf',
                            },
                            {
                                extend: 'csv',
                            },
                            {
                                extend: 'excel'
                            },
                            {
                                text: 'Imprimir',
                                extend: 'print'
                            }
                        ]
                    },
                    {
                        extend:'colvis',
                        text: 'Visor de columnas',
                        collectionLayout: 'fixed three-column'
                    }]
            }).buttons().container().appendTo('#tabla_compras_wrapper .col-md-6:eq(0)');
        });

        //Eliminar Compra
        $('.formulario-eliminar').submit(function(e)
        {
            e.preventDefault();

            Swal.fire({
                title: '¿Estás seguro de eliminar está compra?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '¡Sí, elimínar!',
                cancelButtonText:'Cancelar'
                }).then((result) => {
                if (result.isConfirmed)
                {
                    this.submit();
                }
            });
        });
        
    </script>