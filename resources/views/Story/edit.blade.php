@extends('layouts.form')

@section('title', 'Edit Story')



@section('form')

    <form method="POST" action="{{ route('stories.update',$story->id) }}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="container">
            <div class="avatar"  style="margin-top: -10px;); ">
                <div class="avatar-bg center" 
                    style="margin-bottom: 30px;  border-radius:100px; border-style: none;box-shadow: 0px 0px 10px rgb(47,168,255); background: url({{asset('/images/stories/'.$story->image)}}); background-size: cover;">
                </div>
            </div>
            <div class="row">
                <div class=" col-12 form-group">
                    <label class="form-label" for="title">Title</label>
                    <input type="text" value="{{$story->title }}" class="form-control" required name="title">
                    @error('title')
                        <div class="alert alert-danger w-100" role="alert">{{ $message }}</div>
                    @enderror
                </div>
                <div class=" col-12 form-group">
                    <label class="form-label" for="title">Author Name</label>
                    <input type="text" value="{{ $story->author_name }}" class="form-control" required name="author_name">
                    @error('author_name')
                        <div class="alert alert-danger w-100" role="alert">{{ $message }}</div>
                    @enderror
                </div>
                <div class=" col-12 form-group">
                    <label class="form-label" for="title">Upload Poster</label>
                    <input type="file" name="image" class="form-control" id="image">
                    @error('image')
                        <div class="alert alert-danger w-100" role="alert">{{ $message }}</div>
                    @enderror
                </div>

                <div class=" col-12 form-group">
                    <label class="form-label" for="date">Overview On Story</label>
                    <textarea class="form-control" name="overview" id="exampleFormControlTextarea1" rows="3">{{$story->overview}}</textarea>
                    @error('overview')
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
