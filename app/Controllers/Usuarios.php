<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Usuarios extends ResourceController
{
    protected $modelName = 'App\Models\UsuarioModel';
    protected $format = 'json';

    public function index () 
    {   
        return $this->respond($this->model->findAll());
    }

}