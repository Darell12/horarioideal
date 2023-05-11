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

    <script src="<?php echo base_url() ?>librerias/sweetalert2.js"></script>
    <script src="<?php echo base_url() ?>librerias/jquery-3.6.4.js"></script>
    <script src="<?php echo base_url() ?>librerias/jquery.validate.js"></script>
    <script src="<?php echo base_url() ?>librerias/chart.js"></script>
    <script src="<?php echo base_url() ?>bootstrap/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>DataTable/datatables.min.js"></script>

    <!-- // *TODO DESCARGAR BOXICON -->
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/sidebar.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/table.css">

</head>

<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Horario Ideal</h3>
        </div>

        <ul class="list-unstyled">
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
            <hr style="background: #fafafa" class="sidebar-divider">
            </li>
            <li>
                <a href="<?php echo base_url('ver_roles') ?>" title="Roles">
                    <i class='bx bx-wrench icon'></i>
                    <span class="text fs-6 nav-text">Roles</span>
                </a>
            </li>
            <li>
                <a href="<?php echo base_url('ver_permisos') ?>" title="Permisos">
                    <i class='bx bx-slider-alt icon'></i>
                    <span class="text fs-6 nav-text">Permisos</span>
                </a>
            </li>
            <li>
                <a href="<?php echo base_url('ver_acciones') ?>" title="Acciones">
                    <i class='bx bx-cog icon'></i>
                    <span class="text fs-6 nav-text">Acciones</span>
                </a>
            </li>
            <li>
                <a href="<?php echo base_url('ver_franjas') ?>" title="Acciones">
                    <i class='bx bx-time-five'></i>
                    <span class="text fs-6 nav-text">Franjas horarias</span>
                </a>
            </li>
            <hr style="background: #fafafa" class="sidebar-divider">
            <li>
                <a href="<?php echo base_url('usuarios') ?>" title="Usuarios">
                    <i class='bx bx-user icon'></i>
                    <span class="text fs-6 nav-text">Usuarios</span>
                </a>
            </li>
            <li>
                <a href="<?php echo base_url('estudiantes') ?>" title="Estudiantes">
                    <i class='bx bxs-graduation icon'></i>
                    <span class="text nav-text">Estudiantes</span>
                </a>
            </li>
            <li>
                <a href="<?php echo base_url('profesores') ?>" title="Profesores">
                    <i class='bx bx-id-card icon'></i>
                    <span class="text nav-text">Profesores</span>
                </a>
            </li>
            <hr style="background: #fafafa" class="sidebar-divider">
            <li>
                <a href="<?php echo base_url('ver_aulas') ?>" title="Aulas">
                    <i class='bx bx-chalkboard icon'></i>
                    <span class="text nav-text">Aulas</span>
                </a>
            </li>
            <li>
                <a href="<?php echo base_url('ver_grados') ?>" title="Aulas">
                    <i class='bx bx-hash'></i>
                    <span class="text nav-text">grados</span>
                </a>
            </li>
            <li>
                <a href="<?php echo base_url('asignaturas') ?>" title="Asignaturas">
                    <i class='bx bx-math'></i>
                    <span class="text nav-text">Asignaturas</span>
                </a>
            </li>
            <li>
                <a href="<?php echo base_url('ver_horarios') ?>" title="Horarios">
                    <i class='bx bx-calendar icon'></i>
                    <span class="text nav-text">Horarios</span>
                </a>
            </li>
        </ul>
        <hr style="background: #fafafa" class="sidebar-divider">
        <ul class="list-unstyled CTAs">
            <li>
                <a href="<?php echo base_url('auth/logout') ?>">
                    <i class='bx bx-log-out icon'></i>
                    <span class="text nav-text">Logout</span>
                </a>
            </li>
        </ul>

    </nav>

    <!-- Page Content  -->
    <div id="content">

        <nav class="navbar navbar-expand-lg navbar-white bg-white">
            <div class="d-flex">

                <button type="button" id="sidebarCollapse" class="btn">
                <i class='bx bx-chevron-left bx-sm'></i>
                </button>
                <div class="border-0">
                    <h3 class="mb-0"><?php echo $titulo ?></h3>
                </div>
                <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Page</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Page</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Page</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Page</a>
                        </li>
                    </ul>
                </div> -->
            </div>
        </nav>


        <!-- #48a4cd -->
        <!-- #48a4cd -->

        <script>
            // const body = document.querySelector('body'),
            //     sidebar = body.querySelector('nav'),
            //     toggle = body.querySelector(".toggle");


            // toggle.addEventListener("click", () => {
            //     sidebar.classList.toggle("close");
            // })

            // $(document).ready(function() {
            $("#sidebarCollapse").on("click", function() {
                $("#sidebar").toggleClass("active");
                $(this).toggleClass("active");
            });
            // });
        </script>