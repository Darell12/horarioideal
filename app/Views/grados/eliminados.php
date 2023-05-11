<div class="container bg-white rounded rounded-3">
  <div class="d-flex justify-content-between flex-wrap">
    <div class="pt-1">
      <h1 class="titulo_Vista text-center">
      </h1>
    </div>
    <div>
      <a href="<?php echo base_url('/ver_grados'); ?>"><button class="btn btn-outline-primary"><i class="bi bi-arrow-return-left"></i> Regresar</button></a>
    </div>
  </div>
  <br>
  <div class="table-responsive">
    <table class="table align-items-center table-flush" id="tablaGrados" width="100%" cellspacing="0">
      <thead class="thead-light">
        <tr>
          <th class="text-center">Id</th>
          <th class="text-center">Grados</th>
          <th class="text-center">Acciones</th>
        </tr>
      </thead>
      <tbody class="table-group-divider">

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
      url: "<?php echo base_url('/grados/cambiarEstado/'); ?>" + id + '/' + 'A',
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
      tablaGrados.ajax.reload(null, false);
    })
  }

  var contador = 0
  var tablaGrados = $('#tablaGrados').DataTable({
    ajax: {
      url: '<?= base_url('grados/obtenerGrados') ?>',
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
        data: "alias"
      },
      {
        data: null,
        render: function(data, type, row) {
          return `<div class="btn-group container">
                              <button class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#modal-confirma" title="Resetear Contraseña" data-href="${data.id_grado}"><i class="bi bi-arrow-clockwise"></i></button>
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