<div class="container bg-white rounded rounded-3">
    <div class="d-flex justify-content-between flex-wrap">
        <h1 class="titulo_Vista text-center ">
            <!-- <h1 class="titulo_Vista text-center"><?php echo $titulo ?></h1> -->
        </h1>
        <div style="margin-top: 2em;">
            <button type="button" onclick="seleccionaAsignatura(<?php echo 1 . ',' . 1 ?>);" class="btn btn-outline-success " data-bs-toggle="modal" data-bs-target="#AsignaturaModal"><i class="bi bi-plus-circle-fill"></i> Agregar</button>
            <a href="<?php echo base_url('/asignaturas/eliminados'); ?>"><button type="button" class="btn btn-outline-secondary"><i class="bi bi-file-x"></i> Eliminados</button></a>
            <a href="<?php echo base_url('/principal'); ?>"><button class="btn btn-outline-primary"><i class="bi bi-arrow-return-left"></i> Regresar</button></a>
        </div>
    </div>
    <br>
    <div class="table-responsive">
        <table style="text-align: center;" class="table align-items-center table-flush" id="tableAsignaturas">
            <thead class="thead-light">
                <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Codigo de Area</th>
                    <th class="text-center">Tipo requerido</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody style="font-family:Arial;font-size:12px;" class="table-group-divider">
                
            </tbody>
        </table>
    </div>
    <!-- Modal -->
    <form method="POST" action="<?php echo base_url('/asignaturas_insertar'); ?>" autocomplete="off" class="needs-validation" id="formulario" novalidate>
        <div class="modal fade" id="AsignaturaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header" style="background: #427dbb; color:#FFF;">
                        <h1 class="modal-title fs-5" id="tituloModal">Añadir Asignatura </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <div class="row">

                                <div class="col">
                                    <label for="nombre_asignatura" class="col-form-label">Nombre:</label>
                                    <input type="text" class="form-control" name="nombre_asignatura" id="nombre_asignatura" required>
                                </div>
    
                                <input type="text" id="tp" name="tp" hidden>
                                <input type="text" id="id" name="id" hidden>
                                <div class="col">
                                    <label for="codigo" class="col-form-label">Codigo:</label>
                                    <select name="codigo" class="form-select form-select" id="codigo">
                                        <option value="">-Seleccione una opción-</option>
                                        <?php foreach ($Area as $valor) { ?>
                                            <option class="" value="<?php echo $valor['id_parametro_det'] ?>"><?php echo $valor['nombre'] ?></option>
                                        <?php } ?>

                                    </select>
                                </div>
                                <div class="col">
                                    <label for="codigo" class="col-form-label">Tipo:</label>

                                    <select name="tipo" class="form-select form-select" id="tipo">
                                        <option value="">-Seleccione una opción-</option>
                                        <?php foreach ($tipos as $valor) { ?>
                                            <option class="" value="<?php echo $valor['id_parametro_det'] ?>"><?php echo $valor['nombre'] ?></option>
                                        <?php } ?>

                                    </select>
                                </div>
                            </div>
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
            url: "<?php echo base_url('/asignaturas/cambiarEstado/'); ?>" + id + '/' + 'E',
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
            tableAsignaturas.ajax.reload(null, false);
        })
    }
    var contador = 0
    var tableAsignaturas = $('#tableAsignaturas').DataTable({
        ajax: {
            url: '<?= base_url('asignaturas/obtenerAsignaturas') ?>',
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
                data: "Codigo"
            },
            {
                data: "tipo_requerido"
            },
            {
                data: null,
                render: function(data, type, row) {
                    return `<div class="btn-group">
                    <button id="acciones" class="btn btn-outline-primary" onclick="seleccionaAsignatura(${data.id_asignatura} , 2)" data-bs-toggle="modal" data-bs-target="#AsignaturaModal"><i class="bi bi-pencil"></i></button>
                    <button id="acciones" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modal-confirma" data-href="${data.id_asignatura}"><i class="bi bi-trash3"></i></button>
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
            nombre_asignatura: {
                required: true,
                soloLetras: true,
                remote: {
                    url: '<?php echo base_url() ?>asignaturas/validar',
                    type: "post",
                    dataType: "json",
                    data: {
                        campo: function() {
                            return 'nombre';
                        },
                        valor: function() {
                            return $("#nombre_asignatura").val();
                        },
                        tp: function() {
                            return $("#tp").val();
                        },
                    },
                }
            },
            codigo:{
                required: true,
            },
            tipo:{
                required: true,
            },
            
        },
        messages: {
            nombre_asignatura: {
                required: "Este campo es requerido",
                remote: "Esta asignatura ya está registrada"
            },
            codigo:{
                required: "Este campo es requerido"
            },
            tipo:{
                required: "Este campo es requerido"
            },
        
        }
    });

    function seleccionaAsignatura(id, tp) {
        if (tp == 2) {
            dataURL = "<?php echo base_url('/asignaturas/buscarAsignaturas'); ?>" + "/" + id;
            $.ajax({
                type: "POST",
                url: dataURL,
                dataType: "json",
                success: function(rs) {
                    console.log(rs)
                    $("#tp").val(2);
                    $("#id").val(id)
                    $('#nombre_asignatura').val(rs[0]['nombre']);
                    $('#codigo').val(rs[0]['Codigo']);
                    $('#tipo').val(rs[0]['tipo_requerido']);
                    $("#btn_Guardar").text('Actualizar');
                    $("#AsignaturaModal").modal("show");
                }
            })
        } else {
            $("#tp").val(1);
            $('#nombre_asignatura').val('');
            $('#codigo').val('');
            $('#tipo').val('');
            $("#btn_Guardar").text('Guardar');
            $("#AsignaturaModal").modal("show");
        }
    }

    $('.close').click(function() {
        $("#modal-confirma").modal("hide");
    });

    $('#btn_Guardar').on('click', function(e) {
        e.preventDefault();
        if ($('#formulario').valid()) {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('/asignaturas/insertar'); ?>",
                data: {
                    tp: $('#tp').val(),
                    id: $('#id').val(),
                    nombre: $('#nombre_asignatura').val(),
                    codigo:$('#codigo'),
                    tipo_requerido:$('#tipo')   

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
                tableAsignaturas.ajax.reload(null, false)
                return
            })
        } else {
            console.log('Formulario Invalido');
            setTimeout(() => {
                $('.error').fadeOut('slow');
            }, 1500);
        }
    })

</script>