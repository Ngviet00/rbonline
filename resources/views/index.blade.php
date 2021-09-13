<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    </head>
    <body>
        @include('pages.Share.header')
        <div class="container">
            @yield('content')
        </div>
        <hr>
        @include('pages.Share.footer')
    </body>
</html>
<script src="{{ asset('js/app.js') }}" defer></script>

