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
    public function ejecutar_script($dato1, $dato2)
    {
        $output = array();
        $return = 0;
        $ruta = FCPATH . 'scripts/my_script.py';

        // Datos a enviar al script de Python
        $parametro1 = $dato1;
        $parametro2 = $dato2;

        // Construir el comando con los argumentos de línea de comandos
        $comando = "python $ruta \"$parametro1\" \"$parametro2\"";
        exec($comando, $output, $return);

        if ($return == 0) {
            $resultado = $output[0];
            echo 'El resultado es: ' . $resultado;
        } else {
            echo 'Error al ejecutar el script de Python';
        }
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
    public function Modulos()
    {
        $modulos = $this->modulos->obtenerModulos('A');
        return $modulos;
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
