<?php

namespace App\Controllers;
use App\Models\UsuariosModel;
use App\Models\RolesModel;

class Principal extends BaseController
{
    protected $usuario, $eliminados;
    protected $roles;

    public function __construct()
    {
        $this->usuario = new UsuariosModel();
        $this->eliminados = new UsuariosModel();
        $this->roles = new RolesModel();
    }
    public function index()
    {

        $data = ['titulo' => 'Bienvenido!'];

        echo view('/principal/sidebar', $data);
        echo view('/inicio/inicio', $data);
    }
    public function graficaUsuarios()
    {
        $returnData = array();
        $usuario = $this->usuario->obtenerUsuariosChart();
        if (!empty($usuario)) {
            array_push($returnData, $usuario);
        }
        echo json_encode($returnData);
    }
    public function graficaProfesores()
    {
        $returnData = array();
        $usuario = $this->usuario->obtenerPChart();
        if (!empty($usuario)) {
            array_push($returnData, $usuario);
        }
        echo json_encode($returnData);
    }
}
