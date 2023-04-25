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
        $tp = $this->request->getPost('tp_telefono');
        if ($tp == 1) {

            $this->telefono->save([
                'numero' => $this->request->getPost('numero'),
                'prioridad' => $this->request->getPost('prioridad'),
                'id_usuario' => $this->request->getPost('id_usuario'),
                'usuario_crea' => session('id'),
            ]);
        } else {
            $this->telefono->update($this->request->getPost('id_telefono'), [
                'telefono' => $this->request->getPost('numero'),
                'prioridad' => $this->request->getPost('prioridad'),
                // 'id_usuario' => $this->request->getPost('id_usuario'),
            ]);
        }
    }
    public function telefonoUsuario($id)
    {
        $dataArray = array();
        $telefono = $this->telefono->ObtenerTelefono($id);
        if (!empty($telefono)) {
            array_push($dataArray, $telefono);
        }
        echo json_encode($telefono);
    }
    public function cambiarEstado()
    {
        $id = $this->request->getPost('id_telefono');
        $estado = $this->request->getPost('estado');

        $telefono = $this->telefono->cambiarEstado($id, $estado);
        if (
            $estado == 'E'
        ) {
            return 1;
        }
    }
}
