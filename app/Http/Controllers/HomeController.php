<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Company;

class HomeController extends Controller
{
    public function index() {

        return view('welcome');

    }

    public function companies() {

        $companies = Company::orderBy('id', 'DESC')->paginate(5);

        return response()->json($companies);

    }
}
