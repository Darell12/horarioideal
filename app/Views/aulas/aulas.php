<div class="container bg-white shadow rounded-4">
    <div class="d-flex justify-content-between flex-wrap">
        <div>
            <!-- <h1 class="titulo_Vista text-center"><?php echo $titulo ?></h1> -->
        </div>

        <div>
            <button type="button" onclick="seleccionaAula(<?php echo 1 . ',' . 1 ?>);" class="btn btn-outline-success " data-bs-toggle="modal" data-bs-target="#AulaModal"><i class="bi bi-plus-circle-fill"></i> Agregar</button>
            <a href="<?php echo base_url('/aulas/eliminados'); ?>"><button type="button" class="btn btn-outline-secondary"><i class="bi bi-file-x"></i> Eliminados</button></a>
            <a href="<?php echo base_url('/principal'); ?>"><button class="btn btn-outline-primary"><i class="bi bi-arrow-return-left"></i> Regresar</button></a>
        </div>
    </div>

    <br>
    <div class="table-responsive">
        <table style="text-align: center;" id="tablaAulas" class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Descripcion</th>
                    <th class="text-center">bloque</th>
                    <th class="text-center">sede</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody style="font-family:Arial;font-size:12px;" class="table-group-divider">
                
            </tbody>
        </table>
    </div>
</div>
<!-- Modal -->
<form id="formulario" method="POST" action="<?php echo base_url('/aulas_insertar'); ?>" autocomplete="off" class="needs-validation" id="formulario" novalidate>
    <div class="modal fade" id="AulaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="tituloModal">Añadir Aula</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="row">

                            <div class="col">
                                <label for="nombre" class="col-form-label">Nombre:</label>
                                <input type="text" class="form-control" name="nombre_aula" id="nombre_aula" required>
                            </div>
                            <div class="col">
                                <label for="nombre" class="col-form-label">Descripción:</label>
                                <textarea type="text-area" class="form-control" name="descripcion" id="descripcion" required></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="nombre" class="col-form-label">Bloque:</label>
                                <select name="bloque" class="form-select form-select" id="bloque">
                                    <option value="">-Seleccione una opción-</option>
                                    <?php foreach ($bloques as $valor) { ?>
                                        <option class="" value="<?php echo $valor['id_parametro_det'] ?>"><?php echo $valor['nombre'] ?></option>
                                    <?php } ?>

                                </select>
                            </div>
                            <div class="col">
                                <label for="nombre" class="col-form-label">Sede:</label>
                                <select name="sede" class="form-select form-select" id="sede">
                                    <option value="">-Seleccione una opción-</option>
                                    <?php foreach ($sedes as $valor) { ?>
                                        <option class="" value="<?php echo $valor['id_parametro_det'] ?>"><?php echo $valor['nombre'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
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
            url: "<?php echo base_url('/aulas/cambiarEstado/'); ?>" + id + '/' + 'E',
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
            tablaAulas.ajax.reload(null, false);
        })
    }

    var contador = 0
    var tablaAulas = $('#tablaAulas').DataTable({
        ajax: {
            url: '<?= base_url('aulas/obtenerAulas') ?>',
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
                data: "descripcion"
            },
            {
                data: "bloque"
            },
            {
                data: "sede"
            },
            {
                data: null,
                render: function(data, type, row) {
                    return `<div class="btn-group">
                    <button class="btn btn-outline-primary" onclick="seleccionaAula(${data.id_aula} , 2);" data-bs-toggle="modal" data-bs-target="#AulaModal"><i class="bi bi-pencil"></i></button><button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modal-confirma" data-href="${data.id_aula}"><i class="bi bi-trash3"></i></button></div>`
                },
            }
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        }
    })


    $("#formulario").validate({
        rules: {
            nombre_aula: {
                required: true,
            },
            descripcion: {
                required: true,
                maxlenght: 100,
            },
            bloque: {
                required: true,
            },
            sede: {
                required: true,
            },
        },
        messages: {
            nombre_aula: {
                required: "Este campo es requerido",
            },
            descripcion: {
                required: "Este campo es requerido",
            },
            bloque: {
                required: "Este campo es requerido",
            },
            sede: {
                required: "Este campo es requerido",
            },

        }
    });

    function seleccionaAula(id, tp) {
        if (tp == 2) {
            dataURL = "<?php echo base_url('/aulas/buscarAula'); ?>" + "/" + id;
            $.ajax({
                type: "POST",
                url: dataURL,
                dataType: "json",
                success: function(rs) {
                    console.log(rs)
                    $("#tp").val(2);
                    $("#id").val(id)
                    $('#nombre_aula').val(rs[0]['nombre']);
                    $('#descripcion').val(rs[0]['descripcion']);
                    $('#bloque').val(rs[0]['bloque']);
                    $('#sede').val(rs[0]['sede']);
                    $("#btn_Guardar").text('Actualizar');
                    $("#AulaModal").modal("show");
                }
            })
        } else {
            $("#tp").val(1);
            $('#nombre_rol').val('');
            $('#descripcion').val('');
            $('#bloque').val('');
            $('##sede').val('');
            $("#btn_Guardar").text('Guardar');
            $("#AulaModal").modal("show");
        }
    }
    $('.close').click(function() {
        $("#modal-confirma").modal("hide");
    });
</script>