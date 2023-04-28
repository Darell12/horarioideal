<div class="container bg-white mt-5 shadow rounded-4">
    <div>
        <h1 class="titulo_Vista text-center">
            <h1 class="titulo_Vista text-center"><?php echo $titulo ?></h1>
        </h1>
    </div>
    <div style="height: 30px;"></div>
    <div>
        <button type="button" onclick="seleccionaGrado(<?php echo 1 . ',' . 1 ?>);" class="btn btn-outline-success " data-bs-toggle="modal" data-bs-target="#GradoModal"><i class="bi bi-plus-circle-fill"></i> Agregar</button>
        <a href="<?php echo base_url('/grados/eliminados'); ?>"><button type="button" class="btn btn-outline-secondary"><i class="bi bi-file-x"></i> Eliminados</button></a>
        <a href="<?php echo base_url('/principal'); ?>"><button class="btn btn-outline-primary"><i class="bi bi-arrow-return-left"></i> Regresar</button></a>
    </div>

    <br>
    <div class="table-responsive" style="overflow:scroll-vertical;overflow-y: scroll !important; height: 600px;">
        <table class="table table-bordered table-sm table-hover" id="tablePaises" width="100%" cellspacing="0">
            <thead class="table-dark">
                <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Asignaturas</th>
                    <th class="text-center">Estado</th>
                    <th class="text-center" colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody style="font-family:Arial;font-size:12px;" class="table-group-divider">
                <?php foreach ($datos as $valor) { ?>
                    <tr>
                        <td class="text-center"><?php echo $valor['id_grado']; ?></td>
                        <td class="text-center"><?php echo $valor['alias']; ?></td>
            
                        <?php if ($valor['id_grado']) { ?>
                            <td class="text-center">
                                    <button class="btn btn-outline-success" onclick="Asignaturas(<?php echo $valor['id_grado'] . ',' ?> '<?php echo $valor['estado'] ?>');">
                                        <i class="bi bi-journal-bookmark"></i>
                                    </button>
                                </td>
                            <?php } else { ?>
                                <td class="text-center">
                                <button onclick="Asignaturas(<?php echo $valor['id_grado'] . ',' ?> '<?php echo $valor['estado'] ?>');" id="asignarGrado<?php echo $valor['id_grado']; ?>" class="btn btn-outline-warning" value="" id="flexCheckDefault">
                                        <i class="bi bi-journal-bookmark"></i>
                                    </button>
                                    <span class="text-success">Sin Asignaturas</span>
                                </td>
                            <?php } ?>
                            
                            <td class="text-center">
                        
                            <?php echo $valor['estado'] == 'A' ?  '<span class="text-success"> Activo </span>' : 'Inactivo'; ?>
                        </td>
                       
                        
                        <th class="grid grid text-center" colspan="2">

                            <button class="btn btn-outline-primary" onclick="seleccionaGrado(<?php echo $valor['id_grado'] . ',' . 2 ?>);" data-bs-toggle="modal" data-bs-target="#GradoModal">

                                <i class="bi bi-pencil"></i>

                            </button>

                            <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modal-confirma" data-href="<?php echo base_url('/estado_grados') . '/' . $valor['id_grado'] . '/' . 'E'; ?>"><i class="bi bi-trash3"></i></button>
                        </th>

                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>
    <!-- Modal -->
    <form method="POST" action="<?php echo base_url('/grados_insertar'); ?>" autocomplete="off" class="needs-validation" id="formulario" novalidate>
        <div class="modal fade" id="GradoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="tituloModal">Añadir Grado</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <div class="row">

                                <div class="col">
                                    <label for="nombre" class="col-form-label">Nombre:</label>
                                    <input type="text" class="form-control" name="nombre_grado" id="nombre_grado" required>
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
    <!-- Modal Elimina -->
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

<!-- Modal Asignaturas  -->

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
                                    <th class="text-center">Codigo</th>
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

<script>
    $('#modal-confirma').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });

    function seleccionaGrado(id, tp) {
        if (tp == 2) {
            dataURL = "<?php echo base_url('/grados/buscarGrado'); ?>" + "/" + id;
            $.ajax({
                type: "POST",
                url: dataURL,
                dataType: "json",
                success: function(rs) {
                    console.log(rs)
                    $("#tp").val(2);
                    $("#id").val(id)
                    $('#nombre_grado').val(rs[0]['alias']);
                    $("#btn_Guardar").text('Actualizar');
                    $("#GradoModal").modal("show");
                }
            })
        } else {
            $("#tp").val(1);
            $('#nombre_grado').val('');
            $("#btn_Guardar").text('Guardar');
            $("#GradoModal").modal("show");
        }
    }
    $('.close').click(function() {
        $("#modal-confirma").modal("hide");
    });


function Asignaturas(id, estado) {
dataURL = "<?php echo base_url('/grados/obtenerAsignaturasS'); ?>" + "/" + id

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
        <th class="text-center"> ${res[i].id_asignatura}</th>
        <th class="text-center"> ${res[i].nombre}</th>
        <th class="text-center"> ${res[i].codigo}</th>
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
        <th class="text-center"> ${res[i].id_asignatura}</th>
        <th class="text-center"> ${res[i].nombre}</th>
        <th class="text-center"> ${res[i].codigo}</th>

            <th class="text-center text-success"> ${res[i].estado == 'A' ? 'Activo' : 'Inactivo'}</th>
            <th class="text-center">
                <div class="btn-group" role="group" aria-label="Basic mixed styles example">

                    <button class="btn btn-outline-danger" data-bs-toggle="modal" hidden-bs-modal(#modal) data-bs-target="#modal-confirma-salario" onclick="almacenarId(${res[i].id_asignatura},${res[i].id_asignatura}, 'E')"><i class="bi bi-trash3"></i></button>
                </div>
            </th>
        </tr>`
                }

            } else {
                contenido = '<tr><th class="text-center h1" colspan="5">SIN ASIGNATURAS ASIGNADAS</th></tr>'
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
    dataURL = "<?php echo base_url('/grados/obtenerAsignaturas'); ?>" + "/" + id;
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