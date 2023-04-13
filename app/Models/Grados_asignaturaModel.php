<?php

namespace App\Models;

use CodeIgniter\Model;

class Grados_asignaturaModel extends Model
{
    protected $table = 'grados_asignatura';
    protected $primaryKey = 'id_grado_asignatura';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['id_grado', 'id_asignatura', 'estado', 'usuario_crea'];
    protected $useTimestamps = true; 
    protected $createdField  = 'fecha_crea'; 
    protected $updatedField  = '';
    protected $deletedField  = ''; 

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

}
