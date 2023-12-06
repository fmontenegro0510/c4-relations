<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\StudentModel;

class StudentController extends BaseController
{
    public function index() {
        $studentModel = new StudentModel();
        $data['students'] = $studentModel->get_students();

        return view('students/index', $data);
    }

    public function show($id) {
        $studentModel = new StudentModel();
        $data['student'] = $studentModel->get_student_by_id($id);
        $data['courses'] = $studentModel->get_courses_for_student($id);

        return view('students/show', $data);
    }

    public function create() {
        return view('students/create');
    }

    public function store() {
        $studentModel = new StudentModel();

        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
        ];

        $student_id = $studentModel->create_student($data);

        // Handle courses relationship
        $course_ids = $this->request->getPost('courses');
        if (!empty($course_ids)) {
            $studentModel->add_courses_for_student($student_id, $course_ids);
        }

        return redirect()->to('/students');
    }

    public function edit($id) {
        $studentModel = new StudentModel();
        $data['student'] = $studentModel->get_student_by_id($id);
        $data['courses'] = $studentModel->get_courses_for_student($id);

        return view('students/edit', $data);
    }

    public function update($id) {
        $studentModel = new StudentModel();

        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
        ];

        $studentModel->update_student($id, $data);

        // Handle courses relationship
        $course_ids = $this->request->getPost('courses');
        $studentModel->update_courses_for_student($id, $course_ids);

        return redirect()->to('/students');
    }

    public function delete($id) {
        $studentModel = new StudentModel();

        // Eliminar relaciones con cursos antes de eliminar al estudiante
        $studentModel->delete_courses_for_student($id);

        // Eliminar al estudiante
        $studentModel->delete_student($id);

        return redirect()->to('/students');
    }
}
