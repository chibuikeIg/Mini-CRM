@extends('layout.admin.header')

@section('title', 'MiniCrm Admin | Create Companies')

@section('content')

<div id="layoutSidenav_content">

    <main>
        <div class="container-fluid">

            <h2 class="mt-3 border-bottom pb-3">Create Companies</h2>

            <div class="card card-body mb-4 mt-5">

                <form>

                    <div  class="form-group">
                        <label>Company Name</label>
                        <input type="text" class="form-control" name="company_name">
                    </div>

                    <div  class="form-group">
                        <label>Company Email</label>
                        <input type="email" class="form-control" name="company_email">
                    </div>

                    <div  class="form-group">
                        <label>Company Logo</label>
                        <input type="file" class="form-control" name="company_logo">
                    </div>

                    <div  class="form-group">
                        <label>Company Url</label>
                        <input type="text" class="form-control" name="company_url">
                    </div>

                    <div  class="form-group">
                        <label>Company Password</label>
                        <input type="text" class="form-control" name="company_password">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Create Company</button>
                    </div>

                </form>

            </div>

        </div>
    </main>

@endsection