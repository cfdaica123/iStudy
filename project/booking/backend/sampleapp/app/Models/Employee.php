<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $primaryKey = 'employee_id';
    protected $fillable = [
        'full_name', 'address', 'phone', 'birthday', 'gender', 'image',
        'user_id', 'department_id', 'position', 'hire_date', 'salary'
    ];

    /**
     * Get the user associated with the employee.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the department associated with the employee.
     */
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    /**
     * Get all employees.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAllEmployees()
    {
        return $this->all();
    }

    /**
     * Get an employee by ID.
     *
     * @param  int  $employeeId
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getEmployeeById($employeeId)
    {
        return $this->findOrFail($employeeId);
    }

    /**
     * Create a new employee.
     *
     * @param  array  $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function createEmployee($data)
    {
        return $this->create($data);
    }

    /**
     * Update an employee.
     *
     * @param  int  $employeeId
     * @param  array  $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function updateEmployee($employeeId, $data)
    {
        $employee = $this->findOrFail($employeeId);
        $employee->update($data);

        return $employee;
    }

    /**
     * Delete an employee.
     *
     * @param  int  $employeeId
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function deleteEmployee($employeeId)
    {
        $employee = $this->findOrFail($employeeId);
        $employee->delete();

        return $employee;
    }
}
