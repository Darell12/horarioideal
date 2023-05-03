<!DOCTYPE html>
<html lang="en">

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
    <link rel="stylesheet" href="<?php echo base_url() ?>/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/bootstrap/bootstrap.min.css">
    <link href="<?php echo base_url()?>DataTable/datatables.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/pruebas.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/globales.css" rel="stylesheet">

    <script src="<?php echo base_url() ?>/librerias/sweetalert2.js"></script>
    <script src="<?php echo base_url() ?>/librerias/jquery-3.6.4.js"></script>
    <script src="<?php echo base_url() ?>/librerias/jquery.validate.js"></script>
    <script src="<?php echo base_url() ?>/librerias/chart.js"></script>
    <script src="<?php echo base_url() ?>/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url()?>DataTable/datatables.min.js"></script>

    <!-- // *TODO DESCARGAR BOXICON -->
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">

</head>

    <nav class="sidebar close">
        <header>
            <a class="nav-link" href="<?php echo base_url('usuarios/perfil/' . session('id')) ?>">
                <div class="image-text">
                    <span class="image" href="">
                        <i class="bx bxs-user-circle icon bx-sm"></i>
                    </span>

                    <div id="usuarioInfo" class="text logo-text">
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
                        <a href="<?php echo base_url('inicio') ?>" title="Inicio">
                            <i class='bx bx-home-alt icon'> </i>
                            <span class="text nav-text">Inicio</span>
                        </a>
                    </li>
                    <hr style="background: #418ab7;" class="sidebar-divider">
                    <li class="nav-link">
                        <a href="<?php echo base_url('ver_roles') ?>" title="Roles">
                            <i class='bx bx-wrench icon'></i>
                            <span class="text fs-6 nav-text">Roles</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="<?php echo base_url('ver_permisos') ?>" title="Permisos">
                            <i class='bx bx-slider-alt icon'></i>
                            <span class="text fs-6 nav-text">Permisos</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="<?php echo base_url('ver_acciones') ?>" title="Acciones">
                            <i class='bx bx-cog icon'></i>
                            <span class="text fs-6 nav-text">Acciones</span>
                        </a>
                    </li>
                    <hr style="background: #418ab7;" class="sidebar-divider">
                    <li class="nav-link">
                        <a href="<?php echo base_url('usuarios') ?>" title="Usuarios">
                            <i class='bx bx-user icon'></i>
                            <span class="text fs-6 nav-text">Usuarios</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="<?php echo base_url('estudiantes') ?>" title="Estudiantes">
                            <i class='bx bxs-graduation icon'></i>
                            <span class="text nav-text">Estudiantes</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="<?php echo base_url('profesores') ?>" title="Profesores">
                            <i class='bx bx-id-card icon'></i>
                            <span class="text nav-text">Profesores</span>
                        </a>
                    </li>
                    <hr style="background: #418ab7;" class="sidebar-divider">
                    <li class="nav-link">
                        <a href="<?php echo base_url('ver_aulas') ?>" title="Aulas">
                            <i class='bx bx-chalkboard icon'></i>
                            <span class="text nav-text">Aulas</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="<?php echo base_url('asignaturas') ?>" title="Asignaturas">
                            <i class='bx bx-book icon'></i>
                            <span class="text nav-text">Asignaturas</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="<?php echo base_url('ver_horarios') ?>" title="Horarios">
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

<script>
    const body = document.querySelector('body'),
        sidebar = body.querySelector('nav'),
        toggle = body.querySelector(".toggle");


    toggle.addEventListener("click", () => {
        sidebar.classList.toggle("close");
    })
</script>