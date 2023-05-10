<div class="container bg-white rounded rounded-3">
    <div class="d-flex justify-content-between flex-wrap">
        <div class="border-0">
        </div>

        <div>
            <button type="button" onclick="seleccionaHorarios_enc(<?php echo 1 . ',' . 1 ?>);" class="btn btn-outline-success " data-bs-toggle="modal" data-bs-target="#Horarios_encModal"><i class="bi bi-plus-circle-fill"></i> Agregar</button>
            <a href="<?php echo base_url('/eliminados_horarios_enc'); ?>"><button type="button" class="btn btn-outline-secondary"><i class="bi bi-file-x"></i> Eliminados</button></a>
            <a href="<?php echo base_url('/principal'); ?>"><button class="btn btn-outline-primary"><i class="bi bi-arrow-return-left"></i> Regresar</button></a>
        </div>
    </div>

    <br>
    <div class="table-responsive">
        <table id="TablaHorario" class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">Grado</th>
                    <th class="text-center">Año</th>
                    <th class="text-center">Jornada</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody style="font-family:Arial;font-size:12px;" class="table-group-divider">
            </tbody>
        </table>
    </div>

    <form id="formulario">
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
                                    <option value="20">Mañana</option>
                                    <option value="21">Tarde</option>
                                </select>
                                <input type="text" id="tp" name="tp" hidden>
                                <input type="text" id="id" name="id" hidden>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-outline-primary" id="btnGuardar">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
    </form>


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
        $(this).find('.btn-ok').attr('onclick', 'EliminarRegistro(' + $(e.relatedTarget).data('href') + ')');
    });

    $("#formulario").validate({
        rules: {
            id_grado: {
                required: true,
            },
            jornada: {
                required: true,
            },
            periodo_año: {
                required: true,
                remote: {
                    url: '<?php echo base_url() ?>Horario_enc/validar',
                    type: "post",
                    dataType: "json",
                    data: {
                        campo: function() {
                            return 'periodo_año';
                        },
                        valor: function() {
                            return $("#periodo_año").val();
                        },
                        tp: function() {
                            return $("#tp").val();
                        },
                        id_grado: function() {
                            return $("#id_grado").val();
                        },
                    },
                }
            },
            messages: {
                id_grado: {
                    required: "Por favor seleccione una opción",
                },
                jornada: {
                    required: "Por favor seleccione una opción",
                },
                periodo_año: {
                    required: "Debe ingresar un año",
                }
            }
        }
    });

    $('#formulario').on('submit', function(e) {
        console.log('activo');
        e.preventDefault();
    })

    function EliminarRegistro(id) {

        $.ajax({
            type: "POST",
            url: "<?php echo base_url('/horarios_enc/cambiarEstado/'); ?>" + id + '/' + 'E',
            dataType: "json",
        }).done(function(data) {
            $("#modal-confirma").modal("hide");
            let Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: 'Registro eliminado con exito!'
            })
            contador = 0;
            tablaFranja.ajax.reload(null, false);
        })
    }
    $('#modal-confirma').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    })

    var contador = 0
    var tablaHorario = $('#TablaHorario').DataTable({
        ajax: {
            url: '<?= base_url('Horario_enc/obtenerEncabezados') ?>',
            method: "POST",
            data: {
                estado: 'A'
            },
            dataSrc: "",
        },
        columns: [{
                data: null,
                render: function(data, type, row) {
                    contador = contador + 1
                    return "<b>" + contador + "</b>";
                },
            },
            {
                data: "grado"
            },
            {
                data: "periodo_año"
            },
            {
                data: "jornada"
            },
            {
                data: null,
                render: function(data, type, row) {
                    return `<div class="btn-group container">
                                <a href="<?php echo base_url('ver_detalle/') ?>" class="nav-link">
                                    <button class="btn btn-outline-warning" title="Administrar">
                                        <i class="bi bi-gear-wide"></i>
                                    </button>
                                </a>
                                
                                <button class="btn btn-outline-primary" onclick="seleccionaUsuario(${data.id_horarios_enc} , 2);" data-bs-toggle="modal" data-bs-target="#UsuarioModal" title="Editar Registro">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modal-confirma" data-href="${data.id_horarios_enc}" title="Eliminar Registro">
                                <i class="bi bi-trash3"></i>
                                </button>
                            </div>`
                },
            }
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        }
    })

    $('#btnGuardar').on('click', function(e) {
        e.preventDefault();
        if ($('#formulario').valid()) {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('/horario_enc_insertar'); ?>",
                data: {
                    tp: $('#tp').val(),
                    id: $('#id').val(),
                    id_grado: $('#id_grado').val(),
                    periodo_año: $('#periodo_año').val(),
                    jornada: $('#jornada').val(),

                },
                dataType: "json",
            }).done(function(data) {
                $('#Horarios_encModal').modal('hide');
                let Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'success',
                    title: 'Acción realizada con exito!'
                })
                console.log('insertar');
                contador = 0
                tablaHorario.ajax.reload(null, false)
                return
            })
        } else {
            console.log('Formulario Invalido');
        }
    })

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