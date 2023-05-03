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

    public function emailsUsuario($id, $estado = 'A')
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
        $tp = $this->request->getPost('tp');
        if ($tp == 1) {

            $this->email->save([
                'email' => $this->request->getPost('email'),
                'prioridad' => $this->request->getPost('prioridad'),
                'id_usuario' => $this->request->getPost('id_usuario'),
                'usuario_crea' => session('id'),
            ]);
            $idIngreso = $this->email->getInsertID();
            return 'Se ingreso un email y su id es:' .  $idIngreso;
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
    public function cambiarEstado()
    {
        $id = $this->request->getPost('id_email');
        $estado = $this->request->getPost('estado');

        $email = $this->email->cambiarEstado($id, $estado);
        if (
            $estado == 'E'
        ) {
            return 1;
        }
    }
}
