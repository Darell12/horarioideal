<?php

namespace App\Controllers;
use App\Models\UsuariosModel;
use App\Models\AuthModel;

class Auth extends BaseController
{
    protected $usuario, $eliminados, $controlador, $frases;


    public function __construct()
    {
        $this->usuario = new UsuariosModel();
        $this->eliminados = new UsuariosModel();
        $this->frases = new AuthModel();

    }
    public function iniciarSesion()
    {
        // $frases = $this->frases->obtenerFrases('A');
        // $data = ['Frases' => $frases];

        echo view('auth/login');
    }
    public function login()
    {
        $n_documento = $this->request->getPost('n_documento');
        $password = $this->request->getVar('password');

        $usuarioDatos = $this->usuario->login(['n_documento' => $n_documento]);

        if (count($usuarioDatos) > 0 && password_verify($password, $usuarioDatos[0]['contraseña'])) {

            $data = [
                "usuario" => $usuarioDatos[0]['nombre_p'] . " " . $usuarioDatos[0]['apellido_p'],
                "id" => $usuarioDatos[0]['id_usuario'],
                "rol" => $usuarioDatos[0]['rol'],
                "id_rol" => $usuarioDatos[0]['id_rol'],
                "accion" => $usuarioDatos[0]['accion_requerida'],
                'logged_in' => true,
            ];

            $session = session();
            $session->set($data);

            // echo $session->get('id');
            // return view('principal/sidebar');
            // return view('principal/inico');
            return 'success';
            return redirect()->to(base_url('iniciarSesion'))->with('mensaje', '0');
        } else {
            return 'error';
        }
    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('iniciarSesion'));
    }
}
