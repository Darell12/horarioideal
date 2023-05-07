<?php

namespace App\Models;

use CodeIgniter\Model;

class TelefonosModel extends Model
{
    protected $table = 'telefonos';
    protected $primaryKey = 'id_telefono ';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['id_usuario', 'numero', 'tipo', 'prioridad', 'estado', 'usuario_crea'];
    protected $useTimestamps = true; 
    protected $createdField  = 'fecha_crea'; 
    protected $updatedField  = '';
    protected $deletedField  = ''; 

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function ObtenerTelefonoUsuario($id, $estado)
    {
        $this->select('telefonos.numero, telefonos.estado, telefonos.id_telefono, telefonos.id_usuario, parametro_det.nombre as prioridad');
        $this->join('parametro_det', 'telefonos.prioridad = parametro_det.id_parametro_det');

        $this->where('id_usuario', $id);
        $this->where('telefonos.estado', $estado);
        $datos = $this->findAll();
        return $datos;
    }
    public function ObtenerTelefono($id)
    {
        $this->select('telefonos.numero, telefonos.estado, telefonos.id_telefono, telefonos.id_usuario, telefonos.prioridad, telefonos.tipo');
        $this->where('id_usuario', $id);
        $datos = $this->findAll();
        return $datos;
    }
    public function cambiarEstado($id, $estado)
    {
        $datos = $this->update($id, ['estado' => $estado]);
        return $datos;
    }
    public function filtro($campo ,$valor)
    {
        $this->select('telefonos.*');
        $this->where($campo, $valor);
        $this->where('estado', 'A');
        $datos = $this->first();
        return $datos;
    }
}
