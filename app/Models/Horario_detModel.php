<?php

namespace App\Models;

use CodeIgniter\Model;

class Horario_detModel extends Model
{
    protected $table = 'horario_det';
    protected $primaryKey = 'id_horario_det ';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['id_grado_asignatura', 'id_aula', 'id_horario_enc', 'id_franja_horaria', 'estado', 'usuario_crea'];
    protected $useTimestamps = true; 
    protected $createdField  = 'fecha_crea'; 
    protected $updatedField  = '';
    protected $deletedField  = ''; 

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
    
    public function obtenerDetalle_horario($id)
    {
        $this->select('horario_det.*, u.nombre_p as profesor, a.id_asignatura, asig.nombre as asignatura, aulas.nombre as aula, param.nombre as inicio, param2.nombre as dia');
        $this->join('usuarios as u', 'horario_det.profesor = u.id_usuario');
        $this->join('parametro_det as param', 'param.id_parametro_det = horario_det.hora_inicio');
        $this->join('vw_param_det as param2', 'param2.id_parametro_det = horario_det.dia');
        $this->join('aulas', 'horario_det.id_aula = aulas.id_aula');
        $this->join('grados_asignatura as a', 'a.id_grado_asignatura = horario_det.id_grado_asignatura');
        $this->join('asignaturas as asig', 'asig.id_asignatura = a.id_asignatura');
        $this->where('horario_det.estado', 'A');
        $this->where('horario_det.id_horario_enc', $id);
        $datos = $this->findAll(); 
        return $datos;
    }

}
