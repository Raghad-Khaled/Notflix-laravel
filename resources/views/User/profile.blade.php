@extends('layouts.page')

@section('title', 'Update Profile')

@section('css')

    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('style/addactor.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Profile-Card.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Profile-Edit-Form-1.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Profile-Edit-Form.css') }}">
@endsection

@section('contant')
    <div class="container">
        <div class="row justify-content-center" style="margin-top: 4px;box-shadow: 0px 0px;">
            <div class="col-md-9 col-lg-12 col-xl-10" style="box-shadow: 0px 0px;">
                <div class="card shadow-lg o-hidden border-0 my-5"
                    style="background: rgb(33,33,46);box-shadow: inset 0px 0px 0px;">
                    <div class="card-body p-0" style="box-shadow: inset 0px 0px 20px 3px #5f6ef8;">
                        <div class="row" style="box-shadow: 0px 0px;">
                            <div class="col-lg-4 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-login-image"
                                    style="background: url({{ asset('assets/img/img.png') }}) center / cover no-repeat;box-shadow: 0px 0px;">
                                    <div style="margin-top: 2px;">
                                        <h1 class="d-lg-flex justify-content-lg-center" data-aos="flip-left"
                                            style="margin-top: 75px;background: rgb(33,33,46);border-radius: 54px;width: 400px;margin-left: 60px;color: rgb(123,105,243);padding-top: 8px;border-style: dotted;border-color: rgb(149,70,246);font-size: 30px;box-shadow: inset 0px 0px 3px;font-family: 'Bungee Inline', cursive;padding-bottom: 8px;">
                                            Update Profile</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="p-5">

                                    <form class="mt-5" method="POST" action="{{ route('user.update') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('put')

                                        <div class="p-3" style="color:white">


                                            <div class="avatar" style="margin-top: -10px;">
                                                <div class="avatar-bg center"
                                                    style="margin-bottom: 12px;border-style: none;box-shadow: 0px 0px 10px rgb(47,168,255); background:
                                                @if (Auth::user()->image) url({{ asset('images/users/' . Auth::user()->image) }}); 
                                                @else
                                                 url({{ asset('images/users/' . Auth::user()->gender . '.png') }}); @endif
                                                background-size: cover;">
                                                </div>

                                                <div class="text-center">
                                                    <h1 class="pulse animated"
                                                        style="color: rgb(143,85,251);font-family: 'Caveat Brush', cursive;margin-top: 4px;margin-bottom: 12px;">
                                                        {{ Auth::user()->name }}</h1>
                                                </div>

                                                <input class="d-lg-flex align-items-lg-center form-control" type="file"
                                                    data-aos="zoom-in-right" name="image"
                                                    style="padding-top: 4px;padding-right: 0px;padding-left: 7px;padding-bottom: 1px;color: var(--secondary);background: rgba(255,255,255,0);border-radius: 6px;box-shadow: inset 0px 0px 5px 0px rgb(124,106,246);margin-bottom: 2px;height: 40px;border: 1.5px dashed rgb(91,103,194);margin-top: 7px;">
                                                @error('image')
                                                    <div class="alert alert-danger w-100" role="alert">
                                                        {{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label style="margin-left: 12px;margin-bottom: 0px;">Name&nbsp;</label>
                                                <input class="form-control form-control-user" type="text"
                                                    data-aos="zoom-in-left" name="name" placeholder="Name"
                                                    value="{{ Auth::user()->name }}"
                                                    style="box-shadow: 0px 0px 12px #6f58fe;">
                                                @error('name')
                                                    <div class="alert alert-danger w-100" role="alert">
                                                        {{ $message }}</div>
                                                @enderror
                                            </div>


                                            <div class="form-group">
                                                <label style="margin-left: 12px;margin-bottom: 0px;">Email&nbsp;</label>
                                                <input class="form-control form-control-user" type="email"
                                                    data-aos="zoom-in-left" id="exampleInputEmail"
                                                    aria-describedby="emailHelp" name="email" inputmode="email" disabled
                                                    placeholder="Enter New Email Address" value="{{ Auth::user()->email }}"
                                                    style="box-shadow: 0px 0px 12px #6f58fe;">
                                            </div>

                                            <div class="form-group">
                                                <label style="margin-left: 12px;margin-bottom: 0px;">Gender&nbsp;</label>
                                                <input class="form-control form-control-user" type="email"
                                                    data-aos="zoom-in-left" id="exampleInputEmail"
                                                    aria-describedby="emailHelp" name="email" inputmode="email" disabled
                                                    placeholder="Enter New Email Address"
                                                    value="{{ Auth::user()->gender == 'm' ? 'Male' : 'Female' }}"
                                                    style="box-shadow: 0px 0px 12px #6f58fe;">
                                            </div>
                                        </div>
                                        <button class="btn btn-primary btn-lg btn-block text-white btn-user"
                                            data-bs-hover-animate="pulse" type="submit" name="Save_Information"
                                            style="background: rgb(149,70,246);box-shadow: 0px 0px 12px #6f58fe;border-width: 0;">Save
                                            Information</button>
                                        <hr style="margin-bottom: 0px;">
                                    </form>

                                </div>
                            </div>
                            @if (count(Auth::user()->favMovies) > 0)
                                <div class="row" style="padding-right: 50px;padding-left: 50px;">
                                    <div class="col">
                                        <div style="margin-top: 22px;">
                                            <h2
                                                style="font-family: Acme, sans-serif;border-bottom: 1px solid #46c2ff;padding-bottom: 10px;padding-top: 10px;">
                                                Your Favorite Movies</h2>
                                            <!---------------------------------- actors  -->
                                            <div class="row no-gutters row-cols-2 justify-content-center align-items-center"
                                                style="  padding: 0px;
                                                    margin-top: 25px;
                                                    ">
                                                <!--------------Repeat this---->
                                                @foreach (Auth::user()->favMovies as $movie)
                                                    <div class="col-lg-3">
                                                        <div class="justify-content-center spacer-slider"
                                                            data-bs-hover-animate="pulse">
                                                            <figure class="figure" style="  width: 100%;"><a
                                                                    href="{{ route('movies.show', $movie['id']) }}"><img
                                                                        class="figure-img"
                                                                        src="{{ asset('images/movies/' . $movie['image']) }}"
                                                                        style="  width: 100%;" /></a>
                                                                <figcaption class="figure-caption"
                                                                    style="  font-size: 16px;">
                                                                    <span> {{ $movie['name'] }}
                                                                    </span>
                                                                </figcaption>
                                                            </figure>

                                                        </div>

                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if (count(Auth::user()->favSeries) > 0)
                            <div class="row" style="padding-right: 50px;padding-left: 50px;">
                                <div class="col">
                                    <div style="margin-top: 22px;">
                                        <h2
                                            style="font-family: Acme, sans-serif;border-bottom: 1px solid #46c2ff;padding-bottom: 10px;padding-top: 10px;">
                                            Your Favorite Series</h2>
                                        <!---------------------------------- actors  -->
                                        <div class="row no-gutters row-cols-2 justify-content-center align-items-center"
                                            style="  padding: 0px;
                                                margin-top: 25px;
                                                ">
                                            <!--------------Repeat this---->
                                            @foreach (Auth::user()->favSeries as $serie)
                                                <div class="col-lg-3">
                                                    <div class="justify-content-center spacer-slider"
                                                        data-bs-hover-animate="pulse">
                                                        <figure class="figure" style="  width: 100%;"><a
                                                                href="{{ route('series.show', $serie['id']) }}"><img
                                                                    class="figure-img"
                                                                    src="{{ asset('images/series/' . $serie['image']) }}"
                                                                    style="  width: 100%;" /></a>
                                                            <figcaption class="figure-caption"
                                                                style="  font-size: 16px;">
                                                                <span> {{ $serie['name'] }}
                                                                </span>
                                                            </figcaption>
                                                        </figure>

                                                    </div>

                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('js')


    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/Profile-Edit-Form.js') }}"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

@endsection
