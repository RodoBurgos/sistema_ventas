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
                    <h1 class="m-0">Listado de Productos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../index.php">Inicio</a></li>
                        <li class="breadcrumb-item active">Listado de Productos</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <a href="create.php" class="btn btn-primary"><i class="fa fa-fas fa-plus"></i> Nuevo Producto</a>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Productos registrados</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table table-responsive">
                                <table id="tabla_productos" class="table table-bordered table-striped table-sm">
                                        <thead>
                                            <tr>
                                                <th>Nº</th>
                                                <th>Codigo</th>
                                                <th>Categoria</th>
                                                <th>Producto</th>
                                                <th>Imagen</th>
                                                <th>Descripcion</th>
                                                <th>Stock</th>
                                                <th>Stock Minimo</th>
                                                <th>Stock Maximo</th>
                                                <th>Precio Compra</th>
                                                <th>Precio Venta</th>
                                                <th>Estado</th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                include('../app/controllers/productos/listado_productos.php');

                                                $numero = 0;
                                                foreach ($datos_productos as $datos)
                                                {
                                            ?>
                                                    <tr>
                                                        <td><?php echo $numero = $numero + 1; ?></td>
                                                        <td><?php echo $datos['codigo']; ?></td>
                                                        <td><?php echo $datos['categoria']; ?></td>
                                                        <td><?php echo $datos['nombre']; ?></td>
                                                        <td>
                                                            <img src="<?php echo $url.'/productos/img_productos/'.$datos['imagen']; ?>" width="30px">
                                                        </td>
                                                        <td><?php echo $datos['descripcion']; ?></td>
                                                        <td><?php echo $datos['stock']; ?></td>
                                                        <td><?php echo $datos['stock_minimo']; ?></td>
                                                        <td><?php echo $datos['stock_maximo']; ?></td>
                                                        <td><?php echo $datos['precio_compra']; ?></td>
                                                        <td><?php echo $datos['precio_venta']; ?></td>
                                                        <td><?php echo $datos['estado']; ?></td>
                                                        <td>
                                                            <a href="show.php?id=<?php echo $datos['id_productos'];?>" class="btn btn-secondary btn-sm" title="Ver"><i class="fas fa-eye"></i></a>
                                                            <a href="edit.php?id=<?php echo $datos['id_productos'];?>" class="btn btn-success btn-sm" title="Editar"><i class="fas fa-edit"></i></a>
                                                            
                                                            <form action="../app/controllers/productos/destroy_productos.php" method="POST" class="formulario-eliminar">
                                                                <input type="text" name="id_productos" value="<?php echo $datos['id_productos'];?>" hidden>
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
            }).buttons().container().appendTo('#tabla_productos_wrapper .col-md-6:eq(0)');
        });

        //Eliminar Producto
        $('.formulario-eliminar').submit(function(e)
        {
            e.preventDefault();

            Swal.fire({
                title: '¿Estás seguro de eliminar éste producto?',
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