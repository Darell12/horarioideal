<?php

namespace App\Models;

use CodeIgniter\Model;

class Asignatura_profesoresModel extends Model
{
    protected $table = 'asignatura_profesores';
    protected $primaryKey = 'id_asignatura_profesor';

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

    public function ObtenterAsignaturas($id)
    {
        $this->select('asignatura_profesores.*, asignaturas.nombre as nombre, grados.alias, grados_asignatura.horas_semanales, grados.alias as grado');
        $this->join('grados_asignatura', 'asignatura_profesores.id_grado_asignatura = grados_asignatura.id_grado_asignatura');
        $this->join('asignaturas', 'grados_asignatura.id_asignatura = asignaturas.id_asignatura');
        $this->join('grados', 'grados_asignatura.id_grado = grados.id_grado');
        $this->where('asignatura_profesores.estado', 'A');
        $this->where('id_usuario', $id);
        $datos = $this->findAll();
        return $datos;
    }
    public function asignaturaProfesor($id)
    {
        $this->select('asignatura_profesores.*, asignaturas.nombre as asignatura, grados.alias');
        $this->join('grados_asignatura', 'asignatura_profesores.id_grado_asignatura = grados_asignatura.id_grado_asignatura');
        $this->join('asignaturas', 'grados_asignatura.id_asignatura = asignaturas.id_asignatura');
        $this->join('grados', 'grados_asignatura.id_grado = grados.id_grado');
        $this->where('asignatura_profesores.estado', 'A');
        $this->where('asignatura_profesores.id_asignatura_profesor', $id);
        $datos = $this->first();
        return $datos;
    }

}
