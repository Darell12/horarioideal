<!-- <div class="tiles m-4" id="contenedorTarjetas">

</div> -->
<div class="app-content m-3 ">
    <div class="projects-section">
        <div class="projects-section-header">
            <p>Asignaturas</p>
            <p class="time" id="fecha">December, 12</p>
        </div>
        <div class="projects-section-line">
            <div class="projects-status">
                <div class="item-status">
                    <span class="status-number" id="totalAsignaturas"></span>
                    <span class="status-type">Total Asignaturas</span>
                </div>
                <!-- <div class="item-status">
                    <span class="status-number">24</span>
                    <span class="status-type">Horas Diarias</span>
                </div> -->
                <div class="item-status">
                    <span class="status-number" id="horas_semanales"></span>
                    <span class="status-type">Horas Semanales</span>
                </div>
            </div>
            <div class="view-actions">
                <button class="view-btn list-view" title="List View">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list">
                        <line x1="8" y1="6" x2="21" y2="6" />
                        <line x1="8" y1="12" x2="21" y2="12" />
                        <line x1="8" y1="18" x2="21" y2="18" />
                        <line x1="3" y1="6" x2="3.01" y2="6" />
                        <line x1="3" y1="12" x2="3.01" y2="12" />
                        <line x1="3" y1="18" x2="3.01" y2="18" />
                    </svg>
                </button>
                <button class="view-btn grid-view active" title="Grid View">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid">
                        <rect x="3" y="3" width="7" height="7" />
                        <rect x="14" y="3" width="7" height="7" />
                        <rect x="14" y="14" width="7" height="7" />
                        <rect x="3" y="14" width="7" height="7" />
                    </svg>
                </button>
            </div>
        </div>
        <div class="project-boxes jsGridView" id="contenedorTarjetas">
        </div>
    </div>
</div>
<!-- modal -->

<div id="contenedorModales">
    <div class="modal fade" id="modal-lecture-info" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <!-- <span aria-hidden="true">×</span> -->
                    </button>
                </div>
                <div class="modal-body">
                    <h3 class="lecture-title">Matematicas 9-A</h3>
                    <ul class="lecture-info">
                        <li class="lecture-time">
                            <i class="material-icons ic-lecture-info">access_alarm</i>
                            <span>강의 시간 : 09:00 - 10:50 | (월), (수)</span>
                        </li>
                        <li class="lecture-code">
                            <i class="material-icons ic-lecture-info">code</i>
                            <span>교과목 코드 : A0000001</span>
                        </li>
                        <li class="lecture-code">
                            <i class="material-icons ic-lecture-info">school</i>
                            <span>담당 교수 : 김진수</span>
                        </li>
                        <li class="lecture-code">
                            <i class="material-icons ic-lecture-info">business</i>
                            <span>강의실 : 공학관 204</span>
                        </li>
                    </ul>
                    <div class="lecture-description">
                        <p class="txt-description">본 강의에서는 JSP를 이용한 웹 기반 프로그래밍 기초 및 응용기술에 대해 학습합니다. 특히 실습 위주의 수업으로 프로그래밍 스킬 향상 및
                            실무 능력을 갖출 수 있도록 합니다.
                        </p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


</div>

