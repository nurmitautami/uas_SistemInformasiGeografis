<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pengguna extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'pengguna_foto'       => [
                'type'       => 'VARCHAR',
                'null' => true,
                'constraint' => '100',
            ],
            'pengguna_nama'       => [
                'type'       => 'VARCHAR',
                'null' => true,
                'constraint' => '100',
            ],
            'pengguna_username'       => [
                'type'       => 'VARCHAR',
                'null' => true,
                'constraint' => '50',
            ],
            'pengguna_password'       => [
                'type'       => 'VARCHAR',
                'null' => true,
                'constraint' => '100',
            ],
            'pengguna_status'       => [
                'type'       => 'ENUM',
                'null' => true,
                'default' => 'A',
                'constraint' => ['A', 'N','B'],
            ],
            'pengguna_level'       => [
                'type'       => 'ENUM',
                'null' => true,
                'default' => 'Member',
                'constraint' => ['Administrator', 'Member'],
            ],
            'signed_at'       => [
                'type'       => 'VARCHAR',
                'null' => true,
                'type' => 'DATETIME',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('pengguna');
    }

    public function down()
    {
        $this->forge->dropTable('pengguna');
    }
}
