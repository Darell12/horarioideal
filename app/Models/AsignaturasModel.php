<?php

namespace App\Models;

use CodeIgniter\Model;

class AsignaturasModel extends Model
{
    protected $table = 'asignaturas';
    protected $primaryKey = 'id_asignatura';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['nombre', 'Codigo', 'tipo_requerido',  'estado', 'usuario_crea'];
    protected $useTimestamps = true; 
    protected $createdField  = 'fecha_crea'; 
    protected $updatedField  = '';
    protected $deletedField  = ''; 

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
    
    
    public function obtenerAsignaturas($estado)
    {
        $this->select('asignaturas.id_asignatura, asignaturas.nombre, param2.nombre as Codigo, param.nombre as tipo_requerido');
        $this->join('parametro_det as param', 'asignaturas.tipo_requerido = param.id_parametro_det');
        $this->join('vw_param_det as param2', 'asignaturas.Codigo = param2.id_parametro_det');
        $this->where('asignaturas.estado', $estado);
        $datos = $this->findAll();
        return $datos;
    }

    public function obtenerAsignaturasEliminados()
    {
        $this->select('asignaturas.*');
        $this->where('estado', 'E');
        $this->orderBy('nombre', 'ASC');
        $datos = $this->findAll();
        return $datos;
    }
    public function buscarAsignaturas($id)
    {
        $this->select('asignaturas.*');
        $this->where('id_asignatura', $id);
        $this->where('estado', 'A');
        $datos = $this->first();
        return $datos;
    }
    public function buscarAsignaturasxGrado($id_grado)
    {
        $this->select('asignaturas.id_asignatura, asignaturas.nombre, g.id_grado_asignatura');
        $this->join('grados_asignatura as g', 'asignaturas.id_asignatura = g.id_asignatura');
        $this->where('g.id_grado', $id_grado);
        $this->where('asignaturas.estado', 'A');
        $datos = $this->findAll();
        return $datos;
    }
    public function cambiar_Estado($id, $estado)
    {
        $datos = $this->update($id, ['estado' => $estado]);
        return $datos;
    }
    public function traer_asignaturas($id)
    {
        $this->select('asignaturas.*');
        $this->where('id', $id);

        $datos = $this->first();  // nos trae el registro que cumpla con una condicion dada 
        return $datos;
    }
    public function filtro($campo ,$valor)
    {
        $this->select('asignaturas.*');
        $this->where($campo, $valor);
        $datos = $this->first();
        return $datos;
    }
}
