<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Horario Ideal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Custom fonts for this template-->
    <!-- <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <!-- <link href="<?php echo base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet"> -->
    <link href="<?php echo base_url() ?>assets/css/prueba.css" rel="stylesheet">

    <!-- <script src="<?php echo base_url('/bootstrap/bootstrap.bundle.min.js'); ?>"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <link href="https://unpkg.com/tabulator-tables@5.4.4/dist/css/tabulator.min.css" rel="stylesheet">

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>




</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <body id="body-pd">
            <nav class="sidebar close">
                <header>
                    <a class="nav-link" href="<?php echo base_url('usuarios/perfil/' . session('id')) ?>">
                        <div class="image-text">
                            <span class="image" href="">
                                <i class="bx bxs-user-circle icon bx-sm"></i>
                            </span>

                            <div class="text logo-text">
                                <?php echo session('usuario') ?>
                                <span style="font-size: 14px;" class="text nav-text"><?php echo session('rol') ?></span>
                            </div>
                        </div>
                    </a>

                    <i class='bx bx-chevron-right toggle'></i>
                </header>

                <div class="menu-bar">
                    <div class="menu">
                        <ul style="padding-left: 0;" class="menu-links">
                            <li style="padding-left: 0;" class="nav-link">
                                <a href="<?php echo base_url('inicio') ?>">
                                    <i class='bx bx-home-alt icon'> </i>
                                    <span class="text nav-text">Inicio</span>
                                </a>
                            </li>
                            <hr style="background: #418ab7;" class="sidebar-divider">
                            <li class="nav-link">
                                <a href="<?php echo base_url('ver_roles') ?>">
                                    <i class='bx bx-wrench icon'></i>
                                    <span class="text fs-6 nav-text">Roles</span>
                                </a>
                            </li>
                            <li class="nav-link">
                                <a href="<?php echo base_url('ver_permisos') ?>">
                                    <i class='bx bx-slider-alt icon'></i>
                                    <span class="text fs-6 nav-text">Permisos</span>
                                </a>
                            </li>
                            <li class="nav-link">
                                <a href="<?php echo base_url('ver_acciones') ?>">
                                    <i class='bx bx-cog icon'></i>
                                    <span class="text fs-6 nav-text">Acciones</span>
                                </a>
                            </li>
                            <hr style="background: #418ab7;" class="sidebar-divider">
                            <li class="nav-link">
                                <a href="<?php echo base_url('usuarios') ?>">
                                    <i class='bx bx-user icon'></i>
                                    <span class="text fs-6 nav-text">Usuarios</span>
                                </a>
                            </li>
                            <li class="nav-link">
                                <a href="<?php echo base_url('estudiantes') ?>">
                                    <i class='bx bxs-graduation icon'></i>
                                    <span class="text nav-text">Estudiantes</span>
                                </a>
                            </li>
                            <li class="nav-link">
                                <a href="#">
                                    <i class='bx bx-id-card icon'></i>
                                    <span class="text nav-text">Profesores</span>
                                </a>
                            </li>
                            <hr style="background: #418ab7;" class="sidebar-divider">
                            <li class="nav-link">
                                <a href="<?php echo base_url('ver_aulas') ?>">
                                    <i class='bx bx-chalkboard icon'></i>
                                    <span class="text nav-text">Aulas</span>
                                </a>
                            </li>
                            <li class="nav-link">
                                <a href="<?php echo base_url('asignaturas') ?>">
                                    <i class='bx bx-book icon'></i>
                                    <span class="text nav-text">Asignaturas</span>
                                </a>
                            </li>
                            <li class="nav-link">
                                <a href="<?php echo base_url('ver_horarios') ?>">
                                    <i class='bx bx-calendar icon'></i>
                                    <span class="text nav-text">Horarios</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="bottom-content">
                        <li class="">
                            <a href="<?php echo base_url('auth/logout') ?>">
                                <i class='bx bx-log-out icon'></i>
                                <span class="text nav-text">Logout</span>
                            </a>
                        </li>
                    </div>
                </div>

            </nav>


            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">
                </div>

                </nav>
        </body>




</html>
<script>
    const body = document.querySelector('body'),
        sidebar = body.querySelector('nav'),
        toggle = body.querySelector(".toggle");


    toggle.addEventListener("click", () => {
        sidebar.classList.toggle("close");
    })
</script>