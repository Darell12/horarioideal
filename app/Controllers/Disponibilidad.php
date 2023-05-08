<?php

namespace App\Controllers;

use App\Models\Disponibilidad_profModel;
use App\Models\RolesModel;
use App\Models\UsuariosModel;
class disponibilidad extends BaseController
{
    protected $AsigProf;
    protected $disponibilidad, $roles,$usuarios;

    public function __construct()
    {
        
        $this->disponibilidad = new Disponibilidad_profModel();
        $this->usuarios = new UsuariosModel();
        $this->roles = new RolesModel();
    }

    public function index()
    {
        $usuarios = $this->usuarios->ObtenterDispos(0);
        $roles = $this->roles->obtenerRoles();
        $data = ['titulo' => 'Administrar Disponibilidad',  'roles' =>  $roles];

        echo view('/principal/sidebar', $data);
        echo view('/disponibilidad/disponibilidad', $data);
    }
    public function disponibilidadXProfesor($id)
    {
        $disponibilidad = $this->disponibilidad->ObtenterDisponibilidad($id);
        $roles = $this->roles->obtenerRoles();
        $data = ['titulo' => 'Administrar Disponibilidad', 'datos' => $disponibilidad, 'roles' =>  $roles];

        echo view('/principal/sidebar', $data);
        echo view('/disponibilidad/disponibilidad', $data);
    }
    
    public function obtenerDisponibilidadProfesor($id)
    {
        $returnData = array();
        $AsigProf = $this->AsigProf->ObtenterDisponibilidad($id);
        if (!empty($AsigProf)) {
            array_push($returnData, $AsigProf);
        }
        echo json_encode($returnData);
    }
    public function disponibilidadProfesor($id)
    {
        $returnData = array();
        $AsigProf = $this->AsigProf->disponibilidadProfesor($id);
        if (!empty($AsigProf)) {
            array_push($returnData, $AsigProf);
        }
        echo json_encode($returnData);
    }

    
}

