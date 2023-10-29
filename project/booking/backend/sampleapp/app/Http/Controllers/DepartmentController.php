<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    /**
     * Display a listing of departments.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $perPage = $request->input('perPage', 5);

        $departments = Department::latest()->paginate($perPage);

        return view('departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new department.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('departments.create');
    }

    /**
     * Store a newly created department.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $department = new Department;
        $department->createDepartment($data);


        return redirect()->route('departments.index');
    }

    /**
     * Show the form for editing a department.
     *
     * @param  int  $departmentId
     * @return \Illuminate\View\View
     */
    public function edit($departmentId)
    {
        $department = Department::getDepartmentById($departmentId);
        return view('departments.edit', compact('department'));
    }

    /**
     * Update the department.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Department $department)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $departmentModel = new Department();
        $departmentModel->updateDepartment($department->department_id, $data);

        return redirect()->route('departments.index');
    }


    /**
     * Remove the department.
     *
     * @param  int  $departmentId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($departmentId)
    {
        $department = Department::find($departmentId);

        if (!$department) {
            abort(404);
        }

        $department->delete();

        return redirect()->route('departments.index');
    }
}
