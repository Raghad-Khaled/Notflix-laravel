@extends('layouts.form')

@section('title', 'Add Advertisement')



@section('form')

    <form class="user" method="POST" action="{{ route('advertisements.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="avatar" style="margin-top: -10px; ">
            <div class="avatar-bg center"
                style="margin-bottom: 30px;  border-radius:0px; border-style: none;box-shadow: 0px 0px 10px rgb(47,168,255);">
            </div><input class="d-lg-flex align-items-lg-center form-control" type="file" data-aos="zoom-in-right" required
                name="image"
                style="padding-top: 4px;padding-right: 0px;padding-left: 7px;padding-bottom: 1px;color: var(--secondary);background: rgba(255,255,255,0);border-radius: 6px;box-shadow: inset 0px 0px 5px 0px rgb(124,106,246);margin-bottom: 2px;height: 40px;border: 1.5px dashed rgb(91,103,194);margin-top: 7px;">
        </div>
        @error('image')
            <div class="alert alert-danger w-100" role="alert">{{ $message }}</div>
        @enderror

        <button class="btn btn-primary btn-block text-white btn-user" data-bs-hover-animate="pulse" type="submit"
            name="submit"
            style="background: rgb(149,70,246);box-shadow: 0px 0px 12px #6f58fe;border-width: 0; font-size: large; margin-top:20px;">Add
            Now!</button>
    </form>

@endsection
