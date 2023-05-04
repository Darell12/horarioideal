<div class="container bg-white mt-5  rounded rounded-3">
    <div class="pt-1">
        <h1 class="titulo_Vista text-center ">
            <h1 class="titulo_Vista text-center"><?php echo $titulo ?></h1>
        </h1>
    </div>
    <!-- <div style="height: 30px;"></div> -->
    <div>
        <button type="button" onclick="seleccionaUsuario(<?php echo 1 . ',' . 1 ?>);" class="btn btn-outline-success " data-bs-toggle="modal" data-bs-target="#UsuarioModal"><i class="bi bi-plus-circle-fill"></i> Agregar</button>
        <a href="<?php echo base_url('/usuarios/eliminados'); ?>"><button type="button" class="btn btn-outline-secondary"><i class="bi bi-file-x"></i> Eliminados</button></a>
        <a href="<?php echo base_url('/principal'); ?>"><button class="btn btn-outline-primary"><i class="bi bi-arrow-return-left"></i> Regresar</button></a>
    </div>
    <br>
    <div class="table-responsive">
        <table id="tablaUsuarios" class="table table-bordered table-sm table-hover table-light" width="100%" cellspacing="0">
            <thead class="table-dark">
                <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">Tipo Documento</th>
                    <th class="text-center">Documento</th>
                    <th class="text-center">Nombres</th>
                    <th class="text-center">Apellidos</th>
                    <th class="text-center">Rol</th>
                    <th class="text-center">Estado</th>
                    <!-- <th class="text-center">Emails</th> -->
                    <!-- <th class="text-center">Telefonos</th> -->
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody style="font-family:Arial;font-size:12px;" class="table-group-divider">


            </tbody>
        </table>
    </div>
    <!-- Modal -->
    <form id="formulario" method="POST" action="<?php echo base_url('/usuarios/insertar'); ?>" autocomplete="off" class="needs-validation" id="formulario" novalidate id="agregrar_usuario">
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
                            <div class="row">
                                <div class="col">
                                    <label for="nombre" class="col-form-label">Primer Nombre:</label>
                                    <input type="text" class="form-control" name="primer_nombre" id="primer_nombre" maxlength="20" pattern="[A-Za-z]+" required>
                                </div>
                                <div class="col">
                                    <label for="nombre" class="col-form-label">Segundo Nombre (Opcional):</label>
                                    <input type="text" class="form-control" name="segundo_nombre" id="segundo_nombre" maxlength="20" pattern="[A-Za-z]+">
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
                            <div class="row mb-1">
                                <div class="col">
                                    <label for="nombre" class="col-form-label">Emails:</label>
                                    <div class="input-group">
                                        <input type="text" id="email" name="email" class="form-control" placeholder="Agregar un email" aria-label="" aria-describedby="button-addon2" disabled>
                                        <button class="btn btn-outline-secondary" type="button" id="button-addon2" data-bs-toggle="modal" data-bs-target="#ModalEmail"><i class="bi bi-plus"></i></button>
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="nombre" class="col-form-label">Segundo Apellido:</label>
                                    <input type="text" class="form-control" name="segundo_apellido" id="segundo_apellido" required>
                                </div>
                            </div>
                            <div class="row">
                                <label id="direccion_usuario" for="direccion">Dirección:</label>
                                <div class="col">
                                    <select name="dir" id="dir" placeholder="Ej: 23" class="form-select form-select" required onchange="Validardireccion()">
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
                                    <input onchange="Validardireccion()" id="dir2" name="dir2" type="text" maxLength="4" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Ej: 17B" required />
                                </div>
                                <div class="col">
                                    <input onchange="Validardireccion()" id="dir3" maxLength="4" name="dir3" type="text" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Ej: #68C" required />
                                </div>
                                <div class="col">
                                    <input onchange="Validardireccion()" id="dir4" maxLength="4" name="dir4" type="text" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Ej: 23" required />
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
                                    <label id="password_label_c" for="password">Confirme Contraseña</label>
                                    <input id="confirmar_contraseña" name="confirmar_contraseña" type="password" class="form-control" required />
                                </div>
                            </div>

                            <input type="text" id="usuario_crea" name="usuario_crea" value="<?php session('id') ?>" hidden>
                            <input type="text" id="tp" name="tp" hidden>
                            <input type="text" id="id" name="id" hidden>
                            <input type="text" id="nombreActu" name="nombreActu" hidden>
                            <input type="text" id="numeroActu" name="numeroActu" hidden>


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
</div>

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
<!-- Resetear Modal -->
<div class="modal fade" id="Resetear" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div style="text-align:center;" class="modal-header">
                <h5 style="color:#98040a;font-size:20px;font-weight:bold;" class="modal-title" id="exampleModalLabel">Reinicio de Contraseña</h5>

            </div>
            <div style="text-align:center;font-weight:bold;" class="modal-body">
                <p>La constraseña será igual al número de documento</p>
                <p>¿Seguro Desea Resetear la contraseña de este usuario?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary close" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-outline-danger btn-ok">Confirmar</a>
            </div>
        </div>
    </div>
