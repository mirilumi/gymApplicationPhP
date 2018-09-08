<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
        <!-- Fonts -->
    <link href="{{ asset('/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('/css/custom.min.css') }}" rel="stylesheet">

  </head>
  <body>
      <div class="container">
          @yield('content')
      </div>
      <script type="text/javascript" src="{{ asset('/vendors/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap -->
        <script  type="text/javascript"  src="{{ asset('/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Custom Theme Scripts -->
        <script src="{{ asset('js/appp.js') }}"></script>
  </body>
</html>