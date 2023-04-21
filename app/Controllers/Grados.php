<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GradosModel;


class Grados extends BaseController
{
    protected $grado, $eliminados;


    public function __construct()
    {
        $this->grado = new GradosModel();
        $this->eliminados = new GradosModel();
    }
    public function index()
    {
        $grado = $this->grado->obtenerGrados();

        $data = ['titulo' => 'Administrar roles', 'datos' => $grado];

       echo view('/principal/sidebar', $data);
        echo view('/grados/grados', $data);
    }
    public function insertar()
    {
        $tp = $this->request->getPost('tp');
        if ($tp == 1) {

            $this->grado->save([
                'alias' => $this->request->getPost('nombre_grado'),
                'usuario_crea'=> session('id')
            ]);
        } else {
            $this->grado->update($this->request->getPost('id'), [
                'alias' => $this->request->getPost('nombre_grado'),
                'usuario_crea'=> session('id')
            ]);
        }
        return redirect()->to(base_url('/grados'));
    }

    public function buscarGrado($id)
    {
        $returnData = array();
        $grado = $this->grado->buscarGrado($id);
        if (!empty($grado)) {
            array_push($returnData, $grado);
        }
        echo json_encode($returnData);
    }

    public function cambiarEstado($id, $estado)
    {
        $grado = $this->grado->cambiar_Estado($id, $estado);

        if (
            $estado == 'E'
        ) {
            return redirect()->to(base_url('/ver_grados'));
        } else {
            return redirect()->to(base_url('/eliminados_grados'));
        }
    }
    
    public function eliminados() //Mostrar vista de Paises Eliminados
    {
        $eliminados = $this->eliminados->obtenerGradosEliminados();


        // Redireccionar a la URL anterior
        if (!$eliminados) {
            $data = ['titulo' => 'Administrar Grados Eliminados','datos' => 'vacio'];
            echo view('/principal/sidebar', $data);
            echo view('/grados/eliminados', $data);
        } else {
            $data = ['titulo' => 'Administrar Grados Eliminados', 'datos' => $eliminados];
            echo view('/principal/sidebar', $data);
            echo view('/grados/eliminados', $data);
        }
    }

}