</div>
<!-- emails -->

<!-- tabla emalis -->
<div id="ModalEmail" class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titulo_email"> Agregar Email <a href="" title="Los emails ingresados antes de guardar el usuario por primera vez son guardados temporalmente"><i class="bi bi-question"></i></a></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- <button type="button" class="btn btn-outline-secondary" id="btn-eliminados-salarios">
                    <i class="bi bi-file-x"></i> Eliminados</button> -->

                <button class="btn btn-outline-primary" id="btn-regresar"><i class="bi bi-arrow-return-left"></i> Regresar</button>
                <div class="row mb-3">
                    <div class="col">
                        <label for="message-text" class="col-form-label">Email:</label>
                        <input type="email" name="email_modal" class="form-control" id="email_modal" placeholder="Ej: JhonDoe@gmail.com">
                        <div class="invalid-feedback" id="errorEmail"></div>
                    </div>

                    <div class="col">
                        <label for="message-text" class="col-form-label">Prioridad:</label>
                        <div class="input-group">
                            <select name="prioridad" class="form-select form-select" id="prioridad">
                                <option value="">-Seleccione una opción-</option>
                                <?php foreach ($prioridad as $valor) { ?>
                                    <option value="<?php echo $valor['id_parametro_det']; ?>"><?php echo $valor['nombre']; ?></option>
                                <?php } ?>
                            </select>
                            <button class="btn btn-outline-success" type="button" id="btn_insertar" title="Agregar Email"><i class="bi bi-plus"></i></button>
                            <div class="invalid-feedback" id="errorPrioridad"></div>
                        </div>
                        <input hidden type="text" id="id_email" name="id_email">
                        <input hidden type="text" id="tpExist" name="tpExist">
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-sm table-hover" id="tableEmpleados" width="100%" cellspacing="0">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-center">Email</th>
                                <th class="text-center">Prioridad</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody style="font-family:Arial;font-size:12px;" id="tabla_email">

                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
</div>
<!-- tabla telefonos -->
<div id="Modaltelefonos" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="titulo_salario">Añadir Telefono</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="btn-group mb-3" id="btn-group-salarios" role="group" aria-label="Basic mixed styles example">
                    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#modalAgregarTelefono" id="btn-agregar-tel">
                        <i class="bi bi-plus-circle-fill"></i> Agregar</button>

                    <button type="button" class="btn btn-outline-secondary" id="btn-eliminados-tel">
                        <i class="bi bi-file-x"></i> Eliminados</button>
                    <button class="btn btn-outline-primary" id="btn-regresar-tel"><i class="bi bi-arrow-return-left"></i> Regresar</button>

                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-sm table-hover" id="tableEmpleados" width="100%" cellspacing="0">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Telefono</th>
                                <th class="text-center">Periodo</th>
                                <th class="text-center">Estado</th>
                                <th class="text-center" colspan="2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody style="font-family:Arial;font-size:12px;" id="tabla_telefono">

                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
