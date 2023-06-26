<div class="container bg-white rounded rounded-3">
     <div class="d-flex justify-content-between flex-wrap">
          <div class="pt-1">
               <h1 class="titulo_Vista text-center">
               </h1>
          </div>
          <!-- <div style="height: 30px;"></div> -->
          <div style="margin-top: 1em;">
               <a href="<?php echo base_url('/usuarios'); ?>"><button class="btn btn-outline-primary"><i class="bi bi-arrow-return-left"></i> Regresar</button></a>
          </div>
     </div>


     <br>
     <div class="table-responsive" style="overflow:scroll-vertical;overflow-y: scroll !important;">
          <table id="tablaUsuarios" class="table align-items-center table-flush table-loader">
               <thead class="thead-light">
                    <tr>
                         <th class="text-center">Id</th>
                         <th class="text-center">Tipo Documento</th>
                         <th class="text-center">Documento</th>
                         <th class="text-center">Nombres</th>
                         <th class="text-center">Apellidos</th>
                         <th class="text-center">Rol</th>
                         <th class="text-center">Acciones</th>
                    </tr>
               </thead>
               <tbody style="font-family:Arial;font-size:12px;" class="table-group-divider">

               </tbody>
          </table>
     </div>

     <form method="POST" action="<?php echo base_url('/usuarios/Restaurar'); ?>" class="form-check-inline">
          <div class="modal fade" id="Restaurar" tabindex="-1" aria-labelledby="Resturar" aria-hidden="true" data-bs-backdrop="static">
               <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                         <div class="modal-header">
                              <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">¿Desea Restaurar este país?</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                         </div>
                         <div class="modal-body">
                              <span>
                                   <h3 class="text-center" id="PaisRestaurar"></h3>
                              </span>
                              <input type="text" id="idR" name="id" hidden>
                              <input type="text" id="estado" name="estado" hidden>
                         </div>
                         <div class="modal-footer">
                              <a href="<?php echo base_url('/paises/eliminados') ?>"><button type="button close" class="btn btn-secondary" data-bs-dismiss="modal">Close</button></a>

                              <!-- <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button> -->
                              <button type="submit" class="btn btn-outline-success">Restaurar</button>
                         </div>
                    </div>
               </div>
          </div>
     </form>


     <form method="POST" action="<?php echo base_url('/departamentos/Restaurar'); ?>" class="form-check-inline">
          <div class="modal fade" id="Restaurar" tabindex="-1" aria-labelledby="Resturar" aria-hidden="true" data-bs-backdrop="static">
               <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                         <div class="modal-header">
                              <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">¿Desea Restaurar este Dpto?</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                         </div>
                         <div class="modal-body">
                              <span>
                                   <h3 class="text-center" id="DptoRestaurar"></h3>
                              </span>
                              <input type="text" id="idR" name="id" hidden>
                              <input type="text" id="estado" name="estado" hidden>
                         </div>
                         <div class="modal-footer">
                              <a href="<?php echo base_url('/departamentos/eliminados') ?>"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button></a>

                              <!-- <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button> -->
                              <button type="submit" class="btn btn-outline-success">Restaurar</button>
                         </div>
                    </div>
               </div>
          </div>
     </form>

     <!-- Modal Confirma Eliminar -->
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

     $(document).ready(function() {
          $('#tablaUsuarios').on('init.dt', function() {
               $("#tablaUsuarios").removeClass('table-loader').show();
          });
          setTimeout(function() {
               $('#tablaUsuarios').DataTable();
          }, 3000);

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
               contador = 0
               tablaUsuarios.ajax.reload(null, false);
          })
     }
     var contador = 0
     var tablaUsuarios = $('#tablaUsuarios').DataTable({
          ajax: {
               url: '<?= base_url('usuarios/obtenerUsuarios') ?>',
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
                    data: "t_documento"
               },
               {
                    data: "n_documento"
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
                    data: "rol"
               },
               {
                    data: null,
                    render: function(data, type, row) {
                         return `
                         <div class="btn-group text-center">
                              <button class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#modal-confirma" title="Resetear Contraseña" data-href="${data.id_usuario}"><i class="bi bi-arrow-clockwise"></i></button>
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