@extends('layouts.parent')

@section('css')
<link rel="stylesheet" href="{{ asset('style/addactor.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/Profile-Card.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/Profile-Edit-Form-1.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/Profile-Edit-Form.css') }}">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
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
                                        @yield('title')</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="p-5">
                                @yield('form')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
    <script src="{{ asset('assets/js/Profile-Edit-Form.js') }}"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
@endsection

