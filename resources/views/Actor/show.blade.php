@extends('layouts.page')

@section('title', $actor['first_name'])

@section('contant')
    <div class="block-content"
        style="background: rgb(33,33,46);box-shadow: 0px 0px 60px rgb(45,45,68); padding:20px; margin-bottom: 35px;">
        <div class="product-info">
            <div class="row">
                <div class="col-md-6">
                    <div class="gallery"
                        style="background: rgba(135,73,237,0.32);box-shadow: inset 0px 0px 17px #af5eee;border-radius: 6px; padding:20px;">
                        <img src="{{ asset('images/actors/' . $actor['image']) }}" style="width: 100%;height: 100%;">
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="info">
                        <h4 style="font-family: Acme, sans-serif;font-size: 32px; margin-bottom: 30px">
                            {{ $actor['first_name'] }} {{ $actor['last_name'] }}</h4>
                        <div>
                            <h4
                                style="margin-top: 22px;font-family: 'Balsamiq Sans', cursive;font-size: 28px;color: #8749ed; margin-left: 15px">
                                Birth Date</h4>
                        </div>
                        <div class="summary">
                            <p
                                style="margin-left: 22px;color: rgba(255,255,255,0.97);font-size: 16px;margin-bottom: 16px;font-family: Nunito, sans-serif;">
                                {{ $actor['birth_date'] }}
                            </p>
                        </div>

                        <div>
                            <h4
                                style="margin-top: 22px;font-family: 'Balsamiq Sans', cursive;font-size: 28px;color: #8749ed; margin-left: 15px">
                                Nomber of movies</h4>
                        </div>
                        <div class="summary">
                            <p
                                style="margin-left: 22px;color: rgba(255,255,255,0.97);font-size: 16px;margin-bottom: 16px;font-family: Nunito, sans-serif;">
                                {{count($actor->movies)}} movies
                            </p>
                        </div>

                        <div>
                            <h4
                                style="margin-top: 22px;font-family: 'Balsamiq Sans', cursive;font-size: 28px;color: #8749ed; margin-left: 15px">
                                Nomber of Series</h4>
                        </div>
                        <div class="summary">
                            <p
                                style="margin-left: 22px;color: rgba(255,255,255,0.97);font-size: 16px;margin-bottom: 16px;font-family: Nunito, sans-serif;">
                                {{count($actor->series)}} series
                            </p>
                        </div>


                        @if (count($prizesseries) > 0 || count($prizesmovies) > 0)
                            <div>
                                <h4
                                    style="margin-top: 22px;font-family: 'Balsamiq Sans', cursive;font-size: 28px;color: #8749ed; margin-left: 15px">
                                    Awards</h4>
                            </div>
                            <div class="summary">
                                <p
                                    style="margin-left: 22px;color: rgba(255,255,255,0.97);font-size: 16px;margin-bottom: 16px;font-family: Nunito, sans-serif;">
                                    @foreach ($prizesseries as $prize)
                                        {{ $prize['type'] }} {{ $prize['title'] }} In <a
                                            href="{{ route('series.show', $prize['id']) }}"
                                            style="color: #9f70eb; font-size: 20px;">{{ $prize['name'] }}</a>
                                        {{ $prize['year'] }}
                                        <br>
                                    @endforeach

                                    @foreach ($prizesmovies as $prize)
                                        {{ $prize['type'] }} {{ $prize['title'] }} In <a
                                            href="{{ route('movies.show', $prize['id']) }}"
                                            style="color: #9f70eb; font-size: 20px;">{{ $prize['name'] }}</a>
                                        {{ $prize['year'] }}
                                        <br>
                                    @endforeach


                                </p>
                            </div>
                        @endif


                        <!-- Advertisement Card-->
                        <div class="card" style="margin-top: 10px; margin-left:60px; height: 100%;width: 80%;">
                            <div class="card-body" style="height: 100%; width: 100%;"><img
                                    style="height: 100%; width: 100%;"
                                    src="{{ asset('images/advertisements/' . $advertisement['image']) }}"
                                    style="width: 100%;"></div>
                        </div>
                        <!---------------------->
                    </div>
                </div>
            </div>
        </div>
        <div class="product-info">
            <!------------------------------------------------------------------------------------------------------------------>
            <div class="row" style="padding-right: 50px;padding-left: 50px;">
                <div class="col">
                    <div style="margin-top: 22px;">
                        <h2
                            style="font-size: 42px;font-family: Acme, sans-serif;border-bottom: 1px solid #46c2ff;padding-bottom: 10px;padding-top: 10px;">
                            Movies And Series</h2>
                        <div class="row no-gutters row-cols-3 justify-content-center align-items-center"
                            style="  padding: 0px;margin-top: 25px;">
                            <!--------------Repeat this---->
                            @foreach ($actor->movies as $movie)
                                <div class="col">

                                    <div class="justify-content-center spacer-slider">
                                        <figure class="figure" style="  width: 100%;"><a
                                                href="{{ route('movies.show', $movie['id']) }}">
                                                <img class="figure-img"
                                                    src="{{ asset('images/movies/' . $movie['image']) }}"
                                                    style="  width: 100%;" /> </a>
                                            <figcaption class="figure-caption" style="  font-size: 12px;">
                                                {{ $movie['name'] }}</figcaption>
                                        </figure>

                                    </div>

                                </div>
                            @endforeach
                            <!----------------------------------->
                            <!--------------Repeat this--FOR series this time-->
                            @foreach ($actor->series as $serie)
                                <div class="col">
                                    <div class="justify-content-center spacer-slider">
                                        <figure class="figure" style="  width: 100%;">
                                            <a href="{{ route('series.show', $movie['id']) }}">
                                                <img class="figure-img"
                                                    src="{{ asset('images/series/' . $serie['image']) }}"
                                                    style="  width: 100%;" />
                                            </a>
                                            <figcaption class="figure-caption" style="  font-size: 12px;">
                                                {{ $serie['name'] }} </figcaption>
                                        </figure>

                                    </div>

                                </div>
                            @endforeach
                            <!----------------------------------->
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
@endsection
