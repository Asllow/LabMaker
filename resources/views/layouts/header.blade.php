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
            <nav class="container">
                <div class="maker_logo">
                    <div style="position: relative; width: 100%; height: 0; padding-top: 100.0000%;
 padding-bottom: 0; box-shadow: 0 2px 8px 0 rgba(63,69,81,0.16); margin-top: 1.6em; margin-bottom: 0.9em; overflow: hidden;
 border-radius: 8px; will-change: transform;">
                        <iframe loading="lazy" style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; border: none; padding: 0;margin: 0;"
                                src="https:&#x2F;&#x2F;www.canva.com&#x2F;design&#x2F;DAFvrj9h_Dc&#x2F;4oOFRcaNUT3UnAxH5_lGww&#x2F;view?embed" allowfullscreen="allowfullscreen" allow="fullscreen">
                        </iframe>
                    </div>
                    <a href="https:&#x2F;&#x2F;www.canva.com&#x2F;design&#x2F;DAFvrj9h_Dc&#x2F;4oOFRcaNUT3UnAxH5_lGww&#x2F;view?utm_content=DAFvrj9h_Dc&amp;utm_campaign=designshare&amp;utm_medium=embeds&amp;utm_source=link" target="_blank" rel="noopener">Cópia de Design sem nome</a> de Laboratório Maker
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
