<?php

// application/Controllers/ReportController.php

namespace App\Controllers;

use App\Models\EmployeeModel;
use Mpdf\Mpdf;

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
}
