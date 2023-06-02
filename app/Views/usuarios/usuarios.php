<div class="container bg-white rounded rounded-3">
    <div class="d-flex justify-content-between flex-wrap">
        <div class="border-0">
        </div>

        <div style="margin-top: 1em;">
            <button type="button" onclick="seleccionaUsuario(<?php echo 1 . ',' . 1 ?>);" class="btn btn-outline-success " data-bs-toggle="modal" data-bs-target="#UsuarioModal"><i class="bi bi-plus-circle-fill"></i> Agregar</button>
            <a href="<?php echo base_url('/usuarios/masivo'); ?>"><button type="button" class="btn btn-outline-secondary"><i class="bi bi-files"></i>Ingreso Masivo</button></a>
            <button type="button" class="btn btn-outline-success" onclick="fnExcel()"><i class="bi bi-filetype-xls"></i> Reporte Excel</button>
            <a href="<?php echo base_url('/usuarios/eliminados'); ?>"><button type="button" class="btn btn-outline-secondary"><i class="bi bi-file-x"></i> Eliminados</button></a>
            <a href="<?php echo base_url('/principal'); ?>"><button class="btn btn-outline-primary"><i class="bi bi-arrow-return-left"></i> Regresar</button></a>
        </div>


    </div>
    <br>
    <!-- <div class="d-flex align-items-center flex-wrap ocultar">
        <b class="fs-6 text-black"> Ocultar Columnas:</b> <a class="toggle-vis btn" data-column="1">Tipo Documento</a> - <a class="toggle-vis btn" data-column="2">Documento</a> - <a class="toggle-vis btn" data-column="3">Nombres</a> - <a class="toggle-vis btn" data-column="4">Apellidos</a> - <a class="toggle-vis btn" data-column="5">Rol</a>
    </div> -->
    <div class="table-responsive">
        <table id="tablaUsuarios" class="table align-items-center table-flush table-loader">
            <thead class="thead-light">
                <tr>
                    <th class="text-center" style="width: 1% !important;" scope="col">#</th>
                    <th class="text-center" style="width: 1% !important;" scope="col">Tipo Documento</th>
                    <th class="text-center" style="width: 1% !important;" scope="col">Documento</th>
                    <th class="text-center" style="width: 1% !important;" scope="col">Nombres</th>
                    <th class="text-center" style="width: 1% !important;" scope="col">Apellidos</th>
                    <th class="text-center" style="width: 1% !important;" scope="col">Rol</th>
                    <th class="text-center" style="width: 1% !important;">Acciones</th>
                </tr>
            </thead>
            <tbody style="font-family:Arial;font-size:12px;" class="table-group-divider">


            </tbody>
        </table>
    </div>
</div>

<table hidden id="tablaUsuariosExport" class="table align-items-center table-flush">
    <thead class="thead-light">
        <tr>
            <th class="text-center" style="width: 1% !important;" scope="col">#</th>
            <th class="text-center" style="width: 1% !important;" scope="col">Tipo Documento</th>
            <th class="text-center" style="width: 1% !important;" scope="col">Documento</th>
            <th class="text-center" style="width: 1% !important;" scope="col">Primer Nombre</th>
            <th class="text-center" style="width: 1% !important;" scope="col">Segundo Nombre</th>
            <th class="text-center" style="width: 1% !important;" scope="col">Primer Apellido</th>
            <th class="text-center" style="width: 1% !important;" scope="col">Segundo Apellido</th>
            <th class="text-center" style="width: 1% !important;" scope="col">Direccion</th>
            <th class="text-center" style="width: 1% !important;" scope="col">Email</th>
            <th class="text-center" style="width: 1% !important;" scope="col">Telefono</th>
        </tr>
    </thead>
    <tbody style="font-family:Arial;font-size:12px;" class="table-group-divider" id="cuerpoExcel">

    </tbody>
