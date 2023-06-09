<?php

namespace App\Controllers;

use App\Models\Asignatura_profesoresModel;
use App\Models\UsuariosModel;
use App\Models\RolesModel;
use App\Models\GradosModel;
use App\Models\Parametros_detModel;
use App\Models\EmailsModel;
use App\Models\TelefonosModel;
use App\Controllers\Principal;

class Profesores extends BaseController
{
    protected $AsigProf;
    protected $usuarios, $roles, $grados;
    protected $prioridad, $tipotel, $emails;
    protected $telefonos;
    protected $metodos;

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
        $this->metodos = new Principal();
    }

    public function index()
    {
        $cargaSideBar = $this->metodos->getModulos();
        $roles = $this->roles->obtenerRoles('A');
        $grados = $this->grados->obtenerGrados('A');
        $prioridad = $this->prioridad->ObtenerParametro(2);
        $tipotel = $this->tipotel->ObtenerParametro(3);
        $id = session('id_rol');
        switch ($id) {
            case '4':
                $data = ['titulo' => 'Administrar Profesores', 'roles' =>  $roles, 'grados' => $grados, 'prioridad' => $prioridad, 'tipo' => $tipotel, 'Modulos' => $cargaSideBar];
                echo view('/principal/sidebar', $data);
                echo view('/profesores/consulta', $data);
                break;
            case '3':
                $data = ['titulo' => 'Administrar Profesores', 'roles' =>  $roles, 'grados' => $grados, 'prioridad' => $prioridad, 'tipo' => $tipotel, 'Modulos' => $cargaSideBar];
                echo view('/principal/sidebar', $data);
                echo view('/profesores/consulta', $data);
                break;
            case '2':
                $data = ['titulo' => 'Administrar Profesores', 'roles' =>  $roles, 'grados' => $grados, 'prioridad' => $prioridad, 'tipo' => $tipotel, 'Modulos' => $cargaSideBar];

                echo view('/principal/sidebar', $data);
                echo view('/profesores/profesores', $data);
                break;
            case '1':
                $data = ['titulo' => 'Administrar Profesores', 'roles' =>  $roles, 'grados' => $grados, 'prioridad' => $prioridad, 'tipo' => $tipotel, 'Modulos' => $cargaSideBar];

                echo view('/principal/sidebar', $data);
                echo view('/profesores/profesores', $data);
                break;

            default:
                $data = ['titulo' => 'Administrar Profesores', 'roles' =>  $roles, 'grados' => $grados, 'prioridad' => $prioridad, 'tipo' => $tipotel, 'Modulos' => $cargaSideBar];

                echo view('/principal/sidebar', $data);
                echo view('/profesores/profesores', $data);
                break;
        }
        
        // $session = session();
        // if (session('id_rol') == 4) {
        //     $data = ['titulo' => 'Administrar Profesores', 'roles' =>  $roles, 'grados' => $grados, 'prioridad' => $prioridad, 'tipo' => $tipotel, 'Modulos' => $cargaSideBar];
        //     echo view('/principal/sidebar', $data);
        //     echo view('/profesores/consulta', $data);
        // } else {

        //     $data = ['titulo' => 'Administrar Profesores', 'roles' =>  $roles, 'grados' => $grados, 'prioridad' => $prioridad, 'tipo' => $tipotel, 'Modulos' => $cargaSideBar];

        //     echo view('/principal/sidebar', $data);
        //     echo view('/profesores/profesores', $data);
        // }
    }
    public function eliminados()
    {
        $cargaSideBar = $this->metodos->getModulos();

        $data = ['titulo' => 'Administrar Profesores Eliminados', 'Modulos' => $cargaSideBar];
        echo view('/principal/sidebar', $data);
        echo view('/profesores/eliminados', $data);
    }
    public function obtenerProfesores()
    {
        $estado = $this->request->getPost('estado');
        $usuario = $this->usuarios->obtenerProfesores($estado);
        echo json_encode($usuario);
    }
    public function obtenerProfesoresAsignatura($id)
    {
        $AsigProf = $this->AsigProf->obtenerProfesoresAsignatura($id);
        echo json_encode($AsigProf);
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
            'usuario_crea' => session('id')
        ]);
        return json_encode('1');
    }
    public function retirarCarga()
    {
        $this->AsigProf->update($this->request->getPost('id'), ['estado' => 'E']);
        return json_encode('1');
    }
}
