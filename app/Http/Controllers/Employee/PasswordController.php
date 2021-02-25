<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\MessageBag;

use App\Models\Employee;

class PasswordController extends Controller
{
    public function update() {

        $validator = Validator::make(request()->all(), [

            'password'              => ['required', 'min:8', 'confirmed'],
            'password_confirmation' => ['required'],
            'current_password'      => ['required']

        ]);

        if($validator->fails()) {

            return response()->json($validator->errors());
            
        }

        $employee = Employee::find(auth('employee')->user()->id);

        if(!password_verify(request('current_password'), $employee->password)) {

            $errors = new MessageBag(['current_password' => ['Current password entered is invalid']]); 

            return response()->json($errors);

        }

        $employee->password = Hash::make(request('password'));

        $employee->save();

        return response()->json(['success'=>true]);

    }
}
