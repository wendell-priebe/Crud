<!DOCTYPE html>
<html lang="pt-brnpm install jquery">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home</title>

        {{-- Tags para remover o cache do navegador  --}}
        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Expires" content="0" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('scss/style.css') }}">

    </head>

    <body class="antialiased">
        <a class="btn btn-outline-danger" href="/auth">login</a>

        @yield('container')

    </body>
    <script src="{{ asset('js/global.js') }}"><script>
    <script src="{{ asset('js/jquery.js') }}"><script>
    <script src="{{ asset('js/bootstrap.js') }}"><script>
</html>
