<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model 
{

    protected $table = 'usuarios';

    protected $allowedFields = [
        'nombre', 'apellidos', 'nombre_usuario'
    ];

    // Nombres de los métodos usados para encriptar la contraseña del usuario.
    protected $beforeInsert = ['preinsercion'];
    protected $beforeUpdate = ['preactualizacion'];

    protected function preinsercion (array $datos)
    {
        return $this.encriptacionDeContraseña($datos);
    }

    protected function preactualizacion (array $datos)
    {
        return $this.encriptacionDeContraseña($datos);
    }

    private function encriptacionDeContraseña (array $datos):array
    {
        $contraseñaTextoPlano = $datos['datos']['contraseña'];
        
        if(isset($contraseñaTextoPlano))
        {
            $datos['datos']['contraseña'] = password_hash($contraseñaTextoPlano, PASSWORD_BCRYPT);
        }
    }

    public function retornarUsuarioPorNombreDeUsuario (string $nombre_usuario)
    {
        $usuario = $this->asArray()->where(['nombre_usuario' => $nombre_usuario])->first();

        if (!$usuario)
        {
            throw new \Exception('No se encontro el registro asociado a ese nombre de usuario');
        }
        return $usuario;
    }
}