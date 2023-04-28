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
                        <th class="text-center">Nombres</th>
                        <th class="text-center">Apellidos</th>
                        <th class="text-center">Asignatuas</th>
                        <th class="text-center">Estado</th>
                        <th class="text-center" colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody style="font-family:Arial;font-size:12px;" class="table-group-divider">
                    <?php foreach ($datos as $valor) { ?>
                        <tr>
                            <td class="text-center" hidden><input id="util<?php echo $valor['id_usuario'] ?>" type="text" value="<?php echo $valor['id_usuario']; ?>"></td>
                            <td class="text-center"><?php echo $valor['id_usuario']; ?></td>

                            <td class="text-center"><?php echo $valor['nombre_p'] . ' ' . $valor['nombre_s']; ?></td>
                            <td class="text-center"><?php echo $valor['apellido_s'] . ' ' . $valor['apellido_p']; ?></td>

                            <?php if ($valor['grado']) { ?>
                                <td class="text-center">
                                    <button class="btn btn-outline-warning" onclick="Asignaturas(<?php echo $valor['id_usuario'] . ',' ?> '<?php echo $valor['estado'] ?>');">
                                        <i class="bi bi-journal-bookmark"></i>
                                    </button>
                                </td>
                            <?php } else { ?>
                                <td class="text-center">
                                    <button onclick="Asignaturas(<?php echo $valor['id_usuario'] . ',' ?> '<?php echo $valor['estado'] ?>');" id="asignarGrado<?php echo $valor['id_usuario']; ?>" class="btn btn-outline-warning" value="" id="flexCheckDefault">
                                        <i class="bi bi-journal-bookmark"></i>
                                    </button>

                                    <span class="text-danger"> <br>Sin Asignaturas <br> Bajo Cargo <br> </span>
                                </td>
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
                                                <?php if ($rol['id_rol'] == '3') { ?>
                                                    <option value="<?php echo $rol['id_rol']; ?>" selected><?php echo $rol['nombre']; ?></option>
                                                <?php } else { ?>
                                                    <option value="<?php echo $rol['id_rol']; ?>" disabled><?php echo $rol['nombre']; ?></option>
                                                <?php } ?>
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
                                        <label for="nombre" class="col-form-label">Segundo Nombre:</label>
                                        <input type="text" class="form-control" name="segundo_nombre" id="segundo_nombre" maxlength="20" pattern="[A-Za-z]+" required>
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

    <div id="ModalAsignaturas" class="modal">
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
                                    <th class="text-center">Asignaturas</th>
                                    <th class="text-center">Grado</th>
                                    <th class="text-center">Estado</th>
                                    <th class="text-center" colspan="2">Acciones</th>
                                </tr>
                            </thead>
                            <tbody style="font-family:Arial;font-size:12px;" id="tabla_asignatura">

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
        function Asignaturas(id, estado) {

            dataURL = "<?php echo base_url('/profesores/obtenerAsignaturasProfesor'); ?>" + "/" + id

            if (estado == 'E') {
                $.ajax({
                    type: "POST",
                    url: dataURL,
                    dataType: "json",
                    success: function(res) {
                        res = res[0];

                        $('#tabla_asignatura').empty();
                        var contenido = '';
                        if (!$(res).length == 0) {
                            for (let i = 0; i < res.length; i++) {
                                contenido += `
                    <tr>
                    <th class="text-center"> ${res[i].id_asignatura_profesor}</th>
                    <th class="text-center"> ${res[i].asignatura}</th>
                    <th class="text-center"> ${res[i].alias}</th>
                    <th class="text-center text-danger"> ${res[i].estado == 'A' ? 'Activo' : 'Inactivo'}</th>
                    <th class="text-center">

      <button class="btn btn-outline-warning" data-bs-toggle="modal" hidden-bs-modal(#modal) data-bs-target="#modal-confirma-salario" onclick="almacenarId(${res[i].id_asignatura_profesor},${res[i].id_usuario}, 'A')" ?><i class="bi bi-arrow-clockwise"></i></button>
      </th>
      </tr>
      `
                            }
                            $('#titulo_salario').html('Administrar emails eliminados');
                        } else {
                            contenido = '<tr><th class="text-center h1" colspan="5">SIN EMAILS ELIMINADOS</th></tr>'
                        }

                        $('#tabla_asignatura').html(contenido);
                        $('#btn-regresar').attr('onclick', 'EmailUsuario(' + id + ',' + '"A")');
                        $('#btn-eliminados-salarios').hide();
                        $('#btn-regresar').show();
                        $('#btn-agregar-salario').hide();
                        $('#ModalAsignaturas').modal('show');
                    }
                })
            } else {
                $.ajax({
                    type: "POST",
                    url: dataURL,
                    dataType: "json",
                    success: function(res) {
                        res = res[0];
                        console.log(res)
                        var contenido = '';
                        if (!$(res).length == 0) {
                            for (let i = 0; i < res.length; i++) {
                                contenido += `
                    <tr>
                    <th class="text-center"> ${res[i].id_asignatura_profesor}</th>
                    <th class="text-center"> ${res[i].asignatura}</th>
                    <th class="text-center"> ${res[i].alias}</th>

                        <th class="text-center text-success"> ${res[i].estado == 'A' ? 'Activo' : 'Inactivo'}</th>
                        <th class="text-center">
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">

                                <button class="btn btn-outline-danger" data-bs-toggle="modal" hidden-bs-modal(#modal) data-bs-target="#modal-confirma-salario" onclick="almacenarId(${res[i].id_asignatura_profesor},${res[i].id_usuario}, 'E')"><i class="bi bi-trash3"></i></button>
                            </div>
                        </th>
                    </tr>`
                            }
                            $('#tituloEmail').html('Administrar Emails de ' + res[0].nombre_empleado);

                        } else {
                            contenido = '<tr><th class="text-center h1" colspan="5">SIN EMAILS ASIGNADOS</th></tr>'
                        }
                        $('#titulo_salario').html('Administrar emails');
                        $('#btn-eliminados-salarios').attr('onclick', 'EmailUsuario(' + id + ',' + '"E")');
                        $('#btn-agregar-salario').show();
                        $('#tabla_asignatura').empty();
                        $('#tabla_asignatura').html(contenido);
                        $('#btn-agregar-salario').attr('onclick', 'seleccionarAsig(' + id + ',' + '1)');
                        $('#btn-eliminados-salarios').show();
                        $('#btn-regresar').hide();
                        $('#ModalAsignaturas').modal('show');
                    }
                })
            }
        }

        function seleccionarAsig(id, tp) {
            if (tp == 2) {
                dataURL = "<?php echo base_url('/profesores/asignaturaProfesor'); ?>" + "/" + id;
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
                        // EmailUsuario(rs.id_usuario, rs.estado)

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
                $("#btn_Guardar").text('Guardar');
                $("#titulo_salario_modal").text('Agregar nuevo salario');
                $("#modalAgregarEmail").modal("show");
            }
        }
    </script>