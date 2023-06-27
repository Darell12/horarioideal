<div class="container bg-white rounded rounded-4">
    <div class="d-flex justify-content-between flex-wrap">
        <div>
        </div>

        <div>
            <a href="<?php echo base_url('/profesores'); ?>"><button class="btn btn-outline-primary"><i class="bi bi-arrow-return-left"></i> Regresar</button></a>
        </div>
    </div>

    <br>
    <div class="table-responsive">
        <table id="tablaUsuarios" class="table align-items-center table-flush table-loader" id="tablePaises">
            <thead class="thead-light">
                <tr>
                    <th class="text-center" style="width: 8% !important;">#</th>
                    <th class="text-center">Nombres</th>
                    <th class="text-center">Apellidos</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody style="font-family:Arial;font-size:12px;" class="table-group-divider">
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            $('#tablaUsuarios').on('init.dt', function() {
                $("#tablaUsuarios").removeClass('table-loader').show();
            });
            setTimeout(function() {
                $('#tablaUsuarios').DataTable();
            }, 3000);

        });
        $('#modal-confirma').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('onclick', 'Restaurar(' + $(e.relatedTarget).data('href') + ')');
        });


        function Restaurar(id) {

            $.ajax({
                type: "POST",
                url: "<?php echo base_url('/usuarios/cambiarEstado/'); ?>" + id + '/' + 'A',
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
                    title: 'Registro restaurar con exito!'
                })
                tablaUsuarios.ajax.reload(null, false);
            })
        }

        var contador = 0
        var tablaUsuarios = $('#tablaUsuarios').DataTable({
            ajax: {
                url: '<?= base_url('profesores/obtenerProfesores') ?>',
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
                        return `<div class="btn-group container">
                              <button class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#modal-confirma" title="Resetear Contraseña" data-href="${data.id_usuario}"><i class="bi bi-arrow-clockwise"></i></button>
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


        $('.close').click(function() {
            $("#modal-confirma").modal("hide");
        });
    </script>