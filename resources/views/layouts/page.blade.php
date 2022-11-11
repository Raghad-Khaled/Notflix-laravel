<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title> @yield('title') </title>
    @yield('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aclonica">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Acme">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alatsi">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amarante">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amaranth">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Architects+Daughter">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Balsamiq+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Biryani">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Chelsea+Market">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="{{ asset('assets/css/FontAwesome.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:400,600,800">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700">
    <link rel="stylesheet" href="{{ asset('assets/css/--mp---Multiple-items-slider-responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/-Filterable-Gallery-with-Lightbox-BS4-.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/3D-SLIDER-1.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/3D-SLIDER.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/carddd.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js')}}/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js')}}/1.1.0/magnific-popup.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/css/swiper.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/Media-Slider-Bootstrap-3-1.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Media-Slider-Bootstrap-3.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/MUSA_carousel-product-cart-slider-1.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/MUSA_carousel-product-cart-slider.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Notflixfooter.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Responsive-News-Card-Slider-1.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Responsive-News-Card-Slider.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Review-rating-Star-Review-Button-1.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Review-rating-Star-Review-Button.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/ReviewCard.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Slider_Carousel_webalgustocom-1.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Slider_Carousel_webalgustocom-2.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Slider_Carousel_webalgustocom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/smoothproducts.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Swiper-Slider-1.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Swiper-Slider-Card-For-Blog-Or-Product-1.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Swiper-Slider-Card-For-Blog-Or-Product.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Swiper-Slider.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Testimonial-Slider-9-1.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Testimonial-Slider-9.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/untitled.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/User-Rating-F19690.css') }}">
    <link rel="icon" href="{{ asset('logo.png') }}">
</head>

<body style="background: linear-gradient(#bd11fa, #46c2ff);">
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar"
        style="padding: 4px;filter: hue-rotate(9deg); height: 67px">
        <div class="container"><a class="navbar-brand logo" data-aos="flip-left" data-aos-duration="1450"
                href="{{ route('movies') }}"
                style="color: rgba(255,255,255,0.9);font-family: Acme, sans-serif;font-size: 28px;padding-top: 0px;padding-bottom: 0px;"><img
                    src="{{ asset('assets/img/5027d5fc-d38c-4aba-ab1c-e41212bf9e10_200x200.png') }}"
                    style="margin-top: -1px;padding-top: 13px; height: 60px"></a>
            <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><img
                    src="{{ asset('assets/img/icons8-menu-64.png') }}" style="height: 50px"></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" style="font-size: 16px;"><a href="{{ route('movies') }}"
                            class="nav-link active"
                            style="color: rgba(255,255,255,0.9);font-family: Acme, sans-serif;font-size: 18px;">Home</a>
                    </li>
                    <li class="nav-item"><a href="#footer" class="nav-link active" href="#footer"
                            style="color: rgba(255,255,255,0.9);font-family: Acme, sans-serif;font-size: 18px;">Contact</a>
                    </li>
                    @if (Auth::user())
                        <li class="nav-item mt-2"
                            style="color: rgba(255,255,255,0.9);font-family: Acme, sans-serif;font-size: 18px;">
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
                <a class="d-flex justify-content-lg-center align-items-lg-center" href="{{ route('user.edit') }}"
                    style="margin-top: 0px;margin-left: 0px;"><span class="d-flex align-items-center"
                        style="font-family: Acme, sans-serif;font-size: 18px;">{{ Auth::user()->name }}<img
                            class="border rounded-circle img-profile"
                            src="{{ Auth::user()->image
                                ? asset('images/users/' . Auth::user()->image)
                                : asset('images/users/' . Auth::user()->gender . '.png') }}"
                            style="width: 50px;margin-left: 5px;"></span>
                </a>
            @elseif(Auth::guard('admin')->user())
                <li class="nav-item mt-2"
                    style="color: rgba(255,255,255,0.9);font-family: Acme, sans-serif;font-size: 18px;">
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('admin.logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </li>
                <a class="d-flex justify-content-lg-center align-items-lg-center"
                    style="margin-top: 0px;margin-left: 0px;">
                    <span class="d-flex align-items-center"
                        style="font-family: Acme, sans-serif;font-size: 18px;">{{ Auth::guard('admin')->user()->name }}</span>
                </a>
            @else
                <li class="nav-item"><a class="nav-link active" href="{{ route('login') }}"
                        style="color: rgba(255,255,255,0.9);font-family: Acme, sans-serif;font-size: 18px;">LogIn</a>
                </li>
                @endif
            </div>
        </div>
    </nav>
    <main class="page product-page" style="color: rgb(255,255,255);font-size: 24px;">
        <section class="clean-block clean-product dark" style="background: linear-gradient(#bd11fa, #46c2ff);">
            <div class="container">
                <div class="d-xl-flex justify-content-xl-center align-items-xl-center block-heading"><button
                        class="btn btn-primary text-center d-xl-flex justify-content-xl-center align-items-xl-center"
                        data-bs-hover-animate="pulse" type="button"
                        style="height: 104px;border-radius: 584px;background: rgb(33,33,46);box-shadow: 0px 0px 20px rgb(33,33,46);border-width: 0px;border-bottom: 0px none rgba(0,123,255,0);margin-bottom: 35px; margin-top: 100px;"><a
                            href="{{ route('movies') }}"><img
                                src="{{ asset('assets/img/5027d5fc-d38c-4aba-ab1c-e41212bf9e10_200x200.png') }}"
                                style="margin-top: 11px;filter: hue-rotate(17deg);"></a></button></div>

                @yield('contant')
            </div>
        </section>
    </main>
    @extends('layouts.footer')
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
    <script src="{{ asset('assets/js/bs-init.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('assets/js/smoothproducts.min.js') }}"></script>
    <script src="{{ asset('assets/js/-Filterable-Gallery-with-Lightbox-BS4-.js') }}"></script>
    <script src="{{ asset('assets/js/carddd.js') }}"></script>
    <script src="{{ asset('assets/js/theme.js') }}"></script>
    <script src="{{ asset('assets/js/--mp---Multiple-items-slider-responsive-1.js') }}"></script>
    <script src="{{ asset('assets/js/--mp---Multiple-items-slider-responsive.js') }}"></script>
    <script src="{{ asset('assets/js/3D-SLIDER-1.js') }}"></script>
    <script src="{{ asset('assets/js/3D-SLIDER-2.js') }}"></script>
    <script src="{{ asset('assets/js/3D-SLIDER-3.js') }}"></script>
    <script src="{{ asset('assets/js/3D-SLIDER-4.js') }}"></script>
    <script src="{{ asset('assets/js/3D-SLIDER-5.js') }}"></script>
    <script src="{{ asset('assets/js/3D-SLIDER.js') }}"></script>
    <script src="{{ asset('assets/js/carddd-1.js') }}"></script>
    <script src="{{ asset('assets/js/carddd-2.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/js/swiper.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/js/swiper.min.js"></script>
    <script src="{{ asset('assets/js/Media-Slider-Bootstrap-3.js') }}"></script>
    <script src="{{ asset('assets/js/Responsive-News-Card-Slider.js') }}"></script>
    <script src="{{ asset('assets/js/Review-rating-Star-Review-Button.js') }}"></script>
    <script src="{{ asset('assets/js/Slider_Carousel_webalgustocom.js') }}"></script>
    <script src="{{ asset('assets/js/Swiper-Slider-Card-For-Blog-Or-Product.js') }}"></script>
    <script src="{{ asset('assets/js/Swiper-Slider.js') }}"></script>
    @yield('js')
</body>

</html>
