<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/header.php');

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
                    <h1 class="m-0">Registrar un nuevo Producto</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../index.php">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="index.php">Listado de Productos</a></li>
                        <li class="breadcrumb-item active">Registrar un nuevo Producto</li>
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
                            <h3 class="card-title">Nuevo Producto</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="../app/controllers/productos/create_productos.php" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Codigo:</label>
                                                            <?php
                                                                include('../app/controllers/productos/listado_productos.php');

                                                                //Codigo para el producto
                                                                function ceros($numero)
                                                                {
                                                                    $len = 0;
                                                                    $cantidad_ceros = 5;
                                                                    $aux = $numero;
                                                                    $pos = strlen($numero);
                                                                    $len = $cantidad_ceros - $pos;

                                                                    for ($i=0; $i<$len; $i++)
                                                                    {
                                                                        $aux = "0".$aux;
                                                                    }
                                                                    return $aux;
                                                                }
                                                                
                                                                $contador_id_productos = 1;

                                                                foreach ($datos_productos as $productos)
                                                                {
                                                                    $contador_id_productos = $contador_id_productos + 1;
                                                                }
                                                            ?>
                                                            <input type="text" name="codigo" value="<?php echo 'P-'.ceros($contador_id_productos);?>" class="form-control" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Nombre del producto:</label>
                                                            <input type="text" name="nombre" class="form-control" placeholder="Nombre del producto..." required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="categoria_id">Categoria:</label>
                                                            <select name="categoria_id" class="form-control select2" required>
                                                                <?php
                                                                    include('../app/controllers/categorias/listado_categorias.php');
                                                                    foreach ($datos_categorias as $categoria) 
                                                                    {
                                                                ?>    
                                                                    <option value="<?php echo $categoria['id_categorias'];?>"><?php echo $categoria['nombre'];?></option>
                                                                <?php
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">Descripción</label>
                                                            <textarea name="descripcion" cols="50" rows="3" placeholder="Descripción del producto..."></textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="">Stock:</label>
                                                            <input type="number" name="stock" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="">Stock mínimo:</label>
                                                            <input type="number" name="stock_minimo" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="">Stock máximo:</label>
                                                            <input type="number" name="stock_maximo" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="">Precio de compra:</label>
                                                            <input type="number" name="precio_compra" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="">Precio de venta:</label>
                                                            <input type="number" name="precio_venta" class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Imagen del producto</label>
                                                    <input type="file" id="file" name="imagen" class="form-control">
                                                    <br>
                                                    <output id="list"></output>

                                                    <script src="mostrar_imagen_productos.js"></script>

                                                    <input type="text" name="usuario_id" value="<?php echo $id_usuarios; ?>" hidden>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <a href="index.php" class="btn btn-secondary">Cancelar</a>
                                                    <button type="submit" class="btn btn-primary">Guardar</button>
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