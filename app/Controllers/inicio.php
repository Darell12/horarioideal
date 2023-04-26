<?php

namespace App\Controllers;

use App\Controllers\BaseController;


class Inicio extends BaseController
{
    public function index()
    {
       echo view('/principal/sidebar');
        echo view('/inicio/inicio');
    }
}