<?php

namespace App\Controllers;

use App\Models\HistorialModel;
use App\Models\UsuariosModel;
use App\Controllers\Principal;

class Historial extends BaseController
{
    protected $usuario, $historial,$metodos;

    public function __construct()
    {
        $this->usuario = new UsuariosModel();
        $this->historial = new HistorialModel();
        $this->metodos = new Principal();
    }

    public function index()
    {
        $cargaSideBar = $this->metodos->getModulos();
        $historial = $this->historial->obtenerHistorial('A');
        $data = ['titulo' => 'Historial de acciones','historial'=>$historial, 'Modulos' => $cargaSideBar];

        echo view('/principal/sidebar', $data);
        echo view('/historial/historial', $data);
    }
    
    public function obtenerHistorial()
    {
        $historial = $this->historial->obtenerHistorial();
        echo json_encode($historial);
    }
   
}
