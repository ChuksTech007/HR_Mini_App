<?php
namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function salaryByDepartment()
    {
        $rows = Employee::select('department', DB::raw('SUM(salary) as total'))
                       ->groupBy('department')
                       ->get();

        $result = [];
        foreach ($rows as $r) {
            $dept = $r->department ?: 'Unassigned';
            $result[$dept] = (float) $r->total;
        }

        return response()->json($result);
    }
}
