@extends('layouts.login.login_layout')

@section('content')
<div class="wrapper">
    <div class="container wrapper-container">
        <div class="row wrapper-row">
            <div class="login-wrapper row">
                <div class="col col-4 d-none d-md-block">
                    <div data-tilt="">
                        <img class="login-img" src="https://colorlib.com/etc/lf/Login_v1/images/img-01.png" alt="IMG">
                    </div>
                </div>

                <div class="col col-12 col-md-6 offset-md-2">
                    <form action="{{ route('login_admin') }}" class="login-form" method="POST">
                        @csrf
                        <span class="login-form-title">Administrator Login</span>

                        <div class="form__input-wrapper">
                            <input class="form__input" type="text" name="username" placeholder="Username">
                            <span class="form__input-icon">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </span>
                        </div>

                        <div class="form__input-wrapper">
                            <input class="form__input" type="password" name="password" placeholder="Password">
                            <span class="form__input-icon">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
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