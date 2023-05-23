<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PermisosModel;
use App\Models\RolesModel;
use App\Models\AccionesModel;


class Permisos extends BaseController
{
    protected $permiso, $eliminados;
    protected $roles, $acciones;


    public function __construct()
    {
        $this->permiso = new PermisosModel();
        $this->eliminados = new PermisosModel();
        $this->roles = new RolesModel();
        $this->acciones = new AccionesModel();
    }

    public function index()
    {
        $permiso = $this->permiso->obtenerPermisos('A');
        $roles = $this->roles->obtenerRoles('A');
        $acciones = $this->acciones->obtenerAcciones('A');

        $data = ['titulo' => 'Administrar Permisos', 'datos' => $permiso, 'roles' => $roles, 'acciones' => $acciones];

       echo view('/principal/sidebar', $data);
       echo view('/permisos/permisos', $data);
    }

    public function insertar()
    {
        $tp = $this->request->getPost('tp');
        if ($tp == 1) {

            $this->permiso->save([
                'id_rol' => $this->request->getPost('id_rol'),
                'id_accion' => $this->request->getPost('id_accion'),
                'usuario_crea'=> session('id')
            ]);
        } else {
            $this->permiso->update($this->request->getPost('id'), [
                'id_rol' => $this->request->getPost('id_rol'),
                'id_accion' => $this->request->getPost('id_accion'),
                'usuario_crea'=> session('id')
            ]);
        }
        return json_encode('sirve');
    }

    public function obtenerPermisos()
    {
        $estado = $this->request->getPost('estado');
        $permiso = $this->permiso->obtenerPermisos($estado);
        echo json_encode($permiso);
    }

    public function buscarPermiso($id)
    {
        $returnData = array();
        $permiso = $this->permiso->buscarPermiso($id);
        if (!empty($permiso)) {
            array_push($returnData, $permiso);
        }
        echo json_encode($returnData);
    }

    public function cambiarEstado($id, $estado)
    {
        $permiso = $this->permiso->cambiarEstado($id, $estado);
        return json_encode('sdf');
    }
    public function eliminados() //Mostrar vista de Permisos Eliminados
    {
        $eliminados = $this->eliminados->obtenerPermisosEliminados();


        // Redireccionar a la URL anterior
        if (!$eliminados) {
            $data = ['titulo' => 'Administrar Permisos Eliminadas','datos' => 'vacio'];
            echo view('/principal/sidebar', $data);
            echo view('/permisos/eliminados', $data);
        } else {
            $data = ['titulo' => 'Administrar Permisos Eliminadas', 'datos' => $eliminados];
            echo view('/principal/sidebar', $data);
            echo view('/permisos/eliminados', $data);
        }
    }

    public function validarP()
    {
        $valor = $this->request->getPost('valor');
        $campo = $this->request->getPost('campo');
        $tp = $this->request->getPost('tp');
        $nombreActu = $this->request->getPost('nombreActu');
        $numeroActu = $this->request->getPost('numeroActu');

        $filtro = $this->permiso->filtro($campo, $valor);
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