<div class="container bg-white shadow rounded-4">
  <div>
    <h1 class="titulo_Vista text-center">
      <!-- <h1 class="titulo_Vista text-center"><?php echo $titulo ?></h1> -->
    </h1>
  </div>
  <div style="height: 30px;"></div>
  <div class="d-flex justify-content-between flex-wrap">
    <a href="<?php echo base_url('/ver_aulas'); ?>"><button class="btn btn-outline-primary"><i class="bi bi-arrow-return-left"></i> Regresar</button></a>
  </div>

  <br>
  <div class="table-responsive">
    <table id="tablaAulas" class="table table-bordered table-sm table-hover" width="100%" cellspacing="0">
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
    $(this).find('.btn-ok').attr('onclick', 'Restaurar(' + $(e.relatedTarget).data('href') + ')');
  });

  function Restaurar(id) {

    $.ajax({
      type: "POST",
      url: "<?php echo base_url('/aulas/cambiarEstado/'); ?>" + id + '/' + 'A',
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
        title: 'Registro restaurado con exito!'
      })
      contador = 0
      tablaAulas.ajax.reload(null, false);
    })
  }

  var contador = 0
  var tablaAulas = $('#tablaAulas').DataTable({
    ajax: {
      url: '<?= base_url('aulas/obtenerAulas') ?>',
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
                  <button class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#modal-confirma" data-href="${data.id_aula}" title="Restaurar"><i class="bi bi-arrow-clockwise"></i></button>
                  </div>`
        },
      }
    ],
    "language": {
      "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
    }
  })


  $('.close').click(function() {
    $("#modal-confirma").modal("hide");
  });
</script>