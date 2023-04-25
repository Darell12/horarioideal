<div class="container bg-white mt-5 shadow rounded-4">
    <div>
        <h1 class="titulo_Vista text-center">
            <h1 class="titulo_Vista text-center"><?php echo $titulo ?></h1>
        </h1>
    </div>
    <div style="height: 30px;"></div>
    <div>
        <button type="button" onclick="seleccionaHorarios_enc(<?php echo 1 . ',' . 1 ?>);" class="btn btn-outline-success " data-bs-toggle="modal" data-bs-target="#Horarios_encModal"><i class="bi bi-plus-circle-fill"></i> Agregar</button>
        <a href="<?php echo base_url('/eliminados_horarios_enc'); ?>"><button type="button" class="btn btn-outline-secondary"><i class="bi bi-file-x"></i> Eliminados</button></a>
        <a href="<?php echo base_url('/principal'); ?>"><button class="btn btn-outline-primary"><i class="bi bi-arrow-return-left"></i> Regresar</button></a>
    </div>

    <br>
    <div class="table-responsive" style="overflow:scroll-vertical;overflow-y: scroll !important; height: 600px;">
        <table class="table table-bordered table-sm table-hover" id="tablePaises" width="100%" cellspacing="0">
            <thead class="table-dark">
                <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">Profesor</th>
                    <th class="text-center">Asignatura</th>
                    <th class="text-center">Aula</th>
                    <th class="text-center">Día</th>
                    <th class="text-center">Hora Incio</th>
                    <th class="text-center">Hora Fin</th>
                    <th class="text-center" colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody style="font-family:Arial;font-size:12px;" class="table-group-divider">
                <?php foreach ($datos as $valor) { ?>
                    <tr>
                        <th class="text-center"><?php echo $valor['id_horario_det']; ?></th>
                        <th class="text-center"><?php echo $valor['profesor']; ?></th>
                        <th class="text-center"><?php echo $valor['asignatura']; ?></th>
                        <th class="text-center"><?php echo $valor['aula']; ?></th>
                        <th class="text-center"><?php echo $valor['dia']; ?></th>
                        <th class="text-center"><?php echo $valor['hora_inicio']; ?></th>
                        <th class="text-center"><?php echo $valor['hora_fin']; ?></th>

                        <th class="grid grid text-center" colspan="2">

                            <div class="btn-group">
                                <a href="<?php echo base_url('ver_detalle/') . $valor['id_horario_det']?>" class="nav-link">
                                    <button class="btn btn-outline-warning"  title="Administrar">
                                        <i class="bi bi-gear-wide"></i>
                                    </button>
                                </a>
                                <button class="btn btn-outline-primary" onclick="seleccionaHorarios_enc(<?php echo $valor['id_horario_det'] . ',' . 2 ?>);" data-bs-toggle="modal" data-bs-target="#Horarios_encModal">
                                    <i class="bi bi-pencil"></i>
                                </button>

                                <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modal-confirma" data-href="<?php echo base_url('/estado_acciones') . '/' . $valor['id_horario_det'] . '/' . 'E'; ?>"><i class="bi bi-trash3"></i></button>
                            </div>
                        </th>

                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>