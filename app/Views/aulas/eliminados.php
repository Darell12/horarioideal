<div class="container  mt-4 shadow rounded-4">
  <div>
    <h1 class="titulo_Vista text-center"><?php echo $titulo ?></h1>
  </div>
  <div>
    <a href="<?php echo base_url('/ver_aulas'); ?>"><button class="btn btn-outline-primary"><i class="bi bi-arrow-return-left"></i> Regresar</button></a>
  </div>

  <br>
  <div class="table-responsive" style="overflow:scroll-vertical;overflow-y: scroll !important; height: 600px;">
    <table class="table table-bordered table-sm table-hover" width="100%" cellspacing="0">
      <thead class="table-dark">
        <tr>
          <th class="text-center">Id</th>
          <th class="text-center">Nombre</th>
          <th class="text-center">Descripcion</th>
          <th class="text-center">bloque</th>
          <th class="text-center">sede</th>
          <th class="text-center">Estado</th>
          <th class="text-center" colspan="2">Acciones</th>
        </tr>
      </thead>
      <tbody style="font-family:Arial;font-size:12px;" class="table-group-divider">
        <?php if ($datos == 'vacio') { ?>
          <tr>
            <th class="text-center h1" colspan="6">SIN REGISTROS ELIMINADOS</th>
          </tr>
        <?php } else { ?>
          <?php foreach ($datos as $valor) { ?>
            <tr>
              <th class="text-center"><?php echo $valor['id_aula']; ?></th>
              <th class="text-center"><?php echo $valor['nombre']; ?></th>
              <th class="text-center"><?php echo $valor['descripcion']; ?></th>
              <th class="text-center"><?php echo $valor['bloque']; ?></th>
              <th class="text-center"><?php echo $valor['sede']; ?></th>
              <th class="text-center">
                <?php echo $valor['estado'] = 'A' ? '<span class="text-danger"> Inactivo </span>' : '<span class="text-succes"> Inactivo </span>'; ?>
              </th>
              <th class="grid grid text-center" colspan="2">
                <button class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#modal-confirma" data-href="<?php echo base_url('/aulas/cambiarEstado') . '/' . $valor['id_aula'] . '/' . 'A'; ?>" title="Restaurar"><i class="bi bi-arrow-clockwise"></i></button>
              </th>

            </tr>
          <?php } ?>
        <?php } ?>
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
  $('#modal-confirma').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
  });


  $('.close').click(function() {
    $("#modal-confirma").modal("hide");
  });
</script>