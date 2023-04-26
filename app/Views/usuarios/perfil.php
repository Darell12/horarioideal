<section style="background-color: #eee;">
    <div class="container py-5">

        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <i class="bx bxs-user-circle"></i>

                        <h5 class="my-3"><?php echo $datos['nombre_corto']?></h5>
                        <p class="text-muted mb-1"><?php echo $datos['rol']?></p>
                        <p class="text-muted mb-1"><?php echo $datos['direccion']?></p>
                        <?php if($datos['rol'] == 'Estudiante') {?>
                            <p class="text-muted mb-4"><?php echo $datos['grado']?></p>
                            <?php }?>
                        <div class="d-flex justify-content-center mb-2">
                            <button type="button" class="btn btn-outline-info" data-bs-target="#UsuarioModal" title="Actualizar Contraseña" data-bs-toggle="modal" >Cambiar <br> Contraseña</button>
                            <button onClick="EditarPerfil(<?php echo $datos['id_usuario']?>)" type="button" class="btn btn-outline-success ms-1">Editar Perfil</button>
                        </div>
                    </div>
                </div>
                <div class="card mb-4 mb-lg-0">
                    <div class="card-bodxcy p-0">
                        <ul class="list-group list-group-flush rounded-3">
                            <?php if ($datos['rol'] == 'Profesor') {?>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <i class="fas fa-globe fa-lg text-warning"></i>
                                <p class="mb-0">Matematicas 9-A (Esto solo aparece si es un profesor)</p>
                            </li>
                            <?php }?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body" id="EditarPerfil">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Documento</p>
                            </div>
                            <div class="col-sm-9">
                                <p id="documentos" class="text-muted mb-0"><?php echo $datos['t_documento'] . ': ' . $datos['n_documento']?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Nombres</p>
                            </div>
                            <div class="col-sm-9">
                                <p id="nombres" class="text-muted mb-0"><?php echo $datos['nombre_p'] . ' ' . $datos['nombre_s']?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Apellidos</p>
                            </div>
                            <div class="col-sm-9">
                                <p id="apellidos" class="text-muted mb-0"><?php echo $datos['apellido_p'] . ' ' . $datos['apellido_s']?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Email Principal</p>
                            </div>
                            <div class="col-sm-9">
                                <p id="email" class="text-muted mb-0"><?php echo $datos['email']?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Telefono Principal</p>
                            </div>
                            <div class="col-sm-9">
                                <p id="telefono" class="text-muted mb-0">(097) 234-5678</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Direccion</p>
                            </div>
                            <div class="col-sm-9">
                                <p id="direccion" class="text-muted mb-0"><?php echo $datos['direccion']?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-4 mb-md-0">
                            <div class="card-body">
                                <p class="mb-4"><span class="text-primary font-italic me-1">Emails</span> Relacionados
                            </p>
                                <p class="mb-3" style="font-size: .97rem;">Aquí va un email</p>
                                <p class="mb-3" style="font-size: .97rem;">Aquí va un email</p>
                                <p class="mb-3" style="font-size: .97rem;">Aquí va un email</p>
                                <p class="mb-3" style="font-size: .97rem;">Aquí va un email</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-4 mb-md-0">
                            <div class="card-body">
                                <p class="mb-4"><span class="text-primary font-italic me-1">Telefonos</span> Relacionados
                                </p>
                                <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                                <div class="progress rounded" style="height: 5px;">
                                    <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                                <div class="progress rounded" style="height: 5px;">
                                    <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                                <div class="progress rounded" style="height: 5px;">
                                    <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                                <div class="progress rounded" style="height: 5px;">
                                    <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                                <div class="progress rounded mb-2" style="height: 5px;">
                                    <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<form method="POST" action="<?php echo base_url('/usuarios/actualizarContraseña'); ?>" autocomplete="off" class="needs-validation" id="formulario" novalidate id="agregrar_usuario">
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
                                    <input id="confirmar_contraseña" name="confirmar_contraseña" type="password" class="form-control" required />
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

    <script>
        
        function EditarPerfil(id){
            let newElement = `
            <form onChange="Direccion()">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Documento</p>
                            </div>
                            <div class="col-sm-9">
                            <div class="col">
                                    <label class="col-form-label">Tipo de Documento:</label>
                                    <select class="form-select form-select" name="tipo_documento" id="tipo_documento" required>
                                        <option value="0">Seleccione un Tipo</option>
                                        <option value="2">Cedula de Ciudadania</option>
                                        <option value="1">Tarjeta de Identidad</option>
                                        <option value="3">Cedula de Extranjeria</option>
                                    </select>

                                    <div class="col">
                                    <label for="nombre" class="col-form-label">Numéro de Documento:</label>
                                    <input type="number" class="form-control" name="n_documento" id="n_documento" required>
                                </div>

                                <div class="col">
                                    <label for="nombre" class="col-form-label">Corto</label>
                                    <input type="text" class="form-control" name="nombre_corto" id="nombre_corto" required>
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
                                    <input type="text" class="form-control" name="primer_nombre" id="primer_nombre" maxlength="20" pattern="[A-Za-z]+" required>
                                </div>  
                                <div class="col">
                                    <label for="nombre" class="col-form-label">Segundo Nombre:</label>
                                    <input type="text" class="form-control" name="segundo_nombre" id="segundo_nombre" maxlength="20" pattern="[A-Za-z]+" required>
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
                                    <input type="text" class="form-control" name="primer_apellido" id="primer_apellido" maxlength="20" pattern="[A-Za-z]+" required>
                                </div>
                                <div class="col">
                                    <label for="nombre" class="col-form-label">Segundo Apellido:</label>
                                    <input type="text" class="form-control" name="segundo_apellido" id="segundo_apellido" required>
                                </div>
                            </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Email Principal</p>
                            </div>
                            <div class="col-sm-9">
                                <p id="email" class="text-muted mb-0"><?php echo $datos['email']?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Telefono Principal</p>
                            </div>
                            <div class="col-sm-9">
                                <p id="telefono" class="text-muted mb-0">(097) 234-5678</p>
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
                                    <select name="dir" id="dir"  placeholder="Ej: 23" class="form-select form-select">
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
                            <button type="button" id="guardarCambios" onClick="insertarCambios()" class="btn btn-outline-primary close" data-dismiss="modal">Actualizar</button>

                            <button type="button" id="guardarCambios" class="btn btn-outline-primary close" data-dismiss="modal">Actualizar</button>

                        </div>
                        </form>
            `
            $('#EditarPerfil').replaceWith(newElement);
            // Código de tu función aquí
            console.log('La función se ha activado!' + id);
            var data = {
                nombre_corto: $('#nombre_corto').val(),
                id_rol: <?php echo $datos['id_rol'];?>,
                tipo_documento: $('#tipo_documento').val(),
                id: <?php echo $datos['id_usuario'];?>,
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
        function insertarCambios(id) {
            console.log('Cambios');
            var data = {
                nombre_corto: $('#nombre_corto').val(),
                id_rol: <?php echo $datos['id_rol'];?>,
                tipo_documento: $('#tipo_documento').val(),
                id: <?php echo $datos['id_usuario'];?>,
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
            });
        }

        function Direccion(){
            var dir1 = document.getElementById('dir');
            var dir2 = document.getElementById('dir2');
            var dir3 = document.getElementById('dir3');
            var dir4 = document.getElementById('dir4');
            var direccionReal = dir1.value + ' ' + dir2.value + ' ' + '#' + dir3.value + ' '+ '-' + ' ' + dir4.value;

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
                    $('#nombre_corto').val(rs[0]['nombre_corto']);
                    $('#primer_nombre').val(rs[0]['nombre_p']);
                    $('#segundo_nombre').val(rs[0]['nombre_s']);
                    $('#primer_apellido').val(rs[0]['apellido_p']);
                    $('#segundo_apellido').val(rs[0]['apellido_s']);
                    $('#direccionX').val(rs[0]['direccion']);
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
            $('#direccionX').val('');
        }
    }

    </script>