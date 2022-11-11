@extends('layouts.loginregister')

@section('title', 'LogIn')



@section('contant')

    <div class="row d-flex">
        <div class="col-md-6">
            <div>
                <div id="first_Col">
                    <h1 style="color: rgb(101,149,254);text-align: left;margin-top: 25px;font-size: 46px;">
                        NOTflix&nbsp;</h1>
                    <p style="font-size: 15px;letter-spacing: 2px;font-style: italic;margin-left: 12px;">
                        Forgot your password? No problem. Just let us know your email address and we will email you a
                        password reset link that will allow you to choose a new one.
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div>
                <div style="text-align: center;"><img class="img-fluid" src="{{ asset('assets/img/Untitled%20design.png') }}"
                        style="width: 130px;"></div>
                <div>
                    <h1 style="color: rgb(255,255,255);text-align: center;margin-bottom: 24px;">Forgot password</h1>
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div
                        style="height: 45px;background: rgba(200,200,200,0);border-radius: 45px;border: 2.4px solid #46c2ff;margin-bottom: 30px;margin-top: 10px;">
                        <i class="fa fa-envelope" style="margin-left: 16px;color: rgb(147,78,251);"></i>
                        <input
                            style="padding: 0px;margin-top: 4px;margin-left: 15px;width: 182px;background: rgba(255,255,255,0);border-color: rgba(0,0,0,0);text-align: left;color: #707070;"
                            placeholder="Enter Your Email Address" type="email" name="email" :value="old('email')"
                            required autofocus />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>



                    <div style="text-align: center;">

                        <button class="btn btn-primary d-table-row" type="submit"
                            style="border-radius: 45px;background: linear-gradient(28deg, #BD11FA, #46C2FF);
                            border-width: 0px;box-shadow: -1px 1px 20px 8px var(--purple);margin-top: 18px;">
                            {{ __('Email Password Reset Link') }}
                        </button>
                    </div>


                </form>
            </div>
        </div>
    </div>

@endsection
{{-- 
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button>
                    {{ __('Email Password Reset Link') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}
