<?php

namespace App\Controllers;

use App\Models\EmailsModel;

class Email extends BaseController
{
    protected $email;

    public function __construct()
    {
        $this->email = new EmailsModel();
    }

    public function index()
    {
        return view('welcome_message');
    }

    public function Email($id, $estado)
    {
        $dataArray = array();
        $email = $this->email->ObtenerEmailUsuario($id, $estado);
        if (!empty($email)) {
            array_push($dataArray, $email);
        }
        echo json_encode($email);
    }
    public function insertar()
    {
        $tp = $this->request->getPost('tp_email');
        if ($tp == 1) {

            $this->email->save([
                'email' => $this->request->getPost('email'),
                'prioridad' => $this->request->getPost('prioridad'),
                'id_usuario' => $this->request->getPost('id_usuario'),
                'usuario_crea' => session('id'),
            ]);
        } else {
            $this->email->update($this->request->getPost('id_email'), [
                'email' => $this->request->getPost('email'),
                'prioridad' => $this->request->getPost('prioridad'),
                // 'id_usuario' => $this->request->getPost('id_usuario'),
            ]);
        }
    }
    public function emailUsuario($id)
    {
        $dataArray = array();
        $email = $this->email->ObtenerEmail($id);
        if (!empty($email)) {
            array_push($dataArray, $email);
        }
        echo json_encode($email);
    }
}
