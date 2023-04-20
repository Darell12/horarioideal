<?php

namespace App\Models;

use CodeIgniter\Model;

class PermisosModel extends Model
{
    protected $table = 'permisos';
    protected $primaryKey = 'id_permiso';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['id_rol', 'id_accion', 'estado', 'usuario_crea'];
    protected $useTimestamps = true; 
    protected $createdField  = 'fecha_crea'; 
    protected $updatedField  = '';
    protected $deletedField  = ''; 

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function obtenerPermisos()
    {
        $this->select('permisos.*, r.nombre as rol, a.nombre as accion ');
        $this->join('roles as r', 'permisos.id_rol = r.id_rol');
        $this->join('acciones as a', 'permisos.id_accion = a.id_acciones');
        $this->where('permisos.estado', 'A');
        $datos = $this->findAll(); 
        return $datos;
    }

    public function obtenerPermisosEliminados()
    {
        $this->select('permisos.*');
        $this->where('estado', 'E');
        $this->orderBy('nombre', 'ASC');
        $datos = $this->findAll();
        return $datos;
    }
    public function buscarPermiso($id)
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
    public function traer_permiso($id)
    {
        $this->select('permiso.*');
        $this->where('id', $id);

        $datos = $this->first();  // nos trae el registro que cumpla con una condicion dada 
        return $datos;
    }

}
