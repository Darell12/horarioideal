<?php

namespace App\Models;

use CodeIgniter\Model;

class EstudiantesModel extends Model
{
    protected $table = 'estudiantes';
    protected $primaryKey = 'id_estudiante';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['id_estudiante','id_usuario', 'id_grado', 'estado', 'usuario_crea'];
    protected $useTimestamps = true; 
    protected $createdField  = 'fecha_crea'; 
    protected $updatedField  = '';
    protected $deletedField  = ''; 

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function obtenerEstudiantes()
    {
        $this->select('estudiantes.id_estudiante, estudiantes.id_usuario, estudiantes.id_grado');
        $this->where('estudiantes.estado', 'A');
        $datos = $this->findAll();
        return $datos;
    }

}
