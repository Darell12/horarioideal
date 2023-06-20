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
        <table id="tablaHistorial" class="table align-items-center table-flush table-loader">
            <thead class="thead-light">
                <tr>
                    <th class="text-center" style="width: 1% !important;" scope="col">#</th>
                    <th class="text-center" style="width: 1% !important;" scope="col">Descripcion</th>
                    <th class="text-center" style="width: 1% !important;" scope="col">Tipo</th>
                    <th class="text-center" style="width: 1% !important;" scope="col">Responsable</th>
                </tr>
            </thead>
            <tbody style="font-family:Arial;font-size:12px;" class="table-group-divider">
            </tbody>
        </table>
    </div>
</div>

    <!-- Modal Permisos  -->
    
<script>

var contador = 0
    var tablaHistorial = $('#tablaHistorial').DataTable({
        ajax: {
            url: '<?= base_url('historial/obtenerHistorial') ?>',
            method: "POST",
            dataSrc: "",
        },
        columns: [{
                render: function(data, type, row) {
                    contador = contador + 1
                    return "<b>" + contador + "</b>";
                },
            },
            {
                data: "descripcion"
            },
            {
                data: "tipo"
            },
            {
                data: "responsable"
            },
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        }
    })

    
</script>