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
    protected $allowedFields = ['id_grado', 'periodo_año', 'jornada', 'duracion_hora', 'inicio', 'fin', 'estado', 'usuario_crea',];
    protected $useTimestamps = true;
    protected $createdField  = 'fecha_crea';
    protected $updatedField  = '';
    protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function obtenerHorarios_enc($estado)
    {
        $this->select('horarios_enc.*, g.alias as grado, p.nombre as jornada');
        $this->join('grados as g', 'horarios_enc.id_grado = g.id_grado');
        $this->join('parametro_det as p', 'horarios_enc.jornada = p.id_parametro_det');
        $this->where('horarios_enc.estado', $estado);
        $datos = $this->findAll();
        return $datos;
    }

    
    public function obtenerEncabezados($estado)
    {
        $this->select('horarios_enc.*, g.alias as grado, p.nombre as jornada, param.nombre as duracion_hora, param3.nombre as inicioF, param4.nombre as finF');
        $this->join('grados as g', 'horarios_enc.id_grado = g.id_grado');
        $this->join('parametro_det as p', 'horarios_enc.jornada = p.id_parametro_det');
        $this->join('parametro_enc as param', 'horarios_enc.duracion_hora = param.id_enc');
        $this->join('vw_param_det2 as param3', 'horarios_enc.inicio = param3.id_parametro_det');
        $this->join('vw_param_det as param4', 'horarios_enc.fin = param4.id_parametro_det');
        $this->where('horarios_enc.estado', $estado);
        $datos = $this->findAll();
        return $datos;
    }
    public function obtenerEncabezadosXFecha($fecha)
    {
        $this->select('id_grado');
        $this->where('horarios_enc.periodo_año', $fecha);
        $datos = $this->findAll();
        return $datos;
    }
    public function obtenerEncabezadosXFechaGrado($fecha,$grado)
    {
        $this->select('id_grado');
        $this->where('horarios_enc.estado', 'A');
        $this->where('horarios_enc.id_grado', $grado);
        $datos = $this->findAll();
        return $datos;
    }
    public function obtenerEncabezadosGrado($estado, $id)
    {
        $this->select('horarios_enc.*');
        $this->where('horarios_enc.id_grado', $id);
        $this->where('horarios_enc.estado', $estado);
        $datos = $this->first();
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
    public function cambiar_Estado($id, $estado)
    {
        $datos = $this->update($id, ['estado' => $estado]);
        return $datos;
    }
    public function traer_horario_enc($id)
    {
        $this->select('horarios_enc.*, param.nombre as hora_inicio, param2.nombre as hora_fin');
        $this->join('parametro_det as param', 'horarios_enc.inicio = param.id_parametro_det');
        $this->join('vw_param_det as param2', 'horarios_enc.fin = param2.id_parametro_det');
        // $this->join('vw_param_det2 as param3', 'horarios_enc.id_grado = param2.id_parametro_det');
        $this->where('id_horarios_enc', $id);

        $datos = $this->first();
        return $datos;
    }

    public function traer_encabezado($id)
    {
        $this->select('horarios_enc.*, param.alias as grado');
        $this->join('grados as param', 'horarios_enc.id_grado = param.id_grado');
        $this->where('id_horarios_enc', $id);

        $datos = $this->first();
        return $datos;
    }
    public function filtro($campo, $valor)
    {
        $this->select('horarios_enc.*');
        $this->where($campo, $valor);
        $this->where('estado', 'A');

        $datos = $this->first();  // nos trae el registro que cumpla con una condicion dada 
        return $datos;
    }
}
