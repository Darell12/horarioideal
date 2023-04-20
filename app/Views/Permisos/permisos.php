<div class="container  mt-4 shadow rounded-4">
    <div>
        <h1 class="titulo_Vista text-center"></h1>
    </div>
    <div>
        <button type="button" onclick="seleccionaPermisos(<?php echo 1 . ',' . 1 ?>);" class="btn btn-outline-success " data-bs-toggle="modal" data-bs-target="#PermisosModal"><i class="bi bi-plus-circle-fill"></i> Agregar</button>
        <a href="<?php echo base_url('/permisos/eliminados'); ?>"><button type="button" class="btn btn-outline-secondary"><i class="bi bi-file-x"></i> Eliminados</button></a>
        <a href="<?php echo base_url('/principal'); ?>"><button class="btn btn-outline-primary"><i class="bi bi-arrow-return-left"></i> Regresar</button></a>
    </div>

    <br>
    <div class="table-responsive" style="overflow:scroll-vertical;overflow-y: scroll !important; height: 600px;">
        <table class="table table-bordered table-sm table-hover" id="tablePaises" width="100%" cellspacing="0">
            <thead class="table-dark">
                <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">Rol</th>
                    <th class="text-center">Acción</th>
                    <th class="text-center">Estado</th>
                    <th class="text-center" colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody style="font-family:Arial;font-size:12px;" class="table-group-divider">
                <?php foreach ($datos as $valor) { ?>
                    <tr>
                        <th class="text-center"><?php echo $valor['id_permiso']; ?></th>
                        <th class="text-center"><?php echo $valor['rol']; ?></th>
                        <th class="text-center"><?php echo $valor['accion']; ?></th>
                        <th class="text-center">
                            <?php echo $valor['estado'] == 'A' ?  '<span class="text-success"> Activo </span>' : 'Inactivo'; ?>
                        </th>
                        <th class="grid grid text-center" colspan="2">

                            <button class="btn btn-outline-primary" onclick="seleccionaPermisos(<?php echo $valor['id_permiso'] . ',' . 2 ?>);" data-bs-toggle="modal" data-bs-target="#PermisosModal">

                                <i class="bi bi-pencil"></i>

                            </button>

                            <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modal-confirma" data-href="<?php echo base_url('/estado_permisos') . '/' . $valor['id_permiso'] . '/' . 'E'; ?>"><i class="bi bi-trash3"></i></button>
                        </th>

                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>
    <!-- Modal -->
    <form method="POST" action="<?php echo base_url('/permisos_insertar'); ?>" autocomplete="off" class="needs-validation" id="formulario" novalidate>
        <div class="modal fade" id="PermisosModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="tituloModal">Añadir Permiso</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <div class="row">
                                <div class="">
                                    <label class="col-form-label">Rol:</label>
                                    <select class="form-select form-select" name="id_rol" id="rol" required>
                                        <option value="">Seleccione un Rol</option>
                                        <?php foreach ($roles as $rol) { ?>
                                            <option value="<?php echo $rol['id_rol']; ?>"><?php echo $rol['nombre']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="">
                                    <label class="col-form-label">Acciones:</label>
                                    <select class="form-select form-select" name="id_rol" id="accion" required>
                                        <option value="">Seleccione una acción</option>
                                        <?php foreach ($acciones as $accion) { ?>
                                            <option value="<?php echo $accion['id_acciones']; ?>"><?php echo $accion['nombre']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <input type="text" id="tp" name="tp" hidden>
                                <input type="text" id="id" name="id" hidden>


                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-outline-primary" id="btn_Guardar">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
    </form>


    <!-- Modal Confirma Eliminar -->
    <!-- Modal Elimina -->
</div>

<div class="modal fade" id="modal-confirma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div style="text-align:center;" class="modal-header">
                <h5 style="color:#98040a;font-size:20px;font-weight:bold;" class="modal-title" id="exampleModalLabel">Eliminación de Registro</h5>

            </div>
            <div style="text-align:center;font-weight:bold;" class="modal-body">
                <p>Seguro Desea Eliminar éste Registro?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary close" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-outline-danger btn-ok">Confirmar</a>
            </div>
        </div>
    </div>
</div>

<script>
    $('#modal-confirma').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });

    function seleccionaPermisos(id, tp) {
        if (tp == 2) {
            dataURL = "<?php echo base_url('/permisos/buscarPermiso'); ?>" + "/" + id;
            $.ajax({
                type: "POST",
                url: dataURL,
                dataType: "json",
                success: function(rs) {
                    console.log(rs)
                    $("#tp").val(2);
                    $("#id").val(id)
                    $('#rol').val(rs[0]['id_rol']);
                    $('#accion').val(rs[0]['id_accion']);
                    $("#btn_Guardar").text('Actualizar');
                    $("#PermisosModal").modal("show");
                }
            })
        } else {
            $("#tp").val(1);
            $('#rol').val('');
            $('#accion').val('');
            $("#btn_Guardar").text('Guardar');
            $("#PermisosModal").modal("show");
        }
    }
    $('.close').click(function() {
        $("#modal-confirma").modal("hide");
    });
</script>