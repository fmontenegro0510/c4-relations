<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
    protected $table            = 'students';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = ['name', 'email'];

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


    public function get_students() {
        return $this->findAll();
    }

    public function get_student_by_id($student_id) {
        return $this->find($student_id);
    }

    public function create_student($data) {
        $this->insert($data);
        return $this->getInsertID();
    }

    public function update_student($student_id, $data) {
        $this->update($student_id, $data);
    }

    public function delete_student($student_id) {
        $this->delete($student_id);
    }

    public function get_courses_for_student($student_id) {
        return $this->db->table('courses')
            ->select('courses.*')
            ->join('course_student', 'course_student.course_id = courses.id')
            ->where('course_student.student_id', $student_id)
            ->get()
            ->getResult();
    }

    
}
