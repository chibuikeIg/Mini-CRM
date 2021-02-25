@extends('layout.company.header')

@section('title', 'MiniCRM | '.auth('company')->user()->name.' | Dashboard')

@section('content')
    <!-- Begin page content -->
    <main class="flex-shrink-0">
        <div class="container">
            <h1 class="mt-3 pb-3 border-bottom">Dashboard</h1>

            <employees></employees>
            
        </div>
    </main>

@endsection