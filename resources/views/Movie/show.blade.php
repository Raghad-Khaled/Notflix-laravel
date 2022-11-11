@extends('layouts.page')

@section('title', $movie['name'])

@section('contant')
    <div class="block-content"
        style="background: rgb(33,33,46);box-shadow: 0px 0px 60px rgb(45,45,68); padding:20px; margin-bottom: 35px;">
        <div class="product-info">
            <div class="row">
                <div class="col-md-6">
                    <div class="gallery"
                        style="background: rgba(135,73,237,0.32);box-shadow: inset 0px 0px 17px #af5eee;border-radius: 6px; padding:20px;">
                        <a href="{{ $movie['link'] }}"><img src="{{ asset('images/movies/' . $movie['image']) }}"
                                style="width: 100%;height: 100%;"></a>
                    </div>
                    <div style="margin-top: 22px;">
                        <h3
                            style="font-family: 'Balsamiq Sans', cursive;font-size: 30px;margin-bottom: 10px;color: #8749ed;">
                            Movie Rate</h3>
                        <div class="d-inline-flex d-lg-flex align-items-lg-center"><span
                                style="font-family: 'Architects Daughter', cursive;font-size: 24px;">IMDB:&nbsp;</span>
                            <div class="rating" style="width: 402px;margin-left: 27px;">
                                <!-------------Rate Stars------------------------------------------------------------------------------->
                                @for ($i = $movie['imdb_rate']; $i >= 2; $i -= 2)
                                    <img data-aos="flip-left" data-aos-delay="200" src="{{ asset('assets/img/star.svg') }}"
                                        style="width: 19px;">
                                @endfor
                                @if ($movie['imdb_rate'] % 2 == 1)
                                    <img data-aos="flip-left" data-aos-delay="200"
                                        src="{{ asset('assets/img/star-half-empty.svg') }}" style="width: 19px;">
                                @endif
                                @for ($i = 10 - $movie['imdb_rate']; $i >= 2; $i -= 2)
                                    <img data-aos="flip-left" data-aos-delay="200"
                                        src="{{ asset('assets/img/star-empty.svg') }}" style="width: 19px;">
                                @endfor
                                <!------------------------------------------------------------------------------------------------------>

                            </div>


                        </div>
                        <div class="d-inline-flex d-lg-flex align-items-lg-center"><span
                                style="font-family: 'Architects Daughter', cursive;font-size: 24px;">IMDB
                                Rate Count:&nbsp;</span>
                            <div>
                                <!-------------Rate COUNT------------------------------------------------------------------------------->
                                <span
                                    style="font-family: 'Architects Daughter', cursive;font-size: 22px;color: #8749ed;">{{ $movie['imdb_rate_count'] }}&nbsp;</span>
                                <!------------------------------------------------------------------------------------------------------>

                            </div>


                        </div>

                        <div class="d-inline-flex d-lg-flex align-items-lg-center"><span
                                style="font-family: 'Architects Daughter', cursive;font-size: 24px;">Notflix
                                Rate Count:&nbsp;</span>
                            <div>
                                <!-------------Rate COUNT------------------------------------------------------------------------------->
                                <span
                                    style="font-family: 'Architects Daughter', cursive;font-size: 22px;color: #8749ed;">{{ count($movie->rates) }}&nbsp;</span>
                                <!------------------------------------------------------------------------------------------------------>

                            </div>


                        </div>
                    </div>
                    @if (!Auth::guard('admin')->user())
                        <div>
                            <h3
                                style="margin-top: 10px;font-family: 'Balsamiq Sans', cursive;font-size: 30px;margin-bottom: 10px;color: #8749ed;">
                                Rate This Movie</h3>
                            <form method="POST" action="{{ route('movies.rate', $movie['id']) }}">
                                @csrf
                                <div class="d-inline-flex"><input type="number" value="{{ $rate ? $rate->rate : 0 }}"
                                        min="0" max="10" name="rate" style="width: 123px;">
                                    <button style="background-color:#21212e; box-shadow: 0px; border-width: 0px"
                                        type="submit" name="submit"><img data-bs-hover-animate="swing"
                                            src="{{ asset('assets/img/star.svg') }}"
                                            style="width: 26px;margin-left: 20px;"></button>
                                </div>
                            </form>
                        </div>
                    @endif
                </div>
                <div class="col-md-6">
                    <div class="info">
                        <!----------------- title -->
                        <h4 style="font-family: Acme, sans-serif;font-size: 32px;">{{ $movie['name'] }}
                            @if (!Auth::guard('admin')->user())
                                @if (Auth::user() && $fav == 1)
                                    <a href="{{ route('movies.removefromfav', $movie['id']) }}"><img
                                            data-bs-hover-animate="tada" src="{{ asset('assets/img/star.svg') }}"
                                            style="width: 35px;margin-left: 14px;"></a>
                                @else
                                    <a href="{{ route('movies.addtofav', $movie['id']) }}"><img data-bs-hover-animate="tada"
                                            src="{{ asset('assets/img/star-empty.svg') }}"
                                            style="width: 35px;margin-left: 14px;"></a>
                                @endif
                            @endif
                        </h4>
                        <div class="rating" style="margin-left: 18px;padding-bottom: 10px;">
                            @for ($i = $movie['imdb_rate']; $i >= 2; $i -= 2)
                                <img data-aos="flip-left" data-aos-delay="200" src="{{ asset('assets/img/star.svg') }}"
                                    style="width: 19px;">
                            @endfor
                            @if ($movie['imdb_rate'] % 2 == 1)
                                <img data-aos="flip-left" data-aos-delay="200"
                                    src="{{ asset('assets/img/star-half-empty.svg') }}" style="width: 19px;">
                            @endif
                            @for ($i = 10 - $movie['imdb_rate']; $i >= 2; $i -= 2)
                                <img data-aos="flip-left" data-aos-delay="200"
                                    src="{{ asset('assets/img/star-empty.svg') }}" style="width: 19px;">
                            @endfor
                        </div>
                        <div style="border-style: none;border-bottom: 1px solid rgba(120,17,250,0.42) ;">
                            <!---------------------- Genre -->
                            <h4
                                style="border-bottom: 1px none rgb(229,229,229);font-family: 'Balsamiq Sans', cursive;font-size: 28px;color: #8749ed;">
                                Genre</h4>

                            @foreach ($movie->genres as $genre)
                                <p class="text-left"
                                    style="margin-bottom: 10px;margin-top: 10px;margin-left: 18px;color: rgba(255,255,255,0.97);font-size: 16px;font-family: Nunito, sans-serif;">
                                    {{ $genre['type'] }}</p>
                            @endforeach
                        </div>
                        <div style="border-style: none;border-bottom: 1px solid rgba(120,17,250,0.42) ;">
                            <!------------------- Year of release -->
                            <h4
                                style="border-bottom: 1px none rgb(229,229,229);font-family: 'Balsamiq Sans', cursive;font-size: 28px;color: #8749ed;margin-top: 10px;">
                                Year of release</h4>
                            <p class="text-left"
                                style="margin-bottom: 10px;margin-top: 16px;margin-left: 18px;color: rgba(255,255,255,0.97);font-size: 16px;font-family: Nunito, sans-serif;">
                                {{ $movie['year'] }}</p>
                        </div>
                        <div style="border-style: none;border-bottom: 1px solid rgba(120,17,250,0.42) ;">
                            <!---------------------- Production Company -->
                            <h4
                                style="border-bottom: 1px none rgb(229,229,229);font-family: 'Balsamiq Sans', cursive;font-size: 28px;color: #8749ed;margin-top: 10px;">
                                Production Company</h4>

                            @foreach ($movie->companies as $company)
                                <p class="text-left"
                                    style="margin-bottom: 10px;margin-top: 16px;margin-left: 18px;color: rgba(255,255,255,0.97);font-size: 16px;font-family: Nunito, sans-serif;">
                                    {{ $company['name'] }} founded in
                                    {{ $company['found_year'] }}</p>
                            @endforeach
                        </div>
                        <div style="border-style: none;border-bottom: 1px solid rgba(120,17,250,0.42) ;">
                            <!------------------------- Duration -->
                            <h4
                                style="border-bottom: 1px none rgb(229,229,229);font-family: 'Balsamiq Sans', cursive;font-size: 28px;color: #8749ed;margin-top: 10px;">
                                Duration</h4>
                            <p class="text-left"
                                style="margin-bottom: 10px;margin-top: 16px;margin-left: 18px;color: rgba(255,255,255,0.97);font-size: 16px;font-family: Nunito, sans-serif;">
                                {{ $movie['duration'] }}</p>
                        </div>
                        <div style="border-style: none;border-bottom: 1px solid rgba(120,17,250,0.42) ;">
                            <!--------------------------- Language -->
                            <h4
                                style="border-bottom: 1px none rgb(229,229,229);font-family: 'Balsamiq Sans', cursive;font-size: 28px;color: #8749ed;margin-top: 10px;">
                                Language</h4>
                            <p class="text-left"
                                style="margin-bottom: 10px;margin-top: 16px;margin-left: 18px;color: rgba(255,255,255,0.97);font-size: 16px;font-family: Nunito, sans-serif;">
                                {{ $movie['language'] }}</p>
                        </div>

                        <div style="border-style: none;border-bottom: 1px solid rgba(120,17,250,0.42) ;">
                            <!--------------------------- Budget -->
                            <h4
                                style="border-bottom: 1px none rgb(229,229,229);font-family: 'Balsamiq Sans', cursive;font-size: 28px;color: #8749ed;margin-top: 10px;">
                                Budget</h4>
                            <p class="text-left"
                                style="margin-bottom: 10px;margin-top: 16px;margin-left: 18px;color: rgba(255,255,255,0.97);font-size: 16px;font-family: Nunito, sans-serif;">
                                {{ $movie['budget'] }} $</p>
                        </div>
                        <div style="border-style: none;border-bottom: 1px solid rgba(120,17,250,0.42) ;">
                            <!----------------------------- Revenue -->
                            <h4
                                style="border-bottom: 1px none rgb(229,229,229);font-family: 'Balsamiq Sans', cursive;font-size: 28px;color: #8749ed;margin-top: 10px;">
                                Revenue</h4>
                            <p class="text-left"
                                style="margin-bottom: 10px;margin-top: 16px;margin-left: 18px;color: rgba(255,255,255,0.97);font-size: 16px;font-family: Nunito, sans-serif;">
                                {{ $movie['revenue'] }} $</p>
                        </div>
                        <div>
                            <h4
                                style="margin-top: 22px;font-family: 'Balsamiq Sans', cursive;font-size: 28px;color: #8749ed;">
                                Story Line</h4>
                        </div>
                        <!------------------------- discription -->
                        <div class="summary">
                            <p
                                style="margin-left: 18px;color: rgba(255,255,255,0.97);font-size: 16px;margin-bottom: 16px;font-family: Nunito, sans-serif;">
                                {{ $movie['description'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if ($movie->director['id'])
            <div class="product-info">
                <div style="border-style: none;padding-right: 50px;padding-left: 50px;">
                    <h2
                        style="font-size: 42px;font-family: Acme, sans-serif;margin-bottom: 20px;border-bottom: 1px solid #46c2ff;padding-bottom: 10px;padding-top: 10px;">
                        Director</h2>
                    <div class="row d-xl-flex">
                        <div class="col-md-5" style="width: 239px;">
                            <!--------------------------- Director -->
                            <figure class="figure" style="width: 241px;"><a
                                    href="{{ route('directors.show', $movie->director['id']) }}"><img class="figure-img"
                                        src="{{ asset('images/directors/' . $movie->director['image']) }}"
                                        style="width: 100%;height: 100%;box-shadow: 0px 0px 11px rgba(70,194,255,0.77), 0px 0px 12px #bd11fa;"></a>
                            </figure>
                        </div>
                        <div class="col-md-7 d-lg-flex m-auto align-items-lg-center justify-content-xl-start">
                            <a href="{{ route('directors.show', $movie->director['id']) }}">
                                <h4 style="font-size: 34px;font-family: 'Chelsea Market', cursive;margin-top: 0px;">
                                    {{ $movie->director['first_name'] }} {{ $movie->director['last_name'] }}</h4>
                            </a>
                        </div>
                    </div>
                </div>
        @endif
        @if (count($movie->actors) > 0)
            <div class="row" style="padding-right: 50px;padding-left: 50px;">
                <div class="col">
                    <div style="margin-top: 22px;">
                        <h2
                            style="font-size: 42px;font-family: Acme, sans-serif;border-bottom: 1px solid #46c2ff;padding-bottom: 10px;padding-top: 10px;">
                            Cast</h2>
                        <!---------------------------------- actors  -->
                        <div class="row no-gutters row-cols-3 justify-content-center align-items-center"
                            style="  padding: 0px;
                                        margin-top: 25px;
                                        ">
                            <!--------------Repeat this---->
                            @foreach ($movie->actors as $actor)
                                <div class="col">
                                    <div class="justify-content-center spacer-slider" data-bs-hover-animate="pulse">
                                        <figure class="figure" style="  width: 100%;"><a
                                                href="{{ route('actors.show', $actor['id']) }}"><img class="figure-img"
                                                    src="{{ asset('images/actors/' . $actor['image']) }}"
                                                    style="  width: 100%;" /></a>
                                            <figcaption class="figure-caption" style="  font-size: 16px;">
                                                <span> {{ $actor['first_name'] }}
                                                    {{ $actor['last_name'] }}
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
        @if (isset($movie->story))
            <div class="m-auto" style="margin-left: 40px;padding-right: 50px;padding-left: 50px;">
                <h2
                    style="margin-top: 18px;font-size: 42px;font-family: Acme, sans-serif;border-bottom: 1px solid #46c2ff;padding-bottom: 10px;padding-top: 10px;">
                    Story Book</h2>
                <div class="row" style="margin-top: 41px;">
                    <div class="col-md-5">
                        <figure class="figure"
                            style="box-shadow: 0px 0px 17px 2px rgba(70,194,255,0.48), 0px 0px 14px #bd11fa;">
                            <a href="{{ route('stories.show', $movie->story['id']) }}">
                                <img class="figure-img" src="{{ asset('images/stories/' . $movie->story['image']) }}"
                                    style="width: 100%;height: 100%;"></a>
                        </figure>
                    </div>
                    <!------------------------------------ story -->

                    <div
                        class="col-md-7 d-lg-flex d-xl-flex align-items-lg-center justify-content-xl-start align-items-xl-center">
                        <a href="{{ route('stories.show', $movie->story['id']) }}">
                            <h4 style="font-size: 34px;font-family: 'Chelsea Market', cursive;margin-left: 19px;">
                                {{ $movie->story['title'] }}</h4>
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </div>
    </div>

@endsection
