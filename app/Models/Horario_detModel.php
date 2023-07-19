<?php

namespace App\Models;

use CodeIgniter\Model;

class Horario_detModel extends Model
{
    protected $table = 'horario_det';
    protected $primaryKey = 'id_horario_det ';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['id_grado_asignatura', 'id_aula',  'profesor', 'id_horario_enc', 'dia', 'hora_inicio', 'hora_fin', 'duracion', 'estado', 'usuario_crea'];
    protected $useTimestamps = true;
    protected $createdField  = 'fecha_crea';
    protected $updatedField  = '';
    protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function obtenerDetalle_horario($id)
    {
        $this->select('horario_det.*, CONCAT(u.nombre_p, " ", u.apellido_P) as profesor, a.id_asignatura, asig.nombre as asignatura, aulas.nombre as aula, param.nombre as inicio, param2.nombre as diaN, param3.nombre as fin, param4.nombre as area');
        $this->join('usuarios as u', 'horario_det.profesor = u.id_usuario', 'left');
        $this->join('parametro_det as param', 'param.id_parametro_det = horario_det.hora_inicio', 'left');
        $this->join('vw_param_det2 as param3', 'param3.id_parametro_det = horario_det.hora_fin', 'left');
        $this->join('vw_param_det as param2', 'param2.id_parametro_det = horario_det.dia', 'left');
        $this->join('aulas', 'horario_det.id_aula = aulas.id_aula', 'left');
        $this->join('grados_asignatura as a', 'a.id_grado_asignatura = horario_det.id_grado_asignatura', 'left');
        $this->join('asignaturas as asig', 'asig.id_asignatura = a.id_asignatura', 'left');
        $this->join('vw_param_det3 as param4', 'param4.id_parametro_det = asig.Codigo', 'left');
        $this->where('horario_det.estado', 'A');
        $this->where('horario_det.id_horario_enc', $id);
        // $this->groupBy('horario_det.dia');
        $datos = $this->findAll();
        return $datos;
    }

