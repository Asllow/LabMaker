<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        {{-- Configuration --}}
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="@yield('description')">
        <title>@yield('title')</title>
        <link href="{{asset("css/app.css")}}" rel="stylesheet" type="text/css" />
        {{-- Favicon --}}
        <link rel="apple-touch-icon" sizes="180x180" href="{{asset("favicon/apple-touch-icon.png")}}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{asset("favicon/favicon-32x32.png")}}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset("favicon/favicon-16x16.png")}}">
        <link rel="manifest" href="{{asset("favicon/site.webmanifest")}}">
        {{-- Fonts --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">

    </head>
    <body>
        <header id='header'>
            <nav class="container">
                <div class="logo">
                    <a href="{{route('welcome')}}">
                        <img src="{{asset("img/icons/labmaker_lampada.svg")}}" alt="Logo">
                        <text class="text_icon">Lab<strong class="text_icon text_icon2">Maker</strong></text>
                    </a>
                </div>
                <div class='menu'>
                    <ul class='grid'>
                        <a class='bi bi-person-circle' href=''></a>
                        <li><a class='title' id='disabled' href='{{route('dashboard')}}'>Dashboard</a></li>
                        <li><a class='title' id='index' href='{{route('welcome')}}'>Início</a></li>
                        <li><a class='title' id='era' href=''>E.R.A</a></li>
                        <li><a class='title' id='noticias' href=''>Notícias</a></li>
                        <li><a class='title' id='entrar' href=''>Entrar</a></li>
                        <a href='' class='perfil' id='disabled'>
                            <h2 class='title'> A </h2>
                            <h2 class='subtitle'>Arthur Miranda</h2>
                        </a>
                        <div class='triangulo'></div>
                        <div class='background'></div>
                        <a class='logo' href='{{route('welcome')}}'>
                            <img src='{{asset("img/icons/labmaker_lampada.svg")}}' alt="Logo">
                            <text>Lab<strong>Maker</strong></text>
                        </a>
                    </ul>
                </div>
                <div class='toggle bi bi-list'></div>
                <div class='toggle bi bi-x'></div>
            </nav>
        </header>
        @yield('main')
        <script type="text/javascript" src="{{asset("js/app.js")}}"></script>
    </body>
</html>
