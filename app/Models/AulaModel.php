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
    protected $allowedFields = ['nombre', 'descripcion', 'bloque', 'sede', 'estado', 'usuario_crea'];
    protected $useTimestamps = true; 
    protected $createdField  = 'fecha_crea'; 
    protected $updatedField  = '';
    protected $deletedField  = ''; 

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function obtenerAulas()
    {
        $this->select('aulas.*');
        $this->where('estado', 'A');
        $datos = $this->findAll();
        return $datos;
    }
    public function obtenerAulasEliminados()
    {
        $this->select('aulas.*');
        $this->where('estado', 'E');
        $this->orderBy('nombre', 'ASC');
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

}
