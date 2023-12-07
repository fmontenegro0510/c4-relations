<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\StudentModel;
use App\Models\CourseModel;

class StudentController extends BaseController
{
    public function index() {
        $studentModel = new StudentModel();
        $data['students'] = $studentModel->get_students();

        return view('students/index', $data);
    }

    public function show($id) {
        $studentModel = new StudentModel();
        $courseModel = new CourseModel();
        $data['student'] = $studentModel->get_student_by_id($id);
        $data['courses'] = $studentModel->get_courses_for_student($id);
        $data['all_courses'] = $courseModel->findAll();
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
        if (!empty($course_ids)) {
            $studentModel->update_courses_for_student($id, $course_ids);
        }
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


    public function courses($studentId)
    {
        $studentModel = new StudentModel();
        $courseModel = new CourseModel();

        $data['student'] = $studentModel->find($studentId);
        $data['student_courses'] = $studentModel->getCourses($studentId);

        return view('students/courses', $data);
    }

    public function manage_courses($studentId)
    {
        $studentModel = new StudentModel();
        $courseModel = new CourseModel();

        $data['student'] = $studentModel->get_student_by_id($studentId);
        $data['all_courses'] = $courseModel->get_courses();
        $data['student_courses'] = $studentModel->get_courses_for_student($studentId);

        return view('students/manage_course', $data);
    }

    public function add_course($studentId)
    {
        $studentModel = new StudentModel();
        $courseModel = new CourseModel();

        if ($this->request->getMethod() === 'post') {
            $courseId = $courseModel->get_course_by_id($this->request->getPost('course'));
            $studentModel->add_course_for_student($studentId, $courseId['id']);
        }

        return redirect()->to("students/manage_courses/$studentId");
    }

    public function remove_course($studentId)
    {
        $studentModel = new StudentModel();

        if ($this->request->getMethod() === 'post') {
            $courseId = $this->request->getPost('course');
            $studentModel->removeCourse($studentId, $courseId);
        }

        return redirect()->to("students/manage_courses/$studentId");
    }
}

            // $courseId = $this->request->getPost('course');
            // $data['course'] = $courseModel->get_course_by_id($courseId);
            // $data['courses'] = $courseModel->findAll();
            // $course_ids = [...$data['course'], ...$data['courses']];
            // var_dump($course_ids);
            // if (!empty($courseId)) {
            //     $studentModel->add_courses_for_student($studentId, $course_ids);
            // }