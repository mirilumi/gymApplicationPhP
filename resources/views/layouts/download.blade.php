<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
{{--<meta charset="utf-8">--}}
{{--<meta http-equiv="X-UA-Compatible" content="IE=edge">--}}
{{--<meta name="viewport" content="width=device-width, initial-scale=1">--}}

<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>MaestroDelFitnessAPP</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link href="{{ asset('/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('/css/custom.min.css') }}" rel="stylesheet">

</head>
<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
        </div>

        <!-- top navigation -->
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">

                    <!--<div class="title_right">-->
                    <!--<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">-->
                    <!--<div class="input-group">-->
                    <!--<input type="text" class="form-control" placeholder="Search for...">-->
                    <!--<span class="input-group-btn">-->
                    <!--<button class="btn btn-default" type="button">Go!</button>-->
                    <!--</span>-->
                    <!--</div>-->
                    <!--</div>-->
                    <!--</div>-->
                </div>

                <div class="clearfix"></div>

                <main class="py-4">
                    @yield('content')
                </main>

            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
            <div class="pull-right">
                <!--Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>-->
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>

<!-- jQuery -->
<script type="text/javascript" src="{{ asset('/vendors/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script  type="text/javascript"  src="{{ asset('/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Custom Theme Scripts -->
<script src="{{ asset('js/appp.js') }}"></script>
</body>
</html>