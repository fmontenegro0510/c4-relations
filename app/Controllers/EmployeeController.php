<?php

namespace App\Controllers;

use Mpdf\Mpdf;
use App\Models\EmployeeModel;
use App\Models\DepartmentModel;
use App\Controllers\BaseController;
use CodeIgniter\Files\File;


class EmployeeController extends BaseController
{

    protected $helpers = ['form', 'file'];


    public function index()
    {
        $employeeModel = new EmployeeModel();
        $data['employees'] = $employeeModel->getAllEmployees();

        return view('employees/index', $data);
    }

    public function create()
    {
            // Muestra el formulario de creación

            $departmentModel = new DepartmentModel();
            $data['departments'] = $departmentModel->findAll();
            return view('employees/create', ['departments' => $data['departments']]);
    
        // $model = new EmployeeModel();

        // // Recupera todos los departamentos para mostrar en la vista
        // $departmentModel = new DepartmentModel();
        // $data['departments'] = $departmentModel->findAll();
            // if ($this->request->getMethod() === 'post') {
        //     // Datos del formulario
        //     $name = $this->request->getPost('name');
        //     $position = $this->request->getPost('position');
        //     $salary = $this->request->getPost('salary');
        //     $department_id = $this->request->getPost('department_id');
        //     // Datos del archivo
        //     $photo = $this->request->getFile('photo');
        //     // Validaciones y reglas de validación
        //     $postData = $this->request->getPost();
        //     // Configuración para la carga de archivos
        //     $file = $this->request->getFile('photo'); // 'photo' debe coincidir con el nombre del campo en el formulario
        //     // // Verifica si se cargó un archivo
        //     // $photo = $this->request->getFile('photo');
        //     // if ($photo->isValid() && !$photo->hasMoved())
        //     // {
        //     //     // Hacer algo con el archivo, por ejemplo, moverlo a una carpeta
        //     //     $newName = $photo->getRandomName();
        //     //     $photo->move(WRITEPATH . 'uploads', $newName);
        //     //     // Aquí puedes guardar el nombre del archivo en tu base de datos o realizar otras acciones
        //     //     // Ahora, puedes imprimir $_FILES para ver información adicional
        //     //     echo '<pre>';
        //     //     print_r($_FILES);
        //     //     echo '</pre>';
        //     // }
        //     // else
        //     // {
        //     //     // Manejar el caso en que el archivo no se ha subido correctamente
        //     //     echo "Error al subir el archivo.";
        //     // }
        //     // Verifica si se cargó un archivo y si es una imagen válida (puedes ajustar esto según tus necesidades)
        //     if ($file && $file->isValid() && $file->getClientMimeType() == 'image/jpeg') {
        //         // Asigna la foto al array de datos que se guardará en la base de datos
        //         $postData['photo'] = $file;  
        //     }
        //     // Añade la validación para el campo department_id
        //     $validationRules = [
        //         'name' => 'required|alpha_numeric_space|min_length[3]|max_length[255]',
        //         'position' => 'required|min_length[3]|max_length[255]',
        //         'salary' => 'required|numeric',
        //         'department_id' => 'required|numeric', // Añadido para department_id
        //         'photo' => 'uploaded[photo]|max_size[photo,1024]|mime_in[photo,image/jpg,image/jpeg]', // Añadido para la foto
        //     ];
    
        //     if (!$this->validate($validationRules)) {
        //         // Si no pasa la validación, muestra la vista de nuevo con los errores
        //         return view('employees/create', ['validation' => $this->validator, 'departments' => $data['departments']]);
        //     } else {
        //         // Pasa la validación, inserta el nuevo empleado
        //         $model->saveEmployeeWithPhoto($postData);
    
        //         // Redirecciona a la lista de empleados u otra página según sea necesario
        //         return redirect()->to('/employees');
        //     }
        // }
        // return view('employees/create', ['departments' => $data['departments']]);
    }