</table>
<!-- Modal -->
<form id="formulario">
    <div class="modal fade" id="UsuarioModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background: #427dbb; color:#FFF;">
                    <h1 class="modal-title fs-5" id="tituloModal">Añadir Usuario</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="body">
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
                                <input type="text" class="form-control" name="segundo_apellido" id="segundo_apellido">
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col">
                                <label for="nombre" class="col-form-label">Emails:</label>
                                <div class="input-group d-flex">
                                    <button class="btn btn-success btn-sm" type="button" onclick="validarPrioridadEmail()" data-bs-toggle="modal" data-bs-target="#ModalEmail"><i class="bi bi-plus"></i></button>
                                    <input type="text" id="email" name="email" class="form-control" placeholder="Agregar un email" required readonly>
                                </div>
                            </div>
                            <div class="col">
                                <label for="nombre" class="col-form-label">Telefonos:</label>
                                <div class="input-group">
                                    <button class="btn btn-success btn-sm" onclick="validarPrioridadTel()" id="btnTelefono" type="button" data-bs-toggle="modal" data-bs-target="#ModalTelefonos"><i class="bi bi-plus"></i></button>
                                    <input class="form-control" type="text" id="telUsuario" name="telUsuario" placeholder="Agregar telefonos" readonly required>
                                </div>
                            </div>

                            <div class="col" id="Divacudientes" hidden>
                                <label for="nombre" class="col-form-label">Acudientes:</label>
                                <div class="input-group">
                                    <button class="btn btn-success btn-sm" id="btnAcudientes" type="button" data-bs-toggle="modal" data-bs-target="#ModalAcudientes"><i class="bi bi-plus"></i></button>
                                    <input class="form-control" type="text" id="acudientess" name="acudientess" placeholder="Agregar Acudientes" readonly required>
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

<div class="modal fade" id="modal-confirma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div style="text-align:center;" class="modal-header">
                <h5 style="color:#98040a;font-size:20px;font-weight:bold;" class="modal-title" id="exampleModalLabel">
                    Eliminación de Registro</h5>

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
                <h5 style="color:#98040a;font-size:20px;font-weight:bold;" class="modal-title" id="exampleModalLabel">
                    Reinicio de Contraseña</h5>

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

<!-- tabla emails -->
<div id="ModalEmail" class="modal" tabindex="-1" style="background: rgb(0 0 0 / 43%);">
    <div class="modal-dialog  modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background: #0f9dba">
                <h5 class="modal-title" id="titulo_email"> Agregar Email <a href="#" title="Los emails ingresados antes de guardar el usuario por primera vez son guardados temporalmente"><i class="bi bi-question"></i></a></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
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
                                    <option value="<?php echo $valor['id_parametro_det']; ?>" id="<?php echo $valor['nombre'] ?>E"><?php echo $valor['nombre']; ?></option>
                                <?php } ?>
                            </select>
                            <button class="btn btn-outline-success" type="button" id="btn_insertar" onclick="validarPrioridadEmail()" title="Agregar Email"><i class="bi bi-plus"></i></button>
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
<!-- tabla telefonos -->
<div id="ModalTelefonos" class="modal" tabindex="-1" style="background: rgb(0 0 0 / 43%);">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background: #0f9dba">

                <h5 class="modal-title" id="titulo_email"> Agregar Telefono <a href="#" title="Los telefonos ingresados antes de guardar el usuario por primera vez son guardados temporalmente"><i class="bi bi-question"></i></a></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
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
                                <option value="<?php echo $valor['id_parametro_det']; ?>" id="<?php echo $valor['nombre']; ?>"><?php echo $valor['nombre']; ?></option>
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
                                    <option value="<?php echo $valor['id_parametro_det']; ?>" id="<?php echo $valor['nombre'] ?>"><?php echo $valor['nombre']; ?></option>
                                <?php } ?>
                            </select>
                            <button class="btn btn-outline-success" type="button" id="btn_insertarTelefono" onclick="validarPrioridadTel()" title="Agregar numero"><i class="bi bi-plus"></i></button>
                            <div class="invalid-feedback" id="errorPrioridadTel"></div>
                        </div>
                        <input hidden type="text" id="id_telefono" name="id_telefono">
                        <input hidden type="text" id="tpExistTel" name="tpExistTel">
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

