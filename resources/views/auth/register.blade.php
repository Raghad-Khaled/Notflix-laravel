@extends('layouts.loginregister')

@section('title', 'SignUp')



@section('contant')

    <div class="row d-flex">
        <div class="col-md-6">
            <div>
                <div id="first_Col">
                    <h1 class="d-sm-inline-flex" style="color: rgb(101,149,254);text-align: left;margin-top: 25px;font-size: 46px;">Welcome Back !</h1>
                    <p style="font-size: 15px;letter-spacing: 2px;font-style: italic;margin-left: 12px;">Find the latest and greatest Movies, Series,&nbsp; Novels that fit your taste&nbsp;</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div>
                <div style="text-align: center;"><img class="img-fluid" src="{{ asset('assets/img/Untitled%20design.png') }}"
                        style="width: 130px;"></div>
                <div>
                    <h1 style="color: rgb(255,255,255);text-align: center;margin-bottom: 24px;">Sign Up</h1>
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div>
                        <div
                            style="height: 45px;background: rgba(200,200,200,0);border-radius: 45px;border: 2.4px solid #46c2ff;margin-bottom: 30px;">
                            <input type="text"
                                style="padding: 0px;margin-top: 4px;margin-left: 26px;width: 240px;background: rgba(255,255,255,0);border-color: rgba(0,0,0,0);text-align: left;color: #707070;"
                                 name="name" value="{{old('name')}}" placeholder="User Name" required autofocus>
                        </div>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div class="text-center">


                        <div class="d-inline-flex">
                            <div class="form-check d-lg-flex">

                                <input type="radio" class="form-check-input" id="formCheck-1" style="margin-top: 6px;"  @checked(old('gender')=='m')
                                    name="gender" value="m" />
                                <label class="form-check-label" for="formCheck-1"
                                    style="color: rgb(152,73,252);margin-bottom: 0px;padding: 0px;margin-left: 5px;">Male</label>
                            </div>


                            <div class="form-check d-lg-flex" style="margin-left: 27px;">
                                <input type="radio" class="form-check-input" id="formCheck-2"  @checked(old('gender')=='f')
                                    style="margin-top: 6px;filter: brightness(127%) saturate(124%) sepia(0%);"
                                    name="gender" value="f" />
                                <label class="form-check-label" for="formCheck-1"
                                    style="color: rgb(154,69,252);margin-bottom: 0px;padding: 0px;margin-left: 5px;">Female</label>
                            </div>
                        </div>

                        <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                    </div>
                    <div
                        style="height: 45px;background: rgba(200,200,200,0);border-radius: 45px;border: 2.4px solid #46c2ff;margin-bottom: 30px;margin-top: 10px;">
                        <i class="fa fa-envelope" style="margin-left: 16px;color: rgb(147,78,251);"></i>
                        <input
                            style="padding: 0px;margin-top: 4px;margin-left: 15px;width: 182px;background: rgba(255,255,255,0);border-color: rgba(0,0,0,0);text-align: left;color: #707070;"
                             type="email" name="email" value="{{old('email')}}" placeholder="Enter Your Email Address"
                            required />
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
                            style="width: 120px;border-radius: 45px;background: linear-gradient(28deg, #BD11FA, #46C2FF);border-width: 0px;box-shadow: -1px 1px 20px 8px var(--purple);margin-top: 18px;">Sign
                            Up</button>
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
