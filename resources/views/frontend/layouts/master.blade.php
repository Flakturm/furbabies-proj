<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include('frontend.includes.head')
    </head>

    <body>
        <div class="container-fluid">
            @include('frontend.includes.nav')
        </div>

        <div class="container">
            @yield('content')
        </div><!-- container -->

        @include('frontend.includes.footer')
    </body>
</html>
