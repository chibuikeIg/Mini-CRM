@extends('layout.employee.header')

@section('title', 'MiniCRM | '.auth('employee')->user()->name.' | Dashboard')

@section('content')
    <!-- Begin page content -->
    <main class="flex-shrink-0">
        <div class="container">
            <h4 class="mt-3 pb-3 border-bottom" id="heading">Welcome Back {{auth('employee')->user()->name}}</h4>

            <div class="row mt-5 mb-4"> 

                <personal-details></personal-details>

                <password></password>

            </div>
        </div>
    </main>

@endsection