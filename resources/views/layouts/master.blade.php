<html>
  <head>
    <title>CMHL - Cyber Management Hockey League</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="/css/menu.css" rel="stylesheet" type="text/css"/>
    <link href="/css/common.css" rel="stylesheet" type="text/css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  </head>
  <body>
    <div class="container">
      <header class="row">
        @include('layouts.header')
      </header>

      <div id="main" class="row">
        @yield('content')
      </div>
    </div>
  </body>
</html>
