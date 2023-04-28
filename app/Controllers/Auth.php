<?php

namespace App\Controllers;
use App\Models\UsuariosModel;


class Auth extends BaseController
{
    protected $usuario, $eliminados;


    public function __construct()
    {
        $this->usuario = new UsuariosModel();
        $this->eliminados = new UsuariosModel();
    }
    public function iniciarSesion()
    {
        echo view('auth/login');
    }
    public function login()
    {
        $nombre_corto = $this->request->getPost('nombre_corto');
        $password = $this->request->getVar('password');

        $usuarioDatos = $this->usuario->login(['nombre_corto' => $nombre_corto]);

        if (count($usuarioDatos) > 0 && password_verify($password, $usuarioDatos[0]['contraseña'])) {

            $data = [
                "usuario" => $usuarioDatos[0]['nombre_corto'],
                "id" => $usuarioDatos[0]['id_usuario'],
                "rol" => $usuarioDatos[0]['rol'],
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
