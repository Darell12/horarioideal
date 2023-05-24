<?php

namespace App\Models;
use CodeIgniter\Model;

class AcudientesModel extends Model
{
    protected $table = 'acudientes';
    protected $primaryKey = 'id_acudiente';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['id_estudiante','nombre_p', 'nombre_s','apellido_a','apellido_s','direccion', 'estado', 'usuario_crea'];
    protected $useTimestamps = true; 
    protected $createdField  = 'fecha_crea'; 
    protected $updatedField  = '';
    protected $deletedField  = ''; 

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function obtenerAcudientes($estado)
    {
        $this->select('acudientes.*');
        $this->where('estado', $estado);
        $datos = $this->findAll();
        return $datos;
    }

}

