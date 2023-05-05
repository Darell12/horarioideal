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
        $roles = $this->roles->obtenerRoles();

        $data = ['titulo' => 'Administrar Usuarios', 'roles' => $roles];

        echo view('/principal/sidebar', $data);
        echo view('/inicio/inicio', $data);
    }
}
