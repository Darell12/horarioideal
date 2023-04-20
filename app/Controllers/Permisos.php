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
        $permiso = $this->permiso->obtenerPermisos();
        $roles = $this->roles->obtenerRoles();
        $acciones = $this->acciones->obtenerAcciones();

        $data = ['titulo' => 'Administrar Permisos', 'datos' => $permiso, 'roles' => $roles, 'acciones' => $acciones];

       echo view('/principal/sidebar', $data);
       echo view('/permisos/permisos', $data);
    }

    public function insertar()
    {
        $tp = $this->request->getPost('tp');
        if ($tp == 1) {

            $this->permiso->save([
                'rol' => $this->request->getPost('id_rol'),
                'accion' => $this->request->getPost('id_accion'),
                'usuario_crea'=> session('id')
            ]);
        } else {
            $this->permiso->update($this->request->getPost('id'), [
                'id_rol' => $this->request->getPost('rol'),
                'id_accion' => $this->request->getPost('accion'),
                'usuario_crea'=> session('id')
            ]);
        }
        return redirect()->to(base_url('/permisos'));
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
        $permiso = $this->permiso->cambiar_Estado($id, $estado);
        

        if (
            $estado == 'E'
        ) {
            return redirect()->to(base_url('/ver_permisos'));
        } else {
            return redirect()->to(base_url('/eliminados_permisos'));
        }
    }

    public function eliminados() //Mostrar vista de Paises Eliminados
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

}