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
    </head>
    <body>
        <header>
            <nav class="container">
                <div class="maker_logo">
                    <a href="{{route('welcome')}}">
                        <strong class="text_icon_1">Lab</strong>
                        <strong class="text_icon_2">Maker</strong>
                    </a>
                </div>
                <div></div>
            </nav>
        </header>
        @yield('main')
        <script type="text/javascript" src="{{asset("js/app.js")}}"></script>
    </body>
</html>
