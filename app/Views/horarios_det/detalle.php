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
                    <th class="text-center" colspan="3">Acciones</th>
                </tr>
            </thead>
            <tbody style="font-family:Arial;font-size:12px;" class="table-group-divider">

            </tbody>
        </table>
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
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-outline-primary" id="btn_Guardar">verificar</button>
                        <button type="button" class="btn btn-outline-primary" id="btn_enviar">enviar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- </form> -->

        <script>
            let inicio = ''
            let fin = ''

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
                                <a href="<?php echo base_url('ver_detalle/') ?>${data.id_horarios_enc}" class="nav-link">
                                    <button class="btn btn-outline-warning" title="Visualizar">
                                    <i class="bi bi-eye"></i>
                                    </button>
                                </a>
                                <a>
                                <button class="btn btn-outline-primary" onclick="seleccionaDetalle(${data.id_horarios_enc} , 2);" data-bs-toggle="modal" data-bs-target="#UsuarioModal" title="Editar Registro">
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
                                cadena += `<option value='${element.id_aula}'>${element.nombre}</option>`
                            });
                        }
                        $('#aula').html(cadena)
                    }
                })
            })

            $('#formulario').on('submit', function(e) {
                console.log('activo');
                e.preventDefault();
            })



            let duracionAsignaturas = [];
            let franjasTotales = [];
            let franjasTotalesOcupadas = [];
            let franjasTotalesOcupadasLunes = [];
            let franjasTotalesOcupadasAula = [];
            let franjasProfesor = [];
            let numeroRepeticiones = 0;
            // let id_grado = '';

            $(document).ready(function() {
                $.ajax({
                    url: "<?php echo base_url('horario_det/obtenerFranjas60/'); ?>",
                    dataType: "json",
                    success: function(data) {
                        franjasTotales = data;
                        console.log('franjasTotales');
                        console.log(franjasTotales);
                    }
                });

                let id_grado
                $.ajax({
                    url: "<?php echo base_url('horario_enc/buscarhorario_enc/') . $id ?>",
                    type: 'POST',
                    dataType: 'json',
                    success: function(res) {
                        // console.table(res);
                        inicio = res.hora_inicio;
                        fin = res.hora_fin;
                        id_grado = res.id_grado;
                        console.log(id_grado)
                        console.log(inicio);
                        console.log(fin);
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

            function dividirArray(array, horaInicio, horaFin) {
                let arrayRango = [];
                let array1 = [];
                let array2 = [];

                console.log(array);
                console.log(horaInicio);
                console.log(horaFin);

                //DEFINO INICIO Y FIN DE LA JORNDADA
                const fechaInicio = new Date(`2000-01-01T${horaInicio}`);
                const fechaFin = new Date(`2000-01-01T${horaFin}`);

                for (let i = 0; i < array.length; i++) {
                    const franjaActual = new Date(`2000-01-01T${array[i].nombre}`);

                    if (franjaActual >= fechaInicio && franjaActual <= fechaFin) {
                        arrayRango.push(array[i]);
                    }
                }
                //DIVIDO EN 2 ARRAYS 
                for (let i = 0; i < arrayRango.length; i++) {
                    const idActual = parseInt(arrayRango[i].id_parametro_det);
                    const idSiguiente = parseInt(arrayRango[i + 1]?.id_parametro_det || 0);

                    if (idSiguiente - idActual === 2) {
                        array1.push(arrayRango[i]);
                    } else {
                        array2.push(arrayRango[i]);
                    }
                }
                array1 = array1.filter(franja => franja.id_parametro_det !== '50');
                array1 = array1.filter(franja => franja.id_parametro_det !== '49');
                array2 = array2.filter(franja => franja.id_parametro_det !== '50');
                array2 = array2.filter(franja => franja.id_parametro_det !== '49');
                arrayRango = arrayRango.filter(franja => franja.id_parametro_det !== '50');
                arrayRango = arrayRango.filter(franja => franja.id_parametro_det !== '49');
                return [array1, array2, arrayRango];
            }



            let data = [];
            let duracion = ''
            $('#btn_Guardar').on('click', function() {
                let i = 0;

                const dias = {
                    "8": 'Lunes',
                    "9": 'Martes',
                    "10": 'Miercoles',
                    "11": 'Jueves',
                    "12": 'Viernes',
                    "13": 'Sabado',
                }
                const id_dias = {
                    'Lunes': '8',
                    'Martes': '9',
                    'Miercoles': '10',
                    'Jueves': '11',
                    'Viernes': '12',
                    'Sabado': '13',
                }
                const diasSemana = ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"];

                let asignatura = $('#asignatura').val();
                let profesor = $('#profesor').val();

                duracionAsignaturas.forEach(element => {
                    if (element.id_grado_asignatura == asignatura) {
                        numeroRepeticiones = element.horas_semanales / 2;
                        // console.log(numeroRepeticiones)
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
                        console.log('franjas totales ocupadas');
                        console.log(franjasTotalesOcupadas);
                    }
                })

                $.ajax({
                    url: "<?php echo base_url('horario_det/buscarDetalleAula/') ?>" + $('#aula').val(),
                    type: 'POST',
                    dataType: 'json',
                    success: function(res) {
                        franjasTotalesOcupadasAula = res
                    }
                })

                $.ajax({
                    url: "<?php echo base_url('horario_det/obtenerDetalles/')  . $id  ?>",
                    type: 'POST',
                    dataType: 'json',
                    success: function(res) {

                        const diasSiAsignados = [...new Set(res.map(element => element.dia))];

                        let diasNoAsignados = diasSemana.filter(dia => !res.some(element => element.dia === dia));

                        Swal.fire({
                            icon: 'info',
                            title: 'Cargando...',
                            text: 'Estamos buscando la mejor ubicación...',
                            footer: '',
                            timer: 2000,
                        })

                        while (i < numeroRepeticiones) {
                            let [Libres1Hora, Libres2Horas, FiltroTotal, LibreTotal] = filtroPorDia(diasSiAsignados[0], res, inicio, fin)
                            i++
                            if (diasNoAsignados.length > 0) {
                                let dia = diasNoAsignados[0];
                                console.log(numeroRepeticiones - i);
                                data.push({
                                    "asignatura": asignatura,
                                    "profesor": profesor,
                                    "aula": $('#aula').val(),
                                    "dia": diasNoAsignados[0],
                                    "id_dia": id_dias[diasNoAsignados[0]],
                                    "inicio": FiltroTotal[0].id_parametro_det,
                                    "hora_inicio": FiltroTotal[0].nombre,
                                    "fin": numeroRepeticiones - i < 0 ? FiltroTotal[1].id_parametro_det : FiltroTotal[2].id_parametro_det,
                                    "hora_fin": numeroRepeticiones - i < 0 ? FiltroTotal[1].nombre : FiltroTotal[2].nombre,
                                    "duracion": numeroRepeticiones - i < 0 ? 1 : 2,
                                    "id_encabezado": <?php echo $id ?>
                                })
                                diasNoAsignados.shift()
                                diasSiAsignados.push(dia)
                            } else {
                                let [Libres1Hora, Libres2Horas, FiltroTotal, LibreTotal] = filtroPorDia(diasSiAsignados[0], res, inicio, fin)
                                console.log(numeroRepeticiones - i);
                                data.push({
                                    "asignatura": asignatura,
                                    "profesor": profesor,
                                    "aula": $('#aula').val(),
                                    "dia": diasSiAsignados[0],
                                    "id_dia": id_dias[diasSiAsignados[0]],
                                    "inicio": (numeroRepeticiones - i < 0) ?
                                        Libres1Hora[0]?.id_parametro_det || Libres2Horas[0]?.id_parametro_det : Libres2Horas[0]?.id_parametro_det,
                                    "hora_inicio": (numeroRepeticiones - i < 0) ?
                                        Libres1Hora[0]?.nombre || Libres2Horas[0]?.nombre : Libres2Horas[0]?.nombre,
                                    "fin": (numeroRepeticiones - i < 0) ? +Libres1Hora[0]?.id_parametro_det + 1 || +Libres2Horas[0].id_parametro_det + 1 : FiltroTotal
                                        .find(objeto => objeto.id_parametro_det == +Libres2Horas[0].id_parametro_det + 2)?.id_parametro_det,

                                    "hora_fin": (numeroRepeticiones - i < 0) ? FiltroTotal
                                        .find(objeto => objeto.id_parametro_det == +Libres1Hora[0]?.id_parametro_det + 1 || +Libres2Horas[0]?.id_parametro_det + 1)
                                        ?.nombre : FiltroTotal
                                        .find(objeto => objeto.id_parametro_det == +Libres2Horas[0].id_parametro_det + 2)?.nombre,
                                    "duracion": numeroRepeticiones - i < 0 ? 1 : 2,
                                    "id_encabezado": <?php echo $id ?>
                                })
                                diasSiAsignados.shift()
                                console.log((numeroRepeticiones - i < 0) ? FiltroTotal
                                    .find(objeto => objeto.id_parametro_det == +Libres2Horas[0]?.id_parametro_det + 1) : '')
                            }
                        }
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
                        // $('#RolModal').modal('hide');
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
                    });


                })
            });

            function FiltroGeneral() {
                let diasNoAsignados = diasSemana.filter(dia => !res.some(element => element.dia === dia));

                let LibreProfe = franjasTotales.filter(franja => !franjasProfesor.some(element => element.hora_inicio == franja.id_parametro_det));

                let LibreAula = LibreProfe.filter(franja => !franjasTotalesOcupadasAula.some(element => element.hora_inicio == franja.id_parametro_det));

                let LibreGeneral = LibreAula.filter(franja => !franjasTotalesOcupadas.some(element => element.hora_inicio == franja.id_parametro_det));

                let LibreGrado = LibreGeneral.filter(franja => !res.some(element => element.hora_inicio == franja.id_parametro_det));

                console.log('FiltroTotal:');
                console.log(LibreGrado);

                const [Libres1Hora, Libres2Horas, arrayRango] = dividirArray(LibreGrado, inicio, fin);

                console.log("Array 1 (franjas con una hora faltante en su sucesión):");
                console.log(Libres1Hora);

                console.log("Array 2 (franjas que siguen su sucesión):");
                console.log(Libres2Horas);

                console.log("Array de franjas dentro del rango:");
                console.log(arrayRango);
            }

            function filtroPorDia(dia, res, inicio, fin) {

                let LibreDia = franjasTotales.filter(franja => !franjasTotalesOcupadas.some(element => element.hora_inicio == franja.id_parametro_det && element.dia == dia));

                let LibreProfe = LibreDia.filter(franja => !franjasProfesor.some(element => element.hora_inicio == franja.id_parametro_det));

                let LibreAula = LibreProfe.filter(franja => !franjasTotalesOcupadasAula.some(element => element.hora_inicio == franja.id_parametro_det));

                let LibreGeneral = LibreAula.filter(franja => !franjasTotalesOcupadas.some(element => element.hora_inicio == franja.id_parametro_det));

                let LibreGrado = LibreGeneral.filter(franja => !res.some(element => element.hora_inicio == franja.id_parametro_det));

                console.log('FiltroTotal:');
                console.log(LibreGrado);

                const [Libres1Hora, Libres2Horas, arrayRango] = dividirArray(LibreGrado, inicio, fin);

                console.log("Array 1 (franjas con una hora faltante en su sucesión):");
                console.log(Libres1Hora);

                console.log("Array 2 (franjas que siguen su sucesión):");
                console.log(Libres2Horas);

                console.log("Array de franjas dentro del rango:");
                console.log(arrayRango);

                return [Libres1Hora, Libres2Horas, arrayRango, LibreGrado];

            }
        </script>