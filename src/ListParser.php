<?php

namespace App\Controllers;

use App\Controllers\BaseController;


class ListParser extends BaseController
{
    protected $usuario, $eliminados, $contraseña;
    protected $roles, $horario;
    protected $prioridad, $tipotel, $emails;
    protected $telefonos, $acudientes;
    protected $metodos;

    public function insertar()
    {
        $tp = $this->request->getPost('tp');
        if ($tp == 1) {
            $password = $this->request->getVar('contraseña');
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $this->usuario->save([
                'tipo_documento' => $this->request->getPost('tipo_documento'),
                'n_documento' => $this->request->getPost('n_documento'),
                'nombre_p' => $this->request->getPost('primer_nombre'),
                'nombre_s' => $this->request->getPost('segundo_nombre'),
                'apellido_p' => $this->request->getPost('primer_apellido'),
                'apellido_s' => $this->request->getPost('segundo_apellido'),
                'perfil' => $this->request->getPost('perfil'),
                'email' => $this->request->getPost('email'),
                'contraseña' => $hashedPassword,
                'id_rol' => $this->request->getPost('id_rol'),
                'usuario_crea' => session('id'),
                'direccion' => $this->request->getPost('direccionX'),
            ]);
            $idIngreso = $this->usuario->getInsertID();
            return json_encode($idIngreso);
        } else {
            $this->usuario->update($this->request->getPost('id'), [
                'tipo_documento' => $this->request->getPost('tipo_documento'),
                'n_documento' => $this->request->getPost('n_documento'),
                'nombre_p' => $this->request->getPost('primer_nombre'),
                'nombre_s' => $this->request->getPost('segundo_nombre'),
                'perfil' => $this->request->getPost('perfil'),
                'apellido_p' => $this->request->getPost('primer_apellido'),
                'apellido_s' => $this->request->getPost('segundo_apellido'),
                'email' => $this->request->getPost('email'),
                'id_rol' => $this->request->getPost('id_rol'),
                'usuario_crea' => session('id'),
                'direccion' => $this->request->getPost('direccionX'),
            ]);
            return json_encode($this->request->getPost('id'));
        }
    }
}