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
    <div class="container  mt-4 shadow rounded-4">
        <div>
            <h1 class="titulo_Vista text-center"></h1>
        </div>
        <div>
            <button type="button" onclick="seleccionaUsuario(<?php echo 1 . ',' . 1 ?>);" class="btn btn-outline-success " data-bs-toggle="modal" data-bs-target="#UsuarioModal"><i class="bi bi-plus-circle-fill"></i> Agregar</button>
            <a href="<?php echo base_url('/usuarios/eliminados'); ?>"><button type="button" class="btn btn-outline-secondary"><i class="bi bi-file-x"></i> Eliminados</button></a>
            <a href="<?php echo base_url('/principal'); ?>"><button class="btn btn-outline-primary"><i class="bi bi-arrow-return-left"></i> Regresar</button></a>
        </div>
        <br>
        <div class="table-responsive" style="overflow:scroll-vertical;overflow-y: scroll !important; height: 600px;">
            <table class="table table-bordered table-sm table-hover" id="tablePaises" width="100%" cellspacing="0">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center">Id</th>
                        <th class="text-center">Tipo Documento</th>
                        <th class="text-center">N°Documento</th>
                        <th class="text-center">N_Usuario</th>
                        <th class="text-center">Primer Nombre</th>
                        <th class="text-center">Segundo Nombre</th>
                        <th class="text-center">Primer Apellido</th>
                        <th class="text-center">Segundo Apellido</th>
                        <th class="text-center">Rol</th>
                        <th class="text-center">Estado</th>
                        <th class="text-center">Emails</th>
                        <th class="text-center">Telefonos</th>
                        <th class="text-center" colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody style="font-family:Arial;font-size:12px;" class="table-group-divider">
                    <?php foreach ($datos as $valor) { ?>
                        <tr>
                            <th class="text-center"><?php echo $valor['id_usuario']; ?></th>
                            <th class="text-center"><?php echo $valor['t_documento']; ?></th>
                            <th class="text-center"><?php echo $valor['n_documento']; ?></th>
                            <th class="text-center"><?php echo $valor['nombre_corto']; ?></th>
                            <th class="text-center"><?php echo $valor['nombre_p']; ?></th>
                            <th class="text-center"><?php echo $valor['nombre_s']; ?></th>
                            <th class="text-center"><?php echo $valor['apellido_p']; ?></th>
                            <th class="text-center"><?php echo $valor['apellido_s']; ?></th>
                            <th class="text-center"><?php echo $valor['rol']; ?></th>
                            <th class="text-center">
                                <?php echo $valor['estado'] == 'A' ?  '<span class="text-success"> Activo </span>' : 'Inactivo'; ?>
                            </th>
                            <th class="text-center">
                                <button class="btn btn-outline-info" onclick="EmailUsuario(<?php echo $valor['id_usuario'] . ',' ?> '<?php echo $valor['estado'] ?>');" data-bs-toggle="modal" title="Editar Registro">
                                    <i class="bi bi-envelope-at-fill"></i>
                                </button>
                            </th>
                            <th class="text-center">
                                <button class="btn btn-outline-success" onclick="seleccionaUsuario(<?php echo $valor['id_usuario'] . ',' . 2 ?>);" data-bs-toggle="modal" data-bs-target="#UsuarioModal" title="Editar Registro">
                                    <i class="bi bi-telephone"></i> </button>
                            </th>
                            <th class="grid grid text-center" colspan="2">
                                <div class="btn-group">
                                    <button class="btn btn-outline-primary" onclick="seleccionaUsuario(<?php echo $valor['id_usuario'] . ',' . 2 ?>);" data-bs-toggle="modal" data-bs-target="#UsuarioModal" title="Editar Registro">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    <button class="btn btn-outline-warning" onclick="seleccionaUsuario(<?php echo $valor['id_usuario'] . ',' . 2 ?>);" data-bs-toggle="modal" data-bs-target="#UsuarioModal" title="Resetear Contraseña">
                                        <i class="bi bi-arrow-clockwise"></i>
                                    </button>
                                    <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modal-confirma" data-href="<?php echo base_url('/usuarios/cambiarEstado') . '/' . $valor['id_usuario'] . '/' . 'E'; ?>" title="Eliminar Registro">
                                        <i class="bi bi-trash3"></i>
                                    </button>
                                </div>
                            </th>

                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
        <!-- Modal -->
        <form method="POST" action="<?php echo base_url('/usuarios/insertar'); ?>" autocomplete="off" class="needs-validation" id="formulario" novalidate>
            <div class="modal fade" id="UsuarioModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="tituloModal">Añadir Usuario</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <div class="row">
                                    <div class="">
                                        <label class="col-form-label">Rol:</label>
                                        <select class="form-select form-select" name="id_rol" id="rol" required>
                                            <option value="">Seleccione un Rol</option>
                                            <?php foreach ($roles as $rol) { ?>
                                                <option value="<?php echo $rol['id_rol']; ?>"><?php echo $rol['nombre']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label class="col-form-label">Tipo de Documento:</label>
                                        <select class="form-select form-select" name="tipo_documento" id="tipo_documento" required>
                                            <option value="">Seleccione un Tipo</option>
                                            <option value="2">Cedula de Ciudadania</option>
                                            <option value="1">Tarjeta de Identidad</option>
                                            <option value="3">Cedula de Extranjeria</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="nombre" class="col-form-label">Numéro de Documento:</label>
                                        <input type="number" class="form-control" name="n_documento" id="n_documento" required>
                                    </div>
                                </div>
                                <div class="">
                                    <label id="email_label" for="email">Nombre de Usuario</label>
                                    <input id="nombre_corto" name="nombre_corto" type="text" class="form-control" placeholder="Con este nombre iniciará sesion" required />
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="nombre" class="col-form-label">Primer Nombre:</label>
                                        <input type="text" class="form-control" name="primer_nombre" id="primer_nombre" maxlength="20" placeholder="Digite el nombre de un país" pattern="[A-Za-z]+" required>
                                    </div>
                                    <div class="col">
                                        <label for="nombre" class="col-form-label">Segundo Nombre:</label>
                                        <input type="text" class="form-control" name="segundo_nombre" id="segundo_nombre" maxlength="20" placeholder="Digite el nombre de un país" pattern="[A-Za-z]+" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="nombre" class="col-form-label">Primer Apellido:</label>
                                        <input type="text" class="form-control" name="primer_apellido" id="primer_apellido" maxlength="20" placeholder="Digite el nombre de un país" pattern="[A-Za-z]+" required>
                                    </div>
                                    <div class="col">
                                        <label for="nombre" class="col-form-label">Segundo Apellido:</label>
                                        <input type="text" class="form-control" name="segundo_apellido" id="segundo_apellido" required>
                                    </div>
                                </div>
                                <div class="">
                                    <label id="email_label" for="email">Dirección:</label>
                                    <input id="direccion" name="direccion" type="text" class="form-control" required />
                                </div>
                                <!-- <div class="">
                                    <label id="email_label" for="email">Correo Electronico</label>
                                    <input id="email" name="email" type="email" class="form-control" required />
                                </div> -->
                                <div class="row">
                                    <div class="col">
                                        <label id="password_label" for="password">Contraseña</label>
                                        <input id="contraseña" name="contraseña" type="password" class="form-control" required />
                                    </div>
                                    <div class="col">
                                        <label id="password_label" for="password">Confirme Contraseña</label>
                                        <input id="confirmar_contraseña" name="confirmar_contraseña" type="password" class="form-control" required />
                                    </div>
                                </div>

                                <input type="text" id="CodigoValido" name="CodigoValido" hidden>
                                <input type="text" id="usuario_crea" name="usuario_crea" value="<?php session('id') ?>" hidden>
                                <input type="text" id="tp" name="tp" hidden>
                                <input type="text" id="id" name="id" hidden>
                                <input type="text" id="NombreValido" name="NombreValido" hidden>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-outline-primary" id="btn_Guardar">Guardar</button>
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
        <!-- Modal Elimina -->
    </div>

    <div id="ModalEmail" class="modal">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title" id="titulo_salario"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="btn-group mb-3" id="btn-group-salarios" role="group" aria-label="Basic mixed styles example">
                        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#modalAgregarSalario" id="btn-agregar-salario">
                            <i class="bi bi-plus-circle-fill"></i> Agregar</button>

                        <button type="button" class="btn btn-outline-secondary" id="btn-eliminados-salarios">
                            <i class="bi bi-file-x"></i> Eliminados</button>

                        <button class="btn btn-outline-primary" id="btn-regresar"><i class="bi bi-arrow-return-left"></i> Regresar</button>

                    </div>

                    <div class="table-responsive" style="overflow:scroll-vertical;overflow-y: scroll !important; height: 600px;">
                        <table class="table table-bordered table-sm table-hover" id="tableEmpleados" width="100%" cellspacing="0">
                            <thead class="table-dark">
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Salario</th>
                                    <th class="text-center">Periodo</th>
                                    <th class="text-center">Estado</th>
                                    <th class="text-center" colspan="2">Acciones</th>
                                </tr>
                            </thead>
                            <tbody style="font-family:Arial;font-size:12px;" id="tabla_email">

                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
</div>



<script>
    $('#modal-confirma').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });

    function seleccionaUsuario(id, tp) {
        if (tp == 2) {
            dataURL = "<?php echo base_url('/usuarios/buscarUsuario'); ?>" + "/" + id;
            $.ajax({
                type: "POST",
                url: dataURL,
                dataType: "json",
                success: function(rs) {
                    console.log(rs[0])
                    $("#tp").val(2);
                    $("#id").val(id)
                    $('#tipo_documento').val(rs[0]['tipo_documento']);
                    $('#rol').val(rs[0]['id_rol']);
                    $('#n_documento').val(rs[0]['n_documento']);
                    $('#nombre_corto').val(rs[0]['nombre_corto']);
                    $('#primer_nombre').val(rs[0]['nombre_p']);
                    $('#segundo_nombre').val(rs[0]['nombre_s']);
                    $('#primer_apellido').val(rs[0]['apellido_p']);
                    $('#segundo_apellido').val(rs[0]['apellido_s']);
                    $('#direccion').val(rs[0]['direccion']);
                    // $('#contraseña').val(rs[0]['contraseña']);
                    $('#contraseña').attr('hidden');
                    $('#confirmar_contraseña').attr('hidden');
                    $("#btn_Guardar").text('Actualizar');
                    $("#UsuarioModal").modal("show");
                }
            })
        } else {
            $("#tp").val(1);
            $('#tipo_documento').val('');
            $('#n_documento').val('');
            $('#nombre_corto').val('');
            $('#primer_nombre').val('');
            $('#segundo_nombre').val('');
            $('#primer_apellido').val('');
            $('#segundo_apellido').val('');
            $('#contraseña').val('');
            $("#btn_Guardar").text('Guardar');
            $("#UsuarioModal").modal("show");
        }
    }


    function EmailUsuario(id, estado) {


        dataURL = "<?php echo base_url('/email/Email'); ?>" + "/" + id + '/' + estado

        if (estado == 'E') {
            $.ajax({
                type: "POST",
                url: dataURL,
                dataType: "json",
                success: function(res) {
                    $('#tabla_email').empty();
                    var contenido = '';
                    if (!$(res).length == 0) {
                        for (let i = 0; i < res.length; i++) {
                            contenido += `
                            <tr>
              <th class="text-center"> ${res[i].id}</th>
              <th class="text-center"> ${res[i].sueldo}</th>
              <th class="text-center"> ${res[i].periodo}</th>
              <th class="text-center text-danger"> ${res[i].estado == 'A' ? 'Activo' : 'Inactivo'}</th>
              <th class="text-center">

              <button class="btn btn-outline-warning" data-bs-toggle="modal" hidden-bs-modal(#modal) data-bs-target="#modal-confirma-salario" onclick="almacenarId(${res[i].id},${res[i].id_empleado}, 'A')" ?><i class="bi bi-arrow-clockwise"></i></button>
              </th>
              </tr>
              `
                        }
                        $('#titulo_salario').html('Administrar salarios eliminados de ' + res[0].nombre_empleado);
                    } else {
                        contenido = '<tr><th class="text-center h1" colspan="5">SIN EMAILS ELIMINADOS</th></tr>'
                    }

                    $('#tabla_email').html(contenido);
                    $('#btn-regresar').attr('onclick', 'salarios_empleados(' + id + ',' + '"A")');
                    $('#btn-eliminados-salarios').hide();
                    $('#btn-regresar').show();
                    $('#btn-agregar-salario').hide();
                    $('#ModalEmail').modal('show');
                }
            })
        } else {
            $.ajax({
                type: "POST",
                url: dataURL,
                dataType: "json",
                success: function(res) {
                    console.log(res)
                    var contenido = '';
                    if (!$(res).length == 0) {
                        for (let i = 0; i < res.length; i++) {
                            contenido += `
                            <tr>
                                <th class="text-center"> ${res[i].id_email}</th>
                                <th class="text-center"> ${res[i].email}</th>
                                <th class="text-center"> ${res[i].prioridad}</th>
                                <th class="text-center text-success"> ${res[i].estado == 'A' ? 'Activo' : 'Inactivo'}</th>
                                <th class="text-center">
                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <button class="btn btn-outline-primary" onclick="seleccionarSalario( ${res[i].id_email} ,2 );"><i class="bi bi-pencil"></i></button>
  
                                        <button class="btn btn-outline-danger" data-bs-toggle="modal" hidden-bs-modal(#modal) data-bs-target="#modal-confirma-salario" onclick="almacenarId(${res[i].id_email},${res[i].id_usuario}, 'E')"><i class="bi bi-trash3"></i></button>
                                    </div>
                                </th>
                            </tr>`
                            // data - href = "<?php echo base_url('/salarios/cambiarEstado/') ?>${res[i].id}/E"
                        }
                        $('#titulo_salario').html('Administrar salarios de ' + res[0].nombre_empleado);

                    } else {
                        contenido = '<tr><th class="text-center h1" colspan="5">SIN EMAILS ASIGNADOS</th></tr>'
                    }
                    $('#titulo_salario').html('Administrar salarios');
                    $('#btn-eliminados-salarios').attr('onclick', 'salarios_empleados(' + id + ',' + '"E")');
                    $('#btn-agregar-salario').show();
                    $('#tabla_email').empty();
                    $('#tabla_email').html(contenido);
                    $('#btn-agregar-salario').attr('onclick', 'seleccionarSalario(' + id + ',' + '1)');
                    $('#btn-eliminados-salarios').show();
                    $('#btn-regresar').hide();
                    $('#ModalEmail').modal('show');
                }
            })
        }
    }





    $('.close').click(function() {
        $("#modal-confirma").modal("hide");
    });
</script>