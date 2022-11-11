@extends('layouts.form')

@section('title', 'Edit Company')



@section('form')

    <form method="POST" action="{{ route('companies.update',$company->id) }}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="container">
            <div class="row mt-5">
                <div class=" col-12 form-group">
                    <label class="form-label" for="title">Name</label>
                    <input type="text" value="{{$company->name }}" class="form-control" required name="name">
                    @error('name')
                        <div class="alert alert-danger w-100" role="alert">{{ $message }}</div>
                    @enderror
                </div>
                <div class=" col-12 form-group">
                    <label class="form-label" for="title">Found Year</label>
                    <input class="form-control" value="{{ $company->found_year }}" type="number" min="1900" max="2155" required 
                    name="found_year">                    
                    @error('found_year')
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
