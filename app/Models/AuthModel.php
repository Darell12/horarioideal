<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table = 'frases_carrusel';
    protected $primaryKey = 'id_frase';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['texto', 'estado'];
    protected $useTimestamps = true; 
    protected $createdField  = ''; 
    protected $updatedField  = '';
    protected $deletedField  = ''; 

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function obtenerFrases($estado)
    {
        $this->select('frases_carrusel.*');
        $this->where('frases_carrusel.estado', $estado);
        $datos = $this->findAll();
        return $datos;
    }
  
}
