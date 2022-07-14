<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class UsuariosSeeder extends Seeder
{
    public function run()
	{
		for ($i = 0; $i < 20; $i++) {
		    $this->db->table('usuarios')->insert($this->generarUsuarios());
        }
	}

	private function generarUsuarios(): array
    {
        $faker = Factory::create();

        return [
            'nombre' => $faker->firstName(),
            'apellidos' => $faker->lastName(),
            'nombre_usuario' => $faker->userName()
        ];
    }
}
