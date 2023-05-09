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
            <a href="<?php echo base_url('/profesores'); ?>"><button class="btn btn-outline-primary"><i class="bi bi-arrow-return-left"></i> Regresar</button></a>
        </div>
        <br>
        <div class="table-responsive" style="overflow:scroll-vertical;overflow-y: scroll !important; height: 600px;">
            <table id="example-table" class="table table-bordered table-sm table-hover" id="tablePaises" width="100%" cellspacing="0">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center">Id usuario</th>
                        <th class="text-center">Dia</th>
                        <th class="text-center">Hora de inicio</th>
                        <th class="text-center">Hora de fin</th>
                        <th class="text-center">Estado</th>
                        
                        <th class="text-center" colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody style="font-family:Arial;font-size:12px;" class="table-group-divider">
                    <?php foreach ($datos as $valor) { ?>
                        <tr>
                            <td class="text-center" hidden><input id="util<?php echo $valor['id_usuario'] ?>" type="text" value="<?php echo $valor['id_usuario']; ?>"></td>
                            <td class="text-center"><?php echo $valor['id_usuario']; ?></td>
                            <td class="text-center"><?php echo $valor['dia']; ?></td>
                            <td class="text-center"><?php echo $valor['hora_inicio']; ?></td>
                            <td class="text-center"><?php echo $valor['hora_fin']; ?></td>
                            <td class="text-center"><?php echo $valor['estado']; ?></td>
                            
                            

                            

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
        <form method="POST" action="<?php echo base_url('/disponibilidad/insertar'); ?>" autocomplete="off" class="needs-validation" id="formulario" novalidate>
            <div class="modal fade" id="UsuarioModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="tituloModal">Añadir Disponibilidad</h1>
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
                                    <div class="col">
                                    <label class="col-form-label">Día:</label>
                                    <select class="form-select form-select" name="grado" id="grado" required>
                                        <option value="">Seleccione un Grado</option>
                                        <?php foreach ($grados as $grado) { ?>
                                            <option value="<?php echo $grado['id_grado']; ?>"><?php echo $grado['alias']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                    <input type="text" id="tp" name="tp" hidden>
                                    <input type="text" id="id" name="id" hidden>


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
$.validator.addMethod("soloLetras", function(value, element) {
        return this.optional(element) || /^[A-Za-z#&]+$/.test(value);
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
    function seleccionaFranja(id, tp) {
            if (tp == 2) {
                dataURL = "<?php echo base_url('/disponibilidad_prof/ObtenerDispo'); ?>" + "/" + id;
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
                        $('#direccionX').val(rs[0]['direccion']);
                        $('#formulario').validate().resetForm();
                        $('#id_profesor').val(rs[0]['id_profesor']);
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
                $('#formulario').validate().resetForm();
                $("#btn_Guardar").text('Guardar');
                $("#UsuarioModal").modal("show");
            }
        }


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
        function Disponibilidad(id, estado) {

            dataURL = "<?php echo base_url('/profesores/obtenerDisponibilidadProfesor'); ?>" + "/" + id

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
                    <th class="text-center"> ${res[i].id_disponibilidad_prof}</th>
                    <th class="text-center"> ${res[i].usuarios}</th>
                    <th class="text-center"> ${res[i].alias}</th>
                    <th class="text-center text-danger"> ${res[i].estado == 'A' ? 'Activo' : 'Inactivo'}</th>
                    <th class="text-center">

      <button class="btn btn-outline-warning" data-bs-toggle="modal" hidden-bs-modal(#modal) data-bs-target="#modal-confirma-salario" onclick="almacenarId(${res[i].id_disponibilidad_prof},${res[i].id_usuario}, 'A')" ?><i class="bi bi-arrow-clockwise"></i></button>
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
                    <th class="text-center"> ${res[i].id_disponibilidad_prof}</th>
                    <th class="text-center"> ${res[i].usuario}</th>
                    <th class="text-center"> ${res[i].alias}</th>

                        <th class="text-center text-success"> ${res[i].estado == 'A' ? 'Activo' : 'Inactivo'}</th>
                        <th class="text-center">
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">

                                <button class="btn btn-outline-danger" data-bs-toggle="modal" hidden-bs-modal(#modal) data-bs-target="#modal-confirma-salario" onclick="almacenarId(${res[i].id_disponibilidad_prof},${res[i].id_usuario}, 'E')"><i class="bi bi-trash3"></i></button>
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