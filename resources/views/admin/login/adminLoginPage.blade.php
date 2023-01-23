@extends('layouts.admin.admin_login_layout')

@section('content')
<div class="wrapper">
    <div class="container wrapper-container">
        <div class="wrapper-row">
            <div class="login-wrapper row">
                <div class="col col-4 d-none d-lg-block">
                    <div>
                        <img class="login-img" src="{{ asset('images/login/login.webp') }}" alt="IMG">
                    </div>
                </div>

                <div class="col col-12 col-lg-6 ms-auto">
                    <form action="{{ route('login.post') }}" class="login-form" method="POST">
                        @csrf
                        <span class="login-form-title">Administrator Login</span>

                        <div class="form__input-wrapper">
                            <input class="form__input" type="text" name="username" placeholder="Username" value="{{ old('username') }}">
                            <span class="form__input-icon">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </span>
                        </div>
                        @if ($errors->has('username'))
                            <span class="text-danger"><strong>{{ $errors->first('username') }}</strong></span>
                        @endif

                        <div class="form__input-wrapper">
                            <input class="form__input" type="password" name="password" placeholder="Password">
                            <span class="form__input-icon">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                        </div>
                        @if ($errors->has('password'))
                            <span class="text-danger"><strong>{{ $errors->first('password') }}</strong></span>
                        @endif

                        <div class="form__helper">
                            <div>
                                <input class="form__input_remember-me" id="ckb1" type="checkbox" name="remember-me">
                                <label class="form__label_remember-me" for="ckb1">
                                    Remember me
                                </label>
                            </div>
                            <a class="form__forget-password" href="#">
                                Forgot Password?
                            </a>
                        </div>

                        @if (session()->has('message'))
                            <p class="text-danger text-center"><strong>{{ session()->get('message') }}</strong></p>
                        @endif

                        <button class="form__btn" type="submit">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection