<?php

namespace App\Models;

use CodeIgniter\Model;

class Disponibilidad_proModel extends Model
{
    protected $table = 'disponibilidad_prof';
    protected $primaryKey = 'id_disponibilidad_prof  ';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['id_usuario', 'dia', 'hora_inico', 'hora_fin', 'estado', 'usuario_crea'];
    protected $useTimestamps = true; 
    protected $createdField  = 'fecha_crea'; 
    protected $updatedField  = '';
    protected $deletedField  = ''; 

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

}
