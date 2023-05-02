<div class="container bg-white mt-5 shadow rounded-4">
     <div class="pt-1">
          <h1 class="titulo_Vista text-center">
               <h1 class="titulo_Vista text-center"><?php echo $titulo ?></h1>
          </h1>
     </div>
     <!-- <div style="height: 30px;"></div> -->
     <div>
          <a href="<?php echo base_url('/usuarios'); ?>"><button class="btn btn-outline-primary"><i class="bi bi-arrow-return-left"></i> Regresar</button></a>
     </div>

     <br>
     <div class="table-responsive" style="overflow:scroll-vertical;overflow-y: scroll !important;">
          <table id="tablaUsuarios" class="table table-bordered table-sm table-hover" id="tablePaises" width="100%" cellspacing="0">
               <thead class="table-dark">
                    <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">Tipo Documento</th>
                    <th class="text-center">Documento</th>
                    <th class="text-center">N_Usuario</th>
                    <th class="text-center">Nombres</th>
                    <th class="text-center">Apellidos</th>
                    <th class="text-center">Rol</th>
                    <th class="text-center">Estado</th>
                    <th class="text-center">Acciones</th>
                    </tr>
               </thead>
               <tbody style="font-family:Arial;font-size:12px;" class="table-group-divider">
                    <?php if ($datos == 'vacio') { ?>
                         <tr>
                              <th class="text-center h1" colspan="11">SIN REGISTROS ELIMINADOS</th>
                         </tr>
                    <?php } else { ?>
                         <?php foreach ($datos as $valor) { ?>
                              <tr>
                                   <td class="text-center"><?php echo $valor['id_usuario']; ?></td>
                                   <td class="text-center"><?php echo $valor['t_documento']; ?></td>
                                   <td class="text-center"><?php echo $valor['n_documento']; ?></td>
                                   <td class="text-center"><?php echo $valor['nombre_corto']; ?></td>
                                   <td class="text-center"><?php echo $valor['nombre_p'] . ' ' . $valor['nombre_s']; ?></td>
                                   <td class="text-center"><?php echo $valor['apellido_p'] . ' ' . $valor['apellido_s']; ?></td>
                                   <?php if ($valor['rol'] == 'Estudiante') { ?>
                                        <td class="text-center"><a href="<?php echo base_url('estudiantes') ?>" class="nav-link text-success"><?php echo $valor['rol']; ?></a></td>
                                   <?php } else { ?>
                                        <td class="text-center"><?php echo $valor['rol']; ?></td>
                                   <?php } ?>
                                   <th class="text-center">
                                        <?php echo $valor['estado'] == 'A' ?  '<span class="text-success"> Activo </span>' : '<span class="text-danger"> Inactivo </span>'; ?>
                                   </th>
                                   <th class="grid grid text-center" colspan="2">

                                        <div class="btn-group">
                                             <button class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#modal-confirma" data-href="<?php echo base_url('/usuarios/cambiarEstado') . '/' . $valor['id_usuario'] . '/' . 'A'; ?>"><i class="bi bi-arrow-clockwise"></i></button>
                                        </div>
                                   </th>

                              </tr>
                         <?php } ?>
                    <?php } ?>

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
          $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
     });

     $('#tablaUsuarios').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        }
    });

     $('.close').click(function() {
          $("#modal-confirma").modal("hide");
     });
</script>