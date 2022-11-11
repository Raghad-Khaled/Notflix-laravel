@extends('layouts.home')

@section('title', 'Movies')


@section('contant')
    <section id="cards">
        <h1
            style="margin-bottom: 31px;color: rgba(70,194,255,0.63);font-size: 30px;text-align: center;font-family: 'Architects Daughter', cursive;">
            Filter Results</h1>
        <div class="filter">

            <form method="GET" action="{{ route('movies.filter') }}">
                <!---  Combo boxes of filters ---->
                <select style="margin-bottom:20px; margin-left:10px" name="language">
                    <option value="">Language</option>

                    @foreach ($languages as $language)
                        <option @selected(request()->language==$language['language']) value="{{ $language['language'] }}">{{ $language['language'] }}</option>
                    @endforeach

                </select>
                <select style="margin-bottom:20px; margin-left:10px" name="genre">
                    <option value="">Genre</option>

                    @foreach ($genres as $genre)
                        <option @selected(request()->genre==$genre['id']) value="{{ $genre['id'] }}">{{ $genre['type'] }}</option>
                    @endforeach

                </select>
                <select style="margin-bottom:20px; margin-left:10px" name="era">
                    <option value="">Era</option>
                    @for ($i = 1910; $i <= 2020; $i += 10)
                        <option @selected(request()->era==$i) value="{{ $i }}">{{ $i }}s</option>
                    @endfor
                </select>
                <!--------------------------------->
                <div class="d-xl-flex justify-content-xl-center align-items-xl-center block-heading">
                    <button class="btn btn-primary text-center d-xl-flex justify-content-xl-center align-items-xl-center"
                        data-bs-hover-animate="pulse" type="submit"
                        style="height: 40px;border-radius: 584px;background: #6f38ff;box-shadow: 0px 0px 20px rgba(70,194,255,0.63);border-width: 0px;border-bottom: 0px none rgba(0,123,255,0); margin-top: 20px; margin-bottom: 5px;
                font-color: rgba(70,194,255,0.63);font-size:20px;text-align: center;font-family: 'Architects Daughter', cursive;">Show</button>
                </div>

            </form>
        </div>

        <!---- Honestly IDK what is this :""  -->
        <div class="row" style="margin-top: 40px;margin-right: 0px; margin-top: 0px; padding: 33px;">
            <div class="col-md-3">

                <!--------------------------Advertisements---------------------------------->

                @foreach ($advertisements as $advertisement)
                    <div class="card" style="margin-top: 60px;">
                        <div class="card-body" style="height: 100%;width: 100%;"><img
                                src="{{ asset('images/advertisements/' . $advertisement['image']) }}" style="width: 100%;">
                        </div>
                    </div>
                @endforeach

                <!---------------------->

            </div>
            <div class="col-md-9">
                <div class="products">
                    <div class="row no-gutters">

                        @foreach ($movies as $movie)
                            <div class="col-12 col-md-6 col-lg-4" style="padding: 13px;">
                                <figure class="figure tc-cardhover-14">
                                    <figcaption>
                                        <a href="{{route('movies.show',$movie['id'])}}">
                                            <h3>{{ $movie['name'] }}</h3>
                                            <p style="color: white !important; font-size: 12px ;">
                                                {{ $movie['description'] }}</p>
                                        </a>
                                    </figcaption><img class="figure-img"
                                        src="{{ asset('images/movies/' . $movie['image']) }}">
                                </figure>
                            </div>
                        @endforeach
                        <!------------->
                    </div>
                </div>
                {{ $movies->links() }}
            </div>
        </div>

    </section>

@endsection
