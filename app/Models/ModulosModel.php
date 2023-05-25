<?php

namespace App\Models;

use CodeIgniter\Model;

class ModulosModel extends Model
{
    protected $table = 'modulos';
    protected $primaryKey = 'id_modulo';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['nombre','tipo', 'orden', 'icono', 'codigo'];
    protected $useTimestamps = true; 
    protected $createdField  = 'fecha_crea'; 
    protected $updatedField  = '';
    protected $deletedField  = ''; 

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function obtenerModulos($estado)
    {
        $this->select('modulos.*');
        $this->where('estado', $estado='A'); 
        $datos = $this->findAll();
        return $datos;
    }
    public function obtenerModulosRol($rol)
    {
        $this->select('modulos.*');
        $this->where('id_modulo', $rol);
        $this->orderBy('orden_padre');
        $this->orderBy('orden'); 
        $datos = $this->findAll();
        return $datos;
    }


}
