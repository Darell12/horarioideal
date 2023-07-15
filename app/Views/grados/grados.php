<div class="container bg-white shadow rounded-4">
    <div class="d-flex justify-content-between flex-wrap">
        <h1 class="titulo_Vista text-center">
            <!-- <h1 class="titulo_Vista text-center"><?php echo $titulo ?></h1> -->
        </h1>
        <div style="height: 30px;"></div>
        <div style="margin-top: 2em;">
            <button type="button" onclick="seleccionaGrado(<?php echo 1 . ',' . 1 ?>);" class="btn btn-outline-success " data-bs-toggle="modal" data-bs-target="#GradoModal"><i class="bi bi-plus-circle-fill"></i>
                Agregar</button>
            <a href="<?php echo base_url('/grados/eliminados'); ?>"><button type="button" class="btn btn-outline-secondary"><i class="bi bi-file-x"></i> Eliminados</button></a>
            <a href="<?php echo base_url('/principal'); ?>"><button class="btn btn-outline-primary"><i class="bi bi-arrow-return-left"></i> Regresar</button></a>
        </div>
    </div>

    <br>
    <div class="table-responsive">
        <table id="tablaGrados" style="text-align: center;" class="table align-items-center table-flush table-loader">
            <thead class="thead-light">
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Grado</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody style="font-family:Arial;font-size:12px;" class="table-group-divider">
            </tbody>
        </table>
    </div>

    <!-- Modal Asignaturas  -->
    <div class="modal" id="modalAsignaturas" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background: #427dbb; color:#FFF;">
                    <h5 id="tituloAsig" class="modal-title">Carga Asignaturas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col">
                        <label class="col-form-label" style="font-size: large; color:#29588a;"><b>Asignatura:</b></label>
                        <select class="form-select form-select" name="asignatura" id="asignatura" required>
                            <option value="">Seleccione una opción</option>
                            <?php foreach ($asignaturas as $asignatura) { ?>
                                <option value="<?php echo $asignatura['id_asignatura'] ?>"><?php echo $asignatura['nombre'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col">
                        <label class="col-form-label" style="font-size: large; color:#29588a;"><b>Horas Semanales:</b></label>
                        <input type="text" class="form-control " name="horas" id="horas" required>
                        <label id="horasError" class="text-danger"></label>
                    </div>


                    <div>
                        <label id="asig-error" class="error" for="rol">
                    </div>

                    <div class="d-flex justify-content-between mt-3">
                        <div>
                        </div>
                        <div id="horasAsig" class="mt-3">
                        </div>
                    </div>

                </div>

                <input type="text" id="tp" name="tp" hidden>
                <input type="text" id="id" name="id" hidden>
                <input type="text" id="nombreActu" name="nombreActu" hidden>
                <input type="text" id="numeroActu" name="numeroActu" hidden>
                <input type="text" id="valido" name="valido" hidden>
                <input type="text" id="usuario_crea" name="usuario_crea" value="<?php session('id') ?>" hidden>

                <div class="table-responsive" style="padding: 2rem 2rem;">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <th>#</th>
                            <th>Nombre de la asignatura</th>
                            <th>Intensidad horaria</th>
                            <th>Acciones</th>
                        </thead>
                        <tbody id="tablaAsignaturas"></tbody>
                    </table>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button class="btn btn-success" id="btn_agregar">Agregar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <form id="formulario">
        <div class="modal fade" id="GradoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header" style="background: #427dbb; color:#FFF;">
                        <h1 class="modal-title fs-5" id="tituloModal">Añadir Grado</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <div class="row">

                                <div class="col">
                                    <label for="nombre" class="col-form-label" style="font-size: large; color:#29588a;"><b>Nombre:</b></label>
                                    <input type="text" class="form-control" name="nombre_grado" id="nombre_grado" required>
                                </div>

                                <input type="text" id="tp" name="tp" hidden>
                                <input type="text" id="id" name="id" hidden>
                                <input type="text" id="nombreActu" name="nombreActu" hidden>
                                <input type="text" id="numeroActu" name="numeroActu" hidden>
                                <input type="text" id="usuario_crea" name="usuario_crea" value="<?php session('id') ?>" hidden>


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



    <!-- Modal confirma -->
</div>

<div class="modal fade" id="modal-confirma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div style="text-align:center;" class="modal-header">
                <h5 style="color:#98040a;font-size:20px;font-weight:bold;" class="modal-title" id="exampleModalLabel">
                    Eliminación de Registro</h5>

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

<!-- Modal Asignaturas eliminadas  -->
<div class="modal fade" id="modalEliminaAsig" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div style="text-align:center;" class="modal-header">
                <h5 style="color:#98040a;font-size:20px;font-weight:bold;" class="modal-title" id="exampleModalLabel">
                    Eliminación de Registro</h5>

            </div>
            <div style="text-align:center;font-weight:bold;" class="modal-body">
                <p>Seguro Desea retirar la asignatura seleccionada?</p>
                <input type="text" hidden id="id_almacenar"><input type="text" hidden id="id_almacenar_usuario"><input type="text" hidden id="id_almacenar_estado">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary close" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-outline-danger btn-ok" id="btnEliminar">Confirmar</a>
            </div>
        </div>
    </div>
</div>

<script>

    $(document).ready(function() {
        $('#tablaGrados').on('init.dt', function() {
            console.log('loader')
            $("#tablaGrados").removeClass('table-loader').show();
        });
        setTimeout(function() {
            $('#tablaGrados').DataTable();
        }, 3000);
    });
    $('#modal-confirma').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('onclick', 'EliminarRegistro(' + $(e.relatedTarget).data('href') + ')');
    });

    var contador = 0
    var tablaGrados = $('#tablaGrados').DataTable({
        ajax: {
            url: '<?= base_url('grados/obtenerGrados') ?>',
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
                data: 'alias',
            },
            {
                data: null,
                render: function(data, type, row) {
                    return `<div class="btn-group">
                                <button class="btn btn-outline-primary" onclick="seleccionaGrado(${data.id_grado}, 2);" data-bs-toggle="modal" data-bs-target="#UsuarioModal" title="Editar Registro">
                                    <i class="bi bi-pencil"></i>
                                </button>

                                <button class="btn btn-outline-warning" onclick="generarTablaAsignatura(${data.id_grado});" data-bs-toggle="modal" data-bs-target="#modalAsignaturas" title="Carga Academica">
                                    <i class="bi bi-journal-bookmark"></i>
                                </button>

                                <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modal-confirma" data-href="${data.id_grado}" title="Eliminar Registro">
                                <i class="bi bi-trash3"></i>
                                </button>
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

    let contadorHoras = 0;
    
    function generarTablaAsignatura(id) {
        let contador = 0;
        contadorHoras = 0;
        let contenido = '';
        $('#btn_agregar').attr('onclick', `insertarCarg(${id})`)
        
        $.ajax({
            url: "<?php echo base_url('grados/obtenerAsignaturasS/'); ?>" + id,
            type: 'POST',
            dataType: 'json',
            success: function(Asignaturas) {
                $('#tablaAsignaturas').html('contenido');
                Asignaturas.forEach(asignatura => {
                    contador++
                    contadorHoras += +asignatura.horas_semanales;
                    contenido += `
                            <tr id="util${contador}">
                                <td class="text-center">${contador}</td>
                                <td class="text-center">${asignatura.nombre}</td>
                                <td class="text-center">${asignatura.horas_semanales}</td>
                                <td class="text-center">
                            <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modalEliminaAsig" data-href="${id + ',' + asignatura.id_grado_asignatura},${id}"><i class="bi bi-trash"></i></button>
                            </td>
                            </tr>`
                            $('#tituloAsig').text(`Carga Asignaturas ${asignatura.grado}`);
                });
                let color
                if (contadorHoras < 10) {
                    color = 'text-danger';
                } else if (contadorHoras >= 10 && contadorHoras < 20) {
                    color = 'text-warning';
                } else if (contadorHoras >= 20 && contadorHoras < 30) {
                    color = 'text-warning';
                }

                contenidoHead = `<h4>Horas <span class="${color}">${contadorHoras}<span class="text-dark">/</span><span class="text-success">30</span></span></h4>`

                console.log(contenidoHead);
                $('#horasAsig').html(contenidoHead);
                $('#tablaAsignaturas').html(contenido);
            }
        })
    }

    $('#horas').on('keypress', function(e) {
        let charcode = e.which ? e.which : e.keyCode;
        if (charcode > 31 && (charcode < 48 || charcode > 57)) {
            e.preventDefault();
        }
    })

    $('#horas').on('input', function(e) {
        i = $('#horas').val();
        console.log(+contadorHoras + +i);
        if (parseInt(contadorHoras) + parseInt(i) > 30) {
            $('#horas').addClass("is-invalid")
            $('#horasError').text("La cantidad de horas supera el limite semanal")
            $('#valido').val(1);
            return false;
        }else if( parseInt(i) == 0){
            $('#horas').addClass("is-invalid")
            $('#horasError').text("La hora no puede ser cero")
            $('#valido').val(1);
            return
        } 
        else{
            $('#horas').removeClass("is-invalid")
            $('#horasError').text('')
            return ('')
        }
    })

    function insertarCarg(id) {
        i = $('#horas').val();
        if ($('#asignatura').val() == '') {
            $('#horas').addClass('is-invalid')
            $('#asignatura').addClass('is-invalid')
            setTimeout(() => {
                $('#horas').removeClass('is-invalid')
                $('#asignatura').removeClass('is-invalid')
            }, 1500);
        }
        if($('#valido').val()==1){
            return 
        }
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('/grados/insertarCarg'); ?>",
            data: {
                id_grado: id,
                id_asignatura: $('#asignatura').val(),
                horas_semanales: $('#horas').val(),
            },
            dataType: "json",
        }).done(function(data) {
            generarTablaAsignatura(id)
            $('#asignatura').val("")
            $('#horas').val("")
        })
    }


    function retirarCarga(id, id_grado_asignatura) {

        let data = {
            id_grado_asignatura: id_grado_asignatura,
        }

        $.post('<?php echo base_url('/grados/retirarCarg'); ?>', data, function(response) {

            generarTablaAsignatura(id)

            $("#modalEliminaAsig").modal("hide");

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
        })
    }

    function EliminarRegistro(id) {

        $.ajax({
            type: "POST",
            url: "<?php echo base_url('/grados/cambiarEstado/'); ?>" + id + '/' + 'E',
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
            tablaGrados.ajax.reload(null, false);
        })
    }
    0
    $('#modalEliminaAsig').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('onclick', 'retirarCarga(' + $(e.relatedTarget).data('href') + ')');
    });

    $('.close').click(function() {
        $("#modalEliminaAsig").modal("hide");
    });


    function seleccionaGrado(id, tp) {
        if (tp == 2) {
            dataURL = "<?php echo base_url('/grados/buscarGrado'); ?>" + "/" + id;
            $.ajax({
                type: "POST",
                url: dataURL,
                dataType: "json",
                success: function(rs) {
                    console.log(rs)
                    $("#tp").val(2);
                    $("#id").val(id)
                    $('#nombre_grado').val(rs[0]['alias']);
                    $('#numeroActu').val(rs[0]['alias']);
                    $("#btn_Guardar").text('Actualizar');
                    $("#tituloModal").text('Actualizar Grado');
                    $("#GradoModal").modal("show");
                    $('#formulario').validate().resetForm();
                }
            })
        } else {
            $("#tp").val(1);
            $('#nombre_grado').val('');
            $("#GradoModal").modal("show");
            $("#tituloModal").text('Añadir Grado');
            $("#btn_Guardar").text('Guardar');
            $('#formulario').validate().resetForm();
        }
    }
    $('.close').click(function() {
        $("#modal-confirma").modal("hide");
    });

    $("#formulario").validate({
        errorPlacement: function(error, element) {
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
            nombre_grado: {
                required: true,
                remote: {
                    url: '<?php echo base_url() ?>grados/validar',
                    type: "post",
                    dataType: "json",
                    data: {
                        campo: function() {
                            return 'alias';
                        },
                        valor: function() {
                            return $("#nombre_grado").val();
                        },
                        tp: function() {
                            return $("#tp").val();
                        },
                        nombreActu: function() {
                            return $("#numeroActu").val();
                        },
                    },
                }
            },
        },
        messages: {
            nombre_grado: {
                required: "Este campo es requerido",
                remote: "Este grado ya esta registrado"
            },
        }
    });


    $('#btn_Guardar').on('click', function(e) {
        e.preventDefault();
        setTimeout(() => {
        if ($('#formulario').valid()) {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('/grados/insertar'); ?>",
                data: {
                    tp: $('#tp').val(),
                    id: $('#id').val(),
                    alias: $('#nombre_grado').val(),

                },
                dataType: "json",
            }).done(function(data) {
                $('#GradoModal').modal('hide');
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
                tablaGrados.ajax.reload(null, false)
                return
            })
        } else {
            console.log('Formulario Invalido');
            setTimeout(() => {
                $('.error').fadeOut('slow');
            }, 1500);
        }
    }, 500)
        
    })
    $('#formulario').on('submit', function(e) {
        console.log('activo');
        e.preventDefault();
    })
</script>