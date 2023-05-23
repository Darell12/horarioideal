<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuariosModel;
use App\Models\HorarioModel;
use App\Models\RolesModel;
use App\Models\Parametros_detModel;
use App\Models\EmailsModel;
use App\Models\TelefonosModel;


class Usuarios extends BaseController
{
    protected $usuario, $eliminados, $contraseña;
    protected $roles, $horario;
    protected $prioridad, $tipotel, $emails;
    protected $telefonos;

    public function __construct()
    {
        $this->usuario = new UsuariosModel();
        $this->eliminados = new UsuariosModel();
        $this->roles = new RolesModel();
        $this->horario = new HorarioModel();
        $this->prioridad = new Parametros_detModel();
        $this->tipotel = new Parametros_detModel();
        $this->emails = new EmailsModel();
        $this->telefonos = new TelefonosModel();
    }
    public function index()
    {
        $roles = $this->roles->obtenerRoles('A');
        $prioridad = $this->prioridad->ObtenerParametro(2);
        $tipotel = $this->tipotel->ObtenerParametro(3);

        $data = ['titulo' => 'Administrar Usuarios', 'roles' => $roles, 'prioridad' => $prioridad, 'tipo' => $tipotel];

        echo view('/principal/sidebar', $data);
        echo view('/usuarios/usuarios', $data);
    }
    public function perfil($id)
    {
        if (!session('logged_in') == 'true') {
            return redirect()->to(base_url('iniciarSesion'));
        }

        $usuario = $this->usuario->buscarUsuarioPerfil($id);
        $roles = $this->roles->obtenerRoles('A');
        $prioridad = $this->prioridad->ObtenerParametro(2);
        $emails = $this->emails->ObtenerEmailUsuario($id, 'A');
        $telefonos = $this->telefonos->ObtenerTelefonoUsuario($id, 'A');
        $tipo = $this->tipotel->ObtenerParametro(3);

        $data = ['titulo' => 'Perfil', 'datos' => $usuario, 'roles' => $roles, 'prioridad' => $prioridad, 'emails' => $emails, 'telefonos' => $telefonos, 'tipo' => $tipo];

        // return json_encode($data);
        echo view('/principal/sidebar', $data);
        echo view('/usuarios/perfil', $data);
        echo view('/principal/footer', $data);
    }

    public function test($id)
    {
        $usuario = $this->usuario->buscarUsuarioPerfil($id);
        return json_encode($usuario);
    }
    public function insertar()
    {
        $tp = $this->request->getPost('tp');
        if ($tp == 1) {
            $password = $this->request->getVar('contraseña');
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $this->usuario->save([
                'tipo_documento' => $this->request->getPost('tipo_documento'),
                'n_documento' => $this->request->getPost('n_documento'),
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
            $idIngreso = $this->usuario->getInsertID();
            return json_encode($idIngreso);
        } else {
            $this->usuario->update($this->request->getPost('id'), [
                'tipo_documento' => $this->request->getPost('tipo_documento'),
                'n_documento' => $this->request->getPost('n_documento'),
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
            return json_encode($this->request->getPost('id'));
        }
    }
    public function eliminados()
    {
        $data = ['titulo' => 'Administrar Usuarios Eliminados',];
        echo view('/principal/sidebar', $data);
        echo view('/usuarios/eliminados', $data);
    }
    public function buscarUsuario($id)
    {
        $returnData = array();
        $usuario = $this->usuario->buscarUsuario($id);
        if (!empty($usuario)) {
            array_push($returnData, $usuario);
        }
        echo json_encode($returnData);
    }

    public function obtenerUsuarios()
    {
        $estado = $this->request->getPost('estado');
        $usuario = $this->usuario->obtenerUsuarios($estado);
        echo json_encode($usuario);
    }

    public function obtenerProfesores()
    {
        $estado = $this->request->getPost('estado');
        $usuario = $this->usuario->obtenerProfesores($estado);
        echo json_encode($usuario);
    }

    public function cambiarEstado($id, $estado)
    {
        $usuario = $this->usuario->cambiarEstado($id, $estado);
        return json_encode('Todo bien');
    }
    public function resetearContrasena($id, $contraseña)
    {
        $hashedPassword = password_hash($contraseña, PASSWORD_DEFAULT);
        $usuario = $this->usuario->resetearContraseña($id, $hashedPassword);
        return redirect()->to(base_url('/usuarios'));
    }
    public function actualizarContraseña()
    {
        $contraseña = $this->request->getVar('contraseña');
        $contraseña_nueva = $this->request->getVar('nueva_contraseña');
        $id = $this->request->getPost('id');

        $ContraseñaActu = $this->usuario->ActualizarContra($id);

        $hashedPasswordNueva = password_hash($contraseña_nueva, PASSWORD_DEFAULT);

        if (count($ContraseñaActu) > 0 && password_verify($contraseña, $ContraseñaActu[0]['contraseña'])) {
            $this->usuario->update($id, [
                'contraseña' => $hashedPasswordNueva,
                'accion_requerida' => '0'
            ]);
            $session = session();
            $session->destroy();
            $respuesta = true;
            return $this->response->setJSON($respuesta);
        }
        $respuesta = false;
        return $this->response->setJSON($respuesta);
    }
    public function validar()
    {
        $valor = $this->request->getPost('valor');
        $campo = $this->request->getPost('campo');
        $tp = $this->request->getPost('tp');
        $nombreActu = $this->request->getPost('nombreActu');
        $numeroActu = $this->request->getPost('numeroActu');

        $filtro = $this->usuario->filtro($campo, $valor);
        if ($tp == 2 && $valor == $nombreActu) {
            $respuesta = true;
            return $this->response->setJSON($respuesta);
        }

        if ($tp == 2 && $valor == $numeroActu) {
            $respuesta = true;
            return $this->response->setJSON($respuesta);
        }

        if (empty($filtro)) {
            $respuesta = true;
            return $this->response->setJSON($respuesta);
        } else {
            $respuesta = false;
        }
        return $this->response->setJSON($respuesta);
    }
}
