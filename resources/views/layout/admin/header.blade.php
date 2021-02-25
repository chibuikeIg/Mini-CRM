<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script>
            window.Laravel={csrfToken:'{{ csrf_token() }}'}
        </script>
        <title>@yield('title')</title>
        <link href="{{asset('css/styles.css')}}" rel="stylesheet"/>
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>

    </head>
    <body class="sb-nav-fixed">

        <div id="app">

            <t-header></t-header>

            <div id="layoutSidenav">

               <sidebar 
               
                admin_home="{{ route('admin.home') }}" 

                admin_companies="{{ route('admin.companies') }}"

                admin_employees="{{ route('admin.employees') }}"

                admin_logout= "{{  route('admin.logout') }}" 
                
                csrf_token="{{ csrf_token() }}"></sidebar>

               

               @yield('content')

               @include('layout.admin.footer')