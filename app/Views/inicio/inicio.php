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
    </div>
</div>