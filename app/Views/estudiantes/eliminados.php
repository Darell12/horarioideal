<div class="container bg-white rounded rounded-3">

    <div class="d-flex justify-content-between flex-wrap">
        <div>
        </div>
        <div>
            <a href="<?php echo base_url('/ver_estudiantes'); ?>"><button class="btn btn-outline-primary"><i class="bi bi-arrow-return-left"></i> Regresar</button></a>
        </div>
    </div>

    <br>
    <div class="table-responsive">
        <table id="tablaEstudiantes" class="table align-items-center table-flush table-loader">
            <thead class="thead-light">
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Nombres</th>
                    <th class="text-center">Apellidos</th>
                    <th class="text-center">Grado</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody style="font-family:Arial;font-size:12px;" class="table-group-divider">

            </tbody>
        </table>
    </div>

    <div class="modal fade" id="modal-confirma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div style="text-align:center;" class="modal-header">
                    <h5 style="color:#98040a;font-size:20px;font-weight:bold;" class="modal-title" id="exampleModalLabel">Restauración de Registro</h5>

                </div>
                <div style="text-align:center;font-weight:bold;" class="modal-body">
                    <p>Seguro Desea Restaurar éste Registro?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary close" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-outline-danger btn-ok">Confirmar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Elimina -->
</div>

<script>
    $(document).ready(function() {
        $('#tablaEstudiantes').on('init.dt', function() {
            $("#tablaEstudiantes").removeClass('table-loader').show();
        });
        setTimeout(function() {
            $('#tablaEstudiantes').DataTable();
        }, 3000);
    });
    $('#modal-confirma').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('onclick', 'RestaurarRegistro(' + $(e.relatedTarget).data('href') + ')');
    });

    function RestaurarRegistro(id) {

        $.ajax({
            type: "POST",
            url: "<?php echo base_url('/estudiantes/cambiarEstado/'); ?>" + id + '/' + 'A',
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
            contador = 0;
            Toast.fire({
                icon: 'success',
                title: 'Registro eliminado con exito!'
            })
            tablaUsuarios.ajax.reload(null, false);
        })
    }
    var contador = 0
    var tablaUsuarios = $('#tablaEstudiantes').DataTable({
        ajax: {
            url: '<?= base_url('estudiantes/obtenerEstudiantes') ?>',
            method: "POST",
            data: {
                estado: 'E'
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
                data: null,
                render: function(data, type, row) {
                    return data.nombre_p + " " + data.nombre_s
                },
            },
            {
                data: null,
                render: function(data, type, row) {
                    return data.apellido_p + " " + data.apellido_s
                },
            },
            {
                data: null,
                render: function(data, type, row) {
                    if (data.grado) {
                        return data.grado;
                    } else {
                        return `Grado por asignar <input onchange="AsignarGrado(${data.id_usuario})" id="asignarGrado${data.id_usuario}" class="form-check-input" type="checkbox" value="" id="flexCheckDefault">`
                    }
                }
            },
            {
                data: null,
                render: function(data, type, row) {
                    return `<button class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#modal-confirma" data-href="${data.id_estudiante}" title="Restaurar"><i class="bi bi-arrow-clockwise"></i></button>`
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



    $('.close').click(function() {
        $("#modal-confirma").modal("hide");
    });
</script>