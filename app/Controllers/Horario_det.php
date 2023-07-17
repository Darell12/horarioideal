<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AsignaturasModel;
use App\Models\Horario_detModel;
use App\Models\UsuariosModel;
use App\Models\GradosModel;
use App\Models\Horario_encModel;
use App\Models\HorarioModel;
use App\Models\Grados_asignaturaModel;
use App\Models\Parametros_detModel;
use App\Controllers\Principal;
use App\Models\EstudiantesModel;
use App\Controllers\Grados;


class Horario_det extends BaseController
{
    protected $horario_det, $eliminados;
    protected $horario;
    protected $usuarios, $grados, $asignatura;
    protected $franja;
    protected $metodos;
    protected $InfoGrado, $estudiante;


    public function __construct()
    {
        $this->horario_det = new Horario_detModel();
        $this->horario = new Horario_encModel();
        $this->eliminados = new Horario_detModel();
        $this->usuarios = new UsuariosModel();
        $this->grados = new GradosModel();
        $this->asignatura = new AsignaturasModel();
        $this->franja = new Parametros_detModel();
        $this->metodos = new Principal();
        $this->InfoGrado = new Grados();
        $this->estudiante = new EstudiantesModel();
    }

    public function index($id)
    {
        $cargaSideBar = $this->metodos->getModulos();
        $horario_det = $this->horario_det->obtenerDetalle_horario($id);
        $usuarios = $this->usuarios->obtenerUsuarios($estado = "A");
        $horario = $this->horario->traer_horario_enc($id);
        $grados = $this->grados->obtenerGrados('A');
        $nombreGrado = $this->grados->NombreGrado($horario['id_grado']);
        $asignatura = $this->asignatura->buscarAsignaturasxGrado($horario['id_grado']);

        $data = ['titulo' => 'Administrar Horario ' . $nombreGrado['alias'] . ' ' . $horario['periodo_año'], 'datos' => $horario, 'id' => $id, 'usuarios' => $usuarios, 'grados' => $grados, 'asignaturas' => $asignatura, 'Modulos' => $cargaSideBar];

        echo view('/principal/sidebar', $data);
        echo view('/horarios_det/detalle', $data);
    }
    public function insertar($asignatura, $aula, $dia, $inicio, $fin, $encabezado, $profesor, $duracion)
    {

        $this->horario_det->save([
            'id_grado_asignatura' => $asignatura,
            'id_aula' => $aula,
            'dia' => $dia,
            'hora_inicio' => $inicio,
            'hora_fin' =>  $fin,
            'id_horario_enc' => $encabezado,
            'profesor' => $profesor,
            'duracion' => $duracion,
            'usuario_crea' => session('id'),
        ]);
        return json_encode(1);
    }
    public function cambiarEstado($id, $estado)
    {
        $horario_det = $this->horario_det->cambiarEstado($id, $estado);
        return json_encode('Todo bien');
    }

    public function buscarDetalle()
    {
        $id = $this->request->getPost('id');
        $horario_det = $this->horario_det->obtenerDetalle_horario($id);
        echo json_encode($horario_det);
    }
    public function buscarDetalleGrado()
    {
        $id = $this->request->getPost('id');
        $encabezado = $this->horario->obtenerEncabezadosGrado('A', $id);
        $horario_det = $this->horario_det->obtenerDetalles($encabezado['id_horarios_enc']);
        return json_encode($horario_det);
    }
    public function buscarDetalleGradoId($id)
    {
        $encabezado = $this->horario->obtenerEncabezadosGrado('A', $id);
        $horario_det = $this->horario_det->obtenerDetalles($encabezado['id_horarios_enc']);
        return json_encode($horario_det);
    }
    public function buscarDetalles()
    {
        $horario_det = $this->horario_det->buscarDetalles();
        echo json_encode($horario_det);
    }
    public function buscarDetalleProfe($id)
    {
        $horario_det = $this->horario_det->buscarDetalleProfe($id);
        echo json_encode($horario_det);
    }
    public function buscarDetalleEstudiante($id)
    {
        $estudiante = $this->estudiante->buscarEstudiantesPorId($id);
        $grado = $estudiante['id_grado'];
        $encabezado = $this->horario->obtenerEncabezadosGrado('A', $grado);
        $horario_det = $this->horario_det->obtenerDetalle_horario($encabezado['id_horarios_enc']);
        return json_encode($horario_det);
    }
    public function buscarDetalleAula($id)
    {
        $horario_det = $this->horario_det->buscarDetalleAula($id);
        echo json_encode($horario_det);
    }
    public function buscarDetalleAulaRango($id, $inicio, $fin)
    {
        $horario_det = $this->horario_det->buscarDetalleAulaRango($id, $inicio, $fin);
        echo json_encode($horario_det);
    }
    public function buscarDetalleAsignatura($id)
    {
        $horario_det = $this->horario_det->buscarDetalleAsignatura($id);
        return $horario_det;
    }
    public function ObtenterGradosProfes($id)
    {
        $horario_det = $this->horario_det->buscarDetalleAsignatura($id);
        return $horario_det;
    }
    public function buscarDetalleDia()
    {
        $horario_det = $this->horario_det->buscarDetalleAula(8);
        echo json_encode($horario_det);
    }
    public function obtenerDetalles($id)
    {
        $horario_det = $this->horario_det->obtenerDetalles($id);
        echo json_encode($horario_det);
    }
    public function obtenerFranjas60()
    {
        $franja = $this->franja->ObtenerParametro(13);
        echo json_encode($franja);
    }
    public function obtenerFranjas45()
    {
        $franja = $this->franja->ObtenerParametro(12);
        echo json_encode($franja);
    }
}
