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

    public function index($id)
    {
        $estudiante = $this->usuario->buscarEstudiantes($id);
        $acudientes = $this->acudientes->ObtenerAcudientes('A', $estudiante['id_estudiante']);
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
                'id_estudiante'=> $this->request->getPost('id'),
                'tipo_documento' => $this->request->getPost('tipo_documentoAcu'),
                'n_documento' => $this->request->getPost('numero_documentoAcu'),
                'nombre_p' => $this->request->getPost('primer_nombreAcu'),
                'nombre_s' => $this->request->getPost('segundo_nombreAcu'),
                'apellido_p' => $this->request->getPost('primer_apellidoAcu'),
                'apellido_s' => $this->request->getPost('segundo_apellidoAcu'),
                'direccion' => $this->request->getPost('direccionAcu'),
                'telefono' => $this->request->getPost('telefonoAcu'),
                'email' => $this->request->getPost('emailAcu'),
                'usuario_crea' => session('id'),
            ]);
        } else {
            $this->acudientes->update($this->request->getPost('id'), [
                'tipo_documento' => $this->request->getPost('tipo_documentoAcu'),
                'n_documento' => $this->request->getPost('numero_documentoAcu'),
                'nombre_p' => $this->request->getPost('primer_nombreAcu'),
                'nombre_s' => $this->request->getPost('segundo_nombreAcu'),
                'apellido_p' => $this->request->getPost('primer_apellidoAcu'),
                'apellido_s' => $this->request->getPost('segundo_apellidoAcu'),
                'direccion' => $this->request->getPost('direccionAcu'),
                'telefono' => $this->request->getPost('telefonoAcu'),
                'email' => $this->request->getPost('emailAcu'),
                'usuario_crea' => session('id'),
            ]);
            return json_encode($this->request->getPost('id'));
        }
    }
    public function buscarAcudiente($id)
    {
        $returnData = array();
        $acudientes = $this->acudientes->obtenerAcudientes('A', $id);
        if (!empty($acudientes)) {
            array_push($returnData, $acudientes[0]);
        }
        echo json_encode($returnData);
    }

}
