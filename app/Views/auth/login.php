<head>
    <title>Cuentas Claras</title>
    <link rel="icon" href="<?php echo base_url() ?>/img/cuentasclaras.png" />
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css"> <!-- Bootstrap 5 hoja de estilos -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/bootstrap-icons/bootstrap-icons.css"> <!-- Bootstrap 5 hoja de estilos iconos -->
    <script src="<?php echo base_url('/bootstrap/bootstrap.bundle.min.js'); ?>"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>




</head>
<section class="vh-100 position-relative" style="background-color: #0b2c44;">
    <div class="position-absolute top-50 start-50 translate-middle">
        <form method="post" action="<?php echo base_url('/auth/login'); ?>">
            <div class="card text-center" style="width: 26rem;">
                <div class="card-body">
                    <h5 style="color: #0b2c44;margin: 20px 10px;" class="card-title divide">Iniciar Sesión</h5>
                    <hr class="sidebar-divider my-0">
                    <div style="margin: 20px 10px;" class="form-floating mb-3">
                        <input type="text" class="form-control" name="nombre_corto" id="nombre_corto" placeholder="Nombre de Usuario" value="<?= old('nombre_corto') ?>">
                        <label style="color:#0b2c44" for="floatingInput">Nombre de Usuario</label>
                    </div>
                    <!-- <div>
                        <label class="form-label" for="email">Nombre de Usuario</label>
                        <input type="text" class="form-control border border-dark-subtle" name="nombre_corto" id="nombre_corto" value="<?= old('nombre_corto') ?>">
                    </div> -->
                    <div style="margin: 20px 10px;" class="form-floating mb-3">
                        <input style="margin: 20px 0;" type="password" class="form-control"  name="password" id="password" placeholder="Contraseña">
                        <label for="floatingPassword">Contraseña</label>
                    <div class="d-grid gap-2 col-6 mx-auto">
                            <button class="btn btn-outline-success" type="submit">Iniciar sesión</button>
                    </div>
                    </div>
                </div>
        </form>
    </div>
</section>