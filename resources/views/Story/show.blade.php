@extends('layouts.page')

@section('title', $story['title'])

@section('contant')
    <div class="block-content"
        style="background: rgb(33,33,46);box-shadow: 0px 0px 60px rgb(45,45,68); padding:20px; margin-bottom: 35px;">
        <div class="product-info">
            <div class="row">
                <div class="col-md-6">
                    <div class="gallery"
                        style="background: rgba(135,73,237,0.32);box-shadow: inset 0px 0px 17px #af5eee;border-radius: 6px;  padding:20px;">
                        <a href=""><img src="{{ asset('images/stories/' . $story['image']) }}"
                                style="width: 100%;height: 100%;"></a>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="info">
                        <h4 style="font-family: Acme, sans-serif;font-size: 32px; margin-bottom: 30px">
                            {{ $story['title'] }} <img src="{{ asset('assets/img/book.png') }}"
                                style="height: 40px ; width: 40px; padding-top:5px;"></h4>

                        <div>
                            <h4
                                style="margin-top: 22px;font-family: 'Balsamiq Sans', cursive;font-size: 28px;color: #8749ed; margin-left: 15px">
                                Story Overview <img src="{{ asset('assets/img/description.png') }}"
                                    style="height: 45px ; width: 40px; padding-top:5px;"></h4>
                        </div>
                        <div class="summary">
                            <p
                                style="margin-left: 22px;color: rgba(255,255,255,0.97);font-size: 16px;margin-bottom: 16px;font-family: Nunito, sans-serif;">
                                {{ $story['overview'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-info">
            <div style="border-style: none;padding-right: 50px;padding-left: 50px;">
                <h2
                    style="font-size: 42px;font-family: Acme, sans-serif;margin-bottom: 20px;border-bottom: 1px solid #46c2ff;padding-bottom: 10px;padding-top: 10px;">
                    Author</h2>


                <a>
                    <h4 style="font-size: 34px;font-family: 'Chelsea Market', cursive;margin-top: 0px; padding-left: 15px">
                        {{ $story['author_name'] }}</h4>
                </a>
            </div>

        </div>


        <div class="row" style="padding-right: 50px;padding-left: 50px;">
            <div class="col">
                <div style="margin-top: 22px;">
                    <h2
                        style="font-size: 42px;font-family: Acme, sans-serif;border-bottom: 1px solid #46c2ff;padding-bottom: 10px;padding-top: 10px;">
                        Characters Related <img src="{{ asset('assets/img/char.png') }}"
                            style="height: 50px; padding-top: 5px;"></h2>
                    <div class="row no-gutters row-cols-3 justify-content-center align-items-center"
                        style="  padding: 0px;margin-top: 25px;">
                        <!--------------Repeat this---->
                        @foreach ($story->characters as $character)
                            <div class="col">
                                <a href="{{ route('characters.show', $character['id']) }}">
                                    <div class="justify-content-center spacer-slider" data-bs-hover-animate="pulse">
                                        <figure class="figure" style="  width: 100%;">
                                            <img class="figure-img"
                                                src="{{ asset('images/characters/' . $character['image']) }}"
                                                style="  width: 100%;" />
                                            <figcaption class="figure-caption" style="  font-size: 16px;"><span>
                                                    {{ $character['name'] }}
                                                </span>
                                            </figcaption>
                                        </figure>

                                    </div>
                                </a>
                            </div>
                        @endforeach
                        <!----------------------------------->
                    </div>
                </div>
            </div>
        </div>


        <!------------------------------------------------------------------------------------------------------------------>
        <div class="row" style="padding-right: 50px;padding-left: 50px;">
            <div class="col">
                <div style="margin-top: 22px;">
                    <h2
                        style="font-size: 42px;font-family: Acme, sans-serif;border-bottom: 1px solid #46c2ff;padding-bottom: 10px;padding-top: 10px;">
                        Movies Related</h2>
                    <div class="row no-gutters row-cols-3 justify-content-center align-items-center"
                        style="  padding: 0px;margin-top: 25px;">
                        <!--------------Repeat this---->

                        @foreach ($story->movies as $movie)
                            <div class="col">
                                <a href="{{ route('movies.show', $movie['id']) }}">
                                    <div class="justify-content-center spacer-slider" data-bs-hover-animate="pulse">
                                        <figure class="figure" style="  width: 100%;"><img class="figure-img"
                                                src="{{ asset('images/movies/' . $movie['image']) }}"
                                                style="  width: 100%;" />
                                            <figcaption class="figure-caption" style="  font-size: 16px;"><span>
                                                    {{ $movie['name'] }}
                                                </span>
                                            </figcaption>
                                        </figure>

                                    </div>
                                </a>
                            </div>
                        @endforeach
                        <!----------------------------------->
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
@endsection
