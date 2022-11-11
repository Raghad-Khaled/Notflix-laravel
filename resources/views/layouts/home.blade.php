<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abel">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abhaya+Libre">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abril+Fatface">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aclonica">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Acme">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Actor">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Architects+Daughter">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aref+Ruqaa">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cabin:700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,600,600i,700,700i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700">
    <link rel="stylesheet" href="{{ asset('assets/fonts/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/simple-line-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Button-Icon-Round.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Content-Filter---CodyHouse-No-cutom-Code.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Filter.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/Login-Form-Clean.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/menu-collapse-ultimate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/navBar-1.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/navBar1-1.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Pretty-Footer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Swipe-Slider-9.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/tc-cardhover-14.css') }}">
    <link rel="icon" href="{{ asset('logo.png') }}">
</head>

<body style="background: #21212e; padding-right: 0px">

    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white transparency border-bottom border-light"
        id="transmenu" style="height: 72px; ">
        <div class="container">
            <a class="navbar-brand text-success" href="#header" style="padding-top: 0px;padding-bottom: 0px;">
                <img src="{{ asset('assets/img/5027d5fc-d38c-4aba-ab1c-e41212bf9e10_200x200.png') }}"
                    style="margin-top: 2px;padding-top: 8px;height: 63px;width: 173px;" />
            </a>
            <button data-toggle="collapse" class="navbar-toggler collapsed" data-target="#navcol-1">
                <img src="{{ asset('assets/img/icons8-menu-64.png') }}"
                    style="width: 49px;height: 47px;margin-top: -15px;" />
            </button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <!---------------------------BackEndHere-------------------------------->
                <form action="<?php echo 'Movies.php'; ?>" method="Post">
                    <input type="search"
                        style="border-radius: 24px;width: 238px;height: 34px;border-width: 0px;margin-left: -14px;"
                        name="search_string" />

                    <button class="btn btn-primary d-table-row" type="submit" name="search"
                        style=" background: url({{ asset('assets/img/icons8-search-64.png') }}) center / contain no-repeat, rgba(147,3,3,0) ; 
                 height: 40px; box-shadow:0px 0px 0px 0px">
                    </button>

                </form>
                @if(Auth::guard('web')->user())
                <ul class="nav navbar-nav ml-auto">
                    <!-- <li class="nav-item"><a class="nav-link" href="#" style="color: rgb(251,251,251);"><strong>Series</strong><br /></a></li> -->
                    <li class="nav-item"><a class="nav-link" href="#footer"
                            style="color: rgb(255,255,255);">Contact</a></li>        
                    <li class="nav-item mt-2">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
        
                            <x-responsive-nav-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-responsive-nav-link>
                        </form>
                    </li>
                </ul>
                <a class="d-lg-flex justify-content-lg-center align-items-lg-center" href="{{ route('user.edit') }}"
                    style="margin-top: 0px;margin-left: 21px;">
                    <span>
                        {{ Auth::user()->name }}
                    </span>
                    <img class="border rounded-circle img-profile" src="{{ Auth::user()->image?
                     asset('images/users/'.Auth::user()->image): asset('images/users/'.Auth::user()->gender.'.png') }}"
                        style="width: 50px;margin-left: 5px;" />
                </a>
                @elseif(Auth::guard('admin')->user())
                <ul class="nav navbar-nav ml-auto">
                    <!-- <li class="nav-item"><a class="nav-link" href="#" style="color: rgb(251,251,251);"><strong>Series</strong><br /></a></li> -->
                    <li class="nav-item"><a class="nav-link" href="#footer"
                            style="color: rgb(255,255,255);">Contact</a></li>        
                    <li class="nav-item mt-2">
                        <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf
        
                            <x-responsive-nav-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-responsive-nav-link>
                        </form>
                    </li>
                </ul>
                <a class="d-lg-flex justify-content-lg-center align-items-lg-center" href="{{ route('user.edit') }}"
                    style="margin-top: 0px;margin-left: 21px;">
                    <span>
                        {{Auth::guard('admin')->user()->name }}
                    </span>
                </a>

                @else

                <ul class="nav navbar-nav ml-auto">
                    <!-- <li class="nav-item"><a class="nav-link" href="#" style="color: rgb(251,251,251);"><strong>Series</strong><br /></a></li> -->
                    <li class="nav-item"><a class="nav-link" href="#footer"
                            style="color: rgb(255,255,255);">Contact</a></li>       
                    <li class="nav-item"><a class="nav-link" href="{{route('login')}}"
                        style="color: rgb(255,255,255);">LogIn</a></li>         
                </ul>
                    
                @endif
            </div>
        </div>
    </nav>
    <section id="header"
        style="margin-bottom: 133px;border-radius: 54px;box-shadow: 0px 7px 20px 4px rgba(189,17,250,0.25), 30px -1px 11px #46c2ff; width:100%;">
        <!-- Paradise Slider -->
        <div id="fw_al_007"
            class="carousel ps_rotate_scale_c ps_indicators_l ps_control_rotate_f swipe_x ps_easeOutQuint"
            data-ride="carousel" data-pause="hover" data-interval="5000" data-duration="2000">

            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#fw_al_007" data-slide-to="0" class="active"></li>
                <li data-target="#fw_al_007" data-slide-to="1"></li>
                <li data-target="#fw_al_007" data-slide-to="2"></li>
                <li data-target="#fw_al_007" data-slide-to="3"></li>
                <li data-target="#fw_al_007" data-slide-to="4"></li>
                <li data-target="#fw_al_007" data-slide-to="5"></li>
            </ol>

            <!-- Wrapper For Slides -->
            <div class="carousel-inner" role="listbox">

                <!-- First Slide -->
                <div class="carousel-item active">

                    <!-- Slide Background -->
                    <img src="{{ asset('assets/img/wallpapersden.com_star-wars-dark-side_2560x1440.jpg') }}"
                        alt="fw_al_007_01">

                    <!-- Slide Text Layer -->
                    <div class="fw_al_007_slide">
                        <h3 data-animation="animated flipInX">NOTflix</h3>
                        <h1 data-animation="animated flipInX"><span>FIND</span> Your Interest</h1>
                        <p data-animation="animated flipInX">Of Movies, Series, Novels and More !</p>
                        <a href="#cards" data-animation="animated flipInX">Start Now !</a>
                    </div>
                </div>
                <!-- End of Slide -->

                <!-- Second Slide -->
                <div class="carousel-item">

                    <!-- Slide Background -->
                    <img src="{{ asset('assets/img/30Qm6l.gif') }}" alt="fw_al_007_02">

                    <!-- Slide Text Layer -->
                    <div class="fw_al_007_slide">
                        <h3 data-animation="animated flipInX">NOTflix</h3>
                        <h1 data-animation="animated flipInX"><span>FIND</span> Your Interest</h1>
                        <p data-animation="animated flipInX">Of Movies, Series, Novels and More !</p>
                        <a href="#cards" data-animation="animated flipInX">Start Now !</a>
                    </div>
                </div>
                <!-- End of Slide -->

                <!-- Third Slide -->
                <div class="carousel-item">

                    <!-- Slide Background -->
                    <img src="{{ asset('assets/img/tenor.gif') }}" alt="fw_al_007_03">

                    <!-- Slide Text Layer -->
                    <div class="fw_al_007_slide">
                        <h3 data-animation="animated flipInX">NOTflix</h3>
                        <h1 data-animation="animated flipInX"><span>FIND</span> Your Interest</h1>
                        <p data-animation="animated flipInX">Of Movies, Series, Novels and More !</p>
                        <a href="#cards" data-animation="animated flipInX">Start Now !</a>
                    </div>
                </div>
                <!-- End of Slide -->
                <!-- Fourth Slide -->
                <div class="carousel-item">

                    <!-- Slide Background -->
                    <img src="{{ asset('assets/img/uw0gHLX.jpg') }}" alt="fw_al_007_04">

                    <!-- Slide Text Layer -->
                    <div class="fw_al_007_slide">
                        <h3 data-animation="animated flipInX">NOTflix</h3>
                        <h1 data-animation="animated flipInX"><span>FIND</span> Your Interest</h1>
                        <p data-animation="animated flipInX">Of Movies, Series, Novels and More !</p>
                        <a href="#cards" data-animation="animated flipInX">Start Now !</a>
                    </div>
                </div>
                <!-- End of Slide -->
                <!-- Fifth Slide -->
                <div class="carousel-item">

                    <!-- Slide Background -->
                    <img src="{{ asset('assets/img/joker-joker-2019-movie-joaquin-phoenix-movies-hd-wallpaper-preview.jpg') }}"
                        alt="fw_al_007_05">

                    <!-- Slide Text Layer -->
                    <div class="fw_al_007_slide">
                        <h3 data-animation="animated flipInX">NOTflix</h3>
                        <h1 data-animation="animated flipInX"><span>FIND</span> Your Interest</h1>
                        <p data-animation="animated flipInX">Of Movies, Series, Novels and More !</p>
                        <a href="#cards" data-animation="animated flipInX">Start Now !</a>
                    </div>
                </div>
                <!-- End of Slide -->
                <!-- Sixth Slide -->
                <div class="carousel-item">

                    <!-- Slide Background -->
                    <img src="{{ asset('assets/img/KlutzyFemaleArabianoryx-max-14mb.gif') }}" alt="fw_al_007_06">

                    <!-- Slide Text Layer -->
                    <div class="fw_al_007_slide">
                        <h3 data-animation="animated flipInX">NOTflix</h3>
                        <h1 data-animation="animated flipInX"><span>FIND</span> Your Interest</h1>
                        <p data-animation="animated flipInX">Of Movies, Series, Novels and More !</p>
                        <a href="#cards" data-animation="animated flipInX">Start Now !</a>
                    </div>
                </div>
                <!-- End of Slide -->
                <!-- seventh Slide -->
                <div class="carousel-item">

                    <!-- Slide Background -->
                    <img src="{{ asset('assets/img/13-Reasons-to-watch-13-Reasons-Why-768x514.jpg') }}"
                        alt="fw_al_007_07">

                    <!-- Slide Text Layer -->
                    <div class="fw_al_007_slide">
                        <h3 data-animation="animated flipInX">NOTflix</h3>
                        <h1 data-animation="animated flipInX"><span>FIND</span> Your Interest</h1>
                        <p data-animation="animated flipInX">Of Movies, Series, Novels and More !</p>
                        <a href="#cards" data-animation="animated flipInX">Start Now !</a>
                    </div>
                </div>
                <!-- End of Slide -->
                <!-- eight Slide -->
                <div class="carousel-item">

                    <!-- Slide Background -->
                    <img src="{{ asset('assets/img/Animation.gif') }}" alt="fw_al_007_08">

                    <!-- Slide Text Layer -->
                    <div class="fw_al_007_slide">
                        <h3 data-animation="animated flipInX">NOTflix</h3>
                        <h1 data-animation="animated flipInX"><span>FIND</span> Your Interest</h1>
                        <p data-animation="animated flipInX">Of Movies, Series, Novels and More !</p>
                        <a href="#cards" data-animation="animated flipInX">Start Now !</a>
                    </div>
                </div>
                <!-- End of Slide -->
                <!-- 9th Slide -->
                <div class="carousel-item">

                    <!-- Slide Background -->
                    <img src="{{ asset('assets/img/Friends.gif') }}" alt="fw_al_007_09">

                    <!-- Slide Text Layer -->
                    <div class="fw_al_007_slide">
                        <h3 data-animation="animated flipInX">NOTflix</h3>
                        <h1 data-animation="animated flipInX"><span>FIND</span> Your Interest</h1>
                        <p data-animation="animated flipInX">Of Movies, Series, Novels and More !</p>
                        <a href="#cards" data-animation="animated flipInX">Start Now !</a>
                    </div>
                </div>
                <!-- End of Slide -->
                <!-- 10th Slide -->
                <div class="carousel-item">

                    <!-- Slide Background -->
                    <img src="{{ asset('assets/img/the-nun-movie-4k-fz.jpg') }}" alt="fw_al_007_10">

                    <!-- Slide Text Layer -->
                    <div class="fw_al_007_slide">
                        <h3 data-animation="animated flipInX">NOTflix</h3>
                        <h1 data-animation="animated flipInX"><span>FIND</span> Your Interest</h1>
                        <p data-animation="animated flipInX">Of Movies, Series, Novels and More !</p>
                        <a href="#cards" data-animation="animated flipInX">Start Now !</a>
                    </div>
                </div>
                <!-- End of Slide -->
                <!-- 11th Slide -->
                <div class="carousel-item">

                    <!-- Slide Background -->
                    <img src="{{ asset('assets/img/TheQ.gif') }}" alt="fw_al_007_11">

                    <!-- Slide Text Layer -->
                    <div class="fw_al_007_slide">
                        <h3 data-animation="animated flipInX">NOTflix</h3>
                        <h1 data-animation="animated flipInX"><span>FIND</span> Your Interest</h1>
                        <p data-animation="animated flipInX">Of Movies, Series, Novels and More !</p>
                        <a href="#cards" data-animation="animated flipInX">Start Now !</a>
                    </div>
                </div>
                <!-- End of Slide -->
                <!-- 12th Slide -->
                <div class="carousel-item">

                    <!-- Slide Background -->
                    <img src="{{ asset('assets/img/Nemo.gif') }}" alt="fw_al_007_12">

                    <!-- Slide Text Layer -->
                    <div class="fw_al_007_slide">
                        <h3 data-animation="animated flipInX">NOTflix</h3>
                        <h1 data-animation="animated flipInX"><span>FIND</span> Your Interest</h1>
                        <p data-animation="animated flipInX">Of Movies, Series, Novels and More !</p>
                        <a href="#cards" data-animation="animated flipInX">Start Now !</a>
                    </div>
                </div>
                <!-- End of Slide -->
            </div><!-- End of Wrapper For Slides -->

            <!-- Left Control -->
            <a class="carousel-control-prev" href="#fw_al_007" data-slide="prev">

            </a>
            <!-- Right Control -->
            <a class="carousel-control-next" href="#fw_al_007" data-slide="next">

            </a>
            <!-- End -->
    </section>
    <div style="height: 100px;">
        <div class="cd-tab-filter-wrapper">
            <div class="cd-tab-filter">
                <ul class="cd-filters">
                    <li class="placeholder"><a class="selected" href="#0"
                            data-type="all"><strong>All</strong></a></li>
                    <li class="filter"><a @if(str_contains(Route::current()->getName(),'movies')) class="selected" @endif href="{{route('movies')}}" data-type="all">movies</a>
                    </li>
                    <li class="filter" data-filter=".color-1"><a @if(str_contains(Route::current()->getName(),'series')) class="selected" @endif href="{{route('series')}}"
                            data-type="color-1">Series</a></li>
                </ul>
            </div>
        </div>
    </div>

    @yield('contant')
    @extends('layouts.footer')
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('assets/js/moviesContainer.js') }}"></script>
    <script src="{{ asset('assets/js/animatedNav.js') }}"></script>
    <script src="{{ asset('assets/js/moviesContainer-1.js') }}"></script>
    <script src="{{ asset('assets/js/navBar-1-1.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="{{ asset('assets/js/navBar-1-2.js') }}"></script>
    <script src="{{ asset('assets/js/navBar-1.js') }}"></script>
    <script src="{{ asset('assets/js/Swipe-Slider-9.js') }}"></script>
    <script src="{{ asset('assets/js/user.js') }}"></script>
</body>

</html>
