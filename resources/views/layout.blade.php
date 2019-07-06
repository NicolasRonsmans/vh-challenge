<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>VH Challenge | @yield('title')</title>

        <link rel="stylesheet" href="/css/app.css" />
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-8">
                    <header>
                        <h1 class="text-center py-4">
                            <a href="/" title="VH Challenge - Q&A" class="text-secondary">VH Challenge - Q&A</a>
                        </h1>
                    </header>
                    <main>
                        @yield('main')
                    </main>
                </div>
            </div>
        </div>
        <script src="/js/app.js"></script>
    </body>
</html>
