<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CourseModel;

class CourseController extends BaseController
{
    public function index() {
        $courseModel = new CourseModel();
        $data['courses'] = $courseModel->get_courses();

        return view('courses/index', $data);
    }

    public function show($id) {
        $courseModel = new CourseModel();
        $data['course'] = $courseModel->get_course_by_id($id);
        $data['students'] = $courseModel->get_students_for_course($id);

        return view('courses/show', $data);
    }

    public function create() {
        return view('courses/create');
    }

    public function store() {
        $courseModel = new CourseModel();

        $data = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'start_date' => $this->request->getPost('start_date'),
            'end_date' => $this->request->getPost('end_date'),
        ];

        $course_id = $courseModel->create_course($data);

        // Handle students relationship
        $student_ids = $this->request->getPost('students');
        if (!empty($student_ids)) {
            $courseModel->add_students_for_course($course_id, $student_ids);
        }

        return redirect()->to('/courses');
    }

    public function edit($id) {
        $courseModel = new CourseModel();
        $data['course'] = $courseModel->get_course_by_id($id);
        $data['students'] = $courseModel->get_students_for_course($id);

        return view('courses/edit', $data);
    }

    public function update($id) {
        $courseModel = new CourseModel();

        $data = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'start_date' => $this->request->getPost('start_date'),
            'end_date' => $this->request->getPost('end_date'),
        ];

        $courseModel->update_course($id, $data);

        // Handle students relationship
        $student_ids = $this->request->getPost('students');
        $courseModel->update_students_for_course($id, $student_ids);

        return redirect()->to('/courses');
    }

    public function delete($id) {
        $courseModel = new CourseModel();

        // Eliminar relaciones con estudiantes antes de eliminar el curso
        $courseModel->delete_students_for_course($id);

        // Eliminar el curso
        $courseModel->delete_course($id);

        return redirect()->to('/courses');
    }
}
