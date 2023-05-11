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

    public function obtenerGrados($estado)
    {
        $this->select('grados.*');
        $this->where('estado', $estado);
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

    public function filtro($campo ,$valor)
    {
        $this->select('grados.*');
        $this->where($campo, $valor);
        $this->where('estado', 'A');
        $datos = $this->first();
        return $datos;
    }

}
