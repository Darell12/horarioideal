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
    

    // function printMonth()
    // {
    //     $json = '[{"id_horario_det":"75","id_grado_asignatura":"2","id_aula":"1","id_horario_enc":"30","profesor":"Darell","fecha_crea":"2023-06-05 13:08:55","usuario_crea":"5","estado":"A","hora_inicio":"81","hora_fin":"83","duracion":"2","dia":"10","id_asignatura":"2","asignatura":"Programacion","aula":"Dim 1","inicio":"06:30:00","diaN":"Miercoles","fin":"08:30:00"},{"id_horario_det":"76","id_grado_asignatura":"2","id_aula":"1","id_horario_enc":"30","profesor":"Darell","fecha_crea":"2023-06-05 08:15:42","usuario_crea":"5","estado":"A","hora_inicio":"81","hora_fin":"83","duracion":"2","dia":"9","id_asignatura":"2","asignatura":"Programacion","aula":"Dim 1","inicio":"06:30:00","diaN":"Martes","fin":"08:30:00"},{"id_horario_det":"77","id_grado_asignatura":"2","id_aula":"1","id_horario_enc":"30","profesor":"Darell","fecha_crea":"2023-06-05 08:15:54","usuario_crea":"5","estado":"A","hora_inicio":"81","hora_fin":"83","duracion":"2","dia":"8","id_asignatura":"2","asignatura":"Programacion","aula":"Dim 1","inicio":"06:30:00","diaN":"Lunes","fin":"08:30:00"},{"id_horario_det":"80","id_grado_asignatura":"2","id_aula":"1","id_horario_enc":"30","profesor":"Darell","fecha_crea":"2023-06-05 15:11:13","usuario_crea":"5","estado":"A","hora_inicio":"83","hora_fin":"85","duracion":"2","dia":"10","id_asignatura":"2","asignatura":"Programacion","aula":"Dim 1","inicio":"08:30:00","diaN":"Miercoles","fin":"10:00:00"},{"id_horario_det":"81","id_grado_asignatura":"2","id_aula":"1","id_horario_enc":"30","profesor":"Darell","fecha_crea":"2023-06-05 15:11:13","usuario_crea":"5","estado":"A","hora_inicio":"83","hora_fin":"85","duracion":"2","dia":"9","id_asignatura":"2","asignatura":"Programacion","aula":"Dim 1","inicio":"08:30:00","diaN":"Martes","fin":"10:00:00"},{"id_horario_det":"82","id_grado_asignatura":"2","id_aula":"1","id_horario_enc":"30","profesor":"Darell","fecha_crea":"2023-06-05 15:11:13","usuario_crea":"5","estado":"A","hora_inicio":"83","hora_fin":"85","duracion":"2","dia":"8","id_asignatura":"2","asignatura":"Programacion","aula":"Dim 1","inicio":"08:30:00","diaN":"Lunes","fin":"10:00:00"},{"id_horario_det":"83","id_grado_asignatura":"1","id_aula":"3","id_horario_enc":"30","profesor":"Santiago","fecha_crea":"2023-06-05 15:11:33","usuario_crea":"5","estado":"A","hora_inicio":"86","hora_fin":"87","duracion":"1","dia":"9","id_asignatura":"1","asignatura":"Matematicas","aula":"Aula 05","inicio":"10:30:00","diaN":"Martes","fin":"11:30:00"},{"id_horario_det":"84","id_grado_asignatura":"1","id_aula":"3","id_horario_enc":"30","profesor":"Santiago","fecha_crea":"2023-06-05 15:11:33","usuario_crea":"5","estado":"A","hora_inicio":"86","hora_fin":"88","duracion":"2","dia":"8","id_asignatura":"1","asignatura":"Matematicas","aula":"Aula 05","inicio":"10:30:00","diaN":"Lunes","fin":"12:30:00"},{"id_horario_det":"85","id_grado_asignatura":"1","id_aula":"5","id_horario_enc":"30","profesor":"Darell","fecha_crea":"2023-06-05 15:20:39","usuario_crea":"5","estado":"A","hora_inicio":"87","hora_fin":"88","duracion":"1","dia":"9","id_asignatura":"1","asignatura":"Matematicas","aula":"dim 1","inicio":"11:30:00","diaN":"Martes","fin":"12:30:00"},{"id_horario_det":"86","id_grado_asignatura":"1","id_aula":"5","id_horario_enc":"30","profesor":"Darell","fecha_crea":"2023-06-05 15:20:39","usuario_crea":"5","estado":"A","hora_inicio":"86","hora_fin":"87","duracion":"1","dia":"10","id_asignatura":"1","asignatura":"Matematicas","aula":"dim 1","inicio":"10:30:00","diaN":"Miercoles","fin":"11:30:00"},{"id_horario_det":"87","id_grado_asignatura":"2","id_aula":"1","id_horario_enc":"30","profesor":"Darell","fecha_crea":"2023-06-05 15:25:25","usuario_crea":"5","estado":"A","hora_inicio":"81","hora_fin":"83","duracion":"2","dia":"12","id_asignatura":"2","asignatura":"Programacion","aula":"Dim 1","inicio":"06:30:00","diaN":"Viernes","fin":"08:30:00"},{"id_horario_det":"88","id_grado_asignatura":"2","id_aula":"1","id_horario_enc":"30","profesor":"Darell","fecha_crea":"2023-06-05 15:25:25","usuario_crea":"5","estado":"A","hora_inicio":"81","hora_fin":"83","duracion":"2","dia":"11","id_asignatura":"2","asignatura":"Programacion","aula":"Dim 1","inicio":"06:30:00","diaN":"Jueves","fin":"08:30:00"},{"id_horario_det":"89","id_grado_asignatura":"2","id_aula":"1","id_horario_enc":"30","profesor":"Darell","fecha_crea":"2023-06-05 15:25:25","usuario_crea":"5","estado":"A","hora_inicio":"87","hora_fin":"88","duracion":"1","dia":"10","id_asignatura":"2","asignatura":"Programacion","aula":"Dim 1","inicio":"11:30:00","diaN":"Miercoles","fin":"12:30:00"},{"id_horario_det":"90","id_grado_asignatura":"25","id_aula":"2","id_horario_enc":"30","profesor":"Darell","fecha_crea":"2023-06-05 15:25:45","usuario_crea":"5","estado":"A","hora_inicio":"83","hora_fin":"85","duracion":"2","dia":"11","id_asignatura":"7","asignatura":"POO","aula":"Laboratorio","inicio":"08:30:00","diaN":"Jueves","fin":"10:00:00"},{"id_horario_det":"91","id_grado_asignatura":"25","id_aula":"2","id_horario_enc":"30","profesor":"Darell","fecha_crea":"2023-06-05 10:27:08","usuario_crea":"5","estado":"A","hora_inicio":"83","hora_fin":"85","duracion":"2","dia":"12","id_asignatura":"7","asignatura":"POO","aula":"Laboratorio","inicio":"08:30:00","diaN":"Viernes","fin":"10:00:00"},{"id_horario_det":"92","id_grado_asignatura":"1","id_aula":"3","id_horario_enc":"30","profesor":"Darell","fecha_crea":"2023-06-05 15:28:01","usuario_crea":"5","estado":"A","hora_inicio":"86","hora_fin":"88","duracion":"2","dia":"11","id_asignatura":"1","asignatura":"Matematicas","aula":"Aula 05","inicio":"10:30:00","diaN":"Jueves","fin":"12:30:00"}]';

    //     $array = json_decode($json, true);


    //     // Clasificar los horarios por día de la semana
    //     $clasificados = array();
    //     foreach ($array as $horario) {
    //         $dia = $horario['diaN'];
    //         $clasificados[$dia][] = $horario;
    //     }

    //     // Ordenar cada grupo de horarios por hora de inicio
    //     foreach ($clasificados as $dia => $horarios) {
    //         usort($horarios, function ($a, $b) {
    //             return $a['hora_inicio'] - $b['hora_inicio'];
    //         });
    //         $clasificados[$dia] = $horarios;
    //     }

    //     // Construir el array ordenado según los días de la semana
    //     $ordenado = array();
    //     $diasSemana = ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes'];
    //     foreach ($diasSemana as $dia) {
    //         if (isset($clasificados[$dia])) {
    //             $ordenado = array_merge($ordenado, $clasificados[$dia]);
    //         }
    //     }


    //     // print_r($ordenado);
    //     $this->AddPage();

    //     // compute size base on current settings
    //     $width = $this->w - $this->lMargin - $this->rMargin;
    //     $height = $this->h - $this->tMargin - $this->bMargin;

    //     // print header
    //     $firstLine = $this->tinySquareSize * 8 + $this->tMargin; // Adjust the position of the header
    //     $this->SetXY($this->lMargin, $this->tMargin);
    //     $this->SetFont("Times", "B", $this->headerFontSize);
    //     $this->Cell($width, $firstLine, iconv('UTF-8', 'windows-1252', "Grado Aqui + Año"), 0, 0, "C"); //* INFORMACION HEADER

    //     $filas = 6; // * NUMERO DE CUADRICULAS EN Y

    //     //* GENERA LINEAS HORIZONTALES
    //     $this->squareHeight = ($height - 6 - $firstLine) / $filas;
    //     $horizontalLines = array($firstLine, 6);
    //     for ($i = 0; $i < $filas; ++$i) {
    //         $horizontalLines[$i + 2] = $this->squareHeight;
    //     }

    //     //* GENERA LINEAS VERTICALES

    //     $this->squareWidth = $width / 5; //* ESTE NUMERO REPRESENTA LA CANTIDAD DE COLUMNAS
    //     $verticalLines = array($this->lMargin, $this->squareWidth, $this->squareWidth, $this->squareWidth, $this->squareWidth, $this->squareWidth, $this->squareWidth, $this->squareWidth);

    //     //* GENERA LOS TITULOS DE LA SEMANA
    //     $x = 0;
    //     $this->SetFont("Times", "B", 12);
    //     $DiasES = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes'];
    //     for ($i = 1; $i <= 5; ++$i) {
    //         $x += $verticalLines[$i - 1];
    //         $this->SetXY($x, $firstLine);
    //         $this->Cell($verticalLines[$i], 6,  iconv('UTF-8', 'windows-1252', $DiasES[$i - 1]), 0, 0, "C");
    //     }

    //     //* RELLENO DE LAS CELDAS
    //     $cur = 1;
    //     $this->SetFont("Times", "B", 20);
    //     $x = 0;
    //     $y = $horizontalLines[0];
    //     for ($k = 0; $k < $filas; $k++) {
    //         $y += $horizontalLines[$k + 1];

    //         for ($i = 0; $i < 5; $i++) {
    //             $x += $verticalLines[$i];
    //             $this->squareWidth = $verticalLines[$i + 1];

    //             $this->setXY($x, $y);
    //             $this->SetFont("Times", "B", 20);
    //             $this->SetXY($x, $y + 1);
    //             $this->Cell(5, 5, $cur); //* relleno de cada celda

    //             // Buscar información correspondiente en $data

    //             $this->SetFont("Arial", "", 10);
    //             $this->SetXY($x, $y + 5);
    //             $this->Cell(5, 5, isset($ordenado[$cur - 1]['asignatura']) ? $ordenado[$cur - 1]['asignatura'] : 'Texto predeterminado');
    //             $this->SetFont("Arial", "", 10);
    //             $this->SetXY($x, $y + 10);
    //             $this->Cell(5, 5, isset($ordenado[$cur - 1]['profesor']) ? $ordenado[$cur - 1]['profesor'] : 'Texto predeterminado');
    //             $this->SetFont("Arial", "", 10);
    //             $this->SetXY($x, $y + 15);
    //             $this->Cell(5, 5, isset($ordenado[$cur - 1]['diaN']) ? $ordenado[$cur - 1]['diaN'] : 'Texto predeterminado');


    //             ++$cur;
    //         }

    //         $x = 0;
    //     }

    //     // print horizontal lines
    //     $ly = 0;
    //     $ry = 0;
    //     foreach ($horizontalLines as $key => $value) {
    //         $ly += $value;
    //         $ry += $value;
    //         $this->Line($this->lMargin, $ly, $this->lMargin + $width, $ry);
    //     }

    //     // print vertical lines
    //     $lx = 0;
    //     $rx = 0;
    //     foreach ($verticalLines as $key => $value) {
    //         $lx += $value;
    //         $rx += $value;
    //         $this->Line($lx, $firstLine, $rx, $firstLine + 6 + $this->squareHeight * $filas);
    //     }
    // }

    function printMonth()
    {
        $this->AddPage();
        // Select Arial bold 15
        //* Header
        $this->SetFont('Arial', 'B', 15);
        // $this->Cell(0, 5, 'Title', 0, 1, 'C');
        $this->Ln(10);
        $this->Image('data:image/png;base64,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', 80, 5, 60, 0, 'PNG');

        $this->SetFont("Helvetica", "", 18);
        $this->SetXY(10, 40);
        $this->MultiCell(0, 30, 'Mi Horario', 0, 'L', false);

        $this->SetFont("Helvetica", "", 16);
        $this->SetXY(10, 47);
        $this->MultiCell(0, 30, '9-A / 2023', 0, 'L', false);

        $this->SetFont("Helvetica", "B", 10);
        $this->SetXY(10, 58);
        $this->MultiCell(0, 30, 'Alumno:', 0, 'L', false);
        
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

        $this->SetFont("Helvetica", "", 8);
        $this->SetXY(10, 90);   
        $this->MultiCell(0, 30, 'Codigo: "Ciencias Naturales y Educacion Ambiental" ', 0, 'L', false);

        $this->SetFont("Helvetica", "B", 12);
        $this->SetXY(10, 95);   
        $this->MultiCell(0, 30, 'BIOLOGIA', 0, 'L', false);

        $this->SetFont("Helvetica", "", 8);
        $this->SetXY(10, 100);   
        $this->MultiCell(0, 30, 'EVERLINY PADILLA', 0, 'L', false);

        $this->SetFont("Helvetica", "", 8);
        $this->SetXY(10, 104);   
        $this->MultiCell(0, 30, 'LUN  7:00 - 8:00', 0, 'L', false);

        $this->SetFont("Helvetica", "", 8);
        $this->SetXY(10, 108);   
        $this->MultiCell(0, 30, 'HORA DESCARGA', 0, 'L', false);

        $this->SetFont("Helvetica", "", 8);
        $this->SetXY(10, 112);   
        $this->MultiCell(0, 30, 'LABORATORIO', 0, 'L', false);
        
    }
}


$pdf = new PDF2("P", "Letter");

$pdf->SetMargins(7, 7); // * BORDES

$pdf->SetAutoPageBreak(true, 0);

// * Numero de paginas a crear
$pdf->printMonth();

$pdf->Output();