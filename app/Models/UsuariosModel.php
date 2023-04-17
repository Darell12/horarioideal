<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuariosModel extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['nombre_corto', 'n_documento', 'tipo_documento', 'nombre_p', 'nombre_s', 'apellido_p', 'apellido_s', 'contraseña', 'id_rol', 'direccion', 'estado', 'usuario_crea'];
    protected $useTimestamps = true; 
    protected $createdField  = 'fecha_crea'; 
    protected $updatedField  = '';
    protected $deletedField  = ''; 

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function obtenerUsuarios()
    {
        $this->select('usuarios.*');
        $this->where('estado', 'A');
        $datos = $this->findAll();
        return $datos;
    }
    public function login($nombre)
    {
        $this->select('usuarios.*');
        $this->where('nombre_corto', $nombre);
        $this->where('estado', 'A');
        $datos = $this->findAll();
        return $datos;
    }
}
