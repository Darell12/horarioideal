<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Controllers\Principal;
use App\Models\Asignatura_profesoresModel;
use App\Controllers\Horario_det;

class Inicio extends BaseController
{
    protected $metodos, $asignatura;
    protected $CFranjas;

    public function __construct()
    {
        $this->metodos = new Principal();
        $this->CFranjas = new Horario_det();
        $this->asignatura = new Asignatura_profesoresModel();
    }
    public function index()
    {
        $cargaSideBar = $this->metodos->getModulos();
        $data = ['titulo' => 'Bienvenido!', 'Modulos' => $cargaSideBar];
        echo view('/principal/sidebar', $data);
        echo view('/inicio/inicio', $data);
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
        $resultado = array();
        $asignaturas = $this->asignatura->ObtenterAsignaturasProfes($id);
        // foreach ($asignaturas as $asignatura) {
        //     $detalle = $this->CFranjas->buscarDetalleAsignatura($asignatura['id_grado_asignatura']);
        //     array_push($resultado, $detalle[0]);
        //     // array_push($resultado, $asignatura);
            
        // }
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
}
