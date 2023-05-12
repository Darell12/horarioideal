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
                    <th class="text-center">Hora Fin</th>
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

        // $('#btn_Guardar').click(function() {

        //     const dias = {
        //         "8": 'Lunes',
        //         "9": 'Martes',
        //         "10": 'Miercoles',
        //         "11": 'Jueves',
        //         "12": 'Viernes',
        //         "13": 'Sabado',
        //     }
        //     const id_dias = {
        //         'Lunes': '8',
        //         'Martes': '9',
        //         'Miercoles': '10',
        //         'Jueves': '11',
        //         'Viernes': '12',
        //         'Sabado': '13',
        //     }
        //     let inicio = ''
        //     let fin = ''
        //     let data = {};

        //     const diasSemana = ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado", "Domingo"];



        //     $.ajax({url: "<?php echo base_url('horario_enc/buscarhorario_enc/') . $id ?>",type: 'POST', dataType: 'json',
        //         success: function(res) {
        //             console.table(res);
        //             inicio = res.hora_inicio;
        //             fin = res.hora_fin;
        //             console.log('inicio: '+inicio);
        //             console.log('fin: '+fin);
        //         }
        //     })
        //     $.ajax({
        //         url: "<?php echo base_url('horario_det/obtenerDetalles/'); ?>",
        //         type: 'POST',
        //         dataType: 'json',
        //         success: function(res) {
        //             console.table(res);

        //             const diasSiAsignados = [...new Set(res.map(element => element.dia))];

        //             console.table(diasSiAsignados);

        //             let diasNoAsignados = diasSemana.filter(dia => !res.some(element => element.dia === dia));

        //             console.table(diasNoAsignados);

        //             if (diasNoAsignados.length > 0) {
        //                 console.log('Hay dias Sin asignar');
        //                 data = {
        //                     asignatura: $('#asignatura').val(),
        //                     profesor: $('#profesor').val(),
        //                     aula: $('#aula').val(),
        //                     dia: diasNoAsignados[0],
        //                     id_dia: id_dias[diasNoAsignados[0]],
        //                 }
        //             }
        //             console.table(data);
        //         }
        //     })
        // })

        $('#btn_Guardar').click(function() {

        })

        function consultarFranjasHorarias(callback) {
            $.ajax({
                url: "<?php echo base_url('horario_det/obtenerDetalles/'); ?>",
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    frajasOcupadas = data
                }
            });
        }
        
        let franjas = []
        let franjasOcupadas = []
        function consultarParametrosHorarios(callback) {
            $.ajax({
                url: "<?php echo base_url('horario_det/obtenerFranjas/'); ?>",
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    franjasOcupadas  = data;
                    console.log(franjasOcupadas);
                }
            });
        }
        
        
        function encontrarFranjaDisponible(franjasOcupadas, franjasParametro) {
            console.log(franjasOcupadas);
            console.log(franjasParametro);
            for (let franja of franjasParametro) {
                let franjaDisponible = true;

                for (let franjaOcupada of franjasOcupadas) {
                    if (franjaOcupada.dia === franjaOcupada.dia) {
                        if (franjaOcupada.inicio === franja.nombre) {
                            franjaDisponible = false;
                            break;
                        }
                    }
                }
                
                if (franjaDisponible) {
                    // La franja está disponible
                    return {
                        inicio: franja.nombre,
                        // fin: agregarDuracion(franja.nombre),
                        dia: franjaOcupada.dia,
                        duracion: '1hr' // Puedes ajustar esto según tus necesidades
                    };
                }
            }
            
            // No se encontró ninguna franja disponible
            return null;
        }

        function agregarDuracion(hora) {
            // Aquí puedes implementar la lógica para agregar la duración a la hora de inicio
            // por ejemplo, si la duración es de 1hr:
            // 07:30:00 + 1hr = 08:30:00
            
            return hora;
        }
        
        consultarFranjasHorarias()
        consultarParametrosHorarios()
        
        const franjaDisponible = encontrarFranjaDisponible(franjasOcupadas, franjas);
        console.log(franjaDisponible);
        </script>