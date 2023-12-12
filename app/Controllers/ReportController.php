<?php

// application/Controllers/ReportController.php

namespace App\Controllers;

use Mpdf\Mpdf;
use App\Models\EmployeeModel;
use App\Models\DepartmentModel;

class ReportController extends BaseController
{
    public function generateEmployeeReport()
    {
        $employeeModel = new EmployeeModel();
        $employees = $employeeModel->findAll();

        $mpdf = new Mpdf();
        $html = view('reports/employee_report', ['employees' => $employees]);

        $mpdf->WriteHTML($html);
        $mpdf->Output('employee_report.pdf', 'D');
    }

    public function generateEmployeesByDepartmentReport()
    {
        $departmentModel = new DepartmentModel();
        $departments = $departmentModel->findAll();

        $mpdf = new Mpdf();
        $html = view('reports/employees_by_department_report', ['departments' => $departments]);

        $mpdf->WriteHTML($html);
        $mpdf->Output('employees_by_department_report.pdf', 'D');
    }
}
