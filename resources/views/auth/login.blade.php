<!DOCTYPE html>
<html lang="en">

<head>
    <title>LOGIN POLTEKGRADREPO</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.ico') }}" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    <!--===============================================================================================-->
</head>

<style>
    .home-link a {
        color: #fff;
        /* Sesuaikan warna jika diperlukan */
        text-decoration: none;
    }
</style>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="{{ asset('assets/img/polinemalogo.png') }}" alt="IMG">

                </div>

                <form action="{{ route('login.aksi') }}" method="POST" class="login100-form validate-form">
                    @csrf <!-- Add the CSRF token for form submission security -->
                    <div class="home-link">
                        <a href="{{ route('home') }}">
                            <i class="fa fa-arrow-left"></i> Beranda
                        </a>
                    </div>
                    <br>
                    <span class="login100-form-title">
                        Login Anggota
                    </span>

                    <!-- Update input names to match your controller expectations -->
                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" name="nip_nim_nidn" placeholder="NIP, NIM, atau NIDN">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn"> <!-- Specify type attribute for the button -->
                            Login
                        </button>
                    </div>

                    <div class="text-center p-t-12">
                        <span class="txt1">
                            Lupa Password?
                        </span>
                        <a class="txt2">
                            Tanya Admin
                        </a>
                    </div>

                    <div class="text-center p-t-136">
                        <a class="txt2" href="#"></a>
                    </div>
                </form>

            </div>
        </div>
    </div>




    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/tilt/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>

</body>

</html>
