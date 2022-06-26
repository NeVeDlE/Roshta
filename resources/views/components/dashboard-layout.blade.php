<!doctype html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Codeitter</title>

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
<style>
    /* Set the size of the div element that contains the map */
    #map {
        height: 400px;
        /* The height is 400 pixels */
        width: 100%;
        /* The width is the width of the web page */
    }
</style>

<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script src="{{asset('js/html5-qrcode.min.js')}}"></script>
<body style="font-family: Open Sans, sans-serif" class="bg-gray-200">
<livewire:styles/>

<x-settings></x-settings>
<section id="contentHeader" class="bg-white">
    <nav class="bg-white h-full px-6 flex items-center gap-6">
        <div id="TogglersideBar">
            <i class="fa-solid fa-bars cursor-pointer text-2xl   text-blue-500"></i>
        </div>

            <livewire:search-dropdown/>

        <div class="flex items-center justify-between">

            <h4 class="text-blue-400 font-semibold ">Welcome {{auth()->user()->name}}!</h4>
        </div>
    </nav>
    <main class="w-full py-9 px-6">
        {{$slot}}

    </main>
</section>


<x-flash/>
<livewire:scripts/>

<script>
    function openSearch() {
        searchBar.classList.toggle("show");
    }
    var mainToggler = document.getElementById("TogglersideBar");
    var mainSideBar = document.getElementById("sideBar");
    mainToggler.addEventListener("click", function () {
        mainSideBar.classList.toggle("hide");
    });
</script>
</body>
