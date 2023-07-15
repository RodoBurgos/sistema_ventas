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
                    <h1 class="m-0">Listado de Usuarios</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../index.php">Inicio</a></li>
                        <li class="breadcrumb-item active">Listado de Usuarios</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <a href="create.php" class="btn btn-primary"><i class="fa fa-fas fa-plus"></i> Nuevo Usuario</a>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Usuarios registrados</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="tabla_usuarios" class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>Nº</th>
                                            <th>Nombre</th>
                                            <th>Email</th>
                                            <th>Rol del Usuario</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            include('../app/controllers/usuarios/listado_usuarios.php');

                                            $numero = 0;
                                            foreach ($datos_usuarios as $datos)
                                            {
                                        ?>
                                                <tr>
                                                    <td><?php echo $numero = $numero + 1; ?></td>
                                                    <td><?php echo $datos['nombre']; ?></td>
                                                    <td><?php echo $datos['email']; ?></td>
                                                    <td><?php echo $datos['rol']; ?></td>
                                                    <td>
                                                        <a href="show.php?id=<?php echo $datos['id_usuarios'];?>" class="btn btn-secondary btn-sm" title="Ver"><i class="fa fa-eye"></i></a>
                                                        <a href="edit.php?id=<?php echo $datos['id_usuarios'];?>" class="btn btn-success btn-sm" title="Editar"><i class="fas fa-edit"></i></a>
                                                        <a href="delete.php?id=<?php echo $datos['id_usuarios'];?>" class="btn btn-danger btn-sm" title="Eliminar"><i class="fas fa-trash"></i></a>
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

    <?php include('../layout/footer.php');?>

    <script>
        $(function() 
        {
            $("#tabla_usuarios").DataTable({
                language: {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ de _END_ de un total de _TOTAL_ registros",
                    "infoEmpty": "Mostrando 0 de 0 de un total de 0 usuarios",
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
            }).buttons().container().appendTo('#tabla_usuarios_wrapper .col-md-6:eq(0)');
        });
    </script>