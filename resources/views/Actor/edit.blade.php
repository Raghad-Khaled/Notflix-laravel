@extends('layouts.form')

@section('title', 'Edit Actor')



@section('form')

    <form method="POST" action="{{ route('actors.update',$actor->id) }}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="container">
            <div class="avatar"  style="margin-top: -10px;); ">
                <div class="avatar-bg center" 
                    style="margin-bottom: 30px;  border-radius:100px; border-style: none;box-shadow: 0px 0px 10px rgb(47,168,255); background: url({{asset('/images/actors/'.$actor->image)}}); background-size: cover;">
                </div>
            </div>
            <div class="row">
                <div class=" col-12 form-group">
                    <label class="form-label" for="title">Frist Name</label>
                    <input type="text" value="{{$actor->first_name}}" class="form-control" required name="first_name">
                    @error('first_name')
                        <div class="alert alert-danger w-100" role="alert">{{ $message }}</div>
                    @enderror
                </div>
                <div class=" col-12 form-group">
                    <label class="form-label" for="title">Last Name</label>
                    <input type="text" value="{{$actor->last_name}}" class="form-control" required name="last_name">
                    @error('last_name')
                        <div class="alert alert-danger w-100" role="alert">{{ $message }}</div>
                    @enderror
                </div>
                <div class=" col-12 form-group">
                    <label class="form-label" for="title">Upload image</label>
                    <input type="file" name="image" class="form-control" id="image">
                    @error('image')
                        <div class="alert alert-danger w-100" role="alert">{{ $message }}</div>
                    @enderror
                </div>

                <div class=" col-12 form-group">
                    <label class="form-label" for="date">Birth date</label>
                    <input class="form-control"  value="{{$actor->birth_date}}" type="date" required name="birth_date" id="date">
                    @error('birth_date')
                        <div class="alert alert-danger w-100" role="alert">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row ">


                <div class="col-sm form-group d-flex align-items-center justify-content-center gendr">
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="m" @checked($actor->gender=='m')>
                            Male
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="f" @checked($actor->gender=='f')>
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
