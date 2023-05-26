<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, heigth=device-heigth">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Horario Ideal</title>

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css"> -->
    <!-- <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script> -->
    <!-- <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script> -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="<?php echo base_url() ?>bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>bootstrap/bootstrap.min.css">
    <link href="<?php echo base_url() ?>DataTable/datatables.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/pruebas.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/globale.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />



    <script src="<?php echo base_url() ?>librerias/sweetalert2.js"></script>
    <script src="<?php echo base_url() ?>librerias/jquery-3.6.4.js"></script>
    <script src="<?php echo base_url() ?>librerias/jquery.validate.js"></script>
    <script src="<?php echo base_url() ?>librerias/chart.js"></script>
    <script src="<?php echo base_url() ?>bootstrap/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>DataTable/datatables.min.js"></script>
    <script src="https://cdn.sheetjs.com/xlsx-0.19.3/package/dist/xlsx.full.min.js"></script>

    <!-- // *TODO DESCARGAR BOXICON -->
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/sideba.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/table.css">

</head>

<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Horario Ideal</h3>
        </div>
        <!-- <button onclick="enviarwp()">
            boton
        </button> -->
        <ul class="list-unstyled" id="pruebanav">
            <div style="margin-top: 0.5em;">
                <a href="<?php echo base_url('usuarios/perfil/' . session('id')) ?>">
                    <p><i class="bx bxs-user-circle icon bx-sm"></i>
                        <?php echo session('usuario') ?> </p>
                    <p class="rol">
                        <span style="padding-left: 30px;" class="text nav-text"><?php echo session('rol') ?></span>
                    </p>
                </a>
            </div>
            <hr style="background: #fafafa" class="sidebar-divider">
            <li>
                <a href="<?php echo base_url('inicio') ?>" title="Inicio">
                    <i class='bx bx-home-alt icon'> </i>
                    <span class="text nav-text">Inicio</span>
                </a>
            </li>
    </nav>
    <div id="content">

        <nav class="navbar navbar-expand-lg" style="background: #F6F5FF  !important;">
            <div class="d-flex">

                <button type="button" id="sidebarCollapse" class="btn">
                    <i class='bx bx-chevron-right toggle bx-sm'></i>
                </button>
                <div style="margin-top: 10px; color:#29588abd" class="border-0">
                    <h3 class="mb-0"><?php echo $titulo ?></h3>
                </div>
            </div>
        </nav>

        <script>
            let varia = []
            <?php foreach ($Modulos as $modulo) { ?>
                varia.push({
                    nombre: '<?php echo $modulo['nombre'] ?>',
                    orden: '<?php echo $modulo['orden'] ?>',
                    orden_padre: '<?php echo $modulo['orden_padre'] ?>',
                    padre_id: '<?php echo $modulo['padre_id'] ?>',
                    tipo: '<?php echo $modulo['tipo'] ?>',
                    codigo: '<?php echo $modulo['codigo'] ?>',
                    icono: '<?php echo $modulo['icono'] ?>',
                })
            <?php } ?>

            function ordenarArray(arr) {
                // Filtrar elementos de tipo "Carpeta"
                const carpetas = arr.filter(item => item.tipo === "Carpeta");

                // Ordenar las carpetas por el valor de "orden_padre"
                carpetas.sort((a, b) => a.orden_padre - b.orden_padre);

                // Crear un nuevo array para almacenar el resultado ordenado
                const resultado = [];

                // Recorrer las carpetas y sus respectivos módulos
                carpetas.forEach(carpeta => {
                    resultado.push(carpeta);

                    // Filtrar los módulos con el mismo "padre_id" de la carpeta actual
                    const modulos = arr.filter(item => item.tipo === "Modulo" && item.padre_id === carpeta.padre_id);

                    // Ordenar los módulos por el valor de "orden"
                    modulos.sort((a, b) => a.orden - b.orden);

                    // Agregar los módulos al resultado
                    resultado.push(...modulos);
                });

                // Filtrar los módulos que no están dentro de ninguna carpeta
                const modulosSinCarpeta = arr.filter(item => item.tipo === "Modulo" && !carpetas.some(carpeta => carpeta.padre_id === item.padre_id));
                resultado.push(...modulosSinCarpeta);

                return resultado;
            }

            const resultado = ordenarArray(varia);
            console.log(resultado);

            let _row = '';
            resultado.forEach(element => {
                let _row = '';
                if (element.tipo == 'Carpeta') {
                    _row += `<hr style="background: #fafafa" class="sidebar-divider">`;
                } else {
                    _row += `<li>
                    <a href="<?php echo base_url() ?>${element.codigo}" title="${element.nombre}">
                    <i class='bx ${element.icono} icon'></i>
                    <span class="text nav-text">${element.nombre}</span>
                    </a>
                    </li>`;
                }

                $('#pruebanav').append(_row)
            });
            _row = `
            <hr style="background: #fafafa" class="sidebar-divider">
            <ul class="list-unstyled CTAs">
            <li>
            <a href="<?php echo base_url('auth/logout') ?>">
            <i class='bx bx-log-out icon'></i>
            <span class="text nav-text">Logout</span>
            </a>
            </li>
            </ul>`;
            $('#pruebanav').append(_row)

            $("#sidebarCollapse").on("click", function() {
                $("#sidebar").toggleClass("active");
                $(this).toggleClass("active");
            });
        </script>