<?php

namespace App\Models;

use CodeIgniter\Model;

class Horario_encModel extends Model
{
    protected $table = 'horarios_enc';
    protected $primaryKey = 'id_horarios_enc ';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['id_usuario', 'id_grado', 'periodo_año', 'jornada', 'estado', 'usuario_crea'];
    protected $useTimestamps = true; 
    protected $createdField  = 'fecha_crea'; 
    protected $updatedField  = '';
    protected $deletedField  = ''; 

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

}
