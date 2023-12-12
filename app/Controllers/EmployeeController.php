<?php

namespace App\Controllers;

use App\Models\EmployeeModel;
use App\Models\DepartmentModel;
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

    public function search()
    {
        $employeeModel = new EmployeeModel();

        // Obtener el término de búsqueda de la URL
        $search = $this->request->getGet('search');

        // Realizar la búsqueda en el modelo
        $data['employees'] = $employeeModel->searchEmployees($search);

        // Pasar el término de búsqueda a la vista
        $data['search'] = $search;

        // Obtener detalles completos del departamento para cada empleado
        foreach ($data['employees'] as &$employee) {
            $departmentModel = new DepartmentModel();
            $department = $departmentModel->getDepartmentById($employee['department_id']);
            $employee['department'] = $department;
        }

        // Cargar la vista de resultados de búsqueda
        return view('employees/search', $data);
    }

    public function departmentStatistics()
    {
        $departmentModel = new DepartmentModel();
        $employeeModel = new EmployeeModel();

        // Obtener todos los departamentos
        $departments = $departmentModel->findAll();

        // Inicializar array para almacenar estadísticas por departamento
        $statistics = [];

        foreach ($departments as $department) {
            // Obtener empleados por departamento
            $employees = $employeeModel->getEmployeesByDepartment($department['id']);

            // Contar la cantidad de empleados
            $totalEmployees = count($employees);

            // Contar la cantidad de empleados que ganan más de $5000
            $highSalaryEmployees = array_filter($employees, function ($employee) {
                return $employee['salary'] > 5000;
            });

            $totalHighSalaryEmployees = count($highSalaryEmployees);

            // Calcular el porcentaje de empleados que ganan más de $5000
            $percentageHighSalary = ($totalEmployees > 0) ? ($totalHighSalaryEmployees / $totalEmployees) * 100 : 0;

            // Almacenar estadísticas por departamento
            $statistics[] = [
                'department' => $department,
                'totalEmployees' => $totalEmployees,
                'totalHighSalaryEmployees' => $totalHighSalaryEmployees,
                'percentageHighSalary' => $percentageHighSalary,
            ];
        }

        // Pasar estadísticas a la vista
        $data['statistics'] = $statistics;

        // Cargar la vista de estadísticas por departamento
        return view('employees/department_statistics', $data);
    }
}
