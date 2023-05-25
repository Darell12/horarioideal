<?php

namespace App\Controllers;
use App\Models\UsuariosModel;
use App\Models\RolesModel;
use App\Models\ModulosModel;
use App\Models\PermisosModel;
use App\Models\AccionesModel;

class Principal extends BaseController
{
    protected $usuario, $eliminados;
    protected $roles, $modulos, $permisos, $acciones;

    public function __construct()
    {
        $this->usuario = new UsuariosModel();
        $this->eliminados = new UsuariosModel();
        $this->roles = new RolesModel();
        $this->modulos = new ModulosModel();
        $this->permisos = new PermisosModel();
        $this->acciones = new AccionesModel();
    }
    public function index()
    {
        $session = session();
        // $session['id_rol']
        $accionees = $this->acciones->obtenerAcciones('Ä');
        $modulos = $this->modulos->obtenerModulos('A');
        $data = ['titulo' => 'Bienvenido!', 'Modulos' => $modulos];

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
