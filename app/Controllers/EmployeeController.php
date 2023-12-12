<?php

namespace App\Controllers;

use App\Models\EmployeeModel;
use App\Controllers\BaseController;

class EmployeeController extends BaseController
{
    public function index()
    {
        $employeeModel = new EmployeeModel();
        $data['employees'] = $employeeModel->getAllEmployees();

        return view('employees/index', $data);
    }

    public function create()
    {
        return view('employees/create');
    }

    public function store()
    {
        $employeeModel = new EmployeeModel();

        $data = [
            'name' => $this->request->getPost('name'),
            'position' => $this->request->getPost('position'),
            'salary' => $this->request->getPost('salary'),
            'department_id' => $this->request->getPost('department_id'),
        ];

        $employeeModel->createEmployee($data);

        return redirect()->to('employees');
    }

    public function edit($employeeId)
    {
        $employeeModel = new EmployeeModel();
        $data['employee'] = $employeeModel->getEmployeeById($employeeId);

        return view('employees/edit', $data);
    }

    public function update($employeeId)
    {
        $employeeModel = new EmployeeModel();

        $data = [
            'name' => $this->request->getPost('name'),
            'position' => $this->request->getPost('position'),
            'salary' => $this->request->getPost('salary'),
            'department_id' => $this->request->getPost('department_id'),
        ];

        $employeeModel->updateEmployee($employeeId, $data);

        return redirect()->to("employees/edit/$employeeId");
    }

    public function delete($employeeId)
    {
        $employeeModel = new EmployeeModel();
        $employeeModel->deleteEmployee($employeeId);

        return redirect()->to('employees');
    }
}
