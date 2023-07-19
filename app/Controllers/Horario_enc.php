<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Horario_encModel;
use App\Models\UsuariosModel;
use App\Models\GradosModel;
use App\Models\Parametros_detModel;
use App\Controllers\Principal;
use App\Controllers\Horario_det;
use App\Models\Horario_detModel;

class Horario_enc extends BaseController
{
    protected $horario_enc, $eliminados, $horario_enc_prof;
    protected $usuarios, $grados;
    protected $profesores;
    protected $franja;
    protected $metodos, $metodosDetalle;

    public function __construct()
    {
        $this->horario_enc = new Horario_encModel();
        $this->horario_enc_prof = new Horario_detModel();
        $this->eliminados = new Horario_encModel();
        $this->usuarios = new UsuariosModel();
        $this->grados = new GradosModel();
        $this->profesores = new Horario_encModel();
        $this->franja = new Parametros_detModel();
        $this->metodos = new Principal();
        $this->metodosDetalle = new Horario_det();
    }

    public function index()
    {
        $cargaSideBar = $this->metodos->getModulos();
        $usuarios = $this->usuarios->obtenerUsuarios($estado = 'A');
        $grados = $this->grados->obtenerGrados('A');
        $horario_enc = $this->horario_enc->obtenerHorarios_enc('E');
        $horario_enc_prof = $this->horario_enc_prof->obtenerHorarios_enc();

        $data = ['titulo' => 'Administrar Horarios', 'usuarios' => $usuarios, 'grados' => $grados, 'datos' => $horario_enc,'datosprof'=>$horario_enc_prof, 'Modulos' => $cargaSideBar];

        echo view('/principal/sidebar', $data);
        echo view('/horarios_enc/horarios_enc', $data);
    }

    protected $date;
    protected $squareHeight;
    protected $squareWidth;
    protected $longestMonth;
    protected $tinySquareSize;
    protected $headerFontSize;

