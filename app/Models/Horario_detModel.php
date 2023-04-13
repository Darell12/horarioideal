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

}
