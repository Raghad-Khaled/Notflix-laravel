@extends('layouts.form')

@section('title', 'Edit Character')



@section('form')

    <form method="POST" action="{{ route('characters.update',$character->id) }}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="container">
            <div class="avatar"  style="margin-top: -10px;); ">
                <div class="avatar-bg center" 
                    style="margin-bottom: 30px;  border-radius:100px; border-style: none;box-shadow: 0px 0px 10px rgb(47,168,255); background: url({{asset('/images/characters/'.$character->image)}}); background-size: cover;">
                </div>
            </div>
            <div class="row">
                <div class=" col-lg-6 col-12 form-group">
                    <label class="form-label" for="title"> Name</label>
                    <input type="text" value="{{ $character->name }}" class="form-control" required name="name">
                    @error('name')
                        <div class="alert alert-danger w-100" role="alert">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-6 col-12 form-group">
                    <label class="form-label" for="title">Upload image</label>
                    <input type="file" name="image" class="form-control" id="image">
                    @error('image')
                        <div class="alert alert-danger w-100" role="alert">{{ $message }}</div>
                    @enderror
                </div>

                <div class=" col-12 form-group">
                    <label for="story_id">Story</label>
                    <select class="selectpicker form-control" data-live-search="true" id="story_id" name="story_id">
                        @foreach ($stories as $story)
                            <option value="{{ $story->id }}" @selected($character->story_id == $story->id)>{{ $story->title }}</option>
                        @endforeach
                    </select>
                    @error('story_id')
                        <div class="alert alert-danger w-100" role="alert">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row ">
                <div class=" col-12 form-group">
                    <label class="form-label" for="date">Overview</label>
                    <textarea class="form-control" name="overview" id="exampleFormControlTextarea1" rows="3">{{ $character->overview }}</textarea>
                    @error('overview')
                        <div class="alert alert-danger w-100" role="alert">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row ">
                <div class="col-sm form-group d-flex align-items-center justify-content-center gendr">
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio1"
                                @checked($character->gender == 'm') value="m">
                            Male
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio2"
                                @checked($character->gender == 'f') value="f">
                            Fmale
                        </label>
                    </div>
                    @error('gender')
                        <div class="alert alert-danger w-50" role="alert">{{ $message }}</div>
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
