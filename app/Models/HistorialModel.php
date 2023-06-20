<?php

namespace App\Models;

use CodeIgniter\Model;

class HistorialModel extends Model
{
    protected $table = 'historial';
    protected $primaryKey = 'id_historial';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['descripcion', 'tipo','responsable','tabla'];
    protected $useTimestamps = true; 
    protected $createdField  = 'fecha_crea'; 
    protected $updatedField  = '';
    protected $deletedField  = ''; 

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function obtenerHistorial()
    {
        $this->select('historial.*, usuario.nombre_p, usuario.apellido_p, det.nombre');
        $this->join('usuarios as usuario', 'historial.responsable = usuario.id_usuario');
        $this->join('parametro_det as det', 'historial.tipo = det.id_parametro_det');
        $datos = $this->findAll();
        return $datos;
    }


}
