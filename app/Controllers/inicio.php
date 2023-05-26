<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Controllers\Principal;
use App\Models\Asignatura_profesoresModel;

class Inicio extends BaseController
{
    protected $metodos, $asignatura;

    public function __construct()
    {
        $this->metodos = new Principal();
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
        $asignatura = $this->asignatura->ObtenterAsignaturas($id);
        if (!empty($asignatura)) {
            return  json_encode($asignatura);
        }
        return json_encode($returnData);
    }
}
