@extends('layouts.form')

@section('title', 'Edit Serie')



@section('form')

    <form method="POST" action="{{ route('series.update',$serie->id) }}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="container">

            <div class="avatar" style="margin-top: -10px; ">
                <div class="avatar-bg center"
                    style="margin-bottom: 30px;  border-radius:0px; border-style: none;box-shadow: 0px 0px 10px rgb(47,168,255); background: url({{asset('/images/series/'.$serie->image)}}); background-size: cover;">
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-12 form-group">
                    <label class="form-label" for="title">Serie Name</label>
                    <input type="text" value="{{ $serie->name }}" class="form-control" required name="name">
                    @error('name')
                        <div class="alert alert-danger w-100" role="alert">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-6 col-12 form-group">
                    <label class="form-label" for="title">Realase Year</label>
                    <input type="month" value="{{ $serie->year }}" class="form-control" required name="year">
                    @error('year')
                        <div class="alert alert-danger w-100" role="alert">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-6 col-12 form-group">
                    <label class="form-label" for="title">Upload Poster</label>
                    <input type="file" name="image" class="form-control" id="image">
                    @error('image')
                        <div class="alert alert-danger w-100" role="alert">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-lg-6 col-12 form-group">
                    <label class="form-label" for="title">Link to Movie</label>
                    <input type="text" value="{{ $serie->link }}" name="link" required class="form-control">
                    @error('link')
                        <div class="alert alert-danger w-100" role="alert">{{ $message }}</div>
                    @enderror
                </div>

            </div>
            <div class="row">
                <div class=" col-lg-4 col-12 form-group">
                    <label class="form-label" for="date"> Language</label>
                    <input class="form-control" value="{{ $serie->language }}" type="text" required
                        name="language" id="date">
                    @error('language')
                        <div class="alert alert-danger w-100" role="alert">{{ $message }}</div>
                    @enderror
                </div>

                <div class=" col-lg-4 col-12 form-group">
                    <label class="form-label" for="date"> Revenue $ </label>
                    <input class="form-control" value="{{ $serie->revenue }}" type="number" required
                        name="revenue" id="date">
                    @error('revenue')
                        <div class="alert alert-danger w-100" role="alert">{{ $message }}</div>
                    @enderror
                </div>

                <div class=" col-lg-4 col-12 form-group">
                    <label class="form-label" for="date"> Budget $ </label>
                    <input class="form-control" value="{{ $serie->budget }}" type="number" required
                        name="budget" id="date">
                    @error('budget')
                        <div class="alert alert-danger w-100" role="alert">{{ $message }}</div>
                    @enderror
                </div>
            </div>


            <div class="row">
                <div class=" col-lg-4 col-12 form-group">
                    <label class="form-label" for="date"> Duration</label>
                    <input class="form-control" value="{{ $serie->duration }}" type="text" required pattern="[0-9]{2}:[0-9]{2}}" 
                        name="duration" id="date">
                    @error('duration')
                        <div class="alert alert-danger w-100" role="alert">{{ $message }}</div>
                    @enderror
                </div>

                <div class=" col-lg-4 col-12 form-group">
                    <label class="form-label" for="date"> IMDB Rate</label>
                    <input class="form-control" value="{{ $serie->imdb_rate }}" type="number" step=any required 
                        name="imdb_rate" id="date">
                    @error('imdb_rate')
                        <div class="alert alert-danger w-100" role="alert">{{ $message }}</div>
                    @enderror
                </div>

                <div class=" col-lg-4 col-12 form-group">
                    <label class="form-label" for="date"> IMDB Rate Count</label>
                    <input class="form-control" value="{{ $serie->imdb_rate_count }}" type="number" step=any required 
                        name="imdb_rate_count" id="date">
                    @error('imdb_rate_count')
                        <div class="alert alert-danger w-100" role="alert">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-12 form-group">
                        <label for="director_id">Director</label>
                        <select class="selectpicker form-control" data-live-search="true"  id="director_id" name="director_id">
                            @foreach($directors as $director)
                            <option value="{{$director->id}}" @selected($director->id==$serie->director_id)>{{$director->first_name}} {{$director->last_name}}</option>
                            @endforeach
                        </select>
                    @error('director_id')
                        <div class="alert alert-danger w-100" role="alert">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-12 form-group">
                        <label for="genre_id">Genres</label>
                        <select class="selectpicker form-control"  multiple data-live-search="true" id="genre_id" name="genre_id[]">
                            @foreach($genres as $genre)
                            <option value="{{$genre->id}}" @selected( in_array($genre->id,$genres_selected))>{{$genre->type}}</option>
                            @endforeach
                        </select>
                    @error('genre_id')
                        <div class="alert alert-danger w-100" role="alert">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-4 col-12 form-group">
                        <label for="company_id">Companies</label>
                        <select class="selectpicker form-control"  multiple data-live-search="true" id="company_id" name="company_id[]">
                            @foreach($companies as $company)
                            <option value="{{$company->id}}" @selected( in_array($company->id,$companies_selected))>{{$company->name}}</option>
                            @endforeach
                        </select>
                    @error('company_id')
                        <div class="alert alert-danger w-100" role="alert">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-lg-4 col-12 form-group">
                    <label for="actor_id">Actors</label>
                    <select class="selectpicker form-control"  multiple data-live-search="true" id="actor_id" name="actor_id[]">
                        @foreach($actors as $actor)
                        <option value="{{$actor->id}}" @selected( in_array($actor->id,$actors_selected))>{{$actor->first_name}} {{$actor->last_name}}</option>
                        @endforeach
                    </select>
                @error('actor_id')
                    <div class="alert alert-danger w-100" role="alert">{{ $message }}</div>
                @enderror
            </div>
            </div>

            <div class="row ">
                <div class=" col-12 form-group">
                    <label class="form-label" for="date">Description</label>
                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{$serie->description}}</textarea>
                    @error('description')
                        <div class="alert alert-danger w-100" role="alert">{{ $message }}</div>
                    @enderror
                </div>
            </div>


            <button class="btn btn-primary btn-block text-white btn-user" data-bs-hover-animate="pulse" type="submit"
                name="submit"
                style="background: rgb(149,70,246);box-shadow: 0px 0px 12px #6f58fe;border-width: 0; font-size: large; margin-top:20px;">Update
                Now!</button>

        </div>
    </form>



@endsection
