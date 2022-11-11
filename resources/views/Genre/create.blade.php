@extends('layouts.form')

@section('title', 'Add Genre')



@section('form')

    <form class="mt-5" method="POST" action="{{ route('genres.store') }}" enctype="multipart/form-data">
        @csrf
        
        <div class=" col-12 form-group ">
            <label class="form-label" for="title">Type</label>
            <input type="text" class="form-control" required name="type">
            @error('type')
                <div class="alert alert-danger w-100" role="alert">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-primary btn-block text-white btn-user" data-bs-hover-animate="pulse" type="submit"
            name="submit"
            style="background: rgb(149,70,246);box-shadow: 0px 0px 12px #6f58fe;border-width: 0; font-size: large; margin-top:20px;">Add
            Now!</button>
    </form>

@endsection
