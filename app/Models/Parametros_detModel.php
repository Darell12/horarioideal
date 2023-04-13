<?php

namespace App\Models;

use CodeIgniter\Model;

class Parametros_detModel extends Model
{
    protected $table = 'parametro_det';
    protected $primaryKey = 'id_det ';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['nombre', 'resumen', 'id_enc', 'estado', 'usuario_crea'];
    protected $useTimestamps = true; 
    protected $createdField  = 'fecha_crea'; 
    protected $updatedField  = '';
    protected $deletedField  = ''; 

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

}
