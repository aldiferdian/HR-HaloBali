<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $employees = Employee::where('id', '!=', 0);

        if (isset($search) && !empty($search)) {
            $employees = $employees->where('username', 'like', '%' . $search . '%');
        }

        $employees = $employees->get();

        return view('admin.employee.index', [
            'employees' => $employees,
            'search' => $search,
        ]);
    }

    public function create()
    {
        return view('admin.employee.create');
    }
}
