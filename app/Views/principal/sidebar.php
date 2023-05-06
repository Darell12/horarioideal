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

</head>

<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Horario Ideal</h3>
        </div>

        <ul class="list-unstyled components">
            <p><i class="bx bxs-user-circle icon bx-sm"></i><?php echo session('usuario')?></p>
            <li>
                <a href="#">About</a>
            </li>
            </li>
            <li>
                <a href="#">Portfolio</a>
            </li>
            <li>
                <a href="#">Contact</a>
            </li>
        </ul>

        <ul class="list-unstyled CTAs">
            <li>
                <a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a>
            </li>
            <li>
                <a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a>
            </li>
        </ul>
    </nav>

    <!-- Page Content  -->
    <div id="content">

        <nav class="navbar navbar-expand-lg navbar-white bg-white">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn btn-info">
                <i class='bx bx-menu-alt-left'></i>                    
                <span>Toggle Sidebar</span>
                </button>
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-align-justify"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
                </div>
            </div>
        </nav>



        <script>
            // const body = document.querySelector('body'),
            //     sidebar = body.querySelector('nav'),
            //     toggle = body.querySelector(".toggle");


            // toggle.addEventListener("click", () => {
            //     sidebar.classList.toggle("close");
            // })

            $(document).ready(function() {
                $("#sidebarCollapse").on("click", function() {
                    $("#sidebar").toggleClass("active");
                    $(this).toggleClass("active");
                });
            });
        </script>