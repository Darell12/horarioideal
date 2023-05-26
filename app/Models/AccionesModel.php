<?php

namespace App\Models;

use CodeIgniter\Model;

class AccionesModel extends Model
{
    protected $table = 'acciones';
    protected $primaryKey = 'id_acciones';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['nombre', 'id_modulo','estado', 'usuario_crea'];
    protected $useTimestamps = true; 
    protected $createdField  = 'fecha_crea'; 
    protected $updatedField  = '';
    protected $deletedField  = ''; 

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function obtenerAcciones($estado)
    {
        $this->select('acciones.*, modulos.nombre as modulo');
        $this->join('modulos', 'acciones.id_modulo = modulos.id_modulo');
        $this->where('acciones.estado', $estado);
        $datos = $this->findAll();
        return $datos;
    }
    public function obtenerAccionesRol($id)
    {
        $this->select('acciones.id_modulo');
        $this->where('id_acciones', $id);
        $datos = $this->findAll();
        return $datos;
    }

    public function obtenerAccionesEliminados()
    {
        $this->select('acciones.*');
        $this->where('estado', 'E');
        $this->orderBy('nombre', 'ASC');
        $datos = $this->findAll();
        return $datos;
    }

    public function buscarAccion($id)
    {
        $this->select('acciones.*');
        $this->where('id_acciones', $id);
        $this->where('estado', 'A');
        $datos = $this->first();
        return $datos;
    }

    public function cambiar_Estado($id, $estado)
    {
        $datos = $this->update($id, ['estado' => $estado]);
        return $datos;
    }

    public function traer_accion($id)
    {
        $this->select('acciones.*');
        $this->where('id', $id);

        $datos = $this->first();  // nos trae el registro que cumpla con una condicion dada 
        return $datos;
    }
    public function filtro($campo ,$valor)
    {
        $this->select('acciones.*');
        $this->where($campo, $valor);
        $this->where('estado', 'A');
        $datos = $this->first();
        return $datos;
    }


}
