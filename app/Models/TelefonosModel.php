<?php

namespace App\Models;

use CodeIgniter\Model;

class TelefonosModel extends Model
{
    protected $table = 'telefonos';
    protected $primaryKey = 'id_telefono ';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['id_usuario', 'numero', 'tipo', 'prioridad', 'estado', 'usuario_crea'];
    protected $useTimestamps = true; 
    protected $createdField  = 'fecha_crea'; 
    protected $updatedField  = '';
    protected $deletedField  = ''; 

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

}
