<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AccionesModel;
use App\Controllers\Principal;

class Acciones extends BaseController
{
    protected $accion, $eliminados;
    protected $metodos;

    public function __construct()
    {
        $this->accion = new AccionesModel();
        $this->eliminados = new AccionesModel();
        $this->metodos = new Principal();
    }
    
    public function index()
    {
        $cargaSideBar = $this->metodos->getModulos();
        $accion = $this->accion->obtenerAcciones('E');
        $data = ['titulo' => 'Administrar Acciones', 'datos' => $accion,'Modulos' => $cargaSideBar];

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
                'id_modulo' => $this->request->getPost('modulo'),
                'id_padre' => $this->request->getPost('carpeta'),               
                'usuario_crea'=> session('id')
            ]);
        } else {
            $this->accion->update($this->request->getPost('id'), [
                'nombre' => $this->request->getPost('nombre_accion'),
                'id_modulo' => $this->request->getPost('modulo'),
                'id_padre' => $this->request->getPost('carpeta'),
                'usuario_crea'=> session('id')
            ]);
        }
        return json_encode('todo good');
    }   

    public function Modulos(){
        $modulos = $this->metodos->Modulos();
        return json_encode($modulos);
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
        $cargaSideBar = $this->metodos->getModulos();
        // Redireccionar a la URL anterior
            $data = ['titulo' => 'Administrar Acciones Eliminadas','datos' => 'vacio','Modulos' => $cargaSideBar];
            echo view('/principal/sidebar', $data);
            echo view('/acciones/eliminados', $data);
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