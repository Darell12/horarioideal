<?php

namespace App\Models;

use CodeIgniter\Model;

class Parametros_detModel extends Model
{
    protected $table = 'parametro_det';
    protected $primaryKey = 'id_det ';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['nombre', 'resumen', 'id_enc', 'estado', 'usuario_crea'];
    protected $useTimestamps = true; 
    protected $createdField  = 'fecha_crea'; 
    protected $updatedField  = '';
    protected $deletedField  = ''; 

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function ObtenerParametro($parametro)
    {
        $this->select('parametro_det.id_parametro_det ,parametro_det.nombre, parametro_det.resumen, parametro_enc.nombre as encabezado');
        $this->join('parametro_enc', 'parametro_det.id_enc = parametro_enc.id_enc');
        $this->where('parametro_det.estado', 'A');
        $this->where('parametro_det.id_enc', $parametro);
        $datos = $this->findAll();
        return $datos;
    }
    public function ObtenerSedes()
    {
        $this->select('parametro_det.id_parametro_det ,parametro_det.nombre, parametro_det.resumen, parametro_enc.nombre as encabezado');
        $this->join('parametro_enc', 'parametro_det.id_enc = parametro_enc.id_enc');
        $this->where('parametro_det.estado', 'A');
        $this->where('parametro_det.id_enc', '6');
        $datos = $this->findAll();
        return $datos;
    }
    public function ObtenerBloques()
    {
        $this->select('parametro_det.id_parametro_det ,parametro_det.nombre, parametro_det.resumen, parametro_enc.nombre as encabezado');
        $this->join('parametro_enc', 'parametro_det.id_enc = parametro_enc.id_enc');
        $this->where('parametro_det.estado', 'A');
        $this->where('parametro_det.id_enc', '5');
        $datos = $this->findAll();
        return $datos;
    }
}
