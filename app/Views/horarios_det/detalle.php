<div class="container bg-white shadow rounded-4">
    <div class="d-flex justify-content-between flex-wrap">
        <div class="border-0">
        </div>

        <div style="margin-top: 2em;">
            <button type="button" onclick="seleccionaDetalle(<?php echo 1 . ',' . 1 ?>);" class="btn btn-outline-success " data-bs-toggle="modal" data-bs-target="#Horarios_encModal"><i class="bi bi-plus-circle-fill"></i> Agregar</button>
            <button onclick="visualizarHorario(<?php echo $id ?>)" class="btn btn-outline" id="prueba" title="Visualizar" data-bs-toggle="modal" data-bs-target="#ModalHorario"> <i class="bi bi-eye"></i> Visualizar</button>

            <!-- <a href="<?php echo base_url('/eliminados_horarios_enc'); ?>"><button type="button" class="btn btn-outline-secondary"><i class="bi bi-file-x"></i> Eliminados</button></a> -->
            <a href="<?php echo base_url('/ver_horarios'); ?>"><button class="btn btn-outline-primary"><i class="bi bi-arrow-return-left"></i> Regresar</button></a>
        </div>
    </div>
    <br>
    <div class="table-responsive">
        <table class="table align-items-center table-flush" style="text-align: center;" id="tablaDetalle">
            <thead class="thead-light">
                <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">Profesor</th>
                    <th class="text-center">Asignatura</th>
                    <th class="text-center">Aula</th>
                    <th class="text-center">Día</th>
                    <th class="text-center">Hora Incio</th>
                    <th class="text-center">Hora Fin</th>
                    <th class="text-center">Duración</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody style="font-family:Arial;font-size:12px;" class="table-group-divider">

            </tbody>
        </table>
    </div>
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

<div class="modal fade" id="ModalHorario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        <li class="mañana"><span>06:00</span></li>
                                        <li class="mañana"><span>06:30</span></li>
                                        <li class="mañana"><span>07:00</span></li>
                                        <li class="mañana"><span>07:30</span></li>
                                        <li class="mañana"><span>08:00</span></li>
                                        <li class="mañana"><span>08:30</span></li>
                                        <li class="mañana"><span>09:00</span></li>
                                        <li class="mañana"><span>09:30</span></li>
                                        <li class="mañana" style="z-index: 999;background-color: white; color:rgb(152, 168, 185);align-items: center;"><span>10:00</span>
                                            <h3 style="text-align: center; margin-top: -15px;"> D E S C A N S O</h3>
                                        </li>
                                        <li class="mañana"><span>10:30</span></li>
                                        <li class="mañana"><span>11:00</span></li>
                                        <li class="mañana"><span>11:30</span></li>
                                        <li class="mañana"><span>12:00</span></li>
                                        <li class="mañana"><span>12:30</span></li>
                                        <li class="mañana"><span>13:00</span></li>
                                        <li class="mañana"><span>13:30</span></li>
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

