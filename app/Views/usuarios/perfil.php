<div class=" bg-white">
<section style="background-color: #eee;">
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
                <div class="card">
                    <div class="card-bodxcy p-0">
                        <ul class="list-group list-group-flush rounded-3">
                            <?php if ($datos['rol'] == 'Profesor') { ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fas fa-globe fa-lg text-warning"></i>
                                    <p class="mb-0">Matematicas 9-A (Esto solo aparece si es un profesor)</p>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
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
                    <h1 class="modal-title fs-5" id="tituloModal">Actualizar Contraseña</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <label id="password_label" for="password">Contraseña anterior</label>
                                <input id="contraseña" name="contraseña" type="password" class="form-control" required />
                            </div>
                            <div class="col">
                                <label id="password_label" for="password">Nueva Contraseña</label>
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
            location.reload();
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






    function EditarPerfil(id) {
        let newElement = `
            <form id="formularioPerfil">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Documento</p>
                            </div>
                             <div class="col-sm-9">
                            <div class="col">
                                    <label class="col-form-label">Tipo de Documento:</label>
                                    <select class="form-select form-select" name="tipo_documento" id="tipo_documento" >
                                        <option value="0">Seleccione un Tipo</option>
                                        <option value="2">Cedula de Ciudadania</option>
                                        <option value="1">Tarjeta de Identidad</option>
                                        <option value="3">Cedula de Extranjeria</option>
                                    </select>

                                    <div class="col">
                                    <label for="nombre" class="col-form-label">Numéro de Documento:</label>
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
                                    <label for="nombre" class="col-form-label">Primer Nombre:</label>
                                    <input type="text" class="form-control" name="primer_nombre" id="primer_nombre" maxlength="20" pattern="[A-Za-z]+" >
                                </div>  
                                <div class="col">
                                    <label for="nombre" class="col-form-label">Segundo Nombre (Opcional):</label>
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
                                    <label for="nombre" class="col-form-label">Primer Apellido:</label>
                                    <input type="text" class="form-control" name="primer_apellido" id="primer_apellido" maxlength="20" pattern="[A-Za-z]+" >
                                </div>
                                <div class="col">
                                    <label for="nombre" class="col-form-label">Segundo Apellido:</label>
                                    <input type="text" class="form-control" name="segundo_apellido" id="segundo_apellido" >
                                </div>
                            </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-1">
                            <div class="col">
                                <label for="nombre" class="col-form-label">Emails:</label>
                                <div class="input-group">
                                    <input type="text" id="email" name="email" class="form-control" placeholder="Agregar un email" aria-label="" aria-describedby="button-addon2" disabled>
                                    <button class="btn btn-outline-secondary" type="button" data-bs-toggle="modal" data-bs-target="#ModalEmail"><i class="bi bi-plus"></i></button>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="col">
                                <label for="nombre" class="col-form-label">Telefonos:</label>
                                <div class="input-group">
                                    <input type="text" id="telUsuario" name="telUsuario" class="form-control" placeholder="Agregar telefonos" aria-label="" aria-describedby="button-addon2" disabled>
                                    <button class="btn btn-outline-secondary" type="button" data-bs-toggle="modal" data-bs-target="#ModalTelefonos"><i class="bi bi-plus"></i></button>
                                </div>
                            </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Direccion</p>
                            </div>
                            <div class="col-sm-9">
                            <label id="direccion_usuario" for="direccion">Dirección:</label>
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
            location.reload();
            insertarEmail(<?php echo $datos['id_usuario']; ?>);
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

   
</script>