<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $primaryKey = 'department_id';
    protected $fillable = ['name'];

    /**
     * Get all departments.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAllDepartments()
    {
        return $this->all();
    }

    /**
     * Get a department by ID.
     *
     * @param  int  $departmentId
     * @return \Illuminate\Database\Eloquent\Model
     */
    public static function getDepartmentById($departmentId)
    {
        return self::findOrFail($departmentId);
    }


    /**
     * Create a new department.
     *
     * @param  array  $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function createDepartment($data)
    {
        return $this->create($data);
    }

    /**
     * Update a department.
     *
     * @param  int  $departmentId
     * @param  array  $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function updateDepartment($departmentId, $data)
    {
        $department = $this->findOrFail($departmentId);
        $department->update($data);

        return $department;
    }

    /**
     * Delete a department.
     *
     * @param  int  $departmentId
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function deleteDepartment($departmentId)
    {
        $department = $this->findOrFail($departmentId);
        $department->delete();

        return $department;
    }
}
