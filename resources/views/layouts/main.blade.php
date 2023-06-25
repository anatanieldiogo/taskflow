<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>@yield('title')</title>

        <link rel="icon" href="">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" type="text/css" href="/fontawesome/css/all.css">
        <link rel="stylesheet" type="text/css" href="/css/reset.css">
        <link rel="stylesheet" type="text/css" href="/css/fontes.css">
        <link rel="stylesheet" type="text/css" href="/css/toast.css">
        @stack('style')

        <script src="/js/jQuery.js"></script>
    </head>
    <body>
        @yield('aside')
        @yield('content')

        <script src="/js/app.js"></script>
        <script src="/js/scripts.js"></script>
        <script src="/js/toast.js"></script>
        <script src="/js/moment.js"></script>
        @stack('script')
    </body>
</html>
