<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EstudiantesModel;
use App\Models\RolesModel;
use App\Models\UsuariosModel;
use App\Models\GradosModel;
use App\Models\Parametros_detModel;
use App\Models\EmailsModel;
use App\Models\TelefonosModel;


class Estudiantes extends BaseController
{
    protected $estudiantes, $eliminados;
    protected $roles, $usuarios, $grados;
    protected $prioridad, $tipotel, $emails, $telefonos;


    public function __construct()
    {
        $this->estudiantes = new EstudiantesModel();
        $this->usuarios = new UsuariosModel();
        $this->eliminados = new EstudiantesModel();
        $this->roles = new RolesModel();
        $this->grados = new GradosModel();
        $this->tipotel = new Parametros_detModel();
        $this->emails = new EmailsModel();
        $this->telefonos = new TelefonosModel();
        $this->prioridad = new Parametros_detModel();


    }
    public function index()
    {
        $roles = $this->roles->obtenerRoles();
        $grados = $this->grados->obtenerGrados();
        $prioridad = $this->prioridad->ObtenerParametro(2);
        $tipotel = $this->tipotel->ObtenerParametro(3);

        $data = ['titulo' => 'Administrar Estudiantes', 'roles' =>  $roles, 'grados' => $grados,  'prioridad' => $prioridad, 'tipo' => $tipotel];

        echo view('/principal/sidebar', $data);
        echo view('/estudiantes/estudiantes', $data);
    }

    public function obtenerEstudiantes()
    {
        $estado = $this->request->getPost('estado');
        $usuarios = $this->usuarios->obtenerEstudiantes($estado);
        echo json_encode($usuarios);
    }
    public function insertar()
    {
        $tp = $this->request->getPost('tp');
        if ($tp == 1) {
            $password = $this->request->getVar('contraseña');
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);


            $this->usuarios->save([
                'tipo_documento' => $this->request->getPost('tipo_documento'),
                'n_documento' => $this->request->getPost('n_documento'),
                'nombre_corto' => $this->request->getPost('nombre_corto'),
                'nombre_p' => $this->request->getPost('primer_nombre'),
                'nombre_s' => $this->request->getPost('segundo_nombre'),
                'apellido_p' => $this->request->getPost('primer_apellido'),
                'apellido_s' => $this->request->getPost('segundo_apellido'),
                'perfil' => $this->request->getPost('perfil'),
                'email' => $this->request->getPost('email'),
                'contraseña' => $hashedPassword,
                'id_rol' => $this->request->getPost('id_rol'),
                'usuario_crea' => session('id'),
                'direccion' => $this->request->getPost('direccionX'),
            ]);

            $idIngreso = $this->usuarios->getInsertID();
            
            $this->estudiantes->save([
                'id_usuario' => $idIngreso,
                'id_grado' => $this->request->getPost('id_grado'),
                'usuario_crea' => session('id')
            ]);

            return json_encode($idIngreso);
        } else {
            $this->usuarios->update($this->request->getPost('id'), [
                'tipo_documento' => $this->request->getPost('tipo_documento'),
                'n_documento' => $this->request->getPost('n_documento'),
                'nombre_corto' => $this->request->getPost('nombre_corto'),
                'nombre_p' => $this->request->getPost('primer_nombre'),
                'nombre_s' => $this->request->getPost('segundo_nombre'),
                'perfil' => $this->request->getPost('perfil'),
                'apellido_p' => $this->request->getPost('primer_apellido'),
                'apellido_s' => $this->request->getPost('segundo_apellido'),
                'email' => $this->request->getPost('email'),
                'id_rol' => $this->request->getPost('id_rol'),
                'usuario_crea' => session('id'),
                'direccion' => $this->request->getPost('direccionX'),
            ]);


            $this->estudiantes->update($this->request->getPost('id_estudiante'), [
                // 'id_estudiante' => $this->request->getPost('id_estudiante'),
                'id_usuario' => $this->request->getPost('id'),
                'id_grado' => $this->request->getPost('id_grado'),
                'usuario_crea' => session('id')
            ]);
            return json_encode($this->request->getPost('id'));
        }
    }

    public function insertarGrado(){
        $this->estudiantes->save([
            'id_usuario' => $this->request->getPost('id_usuario'),
            'id_grado' => $this->request->getPost('id_grado'),
            'usuario_crea' => session('id')
        ]);
    }

    public function buscarEstudiantes($id)
    {
        $returnData = array();
        $estudiantes = $this->usuarios->buscarEstudiantes($id);
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
            $data = ['titulo' => 'Administrar Estudiantes Eliminados', 'datos' => 'vacio'];
            echo view('/principal/sidebar', $data);
            echo view('/estudiante  s/eliminados', $data);
        } else {
            $data = ['titulo' => 'Administrar Estudiantes Eliminados', 'datos' => $eliminados];
            echo view('/principal/sidebar', $data);
            echo view('/estudiantes/eliminados', $data);
        }
    }
}
