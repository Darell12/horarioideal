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
    protected $allowedFields = ['n_documento', 'tipo_documento', 'nombre_p', 'nombre_s', 'apellido_p', 'apellido_s', 'contraseña', 'id_rol', 'direccion', 'estado', 'usuario_crea'];
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
        $this->select('usuarios.id_usuario, usuarios.n_documento, usuarios.nombre_p, usuarios.nombre_s, usuarios.apellido_p, usuarios.apellido_s, usuarios.estado, r.nombre as rol, p.resumen as t_documento, usuarios.direccion, grados.alias as grado, emails.email, usuarios.id_rol, telefonos.numero ');
        $this->join('telefonos', 'usuarios.id_usuario = telefonos.id_usuario', 'left');
        $this->join('roles as r', 'usuarios.id_rol = r.id_rol');
        $this->join('estudiantes', 'usuarios.id_usuario = estudiantes.id_usuario', 'left');
        $this->join('grados', 'estudiantes.id_grado = grados.id_grado', 'left');
        $this->join('emails', 'usuarios.id_usuario = emails.id_usuario', 'left');
        $this->join('parametro_det as p', 'usuarios.tipo_documento = p.id_parametro_det');
        $this->where('usuarios.id_usuario', $id);
        $this->where('usuarios.estado', 'A');
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
        $datos = $this->update($id, ['contraseña' => $contraseña]);
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
    public function obtenerEstudiantes()
    {
        $this->select('usuarios.*, estudiantes.id_grado, estudiantes.id_estudiante, grados.alias as grado');
        $this->join('estudiantes', 'usuarios.id_usuario = estudiantes.id_usuario', 'left');
        $this->join('grados', 'estudiantes.id_grado = grados.id_grado', 'left');
        $this->where('usuarios.estado', 'A');
        $this->where('usuarios.id_rol', '3');
        $datos = $this->findAll();
        return $datos;
    }
    public function obtenerProfesores()
    {
        $this->select('usuarios.*, asignatura_profesores.id_asignatura_profesor as asignaturas, asignatura_profesores.id_grado_asignatura as asignaturaGrado, grados.alias as grado');
        $this->join('asignatura_profesores', 'usuarios.id_usuario = asignatura_profesores.id_usuario', 'left');
        $this->join('grados_asignatura', 'asignatura_profesores.id_grado_asignatura = grados_asignatura.id_grado_asignatura', 'left');
        $this->join('grados', 'grados_asignatura.id_grado = grados.id_grado', 'left');
        $this->where('usuarios.estado', 'A');
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
    public function filtro($campo ,$valor)
    {
        $this->select('usuarios.*');
        $this->where($campo, $valor);
        $this->where('estado', 'A');
        $datos = $this->first();
        return $datos;
    }
}
