@section('title', 'Login')
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <title>STS - Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('assets/img/Logo-sts.jpg') }}" type="image/jpg">

    <style>
        .field-icon {
            float: right;
            margin-right: 15px;
            margin-top: -33px;
            position: relative;
            z-index: 2;
            cursor: pointer;
        }

    </style>

</head>

<body style="overflow-x: hidden;">
    <div class="container-fluid align-items-center" style="margin: 0; padding: 0">
        <div class="row">
            <div class="col-md-6 col-sm-12 bg-primary">
                <div class="row d-flex justify-content-center my-5">
                    <img style="max-width: 150px" src="{{ asset('/images/logo.png') }}" alt="">
                </div>
                <div class="row d-flex justify-content-center mt-5 text-center">
                    <div class="col-md-12">
                        <h1 class="text-white font-weight-bold">Welcome Administrator!</h1>
                    </div>
                </div>
                <div class="row d-flex justify-content-center my-3">
                    <img class="robot " style="max-width: 438px" src="{{ asset('/images/robot.png') }}" alt="">
                </div>
            </div>
            <div class="col-md-6 col-sm-12 my-5">
                <div class="row p-5">
                    <div class="col-md-12 p-5">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4 font-weight-bold">Silahkan Login!</h1>
                            </div>
                            <form class="user" action="{{ route('login') }}" method="POST">
                                @csrf
                                @if (Session::has('error'))
                                    <div class="alert alert-danger" role="alert">
                                        {{-- {{ Session::get('error') }} --}}
                                        <p class="h5 text-center text-danger">Username atau password tidak sesuai!</p>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <input type="username" class="form-control form-control-user" id="username"
                                        aria-describedby="username" name="username" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id="password"
                                        name="password" minlength="8" placeholder="Password">
                                    <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Login
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const passwordField = document.getElementById('password');
            const togglePassword = document.querySelector('.toggle-password');

            togglePassword.addEventListener('click', function() {
                const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordField.setAttribute('type', type);
                this.classList.toggle('fa-eye-slash');
            });
        });
    </script>

</body>

</html>
