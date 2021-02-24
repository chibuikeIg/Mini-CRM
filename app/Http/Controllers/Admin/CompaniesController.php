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
            'url'       => ['required', 'url', 'unique:companies'],
            'password'   => ['required', 'string', 'min:8'],
            'logo'       => ['required']
        
        ]);

        if($validator->fails()) {

            return response()->json($validator->errors());

        }

        Company::create([

            'name' => request('name'),
            'email'=> request('email'),
            'logo' => $this->logo(),
            'url'  => request('url'),
            'password' => Hash::make(request('password'))

        ]);

        return response()->json(['success'=>true]);

    }


    public function update(Company $company) {

        $validator = Validator::make(request()->all(), [

            'name' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:companies,email,'.$company->id],
            'url'       => ['required', 'url', 'unique:companies,url,'.$company->id],

        ]);

        if($validator->fails()) {

            return response()->json($validator->errors());

        }

        $company->name = request('name');

        $company->email= request('email');

        $company->url  = request('url');

        if(request()->hasFile('logo')) {

            $company->logo  = $this->logo();

        }

        if(!empty(request('password'))) {

            $company->password = Hash::make( request('password') );

        }

        $company->save();

        return response()->json(['success'=>true]);

    }


    public function delete(Company $company) {

        $company->delete();

        return response()->json(['success'=>true]);
    }


    public function logo() {
        
        return str_replace('public/', '/storage/', request()->logo->store("public/logos"));
    }
}
