<div class="container">
    <div class="container bg-white mt-5 shadow rounded-4">
        <div>
            <h1 class="titulo_Vista text-center">
                <h1 class="titulo_Vista text-center"><?php echo $titulo ?></h1>
            </h1>
        </div>
        <div style="height: 30px;"></div>
        <div>
            <button type="button" onclick="seleccionaFranja(<?php echo 1 . ',' . 1 ?>);" class="btn btn-outline-success " data-bs-toggle="modal" data-bs-target="#FranjaModal"><i class="bi bi-plus-circle-fill"></i> Agregar</button>
            <a href="<?php echo base_url('/franjas_horarias/eliminados'); ?>">

                <button type="button" class="btn btn-outline-secondary"><i class="bi bi-file-x"></i> Eliminados</button></a>
            <a href="<?php echo base_url('/principal'); ?>"><button class="btn btn-outline-primary"><i class="bi bi-arrow-return-left"></i> Regresar</button></a>
        </div>
        <br>
        <div class="table-responsive" style="overflow:scroll-vertical;overflow-y: scroll !important; height: 600px;">
            <table class="table table-bordered table-sm table-hover" id="tablaFranjas" width="100%" cellspacing="0">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Día</th>
                        <th class="text-center">Hora Inicio</th>
                        <th class="text-center">Hora Fin</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody style="font-family:Arial;font-size:12px;" class="table-group-divider">
                </tbody>
            </table>
        </div>
        <!-- Modal -->
        <form id="formulario">
            <div class="modal fade" id="FranjaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="tituloModal">Añadir Franjas Horarias</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <div class="col">
                                    <label class="col-form-label">Dia de la Semana:</label>
                                    <select class="form-select form-select" name="dia" id="dia" required>
                                        <option value="">Seleccione un Grado</option>
                                        <?php foreach ($dias as $dia) { ?>
                                            <option value="<?php echo $dia['id_parametro_det']; ?>"><?php echo $dia['nombre']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="nombre" class="col-form-label">Hora Inicio:</label>
                                        <input type="time" class="form-control" name="hora_inicio" id="hora_inicio" required>
                                    </div>
                                    <input type="text" id="tp" name="tp" hidden>
                                    <input type="text" id="id" name="id" hidden>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="nombre" class="col-form-label">Hora Fin:</label>
                                        <input type="time" class="form-control" name="hora_fin" id="hora_fin" required>
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

        function EliminarRegistro(id) {

            $.ajax({
                type: "POST",
                url: "<?php echo base_url('/franjas_horarias/cambiarEstado/'); ?>" + id + '/' + 'E',
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

        var contador = 0
        var tablaFranja = $('#tablaFranjas').DataTable({
            ajax: {
                url: '<?= base_url('franjas_horarias/obtenerFranjas') ?>',
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
                    data: 'diaN',

                },
                {
                    data: 'hora_inicio',

                },
                {
                    data: 'hora_fin',

                },
                {
                    data: null,
                    render: function(data, type, row) {
                        return `<div class="btn-group">
                                <button class="btn btn-outline-primary" onclick="seleccionaFranja(${data.id_franja_horaria} , 2);" data-bs-toggle="modal" data-bs-target="#UsuarioModal" title="Editar Registro">
                                    <i class="bi bi-pencil"></i>
                                </button>` + " " + `<button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modal-confirma" data-href="${data.id_franja_horaria}" title="Eliminar Registro">
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

        $("#formulario").validate({
            rules: {
                hora_inicio: {
                    required: true,
                    remote: {
                        url: '<?php echo base_url() ?>franjas_horarias/validar',
                        type: "post",
                        dataType: "json",
                        data: {
                            campo: function() {
                                return 'hora_inicio';
                            },
                            valor: function() {
                                return $("#hora_inicio").val();
                            },
                            tp: function() {
                                return $("#tp").val();
                            },
                            hora_inicio: function() {
                                return $("#hora_inicio").val();
                            },
                        },
                    }
                },
                hora_fin: {
                    required: true,
                    remote: {
                        url: '<?php echo base_url() ?>franjas_horarias/validar',
                        type: "post",
                        dataType: "json",
                        data: {
                            campo: function() {
                                return 'hora_fin';
                            },
                            valor: function() {
                                return $("#hora_fin").val();
                            },
                            tp: function() {
                                return $("#tp").val();
                            },
                            hora_fin: function() {
                                return $("#hora_fin").val();
                            },
                        },
                    }

                },
            },
            messages: {
                hora_inicio: {
                    required: "La hora es requerida",
                    remote: "Esta hora de inicio ya existe"
                },
                hora_fin: {
                    required: "La hora es requerida",
                },

            }
        });

        $('#formulario').on('submit', function(e) {
            console.log('activo');
            e.preventDefault();
        })

        $('#btn_Guardar').on('click', function(e) {
            e.preventDefault();
            if ($('#formulario').valid()) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('/franjas_horarias/insertar'); ?>",
                    data: {
                        tp: $('#tp').val(),
                        id: $('#id').val(),
                        id_dia: $('#dia').val(),
                        hora_inicio: $('#hora_inicio').val(),
                        hora_fin: $('#hora_fin').val(),
                    },
                    dataType: "json",
                }).done(function(data) {
                    $('#FranjaModal').modal('hide');
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
                    tablaFranja.ajax.reload(null, false)
                    return
                })
            } else {
                console.log('Formulario Invalido');
            }
        })

        function seleccionaFranja(id, tp) {
            if (tp == 2) {
                dataURL = "<?php echo base_url('/franjas_horarias/buscarFranjas'); ?>" + "/" + id;
                $.ajax({
                    type: "POST",
                    url: dataURL,
                    dataType: "json",
                    success: function(rs) {
                        console.log(rs[0])
                        $("#tp").val(2);
                        $("#id").val(id)
                        $("#dia").val(rs[0]['dia'])
                        $('#hora_inicio').val(rs[0]['hora_inicio']);
                        $('#hora_fin').val(rs[0]['hora_fin']);
                        $("#btn_Guardar").text('Actualizar');
                        $("#FranjaModal").modal("show");
                    }
                })
            } else {
                $("#tp").val(1);
                $('#dia').val('');
                $('#hora_inicio').val('');
                $('#hora_fin').val('');
                $("#btn_Guardar").text('Guardar');
                $("#FranjaModal").modal("show");
            }
        }


        $('.close').click(function() {
            $("#modal-confirma").modal("hide");
        });
    </script>