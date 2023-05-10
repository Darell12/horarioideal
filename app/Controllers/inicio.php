<?php

namespace App\Controllers;

use App\Controllers\BaseController;


class Inicio extends BaseController
{
    public function index()
    {
        $data = ['titulo' => 'Horario'];
        echo view('/principal/sidebar', $data);
        echo view('/inicio/inicio', $data);
    }
}