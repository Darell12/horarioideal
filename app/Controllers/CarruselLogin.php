<?php

namespace App\Controllers;

use App\Controllers\BaseController;


class Roles extends BaseController
{
    protected $rol, $eliminados;
    protected $metodos;

    public function __construct()
    {

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


}
