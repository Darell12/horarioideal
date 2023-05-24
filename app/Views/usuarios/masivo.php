<div class="container bg-white rounded rounded-3">
    <div class="d-flex justify-content-between flex-wrap">
        <div class="border-0">
            <label for="formFile" class="form-label">Subir archivo</label>
            <input class="form-control " id="uploadFile" name="uploadFile" type="file" onchange="handleFile(this.files)" accept=".xlsx, .xls, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" />
        </div>

        <div>
            <button type="button" id="procesar" onclick="procesar()" class="btn btn-outline-success"><i class="bi bi-plus-circle-fill"></i> Procesar</button>
            <a href="<?php echo base_url('/ver_usuarios'); ?>"><button class="btn btn-outline-primary"><i class="bi bi-arrow-return-left"></i> Regresar</button></a>
        </div>


    </div>
    <br>
    <!-- <div class="d-flex align-items-center flex-wrap ocultar">
        <b class="fs-6 text-black"> Ocultar Columnas:</b> <a class="toggle-vis btn" data-column="1">Tipo Documento</a> - <a class="toggle-vis btn" data-column="2">Documento</a> - <a class="toggle-vis btn" data-column="3">Nombres</a> - <a class="toggle-vis btn" data-column="4">Apellidos</a> - <a class="toggle-vis btn" data-column="5">Rol</a>
    </div> -->
    <div class="table-responsive">
        <table id="tablaUsuariosExport" class="table align-items-center table-flush">
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
                    <th class="text-center" style="width: 1% !important;" scope="col">Estado</th>
                </tr>
            </thead>
            <tbody style="font-family:Arial;font-size:12px;" class="table-group-divider" id="cuerpoExcel">


            </tbody>
        </table>
    </div>
</div>

<script>
    $('#uploadFile').empty();
    let json

    function handleFile(files) {
        // Obtener el archivo seleccionado
        const file = files[0];

        // Crear un objeto FileReader
        const reader = new FileReader();

        // Configurar el evento onload
        reader.onload = (event) => {
            // Obtener los datos del archivo
            const data = event.target.result;

            // Leer el archivo de Excel
            const workbook = XLSX.read(data, {
                type: 'binary'
            });

            // Obtener la primera hoja de trabajo
            const worksheet = workbook.Sheets[workbook.SheetNames[0]];

            // Convertir la hoja de trabajo en un objeto JSON
            json = XLSX.utils.sheet_to_json(worksheet);

            // Pasar los datos a otra vista
            excelUpload = JSON.stringify(json)

            console.log(json);

            cargar_Excel(json)
        };

        // Leer el archivo como una cadena binaria
        reader.readAsBinaryString(file);
    }
    let contador = 0

    function cargar_Excel(json) {
        json.forEach(usuario => {
            contador++
            let _row = '';
            _row += `
                        <tr class="text-center" id="util1${usuario['Documento']}">
                            <td style="width:50px;">${usuario['#']}</td>
                            <td style="width:50px;">${usuario['Tipo Documento']}</td>
                            <td style="width:50px;">${usuario['Documento']}</td>
                            <td style="width:50px;">${usuario['Primer Nombre']}</td>
                            <td style="width:50px;">${usuario['Segundo Nombre'] ? usuario['Segundo Nombre'] : ''}</td>
                            <td style="width:50px;">${usuario['Primer Apellido']}</td>
                            <td style="width:50px;">${usuario['Segundo Apellido']}</td>
                            <td style="width:50px;">${usuario['Direccion']}</td>
                            <td style="width:50px;">${usuario['Email']}</td>
                            <td style="width:50px;">${usuario['Telefono']}</td>
                            <td style="width:50px;">Sin procesar</td>
                            </tr>`;
            $('#cuerpoExcel').append(_row)
        });
    }

    let tablaTemporalTelefonos = [{}]
    let tablaTemporal = [{}]

    function procesar() {

        if (json == undefined) {
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


            return Toast.fire({
                icon: 'error',
                text: 'No hay datos que procesar'
            })
        }

        let tipo = {
            'Tarjeta de Identidad': '1',
            'Cedula de Ciudadania': '2',
            'Cedula de Extranjeria': '3',
            'Pasaporte': '4',
            'Permiso de Permanencia': '5',
        }
        let fila

        let tabla = $('#tablaUsuariosExport');
        let columna = tabla.find('td:nth-child(11)')

        columna.html(`<div class="nb-spinner"></div>`);

        json.forEach(usuario => {
            try {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('/usuarios/insertar'); ?>",
                    data: {
                        tp: 1,
                        id_rol: 3,
                        tipo_documento: tipo[usuario['Tipo Documento']],
                        n_documento: usuario?.Documento || '',
                        primer_nombre: usuario['Primer Nombre'],
                        segundo_nombre: usuario['Segundo Nombre'] ? usuario['Segundo Nombre'] : '',
                        primer_apellido: usuario['Primer Apellido'],
                        segundo_apellido: usuario['Segundo Apellido'],
                        direccionX: usuario['Direccion'],
                        contraseña: usuario['Documento'],

                    },
                    dataType: "json",
                }).done(function(response) {
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

                    // Toast.fire({
                    // Obtén una referencia a la fila específica
                    fila = $('#util1' + usuario['Documento']);

                    // Obtén la última celda de la fila
                    var ultimaCelda = fila.find('td:last');

                    // Manipula el contenido de la última celda
                    ultimaCelda.html('<span class="text-success" title="Exito"><i width="20" height="20" class="bi bi-check2-circle"></i></span>');


                    console.log(usuario['Documento']);
                    insertarEmail(response, usuario['Email']);
                    insertarTelefono(response, usuario['Telefono']);

                }).fail(function(error) {
                    console.log(error)
                    fila = $('#util1' + usuario['Documento']);
                    console.log('Fallo');

                    // Obtén la última celda de la fila
                    var ultimaCelda = fila.find('td:last');

                    // Manipula el contenido de la última celda
                    ultimaCelda.html('<span class="text-danger" title="Error"><i width="20" height="20" class="bi bi-x"></i></span>');
                })
                $('#procesar').attr('disabled', '');
            } catch (error) {
                console.log(error)
            }
        });
    }

    function insertarTelefono(id, numero) {
        console.log(tablaTemporalTelefonos);
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('/telefono/insertar'); ?>",
            data: {
                tp: 1,
                numero: numero,
                prioridad: 6,
                tipo: 23,
                id_usuario: id
            },
            dataType: "json",
        }).done(function(data) {

        })
    }

    function insertarEmail(id, email) {
        console.log(email);
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('/email/insertar'); ?>",
            data: {
                tp: 1,
                email: email,
                prioridad: 6,
                id_usuario: id
            },
            dataType: "json",
        }).done(function(data) {})
    }
</script>