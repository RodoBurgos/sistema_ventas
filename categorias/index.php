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
                    <h1 class="m-0">Listado de Categorias</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../index.php">Inicio</a></li>
                        <li class="breadcrumb-item active">Listado de Categorias</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <!--Modal crear Categoria-->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#categoria-create">
              <i class="fa fa-plus"></i> Nueva Categoria
            </button>
            <div class="modal fade" id="categoria-create">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h4 class="modal-title">Nueva Categoria</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="nombre">Nombre de la categoria</label>
                                        <input type="text" class="form-control" id="nombre" placeholder="Nombre de la categoria...">
                                        <small id="nombre-cate" style="color:red;display:none">* El campo nombre es requerido.</small>

                                        <input type="text" class="form-control" id="usuario_id" value="<?php echo $id_usuarios;?>" hidden>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="button" id="guardar-categoria" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>

            <hr>
            <div class="row">
                <div class="col-lg-8">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Categorias registradas</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="tabla_categorias" class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Nº</th>
                                            <th>Nombre</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            include('../app/controllers/categorias/listado_categorias.php');

                                            $numero = 0;
                                            foreach ($datos_categorias as $datos)
                                            {
                                        ?>
                                                <tr class="text-center">
                                                    <td><?php echo $numero = $numero + 1; ?></td>
                                                    <td><?php echo $datos['nombre']; ?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#categoria-update<?php echo $datos['id_categorias'];?>" title="Editar">
                                                            <i class="fa fa-edit"></i>
                                                        </button>

                                                        <?php include('modal_update.php'); ?>
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
        //Datatables Categoria
        $(function() 
        {
            $("#tabla_categorias").DataTable({
                language: {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ de _END_ de un total de _TOTAL_ registros",
                    "infoEmpty": "Mostrando 0 de 0 de un total de 0 registros",
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
            }).buttons().container().appendTo('#tabla_categorias_wrapper .col-md-6:eq(0)');
        });

        //Guardar Categoria
        $('#guardar-categoria').click(function()
        {
            //alert('guardar funciona');
            var nombre = $('#nombre').val();
            var usuario_id = $('#usuario_id').val();

            if (nombre == "")
            {
                $('#nombre').focus();
                $('#nombre-cate').css('display','block');
            }
            else
            {
                var url = "../app/controllers/categorias/create_categorias.php";

                $.get(url,{nombre:nombre,usuario_id:usuario_id}, function(datos)
                {
                    $('#respuesta').html(datos);
                });
            }
        });
    </script>
    <div id="respuesta"></div>
