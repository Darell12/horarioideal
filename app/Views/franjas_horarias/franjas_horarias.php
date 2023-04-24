<!-- <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/bootstrap-icons/bootstrap-icons.css">
    <script src="<?php echo base_url('/bootstrap/bootstrap.bundle.min.js'); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head> -->


<div class="container">
    <div class="container bg-white mt-5 shadow rounded-4">
        <div>
            <h1 class="titulo_Vista text-center">
                <h1 class="titulo_Vista text-center"><?php echo $titulo ?></h1>
            </h1>
        </div>
        <div style="height: 30px;"></div>
        <div>
            <button type="button" onclick="seleccionaFranja(<?php echo 1 . ',' . 1 ?>);" class="btn btn-outline-success " data-bs-toggle="modal" data-bs-target="#FranjaModal"><i class="bi bi-plus-circle-fill"></i> Agregar</button>
            <a href="<?php echo base_url('/franjas_horarias/eliminados'); ?>">

                <button type="button" class="btn btn-outline-secondary"><i class="bi bi-file-x"></i> Eliminados</button></a>
            <a href="<?php echo base_url('/principal'); ?>"><button class="btn btn-outline-primary"><i class="bi bi-arrow-return-left"></i> Regresar</button></a>
        </div>
        <br>
        <div class="table-responsive" style="overflow:scroll-vertical;overflow-y: scroll !important; height: 600px;">
            <table class="table table-bordered table-sm table-hover" id="tablePaises" width="100%" cellspacing="0">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center">Id</th>
                        <th class="text-center">Hora Inicio</th>
                        <th class="text-center">Hora Fin</th>
                        <th class="text-center">Estado</th>
                        <th class="text-center" colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody style="font-family:Arial;font-size:12px;" class="table-group-divider">
                    <?php foreach ($datos as $valor) { ?>
                        <tr>
                            <th class="text-center"><?php echo $valor['id_franja_horaria']; ?></th>
                            <th class="text-center"><?php echo $valor['hora_inicio']; ?></th>
                            <th class="text-center"><?php echo $valor['hora_fin']; ?></th>
                            <th class="text-center">
                                <?php echo $valor['estado'] == 'A' ?  '<span class="text-success"> Activo </span>' : 'Inactivo'; ?>
                            </th>
                            <th class="grid grid text-center" colspan="2">

                                <button class="btn btn-outline-primary" onclick="seleccionaFranja(<?php echo $valor['id_franja_horaria'] . ',' . 2 ?>);" data-bs-toggle="modal" data-bs-target="#FranjaModal">

                                    <i class="bi bi-pencil"></i>

                                </button>

                                <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modal-confirma" data-href="<?php echo base_url('/estado_franjas') . '/' . $valor['id_franja_horaria'] . '/' . 'E'; ?>"><i class="bi bi-trash3"></i></button>
                            </th>

                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
        <!-- Modal -->
        <form method="POST" action="<?php echo base_url('/franjas_insertar'); ?>" autocomplete="off" class="needs-validation" id="formulario" novalidate>
            <div class="modal fade" id="FranjaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="tituloModal">Añadir Franjas Horarias</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <div class="row">

                                    <div class="col">
                                        <label for="nombre" class="col-form-label">Hora Inicio:</label>
                                        <input type="time" class="form-control" name="hora_inicio" id="hora_inicio" required>
                                    </div>

                                    <div class="col">
                                        <label for="nombre" class="col-form-label">Hora Fin:</label>
                                        <input type="time" class="form-control" name="hora_fin" id="hora_fin" required>
                                    </div>

                                    <input type="text" id="tp" name="tp" hidden>
                                    <input type="text" id="id" name="id" hidden>


                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" clsass="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-outline-primary" id="btn_Guardar">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
        </form>

        <!-- Modal Confirma Eliminar -->
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
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });

        function seleccionaFranja(id, tp) {
            if (tp == 2) {
                dataURL = "<?php echo base_url('/franjas_horarias/buscarFranjas'); ?>" + "/" + id;
                $.ajax({
                    type: "POST",
                    url: dataURL,
                    dataType: "json",
                    success: function(rs) {
                        console.log(rs[0])
                        $("#tp").val(2);
                        $("#id").val(id)
                        $('#hora_inicio').val(rs[0]['hora_inicio']);
                        $('#hora_fin').val(rs[0]['hora_fin']);
                        $("#btn_Guardar").text('Actualizar');
                        $("#FranjaModal").modal("show");
                    }
                })
            } else {
                $("#tp").val(1);
                $('#hora_inicio').val('');
                $('#hora_fin').val('');
                $("#btn_Guardar").text('Guardar');
                $("#FranjaModal").modal("show");
            }
        }


        $('.close').click(function() {
            $("#modal-confirma").modal("hide");
        });
    </script>