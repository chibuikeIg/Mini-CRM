<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index() {

        return view('admin.employee.index');

    }

    public function fetchEmployees() {

        $employees = Employee::orderBy('id', 'DESC')->get()->load('company');

        return response()->json($employees);

    }

    public function store() {

        $validator = Validator::make(request()->all(), [

            'name' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:employees'],
            'password'   => ['required', 'string', 'min:8'],
            'company'    => ['required']
        
        ]);

        if($validator->fails()) {

            return response()->json($validator->errors());

        }

        Employee::create([

            'company_id' => request('company'),
            'name' => request('name'),
            'email'=> request('email'),
            'password' => Hash::make( request('password') )

        ]);

        return response()->json(['success'=>true]);

    }

    public function update(Employee $employee) {

        $validator = Validator::make(request()->all(), [

            'name' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:employees,email,'.$employee->id],
            'company' => ['required']

        ]);

        if($validator->fails()) {

            return response()->json($validator->errors());

        }

        $employee->name = request('name');

        $employee->email= request('email');

        $employee->company_id  = request('company');

        if(!empty(request('password'))) {

            $employee->password = Hash::make( request('password') );

        }

        $employee->save();

        return response()->json(['success'=>true]);

    }

    public function delete(Employee $employee) {

        $employee->delete();

        return response()->json(['success'=>true]);
    }
}
