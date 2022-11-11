@extends('layouts.form')

@section('title', 'Add Prize')



@section('form')

    <form method="POST" action="{{ route('prizes.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="container">
            
            <div class="row mt-5">
                <div class=" col-12 form-group">
                    <label class="form-label" for="title">Title</label>
                    <input type="text" value="{{old('title')}}" class="form-control" required name="title">
                    @error('title')
                        <div class="alert alert-danger w-100" role="alert">{{ $message }}</div>
                    @enderror
                </div>
                <div class=" col-12 form-group">
                    <label class="form-label" for="title">Type</label>
                    <input type="text" value="{{old('type')}}" class="form-control" required name="type">
                    @error('type')
                        <div class="alert alert-danger w-100" role="alert">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <button class="btn btn-primary btn-block text-white btn-user" data-bs-hover-animate="pulse" type="submit"
                name="submit"
                style="background: rgb(149,70,246);box-shadow: 0px 0px 12px #6f58fe;border-width: 0; font-size: large; margin-top:20px;">Add
                Now!</button>

        </div>
    </form>

@endsection
