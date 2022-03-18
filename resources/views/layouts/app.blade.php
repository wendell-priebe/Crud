<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

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

  <title> @yield('title') </title>
</head>

<body class="antialiased d-flex">
  
  @if (Auth::check())
    @include('layouts.sidebar')
  @endif

  <div class="app container" style="height: 100vh;">

    <div class="mh-100">
      @yield('content')
    </div>

  </div>

  <script src="{{ asset('js/global.js') }}"><script>
  <script src="{{ asset('js/jquery.js') }}"><script>
  <script src="{{ asset('js/bootstrap.js') }}"><script>
</body>
</html>