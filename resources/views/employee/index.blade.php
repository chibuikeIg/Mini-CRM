@extends('layout.employee.header')

@section('title', 'MiniCRM | '.auth('employee')->user()->name.' | Dashboard')

@section('content')
    <!-- Begin page content -->
    <main class="flex-shrink-0">
        <div class="container">
            <h4 class="mt-3 pb-3 border-bottom" id="heading">Welcome Back {{auth('employee')->user()->name}}</h4>

            <div class="row mt-5"> 

                <personal-details></personal-details>

                <div class="col-md-6">

                    <div class="card card-body">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam optio fugit, ullam molestiae earum ea. Beatae eos officiis cum fugit necessitatibus facilis animi libero laudantium ducimus quod voluptatem, quae officia!</p>
                    </div>
                    
                </div>

            </div>
        </div>
    </main>

@endsection