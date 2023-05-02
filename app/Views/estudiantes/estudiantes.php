<!-- <div class="container"> -->
<div class="container bg-white mt-4 shadow rounded-4">
    <div>
        <h1 class="titulo_Vista text-center"></h1>
    </div>
    <div>
        <h1 class="titulo_Vista text-center">
            <h1 class="titulo_Vista text-center"><?php echo $titulo ?></h1>
        </h1>
    </div>
    <div style="height: 30px;"></div>
    <div>
        <div>
            <button type="button" onclick="seleccionaUsuario(<?php echo 1 . ',' . 1 ?>);" class="btn btn-outline-success " data-bs-toggle="modal" data-bs-target="#UsuarioModal"><i class="bi bi-plus-circle-fill"></i> Agregar</button>
            <a href="<?php echo base_url('/estudiantes/eliminados'); ?>"><button type="button" class="btn btn-outline-secondary"><i class="bi bi-file-x"></i> Eliminados</button></a>
            <a href="<?php echo base_url('/principal'); ?>"><button class="btn btn-outline-primary"><i class="bi bi-arrow-return-left"></i> Regresar</button></a>
        </div>
        <br>
        <div class="table-responsive" style="overflow:scroll-vertical;overflow-y: scroll !important; height: 600px;">
            <table id="example-table" class="table table-bordered table-sm table-hover" id="tablePaises" width="100%" cellspacing="0">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center">Id usuario</th>
                        <th class="text-center">Id de estudiante</th>
                        <th class="text-center">Nombres</th>
                        <th class="text-center">Apellidos</th>
                        <th class="text-center">Id grado</th>
                        <th class="text-center">Estado</th>
                        <th class="text-center" colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody style="font-family:Arial;font-size:12px;" class="table-group-divider">
                    <?php foreach ($datos as $valor) { ?>
                        <tr>
                            <td class="text-center" hidden><input id="util<?php echo $valor['id_usuario'] ?>" type="text" value="<?php echo $valor['id_usuario']; ?>"></td>
                            <td class="text-center"><?php echo $valor['id_usuario']; ?></td>
                            <?php if ($valor['id_grado']) { ?>
                                <td class="text-center"><?php echo $valor['id_estudiante']; ?></td>
                            <?php } else { ?>
                                <td class="text-center">Grado por asignar</td>
                            <?php } ?>

                            <td class="text-center"><?php echo $valor['nombre_p'] . ' ' . $valor['nombre_s']; ?></td>
                            <td class="text-center"><?php echo $valor['apellido_p'] . ' ' . $valor['apellido_s']; ?></td>

                            <?php if ($valor['grado']) { ?>
                                <td class="text-center"><?php echo $valor['grado']; ?></td>
                            <?php } else { ?>
                                <td class="text-center">Grado por asignar <input onchange="AsignarGrado('<?php echo $valor['id_usuario']; ?>')" id="asignarGrado<?php echo $valor['id_usuario']; ?>" class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                            <?php } ?>

                            <td class="text-center">
                                <?php echo $valor['estado'] == 'A' ?  '<span class="text-success"> Activo </span>' : 'Inactivo'; ?>
                            </td>
                            <td class="grid grid text-center" colspan="2">
                                <div class="btn-group">
                                    <button class="btn btn-outline-primary" onclick="seleccionaUsuario(<?php echo $valor['id_usuario'] . ',' . 2 ?>);" data-bs-toggle="modal" data-bs-target="#UsuarioModal" title="Editar Registro">
                                        <i class="bi bi-pencil"></i>
                                    </button>

                                    <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modal-confirma" data-href="<?php echo base_url('/usuarios/cambiarEstado') . '/' . $valor['id_usuario'] . '/' . 'E'; ?>" title="Eliminar Registro">
                                        <i class="bi bi-trash3"></i>
                                    </button>
                                </div>
                            </td>

                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
        <!-- Modal -->
        <form method="POST" action="<?php echo base_url('/estudiantes/insertar'); ?>" onchange="Validardireccion()" autocomplete="off" class="needs-validation" id="formulario" novalidate>
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
                                    <div class="col">
                                        <label class="col-form-label">Rol:</label>
                                        <select class="form-select form-select" name="id_rol" id="rol" required>
                                            <option value="">Seleccione un Rol</option>
                                            <?php foreach ($roles as $rol) { ?>
                                                <?php if($rol['id_rol'] == '3'){?>
                                                    <option value="<?php echo $rol['id_rol']; ?>" selected><?php echo $rol['nombre']; ?></option>
                                                    <?php } else { ?>
                                                        <option value="<?php echo $rol['id_rol']; ?>" disabled><?php echo $rol['nombre']; ?></option>
                                                        <?php }?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label class="col-form-label">Grado:</label>
                                        <select class="form-select form-select" name="id_grado" id="id_grado" required>
                                            <option value="">Seleccione un Grado</option>
                                            <?php foreach ($grados as $grado) { ?>
                                                <option value="<?php echo $grado['id_grado']; ?>"><?php echo $grado['alias']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label class="col-form-label">Tipo de Documento:</label>
                                        <select class="form-select form-select" name="tipo_documento" id="tipo_documento" required>
                                            <option value="0">Seleccione un Tipo</option>
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
                                    <label id="direccion_telefono" for="email">Nombre de Usuario</label>
                                    <input id="nombre_corto" name="nombre_corto" type="text" class="form-control" placeholder="Con este nombre iniciará sesion" required />
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="nombre" class="col-form-label">Primer Nombre:</label>
                                        <input type="text" class="form-control" name="primer_nombre" id="primer_nombre" maxlength="20" pattern="[A-Za-z]+" required>
                                    </div>
                                    <div class="col">
                                        <label for="nombre" class="col-form-label">Segundo Nombre (Opcional):</label>
                                        <input type="text" class="form-control" name="segundo_nombre" id="segundo_nombre" maxlength="20" pattern="[A-Za-z]+" >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="nombre" class="col-form-label">Primer Apellido:</label>
                                        <input type="text" class="form-control" name="primer_apellido" id="primer_apellido" maxlength="20" pattern="[A-Za-z]+" required>
                                    </div>
                                    <div class="col">
                                        <label for="nombre" class="col-form-label">Segundo Apellido:</label>
                                        <input type="text" class="form-control" name="segundo_apellido" id="segundo_apellido" required>
                                    </div>
                                </div>
                                <label id="direccion_usuario" for="direccion">Dirección:</label>
                                <div class="row">
                                    <div class="col">
                                        <select name="dir" id="dir" placeholder="Ej: 23" class="form-select form-select">
                                            <option value="">--Selecciona--</option>
                                            <option>Carrera</option>
                                            <option>Calle</option>
                                            <option>Avenida Calle</option>
                                            <option>Avenida Carrera</option>
                                            <option>Autopista</option>
                                            <option>Avenida</option>
                                            <option>Circunvalar</option>
                                            <option>Diagonal</option>
                                            <option>Transversal</option>
                                            <option>Kilometro</option>
                                            <option>Circular</option>
                                        </select>
                                    </div>

                                    <div class="col">
                                        <input id="dir2" name="dir2" type="text" maxLength="4" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Ej: 17B" required />
                                    </div>
                                    <div class="col">
                                        <input id="dir3" maxLength="4" name="dir3" type="text" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Ej: #68C" required />
                                    </div>
                                    <div class="col">
                                        <input id="dir4" maxLength="4" name="dir4" type="text" class="form-control" placeholder="Ej: 23" required />
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label id="direccion_usuario" for="direccion"></label>
                                    <input id="direccionX" name="direccionX" type="text" class="form-control" readonly class="form-control-plaintext">
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <label id="password_label" for="Password">Contraseña</label>
                                        <input id="contraseña" name="contraseña" type="password" class="form-control" required />
                                    </div>
                                    <div class="col">
                                        <label id="password_label" for="password">Confirme Contraseña</label>
                                        <input id="confirmar_contraseña" name="confirmar_contraseña" type="password" class="form-control" required />
                                    </div>
                                </div>

                                <input type="text" id="usuario_crea" name="usuario_crea" value="<?php session('id') ?>" hidden>
                                <input type="text" id="tp" name="tp" hidden>
                                <input type="text" id="id" name="id_usuario" hidden>
                                <input type="text" id="id" name="id_estudiante" hidden>


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
                        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#modalAgregarEmail" id="btn-agregar-salario">
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
                                    <th class="text-center">Email</th>
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
    <!-- </div> -->
    <div class="modal fade" tabindex="-1" role="dialog" id="modalAgregarEmail" data-bs-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="titulo_email_modal">Agregar Email</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Email:</label>
                        <div class="flex ">
                            <input type="email" name="email_modal" class="form-control" id="email_modal" min="1300606">
                        </div>
                        <label for="message-text" class="col-form-label">Prioridad:</label>
                        <div class="flex ">
                            <select name="prioridad" class="form-select form-select" id="prioridad">
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="flex ">
                            <input type="text" id="id_usuario" name="id_usuario" hidden>
                            <input type="text" id="tp_email" name="tp_email" hidden>
                            <input type="text" id="id_email" name="id_email" hidden>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-primary" id="btn_insertar">Guardar</button>
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>


    <script>

$.validator.addMethod("soloLetras", function(value, element) {
        return this.optional(element) || /^[a-zA-ZñÑ\s]+$/.test(value);
    }, "Por favor ingrese solamente letras.");

    $("#formulario").validate({
        rules: {
            id_rol: {
                required: true,
            },
            tipo_documento: {
                required: true,
            },
            n_documento: {
                required: true,
                minlength: 4,
                maxlength: 12,
                digits: true,
                remote: {
                    url: '<?php echo base_url() ?>usuarios/validar',
                    type: "post",
                    dataType: "json",
                    data: {
                        campo: function() {
                            return 'n_documento';
                        },
                        valor: function() {
                            return $("#n_documento").val();
                        },
                        tp: function() {
                            return $("#tp").val();
                        },
                        nombreActu: function() {
                            return $("#numeroActu").val();
                        },
                    },
                }
            },
            nombre_corto: {
                required: true,
                soloLetras: true,
                remote: {
                    url: '<?php echo base_url() ?>usuarios/validar',
                    type: "post",
                    dataType: "json",
                    data: {
                        campo: function() {
                            return 'nombre_corto';
                        },
                        valor: function() {
                            return $("#nombre_corto").val();
                        },
                        tp: function() {
                            return $("#tp").val();
                        },
                        nombreActu: function() {
                            return $("#nombreActu").val();
                        },
                    },
                }
            },
            primer_nombre: {
                required: true,
                soloLetras: true,
            },
            segundo_nombre: {
                soloLetras: true,
            },
            primer_apellido: {
                required: true,
                soloLetras: true,
            },
            segundo_apellido: {
                required: true,
                soloLetras: true,
            },
            dir: {
                required: true,
            },
            dir2: {
                required: true,
            },
            dir3: {
                required: true,
            },
            dir4: {
                required: true,
            },
        },
        messages: {
            id_grado: {
                required: "Por favor seleccione una opción",
            },
            id_rol: {
                required: "Por favor seleccione una opción",
            },
            tipo_documento: {
                required: "Por favor seleccione una opción",
            },
            n_documento: {
                required: "El número de documento es requerido",
                digits: "Solo ingrese digitos por favor",
                minlength: "El número de documento debe tener al menos 4 caracteres",
                maxlength: "El número de documento no puede tener más de 12 caracteres",
                remote: "Este número de documento ya esta registrado"
            },
            nombre_corto: {
                required: "Este campo es requerido",
                remote: "Este nombre de usuario ya esta en uso"
            },
            primer_nombre: {
                required: "Este campo es requerido",
            },
            primer_apellido: {
                required: "Este campo es requerido",
            },
            segundo_apellido: {
                required: "Este campo es requerido",
            },
            dir: {
                required: "Este campo es requerido",
            },
            dir2: {
                required: "Este campo es requerido",
            },
            dir3: {
                required: "Este campo es requerido",
            },
            dir4: {
                required: "Este campo es requerido",
            },
            contraseña: {
                required: "Este campo es requerido",
            },
            confirmar_contraseña: {
                required: "Este campo es requerido",
                equalTo: "Las contraseñas no coinciden"
            },
        }
    });


        function seleccionaUsuario(id, tp) {
            if (tp == 2) {
                dataURL = "<?php echo base_url('/estudiantes/buscarEstudiantes'); ?>" + "/" + id;
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
                        $('#id_grado').val(rs[0]['id_grado']);
                        $('#direccionX').val(rs[0]['direccion']);
                        $('#id_estudiante').val(rs[0]['id_estudiante']);
                        $('#formulario').validate().resetForm();
                        $('#contraseña').attr('disabled');
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
                $('#direccionX').val('');
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

              <button class="btn btn-outline-warning" data-bs-toggle="modal" hidden-bs-modal(#modal) data-bs-target="#modal-confirma-salario" onclick="almacenarId(${res[i].id},${res[i].id_usuario}, 'A')" ?><i class="bi bi-arrow-clockwise"></i></button>
              </th>
              </tr>
              `
                            }
                            $('#titulo_salario').html('Administrar salarios eliminados de ' + res[0].nombre_empleado);
                        } else {
                            contenido = '<tr><th class="text-center h1" colspan="5">SIN EMAILS ELIMINADOS</th></tr>'
                        }

                        $('#tabla_email').html(contenido);
                        $('#btn-regresar').attr('onclick', 'EmailUsuario(' + id + ',' + '"A")');
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
                                        <button class="btn btn-outline-primary" onclick="seleccionarEmail( ${res[i].id_email} ,2 );"><i class="bi bi-pencil"></i></button>
  
                                        <button class="btn btn-outline-danger" data-bs-toggle="modal" hidden-bs-modal(#modal) data-bs-target="#modal-confirma-salario" onclick="almacenarId(${res[i].id_email},${res[i].id_usuario}, 'E')"><i class="bi bi-trash3"></i></button>
                                    </div>
                                </th>
                            </tr>`
                            }
                            $('#tituloEmail').html('Administrar Emails de ' + res[0].nombre_empleado);

                        } else {
                            contenido = '<tr><th class="text-center h1" colspan="5">SIN EMAILS ASIGNADOS</th></tr>'
                        }
                        $('#titulo_salario').html('Administrar salarios');
                        $('#btn-eliminados-salarios').attr('onclick', 'EmailUsuario(' + id + ',' + '"E")');
                        $('#btn-agregar-salario').show();
                        $('#tabla_email').empty();
                        $('#tabla_email').html(contenido);
                        $('#btn-agregar-salario').attr('onclick', 'seleccionarEmail(' + id + ',' + '1)');
                        $('#btn-eliminados-salarios').show();
                        $('#btn-regresar').hide();
                        $('#ModalEmail').modal('show');
                    }
                })
            }
        }

        function seleccionarEmail(id, tp) {
            if (tp == 2) {
                dataURL = "<?php echo base_url('/email/emailUsuario'); ?>" + "/" + id;
                $.ajax({
                    type: "POST",
                    url: dataURL,
                    dataType: "json",
                    success: function(rs) {
                        console.log(rs);
                        $("#tp_email").val(2)
                        $("#id_email").val(id)
                        $("#email_modal").val(rs.email)
                        $("#prioridad").val(rs.prioridad)
                        $("#id_usuario").val(rs.id_usuario)
                        $('#salario_modal').val(rs.sueldo);
                        EmailUsuario(rs.id_usuario, rs.estado)

                        $("#btn_Guardar").text('Actualizar');
                        $("#titulo_salario_modal").text('Actualizar el salario de ' + rs.nombre_empleado + ' en el periodo ' + rs.periodo);
                        $("#modalAgregarEmail").modal("show");
                    }
                })
            } else {
                $("#tp_email").val(1);
                $("#id_usuario").val(id)
                $("#email_modal").val('')
                $('#prioridad').val(0);
                EmailUsuario(rs.id_usuario, rs.estado)
                $("#btn_Guardar").text('Guardar');
                $("#titulo_salario_modal").text('Agregar nuevo salario');
                $("#modalAgregarEmail").modal("show");
            }
        }

        function almacenarId(id_email, id_usuario, estado) {
            $("#id_almacenar").val(id_email);
            $("#id_almacenar_empleado").val(id_usuario);
            $("#id_almacenar_estado").val(estado);
            $("#modal-confirma-salario").modal('show');
        }

        $('#btn_insertar').click(function() {
            console.log('Onclick Button');
            var data = {
                tp_email: $('#tp_email').val(),
                email: $('#email_modal').val(),
                id_usuario: $('#id_usuario').val(),
                prioridad: $('#prioridad').val(),
                id_email: $('#id_email').val()
            };
            if (data.email == "" || data.prioridad == 0) {
                return swal.fire({
                    postition: 'top-end',
                    icon: 'error',
                    title: 'Error campos incompletos',
                    text: 'Debe llenar todos los campos',
                    showConfirmButton: false,
                    timer: 1500
                })
            }

            $.post("<?php echo base_url('/email/insertar'); ?>", data, function(response) {
                // Actualiza el contenido de la página
                EmailUsuario(data.id_usuario, 'A')
                $("#modalAgregarEmail").modal('hide');
            });
        });

        $('#btnEliminar').click(function() {
            var data = {
                id_email: $('#id_almacenar').val(),
                estado: $('#id_almacenar_estado').val(),
                id_usuario: $('#id_almacenar_empleado').val()
            };
            $.post("<?php echo base_url('/email/cambiarEstado'); ?>", data, function(response) {
                // Actualiza el contenido de la página
                seleccionarEmail(data.id_usuario, data.estado == 'A' ? 'E' : 'A')
                $("#modal-confirma-salario").modal('hide');
            });
        });

        function AsignarGrado(id) {

            let newElement = `<div class="input-group row">
            <div class="col">
            <select id="id_grado_asig" class="select-form">
            <option value="">-Seleccione un grado-</option>
            <?php foreach ($grados as $grado) { ?>
                <option value='<?php echo $grado['id_grado'] ?>' > <?php echo $grado['alias'] ?> </option>
            <?php } ?>
            </select>   
            <button type="button" id="guardarCambios" onClick="insertarGrado(${id})" class="btn btn-outline-dark btn-sm"><i class="bi bi-check"></i></button>
            </div>
            </div>
            `
            $('#asignarGrado' + id).replaceWith(newElement);
            // Código de tu función aquí
            console.log('La función se ha activado!' + id);
            var data = {
                id_usuario: $('#util' + id).val(),
                tp: 1,
                id_grado: $('#id_grado_asig').val(),
            };
            console.log(data);
        }

        function insertarGrado(id) {
            console.log('gCambios');
            var data = {
                id_usuario: $('#util' + id).val(),
                tp: 1,
                id_grado: $('#id_grado_asig').val(),
            };
            console.log(data);
            $.post("<?php echo base_url('/estudiantes/insertar'); ?>", data, function(response) {
                location.reload();
            });
        }

        $('.close').click(function() {
            $("#modal-confirma").modal("hide");
        });

        function Validardireccion() {
            var dir1 = document.getElementById('dir');
            var dir2 = document.getElementById('dir2');
            var dir3 = document.getElementById('dir3');
            var dir4 = document.getElementById('dir4');
            var direccionReal = dir1.value + ' ' + dir2.value + ' ' + '#' + dir3.value + ' ' + '-' + ' ' + dir4.value;

            document.getElementById('direccionX').value = direccionReal;
        }
    </script>