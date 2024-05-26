<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        {{-- Configuration --}}
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="@yield('description')">
        <title>@yield('title')</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" >
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
    </body>
</html>
