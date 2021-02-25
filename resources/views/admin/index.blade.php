@extends('layout.admin.header')

@section('title', 'MiniCrm Admin Dashboard')

@section('content')

<div id="layoutSidenav_content">

    <main>
        <div class="container-fluid">
            <h2 class="mt-3 border-bottom pb-3">Dashboard</h2>

            <div class="row mt-5">

                <div class="col-xl-4 col-md-6 mb-4" >
                    <a href="{{ route('admin.companies') }}" class="nav-link">
                        <div class="card border-left-success shadow h-100 py-2" style="background-color:#3742fa;">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-white text-center"><h4><strong>Companies</strong></h4></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-building fa-2x text-white"></i>
                            </div>
                            </div>
                        </div>
                        </div>
                    </a>  
                </div>

                <div class="col-xl-4 col-md-6 mb-4" >
                    <a href="{{ route('admin.employees') }}" class="nav-link">
                        <div class="card border-left-success shadow h-100 py-2" style="background-color:#e74c3c;">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-white text-center"><h4><strong>Employees</strong></h4></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-white"></i>
                            </div>
                            </div>
                        </div>
                        </div>
                    </a>  
                </div>

                <div class="col-xl-4 col-md-6 mb-4" >
                    <a href="{{ route('admin.logout') }}" class="nav-link" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <div class="card border-left-success shadow h-100 py-2" style="background-color:#2c3e50;">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-white text-center"><h4><strong>Logout</strong></h4></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-sign-out-alt fa-2x text-white"></i>
                            </div>
                            </div>
                        </div>
                        </div>
                    </a>  
                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>

            </div>

        </div>
    </main>
@endsection