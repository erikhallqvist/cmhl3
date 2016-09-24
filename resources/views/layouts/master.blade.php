<html>
  <head>
    <title>CMHL - Cyber Management Hockey League</title>
    <link href="/css/menu.css" rel="stylesheet" type="text/css"/>
    <link href="/css/common.css" rel="stylesheet" type="text/css"/>
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
