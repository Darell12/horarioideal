<?php

namespace App\Models;

use CodeIgniter\Model;

class Asignatura_profesoresModel extends Model
{
    protected $table = 'asignatura_profesores';
    protected $primaryKey = 'id_asignatura_profesor  ';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['id_usuario', 'id_grado_asignatura', 'estado', 'usuario_crea'];
    protected $useTimestamps = true; 
    protected $createdField  = 'fecha_crea'; 
    protected $updatedField  = '';
    protected $deletedField  = ''; 

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

}
