<?php

namespace App\Models;

use CodeIgniter\Model;

class DepartmentModel extends Model
{
    protected $table            = 'departments';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'description', 'location'];

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

    public function getEmployees($departmentId)
    {
        return $this->db->table('employees')->where('department_id', $departmentId)->get()->getResultArray();
    }

    public function getAllDepartments()
    {
        return $this->findAll();
    }

    public function getDepartmentById($departmentId)
    {
        return $this->find($departmentId);
    }

    public function createDepartment($data)
    {
        return $this->insert($data);
    }

    public function updateDepartment($departmentId, $data)
    {
        return $this->update($departmentId, $data);
    }

    public function deleteDepartment($departmentId)
    {
        // Borrar los empleados asociados al departamento
        $this->db->table('employees')->where('department_id', $departmentId)->delete();
        // Borrar el departamento
        return $this->delete($departmentId);
    }

    public function getEmployeesByDepartment()
    {
        $query = $this->db->table('employees');
        $query->select('employees.*, departments.name as department_name');
        $query->join('departments', 'departments.id = employees.department_id');
        $query->orderBy('departments.name', 'ASC');
        $query->orderBy('employees.name', 'ASC');

        return $query->get()->getResultArray();
    }

}
