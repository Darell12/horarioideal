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
        // $modulos = $this->modulos->obtenerModulos('A');
        $cargaSideBar = $this->getModulos();
        $data = ['titulo' => 'Bienvenido!', 'Modulos' => $cargaSideBar];

        echo view('/principal/sidebar', $data);
        echo view('/inicio/inicio', $data);
    }
    public function getModulos()
    {
        $session = session();
        $rol = $session->get('id_rol');
        $permisos = $this->permisos->obtenerPermisosRol($rol);
        $acciones = [];
        $cargaSideBar = [];
        foreach ($permisos as $permiso) {
            $accion = $this->acciones->obtenerAccionesRol($permiso['id_accion']);
            array_push($acciones, $accion[0]);
        }
        foreach ($acciones as $acc) {
            $modulos = $this->modulos->obtenerModulosRol($acc['id_modulo']);
            array_push($cargaSideBar, $modulos[0]);
        }
        return $cargaSideBar;
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
