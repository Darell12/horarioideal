<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuariosModel;
use App\Models\HorarioModel;
use App\Models\RolesModel;
use App\Models\Parametros_detModel;


class Usuarios extends BaseController
{
    protected $usuario, $eliminados;
    protected $roles, $horario;
    protected $prioridad;

    public function __construct()
    {
        $this->usuario = new UsuariosModel();
        $this->eliminados = new UsuariosModel();
        $this->roles = new RolesModel();
        $this->horario = new HorarioModel();
        $this->prioridad = new Parametros_detModel();
    }
    public function index()
    {
        $usuario = $this->usuario->obtenerUsuarios();
        // $horario = $this->horario->vistaHorarioPrueba();
        $roles = $this->roles->obtenerRoles();
        $prioridad = $this->prioridad->ObtenerPrioridad();

        $data = ['titulo' => 'Administrar Usuarios', 'nombre' => 'Darell E', 'datos' => $usuario, 'roles' => $roles, 'prioridad' => $prioridad];

        echo view('/principal/sidebar', $data);
        echo view('/usuarios/usuarios', $data);
        echo view('/principal/footer', $data);
    }
    public function perfil($id)
    {
        $usuario = $this->usuario->buscarUsuarioPerfil($id);
        // $horario = $this->horario->vistaHorarioPrueba();
        $roles = $this->roles->obtenerRoles();
        $prioridad = $this->prioridad->ObtenerPrioridad();

        $data = ['titulo' => 'Administrar Usuarios', 'nombre' => 'Darell E', 'datos' => $usuario, 'roles' => $roles, 'prioridad' => $prioridad];

        echo view('/principal/sidebar', $data);
        echo view('/usuarios/perfil', $data);
        echo view('/principal/footer', $data);
    }
    public function insertar()
    {
        $tp = $this->request->getPost('tp');
        if ($tp == 1) {
            $password = $this->request->getPost('contraseña');
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $this->usuario->save([
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
                'direccion' => $this->request->getPost('direccion'),

            ]);
        } else {
            $this->usuario->update($this->request->getPost('id'), [
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
                'direccion' => $this->request->getPost('direccion'),
            ]);
        }
        return redirect()->to(base_url('/usuarios'));
    }
    public function eliminados() //Mostrar vista de Paises Eliminados
    {
        $eliminados = $this->eliminados->obtenerUsuariosEliminados();


        // Redireccionar a la URL anterior
        if (!$eliminados) {
            // echo view('/errors/html/no_eliminados');
            $data = ['titulo' => 'Administrar Usuarios Eliminados',  'datos' => 'vacio'];
            echo view('/principal/sidebar', $data);
            echo view('/usuarios/eliminados', $data);
        } else {
            $data = ['titulo' => 'Administrar Usuarios Eliminados', 'datos' => $eliminados];
            echo view('/principal/sidebar', $data);
            echo view('/usuarios/eliminados', $data);
        }
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

    public function cambiarEstado($id, $estado)
    {
        $usuario = $this->usuario->cambiarEstado($id, $estado);
        if (
            $estado == 'E'
        ) {
            return redirect()->to(base_url('/usuarios'));
        } else {
            return redirect()->to(base_url('/usuarios/eliminados'));
        }
    }
    public function resetearContrasena($id, $contraseña)
    {
        $hashedPassword = password_hash($contraseña, PASSWORD_DEFAULT);

        $usuario = $this->usuario->resetearContraseña($id, $hashedPassword);
        return redirect()->to(base_url('/usuarios'));
    }
    public function actualizarContraseña()
    {
        // Ya me dio weba
    }
}
