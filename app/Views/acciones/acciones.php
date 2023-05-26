<div class="container bg-white shadow rounded-4">

    <div class="d-flex justify-content-between flex-wrap">
        <div class="border-0">
            <!-- <h3 class="mb-0"><?php echo $titulo ?></h3> -->
        </div>

        <div style="margin-top: 2em;">
            <button type="button" onclick="seleccionaAccion(<?php echo 1 . ',' . 1 ?>);" class="btn btn-outline-success " data-bs-toggle="modal" data-bs-target="#AccionModal"><i class="bi bi-plus-circle-fill"></i> Agregar</button>
            <a href="<?php echo base_url('/acciones/eliminados'); ?>"><button type="button" class="btn btn-outline-secondary"><i class="bi bi-file-x"></i> Eliminados</button></a>
            <a href="<?php echo base_url('/principal'); ?>"><button class="btn btn-outline-primary"><i class="bi bi-arrow-return-left"></i> Regresar</button></a>
        </div>
    </div>
    <br>
    <div class="table-responsive">
        <table style="text-align: center;" id="tablaAcciones" class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th class="text-center" scope="col">Id</th>
                    <th class="text-center" scope="col">Nombre</th>
                    <th class="text-center" scope="col">Modulo</th>
                    <th class="text-center" scope="col">Carpeta </th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody style="font-family:Arial;font-size:12px;" class="table-group-divider">
            </tbody>
        </table>
    </div>
    <!-- Modal Acciones -->
    <form method="POST" id="formulario" action="<?php echo base_url('/acciones_insertar'); ?>" autocomplete="off" class="needs-validation" novalidate>
        <div class="modal fade" id="AccionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header" style="background: #427dbb; color:#FFF;">
                        <h1 class="modal-title fs-5" id="tituloModal">Añadir Accion</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <div class="row">

                                <div class="col">
                                    <label for="nombre" class="col-form-label">Nombre:</label>
                                    <input type="text" class="form-control" name="nombre_accion" id="nombre_accion" required>
                                </div>
                                <div class="col">
                                    <label for="nombre" class="col-form-label">Modulo:</label>
                                    <select class="form-control form-select" name="modulo" id="modulo" required>

                                    </select>
                                </div>
                                <div class="col">
                                    <label for="nombre" class="col-form-label">Carpeta:</label>
                                    <select class="form-control form-select" name="carpeta" id="carpeta" required>

                                    </select>
                                </div>


                                <input type="text" id="usuario_crea" name="usuario_crea" value="<?php session('id') ?>" hidden>
                                <input type="text" id="tp" name="tp" hidden>
                                <input type="text" id="id" name="id" hidden>
                                <input type="text" id="nombreActu" name="nombreActu" hidden>
                                <input type="text" id="numeroActu" name="numeroActu" hidden>


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
    <!-- Modal Elimina -->
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
            url: "<?php echo base_url('/acciones/cambiarEstado/'); ?>" + id + '/' + 'E',
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
            var contador = 0
            tablaAcciones.ajax.reload(null, false);
        })
    }

    $('#btn_Guardar').on('click', function(e) {
        e.preventDefault();
        if ($('#formulario').valid()) {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('/acciones_insertar'); ?>",
                data: {
                    tp: $('#tp').val(),
                    id: $('#id').val(),
                    nombre_accion: $('#nombre_accion').val(),
                    modulo: $('#modulo').val(),
                    carpeta: $('#carpeta').val(),
                },
                dataType: "json",
            }).done(function(data) {
                $('#AccionModal').modal('hide');
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
                tablaAcciones.ajax.reload(null, false)
                return
            })
        } else {
            console.log('Formulario Invalido');
        }
    })

    let contenido = '<option value="">Seleccione una opción</option>'
    let contenidoC = '<option value="">Seleccione una opción</option>'
    let modulos = []
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('/acciones/Modulos/'); ?>",
        dataType: "json",
    }).done(function(data) {

        data.forEach(modulo => {
            let id = modulo.id_modulo;
            modulos.push({
                id: modulo.id_modulo,
                nombre: modulo.nombre,
            });

            if (modulo.tipo == 'Modulo') {
                contenido += `<option value="${modulo.id_modulo}">${modulo.nombre}</option>`
            }
            if (modulo.tipo == 'Carpeta') {
                contenidoC += `<option value="${modulo.id_modulo}">${modulo.nombre}</option>`
            }

        });
        $('#modulo').html(contenido);
        $('#carpeta').html(contenidoC);
    })


    var contador = 0
    var tablaAcciones = $('#tablaAcciones').DataTable({
        ajax: {
            url: '<?= base_url('acciones/obtenerAcciones') ?>',
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
                data: "nombre"
            },
            {
                data: null,
                render: function(data, type, row) {
                    return modulos.find(m => m.id == row.id_modulo)?.nombre || ''
                },
            },
            {
                data: "carpeta"
            },
            {
                data: null,
                render: function(data, type, row) {
                    return `<div class="btn-group">
                    <button class="btn btn-outline-primary" onclick="seleccionaAccion(${data.id_acciones} , 2);" data-bs-toggle="modal" data-bs-target="#AccionModal"><i class="bi bi-pencil"></i></button><button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modal-confirma" data-href="${data.id_acciones}"><i class="bi bi-trash3"></i></button>
                    </div>`
                },
            }
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        }
    })

    $.validator.addMethod("soloLetras", function(value, element) {
        return this.optional(element) || /^[a-zA-ZñÑ\s]+$/.test(value);
    }, "Por favor ingrese solamente letras.");

    $("#formulario").validate({
        rules: {
            nombre_accion: {
                required: true,
                soloLetras: true,
                remote: {
                    url: '<?php echo base_url() ?>acciones/validar',
                    type: "post",
                    dataType: "json",
                    data: {
                        campo: function() {
                            return 'nombre';
                        },
                        valor: function() {
                            return $("#nombre_accion").val();
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
            nombre_accion: {
                required: "Este campo es requerido",
                remote: "Esta accion ya esta registrada"
            },
        }
    });

    function seleccionaAccion(id, tp) {
        if (tp == 2) {
            dataURL = "<?php echo base_url('/acciones/buscarAccion'); ?>" + "/" + id;
            $.ajax({
                type: "POST",
                url: dataURL,
                dataType: "json",
                success: function(rs) {
                    console.log(rs)
                    $("#tp").val(2);
                    $("#id").val(id) +
                        $('#nombre_accion').val(rs[0]['nombre']);
                    $('#modulo').val(rs[0]['id_modulo']);
                    $('#carpeta').val(rs[0]['id_padre']);
                    $('#numeroActu').val(rs[0]['nombre']);
                    $("#btn_Guardar").text('Actualizar');
                    $('#formulario').validate().resetForm();
                    $("#AccionModal").modal("show");
                }
            })
        } else {
            $("#tp").val(1);
            $('#nombre_accion').val('');
            $('#formulario').validate().resetForm();
            $("#btn_Guardar").text('Guardar');
            $("#AccionModal").modal("show");
        }
    }
    $('.close').click(function() {
        $("#modal-confirma").modal("hide");
    });
</script>