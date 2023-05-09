<div class="container bg-white mt-5 shadow rounded-4">
    <div>
        <h1 class="titulo_Vista text-center">
            <h1 class="titulo_Vista text-center"><?php echo $titulo ?></h1>
        </h1>
    </div>
    <div style="height: 30px;"></div>
    <div>
        <button type="button" onclick="seleccionaHorarios_enc(<?php echo 1 . ',' . 1 ?>);" class="btn btn-outline-success " data-bs-toggle="modal" data-bs-target="#Horarios_encModal"><i class="bi bi-plus-circle-fill"></i> Agregar</button>
        <a href="<?php echo base_url('/eliminados_horarios_enc'); ?>"><button type="button" class="btn btn-outline-secondary"><i class="bi bi-file-x"></i> Eliminados</button></a>
        <a href="<?php echo base_url('/principal'); ?>"><button class="btn btn-outline-primary"><i class="bi bi-arrow-return-left"></i> Regresar</button></a>
    </div>

    <br>
    <div class="table-responsive" style="overflow:scroll-vertical;overflow-y: scroll !important; height: 600px;">
        <table class="table table-bordered table-sm table-hover" id="tablePaises" width="100%" cellspacing="0">
            <thead class="table-dark">
                <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">Grado</th>
                    <th class="text-center">Año</th>
                    <th class="text-center">Jornada</th>
                    <th class="text-center">Estado</th>
                    <th class="text-center" colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody style="font-family:Arial;font-size:12px;" class="table-group-divider">
                <?php foreach ($datos as $valor) { ?>
                    <tr>
                        <td class="text-center"><?php echo $valor['id_horarios_enc']; ?></td>
                        <td class="text-center"><?php echo $valor['grado']; ?></td>
                        <td class="text-center"><?php echo $valor['periodo_año']; ?></td>
                        <td class="text-center"><?php echo $valor['jornada']; ?></td>
                        <td class="text-center">
                            <?php echo $valor['estado'] == 'A' ?  '<span class="text-success"> Activo </span>' : 'Inactivo'; ?>
                        </td>
                        <td class="grid grid text-center" colspan="2">

                            <div class="btn-group">
                                <a href="<?php echo base_url('ver_detalle/') . $valor['id_horarios_enc']?>" class="nav-link">
                                    <button class="btn btn-outline-warning"  title="Administrar">
                                        <i class="bi bi-gear-wide"></i>
                                    </button>
                                </a>
                                <button class="btn btn-outline-primary" onclick="seleccionaHorarios_enc(<?php echo $valor['id_horarios_enc'] . ',' . 2 ?>);" data-bs-toggle="modal" data-bs-target="#Horarios_encModal">
                                    <i class="bi bi-pencil"></i>
                                </button>

                                <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modal-confirma" data-href="<?php echo base_url('/estado_acciones') . '/' . $valor['id_horarios_enc'] . '/' . 'E'; ?>"><i class="bi bi-trash3"></i></button>
                            </div>
                        </td>

                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>
    <!-- Modal -->
    <form method="POST" action="<?php echo base_url('/horario_enc_insertar'); ?>" autocomplete="off" class="needs-validation" id="formulario" novalidate>
        <div class="modal fade" id="Horarios_encModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="tituloModal">Añadir Accion</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                                <div class="col">
                                    <label class="col-form-label">Grado:</label>
                                    <select class="form-select form-select" name="id_grado" id="id_grado" required>
                                        <option value="">Seleccione un Grado</option>
                                        <?php foreach ($grados as $grado) { ?>
                                            <option value="<?php echo $grado['id_grado']; ?>"><?php echo $grado['alias']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col">
                                    <label class="col-form-label">Año:</label>
                                    <input type="text" maxlength="4" pattern="[0-9]+" class="form-control" name="periodo_año" id="periodo_año" required>

                                </div>
                                <div class="col">
                                    <label class="col-form-label">Jornada:</label>
                                    <select class="form-select form-select" name="jornada" id="jornada" required>
                                        <option value="">Seleccione un Jornada</option>
                                        <option value="1">Mañana</option>
                                        <option value="2">Tarde</option>
                                    </select>
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

    function seleccionaHorarios_enc(id, tp) {
        if (tp == 2) {
            dataURL = "<?php echo base_url('/acciones/buscarAccion'); ?>" + "/" + id;
            $.ajax({
                type: "POST",
                url: dataURL,
                dataType: "json",
                success: function(rs) {
                    console.log(rs)
                    $("#tp").val(2);
                    $("#id").val(id)
                    $('#nombre_accion').val(rs[0]['nombre']);
                    $("#btn_Guardar").text('Actualizar');
                    $("#Horarios_encModal").modal("show");
                }
            })
        } else {
            $("#tp").val(1);
            $('#nombre_accion').val('');
            $("#btn_Guardar").text('Guardar');
            $("#Horarios_encModal").modal("show");
        }
    }
    $('.close').click(function() {
        $("#modal-confirma").modal("hide");
    });
    
</script>
