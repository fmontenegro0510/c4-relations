<?php

namespace App\Models;

use CodeIgniter\Model;

class EmployeeModel extends Model
{
    protected $table            = 'employees';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = ['name', 'position', 'salary', 'department_id', 'photo'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getAllEmployees()
    {
        return $this->findAll();
    }

    public function getEmployeeById($employeeId)
    {
        return $this->find($employeeId);
    }

    public function createEmployee($data)
    {
        return $this->insert($data);
    }

    public function updateEmployee($employeeId, $data)
    {
        return $this->update($employeeId, $data);
    }

    public function deleteEmployee($employeeId)
    {
        return $this->delete($employeeId);
    }
    
    public function searchEmployees($search)
    {
        // Utilizar LIKE para buscar empleados por nombre
        $employees = $this->like('name', $search)->findAll();

        return $employees;
    }
    
    public function getEmployeesByDepartment($departmentId)
    {
        return $this->where('department_id', $departmentId)->findAll();
    }

    public function saveEmployeeWithPhoto($data)
    {
        // Si hay una foto cargada, guarda la ruta en la base de datos y mueve el archivo a la carpeta deseada
        if (!empty($data['photo'])) {
            $photoPath = $this->uploadPhoto($data['photo']);
            $data['photo'] = $photoPath;
        }

        return $this->insert($data);
    }

    // Método para manejar la carga y almacenamiento de la foto
    protected function uploadPhoto($file)
    {
        // Configuración para la carga de archivos
        $config = [
            'path' => WRITEPATH . 'uploads', // Asegúrate de que esta carpeta sea escribible
            'randomize' => true,
            'overwrite' => false,
            'maxSize' => 1024, // Tamaño máximo en kilobytes
            'mime_in' => ['image/jpeg'],
        ];

        $image = \Config\Services::image()
            ->withFile($file)
            ->toType('jpeg', true)
            ->save($config['path'], $config['randomize'], $config['overwrite']);

        return $image->getName();
    }


    public function createEmployeeWithPhoto($name, $position, $salary, $department_id, $photo)
    {
        $data = [
            'name' => $name,
            'position' => $position,
            'salary' => $salary,
            'department_id' => $department_id,
            'photo' => $photo,
        ];

        return $this->insert($data);
    }

    public function updateEmployeeWithPhoto($id, $name, $position, $salary, $department_id, $photo)
    {
        $data = [
            'name' => $name,
            'position' => $position,
            'salary' => $salary,
            'department_id' => $department_id,
            'photo' => $photo,
        ];

        return $this->update($id, $data);
    }
    
    public function getEmployeeWithDepartment($id)
    {
        return $this->db->table('employees')
            ->select('employees.*, departments.name as department_name')
            ->join('departments', 'departments.id = employees.department_id')
            ->where('employees.id', $id)
            ->get()
            ->getRowArray();
    }
}
