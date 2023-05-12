<div class="container bg-white shadow rounded-4">
    <div class="d-flex justify-content-between flex-wrap">
        <h1 class="titulo_Vista text-center">
            <!-- <h1 class="titulo_Vista text-center"><?php echo $titulo ?></h1> -->
        </h1>
        <div style="height: 30px;"></div>
        <div>
            <button type="button" onclick="seleccionaGrado(<?php echo 1 . ',' . 1 ?>);" class="btn btn-outline-success "
                data-bs-toggle="modal" data-bs-target="#GradoModal"><i class="bi bi-plus-circle-fill"></i>
                Agregar</button>
            <a href="<?php echo base_url('/grados/eliminados'); ?>"><button type="button"
                    class="btn btn-outline-secondary"><i class="bi bi-file-x"></i> Eliminados</button></a>
            <a href="<?php echo base_url('/principal'); ?>"><button class="btn btn-outline-primary"><i
                        class="bi bi-arrow-return-left"></i> Regresar</button></a>
        </div>
    </div>

    <br>
    <div class="table-responsive" style="overflow:scroll-vertical;overflow-y: scroll !important; height: 600px;">
        <table id="tablaGrados" class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th class="text-center" style="width: 8% !important;">#</th>
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
                <div class="modal-header">
                    <h5 id="tituloAsig" class="modal-title">Carga Asignaturas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5 class="h5">Asignaturas:</h5>
                    <div class="col mb-3">
                        <button class="btn btn-success btn-sm" id="btn_agregar">Agregar</button>
                        <button class="btn"></button>
                    </div>
                    <div class="col">
                        <label class="col-form-label">Asignatura:</label>
                        <select class="form-select form-select" name="asignatura" id="asignatura" required>
                            <option value="">Seleccione una opción</option>
                            <?php foreach ($asignaturas as $asignatura) { ?>
                                <option value="<?php echo $asignatura['id_asignatura'] ?>"><?php echo $asignatura['nombre'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col">
                        <label class="col-form-label">Horas Semanales:</label>
                        <input type="text" class="form-control" name="horas" id="horas" required>
                    </div>
                    <div>
                        <label id="asig-error" class="error" for="rol">
                    </div>
                </div>

                <input type="text" id="tp" name="tp" hidden>
                <input type="text" id="id" name="id" hidden>
                <input type="text" id="nombreActu" name="nombreActu" hidden>
                <input type="text" id="numeroActu" name="numeroActu" hidden>
                <input type="text" id="usuario_crea" name="usuario_crea" value="<?php session('id') ?>" hidden>

                <div class="table-responsive">
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <form method="POST" action="<?php echo base_url('/grados_insertar'); ?>" autocomplete="off" class="needs-validation"
        id="formulario" novalidate>
        <div class="modal fade" id="GradoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
            data-bs-backdrop="static">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="tituloModal">Añadir Grado</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <div class="row">

                                <div class="col">
                                    <label for="nombre" class="col-form-label">Nombre:</label>
                                    <input type="text" class="form-control" name="nombre_grado" id="nombre_grado"
                                        required>
                                </div>

                                <input type="text" id="tp" name="tp" hidden>
                                <input type="text" id="id" name="id" hidden>
                                <input type="text" id="nombreActu" name="nombreActu" hidden>
                                <input type="text" id="numeroActu" name="numeroActu" hidden>
                                <input type="text" id="usuario_crea" name="usuario_crea" value="<?php session('id') ?>"
                                    hidden>


                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary"
                                data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-outline-primary" id="btn_Guardar">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
    </form>



    <!-- Modal confirma -->
</div>

<div class="modal fade" id="modal-confirma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
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
<div class="modal fade" id="modalEliminaAsig" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div style="text-align:center;" class="modal-header">
                <h5 style="color:#98040a;font-size:20px;font-weight:bold;" class="modal-title" id="exampleModalLabel">
                    Eliminación de Registro</h5>

            </div>
            <div style="text-align:center;font-weight:bold;" class="modal-body">
                <p>Seguro Desea retirar la asignatura seleccionada?</p>
                <input type="text" hidden id="id_almacenar"><input type="text" hidden id="id_almacenar_usuario"><input
                    type="text" hidden id="id_almacenar_estado">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary close" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-outline-danger btn-ok" id="btnEliminar">Confirmar</a>
            </div>
        </div>
    </div>
</div>

<script>
    $('#modal-confirma').on('show.bs.modal', function (e) {
        $(this).find('.btn-ok').attr('onclick', 'EliminarRegistro(' + $(e.relatedTarget).data('href') + ')');
    });

    var contador = 0
    var tablaUsuarios = $('#tablaGrados').DataTable({
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
            render: function (data, type, row) {
                contador = contador + 1
                return "<b>" + contador + "</b>";
            },
        },
        {
            data: 'alias',
        },
        {
            data: null,
            render: function (data, type, row) {
                return `<div class="btn-group container">
                                <button class="btn btn-outline-primary" onclick="seleccionaGrado(${data.id_grado}, 2);" data-bs-toggle="modal" data-bs-target="#UsuarioModal" title="Editar Registro">
                                    <i class="bi bi-pencil"></i>
                                </button>

                                <button class="btn btn-outline-warning" onclick="generarTablaAsignatura(${data.id_grado});" data-bs-toggle="modal" data-bs-target="#modalAsignaturas" title="Editar Registro">
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
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        }
    })

    function generarTablaAsignatura(id) {
        let contador = 0;
        let contenido = '';
        $('#btn_agregar').attr('onclick', `insertarCarg(${id})`)
        $.ajax({
            url: "<?php echo base_url('grados/obtenerAsignaturasS/'); ?>" + id,
            type: 'POST',
            dataType: 'json',
            success: function (Asignaturas) {
                $('#tablaAsignaturas').html('contenido');
                Asignaturas.forEach(asignatura => {
                    contador++
                    contenido += `
                            <tr id="util${contador}">
                                <td class="text-center">${contador}</td>
                                <td class="text-center">${asignatura.nombre}</td>
                                <td class="text-center">${asignatura.horas_semanales}</td>
                                <td class="text-center">
                            <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modalEliminaAsig" data-href="${id + ',' + asignatura.id_grado_asignatura},${id}"><i class="bi bi-trash"></i></button>
                            </td>
                            </tr>`
                });
                $('#tablaAsignaturas').html(contenido);
            }
        })
    }

    function insertarCarg(id) {

        if ($('#asignatura').val() == "" || $('#horas').val() == "") {
            $('#asig-error').text('Los campos no deben estar vacios');
            $('#asignatura').addClass('is-invalid');
            $('#horas').addClass('is-invalid');

            setTimeout(() => {
                $('#asig-error').text('')
                $('#asignatura').removeClass('is-invalid');
                $('#horas').removeClass('is-invalid');

            }, 2000);

            $('#asignatura').val("")
            $('#horas').val("")

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
        }).done(function (data) {
            generarTablaAsignatura(id)
            $('#asignatura').val("")
            $('#horas').val("")
        })
    }



    function retirarCarga(id, id_grado_asignatura) {

        let data = {
            id_grado_asignatura: id_grado_asignatura,
        }

        $.post('<?php echo base_url('/grados/retirarCarg'); ?>', data, function (response) {

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
        }).done(function (data) {
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
            tablaUsuarios.ajax.reload(null, false);
        })
    }

    $('#modalEliminaAsig').on('show.bs.modal', function (e) {
        $(this).find('.btn-ok').attr('onclick', 'retirarCarga(' + $(e.relatedTarget).data('href') + ')');
    });

    $('.close').click(function () {
        $("#modalEliminaAsig").modal("hide");
    });


    function seleccionaGrado(id, tp) {
        if (tp == 2) {
            dataURL = "<?php echo base_url('/grados/buscarGrado'); ?>" + "/" + id;
            $.ajax({
                type: "POST",
                url: dataURL,
                dataType: "json",
                success: function (rs) {
                    console.log(rs)
                    $("#tp").val(2);
                    $("#id").val(id)
                    $('#nombre_grado').val(rs[0]['alias']);
                    $('#numeroActu').val(rs[0]['alias']);
                    $("#btn_Guardar").text('Actualizar');
                    $('#formulario').validate().resetForm();
                    $("#GradoModal").modal("show");
                }
            })
        } else {
            $("#tp").val(1);
            $('#nombre_grado').val('');
            $("#btn_Guardar").text('Guardar');
            $('#formulario').validate().resetForm();
            $("#GradoModal").modal("show");
        }
    }
    $('.close').click(function () {
        $("#modal-confirma").modal("hide");
    });

    $("#formulario").validate({
        rules: {
            nombre_grado: {
                required: true,
                remote: {
                    url: '<?php echo base_url() ?>grados/validar',
                    type: "post",
                    dataType: "json",
                    data: {
                        campo: function () {
                            return 'alias';
                        },
                        valor: function () {
                            return $("#nombre_grado").val();
                        },
                        tp: function () {
                            return $("#tp").val();
                        },
                        nombreActu: function () {
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
</script>