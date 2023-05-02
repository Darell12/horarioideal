<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AulaModel;
use App\Models\Parametros_detModel;



class Aulas extends BaseController
{
    protected $aula, $eliminados;
    protected $paramSede, $paramBloque;


    public function __construct()
    {
        $this->aula = new AulaModel();
        $this->eliminados = new AulaModel();
        $this->paramSede = new Parametros_detModel();
        $this->paramBloque = new Parametros_detModel();

    }
    public function index()
    {
        $aula = $this->aula->obtenerAulas();
        $paramSede = $this->paramSede->ObtenerSedes();
        $paramBloque = $this->paramBloque->ObtenerBloques();
        $data = ['titulo' => 'Administrar Aulas', 'datos' => $aula, 'sedes' => $paramSede, 'bloques' => $paramBloque];

    echo view('/principal/sidebar', $data);
    echo view('/aulas/aulas', $data);
    }
    public function insertar()
    {
        $tp = $this->request->getPost('tp');
        if ($tp == 1) {

            $this->aula->save([
                'nombre' => $this->request->getPost('nombre_aula'),
                'descripcion' => $this->request->getPost('descripcion'),
                'bloque' => $this->request->getPost('bloque'),
                'sede' => $this->request->getPost('sede'),
                'usuario_crea'=> session('id')
            ]);
        } else {
            $this->aula->update($this->request->getPost('id'), [
                'nombre' => $this->request->getPost('nombre_aula'),
                'descripcion' => $this->request->getPost('descripcion'),
                'bloque' => $this->request->getPost('bloque'),
                'sede' => $this->request->getPost('sede'),
                 'usuario_crea'=> session('id')
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

        if (
            $estado == 'E'
        ) {
            return redirect()->to(base_url('/ver_aulas'));
        } else {
            return redirect()->to(base_url('/eliminados_aulas'));
        }
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