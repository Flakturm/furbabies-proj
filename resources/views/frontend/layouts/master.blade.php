<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include('frontend.includes.head')
    </head>

    <body>
        @include('frontend.includes.nav')

        <main>
            @yield('content')
        </main>

        @include('frontend.includes.footer')
    </body>
</html>