<!-- eliminar emails y restaurar -->
<div class="modal fade" id="modal-confirma-email" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div style="text-align:center;" class="modal-header">
                <h5 style="color:#98040a;font-size:20px;font-weight:bold;" class="modal-title" id="exampleModalLabel">
                    Eliminación de Registro</h5>

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
                <h5 style="color:#98040a;font-size:20px;font-weight:bold;" class="modal-title" id="exampleModalLabel">
                    Eliminación de Registro</h5>

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
                    <button type="button" id="cerrarAcu" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="body">
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <label class="col-form-label">Tipo de Documento:</label>
                                <select class="form-select form-select" name="tipo_documentoAcu" id="tipo_documentoAcu" required>
                                    <option value="">Seleccione un Tipo</option>
                                    <option value="2">Cedula de Ciudadania</option>
                                    <option value="1">Tarjeta de Identidad</option>
                                    <option value="3">Cedula de Extranjeria</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="nombre" class="col-form-label">Numéro de Documento:</label>
                                <input type="text" class="form-control" name="numero_documentoAcu" id="numero_documentoAcu" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="nombre" class="col-form-label">Primer Nombre:</label>
                                <input type="text" class="form-control" name="primer_nombreAcu" id="primer_nombreAcu" maxlength="20" pattern="[A-Za-z]+" required>
                            </div>
                            <div class="col">
                                <label for="nombre" class="col-form-label">Segundo Nombre (Opcional):</label>
                                <input type="text" class="form-control" name="segundo_nombreAcu" id="segundo_nombreAcu" maxlength="20" pattern="[A-Za-z]+">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="nombre" class="col-form-label">Primer Apellido:</label>
                                <input type="text" class="form-control" name="primer_apellidoAcu" id="primer_apellidoAcu" maxlength="20" pattern="[A-Za-z]+" required>
                            </div>
                            <div class="col">
                                <label for="nombre" class="col-form-label">Segundo Apellido:</label>
                                <input type="text" class="form-control" name="segundo_apellidoAcu" id="segundo_apellidoAcu" required>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col">
                                <label for="nombre" class="col-form-label">Emails:</label>
                                <div class="input-group d-flex">
                                    <input type="text" id="emailAcu" name="emailAcu" class="form-control" placeholder="Agregar un email" required>
                                </div>
                            </div>
                            <div class="col">
                                <label for="nombre" class="col-form-label">Telefonos:</label>
                                <div class="input-group">
                                    <input class="form-control" type="number" id="telefonoAcu" name="telefonoAcu" placeholder="Agregar telefonos" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label id="direccion_usuario" for="direccion">Dirección:</label>
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
    $(window).resize(function() {
        tablaUsuarios.ajax.reload(null, false)
        contador = 0
    });

    function cargar_Excel(json) {
        json.forEach(usuario => {
            let _row = '';
            _row += `
                        <tr style="background-color:yellow;color:#070606;font-weight:300;text-align:center;font-family:Arial;font-size:12px;">
                        <td style="width:50px;">${usuario['#']}</td>
                        <td style="width:50px;">${usuario['Tipo Documento']}</td>
                        <td style="width:50px;">${usuario['Documento']}</td>
                        <td style="width:50px;">${usuario['Primer Nombre']}</td>
                        <td style="width:50px;">${usuario['Segundo Nombre']}</td>
                        
                        <td style="width:50px;">${usuario['Primer Apellido']}</td>
                        <td style="width:50px;">${usuario['Segundo Apellido']}</td>
                        <td style="width:50px;">${usuario['Direccion']}</td>
                        <td style="width:50px;">${usuario['Email']}</td>
                        <td style="width:50px;">${usuario['Telefono']}</td>
                        
                        </tr>`;
            $('#cuerpoExcel').append(_row)
        });
    }

    function fnExcel() {
        $('#cuerpoExcel').empty();
        let Toast = Swal.mixin({
            toast: true,
            position: 'top-start',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        $.ajax({
            url: '<?= base_url('usuarios/buscarUsuarioExcel') ?>',
            type: "POST",
            data: {
                estado: 'A'
            },
            dataType: "json",
        }).done(function(data) {
            data.forEach(usuario => {
                let _row = '';
                _row += `
                        <tr style="background-color:yellow;color:#070606;font-weight:300;text-align:center;font-family:Arial;font-size:12px;">
                        <td style="width:50px;">${usuario.id_usuario}</td>
                        <td style="width:50px;">${usuario.t_documento}</td>
                        <td style="width:50px;">${usuario.n_documento}</td>
                        <td style="width:50px;">${usuario.nombre_p}</td>
                        <td style="width:50px;">${usuario.nombre_s}</td>
                        <td style="width:50px;">${usuario.apellido_p}</td>
                        <td style="width:50px;">${usuario.apellido_s}</td>
                        <td style="width:50px;">${usuario.direccion}</td>
                        <td style="width:50px;">${usuario[0]?.email || 'null'}</td>
                        <td style="width:50px;">${usuario[1]?.numero || 'null'}</td>
                        
                        </tr>`;
                $('#tablaUsuariosExport').append(_row)
            });
        }).then(() => {
            // /* Create worksheet from HTML DOM TABLE */
            var wb = XLSX.utils.table_to_book(document.getElementById("tablaUsuariosExport"));
            /* Export to file (start a download) */
            XLSX.writeFile(wb, "REPORTE_USUARIOS.xlsx");

            Toast.fire({
                icon: 'success',
                title: 'Descargando!'
            })
        })

    }

    //Mostrar Ocultar Columnas
    $('a.toggle-vis').on('click', function(e) {
        e.preventDefault();
        // Get the column API object
        var column = tablaUsuarios.column($(this).attr('data-column'));
        // Toggle the visibility
        column.visible(!column.visible());
    });
    //Div ocualtar columnas de la tabla
    var botones = $(".ocultar a");
    botones.click(function() {
        if ($(this).attr('class').includes('active')) {
            $(this).removeClass('active');
        } else {
            $(this).addClass('active');
        }
    })

    $('#modal-confirma').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('onclick', 'EliminarRegistro(' + $(e.relatedTarget).data('href') + ')');
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
            tablaUsuarios.ajax.reload(null, false);
        })
    }

    $('#Resetear').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });

    $(document).ready(function() {
        $('#tablaUsuarios').on('init.dt', function() {
            $("#tablaUsuarios").removeClass('table-loader').show();
        });
        setTimeout(function() {
            $('#tablaUsuarios').DataTable();
        }, 3000);

    });

    var contador = 0
    var tablaUsuarios = $('#tablaUsuarios').DataTable({
        ajax: {
            url: '<?= base_url('usuarios/obtenerUsuarios') ?>',
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
                    return `<div class="btn-group text-center">
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

    $('#n_documento').on('keypress', function(e) {
        let charcode = e.which ? e.which : e.keyCode;
        if (charcode > 31 && (charcode < 48 || charcode > 57)) {
            e.preventDefault();
        }
    })
    $('#numero_documentoAcu').on('keypress', function(e) {
        let charcode = e.which ? e.which : e.keyCode;
        if (charcode > 31 && (charcode < 48 || charcode > 57)) {
            e.preventDefault();
        }
    })

    $("#formulario").validate({
        errorPlacement: function(error, element) {
            if (element[0].id == 'telUsuario') {
                return true;
            } else if (element[0].id == 'email') {
                return true;
            }else if (element[0].id == 'acudientess') {
                return true;
            }
            error.insertAfter(element);
            setTimeout(() => {
                error.fadeOut('slow');
            }, 1500);
            return true;
        },
        highlight: function(element) {
            $(element).addClass('is-invalid')
            setTimeout(() => {
                $(element).removeClass('is-invalid')
            }, 1500);
        },
        unhighlight: function(element) {
            $(element).removeClass('is-invalid')
        },
        submitHandler: function() {
            return false;
        },
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
                // soloLetras: true,
            },
            segundo_nombre: {
                // soloLetras: true,
            },
            primer_apellido: {
                required: true,
                // soloLetras: true,
            },
            telUsuario: {
                required: true,
            },
            Acudientess: {
                required: true,
            },
            email: {
                required: true,
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
            telUsuario: {
                required: "Este campo es requerido",
            },
            acudientess: {
                required: "Este campo es requerido",
            },
            email: {
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
    })

    $('#btnGuardar').on('click', function(e) {
        e.preventDefault();
        if ($('#formulario').valid()) {
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
                    title: 'Acción realizada con exito!'
                })
                insertarEmail(data);
                insertarTelefono(data);
                Acudientes(data);
                contador = 0
                tablaUsuarios.ajax.reload(null, false)
                tablaTemporal = [];
                tablaTemporalTelefonos = [];
                return
            })
        } else {
            setTimeout(() => {
                $('.error').fadeOut('slow');
            }, 1500);
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
        generarTablaEmail(tablaTemporal);
        validarPrioridadEmail()
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
        validarPrioridadEmail()
    }

    function seleccionaUsuario(id, tp) {
        if (tp == 2) {
            dataURL = "<?php echo base_url('/usuarios/buscarUsuario'); ?>" + "/" + id;
            $.ajax({
                type: "POST",
                url: dataURL,
                dataType: "json",
                success: function(rs) {
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
                    // $('#formulario').validate().resetForm();
                    $('#Divacudientes').attr('hidden', '');
                    $("#btn_Guardar").text('Actualizar');
                    $("#UsuarioModal").modal("show");
                    if (rs[0]['id_rol'] == '3') {
                        $('#Divacudientes').removeAttr('hidden', '')
                    }

                }
            })

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>/acudientes/buscarAcudiente/" + id,
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
                    let dato = $('#primer_nombreAcu').val()
                    let dato2 = $('#primer_apellidoAcu').val()
                    $('#acudientess').val(dato + ' ' + dato2)
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
                        $('#email').val(!principal ? tablaTemporal[0]?.email || '' : principal.email);
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
            $("#rol").val('');
            $('#tipo_documento').val('');
            $('#n_documento').val('');
            $('#primer_nombre').val('');
            $('#segundo_nombre').val('');
            $('#primer_apellido').val('');
            $('#segundo_apellido').val('');
            $('#contraseña').val('');
            $('#email_modal').val('');
            $('#prioridad').val('');
            $('#dir').val('');
            $('#dir2').val('');
            $('#dir3').val('');
            $('#dir4').val('');
            $('#confirmar_contraseña').val('');
            $('#contraseña').removeAttr('hidden', '');
            $('#password_label').removeAttr('hidden', '');
            $('#confirmar_contraseña').removeAttr('hidden', '');
            $('#password_label_c').removeAttr('hidden', '');
            $('#tituloModal').text('Añadir Usuario');
            $('#direccionX').val('');
            $("#btn_Guardar").text('Guardar');
            $('#Divacudientes').attr('hidden', '');
            $("#UsuarioModal").modal("show");

            $('#acudientess').val('');
            $('#acudientess').removeClass('is-invalid');
            $('#tipo_documentoAcu').val('');
            $('#numero_documentoAcu').val('');
            $('#primer_nombreAcu').val('');
            $('#segundo_nombreAcu').val('');
            $('#primer_apellidoAcu').val('');
            $('#segundo_apellidoAcu').val('');
            $('#direccionAcu').val('');
            $('#emailAcu').val('');
            $('#telefonoAcu').val('');
            $('#direccion1').val('');
            $('#direccion2').val('');
            $('#direccion3').val('');
            $('#direccion4').val('');

        }
    }

    function eliminarEmail(id, tp) {

        const fila = $('#util' + id);
        const emailEditar = fila.find('td').eq(0)
        const prioridadEditar = fila.find('td').eq(1)
        const idEmail = fila.find('td').eq(2)
        const tpExist = fila.find('td').eq(3)


        if (tp == 1) {
            tablaTemporal = tablaTemporal.filter(p => p.email !== emailEditar.text());
            generarTablaEmail(tablaTemporal);
        } else {
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
            tablaTemporalTelefonos = tablaTemporalTelefonos.filter(p => p.telefono !== telefonoEditar.text());
            generarTablaTel(tablaTemporalTelefonos);
        } else {
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
                tablaTemporalTelefonos = tablaTemporalTelefonos.filter(p => p.telefono !== telefonoEditar.text());
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
        const regex = /^\d{10,10}$/;

        let telefono = $('#telefono').val();
        let prioridad = $('#prioridad_tel').val();
        let tipo = $('#tipo').val();
        let id_telefono = $('#id_telefono').val();
        let tp = $('#tpExistTel').val();


        if (!regex.test(parseInt(telefono))) {
            $('#telefono').addClass('is-invalid');
            $('#errorTel').text('El telefono debe contener 10 digitos');
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
        generarTablaTel(tablaTemporalTelefonos);
        validarPrioridadTel()
    }

    function insertarTelefono(id) {
        tablaTemporalTelefonos.forEach(registro => {
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

    function ValidardireccionAcudiente() {
        var dir1 = document.getElementById('direccion1');
        var dir2 = document.getElementById('direccion2');
        var dir3 = document.getElementById('direccion3');
        var dir4 = document.getElementById('direccion4');

        var direccionReal = dir1.value + ' ' + dir2.value + ' ' + '#' + dir3.value + ' ' + '-' + ' ' + dir4.value;

        document.getElementById('direccionAcu').value = direccionReal;
    }

    $('#rol').on('change', function(e) {
        let rol = $('#rol').val();
        if (rol == '3') {
            $('#Divacudientes').removeAttr('hidden', '')
            $('#acudientess').val('');
            $('#tipo_documentoAcu').val('');
            $('#numero_documentoAcu').val('');
            $('#primer_nombreAcu').val('');
            $('#segundo_nombreAcu').val('');
            $('#primer_apellidoAcu').val('');
            $('#segundo_apellidoAcu').val('');
            $('#direccionAcu').val('');
            $('#emailAcu').val('');
            $('#telefonoAcu').val('');
            $('#direccion1').val('');
            $('#direccion2').val('');
            $('#direccion3').val('');
            $('#direccion4').val('');
        } else {
            $('#Divacudientes').attr('hidden', '')
        }
    })

    $("#formularioAcudiente").validate({
        errorPlacement: function(error, element) {
            if (element[0].id == 'telUsuarioAcu') {
                return true;
            } else if (element[0].id == 'emailAcu') {
                return true;
            }
            error.insertAfter(element);
            setTimeout(() => {
                $('.error').fadeOut('slow');
            }, 1500);
            return true;
        },
        highlight: function(element) {
            $(element).addClass('is-invalid')
            setTimeout(() => {
                $(element).removeClass('is-invalid')
            }, 1500);
        },
        unhighlight: function(element) {
            $(element).removeClass('is-invalid')
        },
        submitHandler: function() {
            alert('El formulario enviado');
            return false;
        },
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
            segundo_nombreAcu: {},
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

    function Acudientes(data) {
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

    $('#btnListo').on('click', function(e) {
        let dato = $('#primer_nombreAcu').val()
        let dato2 = $('#primer_apellidoAcu').val()
        $('#acudientess').val(dato + ' ' + dato2)
        if ($('#formularioAcudiente').valid()) {
            e.preventDefault();
            console.log('sirve');
            $('#ModalAcudientes').modal('hide');
            $('#acudientess').removeClass('is-invalid');
        }else{
            $('#acudientess').val('');
            $('#acudientess').addClass('is-invalid');
        }
    })

    $('#cerrarAcu').on('click', function(e) {
        $('#acudientess').val('');
            $('#tipo_documentoAcu').val('');
            $('#numero_documentoAcu').val('');
            $('#primer_nombreAcu').val('');
            $('#segundo_nombreAcu').val('');
            $('#primer_apellidoAcu').val('');
            $('#segundo_apellidoAcu').val('');
            $('#direccionAcu').val('');
            $('#emailAcu').val('');
            $('#telefonoAcu').val('');
            $('#direccion1').val('');
            $('#direccion2').val('');
            $('#direccion3').val('');
            $('#direccion4').val('');
    })

</script>