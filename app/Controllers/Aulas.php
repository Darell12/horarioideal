<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AulaModel;
use App\Models\Parametros_detModel;
use App\Controllers\Principal;


class Aulas extends BaseController
{
    protected $aula, $eliminados;
    protected $paramTipo;
    protected $metodos;

    public function __construct()
    {
        $this->aula = new AulaModel();
        $this->eliminados = new AulaModel();
        $this->paramTipo = new Parametros_detModel();
        $this->metodos = new Principal();
    }
    public function index()
    {
        $cargaSideBar = $this->metodos->getModulos();
        $aula = $this->aula->obtenerAulas('A');
        $paramTipo = $this->paramTipo->ObtenerParametro(14);
        $data = ['titulo' => 'Administrar Aulas', 'datos' => $aula, 'tipos' => $paramTipo, 'Modulos' => $cargaSideBar];

        echo view('/principal/sidebar', $data);
        echo view('/aulas/aulas', $data);
    }
    public function obtenerAulas()
    {
        $estado = $this->request->getPost('estado');
        $aula = $this->aula->obtenerAulas($estado);
        echo json_encode($aula);
    }
    public function obtenerAulasxTipo($id)
    {
        $aula = $this->aula->obtenerAulasxTipo($id);
        return json_encode($aula);
    }
    public function obtenerAulasxTipoNew($id)
    {
        $aula = $this->aula->obtenerAulasxTipoNew($id);
        return json_encode($aula);
    }

    public function insertar()
    {
        $tp = $this->request->getPost('tp');
        if ($tp == 1) {

            $this->aula->save([
                'nombre' => $this->request->getPost('nombre_aula'),
                'descripcion' => $this->request->getPost('descripcion'),
                'tipo' => $this->request->getPost('tipo'),
                'usuario_crea' => session('id')
            ]);
        } else {
            $this->aula->update($this->request->getPost('id'), [
                'nombre' => $this->request->getPost('nombre_aula'),
                'descripcion' => $this->request->getPost('descripcion'),
                'tipo' => $this->request->getPost('tipo'),
                'usuario_crea' => session('id')
            ]);
        }
        return json_encode('Sirve');
    }

    public function buscaraula($id)
    {
        $returnData = array();
        $aula = $this->aula->buscaraula($id);
        if (!empty($aula)) {
            array_push($returnData, $aula);
        }
        echo json_encode($returnData);
    }

    public function cambiarEstado($id, $estado)
    {
        $aula = $this->aula->cambiar_Estado($id, $estado);
        return json_encode('Cambiado');
    }
    public function eliminados() //Mostrar vista de Paises Eliminados
    {
        $cargaSideBar = $this->metodos->getModulos();
        // Redireccionar a la URL anterior
        $data = ['titulo' => 'Administrar Aulas Eliminados', 'Modulos' => $cargaSideBar];
        echo view('/principal/sidebar', $data);
        echo view('/aulas/eliminados', $data);
    }
    public function validar()
    {
        $valor = $this->request->getPost('valor');
        $campo = $this->request->getPost('campo');
        $tp = $this->request->getPost('tp');
        $nombre_asignatura = $this->request->getPost('nombre_asignatura');
        $codigo = $this->request->getPost('codigo');

        $filtro = $this->aula->filtro($campo, $valor);
        if ($tp == 2 && $valor == $nombre_asignatura) {
            $respuesta = true;
            return $this->response->setJSON($respuesta);
        }
        if ($tp == 2 && $valor == $codigo) {
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
