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
        $this->select('email, estado, id_email, id_usuario, prioridad');
        $this->where('id_usuario', $id);
        $this->where('emails.estado', $estado);
        $datos = $this->findAll();
        return $datos;
    }
    public function ObtenerEmailUsuarioExcel($id, $estado)
    {
        $this->select('email');
        $this->where('id_usuario', $id);
        $this->where('emails.estado', $estado);
        $datos = $this->first();
        return $datos;
    }
    public function ObtenerEmail($id)
    {
        $this->select('emails.email, emails.estado, emails.id_email, emails.id_usuario, emails.prioridad');
        $this->where('id_email', $id);
        $datos = $this->first();
        return $datos;
    }
    public function cambiarEstado($id, $estado)
    {
        $datos = $this->update($id, ['estado' => $estado]);
        return $datos;
    }
    public function filtro($campo, $valor){
        $this->select('emails.*');
        $this->where($campo, $valor);
        $this->where('estado', 'A');
        $datos = $this->first();
        return $datos;
    }
}
