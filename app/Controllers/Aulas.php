<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AulaModel;
use App\Models\Parametros_detModel;



class Aulas extends BaseController
{
    protected $aula, $eliminados;
    protected $paramSede, $paramTipo;


    public function __construct()
    {
        $this->aula = new AulaModel();
        $this->eliminados = new AulaModel();
        $this->paramSede = new Parametros_detModel();
        $this->paramTipo = new Parametros_detModel();
    }
    public function index()
    {
        $aula = $this->aula->obtenerAulas('A');
        $paramSede = $this->paramSede->ObtenerSedes();
        $paramTipo = $this->paramTipo->ObtenerParametro(14);
        $data = ['titulo' => 'Administrar Aulas', 'datos' => $aula, 'sedes' => $paramSede, 'tipos' => $paramTipo];

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
        echo json_encode($aula);
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
        return redirect()->to(base_url('/aulas'));
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
        return json_encode('');
    }
    public function eliminados() //Mostrar vista de Paises Eliminados
    {
        $eliminados = $this->eliminados->obtenerAulasEliminados();


        // Redireccionar a la URL anterior
        $data = ['titulo' => 'Administrar Aulas Eliminados', 'datos' => $eliminados];
        echo view('/principal/sidebar', $data);
        echo view('/aulas/eliminados', $data);
    }
}
