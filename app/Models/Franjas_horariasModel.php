<?php

namespace App\Models;

use CodeIgniter\Model;

class Franjas_horariasModel extends Model
{
    protected $table = 'franjas_horarias';
    protected $primaryKey = 'id_franja_horaria';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['hora_inicio', 'hora_fin', 'estado', 'usuario_crea'];
    protected $useTimestamps = true; 
    protected $createdField  = 'fecha_crea'; 
    protected $updatedField  = '';
    protected $deletedField  = ''; 

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function obtenerFranjas()
    {
        $this->select('franjas_horarias.*');
        $this->where('estado', 'A');
        $datos = $this->findAll();
        return $datos;
    }
   
    public function obtenerFranjasEliminados()
    {
        $this->select('franjas_horarias.*');
        $this->where('estado', 'E');
        $datos = $this->findAll();
        return $datos;
    }
    
    public function buscarFranjas($id)
    {
        $this->select('franjas_horarias.*');
        $this->where('id_franja_horaria', $id);
        $this->where('estado', 'A');
        $datos = $this->first();
        return $datos;
    }

    public function cambiar_Estado($id, $estado)
    {
        $datos = $this->update($id, ['estado' => $estado]);
        return $datos;
    }

    public function traer_franja($id)
    {
        $this->select('franjas_horarias.*');
        $this->where('id', $id);

        $datos = $this->first();  // nos trae el registro que cumpla con una condicion dada 
        return $datos;
    }
    public function filtro($campo ,$valor)
    {
        $this->select('franjas_horarias.*');
        $this->where($campo, $valor);
        $this->where('estado', 'A');
        $datos = $this->first();
        return $datos;
    }

}
