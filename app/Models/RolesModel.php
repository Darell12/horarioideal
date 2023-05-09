<?php

namespace App\Models;

use CodeIgniter\Model;

class RolesModel extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'id_rol';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['nombre', 'estado', 'usuario_crea'];
    protected $useTimestamps = true; 
    protected $createdField  = 'fecha_crea'; 
    protected $updatedField  = '';
    protected $deletedField  = ''; 

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function obtenerRoles($estado)
    {
        $this->select('roles.*');
        $this->where('estado', $estado);
        $datos = $this->findAll();
        return $datos;
    }
    public function obtenerRolesEliminados()
    {
        $this->select('roles.*');
        $this->where('estado', 'E');
        $this->orderBy('nombre', 'ASC');
        $datos = $this->findAll();
        return $datos;
    }
    public function buscarRol($id)
    {
        $this->select('roles.*');
        $this->where('id_rol', $id);
        $this->where('estado', 'A');
        $datos = $this->first();
        return $datos;
    }
    public function cambiar_Estado($id, $estado)
    {
        $datos = $this->update($id, ['estado' => $estado]);
        return $datos;
    }
    public function traer_rol($id)
    {
        $this->select('roles.*');
        $this->where('id', $id);

        $datos = $this->first();  // nos trae el registro que cumpla con una condicion dada 
        return $datos;
    }
    public function filtro($campo ,$valor)
    {
        $this->select('roles.*');
        $this->where($campo, $valor);
        $datos = $this->first();
        return $datos;
    }

}
