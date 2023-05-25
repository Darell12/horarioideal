<?php

namespace App\Controllers;

use App\Models\AcudientesModel;
use App\Models\UsuariosModel;
use App\Models\EmailsModel;
use App\Models\TelefonosModel;
use App\Models\Parametros_detModel;

class Acudientes extends BaseController
{
    protected $usuario, $acudientes, $prioridad;
    protected $tipotel, $emails, $telefonos;

    public function __construct()
    {
        $this->usuario = new UsuariosModel();
        $this->prioridad = new Parametros_detModel();
        $this->tipotel = new Parametros_detModel();
        $this->emails = new EmailsModel();
        $this->telefonos = new TelefonosModel();
        $this->acudientes = new AcudientesModel();
    }

    public function index()
    {
        $acudientes = $this->acudientes->obtenerRoles('A');
        $prioridad = $this->prioridad->ObtenerParametro(2);
        $tipotel = $this->tipotel->ObtenerParametro(3);

        $data = ['titulo' => 'Administrar Acudientes', 'acudiente' => $acudientes, 'prioridad' => $prioridad, 'tipo' => $tipotel];

        echo view('/acudientes/acudientes', $data);
    }

    public function insertarAcudientes()
    {

        $tp = $this->request->getPost('tp');
        if ($tp == 1) {
            $this->acudientes->save([
                'tipo_documento' => $this->request->getPost('tipo_documento'),
                'n_documento' => $this->request->getPost('numero_documento'),
                'nombre_p' => $this->request->getPost('primer_nombre'),
                'nombre_s' => $this->request->getPost('segundo_nombre'),
                'apellido_p' => $this->request->getPost('primer_apellido'),
                'apellido_s' => $this->request->getPost('segundo_apellido'),
                'email' => $this->request->getPost('email'),
                'usuario_crea' => session('id'),
                'direccion' => $this->request->getPost('direccionAcu'),
            ]);
        } else {
            $this->acudientes->update($this->request->getPost('id'), [
                'tipo_documento' => $this->request->getPost('tipo_documento'),
                'n_documento' => $this->request->getPost('numero_documento'),
                'nombre_p' => $this->request->getPost('primer_nombre'),
                'nombre_s' => $this->request->getPost('segundo_nombre'),
                'apellido_p' => $this->request->getPost('primer_apellido'),
                'apellido_s' => $this->request->getPost('segundo_apellido'),
                'email' => $this->request->getPost('email'),
                'usuario_crea' => session('id'),
                'direccion' => $this->request->getPost('direccionAcu'),
            ]);
            return json_encode($this->request->getPost('id'));
        }
    }
}
