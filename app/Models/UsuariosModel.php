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
        $this->select('usuarios.id_usuario, usuarios.n_documento, usuarios.nombre_corto, usuarios.nombre_p, usuarios.nombre_s, usuarios.apellido_p, usuarios.apellido_s, usuarios.estado, r.nombre as rol, p.nombre as t_documento');
        $this->join('roles as r', 'usuarios.id_rol = r.id_rol');
        $this->join('parametro_det as p', 'usuarios.tipo_documento = p.id_parametro_det');
        $this->where('usuarios.estado', 'A');
        $datos = $this->findAll();
        return $datos;
    }
    public function buscarUsuario($id)
    {
        $this->select('usuarios.*');
        $this->where('id_usuario', $id);
        $this->where('estado', 'A');
        $datos = $this->first();
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
