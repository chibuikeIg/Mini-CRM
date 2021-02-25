<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MiniCRM | Employee | Login</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
</head>
<body>
    <div class="wrapper">

        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="first">

                <h3 class="mt-3 text-center">Welcome Back!</h3>
                <p class="mt-2 text-center">Now login to access your account.</p>
            </div>

            <!-- Login Form -->
            <div class="container">
                @if($error = session('error'))
                  <div class="alert alert-danger">{{ $error }}</div>
                @endif
                <form action="#" method="post">
                @csrf
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email"  class="fadeIn second form-control" name="email">
                    </div>
                    
                    <div class="form-group">

                        <label>Password</label>
                        <input type="password"  class="fadeIn third form-control" name="password">

                    </div>
                    
                    <div class="form-group ">
                        <button type="submit" class="fourth form-control btn btn-info">Login</button>
                    </div>
                    
                </form>

            </div>

        </div>

    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>