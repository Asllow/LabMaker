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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
                <a class="logo" href="{{route('welcome')}}">
                    <img src="{{asset("img/icons/labmaker_lampada.svg")}}" alt="Logo">
                    <text class="text_icon">Lab<strong class="text_icon text_icon2">Maker</strong></text>
                </a>
                <div class='menu'>
                    <ul class='grid'>
                        <li><a class='title' id='index' href='{{route('welcome')}}'>Início</a></li>
                        <li><a class='title' id='era' href=''>E.R.A</a></li>
                        <li><a class='title' id='noticias' href=''>Notícias</a></li>
                        @auth()
                            <li><a class='title' id='dashboard' href='{{route('dashboard')}}'>Dashboard</a></li>
                            <li>
                                <a href='' class='perfil'>
                                    <h2 class='title'> A </h2>
                                    <h2 class='subtitle'>Arthur Miranda</h2>
                                </a>
                            </li>
                        @endauth
                        @guest()
                            <li><a class='title' id='entrar' href='{{route('entrar')}}'>Entrar</a></li>
                            <a class='bi bi-person-circle' href='{{route('entrar')}}'></a>
                        @endguest
                        <div class='triangulo'>
                            <a class='logo' href='{{route('welcome')}}'>
                                <img src='{{asset("img/icons/labmaker_lampada.svg")}}' alt="Logo">
                                <text>Lab<strong>Maker</strong></text>
                            </a>
                        </div>
                        <div class='background'>
                        </div>
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
