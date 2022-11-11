@extends('layouts.loginregister')

@section('title', 'LogIn')



@section('contant')

    <div class="row d-flex">
        <div class="col-md-6">
            <div>
                <div id="first_Col">
                    <h1 style="color: rgb(101,149,254);text-align: left;margin-top: 25px;font-size: 46px;">
                        Welcome Admin&nbsp;</h1>
                    <p style="font-size: 15px;letter-spacing: 2px;font-style: italic;margin-left: 12px;">Add
                        the latest and greatest Movies, Series,&nbsp; Novels&nbsp;</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div>
                <div style="text-align: center;"><img class="img-fluid" src="{{ asset('assets/img/Untitled%20design.png') }}"
                        style="width: 130px;"></div>
                <div>
                    <h1 style="color: rgb(255,255,255);text-align: center;margin-bottom: 24px;">Log In</h1>
                </div>

                <form method="POST" action="{{ route('admin.logdashboard') }}">
                    @csrf
                    @if (session('error'))
                        <x-input-error :messages="session('error')" class="mt-2" />
                    @endif
                    <div
                        style="height: 45px;background: rgba(200,200,200,0);border-radius: 45px;border: 2.4px solid #46c2ff;margin-bottom: 30px;margin-top: 10px;">
                        <i class="fa fa-envelope" style="margin-left: 16px;color: rgb(147,78,251);"></i>
                        <input
                            style="padding: 0px;margin-top: 4px;margin-left: 15px;width: 182px;background: rgba(255,255,255,0);border-color: rgba(0,0,0,0);text-align: left;color: #707070;"
                            placeholder="Enter Your Email Address" type="email" name="email" :value="old('email')"
                            required autofocus />
                    </div>
                    <div
                        style="height: 45px;background: rgba(200,200,200,0);border-radius: 45px;border: 2.4px solid #46c2ff;margin-bottom: 30px;">
                        <i class="fa fa-lock" style="margin-left: 16px;color: #9a46fc;width: 11px;"></i>
                        <input
                            style="margin-top: 5px;width: 155px;color: rgb(112,112,112);background: rgba(255,255,255,0);border-color: rgba(112,112,112,0);margin-left: 19px;"
                            placeholder="Password" type="password" name="password" required
                            autocomplete="current-password" />
                    </div>


                    <div style="text-align: center;">

                        <button class="btn btn-primary d-table-row" type="submit"name="signup"
                            style="width: 120px;border-radius: 45px;background: linear-gradient(28deg, #BD11FA, #46C2FF);border-width: 0px;box-shadow: -1px 1px 20px 8px var(--purple);margin-top: 18px;">Log
                            In
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection

{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-primary-button class="ml-3">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}
