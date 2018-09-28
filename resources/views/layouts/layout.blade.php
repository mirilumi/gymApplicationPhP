<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head><meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
    {{----}}
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
            <div class="left_col scroll-view">
                <img src="{{asset('/images/image_black.jpg')}}" class="img-responsive center-block" width="250" height="250" alt="Logo" />
                <!--<div class="navbar nav_title" style="border: 0;">-->
                <!--<a  class="site_title"><i class="fa fa-paw"></i> <span>Maestro del Fitness</span></a>-->
                <!--</div>-->

                <!--<div class="clearfix"></div>-->

                <!--&lt;!&ndash; menu profile quick info &ndash;&gt;-->
                <!--<div class="profile clearfix">-->
                <!--<div class="profile_pic">-->
                <!--<img th:src="@{/images/user.png}" alt="..." class="img-circle profile_img">-->
                <!--</div>-->
                <!--<div class="profile_info">-->
                <!--<span>Welcome</span>-->
                <!--&lt;!&ndash;<h2>John Doe</h2>&ndash;&gt;-->
                <!--</div>-->
                <!--</div>-->
                <!-- /menu profile quick info -->

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>Menù</h3>
                        <ul class="nav side-menu">
                            <li><a href="{{route('admin.home')}}"><i class="fa fa-home"></i> Home</a>
                                <!--<ul class="nav child_menu">-->
                                <!--<li><a href="index.html">Dashboard</a></li>-->
                                <!--<li><a href="index2.html">Dashboard2</a></li>-->
                                <!--<li><a href="index3.html">Dashboard3</a></li>-->
                                <!--</ul>-->
                            </li>
                            <!--th:if="isAdmin == true"-->
                            <li ><a><i class="fa fa-users"></i> Users <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{route('admin.user.index')}}">Utenti Iscritti</a></li>
                                    <!--<li><a href="/admin/users/teams">Teams</a></li>-->
                                </ul>
                            </li>
                            <li ><a><i class="fa fa-calendar"></i> Programmi <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{route('admin.defaultProgramm.index')}}">Crea Nuovo Programma Membership</a></li>
                                    <li><a href="{{route('admin.defaultProgramm.see')}}">Lista Programmi</a></li>
                                </ul>

                            </li>
                            <li ><a><i class="fa fa-calendar"></i> Acquirenti <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{route('admin.buyer.index')}}">Elenco degli acquirenti</a></li>
                                </ul>

                            </li>
                            <li ><a><i class="fa fa-calendar"></i> Progressi <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{route('progress.index')}}">Progressi</a></li>
                                </ul>
                            </li>
                            <li ><a href="{{route('admin.ads.index')}}">ADS</a></li>

                            <!--<li><a><i class="fa fa-tasks"></i> Jobs <span class="fa fa-chevron-down"></span></a>-->
                            <!--<ul class="nav child_menu">-->
                            <!--<li><a href="/admin/tasks/my-tasks">My Tasks</a></li>-->
                            <!--<li><a href="/admin/tasks/create">Create</a></li>-->
                            <!--</ul>-->
                            <!--</li>-->

                            <!--<li><a><i class="fa fa-calendar"></i> Reports <span class="fa fa-chevron-down"></span></a>-->
                            <!--<ul class="nav child_menu">-->
                            <!--<li><a href="/admin/reports/calendar">Calendar</a></li>-->
                            <!--<li><a href="/admin/reports/timesheets">Timesheets</a></li>-->
                            <!--</ul>-->
                            <!--</li>-->
                        </ul>
                    </div>

                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <!--<div class="sidebar-footer hidden-small">-->
                <!--<a data-toggle="tooltip" data-placement="top" title="Settings">-->
                <!--<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>-->
                <!--</a>-->
                <!--<a data-toggle="tooltip" data-placement="top" title="FullScreen">-->
                <!--<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>-->
                <!--</a>-->
                <!--<a data-toggle="tooltip" data-placement="top" title="Lock">-->
                <!--<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>-->
                <!--</a>-->
                <!--<a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">-->
                <!--<span class="glyphicon glyphicon-off" aria-hidden="true"></span>-->
                <!--</a>-->
                <!--</div>-->
                <!--&lt;!&ndash; /menu footer buttons &ndash;&gt;-->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="{{route('profile.index')}}"> Profile</a></li>
                                <!--<li>-->
                                <!--<a href="javascript:;">-->
                                <!--<span class="badge bg-red pull-right">50%</span>-->
                                <!--<span>Settings</span>-->
                                <!--</a>-->
                                <!--</li>-->
                                <li><a href="{!! route('changePasswordIndex') !!}">Change Password</a></li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form></li>
                            </ul>
                        </li>

                        <!--<li role="presentation" class="dropdown">-->
                        <!--<a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">-->
                        <!--<i class="fa fa-envelope-o"></i>-->
                        <!--<span class="badge bg-green">6</span>-->
                        <!--</a>-->
                        <!--<ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">-->
                        <!--<li>-->
                        <!--<a>-->
                        <!--<span class="image"><img th:src="@{/images/img.jpg}" alt="Profile Image" /></span>-->
                        <!--<span>-->
                        <!--<span>John Smith</span>-->
                        <!--<span class="time">3 mins ago</span>-->
                        <!--</span>-->
                        <!--<span class="message">-->
                        <!--Film festivals used to be do-or-die moments for movie makers. They were where...-->
                        <!--</span>-->
                        <!--</a>-->
                        <!--</li>-->
                        <!--<li>-->
                        <!--<a>-->
                        <!--<span class="image"><img th:src="@{/images/img.jpg}" alt="Profile Image" /></span>-->
                        <!--<span>-->
                        <!--<span>John Smith</span>-->
                        <!--<span class="time">3 mins ago</span>-->
                        <!--</span>-->
                        <!--<span class="message">-->
                        <!--Film festivals used to be do-or-die moments for movie makers. They were where...-->
                        <!--</span>-->
                        <!--</a>-->
                        <!--</li>-->
                        <!--<li>-->
                        <!--<a>-->
                        <!--<span class="image"><img th:src="@{/images/img.jpg}" alt="Profile Image" /></span>-->
                        <!--<span>-->
                        <!--<span>John Smith</span>-->
                        <!--<span class="time">3 mins ago</span>-->
                        <!--</span>-->
                        <!--<span class="message">-->
                        <!--Film festivals used to be do-or-die moments for movie makers. They were where...-->
                        <!--</span>-->
                        <!--</a>-->
                        <!--</li>-->
                        <!--<li>-->
                        <!--<a>-->
                        <!--<span class="image"><img th:src="@{/images/img.jpg}" alt="Profile Image" /></span>-->
                        <!--<span>-->
                        <!--<span>John Smith</span>-->
                        <!--<span class="time">3 mins ago</span>-->
                        <!--</span>-->
                        <!--<span class="message">-->
                        <!--Film festivals used to be do-or-die moments for movie makers. They were where...-->
                        <!--</span>-->
                        <!--</a>-->
                        <!--</li>-->
                        <!--<li>-->
                        <!--<div class="text-center">-->
                        <!--<a>-->
                        <!--<strong>See All Alerts</strong>-->
                        <!--<i class="fa fa-angle-right"></i>-->
                        <!--</a>-->
                        <!--</div>-->
                        <!--</li>-->
                        <!--</ul>-->
                        <!--</li>-->
                    </ul>
                </nav>
            </div>
        </div>
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
                <button onclick="window.history.back();">Indietro</button>

                <main class="py-4">
                    @yield('content')
                </main>

            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
            <div class="pull-right">

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