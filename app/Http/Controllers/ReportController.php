<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class ReportController extends Controller
{
    public function totalSalaryByDepartment()
    {
        // 1. Query the database: group by department and sum the salary
        $reportData = Employee::selectRaw('department, SUM(salary) as total_salary')
            ->groupBy('department')
            ->get();

        // 2. Format the collection into the required JSON format: "Department" => TotalSalary
        $formattedData = $reportData->pluck('total_salary', 'department');

        return response()->json($formattedData);
    }
}
