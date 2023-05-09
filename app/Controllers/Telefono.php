<?php

namespace App\Controllers;

use App\Models\TelefonosModel;

class Telefono extends BaseController
{
    protected $telefono;

    public function __construct()
    {
        $this->telefono = new TelefonosModel();
    }

    public function Telefono($id, $estado)
    {
        $dataArray = array();
        $telefono = $this->telefono->ObtenerTelefonoUsuario($id, $estado);
        if (!empty($telefono)) {
            array_push($dataArray, $telefono);
        }
        echo json_encode($telefono);
    }
    public function insertar()
    {
        $tp = $this->request->getPost('tp');
        if ($tp == 1) {

            $this->telefono->save([
                'numero' => $this->request->getPost('numero'),
                'tipo' => $this->request->getPost('tipo'),
                'prioridad' => $this->request->getPost('prioridad'),
                'id_usuario' => $this->request->getPost('id_usuario'),
                'usuario_crea' => session('id'),
            ]);
            return 'Guardado';
        } else {
            $this->telefono->update($this->request->getPost('id_telefono'), [
                'numero' => $this->request->getPost('numero'),
                'tipo' => $this->request->getPost('tipo'),
                'prioridad' => $this->request->getPost('prioridad'),
            ]);
            return 'Actualizado';
        }
    }
    public function telefonosUsuario($id)
    {
        $dataArray = array();
        $telefono = $this->telefono->ObtenerTelefono($id, $estado = 'A');
        if (!empty($telefono)) {
            array_push($dataArray, $telefono);
        }
        echo json_encode($telefono);
    }
    public function cambiarEstado($id, $estado)
    {
        $this->telefono->cambiarEstado($id, $estado);
        return json_encode('todo bien');
    }
    public function validar()
    {
        $valor = $this->request->getPost('valor');
        $campo = $this->request->getPost('campo');
        $tp = $this->request->getPost('tp');
        $emailActu = $this->request->getPost('emailActu');

        $filtro = $this->telefono->filtro($campo, $valor);
        if ($tp == 2 && $valor == $emailActu) {
            $respuesta = false;
            return $this->response->setJSON($respuesta);
        }

        if (empty($filtro)) {
            $respuesta = false;
            return $this->response->setJSON($respuesta);
        } else {
            $respuesta = true;
        }
        return $this->response->setJSON($respuesta);
    }
}
