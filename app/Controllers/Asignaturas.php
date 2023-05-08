<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\AsignaturasModel;
use App\Models\Parametros_detModel;

class Asignaturas extends BaseController
{
    protected $asignaturas, $eliminados;
    protected $paramAreas;
    
    public function __construct()
    { 
        $this->asignaturas = new AsignaturasModel();
        $this->eliminados = new AsignaturasModel();
        $this->paramAreas = new Parametros_detModel();
    }
    public function index()
    {
        $asignaturas = $this->asignaturas->obtenerAsignaturas();    
        $paramAreas = $this->paramAreas->ObtenerAreas();
        $data = ['titulo' => 'Administrar Asignaturas', 'nombre' => 'Camilo', 'Area' => $paramAreas, 'datos' => $asignaturas ];

        echo view('/principal/sidebar', $data);
        echo view('/asignaturas/asignaturas', $data);
    }
    public function insertar()
    {
        $tp = $this->request->getPost('tp');
        if ($tp == 1) {

            $this->asignaturas->save([
                'nombre' => $this->request->getPost('nombre_asignatura'),
                'Codigo' => $this->request->getPost('codigo'),
                'usuario_crea'=> session('id')
            ]);
        } else {
            $this->asignaturas->update($this->request->getPost('id'), [
                'nombre' => $this->request->getPost('nombre_asignatura'),
                'Codigo' => $this->request->getPost('codigo'),
                'usuario_crea'=> session('id')
            ]);
        }
        return redirect()->to(base_url('/asignaturas'));
    }

    public function buscarAsignaturas($id)
    {
        $returnData = array();
        $asignaturas = $this->asignaturas->buscarAsignaturas($id);
        if (!empty($asignaturas)) {
            array_push($returnData, $asignaturas);
        }
        echo json_encode($returnData);
    }

    public function cambiarEstado($id, $estado)
    {
        $asignaturas = $this->asignaturas->cambiar_Estado($id, $estado);

        if (
            $estado == 'E'
        ) {
            return redirect()->to(base_url('/ver_asignaturas'));
        } else {
            return redirect()->to(base_url('/eliminados_asignaturas'));
        }
    }
    public function eliminados() //Mostrar vista de Paises Eliminados
    {
        $eliminados = $this->eliminados->obtenerAsignaturasEliminados();


        // Redireccionar a la URL anterior
        if (!$eliminados) {
            $data = ['titulo' => 'Administrar Asignaturas Eliminadas','datos' => 'vacio'];
            echo view('/principal/sidebar', $data);
            echo view('/asignaturas/eliminados', $data);
        } else {
            $data = ['titulo' => 'Administrar Asignaturas Eliminadas', 'datos' => $eliminados];
            echo view('/principal/sidebar', $data);
            echo view('/asignaturas/eliminados', $data);
        }
    }
    public function validar()
    {
        $valor = $this->request->getPost('valor');
        $campo = $this->request->getPost('campo');
        $tp = $this->request->getPost('tp');
        $nombre_asignatura = $this->request->getPost('nombre_asignatura');
        $codigo = $this->request->getPost('codigo');

        $filtro = $this->asignaturas->filtro($campo, $valor);
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