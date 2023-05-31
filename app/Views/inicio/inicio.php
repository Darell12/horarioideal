<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="global.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<<<<<<< HEAD
    
    
    

<!DOCTYPE html>
<html>
<head>
  <style>
    .container {
      position: relative;
      width: 100%;
      height: 100vh;
    }

    .circle {
      position: absolute;
      background-color: #D6E4F4;
      border-radius: 50%;
    }
    .img {
        
      width: 100%;
      height: auto;
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
  <div class="container">
    <?php
      // Generar círculos con diferentes tamaños
      $circles = array(
        array('size' => '50px', 'top' => '20%', 'left' => '30%'),
        array('size' => '100px', 'top' => '50%', 'left' => '60%'),
        array('size' => '150px', 'top' => '80%', 'left' => '40%'),
        // array('size' => '1000px', 'top' => '10%', 'left' => '80%')
      );

      foreach ($circles as $circle) {
        echo '<div class="circle" style="width: ' . $circle['size'] . '; height: ' . $circle['size'] . '; top: ' . $circle['top'] . '; left: ' . $circle['left'] . ';"></div>';
      }
    ?>
  </div>

  <div class="img">
<!-- imagen de las personas -->
<?php
    // Ruta de la imagen
    $rutaImagen = "img/personas.png";
    
    // Dimensiones de la imagen
    $anchura = 500; // Anchura en píxeles
    $altura = 500; // Altura en píxeles
    
    // Posición de la imagen
    $posicionTop = 80; // Posición superior en píxeles
    $posicionLeft = 250; // Posición izquierda en píxeles
    
    // Imprimir la etiqueta <img> con la ruta, dimensiones y posición de la imagen
    echo '<img src="' . $rutaImagen . '" alt="Descripción de la imagen" width="' . $anchura . '" height="' . $altura . '" style="position: absolute; top: ' . $posicionTop . 'px; left: ' . $posicionLeft . 'px;">';
  ?>
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
=======
>>>>>>> 98638c0a74c43f2455a1c76d283346c5adb34a69
       
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