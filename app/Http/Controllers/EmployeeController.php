<?php
namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');               // all routes require auth
        $this->middleware('admin')->except(['index','show']); // admin-only for create/update/delete
    }

    public function index(Request $request)
    {
        $query = Employee::query();

        if ($request->filled('q')) {
            $q = $request->q;
            $query->where(fn($s) => $s->where('name','like',"%{$q}%")
                                     ->orWhere('email','like',"%{$q}%")
                                     ->orWhere('position','like',"%{$q}%"));
        }

        if ($request->filled('department')) {
            $query->where('department', $request->department);
        }

        if ($request->filled('salary_min')) {
            $query->where('salary', '>=', (float)$request->salary_min);
        }

        if ($request->filled('salary_max')) {
            $query->where('salary', '<=', (float)$request->salary_max);
        }

        $employees = $query->orderBy('name')->paginate(15)->withQueryString();

        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(StoreEmployeeRequest $request)
    {
        Employee::create($request->validated());
        return redirect()->route('employees.index')->with('success','Employee created.');
    }

    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->validated());
        return redirect()->route('employees.index')->with('success','Employee updated.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success','Employee deleted.');
    }
}
