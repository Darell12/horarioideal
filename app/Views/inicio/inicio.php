<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="global.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="global.css">
    <title>Document</title>
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
            align-items: center; /* Ajusta la alineación vertical y horizontal del contenido al centro */
        }

        /* Estilos para el botón */
        #miBoton {
            padding: 50px 100px; /* Ajusta el padding para hacer el botón más grande */
            background-color: transparent;
            color: blue;
            border: none;
            font-size: 40px; /* Ajusta el tamaño de fuente para hacer el botón más grande */
        }

        /* Media query para ajustar los estilos en pantallas pequeñas */
        @media (max-width: 600px) {
            #miBoton {
                display: none; /* Oculta el botón en pantallas pequeñas */
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



    <body>
    

        
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
        <!-- circulos con bordes -->

        <!-- <div class="circle0" style="width: 150px; height: 150px; top: 50%; left: 50%; transform: translate(-50%, -50%);"></div>
    <div class="circle0" style="width: 100px; height: 100px; top: 30%; left: 20%; transform: translate(-50%, -50%);"></div>
</body>
</html> -->




        <!-- style="background-image: url('img/hue.png');" -->

        <!-- <div id="miDiv">
     <img src="img/fondoaja.png" style="width: 1600px;"> 
    </div> -->



    
    </body>

    </html>








    <script>
        
        posibles_estados = {
            'E': 'Incactivos',
            'A': 'Activos',
            '2': 'Cerradas',
            '3': 'Aprobadas',
            '4': 'No Aprobadas'
        }
        var datos = {}
        var estados = {}
        var config = {}

        var ctx = document.getElementById('ChartEstudiantes').getContext('2d');
        var chart = new Chart();

        $.ajax({
            url: `<?php echo base_url('/principal/graficaUsuarios'); ?>`,
            dataType: 'json',
            success: function(usuarios) {
                // crear el objeto de configuración del gráfico
                console.log(usuarios);
                usuarios = usuarios[0]
                estados = {
                    'Totales': usuarios.length
                };
                estados['Total']
                usuarios.forEach(function(usuario) {
                    if (estados[posibles_estados[usuario.estado]]) {
                        estados[posibles_estados[usuario.estado]] += 1;
                    } else {
                        estados[posibles_estados[usuario.estado]] = 1;
                    }
                });
                // Crear un conjunto de datos para cada estado
                datos = {
                    labels: Object.keys(estados),
                    datasets: [{
                        label: 'Miembros',
                        data: Object.values(estados),
                        // data: estados,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 205, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(201, 203, 207, 0.2)'
                        ],
                        borderColor: [
                            'rgb(255, 99, 132)',
                            'rgb(255, 159, 64)',
                            'rgb(255, 205, 86)',
                            'rgb(75, 192, 192)',
                            'rgb(54, 162, 235)',
                            'rgb(153, 102, 255)',
                            'rgb(201, 203, 207)'
                        ],
                        borderWidth: 2
                    }]
                };

                // Configurar la gráfica
                config = {
                    // TYPE DEFINE EL TIPO DE FORMULARIO
                    type: 'line',
                    data: datos,
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        width: 522,
                        height: 280
                    },
                };



                // Crear la gráfica
                chart = new Chart(ctx, config);
                if (!e) var e = window.event;
                chart.canvas.addEventListener('click', (e) => {
                    click(chart, e);
                    chart.resize();
                })

            }
        });

        var ctxP = document.getElementById('ChartProfesores').getContext('2d');
        var chartP = new Chart();

        $.ajax({
            url: `<?php echo base_url('/principal/graficaProfesores'); ?>`,
            dataType: 'json',
            success: function(usuarios) {
                // crear el objeto de configuración del gráfico
                console.log(usuarios);
                usuarios = usuarios[0]
                estados = {
                    'Totales': usuarios.length
                };
                estados['Total']
                usuarios.forEach(function(usuario) {
                    if (estados[posibles_estados[usuario.estado]]) {
                        estados[posibles_estados[usuario.estado]] += 1;
                    } else {
                        estados[posibles_estados[usuario.estado]] = 1;
                    }
                });
                // Crear un conjunto de datos para cada estado
                datos = {
                    labels: Object.keys(estados),
                    datasets: [{
                        label: 'Miembros',
                        data: Object.values(estados),
                        // data: estados,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 205, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(201, 203, 207, 0.2)'
                        ],
                        borderColor: [
                            'rgb(255, 99, 132)',
                            'rgb(255, 159, 64)',
                            'rgb(255, 205, 86)',
                            'rgb(75, 192, 192)',
                            'rgb(54, 162, 235)',
                            'rgb(153, 102, 255)',
                            'rgb(201, 203, 207)'
                        ],
                        borderWidth: 2
                    }]
                };

                // Configurar la gráfica
                config = {
                    // TYPE DEFINE EL TIPO DE FORMULARIO
                    type: 'line',
                    data: datos,
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        width: 522,
                        height: 280
                    },
                };



                // Crear la gráfica
                chartP = new Chart(ctxP, config);
                if (!e) var e = window.event;
                chartP.canvas.addEventListener('click', (e) => {
                    click(chartP, e);
                    chartP.resize();
                })

            }
        });
    </script>

    

