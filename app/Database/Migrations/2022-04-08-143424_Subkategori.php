<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Subkategori extends Migration
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
            'kategori_id'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 5
            ],
            'subkategori_ikon'       => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'subkategori_nama'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'subkategori_deskripsi' => [
                'type' => 'TEXT',
                'null' => true,
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
        $this->forge->addForeignKey('kategori_id', 'kategori', 'id');
        $this->forge->createTable('subkategori');
    }

    public function down()
    {
        $this->forge->dropTable('subkategori');
    }
}
