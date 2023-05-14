<div class="container bg-white shadow rounded-4">
    <div class="d-flex justify-content-between flex-wrap">
        <div class="border-0">
            <!-- <h1 class="titulo_Vista text-center"><?php echo $titulo ?></h1> -->
        </div>

        <div>
            <button type="button" onclick="seleccionaPermisos(<?php echo 1 . ',' . 1 ?>);" class="btn btn-outline-success " data-bs-toggle="modal" data-bs-target="#PermisosModal"><i class="bi bi-plus-circle-fill"></i> Agregar</button>
            <a href="<?php echo base_url('/permisos/eliminados'); ?>"><button type="button" class="btn btn-outline-secondary"><i class="bi bi-file-x"></i> Eliminados</button></a>
            <a href="<?php echo base_url('/principal'); ?>"><button class="btn btn-outline-primary"><i class="bi bi-arrow-return-left"></i> Regresar</button></a>
        </div>
    </div>

    <div class="table-responsive">
        <table style="text-align: center;" class="table align-items-center table-flush" id="tablaPermisos">
            <thead class="thead-light">
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Rol</th>
                    <th class="text-center">Acción</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody style="font-family:Arial;font-size:12px;" class="table-group-divider">
            </tbody>
        </table>
    </div>

         <!-- Modal Permisos  -->
    <form id="formulario">
    <div class="modal fade" id="PermisosModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="tituloModal">Añadir Permiso</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="row">
                            <div class="">
                                <label class="col-form-label">Rol:</label>
                                <select class="form-select form-select" name="rol" id="rol" required>
                                    <option value="">Seleccione un Rol</option>
                                    <?php foreach ($roles as $rol) { ?>
                                        <option value="<?php echo $rol['id_rol']; ?>"><?php echo $rol['nombre']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="">
                                <label class="col-form-label">Acciones:</label>
                                <select class="form-select form-select" name="accion" id="accion" required>
                                    <option value="">Seleccione una acción</option>
                                    <?php foreach ($acciones as $accion) { ?>
                                        <option value="<?php echo $accion['id_acciones']; ?>"><?php echo $accion['nombre']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <input type="text" id="tp" name="tp" hidden>
                            <input type="text" id="id" name="id" hidden>


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

</div>
<!-- Modal -->

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
    
    $('#modal-confirma').on('show.bs.modal', function (e) {
        $(this).find('.btn-ok').attr('onclick', 'EliminarRegistro(' + $(e.relatedTarget).data('href') + ')');
    });

    function seleccionaPermisos(id, tp) {
        if (tp == 2) {
            dataURL = "<?php echo base_url('/permisos/buscarPermiso'); ?>" + "/" + id;
            $.ajax({
                type: "POST",
                url: dataURL,
                dataType: "json",
                success: function(rs) {
                    console.log(rs)
                    $("#tp").val(2);
                    $("#id").val(id)
                    $('#rol').val(rs[0]['id_rol']);
                    $('#accion').val(rs[0]['id_accion']);
                    $('#formulario').validate().resetForm();
                    $("#btn_Guardar").text('Actualizar');
                    $("#PermisosModal").modal("show");
                }
            })
        } else {
            $("#tp").val(1);
            $('#rol').val('');
            $('#accion').val('');
            $('#formulario').validate().resetForm();
            $("#btn_Guardar").text('Guardar');
            $("#PermisosModal").modal("show");
        }
    }
    $('.close').click(function() {
        $("#modal-confirma").modal("hide");
    });


    var contador = 0
    var tablaPermisos = $('#tablaPermisos').DataTable({
        ajax: {
            url: '<?= base_url('permisos/obtenerPermisos') ?>',
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
            data: 'rol',
        },
        {
            data: 'accion',
        },
        {
            data: null,
            render: function (data, type, row) {
                return `<div class="btn-group">
                                <button class="btn btn-outline-primary" onclick="seleccionaPermisos(${data.id_permiso}, 2);" data-bs-toggle="modal" data-bs-target="#UsuarioModal" title="Editar Registro">
                                    <i class="bi bi-pencil"></i>
                                </button>

                                <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modal-confirma" data-href="${data.id_permiso}" title="Eliminar Registro">
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

    $("#formulario").validate({
        rules: {
            id_rol: {
                required: true,
            },
            id_accion: {
                required: true,
            },
        },
        messages: {
            id_rol: {
                required: "Por favor seleccione una opción",
            },
            id_accion: {
                required: "Por favor seleccione una opción",
            },
        }
    });

    $('#btn_Guardar').on('click', function(e) {
        e.preventDefault();
        if ($('#formulario').valid()) {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('/permisos/insertar'); ?>",
                data: {
                    tp: $('#tp').val(),
                    id: $('#id').val(),
                    id_rol: $('#rol').val(),
                    id_accion: $('#accion').val(),

                },
                dataType: "json",
            }).done(function(data) {
                $('#PermisosModal').modal('hide');
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
                tablaPermisos.ajax.reload(null, false)
                return
            })
        } else {
            console.log('Formulario Invalido');
        }
    })
    $('#formulario').on('submit', function(e) {
        console.log('activo');
        e.preventDefault();
    })

    function EliminarRegistro(id) {

$.ajax({
    type: "POST",
    url: "<?php echo base_url('/permisos/cambiarEstado/'); ?>" + id + '/' + 'E',
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
    tablaPermisos.ajax.reload(null, false);
})
}


</script>