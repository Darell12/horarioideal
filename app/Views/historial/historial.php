<div class="container bg-white shadow rounded-4">
    <div class="d-flex justify-content-between flex-wrap">
        <div class="border-0">
            <!-- <h1 class="titulo_Vista text-center"><?php echo $titulo ?></h1> -->
        </div>

        <div style="margin-top: 2em;">
            <a href="<?php echo base_url('/principal'); ?>"><button class="btn btn-outline-primary"><i class="bi bi-arrow-return-left"></i> Regresar</button></a>
        </div>
    </div>

    <div class="table-responsive">
        <table style="text-align: center;" id="tablaHistorial" class="table align-items-center table-flush table-loader">
            <thead class="thead-light">
                <tr>
                    <th class="text-center" scope="col">#</th>
                    <th class="text-center" scope="col">Tabla Afectada </th>
                    <th class="text-center" scope="col">Descripcion</th>
                    <th class="text-center" scope="col">Tipo</th>
                    <th class="text-center" scope="col">Responsable </th>
                    <th class="text-center" scope="col">Fecha </th>
                </tr>
            </thead>
            <tbody style="font-family:Arial;font-size:12px;" class="table-group-divider">
            </tbody>
        </table>
    </div>
</div>
    
<script>
     $(document).ready(function() {
        $('#tablaHistorial').on('init.dt', function() {
            $("#tablaHistorial").removeClass('table-loader').show();
        });
        setTimeout(function() {
            $('#tablaHistorial').DataTable();
        }, 3000);
    });

    var contador = 0
    var tablaHistorial = $('#tablaHistorial').DataTable({
        ajax: {
            url: '<?= base_url('historial/obtenerHistorial') ?>',
            method: "POST",
            data: {
                // estado: 'A'
            },
            dataSrc: "",
        },
        columns: [{
                data: null,
                render: function (data,type, row) {
                    console.log(row);
                    contador = contador + 1
                    return "<b>" + contador + "</b>";
                },
            },
            {
                data: "tabla"
            },
            {
                data: "descripcion"
            },
            {
                data: null,
                render: function(data, type, row) {
                    return data.nombre
                },
            },
            {
                data: null,
                render: function(data, type, row) {
                    console.log(data);
                    return data.nombre_p + " " + data.apellido_p
                },
            },
            {
                data: "fecha_crea"
            },
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        }
    })

</script>