<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use App\Models\Employee;

class AccountController extends Controller
{
    public function show () {

        return response()->json( auth('employee')->user() );

    }

    public function update() {

        $employee = auth('employee')->user();

        $validator = Validator::make( request()->all(), [

            'full_name' => ['required'],

            'email' => ['required', 'string', 'email', 'max:255', 'unique:employees,email,'.$employee->id],

        ]);

        if($validator->fails()) {

            return response()->json($validator->errors());

        }

        Employee::where('id', $employee->id)->update([

            'name' => request('full_name'),
            'email'=> request('email')
            
        ]);

        return response()->json(['success'=>true]);

    }
}
