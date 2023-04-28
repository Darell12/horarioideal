<?php

namespace App\Models;

use CodeIgniter\Model;

class GradosModel extends Model
{
    protected $table = 'grados';
    protected $primaryKey = 'id_grado ';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['alias', 'estado', 'usuario_crea'];
    protected $useTimestamps = true; 
    protected $createdField  = 'fecha_crea'; 
    protected $updatedField  = '';
    protected $deletedField  = ''; 

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function obtenerGrados()
    {
        $this->select('grados.*');
        // $this->select('MAX(CASE WHEN grados_asignatura.id_grado IS NOT NULL THEN "SI" ELSE "NO" END) AS grados_asignatura');
        // $this->join('grados_asignatura', 'grados.id_grado = grados_asignatura.id_grado', 'left');
        $this->where('grados.estado', 'A');
        $datos = $this->findAll();
        return $datos;
    }

    public function obtenerGradosEliminados()
    {
        $this->select('grados.*');
        $this->where('grados.estado', 'E');
        $datos = $this->findAll();
        return $datos;
    }
    
    public function buscarGrado($id)
    {
        $this->select('grados.*');
        $this->where('id_grado', $id);
        $this->where('estado', 'A');
        $datos = $this->first();
        return $datos;
    }

    public function cambiar_Estado($id, $estado)
    {
        $datos = $this->update($id, ['estado' => $estado]);
        return $datos;
    }

    public function traer_grados($id)
    {
        $this->select('grados.*');
        $this->where('id', $id);

        $datos = $this->first();  // nos trae el registro que cumpla con una condicion dada 
        return $datos;
    }

}