</div>
<!-- </div> -->

<!-- modal agregar Telefonos -->
<div class="modal fade" tabindex="-1" role="dialog" id="modalAgregarTelefono" data-bs-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="titulo_telefono_modal">Agregar telefono</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Telefono:</label>
                    <div class="flex ">
                        <input type="telefono" name="telefono_modal" class="form-control" id="telefono_modal" min="1300606">
                    </div>
                    <label for="message-text" class="col-form-label">Prioridad:</label>
                    <div class="flex ">
                        <select name="prioridad_tel" class="form-select form-select" id="prioridad_tel">
                            <?php foreach ($prioridad as $valor) { ?>
                                <option value="<?php echo $valor['id_parametro_det']; ?>"><?php echo $valor['nombre']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="flex ">
                        <input type="text" id="id_usuario_tel" name="id_usuario_tel" hidden>
                        <input type="text" id="tp_telefono" name="tp_telefono" hidden>
                        <input type="text" id="id_telefono" name="id_telefono" hidden>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline-primary" id="btn_insertarTelefono">Guardar</button>
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- eliminar emails y restaurar -->

<div class="modal fade" id="modal-confirma-email" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div style="text-align:center;" class="modal-header">
                <h5 style="color:#98040a;font-size:20px;font-weight:bold;" class="modal-title" id="exampleModalLabel">Eliminación de Registro</h5>

            </div>
            <div style="text-align:center;font-weight:bold;" class="modal-body">
                <p>Seguro Desea Eliminar éste Registro?</p>
                <input type="text" hidden id="id_almacenar"><input type="text" hidden id="id_almacenar_usuario"><input type="text" hidden id="id_almacenar_estado">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary close" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-outline-danger btn-ok" id="btnEliminar">Confirmar</a>
            </div>
        </div>
    </div>
</div>
<!-- eliminar telefonos y restaurar -->

<div class="modal fade" id="modal-confirma-telefono" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div style="text-align:center;" class="modal-header">
                <h5 style="color:#98040a;font-size:20px;font-weight:bold;" class="modal-title" id="exampleModalLabel">Eliminación de Registro</h5>

            </div>
            <div style="text-align:center;font-weight:bold;" class="modal-body">
                <p>Seguro Desea Eliminar éste Registro?</p>
                <input type="text" hidden id="id_almacenar"><input type="text" hidden id="id_almacenar_usuario"><input type="text" hidden id="id_almacenar_estado">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary close" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-outline-danger btn-ok" id="btnEliminarTel">Confirmar</a>
            </div>
        </div>
    </div>
</div>

<script>
    $('#modal-confirma').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });

    $('#Resetear').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        console.log('Hola')
    });

    $(document).ready(function() {
        generarTablaUsuarios();

    })

    function generarTablaUsuarios() {
        $.ajax({
            url: '<?= base_url('usuarios/obtenerUsuarios') ?>',
            method: "POST",
            dataType: 'json',
            success: function(data) {
                // Parsea la respuesta AJAX y extrae los datos que necesitas para crear la tabla
                data = data[0]
                var tableData = [];
                for (var i = 0; i < data.length; i++) {
                    console.log(data[0].id_usuario);
                    var rowData = [];
                    rowData.push(data[i].id_usuario);
                    rowData.push(data[i].t_documento);
                    rowData.push(data[i].n_documento);
                    rowData.push(data[i].nombre_p + ' ' + data[i].nombre_s);
                    rowData.push(data[i].apellido_p + ' ' + data[i].apellido_s);
                    rowData.push(data[i].estado);
                    rowData.push(data[i].rol);
                    rowData.push(`<div class="btn-group">
                                <button class="btn btn-outline-primary" onclick="seleccionaUsuario(${data[i].id_usuario} , 2);" data-bs-toggle="modal" data-bs-target="#UsuarioModal" title="Editar Registro">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#Resetear" data-href="<?php echo base_url('/usuarios/resetearContrasena') ?>/ ${data[i].id_usuario}/ .${data[i].n_documento}" title="Resetear Contraseña">
                                    <i class="bi bi-arrow-clockwise"></i>
                                </button>
                                <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modal-confirma" data-href="<?php echo base_url('/usuarios/cambiarEstado') ?>/${data[i].id_usuario}/ 'E'; ?>" title="Eliminar Registro">
                                <i class="bi bi-trash3"></i>
                                </button>
                            </div>`);
                    tableData.push(rowData);
                }

                // Crea la tabla HTML vacía
                var table = $('#tablaUsuarios');

                // Crea las filas y columnas de la tabla
                for (var i = 0; i < tableData.length; i++) {
                    var row = $('<tr>');
                    for (var j = 0; j < tableData[i].length; j++) {
                        var cell = $('<td>').html(tableData[i][j]);
                        row.append(cell);
                    }
                    table.append(row);
                }

                let tablaUsuarios = $('#tablaUsuarios').DataTable({
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
                    }
                });
            }
        });
    }


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
            contraseña: {
                required: true,
            },
            confirmar_contraseña: {
                required: true,
                equalTo: "#contraseña"
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

    $('#formulario').on('submit', function(e) {
        e.preventDefault();
        let data = {
            tp: $('#tp').val(),
            id: $('#id').val(),
            numeroActu: $('#numeroActu').val(),
            id_rol: $('#rol').val(),
            tipo_documento: $('#tipo_documento').val(),
            n_documento: $('#n_documento').val(),
            primer_nombre: $('#primer_nombre').val(),
            segundo_nombre: $('#segundo_nombre').val(),
            primer_apellido: $('#primer_apellido').val(),
            segundo_apellido: $('#segundo_apellido').val(),
            direccionX: $('#direccionX').val(),
            contraseña: $('#contraseña').val(),
        }

        $.ajax({
            type: "POST",
            url: "<?php echo base_url('/usuarios/insertar'); ?>",
            data: {
                tp: $('#tp').val(),
                id: $('#id').val(),
                numeroActu: $('#numeroActu').val(),
                id_rol: $('#rol').val(),
                tipo_documento: $('#tipo_documento').val(),
                n_documento: $('#n_documento').val(),
                primer_nombre: $('#primer_nombre').val(),
                segundo_nombre: $('#segundo_nombre').val(),
                primer_apellido: $('#primer_apellido').val(),
                segundo_apellido: $('#segundo_apellido').val(),
                direccionX: $('#direccionX').val(),
                contraseña: $('#contraseña').val(),

            },
            dataType: "json",
        }).done(function(data) {
            $('#UsuarioModal').modal('hide');
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
                title: 'Registro almacenado con exito!'
            })
            console.log(data)
            insertarEmail(data);

            setTimeout(() => {
                location.reload();
            }, 3200);
        })

    })

    // telefonos
    function TelefonoUsuario(id, estado) {
        console.log(estado)

        dataURL = "<?php echo base_url('/telefono/Telefono'); ?>" + "/" + id + '/' + estado

        if (estado == 'E') {
            $.ajax({
                type: "POST",
                url: dataURL,
                dataType: "json",
                success: function(res) {
                    $('#tabla_telefono').empty();
                    var contenido = '';
                    if (!$(res).length == 0) {
                        for (let i = 0; i < res.length; i++) {
                            contenido += `
                            <tr>
                            <th class="text-center"> ${res[i].id_telefono}</th>
                            <th class="text-center"> ${res[i].numero}</th>
                            <th class="text-center"> ${res[i].prioridad}</th>
                            <th class="text-center text-danger"> ${res[i].estado == 'A' ? 'Activo' : 'Inactivo'}</th>
                            <th class="text-center">
                            
              <button class="btn btn-outline-warning" data-bs-toggle="modal" hidden-bs-modal(#modal) data-bs-target="#modal-confirma-salario" onclick="almacenarIdTel(${res[i].id_telefono},${res[i].id_usuario}, 'A')" ?><i class="bi bi-arrow-clockwise"></i></button>
              </th>
              </tr>
              `
                        }
                        $('#titulo_salario').html('Administrar telefonos eliminados');
                    } else {
                        contenido = '<tr><th class="text-center h1" colspan="5">SIN TELEFONOS ELIMINADOS</th></tr>'
                    }

                    $('#tabla_telefono').html(contenido);
                    $('#btn-regresar-tel').attr('onclick', 'TelefonoUsuario(' + id + ',' + '"A")');
                    $('#btn-eliminados-tel').hide();
                    $('#btn-regresar-tel').show();
                    $('#btn-agregar-tel').hide();
                    $('#Modaltelefonos').modal('show');
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
                            <th class="text-center"> ${res[i].id_telefono}</th>
                            <th class="text-center"> ${res[i].numero}</th>
                            <th class="text-center"> ${res[i].prioridad}</th>
                            <th class="text-center text-success"> ${res[i].estado == 'A' ? 'Activo' : 'Inactivo'}</th>
                            <th class="text-center">
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <button class="btn btn-outline-primary" onclick="seleccionarTelefono( ${res[i].id_telefono} ,2 );"><i class="bi bi-pencil"></i></button>
  
                                        <button class="btn btn-outline-danger" data-bs-toggle="modal" hidden-bs-modal(#modal) data-bs-target="#modal-confirma-salario" onclick="almacenarIdTel(${res[i].id_telefono},${res[i].id_usuario}, 'E')"><i class="bi bi-trash3"></i></button>
                                        </div>
                                        </th>
                                        </tr>`
                        }
                        $('#tituloTelefono').html('Administrar Telefonos de ' + res[0].nombre_empleado);

                    } else {
                        contenido = '<tr><th class="text-center h1" colspan="5">SIN TELEFONOS ASIGNADOS</th></tr>'
                    }
                    $('#titulo_salario').html('Administrar telefonos');
                    $('#btn-eliminados-tel').attr('onclick', 'TelefonoUsuario(' + id + ',' + '"E")');
                    $('#btn-agregar-tel').show();
                    $('#tabla_telefono').empty();
                    $('#tabla_telefono').html(contenido);
                    $('#btn-agregar-tel').attr('onclick', 'seleccionarTelefono(' + id + ',' + '1)');
                    $('#btn-eliminados-tel').show();
                    $('#btn-regresar').hide();
                    $('#Modaltelefonos').modal('show');
                }
            })
        }
    }
    // -------------------------------- Emails -----------------------------------------------

    function generarTablaEmail(Emails) {

        let contador = 0;
        let prioridades = {
            '6': 'Principal',
            '7': 'Secundario'
        }

        let contenido = '';
        Emails.forEach(email => {
            contador++
            contenido += `
            <tr id="util${contador}">
            <td class="text-center">${email.email}</td>
            <td class="text-center">${prioridades[email.prioridad]}</td>
            <td hidden class="text-center">${email.id_email ? email.id_email : ''}</td>
            <td hidden class="text-center">${email.tp}</td>
                            <td class="text-center">
                            <button class="btn btn-outline-primary" onclick="editarEmail( ${contador});"><i class="bi bi-pencil"></i></button>
                            <button class="btn btn-outline-danger" onclick="seleccionarEmail( ${email.id_email} ,2 );"><i class="bi bi-trash"></i></button>
                            </td>
                            </tr>`
        });
        $('#tabla_email').html(contenido);
    }

    let tablaTemporal = []
    $('#btn_insertar').click(function() {

        let email = $('#email_modal').val();
        let prioridad = $('#prioridad').val();
        let id_email = $('#id_email').val();
        let tp = $('#tpExist').val();


        let filtroPrioridad = [];
        let filtroEmail = [];

        filtroPrioridad = tablaTemporal.filter(p => p.prioridad == 6);
        filtroEmail = tablaTemporal.filter(p => p.email == email);

        datosValidar = {
            valor: email,
            campo: 'email',
            nombreActu: tp == 2 ? email : '',
        }

        $.post('<?php echo base_url() ?>/email/validar', datosValidar, function(response) {
            console.log(response);
            if (response == true) {
                $('#email_modal').addClass('is-invalid');
                $('#prioridad').addClass('is-invalid');
                $('#errorPrioridad').css('display', 'block');
                $('#errorPrioridad').text('Este email ya se encuentra Registrado');

                setTimeout(() => {
                    $('#email_modal').removeClass('is-invalid');
                    $('#prioridad').removeClass('is-invalid');
                    $('#errorEmail').css('display', 'none');
                    $('#errorPrioridad').text('');

                }, 2000);
                return
            }


            
        })

        console.log(filtroPrioridad);
        if (filtroPrioridad.length > 0 && prioridad == 6) {
            $('#email_modal').addClass('is-invalid');
            $('#prioridad').addClass('is-invalid');
            $('#errorPrioridad').css('display', 'block');
            $('#errorPrioridad').text('Ya hay un email Principal');

            setTimeout(() => {
                $('#email_modal').removeClass('is-invalid');
                $('#prioridad').removeClass('is-invalid');
                $('#errorEmail').css('display', 'none');
                $('#errorPrioridad').text('');

            }, 2000);
            return
        }

        if (filtroEmail.length > 0) {
            $('#email_modal').addClass('is-invalid');
            $('#prioridad').addClass('is-invalid');
            $('#errorEmail').css('display', 'block');
            $('#errorEmail').text('Este email ya esta registrado');

            setTimeout(() => {
                $('#email_modal').removeClass('is-invalid');
                $('#prioridad').removeClass('is-invalid');
                $('#errorEmail').css('display', 'none');
                $('#errorEmail').text('');

            }, 2000);
            return
        }

        if (email != '' && prioridad != '') {
            tablaTemporal.push({
                tp: tp == '' ? 1 : tp,
                email: email,
                prioridad: prioridad,
                id_email: id_email

            })
            generarTablaEmail(tablaTemporal);

            let principal = tablaTemporal.find(p => p.prioridad == 6)
            $('#email').val(!principal ? tablaTemporal[0].email : principal.email);


            optionPrincipal = $('#prioridad').find('option[value="6"]')
            $('#prioridad').val(7);
            prioridad == 6 ? optionPrincipal.attr('disabled', '') : '';
            $('#email_modal').val('');

            return
        } else {
            $('#email_modal').addClass('is-invalid');
            $('#prioridad').addClass('is-invalid');
            $('#errorPrioridad').css('display', 'block');
            $('#errorEmail').css('display', 'block');
            $('#errorPrioridad').text('Todos los campos son obligatorios');
            $('#errorEmail').text('Todos los campos son obligatorios');

            setTimeout(() => {
                $('#email_modal').removeClass('is-invalid');
                $('#prioridad').removeClass('is-invalid');
                $('#errorEmail').css('display', 'none');
                $('#errorEmail').text('');
                $('#errorPrioridad').css('display', 'none');
                $('#errorPrioridad').text('');

                $('#prioridad').val('');

            }, 2000);
            return
        }
        $('#tpExist').val('')
    });

    function editarEmail(id) {

        const fila = $('#util' + id);
        const emailEditar = fila.find('td').eq(0)
        const prioridadEditar = fila.find('td').eq(1)
        const idEmail = fila.find('td').eq(2)
        const tpExist = fila.find('td').eq(3)
        optionPrincipal = $('#prioridad').find('option[value="6"]')

        if (prioridadEditar.text() === 'Principal') {
            optionPrincipal.removeAttr('disabled', '')
            $('#prioridad').val(6);
            $('#email_modal').val(emailEditar.text());
            $('#id_email').val(idEmail.text());
            $('#tpExist').val(tpExist.text());
        } else {
            $('#prioridad').val(7);
            $('#email_modal').val(emailEditar.text());
            $('#id_email').val(idEmail.text());
        }
        tablaTemporal = tablaTemporal.filter(p => p.email !== emailEditar.text());

        let principal = tablaTemporal.find(p => p.prioridad == 6)
        $('#email').val(!principal ? tablaTemporal[0].email : principal.email);
        console.log(tablaTemporal);
        generarTablaEmail(tablaTemporal);
    }

    function insertarEmail(id) {
        tablaTemporal.forEach(registro => {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('/email/insertar'); ?>",
                data: {
                    tp: registro.tp,
                    email: registro.email,
                    prioridad: registro.prioridad,
                    id_email: registro.id_email,
                    id_usuario: id
                },
                dataType: "json",
            }).done(function(data) {})
        });

    }

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
                    $('#numeroActu').val(rs[0]['n_documento']);
                    $('#primer_nombre').val(rs[0]['nombre_p']);
                    $('#segundo_nombre').val(rs[0]['nombre_s']);
                    $('#primer_apellido').val(rs[0]['apellido_p']);
                    $('#segundo_apellido').val(rs[0]['apellido_s']);
                    $('#direccionX').val(rs[0]['direccion']);
                    $('#tituloModal').text('Editar Usuario');
                    $('#contraseña').attr('hidden', '');
                    $('#password_label').attr('hidden', '');
                    $('#confirmar_contraseña').attr('hidden', '');
                    $('#password_label_c').attr('hidden', '');
                    $('#formulario').validate().resetForm();
                    $("#btn_Guardar").text('Actualizar');
                    $("#UsuarioModal").modal("show");
                }
            })
            tablaTemporal = []
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>email/emailsUsuario/" + id,
                dataType: "JSON",
                success: function(rs) {
                    console.log(rs);
                    rs.forEach(element => {

                        tablaTemporal.push({
                            tp: 2,
                            email: element.email,
                            prioridad: element.prioridad,
                            id_email: element.id_email,
                        })
                    });
                    console.log(tablaTemporal);
                    generarTablaEmail(tablaTemporal);
                    let principal = tablaTemporal.find(p => p.prioridad == 6)
                    $('#email').val(!principal ? tablaTemporal[0].email : principal.email);
                }
            })
        } else {
            $("#tp").val(1);
            $('#tipo_documento').val('');
            $('#n_documento').val('');
            $('#primer_nombre').val('');
            $('#segundo_nombre').val('');
            $('#primer_apellido').val('');
            $('#segundo_apellido').val('');
            $('#contraseña').val('');
            $('#contraseña').removeAttr('hidden', '');
            $('#password_label').removeAttr('hidden', '');
            $('#confirmar_contraseña').removeAttr('hidden', '');
            $('#password_label_c').removeAttr('hidden', '');
            $('#formulario').validate().resetForm();
            $('#tituloModal').text('Añadir Usuario');
            $('#direccionX').val('');
            $("#btn_Guardar").text('Guardar');
            $("#UsuarioModal").modal("show");
        }
    }

    $('#btnEliminar').click(function() {
        console.log('OnClick Eliminar')
        var data = {
            id_email: $('#id_almacenar').val(),
            estado: $('#id_almacenar_estado').val(),
            id_usuario: $('#id_almacenar_usuario').val()
        };
        console.log(data)
        $.post("<?php echo base_url('/email/cambiarEstado'); ?>", data, function(response) {
            // Actualiza el contenido de la página
            EmailUsuario(data.id_usuario, data.estado == 'A' ? 'E' : 'A')
            // seleccionarEmail(data.id_usuario, data.estado == 'A' ? 'E' : 'A')
            $("#modal-confirma-email").modal('hide');
        });
    });

    // ----------------------------------- Telefonos --------------------------------------------
    function seleccionarTelefono(id, tp) {
        if (tp == 2) {
            dataURL = "<?php echo base_url('/telefono/telefonoUsuario'); ?>" + "/" + id;
            $.ajax({
                type: "POST",
                url: dataURL,
                dataType: "json",
                success: function(rs) {
                    console.log(rs);
                    $("#tp_telefono").val(2)
                    $("#id_telefono").val(id)
                    $("#telefono_modal").val(rs.numero)
                    $("#prioridad").val(rs.prioridad)
                    $("#id_usuario_tel").val(rs.id_usuario)
                    $('#salario_modal').val(rs.sueldo);
                    TelefonoUsuario(rs.id_usuario, rs.estado)

                    $("#btn_Guardar").text('Actualizar');
                    $("#titulo_salario_modal").text('Actualizar el salario de ' + rs.nombre_empleado + ' en el periodo ' + rs.periodo);
                    $("#modalAgregarTelefono").modal("show");
                }
            })
        } else {
            console.log('Funcion')
            $("#tp_telefono").val(1);
            $("#id_usuario_tel").val(id)
            $("#telefono_modal").val('')
            $('#prioridad').val(0);
            $("#btn_Guardar").text('Guardar');
            $("#titulo_salario_modal").text('Agregar nuevo telefono');
            $("#modalAgregartelefono").modal("show");
        }
    }

    function almacenarIdTel(id_telefono, id_usuario, estado) {
        console.log(id_telefono + " " + id_usuario)
        $("#id_telefono").val(id_telefono);
        $("#id_usuario_tel").val(id_usuario);
        $("#id_almacenar_estado").val(estado);
        $("#modal-confirma-telefono").modal('show');
    }


    $('#btn_insertarTelefono').click(function() {
        console.log('Onclick Button');
        var data = {
            tp_telefono: $('#tp_telefono').val(),
            numero: $('#telefono_modal').val(),
            id_usuario: $('#id_usuario_tel').val(),
            prioridad: $('#prioridad_tel').val(),
            id_telefono: $('#id_telefono').val()
        };
        console.log(data)
        if (data.telefono == "" || data.prioridad == 0) {
            return swal.fire({
                postition: 'top-end',
                icon: 'error',
                title: 'Error campos incompletos',
                text: 'Debe llenar todos los campos',
                showConfirmButton: false,
                timer: 1500
            })
        }

        $.post("<?php echo base_url('/telefono/insertar'); ?>", data, function(response) {
            // Actualiza el contenido de la página
            TelefonoUsuario(data.id_usuario, 'A')
            $("#modalAgregarTelefono").modal('hide');
        });
    });

    $('#btnEliminarTel').click(function() {
        console.log('OnClick Eliminar')
        var data = {
            id_telefono: $('#id_almacenar').val(),
            estado: $('#id_almacenar_estado').val(),
            id_usuario: $('#id_almacenar_usuario').val()
        };
        console.log(data)
        $.post("<?php echo base_url('/telefono/cambiarEstado'); ?>", data, function(response) {
            // Actualiza el contenido de la página
            TelefonoUsuario(data.id_usuario, data.estado == 'A' ? 'E' : 'A')
            // seleccionarTelefono(data.id_usuario, data.estado == 'A' ? 'E' : 'A')
            $("#modal-confirma-telefono").modal('hide');
        });
    });

    $('.close').click(function() {
        $("#modal-confirma").modal("hide");
    });

    $('.close').click(function() {
        $("#Resetear").modal("hide");
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