    public function store()
    {
        // Validación de formulario
        $validationRules = [
            'name' => 'required',
            'position' => 'required',
            'salary' => 'required|numeric',
            'department_id' => 'required|numeric',
            'photo' => 'uploaded[photo]|max_size[photo,1024]|mime_in[photo,image/jpeg,image/png,image/gif]',
        ];

        if ($this->validate($validationRules)) {
            // Datos del formulario
            $name = $this->request->getPost('name');
            $position = $this->request->getPost('position');
            $salary = $this->request->getPost('salary');
            $department_id = $this->request->getPost('department_id');

            // Datos del archivo
            $photo = $this->request->getFile('photo');

            // Verificar si el archivo se ha subido correctamente
            if ($photo->isValid() && !$photo->hasMoved()) {
                // Mover el archivo a una carpeta de destino
                $newName = $photo->getRandomName();
                $photo->move(WRITEPATH . 'uploads', $newName);

                // Lógica para la creación del empleado con la foto
                $employeeModel = new EmployeeModel();

                // Configurar los datos del nuevo empleado
                $data = [
                    'name' => $name,
                    'position' => $position,
                    'salary' => $salary,
                    'department_id' => $department_id,
                    'photo' => $newName, // Nombre de la foto almacenada
                ];

                // Insertar el nuevo empleado en la base de datos
                $employeeModel->insert($data);

                // Redirigir a la página principal u otra acción después de la creación del empleado
                return redirect()->to('/employees');
            } else {
                // Manejar el caso en que el archivo no se ha subido correctamente
                echo "Error al subir el archivo.";
            }
        } else {
            // Manejar el caso de validación fallida
            echo "Error de validación.";
        }


        // $employeeModel = new EmployeeModel();

        // $data = [
        //     'name' => $this->request->getPost('name'),
        //     'position' => $this->request->getPost('position'),
        //     'salary' => $this->request->getPost('salary'),
        //     'department_id' => $this->request->getPost('department_id'),
        // ];

        // $employeeModel->createEmployee($data);

        // return redirect()->to('employees');
    }

    public function edit($employeeId)
    {
        // Instanciar el modelo de empleados
        $employeeModel = new EmployeeModel();

        // Obtener los datos del empleado por su ID
        $employee = $employeeModel->getEmployeeById($employeeId);

        // Verificar si el empleado existe
        if (!$employee) {
            // Manejar el caso en que no se encuentre el empleado
            return redirect()->to('/employees')->with('error', 'Empleado no encontrado.');
        }

        // Instanciar el modelo de departamentos
        $departmentModel = new DepartmentModel();

        // Obtener la lista de departamentos
        $departments = $departmentModel->findAll();

        // Cargar la vista de edición con los datos del empleado y la lista de departamentos
        return view('employees/edit', ['employee' => $employee, 'departments' => $departments]);
    
    }

    public function show($id)
    {
        $model = new EmployeeModel();
        $data['employee'] = $model->find($id);

        if (empty($data['employee'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('No se encontró el empleado: ' . $id);
        }

        echo view('employees/show', $data);
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

    public function generateEmployeeReportById($employeeId)
    {
        $employeeModel = new EmployeeModel();
        $employee = $employeeModel->find($employeeId);

        if (!$employee) {
            // Manejar el caso en que no se encuentre el empleado
            return redirect()->to('/employees')->with('error', 'Empleado no encontrado.');
        }

        $mpdf = new Mpdf();

        // Ruta de la imagen del empleado FCPATH
        $imagePath = WRITEPATH . 'uploads/' . $employee['photo'];

        // Agrega la imagen al HTML
        $html = view('reports/single_employee_report', ['employee' => $employee, 'imagePath' => $imagePath]);

        // Asegúrate de tener un marcador de posición en tu vista para la imagen, por ejemplo:
        // <img src="{imagePath}" style="max-width: 100%;" />

        $mpdf->WriteHTML($html);
        $mpdf->Output('employee_report_' . $employee['id'] . '.pdf', 'D');

    }

    // Método para generar el reporte PDF
    public function generateReport($id)
    {
        $model = new EmployeeModel();
        $employee = $model->find($id);

        if (empty($employee)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('No se encontró el empleado: ' . $id);
        }

        // Lógica para generar el reporte PDF (debe implementarse)
        // ...

        // Redireccionar al show después de generar el PDF
        return redirect()->to("employee/show/{$id}");
    }


}
