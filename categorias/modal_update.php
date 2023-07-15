<!--Modal editar Categorias-->
<div class="modal fade" id="categoria-update<?php echo $datos['id_categorias']; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h4 class="modal-title">Actualizar Categoria</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="nombre">Nombre de la categoria</label>
                            <input type="text" class="form-control" id="nombre<?php echo $datos['id_categorias']; ?>" value="<?php echo $datos['nombre']; ?>" placeholder="Nombre de la categoria...">
                            <small id="nombre-cate<?php echo $datos['id_categorias']; ?>" style="color:red;display:none">* El campo nombre es requerido.</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" id="actualizar-categoria<?php echo $datos['id_categorias']; ?>" class="btn btn-success">Actualizar</button>
            </div>
        </div>
    </div>
</div>

<script>
    //Actualizar Categoria
    $('#actualizar-categoria<?php echo $datos['id_categorias']; ?>').click(function()
    {
        var nombre = $('#nombre<?php echo $datos['id_categorias']; ?>').val();
        var id_categoria = '<?php echo $datos['id_categorias']; ?>';

        var url = "../app/controllers/categorias/update_categorias.php";

        if (nombre == "")
        {
            $('#nombre<?php echo $datos['id_categorias']; ?>').focus();
            $('#nombre-cate<?php echo $datos['id_categorias']; ?>').css('display','block');
        }
        else
        {
            var url = "../app/controllers/categorias/update_categorias.php";

            $.get(url,{nombre:nombre,id_categoria:id_categoria}, function(datos)
            {
                $('#respuesta<?php echo $datos['id_categorias']; ?>').html(datos);
            });
        }
    });
</script>
<div id="respuesta<?php echo $datos['id_categorias']; ?>"></div>