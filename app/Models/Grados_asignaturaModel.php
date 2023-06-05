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
    protected $allowedFields = ['id_grado', 'id_asignatura', 'estado', 'usuario_crea','horas_semanales'];
    protected $useTimestamps = true; 
    protected $createdField  = 'fecha_crea'; 
    protected $updatedField  = '';
    protected $deletedField  = ''; 

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function obtenerAsignaturasGrado($id)
    {
        $this->select('grados_asignatura.*, asignaturas.nombre as asignatura, asignaturas.nombre as nombre, asignaturas.codigo as codigo, param.nombre as area');
        $this->join('asignaturas', 'grados_asignatura.id_asignatura = asignaturas.id_asignatura');
        $this->join('parametro_det as param', 'asignaturas.Codigo = param.id_parametro_det');
        $this->where('grados_asignatura.id_grado', $id);
        $this->where('grados_asignatura.estado', 'A');
        $datos = $this->findAll();
        return $datos;
    }

    public function filtroGA($campo ,$valor)
    {
        $this->select('grados_asignatura.*');
        $this->where($campo, $valor);
        $this->where('estado', 'A');
        $datos = $this->first();
        return $datos;
    }

}