<!-- <form id="formulario"> -->
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
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-outline-warning" id="btn_Guardar">verificar</button>
                    <button type="button" class="btn btn-outline-success" id="btn_enviar" disabled title="Generé primero las franjas">Confirmar</button>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    $('#modal-confirma').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('onclick', 'EliminarRegistro(' + $(e.relatedTarget).data('href') + ')');
    });

    $('.close').click(function() {
        $("#modal-confirma").modal("hide");
    });

    // ! Filtra y retorna solo las franjas disponibles en el dia recibido
    function filtroPorDia(dia, res, inicio, fin, aula) {

        let primerFiltro = franjasTotales.filter(franja => !res.some(detalle => +detalle.hora_inicio == franja.id_parametro_det && +detalle.id_dia == dia))
        // console.log('primerFiltro')
        // console.table(primerFiltro);
        let segundoFiltro = primerFiltro.filter(franja => !res.some(detalle => +detalle.hora_fin - 1 == franja.id_parametro_det && +detalle.id_dia == dia))
        // console.log('segundoFiltro')
        // console.table(segundoFiltro);
        // console.log('Franjas Profesores');
        // console.log(franjasProfesor);
        let tercerFiltro = segundoFiltro.filter(franja => !franjasProfesor.some(detalle => +detalle.hora_inicio == franja.id_parametro_det && +detalle.id_dia == dia))
        // console.log('tercerFiltro')
        // console.table(tercerFiltro);

        let cuartoFiltro = tercerFiltro.filter(franja => !franjasProfesor.some(detalle => +detalle.hora_fin - 1 == franja.id_parametro_det && +detalle.id_dia == dia))
        // console.log('cuartoFiltro')
        // console.table(cuartoFiltro);

        let quintoFiltro = cuartoFiltro.filter(franja => !franjasTotalesOcupadasAula.some(detalle => +detalle.hora_inicio == franja.id_parametro_det && +detalle.id_dia == dia))
        let sextoFiltro = quintoFiltro.filter(franja => !franjasTotalesOcupadasAula.some(detalle => +detalle.hora_fin - 1 == franja.id_parametro_det && +detalle.id_dia == dia))

        const [Libres1Hora, Libres2Horas, arrayRango] = dividirArray(sextoFiltro, inicio, fin);

        return [Libres1Hora, Libres2Horas, arrayRango, sextoFiltro];
    }
    // ! Separa el las franjas disponibles en espacios de 1hora, 2horas y un array general
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

        arrayRango = arrayRango.filter(franja => franja.id_parametro_det !== '50');
        // arrayRango = arrayRango.filter(franja => franja.id_parametro_det !== '81');
        //DIVIDO EN 2 ARRAYS 
        for (let i = 0; i < arrayRango.length; i++) {
            const idActual = parseInt(arrayRango[i].id_parametro_det);
            const idSiguiente = parseInt(arrayRango[i + 1]?.id_parametro_det || 0);
            if (idSiguiente - idActual >= 2) {
                array1.push(arrayRango[i]);
            } else {
                array2.push(arrayRango[i]);
            }
        }
        array1 = array1.filter(franja => franja.id_parametro_det !== '84');
        array1 = array1.filter(franja => franja.id_parametro_det !== '88');
        array1 = array1.filter(franja => franja.id_parametro_det !== '92');
        array2 = array2.filter(franja => franja.id_parametro_det !== '84');
        array2 = array2.filter(franja => franja.id_parametro_det !== '88');
        array2 = array2.filter(franja => franja.id_parametro_det !== '92');
        arrayRango = arrayRango.filter(franja => franja.id_parametro_det !== '84');
        arrayRango = arrayRango.filter(franja => franja.id_parametro_det !== '92');
        arrayRango = arrayRango.filter(franja => franja.id_parametro_det !== '88');
        console.log([array1, array2, arrayRango]);
        return [array1, array2, arrayRango];
    }

    
    function EliminarRegistro(id) {

        $.ajax({
            type: "POST",
            url: "<?php echo base_url('/horario_det/cambiarEstado/'); ?>" + id + '/' + 'E',
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
            tablaDetalle.ajax.reload(null, false);
        })
    }

    let franjasVisualizar = []
    $.ajax({
        url: "<?php echo base_url('horario_det/obtenerFranjas45/'); ?>",
        dataType: "json",
        success: function(data) {
            franjasVisualizar = data;
            console.log('franjasVisualizar');
            console.log(franjasVisualizar);
            $.ajax({
                url: "<?php echo base_url('horario_det/obtenerFranjas60/'); ?>",
                dataType: "json",
                success: function(data) {
                    franjasVisualizar = [...franjasVisualizar, ...data];
                    console.log('franjasVisualizar');
                    console.log(franjasVisualizar);
                }
            });
        }
    });

    // ! Recolecta y genera los horarios para previsualizar
    function visualizarHorario(id) {
        $(`#Lunes`).html('');
        $(`#Martes`).html('');
        $(`#Miercoles`).html('');
        $(`#Jueves`).html('');
        $(`#Viernes`).html('');
        $(`#Sabado`).html('');
        $(`#ModalHorario`).modal('show');

        dataURL = "<?php echo base_url('/horario_det/buscarDetalle'); ?>";
        $.ajax({
            type: "POST",
            url: dataURL,
            data: {
                id: id
            },
            dataType: "json",
            success: function(rs) {
                contenido = ''
                rs.forEach(element => {
                    let numeroAleatorio = Math.floor(Math.random() * 10) + 1;
                    contenido = `<li class="lecture-time ${franjasVisualizar
                                                    .find(objeto => objeto.id_parametro_det == element.hora_inicio)
                                                    ?.resumen}  ${element.duracion == 2 ? 'two-hr' : ''}" data-event="lecture-0${numeroAleatorio}">
                                                    <a href="">
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

    let inicio = ''
    let fin = ''

    var contador = 0
    // ! Convierte la tabla a una DataTable
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
                data: "fin"
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
                                <a>
                                <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modal-confirma" data-href="${data.id_horario_det}" title="Eliminar Registro">
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

    function seleccionaDetalle(id, tp) {
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

    // ! Captura el valor del select de asignatura y genera profesor y aula
    $('#asignatura').on('change', function(e) {
        let asignatura = $('#asignatura').val();
        let pertenece = '';
        $.ajax({
            url: "<?php echo base_url('profesores/obtenerProfesoresAsignatura/'); ?>" + asignatura,
            type: 'POST',
            dataType: 'json',
            success: function(res) {
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
        $('#aula').on('change', function(e) {
            $.ajax({
                url: "<?php echo base_url('horario_det/buscarDetalleAula/') ?>" + $('#aula').val(),
                type: 'POST',
                dataType: 'json',
                success: function(res) {
                    franjasTotalesOcupadasAula = res
                }
            })

        })
        $.ajax({
            url: "<?php echo base_url('aulas/obtenerAulasxTipo/'); ?>" + asignatura,
            type: 'POST',
            dataType: 'json',
            success: function(res) {
                $('#aula').empty();

                var cadena
                if (!res.length > 0) {
                    cadena = `<option selected value="" readonly>No hay aulas asignadas</option>`
                } else {
                    cadena = `<option selected value="">Seleccione una opcion</option>`
                    res.forEach(element => {
                        cadena += `<option value='${element.id_aula}'>${element.nombre}</option>`
                    });
                }
                $('#aula').html(cadena)
            }
        })
    })

    $('#formulario').on('submit', function(e) {
        e.preventDefault();
    })

    // ! Obtención de datos al cargar el documento
    $(document).ready(function() {

        if (<?php echo $datos['duracion_hora'] ?> == 12) {
            $.ajax({
                url: "<?php echo base_url('horario_det/obtenerFranjas45/'); ?>",
                dataType: "json",
                success: function(data) {
                    franjasTotales = data;
                }
            });

        } else {
            $.ajax({
                url: "<?php echo base_url('horario_det/obtenerFranjas60/'); ?>",
                dataType: "json",
                success: function(data) {
                    franjasTotales = data;
                }
            });
        }

        let id_grado
        $.ajax({
            url: "<?php echo base_url('horario_enc/buscarhorario_enc/') . $id ?>",
            type: 'POST',
            dataType: 'json',
            success: function(res) {
                inicio = res.hora_inicio;
                fin = res.hora_fin;
                id_grado = res.id_grado;
            }
        })


        setTimeout(() => {

            $.ajax({
                url: "<?php echo base_url('grados/obtenerAsignaturasS/') ?>" + id_grado,
                dataType: "json",
                success: function(data) {
                    duracionAsignaturas = data;
                }
            });

        }, 1000);

    });

    let duracionAsignaturas = [];
    let franjasTotales = [];
    let franjasTotalesOcupadas = [];
    let franjasTotalesOcupadasLunes = [];
    let franjasTotalesOcupadasAula = [];
    let franjasProfesor = [];
    let numeroRepeticiones = 0;

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

    let data = [];
    let duracion = ''

    $('#btn_Guardar').on('click', function() {


        data = [];
        let i = 0;

        let diasSemana = ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes"]

        let asignatura = $('#asignatura').val();
        let profesor = $('#profesor').val();

        if (asignatura == '' || profesor == '' || $('#aula').val() == '') {
            return Swal.fire({
                title: 'Todos los campos deben estar llenos',
                icon: 'error',
            })
        }

        duracionAsignaturas.forEach(element => {
            if (element.id_grado_asignatura == asignatura) {
                numeroRepeticiones = element.horas_semanales / 2;
            }
        });

        $.ajax({
            url: "<?php echo base_url('horario_det/buscarDetalleProfe/') ?>" + profesor,
            type: 'POST',
            dataType: 'json',
            success: function(res) {
                franjasProfesor = res
            }
        })

        $.ajax({
            url: "<?php echo base_url('horario_det/buscarDetalles/') ?>",
            type: 'POST',
            dataType: 'json',
            success: function(res) {
                franjasTotalesOcupadas = res
            }
        })

        $.ajax({
            url: "<?php echo base_url('horario_det/obtenerDetalles/')  . $id  ?>",
            type: 'POST',
            dataType: 'json',
            success: function(res) {

                const diasSiAsignados = [...new Set(res.map(element => element.dia))];
                let hora_retirada;
                let dia_anterior;
                let diasNoAsignados = diasSemana.filter(dia => !res.some(element => element.dia === dia));

                while (i < numeroRepeticiones) {

                    try {
                        let [Libres1Hora, Libres2Horas, FiltroTotal, LibreTotal] = filtroPorDia(id_dias[diasSemana[0]], res, inicio, fin, $('#aula').val());

                        let franja1Hora = (numeroRepeticiones - i < 0) ? LibreTotal.filter(objeto => objeto.id_parametro_det == +Libres1Hora[0]?.id_parametro_det + 1 || objeto.id_parametro_det == +Libres2Horas[0]?.id_parametro_det + 1) : '';

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
                                "asignatura": asignatura,
                                "profesor": profesor,
                                "aula": $('#aula').val(),
                                "dia": dia,
                                "id_dia": id_dias[dia],
                                "inicio": (numeroRepeticiones - i < 0) ? Libres1Hora[0]?.id_parametro_det || Libres2Horas[0]?.id_parametro_det : Libres2Horas[0]?.id_parametro_det,
                                "hora_inicio": (numeroRepeticiones - i < 0) ? Libres1Hora[0]?.nombre || Libres2Horas[0]?.nombre : Libres2Horas[0]?.nombre,
                                "fin": (numeroRepeticiones - i < 0) ? franjasTotales.find(objeto => objeto.id_parametro_det == +Libres1Hora[0]?.id_parametro_det + 1)?.id_parametro_det || franjasTotales.find(objeto => objeto.id_parametro_det == +Libres2Horas[0]?.id_parametro_det + 1)?.id_parametro_det : franjasTotales.find(objeto => objeto.id_parametro_det == +Libres2Horas[0].id_parametro_det + 2)?.id_parametro_det,
                                "hora_fin": (numeroRepeticiones - i < 0) ? franjasTotales.find(objeto => objeto.id_parametro_det == +Libres1Hora[0]?.id_parametro_det + 1)?.nombre || franjasTotales.find(objeto => objeto.id_parametro_det == +Libres2Horas[0]?.id_parametro_det + 1)?.nombre : franjasTotales.find(objeto => objeto.id_parametro_det == +Libres2Horas[0].id_parametro_det + 2)?.nombre,
                                "duracion": (numeroRepeticiones - i < 0) ? 1 : 2,
                                "id_encabezado": <?php echo $id ?>
                            });

                            // * Valida la hora de fin y la ajusta para evitar espacios de 30 min
                            if (data[i - 1].fin == 84) {
                                console.log('Acabo a las 9:30')
                                data[i - 1].fin = 85
                                data[i - 1].hora_fin = LibreTotal.find(objeto => objeto.id_parametro_det == 85).nombre
                            }

                            dia_anterior = dia

                            hora_retirada = (numeroRepeticiones - i < 0) ? Libres1Hora[0]?.id_parametro_det || Libres2Horas[0]?.id_parametro_det : Libres2Horas[0]?.id_parametro_det

                            // * RETIRA HORA EN CASO DE EXCESO
                            if (data[i - 1].fin == 54) {

                                data[i - 1].duracion = 1
                                data[i - 1].fin = 53
                                data[i - 1].hora_fin = LibreTotal.find(objeto => objeto.id_parametro_det == 53).nombre

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
                let rellenoAlerta = ''
                data.forEach(element => {
                    let numeroAleatorio = Math.floor(Math.random() * 10) + 1;
                    rellenoAlerta += `<li class="lecture-time ${element.duracion == 2 ? 'two-hr' : ''}" data-event="lecture-0${numeroAleatorio}" style="text-decoration: none !important; list-style-type: none;">
                                                <a>
                                                    <div class="lecture-info">
                                                        <h6 class="lecture-title">${element.dia}</h6>
                                                        <h6 class="lecture-location">${element.hora_inicio} ~ ${element.hora_fin}</h6>
                                                    </div>
                                                </a>
                                            </li>`
                })
                setTimeout(() => {
                    Swal.fire({
                        title: '<h3 class="h3"> Franjas Generadas </h3>',
                        icon: 'info',
                        html: `Frajas Generadas ${rellenoAlerta}
                                    <br>
                                    Recuerde Confirmar
                                    `,
                        showCloseButton: true,
                        focusConfirm: false,
                        confirmButtonText: 'Continuar!',
                        confirmButtonAriaLabel: 'Thumbs up, great!',
                    })
                }, 1500);
                $('#btn_enviar').removeAttr('disabled', '');
                console.table(data)
            }
        })
    })

    $('#btn_enviar').on('click', function() {

        data.forEach(element => {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('horario_det/insertar/') ?>" + element.asignatura + '/' + element.aula + '/' + element.id_dia + '/' + element.inicio + '/' + element.fin + '/' + element.id_encabezado + '/' + element.profesor + '/' + element.duracion,
                dataType: "json",
            }).done(function(data) {
                $('#Horarios_encModal').modal('hide');
                contador = 0
                tablaDetalle.ajax.reload(null, false);
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


        })
    });
</script>