<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateEmployees extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'position' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'salary' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'department_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('department_id', 'departments', 'id', '', 'CASCADE');
        $this->forge->createTable('employees');
    }

    public function down()
    {
        $this->forge->dropTable('employees');
    }
}
