<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="ADSO-1 Grupo-3">

    <title>Horario Ideal</title>

    <link rel="stylesheet" href="<?php echo base_url() ?>bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/sidebare.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" /> -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/table.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>DataTable/datatables.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/global.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>boxicons/css/boxicons.min.css" >

    <script src="<?php echo base_url() ?>librerias/sweetalert2.js"></script>
    <script src="<?php echo base_url() ?>librerias/jquery-3.6.4.js"></script>
    <script src="<?php echo base_url() ?>librerias/jquery.validate.js"></script>
    <script src="<?php echo base_url() ?>librerias/chart.js"></script>
    <script src="<?php echo base_url() ?>bootstrap/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>DataTable/datatables.min.js"></script>
    <script src="<?php echo base_url() ?>sheetjs/xlsx.full.min.js"></script>
</head>

<div class="wrapper">
    <nav id="sidebar" class="active">
        <div class="sidebar-header">
            <h3 id="titulo">Horario Ideal</h3>
            <button type="button" id="sidebarCollapse1" class="btn">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>
        <ul class="list-unstyled" id="pruebanav">
            <div style="margin-top: 0.5em;">
                <a href="<?php echo base_url('usuarios/perfil/' . session('id')) ?>">
                    <p> <i class="bi bi-person-circle"></i>

                        <?php echo session('usuario') ?> </p>
                    <p class="rol">
                        <span style="padding-left: 30px;" class="text nav-text"><?php echo session('rol') ?></span>
                    </p>
                </a>
            </div>
            <hr style="background: #336d91;" class="sidebar-divider">
            <li>
                <a href="<?php echo base_url('inicio') ?>" title="Inicio">
                    <i class='bx bx-home-alt icon'> </i>
                    <span class="text nav-text">Inicio</span>
                </a>
            </li>
    </nav>
    <div class="app-sidebar" id="icon-sidebar">
        <a href="<?php echo base_url('inicio') ?>" class="app-sidebar-link active">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                <polyline points="9 22 9 12 15 12 15 22" />
            </svg>
        </a>
    </div>
    <div id="content">
        <nav class="navbar" style="background: #F6F5FF  !important;">
            <div class="d-flex">

                <button type="button" id="sidebarCollapse" class="btn">
                    <i class="bi bi-list"></i>
                </button>

                <div style="margin-top: 10px; color:#29588abd" class="border-0">
                    <h3 class="mb-0"><?php echo $titulo ?></h3>
                </div>
            </div>
            <div class="dropstart">
                <button class="profile-btn" id="Profile" style="color:#29588abd" data-bs-toggle="dropdown">
                    <i class="bi bi-person-circle"></i>
                    <span class="mr-1" style="color:#29588abd; margin-left: 3px"> <?php echo session('usuario') ?></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="<?php echo base_url('usuarios/perfil/' . session('id')) ?>">Perfil</a></li>
                    <li><a class="dropdown-item" href="<?php echo base_url('auth/logout') ?>">Cerrar Sesión</a></li>
                </ul>
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
            // console.log(resultado);

            let _row = '';
            resultado.forEach(element => {
                let _row = '';
                let _row_new = '';
                if (element.tipo == 'Carpeta') {
                    _row += `<hr style="background: #fafafa" class="sidebar-divider">`;
                } else {
                    _row += `<li>
                    <a href="<?php echo base_url() ?>${element.codigo}" title="${element.nombre}">
                    <i class='bx ${element.icono} icon'></i>
                    <span class="text nav-text">${element.nombre}</span>
                    </a>
                    </li>`;

                    _row_new += `
                    
                    <a href="<?php echo base_url() ?>${element.codigo}"  title="${element.nombre}"  class="app-sidebar-link">
                        <i class='bx ${element.icono} icon bx-sm'  title="${element.nombre}"></i>
                    </a>`;
                }

                $('#pruebanav').append(_row)
                $('#icon-sidebar').append(_row_new)


            });
            _row = `
            <hr style="background: #fafafa" class="sidebar-divider">
            <ul class="list-unstyled CTAs">
            <li>
            <a href="<?php echo base_url('auth/logout') ?>" title="Cerrar Sesión">
            <i class='bx bx-log-out icon'></i>
            <span class="text nav-text">Cerrar Sesión</span>
            </a>
            </li>
            </ul>`;
            _row_new = `
            <a href="<?php echo base_url('auth/logout') ?>"  title="Cerrar Sesión"  class="app-sidebar-link">
            <i class='bx bx-log-out icon bx-sm'></i>
            </a>`;

            $('#icon-sidebar').append(_row_new)
            $('#pruebanav').append(_row)

            $("#sidebarCollapse").on("click", function() {
                $("#sidebar").toggleClass("active");
                $("#icon-sidebar").toggleClass("active");
                $(this).toggleClass("active");
            });

            $("#sidebarCollapse1").on("click", function() {
                $("#sidebar").toggleClass("active");
                $("#icon-sidebar").toggleClass("active");
                $(this).toggleClass("active");
            });
        </script>