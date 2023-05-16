<div class="container bg-white shadow rounded-4">
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
        <table style="text-align: center;" id="TablaHorario" class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">Grado</th>
                    <th class="text-center">Año</th>
                    <th class="text-center">Jornada</th>
                    <th class="text-center" colspan="3">Acciones</th>
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
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label class="col-form-label">Duración:</label>
                                    <select class="form-select form-select" name="duracion" id="duracion" required>
                                        <option value='' selected>Seleccione un parametro</option>
                                        <option value="12">45 Minutos</option>
                                        <option value="13">60 Minutos</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label class="col-form-label">Jornada:</label>
                                    <select class="form-select form-select" name="jornada" id="jornada" required>
                                        <option value="">Seleccione un Jornada</option>
                                        <option value="20">Mañana</option>
                                        <option value="21">Tarde</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <label class="col-form-label">Inicio:</label>
                                    <select class="form-select form-select" name="inicio" id="inicio" required>
                                        <option value="">Seleccione un hora</option>

                                    </select>
                                </div>
                                <div class="col">
                                    <label class="col-form-label">Fin:</label>
                                    <select class="form-select form-select" name="fin" id="fin" required>
                                        <option value="">Seleccione un hora</option>

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

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TituloModal">Horario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-lecture">

                    <section class="section-list">
                        <div class="container-xl">
                            <div class="table-schedule">
                                <div class="timeline">
                                    <ul>
                                        <li><span>06:00</span></li>
                                        <li><span>06:30</span></li>
                                        <li><span>07:00</span></li>
                                        <li><span>07:30</span></li>
                                        <li><span>08:00</span></li>
                                        <li><span>08:30</span></li>
                                        <li><span>09:00</span></li>
                                        <li><span>09:30</span></li>
                                        <li><span>10:00</span></li>
                                        <li><span>10:30</span></li>
                                        <li><span>11:00</span></li>
                                        <li><span>11:30</span></li>
                                        <li><span>12:00</span></li>
                                        <li><span>12:30</span></li>
                                        <li><span>13:00</span></li>
                                        <li><span>13:30</span></li>
                                        <li><span>14:00</span></li>
                                        <li><span>14:30</span></li>
                                        <li><span>15:00</span></li>
                                        <li><span>15:30</span></li>
                                        <li><span>16:00</span></li>
                                        <li><span>16:30</span></li>
                                        <li><span>17:00</span></li>
                                        <li><span>17:30</span></li>
                                        <li><span>18:00</span></li>
                                        <li><span>18:30</span></li>
                                    </ul>
                                </div>

                                <div class="table-schedule-subject">
                                    <tr>
                                        <ul class="list-lecture-item">
                                            <li class="timeline-vertical">
                                                <div class="top-info">
                                                    <h4 class="day">Lunes</h4>
                                                </div>
                                                <ul id="Lunes">

                                                </ul>
                                            </li> 
                                        </tr>

                                            <li class="timeline-vertical">
                                                <div class="top-info">
                                                    <h4 class="day">Martes</h4>
                                                </div>
                                                <ul id="Martes">

                                                </ul>
                                            </li>

                                            <li class="timeline-vertical">
                                                <div class="top-info">
                                                    <h4 class="day">Miercoles</h4>
                                                </div>

                                                <ul id="Miercoles">

                                                </ul>
                                            </li>

                                            <li class="timeline-vertical">
                                                <div class="top-info">
                                                    <h4 class="day">Jueves</h4>
                                                </div>

                                                <ul id="Jueves">

                                                </ul>
                                            </li>

                                            <li class="timeline-vertical">
                                                <div class="top-info">
                                                    <h4 class="day">Viernes</h4>
                                                </div>

                                                <ul id="Viernes">

                                                </ul>
                                            </li>
