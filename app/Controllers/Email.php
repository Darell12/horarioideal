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
}
