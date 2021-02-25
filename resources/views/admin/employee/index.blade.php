@extends('layout.admin.header')

@section('title', 'MiniCrm Admin | Employees')

@section('content')

<div id="layoutSidenav_content">

    <main>
        <div class="container-fluid">

            <h2 class="mt-3 border-bottom pb-3">Employees</h2>

            <div class="container mt-5">

                <employees></employees>

            </div>
            

        </div>
    </main>

@endsection