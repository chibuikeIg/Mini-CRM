<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index() {

        $employees = Employee::where('company_id', auth('company')->user()->id)
        
                     ->orderBy('id', 'DESC')->get()->load('company');

        return response()->json($employees);

    }
}
