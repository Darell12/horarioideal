<?php

namespace App\Controllers;
use App\Models\UsuariosModel;

class Principal extends BaseController
{
    protected $usuario, $eliminados;

    public function __construct()
    {
        $this->usuario = new UsuariosModel();
        $this->eliminados = new UsuariosModel();
    }
    public function index()
    {
        $usuario = $this->usuario->obtenerUsuarios();

        $data = ['titulo' => 'Administrar Usuarios', 'nombre' => 'Darell E', 'datos' => $usuario];


        echo view('principal/sidebar');
        echo view('usuarios/usuarios', $data);
    }
}
