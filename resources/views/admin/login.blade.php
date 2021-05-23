<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from colorlib.com/etc/lf/Login_v1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 Apr 2021 15:42:30 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>

<title>Blog</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/css" href="{{ asset('assets/loginPage/vendor/bootstrap/css/bootstrap.min.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('assets/loginPage/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('assets/loginPage/vendor/animate/animate.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('assets/loginPage/vendor/css-hamburgers/hamburgers.min.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('assets/loginPage/vendor/select2/select2.min.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('assets/loginPage/css/util.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/loginPage/css/main.css') }}">

</head>
<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="{{asset('assets/loginPage/images/img-01.png') }}" alt="IMG">
                </div>
                <form class="login100-form" method="POST" action="{{ asset('/login')}}">
                @csrf
                    <span class="login100-form-title">
                    Member Login
                    </span>
                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email" placeholder="Email">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="pass" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                        Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<script src="{{ asset('assets/loginPage/vendor/jquery/jquery-3.2.1.min.js') }}"></script>

<script src="{{ asset('assets/loginPage/vendor/bootstrap/js/popper.js') }}"></script>
<script src="{{ asset('assets/loginPage/vendor/bootstrap/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('assets/loginPage/vendor/select2/select2.min.js') }}"></script>

<script src="{{ asset('assets/loginPage/vendor/tilt/tilt.jquery.min.js') }}"></script>

<script src="{{ asset('assets/loginPage/js/main.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@if(session()->has('error'))
    @if(session('error') == 1)
    <script>
        swal({
            title : 'Login Fail!!',
            text : 'Invalid Credentials , please try again with correct credentials.',
            icon : 'error'
        })
    </script>
    @else if(session('error') == 2)
    <script>
        swal({
            title : 'Error!!',
            text : 'Login First, these pages are only for admin.',
            icon : 'error'
        })
    </script>
    @endif
@endif
</body>

<!-- Mirrored from colorlib.com/etc/lf/Login_v1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 Apr 2021 15:42:34 GMT -->
</html>
