<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GradosModel;
use App\Models\AsignaturasModel;
use App\Models\Grados_asignaturaModel;

class Grados extends BaseController
{
    protected $grado, $eliminados, $asignaturas, $grado_asignatura;


    public function __construct()
    {
        $this->grado = new GradosModel();
        $this->eliminados = new GradosModel();
        $this->asignaturas = new AsignaturasModel();
        $this->grado_asignatura = new Grados_asignaturaModel();
    }
    public function index()
    {
        $grado = $this->grado->obtenerGrados();
        $asignaturas = $this->asignaturas->obtenerAsignaturas();

        $data = ['titulo' => 'Administrar Grados', 'datos' => $grado, 'asignaturas'=> $asignaturas];

       echo view('/principal/sidebar', $data);
        echo view('/grados/grados', $data);
    }
    public function insertar()
    {
        $tp = $this->request->getPost('tp');
        if ($tp == 1) {

            $this->grado->save([
                'alias' => $this->request->getPost('alias'),
                'usuario_crea'=> session('id')
            ]);
        } else {
            $this->grado->update($this->request->getPost('id'), [
                'alias' => $this->request->getPost('alias'),
                'usuario_crea'=> session('id')
            ]);
        }
        return redirect()->to(base_url('/grados'));
    }
    public function obtenerGrados()
    {
        $estado = $this->request->getPost('estado');
        $grado = $this->grado->obtenerGrados($estado);
        echo json_encode($grado);
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

    public function obtenerAsignaturas($id)
    {
        $returnData = array();
        $asignaturas = $this->asignaturas->ObtenerAsignaturas($id);
        if (!empty($asignaturas)) {
            array_push($returnData, $asignaturas);
        }
        echo json_encode($returnData);
    }

    public function obtenerAsignaturasS($id)
    {
        $grado_asignatura = $this->grado_asignatura->obtenerAsignaturasGrado($id);
        echo json_encode($grado_asignatura);
    }

    public function insertarCarg()
    {
        $this->grado_asignatura->save([
            'id_asignatura' => $this->request->getPost('id_asignatura'),
            'id_grado' => $this->request->getPost('id_grado'),
            'horas_semanales' => $this->request->getPost('horas_semanales'),
            'usuario_crea'=> session('id')
        ]); 
        return json_encode('1');
    }
    public function retirarCarg()
    {
        $this->grado_asignatura->update($this->request->getPost('id_grado_asignatura'), ['estado'=>'E']);
        return json_encode('1');
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