@extends('layouts.page')

@section('title', $character['name'])

@section('contant')
    <div class="block-content"
        style="background: rgb(33,33,46);box-shadow: 0px 0px 60px rgb(45,45,68); padding:20px; margin-bottom: 35px;">
        <div class="product-info">
            <div class="row">
                <div class="col-md-6">
                    <div class="gallery"
                        style="background: rgba(135,73,237,0.32);box-shadow: inset 0px 0px 17px #af5eee;border-radius: 6px; padding:20px;">
                        <img src="{{ asset('images/characters/' . $character['image']) }}" style="width: 100%;height: 100%;">
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="info">
                        <h4 style="font-family: Acme, sans-serif;font-size: 32px; margin-bottom: 30px">
                            {{ $character['name'] }}</h4>
                        <div>
                            <h4
                                style="margin-top: 22px;font-family: 'Balsamiq Sans', cursive;font-size: 28px;color: #8749ed; margin-left: 15px">
                                Gender</h4>
                        </div>
                        <div class="summary">
                            <p
                                style="margin-left: 22px;color: rgba(255,255,255,0.97);font-size: 16px;margin-bottom: 16px;font-family: Nunito, sans-serif;">
                                {{ $character['gender']=='m'? 'Male': 'Female' }}
                            </p>
                        </div>



                        <div>
                            <h4
                                style="margin-top: 22px;font-family: 'Balsamiq Sans', cursive;font-size: 28px;color: #8749ed; margin-left: 15px">
                                Story Line</h4>
                        </div>
                        <div class="summary">
                            <p
                                style="margin-left: 22px;color: rgba(255,255,255,0.97);font-size: 16px;margin-bottom: 16px;font-family: Nunito, sans-serif;">
                                {{ $character['overview'] }}
                            </p>
                        </div>

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


        <!------------------------------------------------------------------------------------------------------------------>

        <div class="row" style="padding-right: 50px;padding-left: 50px;">
            <div class="col">
                <div style="margin-top: 22px;">
                    <h2
                        style="font-size: 42px;font-family: Acme, sans-serif;border-bottom: 1px solid #46c2ff;padding-bottom: 10px;padding-top: 10px;">
                        Story related</h2>
                    <div class="row no-gutters row-cols-3 justify-content-center align-items-center"
                        style="  padding: 0px;margin-top: 25px;">
                        <!--------------Repeat this---->
                        <a href="{{route('stories.show',$character->story['id'])}}">
                            <div class="col">
                                <div class="justify-content-center spacer-slider" data-bs-hover-animate="pulse">
                                    <figure class="figure" style="  width: 100%;"><img class="figure-img"
                                            src="{{asset('images/stories/'.$character->story['image'])}}" style="  width: 100%;" />
                                        <figcaption class="figure-caption" style="  font-size: 16px;">
                                            <span>{{$character->story['title']}}</span> By {{$character->story['author_name']}}
                                        </figcaption>
                                    </figure>

                                </div>

                            </div>
                        </a>
                        <!----------------------------------->
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
