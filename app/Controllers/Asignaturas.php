<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AsignaturasModel;
use App\Models\Parametros_detModel;
use App\Controllers\Principal;

class Asignaturas extends BaseController
{
    protected $asignaturas, $eliminados;
    protected $paramAreas, $paramTipos;
    protected $metodos;

    public function __construct()
    {
        $this->asignaturas = new AsignaturasModel();
        $this->eliminados = new AsignaturasModel();
        $this->paramAreas = new Parametros_detModel();
        $this->paramTipos = new Parametros_detModel();
        $this->metodos = new Principal();
    }
    public function index()
    {
        $cargaSideBar = $this->metodos->getModulos();
        $asignaturas = $this->asignaturas->obtenerAsignaturas('E');
        $paramAreas = $this->paramAreas->ObtenerParametro(9);
        $paramTipos = $this->paramTipos->ObtenerParametro(14);
        $data = ['titulo' => 'Administrar Asignaturas', 'Area' => $paramAreas, 'datos' => $asignaturas, 'tipos' => $paramTipos, 'Modulos' => $cargaSideBar];

        echo view('/principal/sidebar', $data);
        echo view('/asignaturas/asignaturas', $data);
    }
    public function AsignaturasUnica()
    {
        $cargaSideBar = $this->metodos->getModulos();
        $asignaturas = $this->asignaturas->obtenerAsignaturas('E');
        $paramAreas = $this->paramAreas->ObtenerParametro(9);
        $paramTipos = $this->paramTipos->ObtenerParametro(14);

        $data = ['titulo' => 'Administrar Asignaturas', 'nombre' => 'Camilo', 'Area' => $paramAreas, 'datos' => $asignaturas, 'tipos' => $paramTipos, 'Modulos' => $cargaSideBar];

        echo view('/principal/sidebar', $data);
        echo view('/asignaturas/consulta', $data);
    }


    public function obtenerAsignaturas()
    {
        $estado = $this->request->getPost('estado');
        $asignaturas = $this->asignaturas->obtenerAsignaturas($estado);
        echo json_encode($asignaturas);
    }

    public function insertar()
    {
        $tp = $this->request->getPost('tp');
        if ($tp == 1) {

            $this->asignaturas->save([
                'nombre' => $this->request->getPost('nombre_asignatura'),
                'Codigo' => $this->request->getPost('codigo'),
                'tipo_requerido' => $this->request->getPost('tipo'),
                'usuario_crea' => session('id')
            ]);
        } else {
            $this->asignaturas->update($this->request->getPost('id'), [
                'nombre' => $this->request->getPost('nombre_asignatura'),
                'Codigo' => $this->request->getPost('codigo'),
                'tipo_requerido' => $this->request->getPost('tipo'),
                'usuario_crea' => session('id')
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

    public function buscarAsignaturasxGrado($id_grado)
    {
        $returnData = array();
        $asignaturas = $this->asignaturas->buscarAsignaturasxGrado($id_grado);
        if (!empty($asignaturas)) {
            array_push($returnData, $asignaturas);
        }
        echo json_encode($returnData);
    }

    public function cambiarEstado($id, $estado)
    {
        $asignaturas = $this->asignaturas->cambiar_Estado($id, $estado);
        return json_encode('');
    }
    public function eliminados() //Mostrar vista de Paises Eliminados
    {

        $cargaSideBar = $this->metodos->getModulos();
        $data = ['titulo' => 'Administrar Asignaturas Eliminadas', 'datos' => 'vacio', 'Modulos' => $cargaSideBar];
        echo view('/principal/sidebar', $data);
        echo view('/asignaturas/eliminados', $data);
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
