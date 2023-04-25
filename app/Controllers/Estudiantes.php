<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\EstudiantesModel;
use App\Models\RolesModel;
use App\Models\UsuariosModel;
use App\Models\GradosModel;

class Estudiantes extends BaseController
{
    protected $estudiantes, $eliminados;
    protected $roles, $usuarios, $grados;
    
    public function __construct()
    {
        $this->estudiantes = new EstudiantesModel();
        $this->usuarios = new UsuariosModel();
        $this->eliminados = new EstudiantesModel();
        $this->roles = new RolesModel();
        $this->grados = new GradosModel();
    }
    public function index()
    {
        // $estudiantes = $this->estudiantes->obtenerEstudiantes();    
        $usuarios = $this->usuarios->obtenerEstudiantes();    
        $roles = $this->roles->obtenerRoles();    
        $grados = $this->grados->obtenerGrados();    
        $data = ['titulo' => 'Administrar Estudiantes', 'datos' => $usuarios, 'roles' =>  $roles, 'grados' => $grados];

        echo view('/principal/sidebar', $data);
        echo view('/estudiantes/estudiantes', $data);
    }
    public function insertar()
    {
        $tp = $this->request->getPost('tp');
        if ($tp == 1) {

            $this->estudiantes->save([
                // 'id_estudiante' => $this->request->getPost('id_estudiante'),
                'id_usuario' => $this->request->getPost('id_usuario'),
                'id_grado' => $this->request->getPost('id_grado'),
                'usuario_crea'=> session('id')
            ]);
        } else {
            $this->estudiantes->update($this->request->getPost('id'), [
                'id_estudiante' => $this->request->getPost('id_estudiante'),
                'id_usuario' => $this->request->getPost('id_usuario'),
                'id_grado' => $this->request->getPost('id_grado'),
                'usuario_crea'=> session('id')
            ]);
        }
        return redirect()->to(base_url('/estudiantes'));
    }

    public function buscarEstudiantes($id)
    {
        $returnData = array();
        $estudiantes = $this->estudiantes->buscarEstudiantes($id);
        if (!empty($estudiantes)) {
            array_push($returnData, $estudiantes);
        }
        echo json_encode($returnData);
    }

    public function cambiarEstado($id, $estado)
    {
        $estudiantes = $this->estudiantes->cambiar_Estado($id, $estado);

        if (
            $estado == 'E'
        ) {
            return redirect()->to(base_url('/ver_estudiantes'));
        } else {
            return redirect()->to(base_url('/eliminados_estudiantes'));
        }
    }
    public function eliminados() //Mostrar vista de Paises Eliminados
    {
        $eliminados = $this->eliminados->obtenerEstudiantesEliminados();


        // Redireccionar a la URL anterior
        if (!$eliminados) {
            $data = ['titulo' => 'Administrar Estudiantes Eliminados','datos' => 'vacio'];
            echo view('/principal/sidebar', $data);
            echo view('/estudiante  s/eliminados', $data);
        } else {
            $data = ['titulo' => 'Administrar Estudiantes Eliminados', 'datos' => $eliminados];
            echo view('/principal/sidebar', $data);
            echo view('/estudiantes/eliminados', $data);
        }
    }
}