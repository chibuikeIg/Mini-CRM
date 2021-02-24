<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    public function index () {

        return view('admin.companies.index');

    }

    public function fetchCompanies() {

        return response()->json(['data'=>['hello word']]);

    }

    public function store() {

        $validator = Validator::make(request()->all(), [

            'name' => ['required'],
            'email' => ['required'],
            'url'       => ['required'],
            'password'   => ['required'],
        
        ]);

        if($validator->fails()) {

            return response()->json($validator->errors());
            
        }

        return response()->json(request()->all());

    }
}
