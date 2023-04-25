<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Horario_detModel;
use App\Models\UsuariosModel;
use App\Models\GradosModel;
use App\Models\Parametros_detModel;
use App\Models\HorarioModel;


class Horario_det extends BaseController
{
    protected $horario_det, $eliminados;
    protected $horario;
    protected $usuarios, $grados;


    public function __construct()
    {
        $this->horario_det = new Horario_detModel();
        $this->horario = new HorarioModel();
        $this->eliminados = new Horario_detModel();
        $this->usuarios = new UsuariosModel();
        $this->grados = new GradosModel();
    }

    public function index($id)
    {
        $horario_det = $this->horario_det->obtenerDetalle_horario($id);
        $usuarios = $this->usuarios->obtenerUsuarios();
        $horario = $this->horario->vistaHorarioPrueba();
        $grados = $this->grados->obtenerGrados();

        $data = ['titulo' => 'Administrar Horarios', 'datos' => $horario, 'usuarios' => $usuarios, 'grados' => $grados  ];

       echo view('/principal/sidebar', $data);
       echo view('/horarios_det/detalle', $data);
    }

    public function insertar()
    {
        $tp = $this->request->getPost('tp');
        if ($tp == 1) {

            $this->horario_enc->save([
                'id_usuario' => $this->request->getPost('id_usuario'),
                'id_grado' => $this->request->getPost('id_grado'),
                'periodo_año' => $this->request->getPost('periodo_año'),
                'jornada' => $this->request->getPost('jornada'),
                'usuario_crea'=> session('id')
            ]);
        } else {
            $this->horario_enc->update($this->request->getPost('id'), [
                'id_usuario' => $this->request->getPost('id_usuario'),
                'id_grado' => $this->request->getPost('id_grado'),
                'periodo_año' => $this->request->getPost('periodo_año'),
                'jornada' => $this->request->getPost('jornada'),
                'usuario_crea'=> session('id')
            ]);
        }
        return redirect()->to(base_url('/horarios_enc'));
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

        if (
            $estado == 'E'
        ) {
            return redirect()->to(base_url('/ver_horarios_enc'));
        } else {
            return redirect()->to(base_url('/eliminados_horarios_enc'));
        }
    }

    public function eliminados() //Mostrar vista de Paises Eliminados
    {
        $eliminados = $this->eliminados->obtenerHorarios_encEliminados();


        // Redireccionar a la URL anterior
        if (!$eliminados) {
            $data = ['titulo' => 'Administrar Horariosenc Eliminadas','datos' => 'vacio'];
            echo view('/principal/sidebar', $data);
            echo view('/horarios_enc/eliminados', $data);
        } else {
            $data = ['titulo' => 'Administrar Horariosenc Eliminadas', 'datos' => $eliminados];
            echo view('/principal/sidebar', $data);
            echo view('/horarios_enc/eliminados', $data);
        }
    }

}