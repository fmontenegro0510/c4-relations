<?php

namespace App\Controllers;

use App\Models\EmployeeModel;
use App\Models\DepartmentModel;
use App\Controllers\BaseController;

class DepartmentController extends BaseController
{
    public function index()
    {
        $departmentModel = new DepartmentModel();
        $data['departments'] = $departmentModel->getAllDepartments();

        return view('departments/index', $data);
    }

    public function show($departmentId)
    {
        $departmentModel = new DepartmentModel();
        $employeeModel = new EmployeeModel();

        $data['department'] = $departmentModel->getDepartmentById($departmentId);
        $data['employees'] = $employeeModel->getEmployees($departmentId);

        return view('departments/show', $data);
    }

    public function create()
    {
        return view('departments/create');
    }

    public function store()
    {
        $departmentModel = new DepartmentModel();

        $data = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'location' => $this->request->getPost('location'),
        ];

        $departmentModel->createDepartment($data);

        return redirect()->to('departments');
    }

    public function edit($departmentId)
    {
        $departmentModel = new DepartmentModel();
        $data['department'] = $departmentModel->getDepartmentById($departmentId);

        return view('departments/edit', $data);
    }

    public function update($departmentId)
    {
        $departmentModel = new DepartmentModel();

        $data = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'location' => $this->request->getPost('location'),
        ];

        $departmentModel->updateDepartment($departmentId, $data);

        return redirect()->to("departments/show/$departmentId");
    }

    public function delete($departmentId)
    {
        $departmentModel = new DepartmentModel();
        $departmentModel->deleteDepartment($departmentId);

        return redirect()->to('departments');
    }
}
