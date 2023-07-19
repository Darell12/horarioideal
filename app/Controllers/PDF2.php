<?php

namespace App\Controllers;


class PDF2 extends \FPDF
{
    protected $date;
    protected $squareHeight;
    protected $squareWidth;
    protected $longestMonth;
    protected $tinySquareSize;
    protected $headerFontSize;


    function __construct($orientation = "L", $size = "Letter")
    {
        parent::__construct($orientation, "mm", $size);
        $this->tinySquareSize = 4;
        $this->headerFontSize = 70;
        $this->SetFont("Times", "B", $this->headerFontSize);
        $width = $this->w - $this->lMargin - $this->rMargin;
        while ($this->GetStringWidth($this->longestMonth) > $width - $this->tinySquareSize * 22) {
            --$this->headerFontSize;
            $this->SetFont("Times", "B", $this->headerFontSize);
        }
    }

    function printMonth()
    {

        $this->AddPage();
        // Select Arial bold 15
        //* Header
        $this->SetFont('Arial', 'B', 15);
        // $this->Cell(0, 5, 'Title', 0, 1, 'C');
        $this->Ln(10);
        $this->Image(FCPATH . '/img/logo.png', 80, 5, 60, 0, 'PNG');

        $this->SetFont("Helvetica", "", 18);
        $this->SetXY(10, 40);
        $this->MultiCell(0, 30, 'Mi Horario', 0, 'L', false);

        $this->SetFont("Helvetica", "", 16);
        $this->SetXY(10, 47);
        $this->MultiCell(0, 30, '9-A / 2023', 0, 'L', false);

        $this->SetFont("Helvetica", "B", 10);
        $this->SetXY(10, 58);
        $this->MultiCell(0, 30, 'Alumno:', 0, 'L', false);

        $json = '[{"id_horario_det":"75","id_grado_asignatura":"2","id_aula":"1","id_horario_enc":"30","profesor":"Darell","fecha_crea":"2023-06-05 13:08:55","usuario_crea":"5","estado":"A","hora_inicio":"81","hora_fin":"83","duracion":"2","dia":"10","id_asignatura":"2","asignatura":"Programacion","aula":"Dim 1","inicio":"06:30:00","diaN":"Miercoles","fin":"08:30:00"},{"id_horario_det":"76","id_grado_asignatura":"2","id_aula":"1","id_horario_enc":"30","profesor":"Darell","fecha_crea":"2023-06-05 08:15:42","usuario_crea":"5","estado":"A","hora_inicio":"81","hora_fin":"83","duracion":"2","dia":"9","id_asignatura":"2","asignatura":"Programacion","aula":"Dim 1","inicio":"06:30:00","diaN":"Martes","fin":"08:30:00"},{"id_horario_det":"77","id_grado_asignatura":"2","id_aula":"1","id_horario_enc":"30","profesor":"Darell","fecha_crea":"2023-06-05 08:15:54","usuario_crea":"5","estado":"A","hora_inicio":"81","hora_fin":"83","duracion":"2","dia":"8","id_asignatura":"2","asignatura":"Programacion","aula":"Dim 1","inicio":"06:30:00","diaN":"Lunes","fin":"08:30:00"},{"id_horario_det":"80","id_grado_asignatura":"2","id_aula":"1","id_horario_enc":"30","profesor":"Darell","fecha_crea":"2023-06-05 15:11:13","usuario_crea":"5","estado":"A","hora_inicio":"83","hora_fin":"85","duracion":"2","dia":"10","id_asignatura":"2","asignatura":"Programacion","aula":"Dim 1","inicio":"08:30:00","diaN":"Miercoles","fin":"10:00:00"},{"id_horario_det":"81","id_grado_asignatura":"2","id_aula":"1","id_horario_enc":"30","profesor":"Darell","fecha_crea":"2023-06-05 15:11:13","usuario_crea":"5","estado":"A","hora_inicio":"83","hora_fin":"85","duracion":"2","dia":"9","id_asignatura":"2","asignatura":"Programacion","aula":"Dim 1","inicio":"08:30:00","diaN":"Martes","fin":"10:00:00"},{"id_horario_det":"82","id_grado_asignatura":"2","id_aula":"1","id_horario_enc":"30","profesor":"Darell","fecha_crea":"2023-06-05 15:11:13","usuario_crea":"5","estado":"A","hora_inicio":"83","hora_fin":"85","duracion":"2","dia":"8","id_asignatura":"2","asignatura":"Programacion","aula":"Dim 1","inicio":"08:30:00","diaN":"Lunes","fin":"10:00:00"},{"id_horario_det":"83","id_grado_asignatura":"1","id_aula":"3","id_horario_enc":"30","profesor":"Santiago","fecha_crea":"2023-06-05 15:11:33","usuario_crea":"5","estado":"A","hora_inicio":"86","hora_fin":"87","duracion":"1","dia":"9","id_asignatura":"1","asignatura":"Matematicas","aula":"Aula 05","inicio":"10:30:00","diaN":"Martes","fin":"11:30:00"},{"id_horario_det":"84","id_grado_asignatura":"1","id_aula":"3","id_horario_enc":"30","profesor":"Santiago","fecha_crea":"2023-06-05 15:11:33","usuario_crea":"5","estado":"A","hora_inicio":"86","hora_fin":"88","duracion":"2","dia":"8","id_asignatura":"1","asignatura":"Matematicas","aula":"Aula 05","inicio":"10:30:00","diaN":"Lunes","fin":"12:30:00"},{"id_horario_det":"85","id_grado_asignatura":"1","id_aula":"5","id_horario_enc":"30","profesor":"Darell","fecha_crea":"2023-06-05 15:20:39","usuario_crea":"5","estado":"A","hora_inicio":"87","hora_fin":"88","duracion":"1","dia":"9","id_asignatura":"1","asignatura":"Matematicas","aula":"dim 1","inicio":"11:30:00","diaN":"Martes","fin":"12:30:00"},{"id_horario_det":"86","id_grado_asignatura":"1","id_aula":"5","id_horario_enc":"30","profesor":"Darell","fecha_crea":"2023-06-05 15:20:39","usuario_crea":"5","estado":"A","hora_inicio":"86","hora_fin":"87","duracion":"1","dia":"10","id_asignatura":"1","asignatura":"Matematicas","aula":"dim 1","inicio":"10:30:00","diaN":"Miercoles","fin":"11:30:00"},{"id_horario_det":"87","id_grado_asignatura":"2","id_aula":"1","id_horario_enc":"30","profesor":"Darell","fecha_crea":"2023-06-05 15:25:25","usuario_crea":"5","estado":"A","hora_inicio":"81","hora_fin":"83","duracion":"2","dia":"12","id_asignatura":"2","asignatura":"Programacion","aula":"Dim 1","inicio":"06:30:00","diaN":"Viernes","fin":"08:30:00"},{"id_horario_det":"88","id_grado_asignatura":"2","id_aula":"1","id_horario_enc":"30","profesor":"Darell","fecha_crea":"2023-06-05 15:25:25","usuario_crea":"5","estado":"A","hora_inicio":"81","hora_fin":"83","duracion":"2","dia":"11","id_asignatura":"2","asignatura":"Programacion","aula":"Dim 1","inicio":"06:30:00","diaN":"Jueves","fin":"08:30:00"},{"id_horario_det":"89","id_grado_asignatura":"2","id_aula":"1","id_horario_enc":"30","profesor":"Darell","fecha_crea":"2023-06-05 15:25:25","usuario_crea":"5","estado":"A","hora_inicio":"87","hora_fin":"88","duracion":"1","dia":"10","id_asignatura":"2","asignatura":"Programacion","aula":"Dim 1","inicio":"11:30:00","diaN":"Miercoles","fin":"12:30:00"},{"id_horario_det":"90","id_grado_asignatura":"25","id_aula":"2","id_horario_enc":"30","profesor":"Darell","fecha_crea":"2023-06-05 15:25:45","usuario_crea":"5","estado":"A","hora_inicio":"83","hora_fin":"85","duracion":"2","dia":"11","id_asignatura":"7","asignatura":"POO","aula":"Laboratorio","inicio":"08:30:00","diaN":"Jueves","fin":"10:00:00"},{"id_horario_det":"91","id_grado_asignatura":"25","id_aula":"2","id_horario_enc":"30","profesor":"Darell","fecha_crea":"2023-06-05 10:27:08","usuario_crea":"5","estado":"A","hora_inicio":"83","hora_fin":"85","duracion":"2","dia":"12","id_asignatura":"7","asignatura":"POO","aula":"Laboratorio","inicio":"08:30:00","diaN":"Viernes","fin":"10:00:00"},{"id_horario_det":"92","id_grado_asignatura":"1","id_aula":"3","id_horario_enc":"30","profesor":"Darell","fecha_crea":"2023-06-05 15:28:01","usuario_crea":"5","estado":"A","hora_inicio":"86","hora_fin":"88","duracion":"2","dia":"11","id_asignatura":"1","asignatura":"Matematicas","aula":"Aula 05","inicio":"10:30:00","diaN":"Jueves","fin":"12:30:00"},{"id_horario_det":"93","id_grado_asignatura":"1","id_aula":"3","id_horario_enc":"30","profesor":"Darell","fecha_crea":"2023-06-05 15:28:01","usuario_crea":"5","estado":"A","hora_inicio":"86","hora_fin":"87","duracion":"1","dia":"12","id_asignatura":"1","asignatura":"Matematicas","aula":"Aula 05","inicio":"10:30:00","diaN":"Viernes","fin":"11:30:00"},{"id_horario_det":"94","id_grado_asignatura":"1","id_aula":"3","id_horario_enc":"30","profesor":"Darell","fecha_crea":"2023-06-05 15:28:32","usuario_crea":"5","estado":"A","hora_inicio":"87","hora_fin":"88","duracion":"1","dia":"12","id_asignatura":"1","asignatura":"Matematicas","aula":"Aula 05","inicio":"11:30:00","diaN":"Viernes","fin":"12:30:00"}] ';

        $array = json_decode($json, true);

        function obtenerHorarioAsignatura($array, $asignatura)
        {
            $horarioAsignatura = [];
            $hora_minima = PHP_INT_MAX;
            $hora_maxima = 0;
            $profesor = '';

            foreach ($array as $horario) {
                if ($horario['asignatura'] === $asignatura) {
                    $dia = $horario['diaN'];
                    $hora_inicio = strtotime($horario['inicio']);
                    $profesor = $horario['profesor'];
                    // $area = 

                    $hora_minima = min($hora_minima, $hora_inicio);

                    $hora_fin = strtotime($horario['fin']);
                    $hora_maxima = max($hora_maxima, $hora_fin);

                    if (!isset($horarioAsignatura[$dia])) {
                        $horarioAsignatura[$dia] = [
                            'hora_inicio' => $hora_inicio,
                            'hora_fin' => $hora_fin,
                            'aula' => $horario['aula'],
                            'profesor' => $profesor, // Agregar el nombre del profesor
                        ];
                    } else {
                        $horarioAsignatura[$dia]['hora_inicio'] = min($horarioAsignatura[$dia]['hora_inicio'], $hora_inicio);
                        $horarioAsignatura[$dia]['hora_fin'] = max($horarioAsignatura[$dia]['hora_fin'], $hora_fin);
                    }
                }
            }

            $hora_minima = date('H:i:s', $hora_minima);
            $hora_maxima = date('H:i:s', $hora_maxima);
            return [$horarioAsignatura, $hora_minima, $hora_maxima, $profesor];
        }

        function obtenerHorariosTodasAsignaturas($array)
        {
            $asignaturas = [];
            foreach ($array as $horario) {
                $asignatura = $horario['asignatura'];
                if (!isset($asignaturas[$asignatura])) {
                    $asignaturas[$asignatura] = obtenerHorarioAsignatura($array, $asignatura);
                }
            }
            return $asignaturas;
        }

        $horariosTodasAsignaturas = obtenerHorariosTodasAsignaturas($array);

        $this->SetFont("Helvetica", "", 10);
        $this->SetXY(25, 58);
        $this->MultiCell(0, 30, 'JUAN DAVID PADILLA SALCEDO', 0, 'L', false);

        $this->SetFont("Helvetica", "B", 10);
        $this->SetXY(10, 63);
        $this->MultiCell(0, 30, 'Hora de descarga:', 0, 'L', false);

        $this->SetFont("Helvetica", "", 10);
        $this->SetXY(41, 63);
        $this->MultiCell(0, 30, '17.07.2023 09:19', 0, 'L', false);

        $this->SetFont("Helvetica", "B", 10);
        $this->SetXY(10, 68);
        $this->MultiCell(0, 30, 'Materias asignadas:', 0, 'L', false);

        $this->SetFont("Helvetica", "", 10);
        $this->SetXY(44, 68);
        $this->MultiCell(0, 30, '7', 0, 'L', false);

        $this->SetFont("Helvetica", "", 16);
        $this->SetTextColor(74, 74, 74);
        $this->SetXY(10, 92);
        $this->MultiCell(0, 6, 'Materias', 'B', 'L', false);

        $x = 10;
        $y = 90.5;

        foreach ($horariosTodasAsignaturas as $asignatura => $horario) {
            list($horarioAsignatura, $hora_minima, $hora_maxima, $profesor) = $horario;
            // echo "Horario de la asignatura '$asignatura':\n";

            $this->SetFont("Helvetica", "", 8);
            $this->SetXY($x, $y);
            $this->MultiCell(0, 30, 'Area: "Ciencias Naturales y Educacion Ambiental" ', 0, 'L', false);

            $this->SetFont("Helvetica", "B", 12);
            $this->SetXY($x, $y + 4);
            $this->MultiCell(0, 30, $asignatura, 0, 'L', false);

            $this->SetFont("Helvetica", "", 8);
            $this->SetXY($x + 4, $y + 8);
            $this->MultiCell(0, 30, strtoupper($profesor), 0, 'L', false);

            $this->Image(FCPATH . '/img/usuario.png', $x, $y + 20, 5, 5);

            $y_inicial_dias = $y + 24;

            foreach ($horarioAsignatura as $dia => $horas) {
                $hora_inicio = date('H:i', $horas['hora_inicio']);
                $hora_fin = date('H:i', $horas['hora_fin']);
                $aula = $horas['aula'];

                $this->SetFont("Helvetica", "", 8);
                $this->SetXY($x + 4, $y + 24);
                $this->MultiCell(0, 6, $dia . ' ' . $hora_inicio . ' - ' . $hora_fin, 0, 'L', false); // Reducir el espacio vertical (6 en lugar de 30)
                $y += 4; // Incremento adicional en Y para separar los datos de cada día
            }

            $y_medio_asignaturas = ($y_inicial_dias + $y) / 2;

            $this->SetXY($x + 5, $y_medio_asignaturas - 1.75); // Ajustar la posición antes de agregar las imágenes
            $this->Image(FCPATH . '/img/clock.png', $x + 0.7, $y_medio_asignaturas + 10.75, 3.5, 3.5); // Ajustar la posición del reloj


            $y_inicial_aulas = $y + 11.8;

            foreach ($horarioAsignatura as $dia => $horas) {
                $aula = $horas['aula'];

                $this->SetFont("Helvetica", "", 8);
                $this->SetXY($x + 4.3, $y + 11.8); // Ajustar la posición antes de agregar el texto del aula
                $this->MultiCell(0, 30, $aula, 0, 'L', false);

                // Incrementar las coordenadas para la siguiente iteración
                $y += 4; // Incremento en Y para dar espacio entre las asignaturas y las aulas
            }

            $y_medio_aulas = ($y_inicial_aulas + $y) / 2;

            // $this->SetXY($x + 5, $y_medio_aulas - 1.75); // Ajustar la posición antes de agregar las imágenes
            $this->Image(FCPATH . '/img/classroom.png', $x + 0.7, $y_medio_aulas + 16, 3.5, 3.5); // Ajustar la posición del aula

            $y += 15; // Incremento en Y para mover la siguiente asignatura hacia abajo y dar espacio entre ellas

        }
    }
}


$pdf = new PDF2("P", "Letter");

$pdf->SetMargins(7, 7); // * BORDES

$pdf->SetAutoPageBreak(true, 0);

// * Numero de paginas a crear
$pdf->printMonth();

$pdf->Output();
