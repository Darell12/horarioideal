<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Controllers\Principal;

class Inicio extends BaseController
{
    protected $metodos;

    public function __construct()
    {
        $this->metodos = new Principal();
    }
    public function index()
    {
        $cargaSideBar = $this->metodos->getModulos();
        $data = ['titulo' => 'Bienvenido!', 'Modulos' => $cargaSideBar];
        echo view('/principal/sidebar', $data);
        echo view('/inicio/inicio', $data);
    }
}