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
            <table id="tablaEstudiantes" class="table table-bordered table-sm table-hover" id="tablePaises" width="100%" cellspacing="0">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Nombres</th>
                        <th class="text-center">Apellidos</th>
                        <th class="text-center">Grado</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody style="font-family:Arial;font-size:12px;" class="table-group-divider">

                </tbody>
            </table>
        </div>
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

    <form id="formulario">
        <div class="modal fade" id="UsuarioModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="tituloModal">Añadir Estudiante</h1>
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
                                <div class="col">
                                    <label class="col-form-label">Grado:</label>
                                    <select class="form-select form-select" name="grado" id="grado" required>
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
                                        <button class="btn btn-outline-secondary" type="button" data-bs-toggle="modal" data-bs-target="#ModalEmail"><i class="bi bi-plus"></i></button>
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="nombre" class="col-form-label">Telefonos:</label>
                                    <div class="input-group">
                                        <input type="text" id="telUsuario" name="telUsuario" class="form-control" placeholder="Agregar telefonos" aria-label="" aria-describedby="button-addon2" disabled>
                                        <button class="btn btn-outline-secondary" type="button" data-bs-toggle="modal" data-bs-target="#ModalTelefonos"><i class="bi bi-plus"></i></button>
                                    </div>
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
                            <input type="text" id="id_estudiante" name="id_estudiante" hidden>
                            <input type="text" id="nombreActu" name="nombreActu" hidden>
                            <input type="text" id="numeroActu" name="numeroActu" hidden>


                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-outline-primary" id="btnGuardar">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div id="ModalEmail" class="modal" tabindex="-1">
        <div class="modal-dialog  modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="titulo_email"> Agregar Email <a href="#" title="Los emails ingresados antes de guardar el usuario por primera vez son guardados temporalmente"><i class="bi bi-question"></i></a></h5>
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
                            <input hidden type="text" id="emailActu" name="emailActu">
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

    <div id="ModalTelefonos" class="modal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title" id="titulo_email"> Agregar Telefono <a href="#" title="Los telefonos ingresados antes de guardar el usuario por primera vez son guardados temporalmente"><i class="bi bi-question"></i></a></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <button type="button" class="btn btn-outline-secondary" id="btn-eliminados-tel">
                        <i class="bi bi-file-x"></i> Eliminados</button>
                    <button class="btn btn-outline-primary" id="btn-regresar-tel"><i class="bi bi-arrow-return-left"></i> Regresar</button>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="message-text" class="col-form-label">Número:</label>
                            <input type="text" name="telefono" class="form-control" id="telefono">
                            <div class="invalid-feedback" id="errorTel"></div>
                        </div>

                        <div class="col">
                            <label for="message-text" class="col-form-label">Tipo:</label>
                            <select name="tipo" class="form-select form-select" id="tipo">
                                <option value="">-Seleccione una opción-</option>
                                <?php foreach ($tipo as $valor) { ?>
                                    <option value="<?php echo $valor['id_parametro_det']; ?>"><?php echo $valor['nombre']; ?></option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback" id="errorTipoTel"></div>
                        </div>
                        <div class="col">
                            <label for="message-text" class="col-form-label">Prioridad:</label>
                            <div class="input-group">
                                <select name="prioridad_tel" class="form-select form-select" id="prioridad_tel">
                                    <option value="">-Seleccione una opción-</option>
                                    <?php foreach ($prioridad as $valor) { ?>
                                        <option value="<?php echo $valor['id_parametro_det']; ?>"><?php echo $valor['nombre']; ?></option>
                                    <?php } ?>
                                </select>
                                <button class="btn btn-outline-success" type="button" id="btn_insertarTelefono" title="Agregar Email"><i class="bi bi-plus"></i></button>
                                <div class="invalid-feedback" id="errorPrioridadTel"></div>
                            </div>
                            <input hidden type="text" id="id_telefono" name="id_telefono">
                            <input hidden type="text" id="tpExist" name="tpExistTel">
                            <input hidden type="text" id="telefonoActu" name="telefonoActu">
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-sm table-hover" id="tableEmpleados" width="100%" cellspacing="0">
                            <thead class="table-dark">
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Telefono</th>
                                    <th class="text-center">Periodo</th>
                                    <th class="text-center">Tipo</th>
                                    <th class="text-center">Acciones</th>
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


    <script>
        $('#modal-confirma').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('onclick', 'EliminarRegistro(' + $(e.relatedTarget).data('href') + ')');
        });

        $('#Resetear').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            console.log('Hola')
        });

        function EliminarRegistro(id) {

            $.ajax({
                type: "POST",
                url: "<?php echo base_url('/usuarios/cambiarEstado/'); ?>" + id + '/' + 'E',
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
                    title: 'Registro eliminado con exito!'
                })
                contador = 0;
                tablaUsuarios.ajax.reload(null, false);
            })
        }
        // APARTADO DE USUARIOS BASICO    
        var contador = 0
        var tablaUsuarios = $('#tablaEstudiantes').DataTable({
            ajax: {
                url: '<?= base_url('estudiantes/obtenerEstudiantes') ?>',
                method: "POST",
                data: {
                    estado: 'A'
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
                    data: null,
                    render: function(data, type, row) {
                        if (data.grado) {
                            return data.grado;
                        } else {
                            return `Grado por asignar <input onchange="AsignarGrado(${data.id_usuario})" id="asignarGrado${data.id_usuario}" class="form-check-input" type="checkbox" value="" id="flexCheckDefault">`
                        }
                    }
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        return `<div class="btn-group">
                                <button class="btn btn-outline-primary" onclick="seleccionaUsuario(${data.id_usuario} , 2);" data-bs-toggle="modal" data-bs-target="#UsuarioModal" title="Editar Registro">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#Resetear" data-href="<?php echo base_url('/usuarios/resetearContrasena') ?>/${data.id_usuario}/${data.n_documento}" title="Resetear Contraseña">
                                    <i class="bi bi-arrow-clockwise"></i>
                                </button>` + " " + `<button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modal-confirma" data-href="${data.id_usuario}" title="Eliminar Registro">
                                <i class="bi bi-trash3"></i>
                                </button>
                            </div>`
                    },
                }
            ],
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            }
        })

        $.validator.addMethod("soloLetras", function(value, element) {
            return this.optional(element) || /^[a-zA-ZñÑ\s]+$/.test(value);
        }, "Por favor ingrese solamente letras.");

        $("#formulario").validate({
            rules: {
                id_rol: {
                    required: true,
                },
                grado: {
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
                grado: {
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
            console.log('activo');
            e.preventDefault();
        })

        $('#btnGuardar').on('click', function(e) {
            e.preventDefault();
            if ($('#formulario').valid()) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('/estudiantes/insertar'); ?>",
                    data: {
                        tp: $('#tp').val(),
                        id: $('#id').val(),
                        id_estudiante: $('#id_estudiante').val(),
                        numeroActu: $('#numeroActu').val(),
                        id_rol: $('#rol').val(),
                        id_grado: $('#grado').val(),
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
                        title: 'Acción realizada con exito!'
                    })
                    console.log('insertar');
                    insertarEmail(data);
                    insertarTelefono(data)
                    contador = 0
                    tablaUsuarios.ajax.reload(null, false)
                    tablaTemporal = [];
                    tablaTemporalTelefonos = [];
                    return
                })
            } else {
                console.log('Formulario Invalido');
            }
        })

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
                        <td hidden class="text-center">${email.tp == 2 ? email.email : ''}</td>
                        <td class="text-center">
                            <button class="btn btn-outline-primary" onclick="editarEmail( ${contador});"><i class="bi bi-pencil"></i></button>
                            <button class="btn btn-outline-danger" onclick="eliminarEmail(${contador}, ${email.tp});"><i class="bi bi-trash"></i></button>
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

            filtroPrioridad = tablaTemporal.filter(p => p.prioridad == 6);
            filtroEmail = tablaTemporal.filter(p => p.email == email);

            datosValidar = {
                valor: email,
                campo: 'email',
                nombreActu: tp == 2 ? email : '',
                tp: tp
            }

            $.post('<?php echo base_url() ?>/email/validar', datosValidar, function(response) {
                if (response == true) {
                    $('#email_modal').addClass('is-invalid');
                    $('#errorEmail').text('Este email ya se encuentra Registrado');
                    setTimeout(() => {
                        $('#email_modal').removeClass('is-invalid');
                        $('#errorEmail').text('');
                    }, 2000);
                } else if ([email, prioridad].includes('')) {
                    $('#email_modal').addClass('is-invalid');
                    $('#prioridad').addClass('is-invalid');
                    $('#errorEmail').text('Todos los campos son obligatorios');
                    setTimeout(() => {
                        $('#email_modal').removeClass('is-invalid');
                        $('#prioridad').removeClass('is-invalid');
                        $('#errorEmail').text('');
                        $('#prioridad').val('');
                    }, 2000)
                } else if (filtroPrioridad.length > 0 && prioridad == 6) {
                    $('#prioridad').addClass('is-invalid');
                    $('#errorPrioridad').text('Ya hay un email Principal');
                    setTimeout(() => {
                        $('#prioridad').removeClass('is-invalid');
                        $('#errorPrioridad').text('');
                    }, 2000)
                } else if (filtroEmail.length > 0) {
                    $('#email_modal').addClass('is-invalid');
                    $('#errorEmail').text('Este email ya esta registrado');
                    setTimeout(() => {
                        $('#email_modal').removeClass('is-invalid');
                        $('#errorEmail').text('');
                    }, 2000)
                } else {
                    tablaTemporal.push({
                        tp: tp == '' ? 1 : tp,
                        email: email,
                        prioridad: prioridad,
                        id_email: id_email

                    })
                    generarTablaEmail(tablaTemporal);
                    $('#tpExist').val('');
                    $('#id_email').val('');
                    $('#emailActu').val('');


                    let principal = tablaTemporal.find(p => p.prioridad == 6)
                    $('#email').val(!principal ? tablaTemporal[0].email : principal.email);


                    optionPrincipal = $('#prioridad').find('option[value="6"]')
                    $('#prioridad').val(7);
                    prioridad == 6 ? optionPrincipal.attr('disabled', '') : '';
                    $('#email_modal').val('');
                }
            })
        });

        function editarEmail(id) {

            const fila = $('#util' + id);
            const emailEditar = fila.find('td').eq(0)
            const prioridadEditar = fila.find('td').eq(1)
            const idEmail = fila.find('td').eq(2)
            const tpExist = fila.find('td').eq(3)
            const emailActu = fila.find('td').eq(4)
            optionPrincipal = $('#prioridad').find('option[value="6"]')

            if (prioridadEditar.text() === 'Principal') {
                optionPrincipal.removeAttr('disabled', '')
                $('#prioridad').val(6);
                $('#email_modal').val(emailEditar.text());
                $('#id_email').val(idEmail.text());
                $('#tpExist').val(tpExist.text());
                $('#emailActu').val(emailActu.text());
            } else {
                $('#prioridad').val(7);
                $('#email_modal').val(emailEditar.text());
                $('#id_email').val(idEmail.text());
                $('#tpExist').val(tpExist.text());
                $('#emailActu').val(emailActu.text());
            }
            tablaTemporal = tablaTemporal.filter(p => p.email !== emailEditar.text());

            let principal = tablaTemporal.find(p => p.prioridad == 6)
            $('#email').val(!principal ? tablaTemporal[0].email : principal.email);
            console.log(tablaTemporal);
            generarTablaEmail(tablaTemporal);
        }

        function insertarEmail(id) {
            console.log(tablaTemporal);
            tablaTemporal.forEach(registro => {
                console.log('1');
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

        function eliminarEmail(id, tp) {

            const fila = $('#util' + id);
            const emailEditar = fila.find('td').eq(0)
            const prioridadEditar = fila.find('td').eq(1)
            const idEmail = fila.find('td').eq(2)
            const tpExist = fila.find('td').eq(3)


            if (tp == 1) {
                console.log('tp1')
                tablaTemporal = tablaTemporal.filter(p => p.email !== emailEditar.text());
                generarTablaEmail(tablaTemporal);
            } else {
                console.log('Ya existe en la base de datos')
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('/email/cambiarEstado/'); ?>" + idEmail.text() + "/" + 'E',
                    dataType: "json",
                }).done(function(data) {
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
                        title: 'Registro eliminado con exito!'
                    })
                    tablaTemporal = tablaTemporal.filter(p => p.id_email !== idEmail.text());

                    console.log(tablaTemporal[0].id_email)
                    generarTablaEmail(tablaTemporal);
                    contador = 0
                    return
                })
            }
        }

        function seleccionaUsuario(id, tp) {
            if (tp == 2) {
                console.log('Actualizar function');
                dataURL = "<?php echo base_url('/estudiantes/buscarEstudiantes'); ?>" + "/" + id;
                $.ajax({
                    type: "POST",
                    url: dataURL,
                    dataType: "json",
                    success: function(rs) {
                        $("#tp").val(2);
                        $("#id").val(id)
                        $("#id_estudiante").val(rs[0]['id_estudiante'])
                        $('#tipo_documento').val(rs[0]['tipo_documento']);
                        $('#rol').val(rs[0]['id_rol']);
                        $('#grado').val(rs[0]['id_grado']);
                        $('#n_documento').val(rs[0]['n_documento']);
                        $('#numeroActu').val(rs[0]['n_documento']);
                        $('#primer_nombre').val(rs[0]['nombre_p']);
                        $('#segundo_nombre').val(rs[0]['nombre_s']);
                        $('#primer_apellido').val(rs[0]['apellido_p']);
                        $('#segundo_apellido').val(rs[0]['apellido_s']);
                        $('#direccionX').val(rs[0]['direccion']);
                        $('#email_modal').val('');
                        $('#prioridad').val('');

                        let str = rs[0]['direccion']
                        str = str.replace('#', '');
                        let partes = str.split(/[\s-]+/);
                        if (partes.length > 4) {
                            $('#dir').val(partes[0] + ' ' + partes[1]);
                            $('#dir2').val(partes[2]);
                            $('#dir3').val(partes[3]);
                            $('#dir4').val(partes[4]);
                        } else {
                            $('#dir').val(partes[0]);
                            $('#dir2').val(partes[1]);
                            $('#dir3').val(partes[2]);
                            $('#dir4').val(partes[3]);

                        }

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
                        rs.forEach(element => {

                            tablaTemporal.push({
                                tp: 2,
                                email: element.email,
                                prioridad: element.prioridad,
                                id_email: element.id_email,
                            })
                        });
                        generarTablaEmail(tablaTemporal);
                        let principal = tablaTemporal.find(p => p.prioridad == 6)
                        if (rs.length == 0) {
                            $('#email').val('');
                        } else {
                            $('#email').val(!principal ? tablaTemporal[0].email : principal.email);
                        }
                    }
                })
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>telefono/telefonosUsuario/" + id,
                    dataType: "JSON",
                    success: function(rs) {
                        rs.forEach(element => {

                            tablaTemporalTelefonos.push({
                                tp: 2,
                                telefono: element.numero,
                                prioridad: element.prioridad,
                                tipo: element.tipo,
                                id_telefono: element.id_telefono,
                            })
                        });
                        generarTablaTel(tablaTemporalTelefonos);
                        let principal = tablaTemporalTelefonos.find(p => p.prioridad == 6)
                        if (rs.length == 0) {
                            $('#telUsuario').val('');
                        } else {
                            $('#telUsuario').val(!principal ? tablaTemporalTelefonos[0].telefono : principal.telefono);
                        }
                    }
                })

            } else {
                tablaTemporal = []
                generarTablaEmail(tablaTemporal);
                $("#email").val('');
                $('#telUsuario').val('')
                $("#tp").val(1);
                $('#tipo_documento').val('');
                $('#n_documento').val('');
                $('#primer_nombre').val('');
                $('#segundo_nombre').val('');
                $('#primer_apellido').val('');
                $('#segundo_apellido').val('');
                $('#contraseña').val('');
                $('#email_modal').val('');
                $('#prioridad').val('');
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

        function generarTablaTel(Telefonos) {

            let contadortel = 0;
            let parametros = {
                '6': 'Principal',
                "6": 'Principal',
                '7': 'Secundario',
                '22': 'Fijo',
                '23': 'Celular'
            }


            let contenido = '';
            Telefonos.forEach(telefono => {
                contadortel++
                contenido += `
                    <tr id="utilT${contadortel}">
                    <td class="text-center">${contadortel}</td>
                    <td class="text-center">${telefono.telefono}</td>
                    <td class="text-center">${parametros[telefono.tipo]}</td>
                    <td class="text-center">${parametros[telefono.prioridad]}</td>
                    <td hidden class="text-center">${telefono.id_telefono ? telefono.id_telefono : ''}</td>
                    <td hidden class="text-center">${telefono.tp}</td>
                    <td hidden class="text-center">${email.tp == 2 ? email.email : ''}</td>
                    <td class="text-center">
                    <button class="btn btn-outline-primary" onclick="editarTelefono( ${contadortel});"><i class="bi bi-pencil"></i></button>
                    <button class="btn btn-outline-danger" onclick="seleccionarEmail( ${telefono.id_telefono} ,2 );"><i class="bi bi-trash"></i></button>
                    </td>
                    </tr>`
            });
            $('#tabla_telefono').html(contenido);
        }

        let tablaTemporalTelefonos = [];
        $('#btn_insertarTelefono').click(function() {
            let telefono = $('#telefono').val();
            let prioridad = $('#prioridad_tel').val();
            let tipo = $('#tipo').val();
            let id_telefono = $('#id_telefono').val();
            let tp = $('#tpExistTel').val();

            filtroPrioridad = tablaTemporalTelefonos.filter(p => p.prioridad == 6);
            filtroTel = tablaTemporalTelefonos.filter(p => p.telefono == telefono);

            datosValidar = {
                valor: telefono,
                campo: 'numero',
                nombreActu: tp == 2 ? telefono : '',
            }
            console.log($('#telefono'))
            $.post('<?php echo base_url() ?>telefono/validar', datosValidar, function(response) {
                if (response == true) {
                    $('#telefono').addClass('is-invalid');
                    $('#errorTel').text('Este telefono ya se encuentra Registrado');
                    setTimeout(() => {
                        $('#telefono').removeClass('is-invalid');
                        $('#errorTel').text('');
                    }, 2000);
                } else if ([telefono, prioridad, tipo].includes('')) {
                    $('#telefono').addClass('is-invalid');
                    $('#prioridad_tel').addClass('is-invalid');
                    $('#errorTel').text('Todos los campos son obligatorios');
                    setTimeout(() => {
                        $('#telefono').removeClass('is-invalid');
                        $('#prioridad_tel').removeClass('is-invalid');
                        $('#errorTel').text('');
                        $('#prioridadTel').val('');
                    }, 2000)
                } else if (filtroPrioridad.length > 0 && prioridad == 6) {
                    $('#prioridad_tel').addClass('is-invalid');
                    $('#errorPrioridadTel').text('Ya hay un telefono Principal');
                    setTimeout(() => {
                        $('#prioridad_tel').removeClass('is-invalid');
                        $('#errorPrioridadTel').text('');
                    }, 2000)
                } else if (filtroTel.length > 0) {
                    $('#telefono').addClass('is-invalid');
                    $('#errorTel').text('Este email ya esta registrado');
                    setTimeout(() => {
                        $('#telefono').removeClass('is-invalid');
                        $('#errorTel').text('');
                    }, 2000)
                } else {
                    tablaTemporalTelefonos.push({
                        tp: tp == 2 ? 2 : 1,
                        telefono: telefono,
                        tipo: tipo,
                        id_telefono: id_telefono,
                        prioridad: prioridad,

                    })
                    generarTablaTel(tablaTemporalTelefonos);

                    let principal = tablaTemporalTelefonos.find(p => p.prioridad == 6)
                    $('#telUsuario').val(!principal ? tablaTemporalTelefonos[0].telefono : principal.telefono);
                    optionPrincipal = $('#prioridad').find('option[value="6"]')
                    $('#prioridad_tel').val(7);
                    prioridad == 6 ? optionPrincipal.attr('disabled', '') : '';
                    $('#tipo').val('');
                    $('#telefono').val('');
                    $('#tpExistTel').val('')
                }
            })
        });

        function editarTelefono(id) {

            const fila = $('#utilT' + id);
            const telefonoEditar = fila.find('td').eq(1)
            const prioridadTelEditar = fila.find('td').eq(2)
            const tipoTel = fila.find('td').eq(3)
            const idTelefono = fila.find('td').eq(4)
            const tpExistTel = fila.find('td').eq(5)
            const telefonoActu = fila.find('td').eq(6)
            optionPrincipal = $('#prioridad_tel').find('option[value="6"]')

            console.log(telefonoEditar.text())
            if (prioridadTelEditar.text() === 'Principal') {
                optionPrincipal.removeAttr('disabled', '')
                $('#prioridad_tel').val(6);
                $('#telefono').val(telefonoEditar.text());
                $('#id_telefono').val(idTelefono.text());
                $('#tipo').val(tipoTel.text() == 22 ? 22 : 23);
                $('#tpExistTel').val(tpExistTel.text());
                $('#telefonoActu').val(telefonoActu.text());
            } else {
                $('#prioridad_tel').val(7);
                $('#telefono').val(telefonoEditar.text());
                $('#id_telefono').val(idTelefono.text());
                $('#tipo').val(tipoTel.text() == 22 ? 22 : 23);
                $('#tpExistTel').val(tpExistTel.text());
                $('#telefonoActu').val(telefonoActu.text());
            }
            tablaTemporalTelefonos = tablaTemporalTelefonos.filter(p => p.telefono !== telefonoEditar.text());

            let principal = tablaTemporalTelefonos.find(p => p.prioridad == 6)
            // $('#email').val(!principal ? tablaTemporalTelefonos[0].email : principal.email);
            console.log(tablaTemporalTelefonos);
            generarTablaTel(tablaTemporalTelefonos);
        }

        function insertarTelefono(id) {
            console.log(tablaTemporalTelefonos);
            tablaTemporalTelefonos.forEach(registro => {
                console.log(registro.tp);
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('/telefono/insertar'); ?>",
                    data: {
                        tp: registro.tp,
                        numero: registro.telefono,
                        prioridad: registro.prioridad,
                        id_telefono: registro.id_telefono,
                        tipo: registro.tipo,
                        id_usuario: id
                    },
                    dataType: "json",
                }).done(function(data) {})
            });
        }

        $('.close').click(function() {
            $("#modal-confirma").modal("hide");
        });

        $('.close').click(function() {
            $("#Resetear").modal("hide");
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
                id_usuario: id,
                tp: 1,
                id_grado: $('#id_grado_asig').val(),
            };
            console.log(data);
            $.post("<?php echo base_url('/estudiantes/insertarGrado'); ?>", data, function(response) {
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
                    title: 'Acción realizada con exito!'
                })
                contador = 0
                tablaUsuarios.ajax.reload();
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