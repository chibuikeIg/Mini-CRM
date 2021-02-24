@extends('layout.admin.header')

@section('title', 'MiniCrm Admin | Companies')

@section('content')

<div id="layoutSidenav_content">

    <main>
        <div class="container-fluid">

            <h2 class="mt-3 border-bottom pb-3">Companies</h2>

            <div class="container mt-5">

                <companies></companies>

            </div>
            

        </div>
    </main>

@endsection