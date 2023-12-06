<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCourseStudentRelation extends Migration
{
    public function up()
    {
         // Crear tabla de relación
         $this->forge->addField([
            'course_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
            ],
            'student_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
            ],
        ]);
        $this->forge->createTable('course_student');

        // Añadir claves foráneas
        $this->forge->addForeignKey('course_id', 'courses', 'id', 'CASCADE');
        $this->forge->addForeignKey('student_id', 'students', 'id', 'CASCADE');

        // Asegurar que 'course_id' y 'student_id' sean únicos
        $this->forge->addKey(['course_id', 'student_id'], TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('course_student');
    }
}
