<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <livewire:styles/>
    <title>Ro ش ta</title>
</head>

<body>
<header>
    <nav class="navbar navbar-expand-lg ">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <img src="{{asset('images/Logo.png')}}">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <form class="container justify-content-start">
                            <a href="{{route('login')}}" class="btn me-2" type="button"><i
                                    class="fa-solid fa-right-to-bracket"
                                    style="padding-right:5px;"></i>Log In</a>
                        </form>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link " href="{{route('register')}}" id="navbarDropdown" role="button">
                            <i class="fa-solid fa-user-plus d-lg-none"></i>
                            Register
                        </a>

                    </li>
                    <li class="nav-item d-none">
                        <a class="nav-link active" aria-current="page" href="#">
                            <i class="fa-solid fa-house d-lg-none"></i>
                            Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">contact Us </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
{{$slot}}


<footer class="pt-5 pb-5 text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <div class="General-info justify-content-center align-items-center">
                    <img src="images/Logo.png">
                    <p class="text-center">All Healthcare in one Place</p>

                </div>
            </div>
            <div class="col-md-6 col-lg-3 text-md-start">
                <div class="links">
                    <h5 class="fs-6">Important Links</h5>
                    <ul class="list-unstyled lh-lg">
                        <li><a href="src/pages/Login.html">Log in</a></li>
                        <li><a href="src/pages/Patient-Register.html">Sign up as Patient</a></li>
                        <li><a href="src/pages/Doctor-Pharmacist-Registeration.html">Sign up as Doctor / Pharmacist</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 text-md-start">
                <div class="links">
                    <h5 class="fs-6">Need Help?</h5>
                    <ul class="list-unstyled lh-lg">
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Terms of Use</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Doctors / Pharmacists Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 text-md-start">
                <div class="links-mobile">
                    <ul class="list-unstyled">
                        <li><a href="#">
                                <img src="images/Get-it-on-google-play-badge.png" alt="Download From Google Play Store">
                            </a></li>
                        <li><a href="#">
                                <img src="images/download-on-the-app-store-apple.png">
                            </a></li>
                    </ul>
                    <div class="social">
                        <a href=""><i class="fa-brands fa-facebook-square"></i></a>
                        <a href=""><i class="fa-brands fa-linkedin"></i></a>
                        <a href=""><i class="fa-brands fa-twitter-square"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="credits ">
        Created By <span style="color:#26A0DB;">Ro<span style="color:#DF313B;"> ش </span>ta</span> Team<br>
        all Rights are Reserved
        &copy; 2022 Rostha.Inc
    </div>
</footer>
<livewire:scripts/>
</body>

</html>
