<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::latest()->paginate(10);
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'birthday' => 'nullable|date',
            'gender' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'user_id' => 'required|exists:users,id',
            'position' => 'required',
            'hire_date' => 'required|date',
            'salary' => 'required|numeric',
        ]);

        // Upload image if provided
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('employee_images', 'public');
        }

        $employee = Employee::create([
            'full_name' => $request->full_name,
            'address' => $request->address,
            'phone' => $request->phone,
            'birthday' => $request->birthday,
            'gender' => $request->gender,
            'image' => $imagePath ?? null,
            'user_id' => $request->user_id,
            'position' => $request->position,
            'hire_date' => $request->hire_date,
            'salary' => $request->salary,
        ]);

        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'full_name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'birthday' => 'nullable|date',
            'gender' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'user_id' => 'required|exists:users,id',
            'position' => 'required',
            'hire_date' => 'required|date',
            'salary' => 'required|numeric',
        ]);

        // Upload image if provided
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('employee_images', 'public');
        }

        $employee->update([
            'full_name' => $request->full_name,
            'address' => $request->address,
            'phone' => $request->phone,
            'birthday' => $request->birthday,
            'gender' => $request->gender,
            'image' => $imagePath ?? $employee->image,
            'user_id' => $request->user_id,
            'position' => $request->position,
            'hire_date' => $request->hire_date,
            'salary' => $request->salary,
        ]);

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function destroy(Employee $employee)
    {
        // Delete employee image if exists
        if ($employee->image) {
            Storage::disk('public')->delete($employee->image);
        }

        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}
