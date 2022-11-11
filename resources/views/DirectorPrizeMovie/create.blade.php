@extends('layouts.form')

@section('title', 'Prize for Director In Movie')



@section('form')

    <form class="mt-5" method="POST" action="{{ route('directorprizemovies.store') }}" enctype="multipart/form-data">
        @csrf


        <div class="row">
            <div class="col-lg-6 col-12 form-group">
                <label for="prize_id">Prize</label>
                <select class="selectpicker form-control" data-live-search="true" id="prize_id" name="prize_id">
                    @foreach ($prizes as $prize)
                        <option value="{{ $prize->id }}" @selected(old('prize_id') == $prize->id)>{{ $prize->title }} {{ $prize->type }}</option>
                    @endforeach
                </select>
                @error('prize_id')
                    <div class="alert alert-danger w-100" role="alert">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-lg-6 col-12 form-group">
                <label for="director_id">Director</label>
                <select class="selectpicker form-control" data-live-search="true" id="director_id" name="director_id">
                    @foreach ($directors as $director)
                        <option value="{{ $director->id }}" @selected(old('director_id') == $director->id)>{{ $director->first_name }} {{ $director->last_name }} </option>
                    @endforeach
                </select>
                @error('director_id')
                    <div class="alert alert-danger w-100" role="alert">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-lg-6 col-12 form-group">
                <label for="movie_id">Movie</label>
                <select class="selectpicker form-control" data-live-search="true" id="movie_id" name="movie_id">
                    @foreach ($movies as $movie)
                        <option value="{{ $movie->id }}" @selected(old('movie_id') == $movie->id)>{{ $movie->name }} </option>
                    @endforeach
                </select>
                @error('movie_id')
                    <div class="alert alert-danger w-100" role="alert">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-lg-6 col-12 form-group">
                <label class="form-label" for="title">Realase Year</label>
                <input type="month" value="{{ old('year') }}" class="form-control" required name="year">
                @error('year')
                    <div class="alert alert-danger w-100" role="alert">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <button class="btn btn-primary btn-block text-white btn-user" data-bs-hover-animate="pulse" type="submit"
            name="submit"
            style="background: rgb(149,70,246);box-shadow: 0px 0px 12px #6f58fe;border-width: 0; font-size: large; margin-top:20px;">Add
            Now!</button>
    </form>

@endsection
