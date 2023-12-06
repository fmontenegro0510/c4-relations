<?php

namespace App\Models;

use CodeIgniter\Model;

class CourseModel extends Model
{
    protected $table            = 'courses';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = ['name', 'description', 'start_date', 'end_date'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function get_courses() {
        return $this->findAll();
    }

    public function get_course_by_id($course_id) {
        return $this->find($course_id);
    }

    public function create_course($data) {
        $this->insert($data);
        return $this->getInsertID();
    }

    public function update_course($course_id, $data) {
        $this->update($course_id, $data);
    }

    public function delete_course($course_id) {
        $this->delete($course_id);
    }

    public function get_students_for_course($course_id) {
        return $this->db->table('students')
            ->select('students.*')
            ->join('course_student', 'course_student.student_id = students.id')
            ->where('course_student.course_id', $course_id)
            ->get()
            ->getResult();
    }

    public function add_students_for_course($course_id, $student_ids) {
        // Añadir nuevas relaciones entre el curso y los estudiantes seleccionados
        foreach ($student_ids as $student_id) {
            $this->db->table('course_student')->insert([
                'course_id' => $course_id,
                'student_id' => $student_id,
            ]);
        }
    }

    public function update_students_for_course($course_id, $student_ids) {
        // Eliminar todas las relaciones existentes para el curso
        $this->db->table('course_student')->where('course_id', $course_id)->delete();

        // Añadir las nuevas relaciones seleccionadas
        $this->add_students_for_course($course_id, $student_ids);
    }

    public function delete_students_for_course($course_id) {
        // Eliminar todas las relaciones del curso con los estudiantes
        $this->db->table('course_student')->where('course_id', $course_id)->delete();
    }

}