    public function obtenerDetalle_horarioProfesor($id)
    {
        $this->select('horario_det.*, CONCAT(u.nombre_p, " ", u.apellido_P) as profesor, a.id_asignatura, asig.nombre as asignatura, aulas.nombre as aula, param.nombre as inicio, param2.nombre as diaN, param3.nombre as fin, param4.nombre as area');
        $this->join('usuarios as u', 'horario_det.profesor = u.id_usuario', 'left');
        $this->join('parametro_det as param', 'param.id_parametro_det = horario_det.hora_inicio', 'left');
        $this->join('vw_param_det2 as param3', 'param3.id_parametro_det = horario_det.hora_fin', 'left');
        $this->join('vw_param_det as param2', 'param2.id_parametro_det = horario_det.dia', 'left');
        $this->join('aulas', 'horario_det.id_aula = aulas.id_aula', 'left');
        $this->join('grados_asignatura as a', 'a.id_grado_asignatura = horario_det.id_grado_asignatura', 'left');
        $this->join('asignaturas as asig', 'asig.id_asignatura = a.id_asignatura', 'left');
        $this->join('vw_param_det3 as param4', 'param4.id_parametro_det = asig.Codigo', 'left');
        $this->where('horario_det.estado', 'A');
        $this->where('horario_det.profesor', $id);
        // $this->groupBy('horario_det.dia');
        $datos = $this->findAll();
        return $datos;
    }
    public function obtenerDetalleGrado($id)
    {
        $this->select('horario_det.*, u.nombre_p as profesor, a.id_asignatura, asig.nombre as asignatura, aulas.nombre as aula, param.nombre as inicio, param2.nombre as dia, param3.nombre as fin');
        $this->join('usuarios as u', 'horario_det.profesor = u.id_usuario', 'left');
        $this->join('parametro_det as param', 'param.id_parametro_det = horario_det.hora_inicio', 'left');
        $this->join('vw_param_det2 as param3', 'param3.id_parametro_det = horario_det.hora_fin', 'left');
        $this->join('vw_param_det as param2', 'param2.id_parametro_det = horario_det.dia', 'left');
        $this->join('aulas', 'horario_det.id_aula = aulas.id_aula', 'left');
        $this->join('grados_asignatura as a', 'a.id_grado_asignatura = horario_det.id_grado_asignatura', 'left');
        $this->join('asignaturas as asig', 'asig.id_asignatura = a.id_asignatura', 'left');
        $this->where('horario_det.estado', 'A');
        $this->where('horario_det.id_horario_enc', $id);
        // $this->groupBy('horario_det.dia');
        $datos = $this->findAll();
        return $datos;
    }
    public function cambiarEstado($id, $estado)
    {
        $datos = $this->update($id, ['estado' => $estado]);
        return $datos;
    }
    public function buscarDetalleProfe($id)
    {
        $this->select('horario_det.*,u.nombre_p as profesor, horario_det.dia as id_dia, a.id_asignatura, asig.nombre as asignatura, aulas.nombre as aula, param.nombre as inicio, param2.nombre as diaN, param3.nombre as fin');
        $this->join('usuarios as u', 'horario_det.profesor = u.id_usuario');
        $this->join('parametro_det as param', 'param.id_parametro_det = horario_det.hora_inicio');
        $this->join('vw_param_det2 as param3', 'param3.id_parametro_det = horario_det.hora_fin');
        $this->join('vw_param_det as param2', 'param2.id_parametro_det = horario_det.dia');
        $this->join('aulas', 'horario_det.id_aula = aulas.id_aula');
        $this->join('grados_asignatura as a', 'a.id_grado_asignatura = horario_det.id_grado_asignatura');
        $this->join('asignaturas as asig', 'asig.id_asignatura = a.id_asignatura');
        $this->where('horario_det.estado', 'A');
        $this->where('horario_det.profesor', $id);
        $datos = $this->findAll();
        return $datos;
    }
    public function buscarDetalleEstudiante($id)
    {
        $this->select('horario_det.*,u.nombre_p as profesor, horario_det.dia as id_dia, a.id_asignatura, asig.nombre as asignatura, aulas.nombre as aula, param.nombre as inicio, param2.nombre as diaN, param3.nombre as fin');
        $this->join('usuarios as u', 'horario_det.profesor = u.id_usuario');
        $this->join('parametro_det as param', 'param.id_parametro_det = horario_det.hora_inicio');
        $this->join('vw_param_det2 as param3', 'param3.id_parametro_det = horario_det.hora_fin');
        $this->join('vw_param_det as param2', 'param2.id_parametro_det = horario_det.dia');
        $this->join('aulas', 'horario_det.id_aula = aulas.id_aula');
        $this->join('grados_asignatura as a', 'a.id_grado_asignatura = horario_det.id_grado_asignatura');
        $this->join('asignaturas as asig', 'asig.id_asignatura = a.id_asignatura');
        $this->where('horario_det.estado', 'A');
        $this->where('horario_det.profesor', $id);
        $datos = $this->findAll();
        return $datos;
    }
    public function buscarDetalleAula($id)
    {
        $this->select('horario_det.*,horario_det.dia as id_dia, u.nombre_p as profesor, a.id_asignatura, asig.nombre as asignatura, aulas.nombre as aula, param.nombre as inicio, param2.nombre as diaN, param3.nombre as fin');
        $this->join('usuarios as u', 'horario_det.profesor = u.id_usuario');
        $this->join('parametro_det as param', 'param.id_parametro_det = horario_det.hora_inicio');
        $this->join('vw_param_det2 as param3', 'param3.id_parametro_det = horario_det.hora_fin');
        $this->join('vw_param_det as param2', 'param2.id_parametro_det = horario_det.dia');
        $this->join('aulas', 'horario_det.id_aula = aulas.id_aula');
        $this->join('grados_asignatura as a', 'a.id_grado_asignatura = horario_det.id_grado_asignatura');
        $this->join('asignaturas as asig', 'asig.id_asignatura = a.id_asignatura');
        $this->where('horario_det.estado', 'A');
        $this->where('horario_det.id_aula', $id);
        $datos = $this->findAll();
        return $datos;
    }
    public function buscarDetalleAulaRango($id, $inicio, $fin)
    {
        $this->select('SUM(horario_det.duracion) as duracion_total');
        $this->join('horarios_enc as h', 'horario_det.id_horario_enc = h.id_horarios_enc');
        $this->where('horario_det.estado', 'A');
        $this->where('h.estado', 'A');
        $this->where('horario_det.id_aula', $id);
        $this->where('horario_det.hora_inicio >=', $inicio);
        $this->where('horario_det.hora_fin <', $fin);

        $query = $this->first();
        return $query;
    }
    public function buscarDetalleAsignatura($id)
    {
        $this->select('horario_det.*,horario_det.dia as id_dia, u.nombre_p as profesor, a.id_asignatura, asig.nombre as asignatura, aulas.nombre as aula, param.nombre as inicio, param2.nombre as diaN, param3.nombre as fin');
        $this->join('usuarios as u', 'horario_det.profesor = u.id_usuario');
        $this->join('parametro_det as param', 'param.id_parametro_det = horario_det.hora_inicio');
        $this->join('vw_param_det2 as param3', 'param3.id_parametro_det = horario_det.hora_fin');
        $this->join('vw_param_det as param2', 'param2.id_parametro_det = horario_det.dia');
        $this->join('aulas', 'horario_det.id_aula = aulas.id_aula');
        $this->join('grados_asignatura as a', 'a.id_grado_asignatura = horario_det.id_grado_asignatura');
        $this->join('asignaturas as asig', 'asig.id_asignatura = a.id_asignatura');
        $this->where('horario_det.estado', 'A');
        $this->where('horario_det.id_grado_asignatura', $id);
        $this->orderBy('dia');
        $datos = $this->findAll();
        return $datos;
    }
    public function buscarDetalles()
    {
        $this->select('horario_det.*, u.nombre_p as profesor, a.id_asignatura, asig.nombre as asignatura, aulas.nombre as aula, param.nombre as inicio, param2.nombre as diaN, param3.nombre as fin');
        $this->join('usuarios as u', 'horario_det.profesor = u.id_usuario');
        $this->join('parametro_det as param', 'param.id_parametro_det = horario_det.hora_inicio');
        $this->join('vw_param_det2 as param3', 'param3.id_parametro_det = horario_det.hora_fin');
        $this->join('vw_param_det as param2', 'param2.id_parametro_det = horario_det.dia');
        $this->join('aulas', 'horario_det.id_aula = aulas.id_aula');
        $this->join('grados_asignatura as a', 'a.id_grado_asignatura = horario_det.id_grado_asignatura');
        $this->join('asignaturas as asig', 'asig.id_asignatura = a.id_asignatura');
        $this->where('horario_det.estado', 'A');
        $datos = $this->findAll();
        return $datos;
    }
    public function obtenerDetalles($id)
    {
        $this->select('horario_det.*, horario_det.dia as id_dia, u.nombre_p as profesor, a.id_asignatura, asig.nombre as asignatura, aulas.nombre as aula, param.nombre as inicio, param2.nombre as diaN, param3.nombre as fin');
        $this->join('usuarios as u', 'horario_det.profesor = u.id_usuario');
        $this->join('parametro_det as param', 'param.id_parametro_det = horario_det.hora_inicio');
        $this->join('vw_param_det2 as param3', 'param3.id_parametro_det = horario_det.hora_fin');
        $this->join('vw_param_det as param2', 'param2.id_parametro_det = horario_det.dia');
        $this->join('aulas', 'horario_det.id_aula = aulas.id_aula');
        $this->join('grados_asignatura as a', 'a.id_grado_asignatura = horario_det.id_grado_asignatura');
        $this->join('asignaturas as asig', 'asig.id_asignatura = a.id_asignatura');

        $this->where('horario_det.id_horario_enc', $id);
        $this->where('horario_det.estado', 'A');
        $datos = $this->findAll();
        return $datos;
    }
    public function obtenerDetallesAsginatura($id)
    {
        $this->select('horario_det.*, horario_det.dia as id_dia, horario_det.dia as id_dia, u.nombre_p as profesor, a.id_asignatura, asig.nombre as asignatura, aulas.nombre as aula, param.nombre as inicio, param2.nombre as diaN, param3.nombre as fin');
        $this->join('usuarios as u', 'horario_det.profesor = u.id_usuario');
        $this->join('parametro_det as param', 'param.id_parametro_det = horario_det.hora_inicio');
        $this->join('vw_param_det2 as param3', 'param3.id_parametro_det = horario_det.hora_fin');
        $this->join('vw_param_det as param2', 'param2.id_parametro_det = horario_det.dia');
        $this->join('aulas', 'horario_det.id_aula = aulas.id_aula');
        $this->join('grados_asignatura as a', 'a.id_grado_asignatura = horario_det.id_grado_asignatura');
        $this->join('asignaturas as asig', 'asig.id_asignatura = a.id_asignatura');

        $this->where('horario_det.id_grado_asignatura', $id);
        $this->where('horario_det.estado', 'A');
        $datos = $this->findAll();
        return $datos;
    }
}