<!-- 
                                            <li class="timeline-vertical">
                                                <div class="top-info">
                                                    <h4 class="day">Sabado</h4>
                                                </div>

                                                <ul id="Sabado">

                                                </ul>
                                            </li> -->
                                        </ul>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>
    function visualizarHorario(id) {
        $(`#Lunes`).html('');
        $(`#Martes`).html('');
        $(`#Miercoles`).html('');
        $(`#Jueves`).html('');
        $(`#Viernes`).html('');
        $(`#Sabado`).html('');

        let franjasTotales
        $.ajax({
            url: "<?php echo base_url('horario_det/obtenerFranjas60/'); ?>",
            dataType: "json",
            success: function(data) {
                franjasTotales = data;
                console.log('franjasTotales');
                console.log(franjasTotales);
            }
        });

        dataURL = "<?php echo base_url('/horario_det/buscarDetalle'); ?>";
        $.ajax({
            type: "POST",
            url: dataURL,
            data: {
                id: id
            },
            dataType: "json",
            success: function(rs) {
                console.log(rs);
                contenido = ''
                $.ajax({
                    url: "<?php echo base_url('horario_det/obtenerFranjas60/'); ?>",
                    dataType: "json",
                    success: function(data) {
                        franjasTotales = data;
                        rs.forEach(element => {
                            let numeroAleatorio = Math.floor(Math.random() * 10) + 1;

                            contenido = `<li class="lecture-time ${franjasTotales
                                                .find(objeto => objeto.id_parametro_det == element.hora_inicio)
                                                ?.resumen}  ${element.duracion == 2 ? 'two-hr' : ''}" data-event="lecture-0${numeroAleatorio}">
                                                <a href="#">
                                                    <div class="lecture-info">
                                                        <h6 class="lecture-title">${element.asignatura} <br> ${element.profesor}</h6>
                                                        <h6 class="lecture-location">${element.aula}</h6>
                                                    </div>
                                                </a>
                                            </li>`
                            $(`#${element.dia}`).append(contenido)
                        });
                    }
                });
            }
        })
    }

    $('#duracion').val('');

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
            url: "<?php echo base_url('/horario_enc/cambiarEstado/'); ?>" + id + '/' + 'E',
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
            tablaHorario.ajax.reload(null, false);
        })
    }

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
                    return `<div class="btn-group">
                                <a class="nav-link">
                                    <button onclick="visualizarHorario(${data.id_horarios_enc})" class="btn btn-outline-warning" title="Visualizar" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="bi bi-eye"></i>
                                    </button>
                                </a>
                                <a href="<?php echo base_url('ver_detalle/') ?>${data.id_horarios_enc}" class="nav-link">
                                    <button class="btn btn-outline-warning" title="Administrar">
                                        <i class="bi bi-gear-wide"></i>
                                    </button>
                                </a>
                                <a>
                                <button class="btn btn-outline-primary" onclick="seleccionaHorarios_enc(${data.id_horarios_enc} , 2);" data-bs-toggle="modal" data-bs-target="#UsuarioModal" title="Editar Registro">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                </a>
                                <a>
                                <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modal-confirma" data-href="${data.id_horarios_enc}" title="Eliminar Registro">
                                <i class="bi bi-trash3"></i>
                                </button>
                                </a>
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
                    inicio: $('#inicio').val(),
                    fin: $('#fin').val(),
                    duracion: $('#duracion').val(),

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
            $("#btn_Guardar").text('Guardar');
            $("#Horarios_encModal").modal("show");
        }
    }

    $('.close').click(function() {
        $("#modal-confirma").modal("hide");
    });

    $('#duracion').on('change', function(e) {
        console.log('evento grado');
        let duracion = $('#duracion').val();
        let pertenece = '';
        $.ajax({
            url: "<?php echo base_url('horario_enc/obtenerfranjas/'); ?>" + duracion,
            type: 'POST',
            dataType: 'json',
            success: function(res) {
                console.log(res);
                $('#inicio').empty();
                $('#fin').empty();

                var cadena
                if (!res.length > 0) {
                    cadena = `<option selected value="" readonly>No tiene franjas activas</option>`
                } else {
                    cadena = `<option selected value="">Seleccione una opcion</option>`
                    res.forEach(element => {

                        const [horas, minutos, segundos] = element.nombre.split(':');

                        let tiempo = new Date();
                        tiempo.setHours(parseInt(horas));
                        tiempo.setMinutes(parseInt(minutos));
                        tiempo.setSeconds(parseInt(segundos));


                        tiempo = tiempo.getHours();
                        console.log(tiempo);
                        if (tiempo >= 6 && tiempo <= 12) {
                            pertenece = 'AM'
                        } else if (tiempo > 12 && tiempo < 18.5) {
                            pertenece = 'PM'
                        } else {
                            console.log('No está en el rango de mañana o tarde');
                        }

                        cadena += `<option class="${pertenece}" value='${element.id_parametro_det}'>${element.nombre}</option>`
                    });
                }
                $('#inicio').html(cadena)
                $('#fin').html(cadena)
            }
        })
    })

    $('#jornada').on('change', function(e) {
        let jornada = $('#jornada').val();

        switch (jornada) {
            case '':
                $('.AM').removeAttr('hidden', '')
                $('.PM').removeAttr('hidden', '')
                break;
            case '20':
                $('.PM').attr('hidden', '')
                $('.AM').removeAttr('hidden', '')
                break;
            case '21':
                $('.AM').attr('hidden', '')
                $('.PM').removeAttr('hidden', '')

                break;

        }
    });
</script>