<?php

namespace App\Controllers;


class PDF extends \FPDF
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

    // function printMonth($date) //* ESTA FUNCION GENERA LA PAGINA
    // {

    //     $this->AddPage();

    //     // compute size base on current settings
    //     $width = $this->w - $this->lMargin - $this->rMargin;
    //     $height = $this->h - $this->tMargin - $this->bMargin;

    //     // print header
    //     // $firstLine = $this->tinySquareSize * 8 + $this->tMargin;
    //     // $monthStr = strtoupper(gmdate("F Y", jdtounix($date)));
    //     // $this->SetXY($this->lMargin, $this->tMargin);
    //     // $this->SetFont("Times", "B", $this->headerFontSize);
    //     // $this->Cell($width, $firstLine, $monthStr, 0, 0, "C");

    //     $firstLine = $this->tinySquareSize * 8 + $this->tMargin; // Adjust the position of the header
    //     $this->SetXY($this->lMargin, $this->tMargin);
    //     $this->SetFont("Times", "B", $this->headerFontSize);
    //     $this->Cell($width, $firstLine, "Grado Aqui + Año", 0, 0, "C"); //* INFORMACION HEADER

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
    //     $DiasES = ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes'];
    //     for ($i = 1; $i <= 5; ++$i) {
    //         $x += $verticalLines[$i - 1];
    //         $this->SetXY($x, $firstLine);
    //         $this->Cell($verticalLines[$i], 6, $DiasES[$i - 1], 0, 0, "C");
    //     }

    //     //* RELLENO DE LAS CELDAS
    //     $wd = gmdate("w", jdtounix($date));
    //     $cur = $date - $wd;
    //     $this->SetFont("Times", "B", 20);
    //     $x = 0;
    //     $y = $horizontalLines[0];
    //     for ($k = 0; $k < $filas; $k++) {

    //         $y += $horizontalLines[$k + 1];

    //         for ($i = 0; $i < 5; $i++) {
    //             $this->JDtoYMD($cur, $curYear, $curMonth, $curDay);
    //             $x += $verticalLines[$i];
    //             $this->squareWidth = $verticalLines[$i + 1];

    //             $this->setXY($x, $y);
    //             $this->SetFont("Times", "B", 20);
    //             $this->SetXY($x, $y + 1);
    //             $this->Cell(5, 5, $cur); //* relleno de cada celda

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
        $json = '[{"id_horario_det":"75","id_grado_asignatura":"2","id_aula":"1","id_horario_enc":"30","profesor":"Darell","fecha_crea":"2023-06-05 13:08:55","usuario_crea":"5","estado":"A","hora_inicio":"81","hora_fin":"83","duracion":"2","dia":"10","id_asignatura":"2","asignatura":"Programacion","aula":"Dim 1","inicio":"06:30:00","diaN":"Miercoles","fin":"08:30:00"},{"id_horario_det":"76","id_grado_asignatura":"2","id_aula":"1","id_horario_enc":"30","profesor":"Darell","fecha_crea":"2023-06-05 08:15:42","usuario_crea":"5","estado":"A","hora_inicio":"81","hora_fin":"83","duracion":"2","dia":"9","id_asignatura":"2","asignatura":"Programacion","aula":"Dim 1","inicio":"06:30:00","diaN":"Martes","fin":"08:30:00"},{"id_horario_det":"77","id_grado_asignatura":"2","id_aula":"1","id_horario_enc":"30","profesor":"Darell","fecha_crea":"2023-06-05 08:15:54","usuario_crea":"5","estado":"A","hora_inicio":"81","hora_fin":"83","duracion":"2","dia":"8","id_asignatura":"2","asignatura":"Programacion","aula":"Dim 1","inicio":"06:30:00","diaN":"Lunes","fin":"08:30:00"},{"id_horario_det":"80","id_grado_asignatura":"2","id_aula":"1","id_horario_enc":"30","profesor":"Darell","fecha_crea":"2023-06-05 15:11:13","usuario_crea":"5","estado":"A","hora_inicio":"83","hora_fin":"85","duracion":"2","dia":"10","id_asignatura":"2","asignatura":"Programacion","aula":"Dim 1","inicio":"08:30:00","diaN":"Miercoles","fin":"10:00:00"},{"id_horario_det":"81","id_grado_asignatura":"2","id_aula":"1","id_horario_enc":"30","profesor":"Darell","fecha_crea":"2023-06-05 15:11:13","usuario_crea":"5","estado":"A","hora_inicio":"83","hora_fin":"85","duracion":"2","dia":"9","id_asignatura":"2","asignatura":"Programacion","aula":"Dim 1","inicio":"08:30:00","diaN":"Martes","fin":"10:00:00"},{"id_horario_det":"82","id_grado_asignatura":"2","id_aula":"1","id_horario_enc":"30","profesor":"Darell","fecha_crea":"2023-06-05 15:11:13","usuario_crea":"5","estado":"A","hora_inicio":"83","hora_fin":"85","duracion":"2","dia":"8","id_asignatura":"2","asignatura":"Programacion","aula":"Dim 1","inicio":"08:30:00","diaN":"Lunes","fin":"10:00:00"},{"id_horario_det":"83","id_grado_asignatura":"1","id_aula":"3","id_horario_enc":"30","profesor":"Santiago","fecha_crea":"2023-06-05 15:11:33","usuario_crea":"5","estado":"A","hora_inicio":"86","hora_fin":"87","duracion":"1","dia":"9","id_asignatura":"1","asignatura":"Matematicas","aula":"Aula 05","inicio":"10:30:00","diaN":"Martes","fin":"11:30:00"},{"id_horario_det":"84","id_grado_asignatura":"1","id_aula":"3","id_horario_enc":"30","profesor":"Santiago","fecha_crea":"2023-06-05 15:11:33","usuario_crea":"5","estado":"A","hora_inicio":"86","hora_fin":"88","duracion":"2","dia":"8","id_asignatura":"1","asignatura":"Matematicas","aula":"Aula 05","inicio":"10:30:00","diaN":"Lunes","fin":"12:30:00"},{"id_horario_det":"85","id_grado_asignatura":"1","id_aula":"5","id_horario_enc":"30","profesor":"Darell","fecha_crea":"2023-06-05 15:20:39","usuario_crea":"5","estado":"A","hora_inicio":"87","hora_fin":"88","duracion":"1","dia":"9","id_asignatura":"1","asignatura":"Matematicas","aula":"dim 1","inicio":"11:30:00","diaN":"Martes","fin":"12:30:00"},{"id_horario_det":"86","id_grado_asignatura":"1","id_aula":"5","id_horario_enc":"30","profesor":"Darell","fecha_crea":"2023-06-05 15:20:39","usuario_crea":"5","estado":"A","hora_inicio":"86","hora_fin":"87","duracion":"1","dia":"10","id_asignatura":"1","asignatura":"Matematicas","aula":"dim 1","inicio":"10:30:00","diaN":"Miercoles","fin":"11:30:00"},{"id_horario_det":"87","id_grado_asignatura":"2","id_aula":"1","id_horario_enc":"30","profesor":"Darell","fecha_crea":"2023-06-05 15:25:25","usuario_crea":"5","estado":"A","hora_inicio":"81","hora_fin":"83","duracion":"2","dia":"12","id_asignatura":"2","asignatura":"Programacion","aula":"Dim 1","inicio":"06:30:00","diaN":"Viernes","fin":"08:30:00"},{"id_horario_det":"88","id_grado_asignatura":"2","id_aula":"1","id_horario_enc":"30","profesor":"Darell","fecha_crea":"2023-06-05 15:25:25","usuario_crea":"5","estado":"A","hora_inicio":"81","hora_fin":"83","duracion":"2","dia":"11","id_asignatura":"2","asignatura":"Programacion","aula":"Dim 1","inicio":"06:30:00","diaN":"Jueves","fin":"08:30:00"},{"id_horario_det":"89","id_grado_asignatura":"2","id_aula":"1","id_horario_enc":"30","profesor":"Darell","fecha_crea":"2023-06-05 15:25:25","usuario_crea":"5","estado":"A","hora_inicio":"87","hora_fin":"88","duracion":"1","dia":"10","id_asignatura":"2","asignatura":"Programacion","aula":"Dim 1","inicio":"11:30:00","diaN":"Miercoles","fin":"12:30:00"},{"id_horario_det":"90","id_grado_asignatura":"25","id_aula":"2","id_horario_enc":"30","profesor":"Darell","fecha_crea":"2023-06-05 15:25:45","usuario_crea":"5","estado":"A","hora_inicio":"83","hora_fin":"85","duracion":"2","dia":"11","id_asignatura":"7","asignatura":"POO","aula":"Laboratorio","inicio":"08:30:00","diaN":"Jueves","fin":"10:00:00"},{"id_horario_det":"91","id_grado_asignatura":"25","id_aula":"2","id_horario_enc":"30","profesor":"Darell","fecha_crea":"2023-06-05 10:27:08","usuario_crea":"5","estado":"A","hora_inicio":"83","hora_fin":"85","duracion":"2","dia":"12","id_asignatura":"7","asignatura":"POO","aula":"Laboratorio","inicio":"08:30:00","diaN":"Viernes","fin":"10:00:00"},{"id_horario_det":"92","id_grado_asignatura":"1","id_aula":"3","id_horario_enc":"30","profesor":"Darell","fecha_crea":"2023-06-05 15:28:01","usuario_crea":"5","estado":"A","hora_inicio":"86","hora_fin":"88","duracion":"2","dia":"11","id_asignatura":"1","asignatura":"Matematicas","aula":"Aula 05","inicio":"10:30:00","diaN":"Jueves","fin":"12:30:00"}]';

        $array = json_decode($json, true);

        
        // Clasificar los horarios por día de la semana
        $clasificados = array();
        foreach ($array as $horario) {
            $dia = $horario['diaN'];
            $clasificados[$dia][] = $horario;
        }
        
        // Ordenar cada grupo de horarios por hora de inicio
        foreach ($clasificados as $dia => $horarios) {
            usort($horarios, function ($a, $b) {
                return $a['hora_inicio'] - $b['hora_inicio'];
            });
            $clasificados[$dia] = $horarios;
        }
        
        // Construir el array ordenado según los días de la semana
        $ordenado = array();
        $diasSemana = ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes'];
        foreach ($diasSemana as $dia) {
            if (isset($clasificados[$dia])) {
                $ordenado = array_merge($ordenado, $clasificados[$dia]);
            }
        }


        // print_r($ordenado);
        $this->AddPage();
        
        // compute size base on current settings
        $width = $this->w - $this->lMargin - $this->rMargin;
        $height = $this->h - $this->tMargin - $this->bMargin;

        // print header
        $firstLine = $this->tinySquareSize * 8 + $this->tMargin; // Adjust the position of the header
        $this->SetXY($this->lMargin, $this->tMargin);
        $this->SetFont("Times", "B", $this->headerFontSize);
        $this->Cell($width, $firstLine, iconv('UTF-8', 'windows-1252', "Grado Aqui + Año"), 0, 0, "C"); //* INFORMACION HEADER

        $filas = 6; // * NUMERO DE CUADRICULAS EN Y

        //* GENERA LINEAS HORIZONTALES
        $this->squareHeight = ($height - 6 - $firstLine) / $filas;
        $horizontalLines = array($firstLine, 6);
        for ($i = 0; $i < $filas; ++$i) {
            $horizontalLines[$i + 2] = $this->squareHeight;
        }

        //* GENERA LINEAS VERTICALES
        
        $this->squareWidth = $width / 5; //* ESTE NUMERO REPRESENTA LA CANTIDAD DE COLUMNAS
        $verticalLines = array($this->lMargin, $this->squareWidth, $this->squareWidth, $this->squareWidth, $this->squareWidth, $this->squareWidth, $this->squareWidth, $this->squareWidth);

        //* GENERA LOS TITULOS DE LA SEMANA
        $x = 0;
        $this->SetFont("Times", "B", 12);
        $DiasES = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes'];
        for ($i = 1; $i <= 5; ++$i) {
            $x += $verticalLines[$i - 1];
            $this->SetXY($x, $firstLine);
            $this->Cell($verticalLines[$i], 6,  iconv('UTF-8', 'windows-1252', $DiasES[$i - 1]), 0, 0, "C");
        }

        //* RELLENO DE LAS CELDAS
        $cur = 1;
        $this->SetFont("Times", "B", 20);
        $x = 0;
        $y = $horizontalLines[0];
        for ($k = 0; $k < $filas; $k++) {
            $y += $horizontalLines[$k + 1];

            for ($i = 0; $i < 5; $i++) {
                $x += $verticalLines[$i];
                $this->squareWidth = $verticalLines[$i + 1];

                $this->setXY($x, $y);
                $this->SetFont("Times", "B", 20);
                $this->SetXY($x, $y + 1);
                $this->Cell(5, 5, $cur); //* relleno de cada celda

                // Buscar información correspondiente en $data

                $this->SetFont("Arial", "", 10);
                $this->SetXY($x, $y + 5);
                $this->Cell(5, 5, isset($ordenado[$cur - 1]['asignatura']) ? $ordenado[$cur - 1]['asignatura'] : 'Texto predeterminado');
                $this->SetFont("Arial", "", 10);
                $this->SetXY($x, $y + 10);
                $this->Cell(5, 5, isset($ordenado[$cur - 1]['profesor']) ? $ordenado[$cur - 1]['profesor'] : 'Texto predeterminado');
                $this->SetFont("Arial", "", 10);
                $this->SetXY($x, $y + 15);
                $this->Cell(5, 5, isset($ordenado[$cur - 1]['diaN']) ? $ordenado[$cur - 1]['diaN'] : 'Texto predeterminado');


                ++$cur;
            }

            $x = 0;
        }

        // print horizontal lines
        $ly = 0;
        $ry = 0;
        foreach ($horizontalLines as $key => $value) {
            $ly += $value;
            $ry += $value;
            $this->Line($this->lMargin, $ly, $this->lMargin + $width, $ry);
        }

        // print vertical lines
        $lx = 0;
        $rx = 0;
        foreach ($verticalLines as $key => $value) {
            $lx += $value;
            $rx += $value;
            $this->Line($lx, $firstLine, $rx, $firstLine + 6 + $this->squareHeight * $filas);
        }
    }
}

$pdf = new PDF("L", "Letter");

$pdf->SetMargins(7, 7); // * BORDES

$pdf->SetAutoPageBreak(true, 0);

// * Numero de paginas a crear
$pdf->printMonth();

$pdf->Output();