    public function test($id)
    {
        $encabezado = $this->horario_enc_prof->obtenerHorarios_encProfesor($id);
        return json_encode($encabezado);
    }
    public function pdfTest($id, $tipo, $idProfesor)
    {


        $rol = session('id_rol');

        switch ($tipo) {
            case 1:
                $array = $this->metodosDetalle->buscarDetalleID($id);
                $encabezado = $this->horario_enc->traer_encabezado($id);
                break;
            case 2:
                $array = $this->metodosDetalle->buscarDetalleIDProfesor($idProfesor);
                $encabezado = $this->horario_enc->traer_encabezado($id);
                break;

            default:
                break;
        }
        
        $horaDescarga = date("d-m-Y h:i");

        $pdf = new \FPDF('P', 'mm', 'letter');

        $pdf->AddPage();

        //* Header
        $pdf->SetFont('Arial', 'B', 15);

        $pdf->Ln(10);
        $pdf->Image(FCPATH . '/img/logo.png', 80, 5, 60, 0, 'PNG');

        $pdf->SetFont("Helvetica", "", 18);
        $pdf->SetXY(10, 40);
        $pdf->MultiCell(0, 30, 'Mi Horario', 0, 'L', false);

        $pdf->SetFont("Helvetica", "", 16);
        $pdf->SetXY(10, 47);

        // switch ($tipo) {
        //     case '2':
        //         $pdf->MultiCell(0, 30, iconv('UTF-8', 'windows-1252', strtoupper($encabezado['profesor'])), 0, 'L', false);
        //         break;  
        //     default:
        //     break;
        // }

        $pdf->MultiCell(0, 30, iconv('UTF-8', 'windows-1252', strtoupper($encabezado['grado'] . ' / ' . $encabezado['periodo_año'])), 0, 'L', false);

        $pdf->SetFont("Helvetica", "B", 10);
        $pdf->SetXY(10, 63);
        $pdf->MultiCell(0, 30, 'Hora de descarga:', 0, 'L', false);

        $pdf->SetFont("Helvetica", "", 10);
        $pdf->SetXY(41, 63);
        $pdf->MultiCell(0, 30, $horaDescarga, 0, 'L', false);

        switch ($rol) {
            case 1:
                $pdf->SetFont("Helvetica", "B", 10);
                $pdf->SetXY(10, 58);
                $pdf->MultiCell(0, 30, 'Administrador:', 0, 'L', false);

                $pdf->SetFont("Helvetica", "", 10);
                $pdf->SetXY(36, 58);
                $pdf->MultiCell(0, 30, iconv('UTF-8', 'windows-1252', strtoupper(session('usuario'))), 0, 'L', false);
                break;
            case 2:
                $pdf->SetFont("Helvetica", "B", 10);
                $pdf->SetXY(10, 58);
                $pdf->MultiCell(0, 30, 'Administrador:', 0, 'L', false);

                $pdf->SetFont("Helvetica", "", 10);
                $pdf->SetXY(36, 58);
                $pdf->MultiCell(0, 30, iconv('UTF-8', 'windows-1252', strtoupper(session('usuario'))), 0, 'L', false);
                break;
            case 3:
                $pdf->SetFont("Helvetica", "B", 10);
                $pdf->SetXY(10, 58);
                $pdf->MultiCell(0, 30, 'Alumno:', 0, 'L', false);

                $pdf->SetFont("Helvetica", "", 10);
                $pdf->SetXY(25, 58);
                $pdf->MultiCell(0, 30, iconv('UTF-8', 'windows-1252', strtoupper(session('usuario'))), 0, 'L', false);
                break;

            case 4:
                $pdf->SetFont("Helvetica", "B", 10);
                $pdf->SetXY(10, 58);
                $pdf->MultiCell(0, 30, 'Profesor:', 0, 'L', false);

                $pdf->SetFont("Helvetica", "", 10);
                $pdf->SetXY(26, 58);
                $pdf->MultiCell(0, 30, iconv('UTF-8', 'windows-1252', strtoupper(session('usuario'))), 0, 'L', false);
                break;

            default:
                $pdf->SetFont("Helvetica", "B", 10);
                $pdf->SetXY(10, 58);
                $pdf->MultiCell(0, 30, 'Alumno:', 0, 'L', false);

                $pdf->SetFont("Helvetica", "", 10);
                $pdf->SetXY(25, 58);
                $pdf->MultiCell(0, 30, iconv('UTF-8', 'windows-1252', strtoupper(session('usuario'))), 0, 'L', false);
                break;
        }


        function obtenerHorarioAsignatura($array, $asignatura)
        {
            $horarioAsignatura = [];
            $hora_minima = PHP_INT_MAX;
            $hora_maxima = 0;
            $profesor = '';
            $grado = '';

            foreach ($array as $horario) {
                if ($horario['id_grado_asignatura'] === $asignatura) {
                    $dia = $horario['diaN'];
                    $hora_inicio = strtotime($horario['inicio']);
                    $profesor = $horario['profesor'];
                    $area = $horario['area'];
                    $grado = $horario['grado'];
                    $nombre = $horario['asignatura'];

                    $hora_minima = min($hora_minima, $hora_inicio);

                    $hora_fin = strtotime($horario['fin']);
                    $hora_maxima = max($hora_maxima, $hora_fin);

                    if (!isset($horarioAsignatura[$dia])) {
                        $horarioAsignatura[$dia] = [
                            'hora_inicio' => $hora_inicio,
                            'hora_fin' => $hora_fin,
                            'aula' => $horario['aula'],
                            'profesor' => $profesor,
                            'area' => $area,
                            'grado' => $grado,
                            'asignatura' => $nombre,
                        ];
                    } else {
                        $horarioAsignatura[$dia]['hora_inicio'] = min($horarioAsignatura[$dia]['hora_inicio'], $hora_inicio);
                        $horarioAsignatura[$dia]['hora_fin'] = max($horarioAsignatura[$dia]['hora_fin'], $hora_fin);
                    }
                }
            }

            $hora_minima = date('H:i:s', $hora_minima);
            $hora_maxima = date('H:i:s', $hora_maxima);
            return [$horarioAsignatura, $hora_minima, $hora_maxima, $profesor, $area, $grado, $nombre];
        }

        function obtenerHorariosTodasAsignaturas($array)
        {
            $asignaturas = [];
            foreach ($array as $horario) {
                $asignatura = $horario['id_grado_asignatura'];
                if (!isset($asignaturas[$asignatura])) {
                    $asignaturas[$asignatura] = obtenerHorarioAsignatura($array, $asignatura);
                }
            }
            return $asignaturas;
        }

        $horariosTodasAsignaturas = obtenerHorariosTodasAsignaturas($array);

        // print_r($horariosTodasAsignaturas); 

        $pdf->SetFont("Helvetica", "", 16);
        $pdf->SetTextColor(74, 74, 74);
        $pdf->SetXY(10, 92);
        $pdf->MultiCell(0, 6, 'Materias', 'B', 'L', false);

        $x = 10;
        $y = 90.5;

        $asignaturaPorColumna = 5;
        $contadorAsignaturas = 0;

        foreach ($horariosTodasAsignaturas as $asignatura => $horario) {
            list($horarioAsignatura, $hora_minima, $hora_maxima, $profesor, $area, $grado, $nombre) = $horario;

            $pdf->SetFont("Helvetica", "", 8);
            $pdf->SetXY($x, $y);
            $pdf->MultiCell(0, 30, 'Area: ' . iconv('UTF-8', 'windows-1252', $area), 0, 'L', false);

            $pdf->SetFont("Helvetica", "B", 12);
            $pdf->SetXY($x, $y + 4);
            $pdf->MultiCell(0, 30, iconv('UTF-8', 'windows-1252', strtoupper($nombre)), 0, 'L', false);

            switch ($tipo) {
                case 2:
                    $pdf->SetFont("Helvetica", "", 8);
                    $pdf->SetXY($x + 4, $y + 8);
                    $pdf->MultiCell(0, 30, strtoupper($grado), 0, 'L', false);
                    $pdf->Image(FCPATH . '/img/grupo.png', $x, $y + 21, 3.5, 3.5);
                    break;
                    
                    default:
                    $pdf->SetFont("Helvetica", "", 8);
                    $pdf->SetXY($x + 4, $y + 8);
                    $pdf->MultiCell(0, 30, strtoupper($profesor), 0, 'L', false);
                    $pdf->Image(FCPATH . '/img/usuario.png', $x, $y + 20, 5, 5);
                    break;
            }


            $y_inicial_dias = $y + 24;

            foreach ($horarioAsignatura as $dia => $horas) {
                $hora_inicio = date('H:i', $horas['hora_inicio']);
                $hora_fin = date('H:i', $horas['hora_fin']);
                $aula = $horas['aula'];

                $pdf->SetFont("Helvetica", "", 8);
                $pdf->SetXY($x + 4, $y + 24);
                $pdf->MultiCell(0, 6, $dia . ' ' . $hora_inicio . ' - ' . $hora_fin, 0, 'L', false); // Reducir el espacio vertical (6 en lugar de 30)
                $y += 4; // Incremento adicional en Y para separar los datos de cada día
            }

            $y_medio_asignaturas = ($y_inicial_dias + $y) / 2;

            $pdf->SetXY($x + 5, $y_medio_asignaturas - 1.75); // Ajustar la posición antes de agregar las imágenes
            $pdf->Image(FCPATH . '/img/clock.png', $x + 0.7, $y_medio_asignaturas + 10.75, 3.5, 3.5); // Ajustar la posición del reloj


            $y_inicial_aulas = $y + 11.8;

            foreach ($horarioAsignatura as $dia => $horas) {
                $aula = $horas['aula'];

                $pdf->SetFont("Helvetica", "", 8);
                $pdf->SetXY($x + 4.3, $y + 11.8); // Ajustar la posición antes de agregar el texto del aula
                $pdf->MultiCell(0, 30,  iconv('UTF-8', 'windows-1252', strtoupper($aula)), 0, 'L', false);

                //! iconv('UTF-8', 'windows-1252', strtoupper($aula))

                $y += 4;
            }

            $y_medio_aulas = ($y_inicial_aulas + $y) / 2;

            $pdf->Image(FCPATH . '/img/classroom.png', $x + 0.7, $y_medio_aulas + 16.8, 3.5, 3.5); // Ajustar la posición del aula

            $contadorAsignaturas++;

            if ($contadorAsignaturas % $asignaturaPorColumna === 0) {
                $x = 105;
                $y = 90.5;
            } else {
                $y += 15;
            }
        }

        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFont("Helvetica", "B", 10);
        $pdf->SetXY(10, 68);
        $pdf->MultiCell(0, 30, 'Materias asignadas:', 0, 'L', false);

        $pdf->SetFont("Helvetica", "", 10);
        $pdf->SetXY(44, 68);
        $pdf->MultiCell(0, 30, $contadorAsignaturas, 0, 'L', false);

        $pdf->SetMargins(7, 7); // * BORDES
        $pdf->Output('pdf/Horario.pdf', 'F');
    }


