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
    protected $allowedFields = ['n_documento', 'tipo_documento', 'nombre_p', 'nombre_s', 'apellido_p', 'apellido_s', 'contraseña', 'id_rol', 'direccion', 'accion_requerida', 'estado', 'usuario_crea'];
    protected $useTimestamps = true;
    protected $createdField  = 'fecha_crea';
    protected $updatedField  = '';
    protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function obtenerUsuarios($estado)
    {
        $this->select('usuarios.id_usuario, usuarios.n_documento, usuarios.nombre_p, usuarios.nombre_s, usuarios.apellido_p, usuarios.apellido_s, usuarios.estado, r.nombre as rol, p.nombre as t_documento');
        $this->join('roles as r', 'usuarios.id_rol = r.id_rol');
        $this->join('parametro_det as p', 'usuarios.tipo_documento = p.id_parametro_det');
        $this->where('usuarios.estado', $estado);
        $datos = $this->findAll();
        return $datos;
    }
    public function obtenerUsuariosChart()
    {
        $this->select('usuarios.id_usuario, usuarios.n_documento, usuarios.nombre_p, usuarios.nombre_s, usuarios.apellido_p, usuarios.apellido_s, usuarios.estado, r.nombre as rol, p.nombre as t_documento');
        $this->join('roles as r', 'usuarios.id_rol = r.id_rol');
        $this->join('parametro_det as p', 'usuarios.tipo_documento = p.id_parametro_det');
        $this->where('usuarios.id_rol', '3');

        $datos = $this->findAll();
        return $datos;
    }
    public function obtenerPChart()
    {
        $this->select('usuarios.id_usuario, usuarios.n_documento, usuarios.nombre_p, usuarios.nombre_s, usuarios.apellido_p, usuarios.apellido_s, usuarios.estado, r.nombre as rol, p.nombre as t_documento');
        $this->join('roles as r', 'usuarios.id_rol = r.id_rol');
        $this->join('parametro_det as p', 'usuarios.tipo_documento = p.id_parametro_det');
        $this->where('usuarios.id_rol', '4');

        $datos = $this->findAll();
        return $datos;
    }

    public function obtenerUsuariosEliminados()
    {
        $this->select('usuarios.id_usuario, usuarios.n_documento, usuarios.nombre_p, usuarios.nombre_s, usuarios.apellido_p, usuarios.apellido_s, usuarios.estado, r.nombre as rol, p.nombre as t_documento');
        $this->join('roles as r', 'usuarios.id_rol = r.id_rol');
        $this->join('parametro_det as p', 'usuarios.tipo_documento = p.id_parametro_det');
        $this->where('usuarios.estado', 'E');
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
    public function buscarUsuarioPerfil($id)
    {
        $this->select('usuarios.id_usuario, usuarios.n_documento, usuarios.nombre_p, usuarios.nombre_s, usuarios.apellido_p, usuarios.apellido_s, usuarios.estado, r.nombre as rol, p.resumen as t_documento, usuarios.direccion, grados.alias as grado, emails.email, usuarios.id_rol, telefonos.numero,');
        $this->join('roles as r', 'usuarios.id_rol = r.id_rol');
        $this->join('estudiantes', 'usuarios.id_usuario = estudiantes.id_usuario', 'left');
        $this->join('parametro_det as p', 'usuarios.tipo_documento = p.id_parametro_det');
        $this->join('grados', 'estudiantes.id_grado = grados.id_grado', 'left');
        $this->join('emails', 'usuarios.id_usuario = emails.id_usuario', 'left');
        $this->join('telefonos', 'usuarios.id_usuario = telefonos.id_usuario', 'left');
        $this->where('usuarios.id_usuario', $id);
        $this->where('usuarios.estado', 'A');
        $this->where('emails.estado', 'A');
        $datos = $this->first();
        return $datos;
    }

    public function cambiarEstado($id, $estado)
    {
        $datos = $this->update($id, ['estado' => $estado]);
        return $datos;
    }
    public function resetearContraseña($id, $contraseña)
    {
        $datos = $this->update($id, [
            'contraseña' => $contraseña,
            'accion_requerida' => '1'
        ]);
        return $datos;
    }
    public function login($nombre)
    {
        $this->select('usuarios.*, roles.nombre as rol');
        $this->join('roles', 'usuarios.id_rol = roles.id_rol');
        $this->where('n_documento', $nombre);
        $this->where('usuarios.estado', 'A');
        $datos = $this->findAll();
        return $datos;
    }
    public function ActualizarContra($id)
    {
        $this->select('usuarios.contraseña');
        $this->where('id_usuario', $id);
        $this->where('usuarios.estado', 'A');
        $datos = $this->findAll();
        return $datos;
    }
    public function obtenerEstudiantes($estado)
    {
        $this->select('usuarios.*, estudiantes.id_grado, estudiantes.id_estudiante, grados.alias as grado');
        $this->join('estudiantes', 'usuarios.id_usuario = estudiantes.id_usuario', 'left');
        $this->join('grados', 'estudiantes.id_grado = grados.id_grado', 'left');
        $this->where('usuarios.estado', $estado);
        $this->where('usuarios.id_rol', '3');
        $datos = $this->findAll();
        return $datos;
    }
    public function obtenerProfesores($estado)
    {
        $this->select('usuarios.*');
        $this->where('usuarios.estado', $estado);
        $this->where('usuarios.id_rol', '4');
        $datos = $this->findAll();
        return $datos;
    }
    public function buscarEstudiantes($id)
    {
        $this->select('usuarios.*, estudiantes.id_grado, estudiantes.id_estudiante, grados.alias as grado');
        $this->join('estudiantes', 'usuarios.id_usuario = estudiantes.id_usuario', 'left');
        $this->join('grados', 'estudiantes.id_grado = grados.id_grado', 'left');
        $this->where('usuarios.estado', 'A');
        $this->where('usuarios.id_usuario', $id);
        $this->where('usuarios.estado', 'A');
        $datos = $this->first();
        return $datos;
    }
    public function filtro($campo, $valor)
    {
        $this->select('usuarios.*');
        $this->where($campo, $valor);
        $this->where('estado', 'A');
        $datos = $this->first();
        return $datos;
    }
    public function ObtenterDispos($id)
    {
        $this->select('usuarios.*, disponibilidad_prof.id_usuario as id, parametro_det.nombre as dia');
        $this->join('disponibilidad_prof', 'usuarios.id_usuario = disponibilidad_prof.id_usuario');
        $this->join('parametro_det', 'disponibilidad_prof.id_parametro_det = parametro_det.nombre');
        $this->where('disponibilidad_prof.estado', 'A');
        $this->where('id_usuario', $id);
        $datos = $this->findAll();
        return $datos;
    }

}
