@extends('layouts.form')

@section('title', 'Prize for Actor In Serie')



@section('form')

    <form class="mt-5" method="POST" action="{{ route('actorprizeseries.store') }}" enctype="multipart/form-data">
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
                <label for="actor_id">Actor</label>
                <select class="selectpicker form-control" data-live-search="true" id="actor_id" name="actor_id">
                    @foreach ($actors as $actor)
                        <option value="{{ $actor->id }}" @selected(old('actor_id') == $actor->id)>{{ $actor->first_name }} {{ $actor->last_name }} </option>
                    @endforeach
                </select>
                @error('actor_id')
                    <div class="alert alert-danger w-100" role="alert">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-lg-6 col-12 form-group">
                <label for="serie_id">Serie</label>
                <select class="selectpicker form-control" data-live-search="true" id="serie_id" name="serie_id">
                    @foreach ($series as $serie)
                        <option value="{{ $serie->id }}" @selected(old('serie_id') == $serie->id)>{{ $serie->name }} </option>
                    @endforeach
                </select>
                @error('serie_id')
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
