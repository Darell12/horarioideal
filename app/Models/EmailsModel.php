<?php

namespace App\Models;

use CodeIgniter\Model;

class EmailsModel extends Model
{
    protected $table = 'emails';
    protected $primaryKey = 'id_email';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['email', 'prioridad', 'id_usuario', 'estado', 'usuario_crea'];
    protected $useTimestamps = true; 
    protected $createdField  = 'fecha_crea'; 
    protected $updatedField  = '';
    protected $deletedField  = ''; 

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;


    public function ObtenerEmailUsuario($id, $estado)
    {
        $this->select('emails.email, emails.estado, emails.id_email, emails.id_usuario, parametro_det.nombre as prioridad');
        $this->join('parametro_det', 'emails.prioridad = parametro_det.id_parametro_det');

        $this->where('id_usuario', $id);
        $this->where('emails.estado', $estado);
        $datos = $this->findAll();
        return $datos;
    }
    public function ObtenerEmail($id)
    {
        $this->select('emails.email, emails.estado, emails.id_email, emails.id_usuario, emails.prioridad');
        $this->where('id_email', $id);
        $datos = $this->first();
        return $datos;
    }
}
