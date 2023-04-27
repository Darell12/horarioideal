<?php

namespace App\Controllers;

use App\Models\Asignatura_profesoresModel;
use App\Models\UsuariosModel;
use App\Models\RolesModel;

class Profesores extends BaseController
{
    protected $AsigProf;
    protected $usuarios, $roles;

    public function __construct()
    {
        $this->AsigProf = new Asignatura_profesoresModel();
        $this->usuarios = new UsuariosModel();
        $this->roles = new RolesModel();
    }

    public function index()
    {
        $usuarios = $this->usuarios->obtenerProfesores();
        $roles = $this->roles->obtenerRoles();
        $data = ['titulo' => 'Administrar Estudiantes', 'datos' => $usuarios, 'roles' =>  $roles];

        echo view('/principal/sidebar', $data);
        echo view('/profesores/profesores', $data);
    }
    public function obtenerAsignaturasProfesor($id)
    {
        $returnData = array();
        $AsigProf = $this->AsigProf->ObtenterAsignaturas($id);
        if (!empty($AsigProf)) {
            array_push($returnData, $AsigProf);
        }
        echo json_encode($returnData);
    }
    public function asignaturaProfesor($id)
    {
        $returnData = array();
        $AsigProf = $this->AsigProf->asignaturaProfesor($id);
        if (!empty($AsigProf)) {
            array_push($returnData, $AsigProf);
        }
        echo json_encode($returnData);
    }
}
