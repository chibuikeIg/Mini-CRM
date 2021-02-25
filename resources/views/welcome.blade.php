@extends('layout.header')

@section('title', 'MiniCRM | Home')

@section('content')

  <div class="my-3 p-3 bg-body rounded shadow-sm">

    <h6 class="border-bottom pb-2 mb-0">Recent companies</h6>
    
    <home-companies></home-companies>
    
  </div>

@endsection