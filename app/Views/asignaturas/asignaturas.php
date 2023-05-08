<div class="container bg-white mt-5  rounded rounded-3">
    <div class="pt-1">
        <h1 class="titulo_Vista text-center ">
            <h1 class="titulo_Vista text-center"><?php echo $titulo ?></h1>
        </h1>
    </div>
    <div style="height: 30px;"></div>
    <div>
        <button type="button" onclick="seleccionaRol(<?php echo 1 . ',' . 1 ?>);" class="btn btn-outline-success " data-bs-toggle="modal" data-bs-target="#RolModal"><i class="bi bi-plus-circle-fill"></i> Agregar</button>
        <a href="<?php echo base_url('/asignaturas/eliminados'); ?>"><button type="button" class="btn btn-outline-secondary"><i class="bi bi-file-x"></i> Eliminados</button></a>
        <a href="<?php echo base_url('/principal'); ?>"><button class="btn btn-outline-primary"><i class="bi bi-arrow-return-left"></i> Regresar</button></a>
    </div>

    <br>
    <div class="table-responsive">
        <table class="table table-bordered table-sm table-hover" id="tableAsignaturas" width="100%" cellspacing="0">
            <thead class="table-dark">
                <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Codigo</th>
                    <th class="text-center">Estado</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody style="font-family:Arial;font-size:12px;" class="table-group-divider">
                <?php foreach ($datos as $valor) { ?>
                    <tr>
                        <td class="text-center"><?php echo $valor['id_asignatura']; ?></td>
                        <td class="text-center"><?php echo $valor['nombre']; ?></td>
                        <td class="text-center"><?php echo $valor['codigo']; ?></td>
                        <td class="text-center">
                            <?php echo $valor['estado'] == 'A' ?  '<span class="text-success"> Activo </span>' : 'Inactivo'; ?>
                        </td>
                        <td class="grid grid text-center" colspan="2">

                            <button id="acciones" class="btn btn-outline-primary" onclick="seleccionaRol(<?php echo $valor['id_asignatura'] . ',' . 2 ?>);" data-bs-toggle="modal" data-bs-target="#RolModal">

                                <i class="bi bi-pencil"></i>

                            </button>

                            <button id="acciones" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modal-confirma" data-href="<?php echo base_url('/estado_asignaturas') . '/' . $valor['id_asignatura'] . '/' . 'E'; ?>"><i class="bi bi-trash3"></i></button>
                        </td>

                    <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- Modal -->
    <form method="POST" action="<?php echo base_url('/asignaturas_insertar'); ?>" autocomplete="off" class="needs-validation" id="formulario" novalidate>
        <div class="modal fade" id="RolModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="tituloModal">Añadir Asignatura </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <div class="row">

                                <div class="col">
                                    <label for="nombre_asignatura" class="col-form-label">Nombre:</label>
                                    <input type="text" class="form-control" name="nombre_asignatura" id="nombre_asignatura" required>
                                </div>

                                <input type="text" id="tp" name="tp" hidden>
                                <input type="text" id="id" name="id" hidden>
                                <div class="col">
                                    <label for="codigo" class="col-form-label">Codigo:</label>
                                    <input type="number" class="form-control" name="codigo" id="codigo" required>
                                </div>
                            </div>
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
    $('#tableAsignaturas').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        }
    });
    $.validator.addMethod("soloLetras", function(value, element) {
        return this.optional(element) || /^[a-zA-ZñÑ\s]+$/.test(value);
    }, "Por favor ingrese solamente letras.");
    
    $("#formulario").validate({
        rules: {
            nombre_asignatura: {
                required: true,
                soloLetras: true,
                remote: {
                    url: '<?php echo base_url() ?>asignaturas/validar',
                    type: "post",
                    dataType: "json",
                    data: {
                        campo: function() {
                            return 'nombre';
                        },
                        valor: function() {
                            return $("#nombre_asignatura").val();
                        },
                        tp: function() {
                            return $("#tp").val();
                        },
                    },
                }
            },
            codigo: {
                required: true,
                digits: true,
                remote: {
                    url: '<?php echo base_url() ?>asignaturas/validar',
                    type: "post",
                    dataType: "json",
                    data: {
                        campo: function() {
                            return 'codigo';
                        },
                        valor: function() {
                            return $("#codigo").val();
                        },
                        tp: function() {
                            return $("#tp").val();
                        },
                    },
                }
            },
        },
        messages: {
            nombre_asignatura: {
                required: "Este campo es requerido",
                remote: "Esta asignatura ya está registrada"
            },
            codigo: {
                required: "Este campo es requerido",
                remote: "Este codigo ya está registrado"
            },
        }
    });

    function seleccionaRol(id, tp) {
        if (tp == 2) {
            dataURL = "<?php echo base_url('/asignaturas/buscarAsignaturas'); ?>" + "/" + id;
            $.ajax({
                type: "POST",
                url: dataURL,
                dataType: "json",
                success: function(rs) {
                    console.log(rs)
                    $("#tp").val(2);
                    $("#id").val(id)
                    $('#nombre_asignatura').val(rs[0]['nombre']);
                    $('#codigo').val(rs[0]['codigo']);
                    $("#btn_Guardar").text('Actualizar');
                    $("#RolModal").modal("show");
                }
            })
        } else {
            $("#tp").val(1);
            $('#nombre_asignatura').val('');
            $('#codigo').val('');
            $("#btn_Guardar").text('Guardar');
            $("#RolModal").modal("show");
        }
    }

    $('.close').click(function() {
        $("#modal-confirma").modal("hide");
    });
</script>