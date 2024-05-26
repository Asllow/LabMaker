<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        {{-- Configuration --}}
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="@yield('description')">
        <title>@yield('title')</title>
    </head>
    <body>
        <header>
            <nav>
                <div>
                    <a href="{{route('welcome')}}"><strong>Lab<strong>Maker</strong></strong></a>
                </div>
                <div></div>
            </nav>
        </header>
        @yield('main')
    </body>
</html>

