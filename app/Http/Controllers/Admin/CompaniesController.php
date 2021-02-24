<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use App\Models\Company;

class CompaniesController extends Controller
{
    public function index () {

        return view('admin.companies.index');

    }

    public function fetchCompanies() {


        $companies = Company::orderBy('id', 'DESC')->paginate(10);

        return response()->json($companies);

    }

    public function store() {

        $validator = Validator::make(request()->all(), [

            'name' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:companies'],
            'url'       => ['required', 'url'],
            'password'   => ['required', 'string', 'min:8'],
            'logo'       => ['required']
        
        ]);

        if($validator->fails()) {

            return response()->json($validator->errors());

        }

        Company::create([

            'name' => request('name'),
            'email'=> request('email'),
            'logo' => str_replace('public/', '/storage/', $this->logo()),
            'url'  => request('url'),
            'password' => Hash::make(request('password'))

        ]);

        return response()->json(['success'=>true]);

    }


    public function delete(Company $company) {

        $company->delete();

        return response()->json(['success'=>true]);
    }


    public function logo() {
        
        return request()->logo->store("public/logos");
    }
}
