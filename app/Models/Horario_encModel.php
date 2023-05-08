<?php

namespace App\Models;

use CodeIgniter\Model;

class Horario_encModel extends Model
{
    protected $table = 'horarios_enc';
    protected $primaryKey = 'id_horarios_enc ';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['id_usuario', 'id_grado', 'periodo_año', 'jornada', 'estado', 'usuario_crea',];
    protected $useTimestamps = true; 
    protected $createdField  = 'fecha_crea'; 
    protected $updatedField  = '';
    protected $deletedField  = ''; 

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function obtenerHorarios_enc()
    {
        $this->select('horarios_enc.*, u.nombre_corto as usuario, g.alias as grado, p.nombre as jornada');
        $this->join('usuarios as u', 'horarios_enc.id_usuario = u.id_usuario');
        $this->join('grados as g', 'horarios_enc.id_grado = g.id_grado');
        $this->join('parametro_det as p', 'horarios_enc.jornada = p.id_parametro_det');
        $this->where('horarios_enc.estado', 'A');
        $datos = $this->findAll(); 
        return $datos;
    }

    public function obtenerHorarios_encEliminados()
    {
        $this->select('horarios_enc.*');
        $this->where('estado', 'E');
        // $this->orderBy('nombre', 'ASC');
        $datos = $this->findAll();
        return $datos;
    }
    public function obtenerProfesores()
    {
        $this->select('usuarios.*, usuarios.id_usuario, usuarios.id_usuario,  usuarios.estado');
        $this->join('usuarios', 'usuarios.id_usuario = usuarios.id_usuario', 'left');
        $this->where('usuarios.estado', 'A');
        $this->where('usuarios.id_rol', '4');
        $datos = $this->findAll();
        return $datos;
    }
    
    public function buscarAccion($id)
    {
        $this->select('horarios_enc.*');
        $this->where('id_horarios_enc', $id);
        $this->where('estado', 'A');
        $datos = $this->first();
        return $datos;
    }
    public function cambiar_Estado($id, $estado)
    {
        $datos = $this->update($id, ['estado' => $estado]);
        return $datos;
    }
    public function traer_horario_enc($id)
    {
        $this->select('horarios_enc.*');
        $this->where('id', $id);

        $datos = $this->first();  // nos trae el registro que cumpla con una condicion dada 
        return $datos;
    }

}
