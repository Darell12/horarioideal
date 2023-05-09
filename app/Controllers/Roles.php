<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RolesModel;


class Roles extends BaseController
{
    protected $rol, $eliminados;


    public function __construct()
    {
        $this->rol = new RolesModel();
        $this->eliminados = new RolesModel();
    }
    public function index()
    {
        $data = ['titulo' => 'Administrar Roles'];

        echo view('/principal/sidebar', $data);
        echo view('/roles/roles', $data);
    }
    public function obtenerRoles()
    {
        $estado = $this->request->getPost('estado');
        $rol = $this->rol->obtenerRoles($estado);
        echo json_encode($rol);
    }
    public function insertar()
    {
        $tp = $this->request->getPost('tp');
        if ($tp == 1) {

            $this->rol->save([
                'nombre' => $this->request->getPost('nombre_rol'),
                'usuario_crea'=> session('id')
            ]);
        } else {
            $this->rol->update($this->request->getPost('id'), [
                'nombre' => $this->request->getPost('nombre_rol'),
                'usuario_crea'=> session('id')
            ]);
        }
        return json_encode('Se inserto un rol');
    }

    public function buscarRol($id)
    {
        $returnData = array();
        $rol = $this->rol->buscarRol($id);
        if (!empty($rol)) {
            array_push($returnData, $rol);
        }
        echo json_encode($returnData);
    }

    public function cambiarEstado($id, $estado)
    {
        $rol = $this->rol->cambiar_Estado($id, $estado);
        return json_encode('😊');
    }
    
    public function eliminados() //Mostrar vista de Paises Eliminados
    {
        $eliminados = $this->eliminados->obtenerRolesEliminados();


        // Redireccionar a la URL anterior
        if (!$eliminados) {
            $data = ['titulo' => 'Administrar Roles Eliminados','datos' => 'vacio'];
            echo view('/principal/sidebar', $data);
            echo view('/roles/eliminados', $data);
        } else {
            $data = ['titulo' => 'Administrar Roles Eliminados', 'datos' => $eliminados];
            echo view('/principal/sidebar', $data);
            echo view('/roles/eliminados', $data);
        }
    }
    public function validar()
    {
        $valor = $this->request->getPost('valor');
        $campo = $this->request->getPost('campo');
        $tp = $this->request->getPost('tp');
        $nombre_rol = $this->request->getPost('nombre_rol');

        $filtro = $this->rol->filtro($campo, $valor);
        if ($tp == 2 && $valor == $nombre_rol) {
            $respuesta = true;
            return $this->response->setJSON($respuesta);
        }
        if (empty($filtro)) {
            $respuesta = true;
            return $this->response->setJSON($respuesta);
        } else {
            $respuesta = false;
        }
        return $this->response->setJSON($respuesta);
    }
}