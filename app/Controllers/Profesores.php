<?php

namespace App\Controllers;

use App\Models\Asignatura_profesoresModel;
use App\Models\UsuariosModel;
use App\Models\RolesModel;
use App\Models\GradosModel;
use App\Models\Parametros_detModel;
use App\Models\EmailsModel;
use App\Models\TelefonosModel;

class Profesores extends BaseController
{
    protected $AsigProf;
    protected $usuarios, $roles, $grados;
    protected $prioridad, $tipotel, $emails;
    protected $telefonos;

    public function __construct()
    {
        $this->AsigProf = new Asignatura_profesoresModel();
        $this->usuarios = new UsuariosModel();
        $this->roles = new RolesModel();
        $this->grados = new GradosModel();
        $this->prioridad = new Parametros_detModel();
        $this->tipotel = new Parametros_detModel();
        $this->emails = new EmailsModel();
        $this->telefonos = new TelefonosModel();
    }

    public function index()
    {
        $roles = $this->roles->obtenerRoles();
        $grados = $this->grados->obtenerGrados();
        $prioridad = $this->prioridad->ObtenerParametro(2);
        $tipotel = $this->tipotel->ObtenerParametro(3);
        $data = ['titulo' => 'Administrar Profesores', 'roles' =>  $roles, 'grados' => $grados, 'prioridad' => $prioridad, 'tipo' => $tipotel];

        echo view('/principal/sidebar', $data);
        echo view('/profesores/profesores', $data);
    }
    public function eliminados() 
    {
            $data = ['titulo' => 'Administrar Profesores Eliminados', ];
            echo view('/principal/sidebar', $data);
            echo view('/profesores/eliminados', $data);
    }
    public function obtenerProfesores()
    {
        $estado = $this->request->getPost('estado');
        $usuario = $this->usuarios->obtenerProfesores($estado);
        echo json_encode($usuario);
    }
    public function obtenerCarga($id)
    {
        $AsigProf = $this->AsigProf->ObtenterAsignaturas($id);
        return json_encode($AsigProf);
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
    public function insertarCarga()
    {
        $this->AsigProf->save([
            'id_usuario' => $this->request->getPost('id'),
            'id_grado_asignatura' => $this->request->getPost('id_grado_asignatura'),
            'usuario_crea'=> session('id')
        ]); 
        return json_encode('1');
    }
    public function retirarCarga()
    {
        $this->AsigProf->update($this->request->getPost('id'), ['estado'=>'E']);
        return json_encode('1');
    }
    
}
