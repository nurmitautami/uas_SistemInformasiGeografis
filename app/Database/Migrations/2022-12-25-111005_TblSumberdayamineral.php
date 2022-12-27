<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblSumberdayamineral extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_sumberdayamineral' => [
                'type' => 'INT',
                'constraint' => 15,
                'auto_increment' => TRUE,
            ],
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => 70
            ],

            'jenis_mineral' => [
                'type' => 'VARCHAR',
                'constraint' => '70',

            ],
            'kualitas' => [
                'type' => 'VARCHAR',
                'constraint' => '70',

            ],
            'ketersediaan' => [
                'type' => 'VARCHAR',
                'constraint' => '70',
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

        $this->forge->addKey('id_sumberdayamineral', TRUE);
        $this->forge->createTable('tbl_sumberdayamineral');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_sumberdayamineral');
    }
}
