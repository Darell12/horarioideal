<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Horario_encModel;
use App\Models\UsuariosModel;
use App\Models\GradosModel;
use App\Models\Parametros_detModel;


class Horario_enc extends BaseController
{
    protected $horario_enc, $eliminados;
    protected $usuarios, $grados;
    protected $profesores;


    public function __construct()
    {
        $this->horario_enc = new Horario_encModel();
        $this->eliminados = new Horario_encModel();
        $this->usuarios = new UsuariosModel();
        $this->grados = new GradosModel();
        $this->profesores = new Horario_encModel();
    }

    public function index()
    {
        $horario_enc = $this->horario_enc->obtenerHorarios_enc();
        $usuarios = $this->usuarios->obtenerUsuarios($estado = 'A');
        $grados = $this->grados->obtenerGrados();

        $data = ['titulo' => 'Administrar Horarios', 'datos' => $horario_enc,  'usuarios' => $usuarios, 'grados' => $grados];

        echo view('/principal/sidebar', $data);
        echo view('/horarios_enc/horarios_enc', $data);
    }

    public function insertar()
    {
        $tp = $this->request->getPost('tp');
        if ($tp == 1) {

            $this->horario_enc->save([
                'id_grado' => $this->request->getPost('id_grado'),
                'periodo_año' => $this->request->getPost('periodo_año'),
                'jornada' => $this->request->getPost('jornada'),
                'usuario_crea' => session('id'),

            ]);
        } else {
            $this->horario_enc->update($this->request->getPost('id'), [
                'id_grado' => $this->request->getPost('id_grado'),
                'periodo_año' => $this->request->getPost('periodo_año'),
                'jornada' => $this->request->getPost('jornada'),
                'usuario_crea' => session('id'),

            ]);
        }
        return json_encode($this->request->getPost('id'));
    }

    public function obtenerEncabezados()
    {
        $estado = $this->request->getPost('estado');
        $data = $this->horario_enc->obtenerEncabezados($estado);
        echo json_encode($data);
    }

    public function buscarhorario_enc($id)
    {
        $returnData = array();
        $horario_enc = $this->horario_enc->buscarhorario_enc($id);
        if (!empty($horario_enc)) {
            array_push($returnData, $horario_enc);
        }
        echo json_encode($returnData);
    }


    public function cambiarEstado($id, $estado)
    {
        $horario_enc = $this->horario_enc->cambiar_Estado($id, $estado);
    }

    public function eliminados() //Mostrar vista de Paises Eliminados
    {
        $eliminados = $this->eliminados->obtenerHorarios_encEliminados();


        // Redireccionar a la URL anterior
        if (!$eliminados) {
            $data = ['titulo' => 'Administrar Horariosenc Eliminadas', 'datos' => 'vacio'];
            echo view('/principal/sidebar', $data);
            echo view('/horarios_enc/eliminados', $data);
        } else {
            $data = ['titulo' => 'Administrar Horariosenc Eliminadas', 'datos' => $eliminados];
            echo view('/principal/sidebar', $data);
            echo view('/horarios_enc/eliminados', $data);
        }
    }
    public function validar()
    {
        $valor = $this->request->getPost('valor');
        $campo = $this->request->getPost('campo');
        $tp = $this->request->getPost('tp');
        $id_grado = $this->request->getPost('id_grado');

        $filtro = $this->horario_enc->filtro($campo, $valor);
        if ($tp == 2 && $valor == $id_grado) {
            $respuesta = true;
            return $this->response->setJSON($respuesta);
        }

        if (empty($filtro)) {
            $respuesta = true;
            return $this->response->setJSON($respuesta);
        } else if($filtro['periodo_año'] == $valor && $filtro['id_grado'] == $id_grado){
            $respuesta = false;
        }
        $respuesta = false;
        return $this->response->setJSON($respuesta);
    }
}
