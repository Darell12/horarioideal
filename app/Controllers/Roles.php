<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RolesModel;
use App\Controllers\Principal;

class Roles extends BaseController
{
    protected $rol, $eliminados;
    protected $metodos;

    public function __construct()
    {
        $this->rol = new RolesModel();
        $this->eliminados = new RolesModel();
        $this->metodos = new Principal();
    }
    public function index()
    {
        $cargaSideBar = $this->metodos->getModulos();
        $data = ['titulo' => 'Administrar Roles', 'Modulos' => $cargaSideBar];

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
                'usuario_crea' => session('id')
            ]);
        } else {
            $this->rol->update($this->request->getPost('id'), [
                'nombre' => $this->request->getPost('nombre_rol'),
                'usuario_crea' => session('id')
            ]);
        }
        return json_encode('Se insertó un rol');
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
        $cargaSideBar = $this->metodos->getModulos();
        // Redireccionar a la URL anterior
        $data = ['titulo' => 'Administrar Roles Eliminados', 'datos' => 'vacio', 'Modulos' => $cargaSideBar];
        echo view('/principal/sidebar', $data);
        echo view('/roles/eliminados', $data);
    }
    public function validar()
    {
        $valor = $this->request->getPost('valor');
        $campo = $this->request->getPost('campo');
        $tp = $this->request->getPost('tp');
        $nombreActu = $this->request->getPost('nombreActu');
        $numeroActu = $this->request->getPost('numeroActu');

        $filtro = $this->rol->filtro($campo, $valor);
        if ($tp == 2 && $valor == $nombreActu) {
            $respuesta = true;
            return $this->response->setJSON($respuesta);
        }
        if ($tp == 2 && $valor == $numeroActu) {
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
