<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Franjas_horariasModel;
use App\Models\Parametros_detModel;



class Franjas_horarias extends BaseController
{
    protected $franja, $eliminados;
    protected $dia;

    public function __construct()
    {
        $this->franja = new Franjas_horariasModel();
        $this->eliminados = new Franjas_horariasModel();
        $this->dia = new Parametros_detModel();
    }
    public function index()
    {
        $dia = $this->dia->ObtenerParametro(4);
        $franja = $this->franja->obtenerFranjas($estado = 'A');
        $data = ['titulo' => 'Administrar Usuarios', 'datos' => $franja, 'dias' => $dia];

        echo view('/principal/sidebar', $data);
        echo view('/franjas_horarias/franjas_horarias', $data);
    }

    public function obtenerFranjas()
    {
        $estado = $this->request->getPost('estado');
        $franja = $this->franja->obtenerFranjas($estado);
        echo json_encode($franja);
    }

    public function insertar()
    {

        $tp = $this->request->getPost('tp');
        if ($tp == 1) {
            $this->franja->save([
                'dia' => $this->request->getPost('id_dia'),
                'hora_inicio' => $this->request->getPost('hora_inicio'),
                'hora_fin' => $this->request->getPost('hora_fin'),
                'usuario_crea' => session('id')
            ]);
            $idIngreso = $this->franja->getInsertID();
            return json_encode($idIngreso);
        } else {
            $this->franja->update($this->request->getPost('id'), [
                'dia' => $this->request->getPost('id_dia'),
                'hora_inicio' => $this->request->getPost('hora_inicio'),
                'hora_fin' => $this->request->getPost('hora_fin'),
                'usuario_crea' => session('id')
            ]);
        }
        return json_encode($this->request->getPost('id'));
    }

    public function eliminados()
    {
        $eliminados = $this->eliminados->obtenerFranjasEliminados();


        // Redireccionar a la URL anterior
        if (!$eliminados) {
            // echo view('/errors/html/no_eliminados');
            $data = ['titulo' => 'Administrar Franjas Eliminadas',  'datos' => 'vacio'];
            echo view('/principal/sidebar', $data);
            echo view('/franjas_horarias/eliminados', $data);
        } else {
            $data = ['titulo' => 'Administrar Franjas Eliminados', 'datos' => $eliminados];
            echo view('/principal/sidebar', $data);
            echo view('/franjas_horarias/eliminados', $data);
        }
    }
    public function validar()
    {
        $valor = $this->request->getPost('valor');
        $campo = $this->request->getPost('campo');
        $tp = $this->request->getPost('tp');
        $hora_inicio = $this->request->getPost('hora_inicio');
        $dia = $this->request->getPost('dia');
        $filtro = $this->franja->filtro($campo, $valor);

        if (empty($filtro)) {
            $respuesta = true;
            return $this->response->setJSON($respuesta);
        } else {
            $respuesta = false;
        }
        return $this->response->setJSON($respuesta);
       
    }

    
    public function buscarFranjas($id)
    {
        $returnData = array();
        $franja = $this->franja->buscarFranjas($id);
        if (!empty($franja)) {
            array_push($returnData, $franja);
        }
        echo json_encode($returnData);
    }

    public function cambiarEstado($id, $estado)
    {
        $franja = $this->franja->cambiar_Estado($id, $estado);
        return json_encode('Todo bien');

    }
}
