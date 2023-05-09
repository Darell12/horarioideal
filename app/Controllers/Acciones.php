<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AccionesModel;


class Acciones extends BaseController
{
    protected $accion, $eliminados;


    public function __construct()
    {
        $this->accion = new AccionesModel();
        $this->eliminados = new AccionesModel();
    }

    public function index()
    {
        $accion = $this->accion->obtenerAcciones('E');

        $data = ['titulo' => 'Administrar Acciones', 'datos' => $accion];

       echo view('/principal/sidebar', $data);
       echo view('/acciones/acciones', $data);
    }
    public function obtenerAcciones()
    {
        $estado = $this->request->getPost('estado');
        $accion = $this->accion->obtenerAcciones($estado);
        echo json_encode($accion);
    }

    public function insertar()
    {
        $tp = $this->request->getPost('tp');
        if ($tp == 1) {

            $this->accion->save([
                'nombre' => $this->request->getPost('nombre_accion'),
                'usuario_crea'=> session('id')
            ]);
        } else {
            $this->accion->update($this->request->getPost('id'), [
                'nombre' => $this->request->getPost('nombre_accion'),
                'usuario_crea'=> session('id')
            ]);
        }
        return redirect()->to(base_url('/acciones'));
    }

    public function buscarAccion($id)
    {
        $returnData = array();
        $accion = $this->accion->buscarAccion($id);
        if (!empty($accion)) {
            array_push($returnData, $accion);
        }
        echo json_encode($returnData);
    }

    public function cambiarEstado($id, $estado)
    {
        $accion = $this->accion->cambiar_Estado($id, $estado);
        return json_encode('');
    }

    public function eliminados() //Mostrar vista de Paises Eliminados
    {
        $eliminados = $this->eliminados->obtenerAccionesEliminados();


        // Redireccionar a la URL anterior
        if (!$eliminados) {
            $data = ['titulo' => 'Administrar Acciones Eliminadas','datos' => 'vacio'];
            echo view('/principal/sidebar', $data);
            echo view('/acciones/eliminados', $data);
        } else {
            $data = ['titulo' => 'Administrar Acciones Eliminadas', 'datos' => $eliminados];
            echo view('/principal/sidebar', $data);
            echo view('/acciones/eliminados', $data);
        }
    }

    public function validar()
    {
        $valor = $this->request->getPost('valor');
        $campo = $this->request->getPost('campo');
        $tp = $this->request->getPost('tp');
        $nombreActu = $this->request->getPost('nombreActu');
        $numeroActu = $this->request->getPost('numeroActu');

        $filtro = $this->accion->filtro($campo, $valor);
        if ($tp == 2 && $valor == $nombreActu) {
            $respuesta = true;
            return $this->response->setJSON($respuesta);
        }
        
        if ($tp == 2 && $valor == $numeroActu) {
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

}