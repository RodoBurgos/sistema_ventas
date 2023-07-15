<!--Modal detalle del producto-->
<div class="modal fade" id="modal-producto<?php echo $datos['id_compra_deta']; ?>">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title">Datos del Producto</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Codigo:</label>
                                    <input type="text" value="<?php echo $datos['codigo']; ?>" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Nombre del producto:</label>
                                    <input type="text" value="<?php echo $datos['producto']; ?>" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Descripción:</label>
                                    <input type="text" value="<?php echo $datos['descripcion']; ?>" class="form-control" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Categoria:</label>
                                    <input type="text" value="<?php echo $datos['categoria']; ?>" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Stock:</label>
                                    <input type="text" value="<?php echo $datos['stock']; ?>" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Stock mínimo:</label>
                                    <input type="text" value="<?php echo $datos['stock_minimo']; ?>" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Stock máximo:</label>
                                    <input type="text" value="<?php echo $datos['stock_maximo']; ?>" class="form-control" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Precio de compra:</label>
                                    <input type="text" value="<?php echo $datos['precio_compra']; ?>" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Precio de venta:</label>
                                    <input type="text" value="<?php echo $datos['precio_venta']; ?>" class="form-control" disabled>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Imagen del producto:</label>
                            <img src="<?php echo $url.'/productos/img_productos/'.$datos['imagen'];?>" width="100%" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>