<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>VH Challenge | @yield('title')</title>

        <link rel="stylesheet" href="/css/app.css" />
    </head>
    <body>
        <main>
            @yield('main')
        </main>
    </body>
</html>
