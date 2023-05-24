<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="<?php echo base_url() ?>/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/bootstrap/bootstrap.min.css">
    <link href="<?php echo base_url() ?>DataTable/datatables.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/prueba.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/globales.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/login.css" rel="stylesheet">

    <script src="<?php echo base_url() ?>/librerias/sweetalert2.js"></script>
    <script src="<?php echo base_url() ?>/librerias/jquery-3.6.4.js"></script>
    <script src="<?php echo base_url() ?>/librerias/jquery.validate.js"></script>
    <script src="<?php echo base_url() ?>/librerias/chart.js"></script>
    <script src="<?php echo base_url() ?>/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>DataTable/datatables.min.js"></script>

</head>
<style>


    swiper-slide {
      text-align: center;
      font-size: 18px;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    swiper-slide img {
      display: block;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
  </style>

<div style="height: 10rem;"></div>
<div class="container mt-4" style="height: 600px !important;">
    <div style="background-color: #00b0ff; margin: 0;  background-image: url('<?php echo base_url() ?>img/fondo.png');" class="info">
        <p class="txt-1">Gracias por visitarnos</p>
        <h2>Bienvenido</h2>
        <hr />
        <swiper-container style="color: #FFF; margin-top: -50px;" class="mySwiper" space-between="30" centered-slides="true" autoplay-delay="2500" autoplay-disable-on-interaction="false">
            <swiper-slide>"La vida no es un juego". - Darell Estren</swiper-slide>
            <swiper-slide>"Real hasta la muerte". -Santiago Lobelo</swiper-slide>
            <swiper-slide>"La misma morrocoya pero caminando pa atras". -Rosmy Pachón</swiper-slide>
            <swiper-slide>*No vino a escribir la frase* -Camilo Castillo</swiper-slide>
            <swiper-slide>"La vida es un juego y yo soy bronce"-Daniel Sanchez</swiper-slide>

        </swiper-container>
        <div>
        </div>
    </div>

    <form class="form" action="<?php echo base_url('/auth/login'); ?>" id="login">
        <h2>Iniciar Sesión</h2>
        <p>¡Hola! Gracias por visitarnos. Por favor, ingresa tus credenciales para acceder a tu cuenta. </p>
        <div class="inputs">
            <div class="form-floating mb-3">
                <input type="number" class="form-control" name="n_documento" id="n_documento" placeholder="Nombre de Usuario" value="<?= old('nombre_corto') ?>">
                <label style="color:#0b2c44" for="floatingInput">Número de documento</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña">
                <label for="floatingPassword">Contraseña</label>
            </div>
            <div>
                <label id="login-error" class="error" for="rol">
            </div>

            <input type="submit" value="Iniciar Sesión" class="submit">
        </div>
    </form>

</div>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script><script>
    $('#login').on('submit', function(e) {
        e.preventDefault();
        data = {
            n_documento: $('#n_documento').val(),
            password: $('#password').val(),
        };
        console.log(data);
        $.post('<?php echo base_url('/auth/login') ?>', data, function(response) {
            if (response == 'success') {
                window.location.replace('<?php echo base_url('/Principal'); ?>');
            }
            if (response == 'error') {
                $('#login-error').text('Número de documento o Contraseña incorrecta');
                $('#password').addClass('is-invalid');
                $('#n_documento').addClass('is-invalid');


                setTimeout(() => {
                    $('#login-error').text('')
                    $('#password').removeClass('is-invalid');
                    $('#n_documento').removeClass('is-invalid');

                }, 2000);
            }

        })
    })
</script>