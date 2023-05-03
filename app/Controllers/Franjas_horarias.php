<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Franjas_horariasModel;



class Franjas_horarias extends BaseController
{
    protected $franja, $eliminados;

    public function __construct()
    {
        $this->franja = new Franjas_horariasModel();
        $this->eliminados = new Franjas_horariasModel();
    }
    public function index()
    {
        $franja = $this->franja->obtenerFranjas();

        $data = ['titulo' => 'Administrar Usuarios', 'datos' => $franja];

        echo view('/principal/sidebar', $data);
        echo view('/franjas_horarias/franjas_horarias', $data);
    }
    public function insertar()
    {
       
        $tp = $this->request->getPost('tp');
        if ($tp == 1) {
            $this->franja->save([
                'hora_inicio' => $this->request->getPost('hora_inicio'),
                'hora_fin' => $this->request->getPost('hora_fin'),
                'usuario_crea' => session('id')

            ]);
        } else {
            $this->franja->update($this->request->getPost('id'), [
                'hora_inicio' => $this->request->getPost('hora_inicio'),
                'hora_fin' => $this->request->getPost('hora_fin'),
                'usuario_crea' => session('id')
            ]);
        }
        return redirect()->to(base_url('/franjas_horarias'));
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
        $filtro = $this->franja->filtro($campo, $valor);
        if ($tp == 2 && $valor == $hora_inicio) {
            $respuesta = true;
            return $this->response->setJSON($respuesta);
        }
        
        if ($tp == 2 && $valor == $hora_inicio) {
            $respuesta = true;
            return $this->response->setJSON($respuesta);
        }

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
        if (
            $estado == 'E'
        ) {
            return redirect()->to(base_url('/ver_franjas'));
        } else {
            return redirect()->to(base_url('/eliminados_franjas'));
        }
    }
}
