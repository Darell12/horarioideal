<?php

namespace App\Models;

use CodeIgniter\Model;

class AulaModel extends Model
{
    protected $table = 'aulas';
    protected $primaryKey = 'id_aula';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['nombre', 'descripcion', 'tipo', 'tipo' ,'estado', 'usuario_crea'];
    protected $useTimestamps = true; 
    protected $createdField  = 'fecha_crea'; 
    protected $updatedField  = '';
    protected $deletedField  = ''; 

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function obtenerAulas($estado)
    {
        $this->select('aulas.*,  p.nombre as tipo, p.id_parametro_det as id_param');
        $this->join('parametro_det as p', 'aulas.tipo = p.id_parametro_det');
        $this->where('aulas.estado', $estado);
        $datos = $this->findAll();
        return $datos;
    }
    public function obtenerAulasxTipo($tipo)
    {
        $this->select('aulas.*,  p.nombre as tipo');
        $this->join('parametro_det as p', 'aulas.tipo = p.id_parametro_det');
        $this->join('asignaturas as a', 'aulas.tipo = a.tipo_requerido');
        $this->join('grados_asignatura as g', 'a.id_asignatura = g.id_asignatura');
        $this->where('g.id_grado_asignatura', $tipo);
        $this->where('aulas.estado', 'A');
        $datos = $this->findAll();
        return $datos;
    }
    public function buscarAula($id)
    {
        $this->select('aulas.*');
        $this->where('id_aula', $id);
        $this->where('estado', 'A');
        $datos = $this->first();
        return $datos;
    }
    public function cambiar_Estado($id, $estado)
    {
        $datos = $this->update($id, ['estado' => $estado]);
        return $datos;
    }
    public function traer_aula($id)
    {
        $this->select('aulas.*');
        $this->where('id', $id);

        $datos = $this->first();  // nos trae el registro que cumpla con una condicion dada 
        return $datos;
    }
    public function filtro($campo ,$valor)
    {
        $this->select('aulas.*');
        $this->where($campo, $valor);
        $datos = $this->first();
        return $datos;
    }

}
