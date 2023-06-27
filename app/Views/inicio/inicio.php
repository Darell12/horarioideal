<head>
    <style>
        .image-container {
            position: relative;
            width: 100%;
            height: 0;
            padding-bottom: 56.25%;
            /* Proporción 16:9 */
        }

        .image-container img {
            position: absolute;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .boton-container {
            max-width: 100%;
            height: 1000px;
            display: flex;
            justify-content: center;
            align-items: center;
            /* Ajusta la alineación vertical y horizontal del contenido al centro */
        }

        /* Estilos para el botón */
        #miBoton {
            padding: 50px 100px;
            /* Ajusta el padding para hacer el botón más grande */
            background-color: transparent;
            color: blue;
            border: none;
            font-size: 40px;
            /* Ajusta el tamaño de fuente para hacer el botón más grande */
        }

        /* Media query para ajustar los estilos en pantallas pequeñas */
        @media (max-width: 600px) {
            #miBoton {
                display: none;
                /* Oculta el botón en pantallas pequeñas */
            }
        }

        /* circulos con borde */
        /* .circle0 {
      position: absolute;
      border: 2px solid #29588A;
      border-radius: 50%;
    } */
    </style>
</head>


<div class="contenedor">
    <div class="image-container">

        <?php
        // Ruta de la imagen
        $rutaImagen = "img/personas.png";

        // Imprimir la etiqueta <img> con la ruta de la imagen y estilos en línea
        echo '<img src="' . $rutaImagen . '" alt="Descripción de la imagen" style="width: 50%; height: 80%; top: 5%; left: 20%;">';
        ?>

        <div class="boton-container">
            <div class="miBoton">
                <a href="<?php echo base_url('/ver_horarios'); ?>" class="btn btn-5" style="color: white;">¡Vamos allá!</a>

            </div>
        </div>
    </div>
</div>