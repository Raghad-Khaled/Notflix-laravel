<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    @yield('css')
    <link rel="icon" href="{{ asset('logo.png')}}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo"
                height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{route('movies')}}" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <h3 class="m-auto">
                @yield('title')
            </h3>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>

                <li class="nav-item">
                    <div class="dropdown">
                        <button class="btn btn-ligtht dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         {{Auth::guard('admin')->user()->name}}
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <form method="POST" action="{{ route('admin.logout') }}">
                                @csrf    
                                <button type="submit" class="btn btn-light btn-block" >Log Out</button>
                            </form>
                        </div>
                      </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="data:image/png;base64,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">
                    </div>
                    <div class="info">
                        <a class="d-block">{{Auth::guard('admin')->user()->name}}</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                        <li class="nav-item ">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Actors
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('actors') }}" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Actors</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('actors.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Creat Actor</p>
                                    </a>
                                </li>
                            </ul>
                        </li>


                        <li class="nav-item ">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Directors
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('directors') }}" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Directors</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('directors.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Creat Director</p>
                                    </a>
                                </li>
                            </ul>
                        </li>


                        <li class="nav-item ">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Advertisements
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('advertisements') }}" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Advertisements</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('advertisements.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Creat Advertisement</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item ">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Genres
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('genres') }}" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Genres</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('genres.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Creat Genre</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Prizes
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('prizes') }}" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Prizes</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('prizes.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Creat Prize</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Stories
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('stories') }}" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Stories</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('stories.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Creat Story</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item ">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Companies
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('companies') }}" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Companies</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('companies.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Creat Company</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item ">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Movies
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('movies.index') }}" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Movies</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('movies.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Creat Movie</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item ">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Series
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('series.index') }}" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Series</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('series.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Creat Serie</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item ">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Characters
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('characters') }}" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Characters</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('characters.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Creat Character</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item ">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Prizes for Actors In Movie
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('actorprizemovies') }}" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Prizes for Actor </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('actorprizemovies.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Creat Prize for Actor </p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item ">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Prizes for Actors In Serie
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('actorprizeseries') }}" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Prizes for Actor </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('actorprizeseries.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Creat Prize for Actor </p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item ">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Prizes for Directors In Movies
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('directorprizemovies') }}" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Prizes for Director </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('directorprizemovies.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Creat Prize for Director </p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item ">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Prizes for Directors In Serie
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('directorprizeseries') }}" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Prizes for Director </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('directorprizeseries.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Creat Prize for Director </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">

                    @yield('contant')


                </div>
            </section>
        </div>


        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2022 <a href="{{route('movies')}}">NotFlix</a>.</strong>
            <div class="float-right d-none d-sm-inline-block">
                <b>CMP © 2023</b>
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('plugins/chart.js') }}/Chart.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    @yield('js')
</body>

</html>
