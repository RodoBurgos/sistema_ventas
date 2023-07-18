<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/header.php');

include('../app/controllers/productos/show_productos.php');

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
                    <h1 class="m-0">Actualizar Producto</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../index.php">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="index.php">Listado de Productos</a></li>
                        <li class="breadcrumb-item active">Actualizar Producto</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Actualizar Producto</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="../app/controllers/productos/update_productos.php" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <div class="row">
                                                    <input type="text" name="id_productos" value="<?php echo $producto['id_productos'];?>" hidden>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Codigo:</label>
                                                            <input type="text" name="codigo" value="<?php echo $producto['codigo'];?>" class="form-control" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Nombre del producto:</label>
                                                            <input type="text" name="nombre" value="<?php echo $producto['nombre'];?>" class="form-control" placeholder="Nombre del producto..." required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="categoria_id">Categoria:</label>
                                                            <select name="categoria_id" class="form-control selectpicker" data-live-search="true">
                                                                <?php
                                                                    include('../app/controllers/categorias/listado_categorias.php');

                                                                    foreach ($datos_categorias as $dato_cate) 
                                                                    {
                                                                        $cate_tabla = $dato_cate['nombre']
                                                                ?>    
                                                                        <option value="<?php echo $dato_cate['id_categorias'];?>"
                                                                            <?php
                                                                                if($cate_tabla == $producto['categoria'])
                                                                                {
                                                                            ?>
                                                                                    selected="selected"
                                                                            <?php
                                                                                }
                                                                            ?>
                                                                        >
                                                                            <?php echo $cate_tabla;?>
                                                                        </option>
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
                                                            <textarea name="descripcion" cols="50" rows="3" placeholder="Descripción del producto..."><?php echo $producto['descripcion'];?></textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="">Stock:</label>
                                                            <input type="number" name="stock" value="<?php echo $producto['stock'];?>" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="">Stock mínimo:</label>
                                                            <input type="number" name="stock_minimo" value="<?php echo $producto['stock_minimo'];?>" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="">Stock máximo:</label>
                                                            <input type="number" name="stock_maximo" value="<?php echo $producto['stock_maximo'];?>" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="">Precio de compra:</label>
                                                            <input type="number" name="precio_compra" value="<?php echo $producto['precio_compra'];?>" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="">Precio de venta:</label>
                                                            <input type="number" name="precio_venta" value="<?php echo $producto['precio_venta'];?>" class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Imagen del producto</label>
                                                    <input type="file" id="file" name="imagen" value="" class="form-control">
                                                    <br>
                                                    
                                                    <output id="list">
                                                        <img src="<?php echo $url.'/productos/img_productos/'.$producto['imagen']; ?>" width="100%">
                                                    </output>
                                                    
                                                    <script src="mostrar_imagen_productos.js"></script>

                                                </div>
                                            </div>
                                        </div>

                                        <hr>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <a href="index.php" class="btn btn-secondary">Cancelar</a>
                                                    <button type="submit" class="btn btn-success">Actualizar</button>
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