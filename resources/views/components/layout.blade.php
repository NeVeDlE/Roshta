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
<header class="bg-gray-200 h-20 shadow-md">
    <div class="container px-6 py-2 mx-auto">
        <nav class="navbar flex justify-between items-center">
            <a href="#"><img class="h-12" src="{{asset('images/Logo.png')}}"></a>
            <ul id="sidebar" class="navMenu flex justify-between items-center">
                <li class="navItem px-1 ml-5">
                    <a class="text-blue-400 primary navLink" href="{{route('login')}}">Log In</a>
                </li>
                <li class="navItem  px-1 ml-5">
                    <a class="navigation navLink" href="{{route('register')}}">Register</a>
                </li>

                <div class="verticalBar"></div>


                <li class="navItem px-1 ml-5">
                    <a class="navigation navLink" href="#">About Us</a>
                </li>
                <li class="navItem  px-1 ml-5">
                    <a class="navigation navLink" href="#">Contact Us</a>
                </li>
            </ul>
            <div id="toggler" class="Hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
    </div>
</header>

{{$slot}}

<footer id="newsletter"
        class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10">
    <div class="credits ">
        Created By <span style="color:#26A0DB;">Ro<span style="color:#DF313B;"> ش </span>ta</span> Team<br>
        all Rights are Reserved
        &copy; 2022 Rostha.Inc
    </div>


</footer>

<livewire:scripts/>
</body>

</html>
