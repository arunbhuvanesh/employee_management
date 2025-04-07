<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|string|unique:employees,employee_id',
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|unique:employees,email',
            'dob'         => ['required', 'date', 'before:-18 years', 'before_or_equal:today'],
            'doj'         => ['required', 'date', 'before_or_equal:today'],
        ]);

        Employee::create($request->all());

        return redirect()->route('employees.index')->with('success', 'Employee created!');
    }

    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'employee_id' => ['required', 'string', Rule::unique('employees')->ignore($employee->id)],
            'name'        => 'required|string|max:255',
            'email'       => ['required', 'email', Rule::unique('employees')->ignore($employee->id)],
            'dob'         => ['required', 'date', 'before:-18 years', 'before_or_equal:today'],
            'doj'         => ['required', 'date', 'before_or_equal:today'],
        ]);

        $employee->update($request->all());

        return redirect()->route('employees.index')->with('success', 'Updated!');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Deleted!');
    }
}
