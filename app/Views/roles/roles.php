<div class="container bg-white rounded rounded-3">
    <div class="d-flex justify-content-between flex-wrap">
        <h1 class="titulo_Vista text-center">
            <!-- <h1 class="titulo_Vista text-center"><?php echo $titulo ?></h1> -->
        </h1>
        <div>
            <button type="button" onclick="seleccionaRol(<?php echo 1 . ',' . 1 ?>);" class="btn btn-outline-success " data-bs-toggle="modal" data-bs-target="#RolModal"><i class="bi bi-plus-circle-fill"></i> Agregar</button>
            <a href="<?php echo base_url('/roles/eliminados'); ?>"><button type="button" class="btn btn-outline-secondary"><i class="bi bi-file-x"></i> Eliminados</button></a>
            <a href="<?php echo base_url('/principal'); ?>"><button class="btn btn-outline-primary"><i class="bi bi-arrow-return-left"></i> Regresar</button></a>
        </div>
    </div>

    <br>
    <div class="table-responsive">
        <table id="tablaRoles" style="text-align: center;" class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody style="font-family:Arial;font-size:12px;" class="table-group-divider">

            </tbody>
        </table>
    </div>
    <!-- Modal -->
    <form id="formulario">
        <div class="modal fade" id="RolModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="tituloModal">Añadir Rol</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <div class="row">

                                <div class="col">
                                    <label for="nombre" class="col-form-label">Nombre:</label>
                                    <input type="text" class="form-control" name="nombre_rol" id="nombre_rol" required>
                                </div>

                                <input type="text" id="tp" name="tp" hidden>
                                <input type="text" id="id" name="id" hidden>
                                <input type="text" id="nombreActu" name="nombreActu" hidden>

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

    $.validator.addMethod("soloLetras", function(value, element) {
        return this.optional(element) || /^[a-zA-ZñÑ\s]+$/.test(value);
    }, "Por favor ingrese solamente letras.");

    function EliminarRegistro(id) {

        $.ajax({
            type: "POST",
            url: "<?php echo base_url('/roles/cambiarEstado/'); ?>" + id + '/' + 'E',
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
            tablaRoles.ajax.reload(null, false);
        })
    }

    var contador = 0
    var tablaRoles = $('#tablaRoles').DataTable({
        ajax: {
            url: '<?= base_url('roles/obtenerRoles') ?>',
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
                    return `<div class="btn-group container">
                    <button class="btn btn-outline-primary" onclick="seleccionaRol(${data.id_rol} , 2);" data-bs-toggle="modal" data-bs-target="#RolModal" title="Editar Rol"><i class="bi bi-pencil"></i></button><button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modal-confirma" data-href="${data.id_rol}" title="Eliminar Rol"><i class="bi bi-trash3"></i></button>
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
            nombre_rol: {
                required: true,
                soloLetras: true,
                remote: {
                    url: '<?php echo base_url() ?>roles/validar',
                    type: "post",
                    dataType: "json",
                    data: {
                        campo: function() {
                            return 'nombre';
                        },
                        valor: function() {
                            return $("#nombre_rol").val();
                        },
                        tp: function() {
                            return $("#tp").val();
                        },
                    },
                }
            },
        },
        messages: {
            nombre_rol: {
                required: "Este campo es requerido",
                remote: "Este rol ya esta registrado"
            },
        }
    });

    $('#formulario').on('submit', function(e) {
        console.log('activo');
        e.preventDefault();
    })

    function seleccionaRol(id, tp) {
        if (tp == 2) {
            dataURL = "<?php echo base_url('/roles/buscarRol'); ?>" + "/" + id;
            $.ajax({
                type: "POST",
                url: dataURL,
                dataType: "json",
                success: function(rs) {
                    console.log(rs)
                    $("#tp").val(2);
                    $("#id").val(id)
                    $('#nombre_rol').val(rs[0]['nombre']);
                    $("#btn_Guardar").text('Actualizar');
                    $("#RolModal").modal("show");
                }
            })
        } else {
            $("#tp").val(1);
            $('#nombre_rol').val('');
            $("#btn_Guardar").text('Guardar');
            $("#RolModal").modal("show");
        }
    }

    $('#btn_Guardar').on('click', function(e) {
        e.preventDefault();
        if ($('#formulario').valid()) {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('/roles/insertar'); ?>",
                data: {
                    tp: $('#tp').val(),
                    id: $('#id').val(),
                    nombre_rol: $('#nombre_rol').val(),

                },
                dataType: "json",
            }).done(function(data) {
                $('#RolModal').modal('hide');
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
                tablaRoles.ajax.reload(null, false)
                return
            })
        } else {
            console.log('Formulario Invalido');
        }
    })

    $('.close').click(function() {
        $("#modal-confirma").modal("hide");
    });
</script>