    public function obtenerHorarios_enc()
    {
        $estado = $this->request->getPost('estado');
        $horario_enc = $this->horario_enc->obtenerHorarios_enc($estado);
        echo json_encode($horario_enc);
    }

    public function obtenerfranjas($id)
    {
        $returnData = array();
        $franja = $this->franja->ObtenerParametro($id);
        if (!empty($franja)) {
            return  json_encode($franja);
        }
        return json_encode($returnData);
    }
    public function validarFecha($fecha)
    {
        $returnData = array();
        $franja = $this->horario_enc->obtenerEncabezadosXFecha($fecha);
        if (!empty($franja)) {
            return  json_encode($franja);
        }
        return json_encode($returnData);
    }
    public function validarActivo($fecha, $grado)
    {
        $returnData = array();
        $franja = $this->horario_enc->obtenerEncabezadosXFechaGrado($fecha, $grado);
        if (!empty($franja)) {
            return  json_encode($franja);
        }
        return json_encode($returnData);
    }

    public function insertar()
    {
        $tp = $this->request->getPost('tp');
        if ($tp == 1) {

            $this->horario_enc->save([
                'id_grado' => $this->request->getPost('id_grado'),
                'periodo_año' => $this->request->getPost('periodo_año'),
                'jornada' => $this->request->getPost('jornada'),
                'duracion_hora' => $this->request->getPost('duracion'),
                'inicio' => $this->request->getPost('inicio'),
                'fin' => $this->request->getPost('fin'),
                'usuario_crea' => session('id'),

            ]);
        } else {
            $this->horario_enc->update($this->request->getPost('id'), [
                'id_grado' => $this->request->getPost('id_grado'),
                'periodo_año' => $this->request->getPost('periodo_año'),
                'jornada' => $this->request->getPost('jornada'),
                'duracion' => $this->request->getPost('duracion'),
                'inicio' => $this->request->getPost('inicio'),
                'fin' => $this->request->getPost('fin'),
                'usuario_crea' => session('id'),

            ]);
        }
        return json_encode($this->request->getPost('id'));
    }

