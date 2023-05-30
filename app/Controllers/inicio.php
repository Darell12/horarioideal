<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Controllers\Principal;
use App\Models\Asignatura_profesoresModel;
use App\Models\EstudiantesModel;
use App\Controllers\Horario_det;
use App\Controllers\Grados;

class Inicio extends BaseController
{
    protected $metodos, $asignatura;
    protected $CFranjas, $grado;
    protected $InfoGrado;

    public function __construct()
    {
        $this->metodos = new Principal();
        $this->CFranjas = new Horario_det();
        $this->InfoGrado = new Grados();
        $this->asignatura = new Asignatura_profesoresModel();
        $this->grado = new EstudiantesModel();
    }
    public function index()
    {
        $session = session();
        $id = session('id_rol');
        switch ($id) {
            case '4':
                $cargaSideBar = $this->metodos->getModulos();
                $data = ['titulo' => 'Bienvenido!', 'Modulos' => $cargaSideBar];
                echo view('/principal/sidebar', $data);
                echo view('/inicio/profesoresInicio', $data);
                break;
            case '3':
                $cargaSideBar = $this->metodos->getModulos();
                $data = ['titulo' => 'Bienvenido!', 'Modulos' => $cargaSideBar];
                echo view('/principal/sidebar', $data);
                echo view('/inicio/estudiantesInicio', $data);
                break;
            case '2':
                $cargaSideBar = $this->metodos->getModulos();
                $data = ['titulo' => 'Bienvenido!', 'Modulos' => $cargaSideBar];
                echo view('/principal/sidebar', $data);
                echo view('/inicio/inicio', $data);
                break;
            case '1':
                $cargaSideBar = $this->metodos->getModulos();
                $data = ['titulo' => 'Bienvenido!', 'Modulos' => $cargaSideBar];
                echo view('/principal/sidebar', $data);
                echo view('/inicio/inicio', $data);
                break;

            default:
                $cargaSideBar = $this->metodos->getModulos();
                $data = ['titulo' => 'Bienvenido!', 'Modulos' => $cargaSideBar];
                echo view('/principal/sidebar', $data);
                echo view('/inicio/inicio', $data);
                break;
        }
    }

    public function gradosAsignados()
    {
        $cargaSideBar = $this->metodos->getModulos();
        $data = ['titulo' => 'Bienvenido!', 'Modulos' => $cargaSideBar];
        echo view('/principal/sidebar', $data);
        echo view('/horarios_det/grados', $data);
    }

    public function test()
    {
        $cargaSideBar = $this->metodos->getModulos();
        $data = ['titulo' => 'Bienvenido!', 'Modulos' => $cargaSideBar];
        echo view('/principal/sidebar', $data);
        echo view('/inicio/test', $data);
    }
    public function ConsultaAsignaturas($id)
    {
        $returnData = array();
        $asignaturas = $this->asignatura->ObtenterAsignaturasProfes($id);
        if (!empty($asignaturas)) {
            return json_encode($asignaturas);
        }
        return json_encode($returnData);
    }
    public function ConsultaGrados($id)
    {
        $returnData = array();
        $asignaturas = $this->asignatura->ObtenterGradosProfes($id);
        if (!empty($asignaturas)) {
            return json_encode($asignaturas);
        }
        return json_encode($returnData);
    }
    public function ConsultaDetalleAsignaturas($id)
    {
        $returnData = array();
        $asignaturas = $this->CFranjas->buscarDetalleAsignatura($id);

        if (!empty($asignaturas)) {
            return json_encode($asignaturas);
        }
        return json_encode($returnData);
    }
    public function ConsultaAsignaturasPorGrado($id)
    {
        $returnData = array();
        $estudiante = $this->grado->buscarEstudiantesPorId($id);
        $grado = $estudiante['id_grado'];
        $asignaturas = $this->InfoGrado->obtenerAsignaturasS($grado);
        if (!empty($asignaturas)) {
            return $asignaturas;
        }
        return json_encode($returnData);
    }
    public function ConsultaDetalleGrados($id)
    {
        $returnData = array();
        $asignaturas = $this->CFranjas->buscarDetalleAsignatura($id);

        if (!empty($asignaturas)) {
            return json_encode($asignaturas);
        }
        return json_encode($returnData);
    }
    public function estudiantes()
    {
        $cargaSideBar = $this->metodos->getModulos();
        $data = ['titulo' => 'Bienvenido!', 'Modulos' => $cargaSideBar];
        echo view('/principal/sidebar', $data);
        echo view('/inicio/estudiantesInicio', $data);
    }
}
