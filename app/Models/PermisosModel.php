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

    public function obtenerPermisos($estado)
    {
        $this->select('permisos.*, r.nombre as rol, a.nombre as accion ');
        $this->join('roles as r', 'permisos.id_rol = r.id_rol');
        $this->join('acciones as a', 'permisos.id_accion = a.id_acciones');
        $this->where('permisos.estado', $estado);
        $datos = $this->findAll(); 
        return $datos;
    }
    public function obtenerPermisosRol($rol)
    {
        $this->select('permisos.*, r.nombre as rol, a.nombre as accion ');
        $this->join('roles as r', 'permisos.id_rol = r.id_rol');
        $this->join('acciones as a', 'permisos.id_accion = a.id_acciones');
        $this->where('permisos.estado', 'A');
        $this->where('permisos.id_rol', $rol);
        $datos = $this->findAll(); 
        return $datos;
    }

    public function obtenerPermisosEliminados()
    {
        $this->select('permisos.*');
        $this->where('estado', 'E');
        // $this->orderBy('nombre', 'ASC');
        $datos = $this->findAll();
        return $datos;
    }
    public function buscarPermiso($id)
    {
        $this->select('permisos.*');
        $this->where('id_permiso', $id);
        $this->where('estado', 'A');
        $datos = $this->first();
        return $datos;
    }
    public function buscarPermisoA($id)
    {
<<<<<<< HEAD
        $this->select('permisos.id_accion');
=======
        $this->select('permisos.*');
>>>>>>> 0a0ca0b9cdc2a947979babc253f02c0e6dfda569
        $this->where('id_rol', $id);
        $this->where('estado', 'A');
        $datos = $this->findAll();
        return $datos;
    }
    public function cambiarEstado($id, $estado)
    {
        $datos = $this->update($id, ['estado' => $estado]);
        return $datos;
    }
    public function traer_permiso($id)
    {
        $this->select('permisos.*');
        $this->where('id', $id);

        $datos = $this->first();  // nos trae el registro que cumpla con una condicion dada 
        return $datos;
    }

    public function filtro($campo ,$valor)
    {
        $this->select('permisos.*');
        $this->where($campo, $valor);
        $this->where('estado', 'A');
        $datos = $this->first();
        return $datos;
    }

}
