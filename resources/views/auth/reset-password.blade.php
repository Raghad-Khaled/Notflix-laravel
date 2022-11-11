@extends('layouts.loginregister')

@section('title', 'Reset Password')



@section('contant')

    <div class="row d-flex">
        <div class="col-md-6">
            <div>
                <div id="first_Col">
                    <h1 class="d-sm-inline-flex"
                        style="color: rgb(101,149,254);text-align: left;margin-top: 25px;font-size: 46px;">NotFlix</h1>
                    <p style="font-size: 15px;letter-spacing: 2px;font-style: italic;margin-left: 12px;">Reset your password?
                        No problem. Just choose a new one.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div>
                <div style="text-align: center;"><img class="img-fluid" src="{{ asset('assets/img/Untitled%20design.png') }}"
                        style="width: 130px;"></div>
                <div>
                    <h1 style="color: rgb(255,255,255);text-align: center;margin-bottom: 24px;">Reset Password</h1>
                </div>

                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    <div
                        style="height: 45px;background: rgba(200,200,200,0);border-radius: 45px;border: 2.4px solid #46c2ff;margin-bottom: 30px;margin-top: 10px;">
                        <i class="fa fa-envelope" style="margin-left: 16px;color: rgb(147,78,251);"></i>
                        <x-text-input
                            style="padding: 0px;margin-top: 4px;margin-left: 15px;width: 182px;background: rgba(255,255,255,0);border-color: rgba(0,0,0,0);text-align: left;color: #707070;"
                            id="email" placeholder="Enter Your Email Address" class="block mt-1 w-full" type="email"
                            name="email" :value="old('email', $request->email)" required autofocus />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div
                        style="height: 45px;background: rgba(200,200,200,0);border-radius: 45px;border: 2.4px solid #46c2ff;margin-bottom: 30px;">
                        <i class="fa fa-lock" style="margin-left: 16px;color: #9a46fc;width: 11px;"></i>
                        <input
                            style="margin-top: 5px;width: 155px;color: rgb(112,112,112);background: rgba(255,255,255,0);border-color: rgba(112,112,112,0);margin-left: 19px;"
                            placeholder="Password" type="password" name="password" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div
                        style="height: 45px;background: rgba(200,200,200,0);border-radius: 45px;border: 2.4px solid #46c2ff;margin-bottom: 30px;">
                        <i class="fa fa-lock" style="margin-left: 16px;color: #9a46fc;width: 11px;"></i>
                        <input
                            style="margin-top: 5px;width: 155px;color: rgb(112,112,112);background: rgba(255,255,255,0);border-color: rgba(112,112,112,0);margin-left: 19px;"
                            placeholder="Conferm Password" type="password" name="password_confirmation" required />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                    <div style="text-align: center;">

                        <button class="btn btn-primary d-table-row" type="submit"name="signup"
                            style="border-radius: 45px;background: linear-gradient(28deg, #BD11FA, #46C2FF);border-width: 0px;box-shadow: -1px 1px 20px 8px var(--purple);margin-top: 18px;">
                            {{ __('Reset Password') }}</button>
                    </div>

                    <div style="margin-top: 22px;text-align: center;">
                        <a class="d-inline" style="color: rgb(255,255,255);" href="{{ route('login') }}">Already
                            Have An account?&nbsp;</a>
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

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button>
                    {{ __('Reset Password') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}
