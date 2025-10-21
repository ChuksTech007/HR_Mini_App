<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     * Supports optional filters:
     * - department
     * - min_salary
     * - max_salary
     * - q (name or position)
     */
    public function index(Request $request)
    {
        $query = Employee::query();

        if ($request->filled('department')) {
            $query->where('department', $request->query('department'));
        }

        if ($request->filled('min_salary')) {
            $query->where('salary', '>=', $request->query('min_salary'));
        }

        if ($request->filled('max_salary')) {
            $query->where('salary', '<=', $request->query('max_salary'));
        }

        if ($request->filled('q')) {
            $q = $request->query('q');
            $query->where(function($sub) use ($q) {
                $sub->where('name', 'like', "%{$q}%")
                    ->orWhere('position', 'like', "%{$q}%");
            });
        }

        // simple pagination
        $perPage = (int) $request->query('per_page', 15);
        $employees = $query->orderBy('id', 'desc')->paginate($perPage);

        return response()->json($employees);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        $data = $request->validated();
        $employee = Employee::create($data);

        return response()->json($employee, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee = Employee::findOrFail($id);
        return response()->json($employee);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreEmployeeRequest $request, string $id)
    {
        $employee = Employee::findOrFail($id);
        $data = $request->validated();

        // For unique email rule on update, we allow same email for this employee
        if (isset($data['email'])) {
            // ensure unique except this id
            $exists = Employee::where('email', $data['email'])->where('id', '!=', $id)->exists();
            if ($exists) {
                return response()->json(['message' => 'The email has already been taken.'], 422);
            }
        }

        $employee->update($data);
        return response()->json($employee);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return response()->json(null, 204);
    }
}
