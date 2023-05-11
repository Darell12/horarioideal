<div class="container bg-white shadow rounded-4">
    <div class="d-flex justify-content-between flex-wrap">
        <div class="border-0">
        </div>

        <div>
            <button type="button" onclick="seleccionaDetalle(<?php echo 1 . ',' . 1 ?>);" class="btn btn-outline-success " data-bs-toggle="modal" data-bs-target="#Horarios_encModal"><i class="bi bi-plus-circle-fill"></i> Agregar</button>
            <!-- <a href="<?php echo base_url('/eliminados_horarios_enc'); ?>"><button type="button" class="btn btn-outline-secondary"><i class="bi bi-file-x"></i> Eliminados</button></a> -->
            <a href="<?php echo base_url('/principal'); ?>"><button class="btn btn-outline-primary"><i class="bi bi-arrow-return-left"></i> Regresar</button></a>
        </div>
    </div>
    <br>
    <div class="table-responsive">
        <table class="table align-items-center table-flush" id="tablaDetalle">
            <thead class="thead-light">
                <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">Profesor</th>
                    <th class="text-center">Asignatura</th>
                    <th class="text-center">Aula</th>
                    <th class="text-center">Día</th>
                    <th class="text-center">Hora Incio</th>
                    <th class="text-center">Duración</th>
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
                            <div class="row">
                                <div class="col">
                                    <label class="col-form-label">Asignaturas:</label>
                                    <select class="form-select form-select" name="asignatura" id="asignatura" required>
                                        <option value='' selected>Seleccione un parametro</option>
                                        <?php foreach ($asignaturas as $asignatura) { ?>
                                            <option value="<?php echo $asignatura['id_grado_asignatura'] ?>"><?php echo $asignatura['nombre'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col">
                                    <label class="col-form-label">Profesor:</label>
                                    <select class="form-select form-select" name="profesor" id="profesor" required>
                                        <option value="">Seleccione un Jornada</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <label class="col-form-label">Aula:</label>
                                    <select class="form-select form-select" name="aula" id="aula" required>
                                        <option value="">Seleccione un aula</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <input type="text" id="tp" name="tp" hidden>
                                <input type="text" id="id" name="id" hidden>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-outline-primary" id="btn_Guardar">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
    </form>

    <script>
        var contador = 0
        var tablaDetalle = $('#tablaDetalle').DataTable({
            ajax: {
                url: '<?= base_url('horario_det/buscarDetalle') ?>',
                method: "POST",
                data: {
                    id: <?php echo $id ?>,
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
                    data: "profesor"
                },
                {
                    data: "asignatura"
                },
                {
                    data: "aula"
                },
                {
                    data: "dia"
                },
                {
                    data: "inicio"
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        return `${data.duracion} Hrs`
                    },
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        return `<div class="btn-group container">
                                <a href="<?php echo base_url('ver_detalle/') ?>${data.id_horarios_enc}" class="nav-link">
                                    <button class="btn btn-outline-warning" title="Visualizar">
                                    <i class="bi bi-eye"></i>
                                    </button>
                                </a>
                                
                                <button class="btn btn-outline-primary" onclick="seleccionaDetalle(${data.id_horarios_enc} , 2);" data-bs-toggle="modal" data-bs-target="#UsuarioModal" title="Editar Registro">
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

        function seleccionaDetalle(id, tp) {
            if (tp == 2) {
                dataURL = "<?php echo base_url('/horario_enc/buscarhorario_enc'); ?>" + "/" + id;
                $.ajax({
                    type: "POST",
                    url: dataURL,
                    dataType: "json",
                    success: function(rs) {
                        console.log(rs)
                        $("#tp").val(2);
                        $("#id").val(id)
                        $('#id_grado').val(rs[0]['id_grado']);
                        $('#periodo_año').val(rs[0]['periodo_año']);
                        $('#jornada').val(rs[0]['jornada']);
                        $('#inicio').val(rs[0]['inicio']);
                        $('#fin').val(rs[0]['fin']);
                        $('#duracion_hora').val(rs[0]['duracion_hora']);
                        $("#btn_Guardar").text('Actualizar');
                        $("#Horarios_encModal").modal("show");
                    }
                })
            } else {
                $("#tp").val(1);
                $('#nombre_accion').val('');
                $("#btn_Guardar").text('Generar');
                $("#Horarios_encModal").modal("show");
            }
        }

        $('#asignatura').on('change', function(e) {
            console.log('evento grado');
            let asignatura = $('#asignatura').val();
            let pertenece = '';
            $.ajax({
                url: "<?php echo base_url('profesores/obtenerProfesoresAsignatura/'); ?>" + asignatura,
                type: 'POST',
                dataType: 'json',
                success: function(res) {
                    console.log(res);
                    $('#profesor').empty();

                    var cadena
                    if (!res.length > 0) {
                        cadena = `<option selected value="" readonly>No hay un profesor asignado</option>`
                    } else {
                        cadena = `<option selected value="">Seleccione una opcion</option>`
                        res.forEach(element => {
                            cadena += `<option value='${element.id_usuario}'>${element.profesor}</option>`
                        });
                    }
                    $('#profesor').html(cadena)
                }
            })
            $.ajax({
                url: "<?php echo base_url('aulas/obtenerAulasxTipo/'); ?>" + asignatura,
                type: 'POST',
                dataType: 'json',
                success: function(res) {
                    console.log(res);
                    $('#aula').empty();

                    var cadena
                    if (!res.length > 0) {
                        cadena = `<option selected value="" readonly>No hay aulas asignadas</option>`
                    } else {
                        cadena = `<option selected value="">Seleccione una opcion</option>`
                        res.forEach(element => {
                            cadena += `<option value='${element.id_param}'>${element.nombre}</option>`
                        });
                    }
                    $('#aula').html(cadena)
                }
            })
        })
    </script>