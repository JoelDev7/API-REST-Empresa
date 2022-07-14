<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class UsuariosController extends ResourceController
{
    protected $modelName = 'App\Models\UsuarioModel';
    protected $format = 'json';

    public function index () 
    {
        // return $this->respond('Necesitas autenticarte para acceder a los datos de este endpoint');
        // return $this->respond($this->model->retornarUsuarioPorNombreDeUsuario('elakin'));
        return $this->respond($this->model->findAll());
    }
}