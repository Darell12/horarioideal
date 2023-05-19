
<div class="container mt-3">
<div class="row row-cols-1 row-cols-md-3 g-4">
  <div class="col">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Estudiantes</h5>
        </div>
      <div class="card-body">
        <canvas id="ChartEstudiantes">

        </canvas>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Profesores</h5>
        </div>
      <div class="card-body">
        <canvas id="ChartProfesores">

        </canvas>
      </div>
    </div>
  </div>

</div>
</div>


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