    public function obtenerEncabezados()
    {
        $estado = $this->request->getPost('estado');
        $data = $this->horario_enc->obtenerEncabezados($estado);
        echo json_encode($data);
    }

    public function buscarhorario_enc($id)
    {
        $horario_enc = $this->horario_enc->traer_horario_enc($id);
        echo json_encode($horario_enc);
    }


    public function cambiarEstado($id, $estado)
    {
        $horario_enc = $this->horario_enc->cambiar_Estado($id, $estado);
        return '1';
    }

    public function eliminados() //Mostrar vista de Paises Eliminados
    {
        $cargaSideBar = $this->metodos->getModulos();

        // Redireccionar a la URL anterior
        $data = ['titulo' => 'Administrar Horariosenc Eliminadas', 'datos' => 'vacio', 'Modulos' => $cargaSideBar];
        echo view('/principal/sidebar', $data);
        echo view('/horarios_enc/eliminados', $data);
    }
    public function validar()
    {
        $valor = $this->request->getPost('valor');
        $campo = $this->request->getPost('campo');
        $tp = $this->request->getPost('tp');
        $id_grado = $this->request->getPost('id_grado');

        $filtro = $this->horario_enc->filtro($campo, $valor);
        if ($tp == 2 && $valor == $id_grado) {
            $respuesta = true;
            return $this->response->setJSON($respuesta);
        }

        if (empty($filtro)) {
            $respuesta = true;
            return $this->response->setJSON($respuesta);
        } else if ($filtro['periodo_año'] == $valor && $filtro['id_grado'] == $id_grado) {
            $respuesta = false;
        }
        $respuesta = false;
        return $this->response->setJSON($respuesta);
    }
}
