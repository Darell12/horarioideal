<?php

namespace App\Models;

use CodeIgniter\Model;

class HorarioModel extends Model
{
    protected $table = 'detalle';
    // protected $primaryKey = 'id_encabezado';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['id_encabezado', 'periodo', 'grado', 'jornada', 'id_horario_det', 'aula', 'asignatura', 'hora_inicio', 'hora_fin', 'profesor', 'usuario_crea'];
    protected $useTimestamps = true; 
    protected $createdField  = 'fecha_crea'; 
    protected $updatedField  = '';
    protected $deletedField  = ''; 

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function vistaHorarioPrueba($id)
    {
        $this->select('*');
        $this->where('id_encabezado', $id);
        // $this->from('horario');
        $datos = $this->findAll();
        return $datos;
    }
}
