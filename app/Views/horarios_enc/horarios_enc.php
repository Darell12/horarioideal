<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/loader.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
<div class="container bg-white shadow rounded-4">
    <div class="d-flex justify-content-between flex-wrap">
        <div class="border-0">
        </div>

        <div style="margin-top: 2em;">
            <button type="button" onclick="seleccionaHorarios_enc(<?php echo 1 . ',' . 1 ?>);" class="btn btn-outline-success " data-bs-toggle="modal" data-bs-target="#Horarios_encModal"><i class="bi bi-plus-circle-fill"></i> Agregar</button>
            <a href="<?php echo base_url('/eliminados_horarios_enc'); ?>"><button type="button" class="btn btn-outline-secondary"><i class="bi bi-file-x"></i> Eliminados</button></a>
            <a href="<?php echo base_url('/principal'); ?>"><button class="btn btn-outline-primary"><i class="bi bi-arrow-return-left"></i> Regresar</button></a>
        </div>
    </div>

    <br>
    <div class="table-responsive" id="content">
        <table style="text-align: center;" id="TablaHorario" class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">Grado</th>
                    <th class="text-center">Año</th>
                    <th class="text-center">Jornada</th>
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
                    <div class="modal-header" style="background: #0f9dba; color:#FFF;">
                        <h1 class="modal-title fs-5" id="tituloModal">Añadir Horario</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label class="col-form-label">Año:</label>
                                    <select type="text" class="form-select" class="form-control" name="periodo_año" id="periodo_año" required>
                                        <option value=""> Seleccione un año </option>
                                        <?php $years = range(strftime("%Y", time()), 2000); ?>
                                        <?php foreach ($years as $year) : ?>
                                            <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col">
                                    <label class="col-form-label">Grado:</label>
                                    <select class="form-select form-select" name="id_grado" id="id_grado" required>
                                        <option value="">Seleccione un Grado</option>
                                        <?php foreach ($grados as $grado) { ?>
                                            <option class="gradoSelect" id="G<?php echo $grado['id_grado']; ?>" value="<?php echo $grado['id_grado']; ?>"><?php echo $grado['alias']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label class="col-form-label">Duración:</label>
                                    <select class="form-select form-select" name="duracion" id="duracion" required>
                                        <option value='' selected>Seleccione un parametro</option>
                                        <!-- <option value="12">45 Minutos</option> -->
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

<div class="modal fade" id="pdfFrame" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <iframe id="ifr_pdf" width="auto" height="700px"></iframe>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-confirma-auto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div style="text-align:center;" class="modal-header text-center">
                <h5 style="color:#29588a;font-size:20px;font-weight:bold;" class="modal-title" id="exampleModalLabel">Generación de Horario Automatica</h5>

            </div>
            <div style="text-align:center;font-weight:bold; display: flex; flex-direction: column; align-items: center;" class="modal-body">
                <div class="loader" id="loader"></div>
                <p id="contenidoModal"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary close" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-outline-success btn-ok">Confirmar</a>
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
                                        <li style="z-index: 999;background-color: white; color:rgb(152, 168, 185);align-items: center;"><span>10:00</span>
                                            <h3 style="text-align: center; margin-top: -15px;"> D E S C A N S O</h3>
                                        </li>
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
                                        <li style="z-index: 999;background-color: white; color:rgb(152, 168, 185);align-items: center;"><span>10:00</span>
                                            <h3 style="text-align: center; margin-top: -15px;"> D E S C A N S O</h3>
                                        </li>
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

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script>
    $("#formulario").validate({
        errorPlacement: function(error, element) {
            if (element[0].id == 'telUsuario') {
                return true;
            } else if (element[0].id == 'email') {
                return true;
            } else if (element[0].id == 'acudientess') {
                return true;
            }
            error.insertAfter(element);
            setTimeout(() => {
                error.fadeOut('slow');
            }, 1500);
            return true;
        },
        highlight: function(element) {
            $(element).addClass('is-invalid')
            setTimeout(() => {
                $(element).removeClass('is-invalid')
            }, 1500);
        },
        unhighlight: function(element) {
            $(element).removeClass('is-invalid')
        },
        submitHandler: function() {
            return false;
        },
        rules: {
            id_grado: {
                required: true,
            },
            jornada: {
                required: true,
            },
            periodo_año: {
                required: true,
            },
            duracion: {
                required: true,
            },
            jornada: {
                required: true,
            },
            inicio: {
                required: true,
            },
            fin: {
                required: true,
            },
        },
        messages: {
            id_grado: {
                required: "Por favor seleccione una opción",
            },
            inicio: {
                required: "Por favor seleccione una opción",
            },
            fin: {
                required: "Por favor seleccione una opción",
            },
            duracion: {
                required: "Por favor seleccione una opción",
            },
            jornada: {
                required: "Por favor seleccione una opción",
            },
            periodo_año: {
                required: "Debe ingresar un año",
            }
        }
    });

    let franjasTotalesV = []
    let franjasTotales = []
    $.ajax({
        url: "<?php echo base_url('horario_det/obtenerFranjas45/'); ?>",
        dataType: "json",
        success: function(data) {
            franjasTotalesV = data;
            console.log('franjasTotalesV');
            console.log(franjasTotalesV);
            $.ajax({
                url: "<?php echo base_url('horario_det/obtenerFranjas60/'); ?>",
                dataType: "json",
                success: function(data) {
                    franjasTotalesV = [...franjasTotalesV, ...data];
                    console.log('franjasTotalesV');
                    console.log(franjasTotalesV);
                }
            });
        }
    });

    $.ajax({
        url: "<?php echo base_url('horario_det/obtenerFranjas60/'); ?>",
        dataType: "json",
        success: function(data) {
            franjasTotales = data;
        }
    });

    function visualizarHorario(id) {


        $(`#Lunes`).html('');
        $(`#Martes`).html('');
        $(`#Miercoles`).html('');
        $(`#Jueves`).html('');
        $(`#Viernes`).html('');
        $(`#Sabado`).html('');

        dataURL = "<?php echo base_url('/horario_det/buscarDetalle'); ?>";
        $.ajax({
            type: "POST",
            url: dataURL,
            data: {
                id: id
            },
            dataType: "json",
            success: function(rs) {
                console.log(franjasTotalesV)
                contenido = ''
                $
                rs.forEach(element => {
                    let numeroAleatorio = Math.floor(Math.random() * 10) + 1;

                    contenido = `<li class="lecture-time ${franjasTotalesV
                                                .find(objeto => objeto.id_parametro_det == element.hora_inicio)
                                                ?.resumen}  ${element.duracion == 2 ? 'two-hr' : ''}" data-event="lecture-0${numeroAleatorio}">
                                                <a href="#">
                                                    <div class="lecture-info">
                                                        <h6 class="lecture-title">${element.asignatura} <br> ${element.profesor}</h6>
                                                        <h6 class="lecture-location">${element.aula}</h6>
                                                        <h6 class="lecture-location">${element.inicio} ~ ${element.fin}</h6>
                                                    </div>
                                                </a>
                                            </li>`
                    $(`#${element.diaN}`).append(contenido)

                });
            }
        });
    }

    $('#duracion').val('');

    $('#modal-confirma').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('onclick', 'EliminarRegistro(' + $(e.relatedTarget).data('href') + ')');
    });


    $('#formulario').on('submit', function(e) {
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
                    return data.duracion_hora == 'Franja_60_Min' ? '60 Minutos' : '45 Minutos';
                },
            },
            {
                data: null,
                render: function(data, type, row) {
                    return `<div class="btn-group gap-1">
                                <a class="nav-link">
                                    <button onclick="visualizarHorario(${data.id_horarios_enc})" class="btn btn-brand-primary" id="prueba" title="Visualizar" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="bi bi-eye"></i>
                                    </button>
                                </a>
                                <a href="<?php echo base_url('ver_detalle/') ?>${data.id_horarios_enc}" class="nav-link">
                                    <button class="btn btn-outline-warning" title="Administrar">
                                        <i class="bi bi-gear-wide"></i>
                                    </button>
                                </a>
                                <a class="nav-link">
                                <button class="btn btn-outline-info" onclick="AutoHorario(${data.id_horarios_enc}, ${data.id_grado},${data.inicio} ,${data.fin}, '${data.inicioF}', '${data.finF}')" title="Generar Horario Automaticamente" data-bs-toggle="modal" data-bs-target="#modal-confirma-auto" data-href="${data.id_horarios_enc}">
                                <i class='bx bx-bot'></i>
                                </button>
                                </a>
                                <a class="nav-link">
                                <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modal-confirma" data-href="${data.id_horarios_enc}" title="Eliminar Registro">
                                <i class="bi bi-trash3"></i>
                                </button>
                                </a>
                                <a class="nav-link">
                                    <button onclick="generarPDF(${data.id_horarios_enc})" class="btn btn-outline-danger" title="PDF">
                                    <i class="bi bi-filetype-pdf"></i>
                                    </button>
                                </a>
                            </div>`
                },
            }
        ],
        "language": {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    })

    function generarPDF(id) {
        $('#ifr_pdf').removeAttr('src');

        $.ajax({
            type: "POST",
            url: "<?php echo base_url('/horario_enc/pdfTest'); ?>/" + id + '/1/0',
            dataType: "json",
            success: function(data) {
                if (data == 2) {
                    return Swal.fire({
                        title: 'Error!',
                        text: 'No se ha obtenido información',
                        icon: 'error',
                        confirmButtonText: 'Continuar'
                    })
                }
                $('#pdfFrame').modal('show');
                $('#ifr_pdf').attr('src', `<?php echo base_url('pdf/Horario') ?>${id}` + '.pdf');
            }
        });
    }

    $('#btnGuardar').on('click', function(e) {
        e.preventDefault();

        if ($('#formulario').valid()) {


            $.ajax({
                type: "POST",
                url: "<?php echo base_url('/horario_enc/validarActivo'); ?>/" + $('#periodo_año').val() + '/' + $('#id_grado').val(),
                dataType: "json",
            }).done(function(data) {
                if (data.length > 0) {
                    console.log('id');
                    return Swal.fire({
                        title: '<h3 class="h3"> Cuidado </h3>',
                        icon: 'error',
                        html: `No puedes generar un horario para un grado que ya tiene un horario activo, <span class="text-warning">recomendamos eliminar los horarios en desuso</span>`,
                        showCloseButton: true,
                        focusConfirm: false,
                        confirmButtonText: 'Intentar de nuevo!',
                    })
                }

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
                    contador = 0
                    tablaHorario.ajax.reload(null, false)
                    return
                })
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
                    $("#tp").val(2);
                    $("#id").val(id)
                    $('#id_grado').val(rs[0]['id_grado']);
                    $('#periodo_año').val(rs[0]['periodo_año']);
                    $('#jornada').val(rs[0]['jornada']);
                    $('#inicio').val(rs[0]['inicio']);
                    $('#fin').val(rs[0]['fin']);
                    $('#duracion').val(rs[0]['duracion_hora']);
                    $("#btn_Guardar").text('Actualizar');
                    $("#Horarios_encModal").modal("show");
                }
            })
        } else {
            $("#tp").val(1);
            $('#nombre_accion').val('');
            $('#id_grado').val('');
            $('#periodo_año').val('');
            $('#jornada').val('');
            $('#inicio').val('');
            $('#fin').val('');
            $('#duracion').val('');
            $("#btn_Guardar").text('Guardar');
            $("#Horarios_encModal").modal("show");
        }
    }

    $('.close').click(function() {
        $("#modal-confirma").modal("hide");
    });

    $('.close').click(function() {
        $("#modal-confirma-auto ").modal("hide");
    });

    $('#duracion').on('change', function(e) {
        let duracion = $('#duracion').val();
        let pertenece = '';
        $.ajax({
            url: "<?php echo base_url('horario_enc/obtenerfranjas/'); ?>" + duracion,
            type: 'POST',
            dataType: 'json',
            success: function(res) {
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

    $('#periodo_año').on('change', function(e) {
        $('.gradoSelect').prop('disabled', false);
        $('#id_grado').val('')
        console.log(this.value);
        $.ajax({
            url: "<?php echo base_url('horario_enc/validarFecha/'); ?>" + this.value,
            type: 'POST',
            dataType: 'json',
            success: function(res) {
                console.log(res);
                res.forEach(element => {
                    $('#G' + element.id_grado).prop('disabled', true);
                });
            }
        })
    })

    function ObtenerAsignaturas(id) {
        return new Promise((resolve, reject) => {
            $.ajax({
                url: "<?php echo base_url('asignaturas/buscarAsignaturasxGrado/') ?>" + id,
                type: 'POST',
                dataType: 'json',
                success: function(response) {
                    resolve(response);
                },
                error: function(error) {
                    reject(error);
                }
            });
        });
    }

    async function ObtenerAulas(id) {
        return new Promise((resolve, reject) => {
            $.ajax({
                url: "<?php echo base_url('aulas/obtenerAulasxTipoNew/') ?>" + id,
                type: 'POST',
                dataType: 'json',
                success: function(response) {
                    resolve(response);
                },
                error: function(error) {
                    reject(error);
                }
            });
        });
    }

    async function ObtenerProfeXAsignatura(id, horas) {
        return new Promise(async (resolve, reject) => {
            try {
                const response = await $.ajax({
                    url: "<?php echo base_url('profesores/obtenerProfesoresAsignatura/') ?>" + id,
                    type: 'POST',
                    dataType: 'json',
                });

                let profesores = [];

                for (const registro of response) {
                    let {
                        id_usuario,
                        profesor,
                    } = registro;

                    let resultado = await ObtenerDisponibilidadProfe(id_usuario, horas);
                    console.log(resultado.disponible >= horas);
                    profesores.push({
                        id_usuario: id_usuario,
                        profesor: profesor,
                        horas_libres: resultado.disponible ? resultado.disponible : 30,
                        elegible: resultado.disponible >= horas,
                    });
                }

                resolve(profesores);
            } catch (error) {
                console.log(`Error al obtener los datos:`, error);
                reject(error);
            }
        });
    }

    async function ObtenerDisponibilidadProfe(id, necesarias) {
        let horas = 0;
        let disponible;
        let elegible;
        return new Promise(async (resolve, reject) => {
            try {
                const response = await $.ajax({
                    url: "<?php echo base_url('horario_det/buscarDetalleProfe/') ?>" + id,
                    type: 'POST',
                    dataType: 'json',
                });

                for (const registro of response) {
                    let {
                        duracion,
                    } = registro;

                    horas += +duracion;
                    disponible = 30 - +horas;
                    elegible = disponible >= necesarias;
                }

                resolve({
                    disponible,
                    elegible
                });
            } catch (error) {
                console.log(`Error al obtener los datos:`, error);
                reject(error);
            }
        });
    }

    async function ObtenerDisponibilidadAula(id, necesarias) {
        let horas = 0;
        let disponible;
        let elegible;
        return new Promise(async (resolve, reject) => {
            try {
                const response = await $.ajax({
                    url: "<?php echo base_url('horario_det/buscarDetalleAula/') ?>" + id,
                    type: 'POST',
                    dataType: 'json',
                });

                for (const registro of response) {
                    let {
                        duracion,
                    } = registro;

                    horas += +duracion;
                    disponible = 30 - +horas;
                    elegible = disponible >= necesarias;
                }
                console.log(disponible)
                resolve({
                    disponible,
                    elegible
                });
            } catch (error) {
                console.log(`Error al obtener los datos:`, error);
                reject(error);
            }
        });
    }

    async function obtenerProfesoresElegibles(asignaturas) {
        console.log(asignaturas);
        try {
            let resultados = await Promise.all(asignaturas.map(async (asignatura) => {
                let {
                    profesores,
                    horas_semanales,
                    id_grado_asignatura,
                    aula_requerida,
                    id_tipo
                } = asignatura;
                console.table(profesores);

                let profesorElegible = null;
                for (const profesor of profesores) {
                    if (profesor.elegible && profesor.horas_libres >= horas_semanales) {
                        profesor.horas_libres -= horas_semanales;
                        profesorElegible = profesor;
                        break;
                    }
                }

                return {
                    id: asignatura.id_grado_asignatura,
                    asignatura: asignatura.asignatura,
                    id_tipo: id_tipo,
                    aula_requerida: aula_requerida,
                    horas_semanales: horas_semanales,
                    profesor: profesorElegible?.profesor || null,
                    id_profesor: profesorElegible?.id_usuario || null
                };
            }));
            return resultados;
        } catch (error) {
            console.log("Error al obtener los datos:", error);
            throw error;
        }
    }

    async function DefinirProfesores(id, idGrado) {
        let profesores = [];
        let asignaturasGrado = await ObtenerAsignaturas(idGrado); //
        console.log(asignaturasGrado);

        showLoader(); // Mostrar el loader antes de ejecutar las promesas
        $('#contenidoModal').text('Obteniendo Profesores');

        try {
            await Promise.all(
                asignaturasGrado[0].map(async (asignatura) => {
                    let {
                        id_grado_asignatura,
                        nombre,
                        horas_semanales,
                        id_tipo,
                        aula_requerida
                    } = asignatura;

                    try {
                        profesores.push({
                            id_grado_asignatura: id_grado_asignatura,
                            asignatura: nombre,
                            horas_semanales: horas_semanales,
                            id_tipo: id_tipo,
                            aula_requerida: aula_requerida,
                            profesores: await ObtenerProfeXAsignatura(id_grado_asignatura, horas_semanales),
                        });
                    } catch (error) {
                        console.log(`Error al obtener los datos:`, error);
                    }
                })
            );

            console.log('var a ultima fase')
            console.log(profesores);

            const profesoresElegibles = await obtenerProfesoresElegibles(profesores);

            profesores = profesoresElegibles;
            console.log(profesoresElegibles);
        } catch (error) {
            console.log(`Error en la función AutoHorario:`, error);
        } finally {
            hideLoader(); // Ocultar el loader después de que todas las promesas se hayan resuelto o ocurra un error

            return profesores;
        }

    }

    function filtroPorDia(dia, res, inicio, fin, aula) {

        let primerFiltro = franjasTotales.filter(franja => !res.some(detalle => +detalle.hora_inicio == franja.id_parametro_det && +detalle.id_dia == dia))

        let segundoFiltro = primerFiltro.filter(franja => !res.some(detalle => +detalle.hora_fin - 1 == franja.id_parametro_det && +detalle.id_dia == dia))

        let tercerFiltro = segundoFiltro.filter(franja => !franjasProfesor.some(detalle => +detalle.hora_inicio == franja.id_parametro_det && +detalle.id_dia == dia))

        let cuartoFiltro = tercerFiltro.filter(franja => !franjasProfesor.some(detalle => +detalle.hora_fin - 1 == franja.id_parametro_det && +detalle.id_dia == dia))

        let quintoFiltro = cuartoFiltro.filter(franja => !franjasTotalesOcupadasAula.some(detalle => +detalle.hora_inicio == franja.id_parametro_det && +detalle.id_dia == dia))
        let sextoFiltro = quintoFiltro.filter(franja => !franjasTotalesOcupadasAula.some(detalle => +detalle.hora_fin - 1 == franja.id_parametro_det && +detalle.id_dia == dia))

        const [Libres1Hora, Libres2Horas, arrayRango] = dividirArray(sextoFiltro, inicio, fin);

        return [Libres1Hora, Libres2Horas, arrayRango, sextoFiltro];
    }

    function dividirArray(array, horaInicio, horaFin) {
        let arrayRango = [];
        let array1 = [];
        let array2 = [];

        //DEFINO INICIO Y FIN DE LA JORNDADA
        const fechaInicio = new Date(`2000-01-01T${horaInicio}`);
        const fechaFin = new Date(`2000-01-01T${horaFin}`);


        for (let i = 0; i < array.length; i++) {
            const franjaActual = new Date(`2000-01-01T${array[i].nombre}`);

            if (franjaActual >= fechaInicio && franjaActual <= fechaFin) {
                arrayRango.push(array[i]);
            }
        }

        arrayRango = arrayRango.filter(franja => franja.id_parametro_det !== '85'); //! recreo 10:00
        arrayRango = arrayRango.filter(franja => franja.id_parametro_det !== '91'); //! recreo 15:00

        for (let i = 0; i < arrayRango.length; i++) {
            const idActual = parseInt(arrayRango[i].id_parametro_det);
            const idSiguiente = parseInt(arrayRango[i + 1]?.id_parametro_det || 0);
            if (idSiguiente - idActual >= 2) {
                array1.push(arrayRango[i]);
            } else {
                array2.push(arrayRango[i]);
            }
        }

        const parametros = ['84', '88', '91', '94', '95']
        array1 = array1.filter(franja => !parametros.includes(franja.id_parametro_det)); // ! 9:30AM
        array2 = array2.filter(franja => !parametros.includes(franja.id_parametro_det)); // ! 9:30AM
        arrayRango = arrayRango.filter(franja => !parametros.includes(franja.id_parametro_det)); // ! 9:30AM

        return [array1, array2, arrayRango];
    }

    async function ElegirAulas(datos, inicio, fin) {
        console.log(fin);
        try {
            await Promise.all(
                datos.map(async (registro) => {
                    let {
                        id,
                        asignatura,
                        id_tipo,
                        aula_requerida,
                        horas_semanales,
                        profesor,
                        id_profesor,
                        aulas
                    } = registro;

                    try {
                        registro.reconstruido = true;
                        registro.numeroRepeticiones = horas_semanales / 2;

                        // Procesar los datos del atributo "aulas"
                        for (let aula of aulas) {
                            try {
                                const response = await $.ajax({
                                    url: "<?php echo base_url('horario_det/buscarDetalleAulaRango/') ?>" + aula.id_aula + '/' + inicio + '/' + fin,
                                    type: 'POST',
                                    dataType: 'json',
                                });

                                // Calcular el límite de 30 horas restando las horas tomadas
                                const duracionTotal = parseInt(response?.duracion_total) || 0;
                                const horasTomadas = 30 - duracionTotal;

                                // Convertir horas_semanales a número entero
                                const horasSemanales = parseInt(horas_semanales) || 0;

                                // Determinar si el aula es elegible
                                aula.elegible = horasSemanales <= horasTomadas;
                                aula.horas_libres = horasTomadas;


                            } catch (error) {
                                console.log(`Error al obtener los datos del aula:`, error);
                            }
                        }

                        // Llamar a obtenerAulasElegibles pasando los datos procesados como parámetro
                        const aulasElegibles = await obtenerAulasElegibles([registro], datos);
                        // Actualizar los datos de registro con las aulas elegibles
                        console.log(aulasElegibles);
                        registro.aula = aulasElegibles[0].aula;
                        registro.id_aula = aulasElegibles[0].id_aula;
                        delete registro.aulas
                    } catch (error) {
                        console.log(`Error al obtener los datos:`, error);
                    }
                })
            );
        } catch (error) {
            console.log(`Error en la función AutoHorario:`, error);
        } finally {
            hideLoader();
            return datos;
        }
    }


    async function obtenerAulasElegibles(asignaturas) {
        try {
            let resultados = await Promise.all(asignaturas.map(async (asignatura) => {
                let {
                    aulas,
                    horas_semanales,
                    id_grado_asignatura,
                    id_tipo
                } = asignatura;

                let aulaElegible = null;
                for (const aula of aulas) {
                    if (aula.elegible && aula.horas_libres >= horas_semanales) {
                        aula.horas_libres -= horas_semanales;
                        aulaElegible = aula;
                        break;
                    }
                }

                return {
                    id_tipo: id_tipo,
                    aula: aulaElegible.nombre,
                    id_aula: aulaElegible.id_aula,
                };
            }));
            return resultados;
        } catch (error) {
            console.log("Error al obtener los datos:", error);
            throw error;
        }
    }

    // let franjasTotales = [];
    let franjasTotalesOcupadas = [];
    let franjasTotalesOcupadasLunes = [];
    let franjasTotalesOcupadasAula = [];
    let franjasProfesor = [];
    let numeroRepeticiones = 0;


    async function AutoHorario(id, idGrado, inicio, fin, inicioF, finF) {

        let resultados = await DefinirProfesores(id, idGrado)
        console.log(resultados);

        let registrosNulos = [];

        resultados.forEach(registro => {
            if (registro.profesor == null || registro.id_profesor == null) {
                registrosNulos.push(registro);
            }
        });

        // Mostrar los registros nulos en una alerta
        if (registrosNulos.length > 0) {
            var mensaje = "Las siguientes asignaturas no tienen profesores disponibles:\n\n <br/>";
            for (var j = 0; j < registrosNulos.length; j++) {
                mensaje += `${j + 1}. ` + registrosNulos[j].asignatura + "\n\n";
                mensaje += "<br/>";
            }
            $('#modal-confirma-auto').modal('hide');

            return Swal.fire({
                title: "No podemos continuar",
                html: mensaje,
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Ver Profesores",
                confirmButtonColor: "#3085d6",
                cancelButtonText: "Terminar",
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '<?= base_url('ver_profesores') ?>'; // Cambia la URL a la que quieres redireccionar
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    console.log('Pues ni modo')
                }
            });
        }
        // TODO: Incono de Check
        $('#contenidoModal').text('Profesores Listos');

        // * desde aqui empieza el proceso de obtener aulas

        let aulas = [];
        showLoader();
        for (const registro of resultados) {
            let {
                id,
                asignatura,
                id_tipo,
                aula_requerida,
                horas_semanales,
                profesor,
                id_profesor
            } = registro;

            let aulasObtenidas = await ObtenerAulas(id_tipo);
            registro.aulas = aulasObtenidas;
            aulas.push(registro);

        }

        let aulaElegida = await ElegirAulas(aulas, inicio, fin);
        console.log(aulaElegida);
        $('#contenidoModal').text('Eligiendo buenas aulas');

        const dias = {
            "8": 'Lunes',
            "9": 'Martes',
            "10": 'Miercoles',
            "11": 'Jueves',
            "12": 'Viernes',
        }

        const id_dias = {
            'Lunes': '8',
            'Martes': '9',
            'Miercoles': '10',
            'Jueves': '11',
            'Viernes': '12'
        }

        for (const registro of aulaElegida) {

            franjasTotalesOcupadas = [];
            franjasTotalesOcupadasLunes = [];
            franjasTotalesOcupadasAula = [];
            franjasProfesor = [];
            numeroRepeticiones = 0;

            data = [];

            let diasSemana = ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes"]

            await $.ajax({
                url: "<?php echo base_url('horario_det/buscarDetalleProfe/') ?>" + registro.id_profesor,
                type: 'POST',
                dataType: 'json',
                success: function(res) {
                    franjasProfesor = res
                }
            })

            await $.ajax({
                url: "<?php echo base_url('horario_det/buscarDetalles/') ?>",
                type: 'POST',
                dataType: 'json',
                success: function(res) {
                    franjasTotalesOcupadas = res
                }
            })

            await $.ajax({
                url: "<?php echo base_url('horario_det/obtenerDetalles/') ?>" + id,
                type: 'POST',
                dataType: 'json',
                success: function(res) {

                    const diasSiAsignados = [...new Set(res.map(element => element.dia))];
                    let hora_retirada;
                    let dia_anterior;
                    let diasNoAsignados = diasSemana.filter(dia => !res.some(element => element.dia === dia));


                    let i = 0;

                    while (i < registro.numeroRepeticiones) {

                        try {

                            let [Libres1Hora, Libres2Horas, FiltroTotal, LibreTotal] = filtroPorDia(id_dias[diasSemana[0]], res, inicioF, finF, registro.id_aula);

                            let franja1Hora = (registro.numeroRepeticiones - i < 0) ? LibreTotal.filter(objeto => objeto.id_parametro_det == +Libres1Hora[0]?.id_parametro_det + 1 || objeto.id_parametro_det == +Libres2Horas[0]?.id_parametro_det + 1) : '';

                            let dia = diasSemana[0];

                            if (Libres2Horas.length > 0) {
                                i++;
                            }

                            if (diasSemana.length > 0) {

                                // * Verifica si el dia se verifico 2 veces
                                if (dia_anterior == dia) {
                                    console.log('repitio dia')
                                    diasSemana = ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes"]
                                    dia = diasSemana[1];
                                }
                                // * Eliminamos el dia verificado del array
                                diasSemana.shift();


                                data.push({
                                    "asignatura": registro.id,
                                    "profesor": registro.id_profesor,
                                    "aula": registro.id_aula,
                                    "dia": dia,
                                    "id_dia": id_dias[dia],
                                    "inicio": (registro.numeroRepeticiones - i < 0) ? Libres1Hora[0]?.id_parametro_det || Libres2Horas[0]?.id_parametro_det : Libres2Horas[0]?.id_parametro_det,
                                    "hora_inicio": (registro.numeroRepeticiones - i < 0) ? Libres1Hora[0]?.nombre || Libres2Horas[0]?.nombre : Libres2Horas[0]?.nombre,
                                    "fin": (registro.numeroRepeticiones - i < 0) ? franjasTotales.find(objeto => objeto.id_parametro_det == +Libres1Hora[0]?.id_parametro_det + 1)?.id_parametro_det || franjasTotales.find(objeto => objeto.id_parametro_det == +Libres2Horas[0]?.id_parametro_det + 1)?.id_parametro_det : franjasTotales.find(objeto => objeto.id_parametro_det == +Libres2Horas[0].id_parametro_det + 2)?.id_parametro_det,
                                    "hora_fin": (registro.numeroRepeticiones - i < 0) ? franjasTotales.find(objeto => objeto.id_parametro_det == +Libres1Hora[0]?.id_parametro_det + 1)?.nombre || franjasTotales.find(objeto => objeto.id_parametro_det == +Libres2Horas[0]?.id_parametro_det + 1)?.nombre : franjasTotales.find(objeto => objeto.id_parametro_det == +Libres2Horas[0].id_parametro_det + 2)?.nombre,
                                    "duracion": (registro.numeroRepeticiones - i < 0) ? 1 : 2,
                                    "id_encabezado": id
                                });

                                // * Valida la hora de fin y la ajusta para evitar espacios de 30 min
                                if (data[i - 1].fin == 84) {
                                    console.log('Acabo a las 9:30')
                                    data[i - 1].fin = 85
                                    data[i - 1].duracion = 2
                                    data[i - 1].hora_fin = LibreTotal.find(objeto => objeto.id_parametro_det == 85).nombre
                                }

                                if (data[i - 1].fin == undefined) {
                                    console.log('undefined')
                                    data[i - 1].fin = +data[i - 1].inicio + 1
                                    data[i - 1].duracion = 1
                                    data[i - 1].hora_fin = LibreTotal.find(objeto => objeto.id_parametro_det == +data[i - 1].inicio + 1).nombre
                                }

                                dia_anterior = dia

                                hora_retirada = (registro.numeroRepeticiones - i < 0) ? Libres1Hora[0]?.id_parametro_det || Libres2Horas[0]?.id_parametro_det : Libres2Horas[0]?.id_parametro_det

                                // * RETIRA HORA EN CASO DE EXCESO
                                if (data[i - 1].fin == 89) {

                                    data[i - 1].duracion = 1
                                    data[i - 1].fin = 88
                                    data[i - 1].hora_fin = LibreTotal.find(objeto => objeto.id_parametro_det == 88).nombre

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
                                        icon: 'info',
                                        title: `Para la franja del dia ${data[i-1].dia} se le ha retirado una hora por exceder el limite!`
                                    })

                                }
                            } else {
                                // * ERROR DIA SIN ESPACIO
                                let Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 1000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.addEventListener('mouseenter', Swal.stopTimer)
                                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                                    }
                                })
                                Toast.fire({
                                    icon: 'error',
                                    title: `No hay más franjas disponibles para el dia!`
                                })
                                diasSemana = ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes"]

                            }
                        } catch (error) {}
                    }

                    $('#btn_enviar').removeAttr('disabled', '');
                    console.table(data)
                    for (const element of data) {
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url('horario_det/insertar/') ?>" + element.asignatura + '/' + element.aula + '/' + element.id_dia + '/' + element.inicio + '/' + element.fin + '/' + element.id_encabezado + '/' + element.profesor + '/' + element.duracion,
                            dataType: "json",
                        }).done(function(data) {
                            contador = 0
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
                                title: 'Franjas ingresadas con exito!'
                            })
                        });
                    }
                }
            })

        }
    }

    function showLoader() {

        const loader = $('#loader');
        loader.removeAttr('hidden', '');
    }

    function hideLoader() {
        const loader = $('#loader');
        loader.attr('hidden', '');
    }
</script>