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

        $data = ['titulo' => 'Administrar Horarios', 'datos' => $horario_enc,  'usuarios' => $usuarios, 'grados' => $grados  ];

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
                'usuario_crea'=> session('id'),
              
            ]);
        } else {
            $this->horario_enc->update($this->request->getPost('id'), [
                'id_grado' => $this->request->getPost('id_grado'),
                'periodo_año' => $this->request->getPost('periodo_año'),
                'jornada' => $this->request->getPost('jornada'),
                'usuario_crea'=> session('id'),
                
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