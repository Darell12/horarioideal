<?php

namespace App\Models;

use CodeIgniter\Model;

class Disponibilidad_profModel extends Model
{
    protected $table = 'disponibilidad_prof';
    protected $primaryKey = 'id_disponibilidad_prof  ';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['id_usuario', 'dia', 'hora_inico', 'hora_fin', 'estado', 'usuario_crea'];
    protected $useTimestamps = true; 
    protected $createdField  = 'fecha_crea'; 
    protected $updatedField  = '';
    protected $deletedField  = ''; 

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;



    public function ObtenterDisponibilidad($id)
    {
        $this->select('disponibilidad_prof.*, usuarios.id_usuario as nombre, parametro_det.nombre as dia');
        $this->join('usuarios', 'disponibilidad_prof.id_usuario = usuarios.id_usuario');
        $this->join('parametro_det', 'disponibilidad_prof.dia = parametro_det.id_parametro_det');
        $this->where('disponibilidad_prof.estado', 'A');
        $this->where('disponibilidad_prof.id_usuario', $id);
        $datos = $this->findAll();
        return $datos;
    }

    public function disponibilidadProfesor($id)
    {
        $this->select('disponibilidad_prof.*, usuarios.nombre as id_usuario, parametro_det.nombre as dia');
        $this->join('usuarios', 'usuarios.id_usuario = grados_asignatura.id_grado_asignatura');
        $this->join('parametro_det', 'parametro_det.id_parametro_det = parametro_det.id_parametro_det');
        $this->where('disponibilidad_prof.estado', 'A');
        $this->where('disponibilidad_prof.id_disponibilidad_prof', $id);
        $datos = $this->first();
        return $datos;
    }

   
    public function ObtenerDispo($id)
    {
        $this->select('disponibilidad_prof.*');
        $this->where('disponibilidad_prof.estado', 'A',$id);
        $datos = $this->first();
        return $datos;
    }
    public function cambiarEstado($id, $estado)
    {
        $datos = $this->update($id, ['estado' => $estado]);
        return $datos;
    }
}
