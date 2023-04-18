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
        // $this->eliminados = new RolesModel();
    }
    public function index()
    {
        $rol = $this->rol->obtenerRoles();

        $data = ['titulo' => 'Administrar roles', 'datos' => $rol];

       echo view('/principal/sidebar', $data);
        echo view('/roles/roles', $data);
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
        return redirect()->to(base_url('/roles'));
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

        if (
            $estado == 'E'
        ) {
            return redirect()->to(base_url('/roles'));
        } else {
            return redirect()->to(base_url('/roles/eliminados'));
        }
    }
    public function eliminados() //Mostrar vista de Paises Eliminados
    {
        $eliminados = $this->eliminados->obtenerRolesEliminados();


        // Redireccionar a la URL anterior
        if (!$eliminados) {
            // echo view('/errors/html/no_eliminados');
            $data = ['titulo' => 'Administrar Países Eliminados', 'nombre' => 'Darell E', 'datos' => 'vacio'];
            echo view('/principal/header', $data);
            echo view('/roles/eliminados', $data);
        } else {
            $data = ['titulo' => 'Administrar Países Eliminados', 'nombre' => 'Darell E', 'datos' => $eliminados];
            echo view('/principal/header', $data);
            echo view('/roles/eliminados', $data);
        }
    }

}