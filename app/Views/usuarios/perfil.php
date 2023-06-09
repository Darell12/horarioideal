<input hidden id="accion" value="<?php echo session('accion') ?>"></input>

<div class="">
    <section style="background-color: #fafafa;;">
        <div class="container py-5">

            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <i class='bx bxs-user-circle  bx-lg'></i>                                                                                                           
                            <h5 class="my-2"><?php echo $datos['nombre_p'] . ' ' . $datos['apellido_p'] ?></h5>
                            <p class="text-muted mb-1"><?php echo $datos['rol'] ?></p>
                            <p class="text-muted mb-1"><?php echo $datos['direccion'] ?></p>
                            <?php if ($datos['rol'] == 'Estudiante') { ?>
                                <p class="text-muted mb-4"><?php echo $datos['grado'] ?></p>
                            <?php } ?>

                            <div class="d-flex justify-content-center mb-2">
                                <button type="button" class="btn btn-outline-info" data-bs-target="#UsuarioModal" title="Actualizar Contraseña" data-bs-toggle="modal">Cambiar <br> Contraseña</button>
                                <button onClick="EditarPerfil(<?php echo $datos['id_usuario'] ?>)" type="button" class="btn btn-outline-success ms-1">Editar Perfil</button>
                            </div>
                        </div>
                    </div>

                    <?php if ($datos['rol'] == 'Estudiante') { ?>
                    <div class="card mb-4">
                        <div class="card-body text-center">
                        <i class="bi bi-brush-fill"></i>
                            <h5 class="my-2">Datos del Acudiente</h5>
                           
                                <p class="my-2"><?php echo $acudiente[0]['nombre_p'] . ' ' . $acudiente[0]['apellido_p'] ?></p>
                                <p id="documentos" class="text-muted mb-0"><?php echo $acudiente[0]['t_documento'] . ': ' . $acudiente[0]['n_documento'] ?></p>
                                <p class="my-2"><?php echo $acudiente[0]['n_documento']?></p>
                                <p class="text-muted mb-4"><?php echo $acudiente[0]['direccion'] ?></p>
                        </div>
                        <div class="d-flex justify-content-center mb-2">
                                <button id="EditarAcudiente"  onclick="EditarAcudiente(<?php echo $datos['id_usuario'] ?>)" type="button" class="btn btn-outline-success ms-1">Editar<br> Acudiente</button>
                            </div>
                    </div>  
                    <?php } ?>

                </div>
                <div class="col-lg-8">
                    <div class="card  p-4">
                        <div class="card-body" id="EditarPerfil">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Documento</p>
                                </div>
                                <div class="col-sm-9">
                                    <p id="documentos" class="text-muted mb-0"><?php echo $datos['t_documento'] . ': ' . $datos['n_documento'] ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Nombres</p>
                                </div>
                                <div class="col-sm-9">
                                    <p id="nombres" class="text-muted mb-0"><?php echo $datos['nombre_p'] . ' ' . $datos['nombre_s'] ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Apellidos</p>
                                </div>
                                <div class="col-sm-9">
                                    <p id="apellidos" class="text-muted mb-0"><?php echo $datos['apellido_p'] . ' ' . $datos['apellido_s'] ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email Principal</p>
                                </div>
                                <div class="col-sm-9">
                                    <p id="email" class="text-muted mb-0">
                                        <?php foreach ($emails as $valor) { ?>
                                            <?php if ($valor['prioridad'] == '6') { ?>
                                                <?php echo $valor['email']; ?>
                                            <?php } ?>
                                        <?php } ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Telefono Principal</p>
                                </div>
                                <div class="col-sm-9">
                                    <p id="telefono" class="text-muted mb-0"><?php foreach ($telefonos as $valor) { ?>
                                            <?php if ($valor['id_prioridad'] == '6') { ?>
                                                <?php echo $valor['numero']; ?>
                                            <?php } ?>
                                        <?php } ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Direccion</p>
                                </div>
                                <div class="col-sm-9">
                                    <p id="direccion" class="text-muted mb-0"><?php echo $datos['direccion'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<form method="POST" action="<?php echo base_url('/usuarios/actualizarContraseña'); ?>" autocomplete="off" class="needs-validation" id="CambiarContraseña" novalidate id="agregrar_usuario">
    <div class="modal fade" id="UsuarioModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="tituloModal" style="font-size: large; color:#29588a;"><b>Actualizar Contraseña</b></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <label id="password_label" for="password" style="font-size: large; color:#29588a;"><b>Contraseña anterior</b></label>
                                <input id="contraseña" name="contraseña" type="password" class="form-control" required />
                            </div>
                            <div class="col">
                                <label id="password_label" for="password" style="font-size: large; color:#29588a;"><b>Nueva Contraseña</b></label>
                                <input id="nueva_contraseña" name="nueva_contraseña" type="password" class="form-control" required />
                            </div>
                        </div>
                        <input type="text" id="usuario_crea" name="usuario_crea" value="<?php session('id') ?>" hidden>
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

<!-- tabla emalis -->
<div id="ModalEmail" class="modal" tabindex="-1">
    <div class="modal-dialog  modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titulo_email"> Agregar Email <a href="#" title="Los emails ingresados antes de guardar el usuario por primera vez son guardados temporalmente"><i class="bi bi-question" hidden></i></a></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col">
                        <label for="message-text" class="col-form-label" style="font-size: large; color:#29588a;"><b>Email:</b></label>
                        <input type="email" name="email_modal" class="form-control" id="email_modal" placeholder="Ej: JhonDoe@gmail.com">
                        <div class="invalid-feedback" id="errorEmail"></div>
                    </div>

                    <div class="col">
                        <label for="message-text" class="col-form-label" style="font-size: large; color:#29588a;"><b>Prioridad:</b></label>
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
                        <thead class="thead-light">
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

<!-- tabla telefonos -->
<div id="ModalTelefonos" class="modal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="titulo_email"> Agregar Telefono <a href="#" title="Los telefonos ingresados antes de guardar el usuario por primera vez son guardados temporalmente"><i class="bi bi-question" hidden></i></a></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col">
                        <label for="message-text" class="col-form-label" style="font-size: large; color:#29588a;"><b>Número:</b></label>
                        <input type="text" name="telefono" class="form-control" id="telefono">
                        <div class="invalid-feedback" id="errorTel"></div>
                    </div>

                    <div class="col">
                        <label for="message-text" class="col-form-label" style="font-size: large; color:#29588a;"><b>Tipo:</b></label>
                        <select name="tipo" class="form-select form-select" id="tipo">
                            <option value="">-Seleccione una opción-</option>
                            <?php foreach ($tipo as $valor) { ?>
                                <option value="<?php echo $valor['id_parametro_det']; ?>"><?php echo $valor['nombre']; ?></option>
                            <?php } ?>
                        </select>
                        <div class="invalid-feedback" id="errorTipoTel"></div>
                    </div>
                    <div class="col">
                        <label for="message-text" class="col-form-label" style="font-size: large; color:#29588a;"><b>Prioridad:</b></label>
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
                        <thead class="thead-light">
                            <tr>
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

<div class="modal fade" id="modal-confirma-telefono" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div style="text-align:center;" class="modal-header">
                <h5 style="color:#98040a;font-size:20px;font-weight:bold;" class="modal-title" id="exampleModalLabel">Eliminación de Registro</h5>

            </div>
            <div style="text-align:center;font-weight:bold;" class="modal-body">
                <p>Seguro Desea Eliminar éste Registro?</p>
                <input type="text" hidden id="id_almacenar_secundario"><input type="text" hidden id="id_almacenar_usuario_secundario"><input type="text" hidden id="id_almacenar_estado_secundario">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary close" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-outline-danger btn-ok" id="btnEliminarTel">Confirmar</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal Acudientes -->
<form id="formularioAcudiente">
<div id="ModalAcudientes" class="modal" tabindex="-1" style="background: rgb(0 0 0 / 43%);">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background: #427dbb; color:#FFF;">
                <h1 class="modal-title fs-5" id="tituloModalAcu">Agregar Acudiente</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="body">
                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label class="col-form-label" style="font-size: large; color:#29588a;"><b>Tipo de Documento:</b></label>
                            <select class="form-select form-select" name="tipo_documentoAcu" id="tipo_documentoAcu" required>
                                <option value="">Seleccione un Tipo</option>
                                <option value="2">Cedula de Ciudadania</option>
                                <option value="1">Tarjeta de Identidad</option>
                                <option value="3">Cedula de Extranjeria</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="nombre" class="col-form-label" style="font-size: large; color:#29588a;"><b>Numéro de Documento:</b></label>
                            <input type="number" class="form-control" name="numero_documentoAcu" id="numero_documentoAcu" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="nombre" class="col-form-label"style="font-size: large; color:#29588a;"><b>Primer Nombre:</b></label>
                            <input type="text" class="form-control" name="primer_nombreAcu" id="primer_nombreAcu" maxlength="20" pattern="[A-Za-z]+" required>
                        </div>
                        <div class="col">
                            <label for="nombre" class="col-form-label" style="font-size: large; color:#29588a;"><b>Segundo Nombre (Opcional):</b></label>
                            <input type="text" class="form-control" name="segundo_nombreAcu" id="segundo_nombreAcu" maxlength="20" pattern="[A-Za-z]+">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="nombre" class="col-form-label" style="font-size: large; color:#29588a;"><b>Primer Apellido:</b></label>
                            <input type="text" class="form-control" name="primer_apellidoAcu" id="primer_apellidoAcu" maxlength="20" pattern="[A-Za-z]+" required>
                        </div>
                        <div class="col">
                            <label for="nombre" class="col-form-label" style="font-size: large; color:#29588a;"><b>Segundo Apellido:</b></label>
                            <input type="text" class="form-control" name="segundo_apellidoAcu" id="segundo_apellidoAcu" required>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label for="nombre" class="col-form-label" style="font-size: large; color:#29588a;"><b>Emails:</b></label>
                            <div class="input-group d-flex">
                                <input type="text" id="emailAcu" name="emailAcu" class="form-control" placeholder="Agregar un email" required>
                            </div>
                        </div>
                        <div class="col">
                            <label for="nombre" class="col-form-label" style="font-size: large; color:#29588a;"><b>Telefonos:</b></label>
                            <div class="input-group">
                                <input class="form-control" type="number" id="telefonoAcu" name="telefonoAcu" placeholder="Agregar telefonos" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label id="direccion_usuario" for="direccion" style="font-size: large; color:#29588a;"><b>Dirección:</b></label>
                        <div class="col">
                            <select name="direccion1" id="direccion1" placeholder="Ej: 23" class="form-select form-select" required onchange="ValidardireccionAcudiente()">
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
                            <input onchange="ValidardireccionAcudiente()" id="direccion2" name="direccion2" type="text" maxLength="4" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Ej: 17B" required />
                        </div>
                        <div class="col">
                            <input onchange="ValidardireccionAcudiente()" id="direccion3" maxLength="4" name="direccion3" type="text" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Ej: #68C" required />
                        </div>
                        <div class="col">
                            <input onchange="ValidardireccionAcudiente()" id="direccion4" maxLength="4" name="direccion4" type="text" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Ej: 23" required />
                        </div>
                    </div>

                    <div class="mb-3">
                        <label id="direccion_usuario" for="direccion"></label>
                        <input id="direccionAcu" name="direccionAcu" type="text" class="form-control" readonly class="form-control-plaintext">
                    </div>

                    <input type="text" id="usuario_crea" name="usuario_crea" value="<?php session('id') ?>" hidden>
                    <input type="text" id="tp" name="tp" hidden>
                    <input type="text" id="id_acu" name="id_acu" hidden>
                    <input type="text" id="id" name="id" hidden>
                    <input type="text" id="nombreActuAcu" name="nombreActuAcu" hidden>
                    <input type="text" id="numeroActuAcu" name="numeroActuAcu" hidden>

                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline-success" id="btnListo">Listo</button>
            </div>
        </div>
    </div>
</div>
</form>


<script>
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

    function validarPrioridadTel() {
        const existeValor = tablaTemporalTelefonos.some(telefono => telefono.prioridad == 6);

        if (existeValor) {
            $('#prioridad_tel').val(7)
            $('#Principal').attr('disabled', '');
            $('#Secundario').removeAttr('disabled', '');
        } else {
            $('#prioridad_tel').val(6)
            $('#Secundario').attr('disabled', '');
            $('#Principal').removeAttr('disabled', '');
        }
    }

    function validarPrioridadEmail() {
        const existeValor = tablaTemporal.some(email => email.prioridad == 6);

        if (existeValor) {
            $('#prioridad').val(7)
            $('#PrincipalE').attr('disabled', '');
            $('#SecundarioE').removeAttr('disabled', '');
        } else {
            $('#prioridad').val(6)
            $('#SecundarioE').attr('disabled', '');
            $('#PrincipalE').removeAttr('disabled', '');
        }
    }


    let tablaTemporal = []
    $('#btn_insertar').click(function() {

        //Expresion regular de formato email
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        let email = $('#email_modal').val();
        let prioridad = $('#prioridad').val();
        let id_email = $('#id_email').val();
        let tp = $('#tpExist').val();

        if (!regex.test(email)) {
            $('#email_modal').addClass('is-invalid');
            $('#errorEmail').text('Este no es un formato valido de email');
            setTimeout(() => {
                $('#email_modal').removeClass('is-invalid');
                $('#errorEmail').text('');
            }, 2000);
            return; // El email no es válido
        }

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
                $('#email').val(!principal ? '' : principal.email);


                optionPrincipal = $('#prioridad').find('option[value="6"]')
                $('#prioridad').val(7);
                prioridad == 6 ? optionPrincipal.attr('disabled', '') : '';
                $('#email_modal').val('');
            }
        })
        validarPrioridadEmail()
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
        $('#email').val(!principal ? '' : principal.email);
        console.log(tablaTemporal);
        generarTablaEmail(tablaTemporal);
        validarPrioridadEmail()
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
        validarPrioridadEmail()
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

                // console.log(tablaTemporal[0].id_email)
                generarTablaEmail(tablaTemporal);
                contador = 0
                return
            })
        }
        let principal = tablaTemporal.find(p => p.prioridad == 6)
        $('#email').val(!principal ? '' : principal.email);
        validarPrioridadEmail()
    }

    function eliminarTelefono(id, tp) {

        const fila = $('#utilT' + id);
        const telefonoEditar = fila.find('td').eq(0)
        const prioridadTelEditar = fila.find('td').eq(1)
        const tipoTel = fila.find('td').eq(2)
        const idTelefono = fila.find('td').eq(3)
        const tpExistTel = fila.find('td').eq(4)
        const telefonoActu = fila.find('td').eq(5)
        optionPrincipal = $('#prioridad_tel').find('option[value="6"]')


        if (tp == 1) {
            console.log('tp1')
            tablaTemporalTelefonos = tablaTemporalTelefonos.filter(p => p.telefono !== telefonoEditar.text());
            generarTablaTel(tablaTemporalTelefonos);
        } else {
            console.log('Ya existe en la base de datos')
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('/telefono/cambiarEstado/'); ?>" + idTelefono.text() + "/" + 'E',
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
                console.log(tablaTemporal);
                console.log(telefonoEditar.text());
                tablaTemporalTelefonos = tablaTemporalTelefonos.filter(p => p.telefono !== telefonoEditar.text());
                // console.log(tablaTemporalTelefonos[0].id_telefono)
                generarTablaTel(tablaTemporalTelefonos);
                contador = 0
                return
            })
        }


        let principal = tablaTemporalTelefonos.find(p => p.prioridad == 6)
        $('#telUsuario').val(!principal ? '' : principal.telefono);
        validarPrioridadTel()
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
            <td class="text-center">${telefono.telefono}</td>
            <td class="text-center">${parametros[telefono.tipo]}</td>
            <td class="text-center">${parametros[telefono.prioridad]}</td>
            <td hidden class="text-center">${telefono.id_telefono ? telefono.id_telefono : ''}</td>
            <td hidden class="text-center">${telefono.tp}</td>
            <td hidden class="text-center">${telefono.tp == 2 ? telefono.telefono : ''}</td>
                    <td class="text-center">
                    <button class="btn btn-outline-primary" onclick="editarTelefono( ${contadortel});"><i class="bi bi-pencil"></i></button>
                    <button class="btn btn-outline-danger" onclick="eliminarTelefono(${contadortel}, ${telefono.tp});"><i class="bi bi-trash"></i></button>
                    </td>
                    </tr>`
        });
        $('#tabla_telefono').html(contenido);
        validarPrioridadTel()
    }

    let tablaTemporalTelefonos = [];
    $('#btn_insertarTelefono').click(function() {

        // Expresión regular solo numeros
        const regex = /^\d{1,11}$/;

        let telefono = $('#telefono').val();
        let prioridad = $('#prioridad_tel').val();
        let tipo = $('#tipo').val();
        let id_telefono = $('#id_telefono').val();
        let tp = $('#tpExistTel').val();

        if (!regex.test(parseInt(telefono))) {
            $('#telefono').addClass('is-invalid');
            $('#errorTel').text('El telefono no puede contener caracteres diferentes a numeros');
            setTimeout(() => {
                $('#telefono').removeClass('is-invalid');
                $('#errorTel').text('');
            }, 2000);
            return
        }

        filtroPrioridad = tablaTemporalTelefonos.filter(p => p.prioridad == 6);
        filtroTel = tablaTemporalTelefonos.filter(p => p.telefono == telefono);

        datosValidar = {
            tp: tp,
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
                $('#telUsuario').val(!principal ? '' : principal.telefono);
                optionPrincipal = $('#prioridad').find('option[value="6"]')
                $('#prioridad_tel').val(7);
                prioridad == 6 ? optionPrincipal.attr('disabled', '') : '';
                $('#tipo').val('');
                $('#telefono').val('');
                $('#tpExistTel').val('')
            }
        })
        validarPrioridadTel()
    });

    function editarTelefono(id) {

        const fila = $('#utilT' + id);
        const telefonoEditar = fila.find('td').eq(0)
        const tipoTel = fila.find('td').eq(1)
        const prioridadTelEditar = fila.find('td').eq(2)
        const idTelefono = fila.find('td').eq(3)
        const tpExistTel = fila.find('td').eq(4)
        const telefonoActu = fila.find('td').eq(5)
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
        validarPrioridadTel()
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
        validarPrioridadTel()
    }

    function EditarPerfil(id) {
        let newElement = `
            <form id="formularioPerfil">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Documento</p>
                            </div>
                             <div class="col-sm-9">
                            <div class="col">
                                    <label class="col-form-label" style="font-size: large; color:#29588a;"><b>Tipo de Documento:</b></label>
                                    <select class="form-select form-select" name="tipo_documento" id="tipo_documento" >
                                        <option value="0">Seleccione un Tipo</option>
                                        <option value="2">Cedula de Ciudadania</option>
                                        <option value="1">Tarjeta de Identidad</option>
                                        <option value="3">Cedula de Extranjeria</option>
                                    </select>

                                    <div class="col">
                                    <label for="nombre" class="col-form-label" style="font-size: large; color:#29588a;"><b>Numéro de Documento:</b></label>
                                    <input type="number" class="form-control" name="n_documento" id="n_documento" >
                                </div>

                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Nombres</p>
                            </div>
                            <div class="col-sm-9">
                            <div class="row">
                                <div class="col">
                                    <label for="nombre" class="col-form-label" style="font-size: large; color:#29588a;"><b>Primer Nombre:</b></label>
                                    <input type="text" class="form-control" name="primer_nombre" id="primer_nombre" maxlength="20" pattern="[A-Za-z]+" >
                                </div>  
                                <div class="col">
                                    <label for="nombre" class="col-form-label" style="font-size: large; color:#29588a;"><b>Segundo Nombre (Opcional):</b></label>
                                    <input type="text" class="form-control" name="segundo_nombre" id="segundo_nombre" maxlength="20" pattern="[A-Za-z]+" >
                                </div>
                            </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Apellidos</p>
                            </div>
                            <div class="col-sm-9">
                            <div class="row">
                                <div class="col">
                                    <label for="nombre" class="col-form-label" style="font-size: large; color:#29588a;"><b>Primer Apellido:</b></label>
                                    <input type="text" class="form-control" name="primer_apellido" id="primer_apellido" maxlength="20" pattern="[A-Za-z]+" >
                                </div>
                                <div class="col">
                                    <label for="nombre" class="col-form-label" style="font-size: large; color:#29588a;"><b>Segundo Apellido:</b></label>
                                    <input type="text" class="form-control" name="segundo_apellido" id="segundo_apellido" >
                                </div>
                            </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-1">
                            <div class="col">
                                <label for="nombre" class="col-form-label" style="font-size: large; color:#29588a;"><b>Emails:</b></label>
                                <div class="input-group">
                                    <input type="text" id="email" name="email" class="form-control" placeholder="Agregar un email" aria-label="" aria-describedby="button-addon2" disabled>
                                    <button class="btn btn-success" type="button" onclick="validarPrioridadEmail()" data-bs-toggle="modal" data-bs-target="#ModalEmail"><i class="bi bi-plus"></i></button>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="col">
                                <label for="nombre" class="col-form-label" style="font-size: large; color:#29588a;"><b>Telefonos:</b></label>
                                <div class="input-group">
                                    <input type="text" id="telUsuario" name="telUsuario" class="form-control" placeholder="Agregar telefonos" aria-label="" aria-describedby="button-addon2" disabled>
                                    <button class="btn btn-success" type="button" onclick="validarPrioridadTel()" data-bs-toggle="modal" data-bs-target="#ModalTelefonos"><i class="bi bi-plus"></i></button>
                                </div>
                            </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Direccion</p>
                            </div>
                            <div class="col-sm-9">
                            <label id="direccion_usuario" for="direccion" style="font-size: large; color:#29588a;"><b>Dirección:</b></label>
                            <div class="row">
                                <div class="col">
                                    <select onchange="Direccion()" name="dir" id="dir"  placeholder="Ej: 23" class="form-select form-select">
                                    <option value="">--Selecciona--</option>
                                        <option >Carrera</option>
                                        <option >Calle</option>
                                        <option >Avenida Calle</option>
                                        <option >Avenida Carrera</option>
                                        <option >Autopista</option>
                                        <option >Avenida</option>
                                        <option >Circunvalar</option>
                                        <option >Diagonal</option>
                                        <option >Transversal</option>
                                        <option >Kilometro</option>
                                        <option >Circular</option>
                                    </select>
                                </div>
                               
                                <div class="col">
                                    <input onchange="Direccion()" id="dir2" name="dir2" type="text" maxLength="4" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Ej: 17B"  />
                                </div>
                                <div class="col">
                                    <input onchange="Direccion()" id="dir3" maxLength="4" name="dir3" type="text" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Ej: #68C"  />
                                </div>
                                <div class="col">
                                    <input onchange="Direccion()" id="dir4" maxLength="4" name="dir4" type="text" class="form-control" placeholder="Ej: 23"  />
                                </div>
                            </div>

                            <div class="mb-3">
                                <label id="direccion_usuario" for="direccion"></label>
                                <input id="direccionX" name="direccionX" type="text" class="form-control" readonly class="form-control-plaintext">
                            </div>
                            <button onClick="insertarCambios()" type="button" id="guardarCambios" class="btn btn-outline-primary close" data-dismiss="modal">Actualizar</button>

                            <a href="<?php echo base_url('/perfil'); ?>"><button class="btn btn-outline-primary">Regresar</button></a>

                        </div>
                        </form>
            `
        $.validator.addMethod("soloLetras", function(value, element) {
            return this.optional(element) || /^[a-zA-ZñÑ\s]+$/.test(value);
        }, "Por favor ingrese solamente letras.");

        $("#formularioPerfil").validate({
            rules: {
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


        $('#EditarPerfil').replaceWith(newElement);
        // Código de tu función aquí
        console.log('La función se ha activado!' + id);
        var data = {
            id_rol: <?php echo $datos['id_rol']; ?>,
            tipo_documento: $('#tipo_documento').val(),
            id: <?php echo $datos['id_usuario']; ?>,
            n_documento: $('#n_documento').val(),
            primer_nombre: $('#primer_nombre').val(),
            segundo_nombre: $('#segundo_nombre').val(),
            primer_apellido: $('#primer_apellido').val(),
            segundo_apellido: $('#segundo_apellido').val(),
            direccionX: $('#direccionX').val()
        };
        console.log(data);

        seleccionaUsuario(id, "2");
    }

    $('#formularioPerfil').on('submit', function(e) {
        console.log('activo');
        e.preventDefault();
    })

    function insertarCambios(id) {
        console.log('Cambios');
        var data = {
            id_rol: <?php echo $datos['id_rol']; ?>,
            tipo_documento: $('#tipo_documento').val(),
            id: <?php echo $datos['id_usuario']; ?>,
            n_documento: $('#n_documento').val(),
            primer_nombre: $('#primer_nombre').val(),
            segundo_nombre: $('#segundo_nombre').val(),
            primer_apellido: $('#primer_apellido').val(),
            segundo_apellido: $('#segundo_apellido').val(),
            direccionX: $('#direccionX').val()
        };
        console.log(data);
        $.post("<?php echo base_url('/usuarios/insertar'); ?>", data, function(response) {
            insertarEmail(<?php echo $datos['id_usuario']; ?>);
            insertarTelefono(<?php echo $datos['id_usuario']; ?>);
        });
        let Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 1500,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: 'Informacion de usuario actualizada con exito!'
        }).then(() => {
            location.reload();
        });
    }

    function Direccion() {
        var dir1 = document.getElementById('dir');
        var dir2 = document.getElementById('dir2');
        var dir3 = document.getElementById('dir3');
        var dir4 = document.getElementById('dir4');
        var direccionReal = dir1.value + ' ' + dir2.value + ' ' + '#' + dir3.value + ' ' + '-' + ' ' + dir4.value;

        document.getElementById('direccionX').value = direccionReal;
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
                    $('#primer_nombre').val(rs[0]['nombre_p']);
                    $('#segundo_nombre').val(rs[0]['nombre_s']);
                    $('#primer_apellido').val(rs[0]['apellido_p']);
                    $('#segundo_apellido').val(rs[0]['apellido_s']);
                    $('#direccionX').val(rs[0]['direccion']);

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
                            console.log(rs.length);
                            if (rs.length = 0) {
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
            $('#direccionX').val('');
        }
    }

    $('#CambiarContraseña').on('submit', function(e) {
        e.preventDefault();
        data = {
            contraseña: $('#contraseña').val(),
            nueva_contraseña: $('#nueva_contraseña').val(),
        };
        console.log(data);
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('/usuarios/actualizarContraseña'); ?>",
            data: {
                contraseña: $('#contraseña').val(),
                nueva_contraseña: $('#nueva_contraseña').val(),
                id: <?php echo $datos['id_usuario'] ?>
            },

        }).done(function(response) {
            console.log(response);
            if (response == true) {
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
                    title: 'La contraseña ha sido actualizada!'
                }).then(
                    location.reload()
                )
            } else {
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
                    icon: 'error',
                    title: 'Las contraseñas no coinciden!'
                })
            }
        })
    });

    $(document).ready(function() {

        let accion = $('#accion').val()
        console.log(accion);
        if (accion == '1') {
            Swal.fire({
                icon: 'warning',
                title: 'Acción Requerida',
                text: 'Su contraseña fue restablecida, por favor cambiela antes de continuar'
            })
        }
    });

    function AcudientesPerfil() {   
        if ($('#formularioAcudiente').valid()) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('/acudientes/insertarAcudientes'); ?>", 
            data: {
                tp: $('#tp').val(),
                id: $('#tp').val() == 2 ? $('#id_acu').val() : data,
                tipo_documentoAcu: $('#tipo_documentoAcu').val(),
                numero_documentoAcu: $('#numero_documentoAcu').val(),
                primer_nombreAcu: $('#primer_nombreAcu').val(),
                segundo_nombreAcu: $('#segundo_nombreAcu').val(),
                primer_apellidoAcu: $('#primer_apellidoAcu').val(),
                segundo_apellidoAcu: $('#segundo_apellidoAcu').val(),
                direccionAcu: $('#direccionAcu').val(),
                emailAcu: $('#emailAcu').val(),
                telefonoAcu: $('#telefonoAcu').val(),
            },
            dataType: "json",
        }).done(function(data) {
            $('#ModalAcudientes').modal('hide');
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

            return
        })
    }
    }

 function EditarAcudiente(data){ 
       $('#ModalAcudientes').modal('show');
       $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>/acudientes/buscarAcudiente/" + data,
                dataType: "JSON",
                success: function(ac) {
                    $('#tp').val(2);
                    $('#id').val(id);
                    $('#tipo_documentoAcu').val(ac[0]['tipo_documento']);
                    $('#numero_documentoAcu').val(ac[0]['n_documento']);
                    $('#primer_nombreAcu').val(ac[0]['nombre_p']);
                    $('#segundo_nombreAcu').val(ac[0]['nombre_s']);
                    $('#primer_apellidoAcu').val(ac[0]['apellido_p']);
                    $('#segundo_apellidoAcu').val(ac[0]['apellido_s']);
                    $('#direccionAcu').val(ac[0]['direccion']);
                    $('#emailAcu').val(ac[0]['email']);
                    $('#telefonoAcu').val(ac[0]['telefono']);
                    $('#id_acu').val(ac[0]['id_acudiente'])
                    $('#tituloModalAcu').text('Editar Acudiente');
                    $("#btnListo").text('Actualizar');

                    let str = ac[0]['direccion']
                    str = str.replace('#', '');
                    let partes = str.split(/[\s-]+/);
                    if (partes.length > 4) {
                        $('#direccion1').val(partes[0] + ' ' + partes[1]);
                        $('#direccion2').val(partes[2]);
                        $('#direccion3').val(partes[3]);
                        $('#direccion4').val(partes[4]);
                    } else {
                        $('#direccion1').val(partes[0]);
                        $('#direccion2').val(partes[1]);
                        $('#direccion3').val(partes[2]);
                        $('#direccion4').val(partes[3]);

                    }
                }
            })
 }
 
    $('#btnListo').on('click', function(e) {
        if ($('#formularioAcudiente').valid()) {
            e.preventDefault(); 
            AcudientesPerfil();
            console.log('sirve');
            $('#ModalAcudientes').modal('hide');
            location.reload();
        }

    })

    $("#formularioAcudiente").validate({
        rules: {
            tipo_documentoAcu: {
                required: true,
            },
            numero_documentoAcu: {
                required: true,
                minlength: 4,
                maxlength: 12,
                digits: true,
                remote: {
                    url: '<?php echo base_url() ?>acudientes/validar',
                    type: "post",
                    dataType: "json",
                    data: {
                        campo: function() {
                            return 'n_documento';
                        },
                        valor: function() {
                            return $("#numero_documentoAcu").val();
                        },
                        tp: function() {
                            return $("#tp").val();
                        },
                        nombreActuAcu: function() {
                            return $("#numeroActuAcu").val();
                        },
                    },
                }
            },
            primer_nombreAcu: {
                required: true,
            },
            segundo_nombreAcu: {
            },
            primer_apellidoAcu: {
                required: true,
            },
            segundo_apellidoAcu: {
                required: true,
            },
            telefonoAcu: {
                digits: true,
                required: true,
            },
            emailAcu: {
                email: true,
                required: true,
            },
            direccion1: {
                required: true,
            },
            direccion2: {
                required: true,
            },
            direccion3: {
                required: true,
            },
            direccion4: {
                required: true,
            },
        },
        messages: {
            tipo_documentoAcu: {
                required: "Por favor seleccione una opción",
            },
            numero_documentoAcu: {
                required: "El número de documento es requerido",
                digits: "Solo ingrese digitos por favor",
                minlength: "El número de documento debe tener al menos 4 caracteres",
                maxlength: "El número de documento no puede tener más de 12 caracteres",
                remote: "Este número de documento ya esta registrado"
            },
            primer_nombreAcu: {
                required: "Este campo es requerido",
            },
            primer_apellidoAcu: {
                required: "Este campo es requerido",
            },
            segundo_apellidoAcu: {
                required: "Este campo es requerido",
            },
            telefonoAcu: {
                required: "Este campo es requerido",
            },
            emailAcu: {
                required: "Este campo es requerido",
                email: "Ingrese un email valido"
            },
            direccion1: {
                required: "Este campo es requerido",
            },
            direccion2: {
                required: "Este campo es requerido",
            },
            direccion3: {
                required: "Este campo es requerido",
            },
            direccion4: {
                required: "Este campo es requerido",
            },
        }
    });



</script>