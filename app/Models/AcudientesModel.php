<?php

namespace App\Models;

use CodeIgniter\Model;

class AcudientesModel extends Model
{
    protected $table = 'acudientes';
    protected $primaryKey = 'id_acudiente';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['nombre_p','nombre_s','tipo_documento','n_documento','apellido_p','apellido_s','direccion','id_estudiante','estado', 'usuario_crea'];
    protected $useTimestamps = true; 
    protected $createdField  = 'fecha_crea'; 
    protected $updatedField  = '';
    protected $deletedField  = ''; 

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function obtenerAcudientes($estado, $id)
    {
        $this->select('acudientes.*, p.resumen as tipo_documento');
        $this->join('parametro_det as p', 'acudientes.tipo_documento = p.id_parametro_det');
        $this->where('acudientes.estado', $estado);
        $this->where('id_estudiante', $id);
        $datos = $this->findAll();
        return $datos;
    }

}
