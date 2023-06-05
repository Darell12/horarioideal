<head>
    <meta charset="utf-8" />
    <title>Bienvenido!</title>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />

    <link rel="stylesheet" href="<?php echo base_url() ?>/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/bootstrap/bootstrap.min.css">
    <link href="<?php echo base_url() ?>DataTable/datatables.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/global.css" rel="stylesheet">
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

<!-- <div class="container mt-4">
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

    <form class="form" action="<?php echo base_url('/auth/login'); ?>" style="margin-block-end: 0px;" id="login">
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

</div> -->

<body class="px-4 px-lg-0">
    <div class="panel col-12 col-lg-6 offset-lg-3">
        <div class="row">
            <div class="panel__left col-12 col-lg-7 py-4 px-4">
                <div class="panel__left-title text-center">
                    <span>Iniciar <b>Sesión</b></span>
                </div>
                <div class="panel__left-body">
                    <form action="<?php echo base_url('/auth/login'); ?>" id="login">
                        <div class="form-group">
                            <label for="text">Numero de documento</label>
                            <input type="text" name="n_documento" id="n_documento" class="form-control" placeholder="Ingrese su numero de documento" />
                        </div>
                        <div class="form-group">
                            <label for="passwd">Contraseña</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" />
                        </div>
                        <div>
                            <label id="login-error" class="error text-danger">
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" value="Ingresar" class="btn btn-primary" />
                        </div>
                    </form>
                </div>
                <div class="panel__left-footer text-center">
                </div>
            </div>
            <div class="panel__right col-lg-5 d-none d-lg-block py-5 px-3" style="background-color: #00b0ff; margin: 0;  background-image: url('<?php echo base_url() ?>img/fondo1.png');">
                <div class="panel__right-title text-center">
                    <p class="txt-1">Gracias por visitarnos</p>
                    <h2>Bienvenido</h2>
                    <swiper-container style="color: #FFF; margin-top: -50px;" class="mySwiper" space-between="30" centered-slides="true" autoplay-delay="2500" autoplay-disable-on-interaction="false">
                        <swiper-slide>"La vida no es un juego". - Darell Estren</swiper-slide>
                        <swiper-slide>"Real hasta la muerte". -Santiago Lobelo</swiper-slide>
                        <swiper-slide>"La misma morrocoya pero caminando pa atras". -Rosmy Pachón</swiper-slide>
                        <swiper-slide>*No vino a escribir la frase* -Camilo Castillo</swiper-slide>
                        <swiper-slide>"La vida es un juego y yo soy bronce"-Daniel Sanchez</swiper-slide>

                    </swiper-container>
                </div>
            </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script>
<script>
    $('#n_documento').on('keypress', function(e) {
        let charcode = e.which ? e.which : e.keyCode;
        if (charcode > 31 && (charcode < 48 || charcode > 57)) {
            e.preventDefault();
        }
    })

    $('#login').on('submit', function(e) {
        e.preventDefault();
        data = {
            n_documento: $('#n_documento').val(),
            password: $('#password').val(),
        };
        $.post('<?php echo base_url('/auth/login') ?>', data, function(response) {
            if (response == 'success') {
                window.location.replace('<?php echo base_url('/inicio'); ?>');
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