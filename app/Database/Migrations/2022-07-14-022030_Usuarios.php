<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Usuarios extends Migration
{ // Crea la tabla usuarios
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 4,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nombre' => [
                'type' => 'VARCHAR',
                'constraint' => '30',
                'null' => false
            ],
            'apellidos' => [
                'type' => 'VARCHAR',
                'constraint' => '35',
                'null' => false
            ],
            'nombre_usuario' => [
                'type' => 'VARCHAR',
                'constraint' => '12',
                'null' => false,
                'unique' => true
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('usuarios');
    }

    public function down()
    {
        // borra la tabla usuarios
        $this->forge->dropTable('usuarios');
    }

}