<script>
    // Obtener la fecha actual
    // Obtener la fecha actual
    var fechaActual = new Date();

    // Obtener el nombre del día actual
    var opcionesDia = {
        weekday: 'long'
    };
    var nombreDia = fechaActual.toLocaleDateString('es-ES', opcionesDia);
    var dia = fechaActual.getDate()

    // Obtener el nombre del mes actual
    var opcionesMes = {
        month: 'long'
    };
    var nombreMes = fechaActual.toLocaleDateString('es-ES', opcionesMes);


    // Mostrar el nombre del día y del mes actual
    console.log("Día: " + nombreDia);
    console.log("Día: " + dia);
    console.log("Mes: " + nombreMes);
    $('#fecha').text(nombreMes.charAt(0).toUpperCase() + nombreMes.slice(1) + ', ' + dia)


    function diasHastaDiaDeLaSemana(diaSemana) {
        const hoy = new Date();
        const diaActual = hoy.getDay();
        const diasSemana = ['domingo', 'lunes', 'martes', 'miércoles', 'jueves', 'viernes', 'sábado'];

        // Obtener el índice del día de la semana especificado
        const indiceDiaSemana = diasSemana.indexOf(diaSemana.toLowerCase());

        // Si el día de la semana especificado es hoy, devolver 7 días (una semana)
        if (indiceDiaSemana === diaActual) {
            return 7;
        }

        // Calcular la cantidad de días hasta el próximo día de la semana especificado
        let diasHastaDia = indiceDiaSemana - diaActual;
        if (diasHastaDia < 0) {
            diasHastaDia += 7; // Sumar 7 días si ya pasó en esta semana
        }

        return diasHastaDia;
    }

    // Ejemplo de uso

    const COLORES = [{
            background: '#e9e7fd;',
            detalles: '#4f3ff0;'
        },
        {
            background: '#fee4cb;',
            detalles: '#ff942e;'
        },
        {
            background: '#C0EEFA;',
            detalles: '#096c86;'
        },
        {
            background: '#ffd3e2;',
            detalles: '#df3670;'
        },
        {
            background: '#c8f7dc;',
            detalles: '#34c471;'
        },
        {
            background: '#d5deff;',
            detalles: '#4067f9;'
        }
    ]

    document.addEventListener('DOMContentLoaded', function() {

        var listView = document.querySelector('.list-view');
        var gridView = document.querySelector('.grid-view');
        var projectsList = document.querySelector('.project-boxes');

        listView.addEventListener('click', function() {
            gridView.classList.remove('active');
            listView.classList.add('active');
            projectsList.classList.remove('jsGridView');
            projectsList.classList.add('jsListView');
        });

        gridView.addEventListener('click', function() {
            gridView.classList.add('active');
            listView.classList.remove('active');
            projectsList.classList.remove('jsListView');
            projectsList.classList.add('jsGridView');
        });

    });

    $('.card-lecture').click(function() {
        $('#modal-lecture-info').modal('show');
    });

    let constante
    $(document).ready(function() {

        dataURL = "<?php echo base_url('/inicio/ConsultaAsignaturas/'); ?><?php echo session('id') ?>";
        $.ajax({
            type: "POST",
            url: dataURL,
            dataType: "json",
        }).done(function(rs) {
            $('#totalAsignaturas').text(rs.length)
            let horas_semanales = 0;
            console.log(rs);
            console.log('succes')
            constante = rs
            contenido = ''
            contenidoM = ''
            let contadorEstilos = 0
            let contador = 0

            rs.forEach(asignatura => {
                // CONSULTA DE LOS DETALLES DE CADA ASIGNATURA OBTENIDA
                horas_semanales += +asignatura.horas_semanales
                dataURL = `<?php echo base_url('/inicio/ConsultaDetalleAsignaturas/'); ?>${asignatura.id_grado_asignatura}`;
                $.ajax({
                    type: "POST",
                    url: dataURL,
                    dataType: "json",
                }).done(function(response) {
                    console.log(response);


                    contadorEstilos++
                    console.log(contadorEstilos);
                    if (contadorEstilos == 5) {
                        contadorEstilos = 0
                    }
                    contador++

                    // const diasFaltantes = diasHastaDiaDeLaSemana(response[0].diaN);
                    // console.log(`Faltan ${diasFaltantes} días para el próximo ${response[0].diaN}.`);

                    contenido = `
                            <div class="project-box-wrapper" data-bs-toggle="modal" data-bs-target="#modal-${contador}">
                                <div class="project-box" style="cursor: pointer; background:${COLORES[contadorEstilos].background}">
                                    <div class="project-box-header">
                                        <span>December 10, 2020</span>
                                    </div>
                                    <div class="project-box-content-header">
                                        <p class="box-content-header">${asignatura.nombre}</p>
                                        <p class="box-content-subheader">${asignatura.grado}</p>
                                    </div>
                                    <div class="project-box-footer">
                                        <div class="participants">
                                            <button class="add-participant" style="color:${COLORES[contadorEstilos].detalles}">
                                                <i class="bi bi-calculator"></i>
                                            </button>
                                        </div>
                                        <button style="border: none; background:#f3f6fd00">
                                            <div class="days-left" style="color:${COLORES[contadorEstilos].detalles}">
                                                Ver detalles
                                            </div>
                                        </button>
                                    </div>
                                </div>`
                    $(`#contenedorTarjetas`).append(contenido)

                    contenido = `    <div class="modal fade" id="modal-${contador}" role="dialog" aria-hidden="true">
                                 <div class="modal-dialog" role="document">
                                     <div class="modal-content">
                                         <div class="modal-header">
                                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                 <!-- <span aria-hidden="true">×</span> -->
                                             </button>
                                         </div>
                                         <div class="modal-body">
                                             <h3 class="lecture-title">${asignatura.nombre} ${asignatura.grado}</h3>
                                             <ul class="lecture-info">
                                                 <li class="lecture-code">
                                                     <i class="material-icons ic-lecture-info">Area:</i>
                                                     <span>${asignatura.area}</span>
                                                 </li>
                                                 <li class="lecture-code">
                                                     <i class="material-icons ic-lecture-info">Aula:</i>
                                                     <span>교과목 코드 : A0000001</span>
                                                 </li>
                                             </ul>
                                             <div class="lecture-description">
                                                 <p class="txt-description" id="descripcion${contador}">
                                                 </p>
                                             </div>
                                         </div>
                                         <div class="modal-footer">
                                             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                         </div>
                                     </div>
                                 </div>
                             </div>`
                    $(`#contenedorModales`).append(contenido)

                    response.forEach(element => {
                        $(`#descripcion${contador}`).append(
                            `
                            <p> <span class="fw-bold">${element.diaN}:</span> ${element.inicio} ~ ${element.fin}</p><br>
                            `
                        )
                    });
                });

            })
            $('#horas_semanales').text(horas_semanales)
        })
    })
</script>