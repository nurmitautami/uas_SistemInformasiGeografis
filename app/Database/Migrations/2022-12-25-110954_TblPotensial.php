<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Potensial extends Migration
{
    public function up()
    {
        $this->forge->addField([

            'id_potensial' => [
                'type' => 'INT',
                'constraint' => 15,
                'auto_increment' => TRUE,
            ],
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => 70
            ],
            'kondisi_lahan' => [
                'type' => 'VARCHAR',
                'constraint' => 70
            ],
            'akses' => [
                'type' => 'VARCHAR',
                'constraint' => 70
            ],
            'jenis_aktivitas' => [
                'type' => 'VARCHAR',
                'constraint' => 70
            ],
            'intensitas' => [
                'type' => 'VARCHAR',
                'constraint' => 70
            ],
            'dampak' => [
                'type' => 'VARCHAR',
                'constraint' => 70
            ],
            'foto_lokasi' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],

            'latitude' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'longitude' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'created_at' => [
                'type' => 'DATETIME'
            ],
            'updated_at' => [
                'type' => 'DATETIME'
            ]
        ]);

        $this->forge->addKey('id_potensial', TRUE);
        $this->forge->createTable('tbl_potensial');
    }

    //--------------------------------------------------------------------

    public function down()
    {
        $this->forge->dropTable('tbl_potensial');
    }
}
