<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Horario_encModel;
use App\Models\UsuariosModel;
use App\Models\GradosModel;
use App\Models\Parametros_detModel;
use App\Controllers\Principal;

class Horario_enc extends BaseController
{
    protected $horario_enc, $eliminados;
    protected $usuarios, $grados;
    protected $profesores;
    protected $franja;
    protected $metodos;

    public function __construct()
    {
        $this->horario_enc = new Horario_encModel();
        $this->eliminados = new Horario_encModel();
        $this->usuarios = new UsuariosModel();
        $this->grados = new GradosModel();
        $this->profesores = new Horario_encModel();
        $this->franja = new Parametros_detModel();
        $this->metodos = new Principal();
    }

    public function index()
    {
        $cargaSideBar = $this->metodos->getModulos();
        $usuarios = $this->usuarios->obtenerUsuarios($estado = 'A');
        $grados = $this->grados->obtenerGrados('A');
        $horario_enc = $this->horario_enc->obtenerHorarios_enc('E');

        $data = ['titulo' => 'Administrar Horarios', 'usuarios' => $usuarios, 'grados' => $grados, 'datos' => $horario_enc, 'Modulos' => $cargaSideBar];

        echo view('/principal/sidebar', $data);
        echo view('/horarios_enc/horarios_enc', $data);
    }

    public function obtenerHorarios_enc()
    {
        $estado = $this->request->getPost('estado');
        $horario_enc = $this->horario_enc->obtenerHorarios_enc($estado);
        echo json_encode($horario_enc);
    }

    public function obtenerfranjas($id)
    {
        $returnData = array();
        $franja = $this->franja->ObtenerParametro($id);
        if (!empty($franja)) {
            return  json_encode($franja);
        }
        return json_encode($returnData);
    }

    public function insertar()
    {
        $tp = $this->request->getPost('tp');
        if ($tp == 1) {

            $this->horario_enc->save([
                'id_grado' => $this->request->getPost('id_grado'),
                'periodo_año' => $this->request->getPost('periodo_año'),
                'jornada' => $this->request->getPost('jornada'),
                'duracion_hora' => $this->request->getPost('duracion'),
                'inicio' => $this->request->getPost('inicio'),
                'fin' => $this->request->getPost('fin'),
                'usuario_crea' => session('id'),

            ]);
        } else {
            $this->horario_enc->update($this->request->getPost('id'), [
                'id_grado' => $this->request->getPost('id_grado'),
                'periodo_año' => $this->request->getPost('periodo_año'),
                'jornada' => $this->request->getPost('jornada'),
                'duracion' => $this->request->getPost('duracion'),
                'inicio' => $this->request->getPost('inicio'),
                'fin' => $this->request->getPost('fin'),
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
        $horario_enc = $this->horario_enc->traer_horario_enc($id);
        echo json_encode($horario_enc);
    }


    public function cambiarEstado($id, $estado)
    {
        $horario_enc = $this->horario_enc->cambiar_Estado($id, $estado);
        return '1';
    }

    public function eliminados() //Mostrar vista de Paises Eliminados
    {
        $cargaSideBar = $this->metodos->getModulos();

        // Redireccionar a la URL anterior
        $data = ['titulo' => 'Administrar Horariosenc Eliminadas', 'datos' => 'vacio', 'Modulos' => $cargaSideBar];
        echo view('/principal/sidebar', $data);
        echo view('/horarios_enc/eliminados', $data);
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
        } else if ($filtro['periodo_año'] == $valor && $filtro['id_grado'] == $id_grado) {
            $respuesta = false;
        }
        $respuesta = false;
        return $this->response->setJSON($respuesta);
    }
}
