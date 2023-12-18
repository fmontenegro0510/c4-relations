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
        // $departmentModel = new DepartmentModel();
        // $departments = $departmentModel->findAll();

        // $mpdf = new Mpdf();
        // $html = view('reports/employees_by_department_report', ['departments' => $departments]);

        // $mpdf->WriteHTML($html);
        // $mpdf->Output('employees_by_department_report.pdf', 'D');

        // Obtener empleados por departamento
        // $employeeModel = new EmployeeModel();
    
            $departmentModel = new DepartmentModel();

        $employeesByDepartment = $departmentModel->getEmployeesByDepartment();

        // Crear una instancia de mPDF
        $mpdf = new Mpdf();

        // Construir el contenido del informe
        $html = view('reports/employees_by_department_report', ['employeesByDepartment' => $employeesByDepartment]);

        // Escribir el contenido HTML en el PDF
        $mpdf->WriteHTML($html);

        // Descargar el archivo PDF
        $mpdf->Output('employees_by_department_report.pdf', 'D');

        
    }
}
