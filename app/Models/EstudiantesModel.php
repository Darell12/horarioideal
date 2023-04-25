<?php

namespace App\Models;
use CodeIgniter\Model;

class EstudiantesModel extends Model
{
    protected $table = 'estudiantes';
    protected $primaryKey = 'id_estudiante';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['id_estudiante','id_usuario', 'id_grado', 'estado', 'usuario_crea'];
    protected $useTimestamps = true; 
    protected $createdField  = 'fecha_crea'; 
    protected $updatedField  = '';
    protected $deletedField  = ''; 

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function obtenerEstudiantes()
    {
        $this->select('estudiantes.id_estudiante, estudiantes.id_usuario, estudiantes.id_grado, estudiantes.estado');
        $this->join('usuarios', 'usuarios.id_usuario = estudiantes.id_usuario');
        $this->where('estudiantes.estado', 'A');
        $this->where('usuarios.id_rol', '3');
        $datos = $this->findAll();
        return $datos;
    }
    public function obtenerEstudiantesEliminados()
    {
        $this->select('estudiantes.*');
        $this->where('estado', 'E');
        $this->orderBy('nombre', 'ASC');
        $datos = $this->findAll();
        return $datos;
    }
    public function buscarEstudiantes($id)
    {
        $this->select('aulas.*');
        $this->where('id_aula', $id);
        $this->where('estado', 'A');
        $datos = $this->first();
        return $datos;
    }
    public function cambiar_Estado($id, $estado)
    {
        $datos = $this->update($id, ['estado' => $estado]);
        return $datos;
    }

}
