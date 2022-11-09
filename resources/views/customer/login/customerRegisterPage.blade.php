@extends('layouts.login.login_customer_layout')

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
                    <form action="{{ route('register_customer.post') }}" class="login-form" method="POST">
                        @csrf
                        <span class="login-form-title">Customer Register</span>

                        <div class="form__input-wrapper">
                            <input class="form__input" type="text" name="username" placeholder="Username" value="{{ old('username') }}">
                            <span class="form__input-icon">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </span>
                            @if ($errors->has('username'))
                            <span class="text-danger"><strong>{{ $errors->first('username') }}</strong></span>
                        @endif
                        </div>

                        <div class="form__input-wrapper">
                            <input class="form__input" type="password" name="password" placeholder="Password">
                            <span class="form__input-icon">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                            @if ($errors->has('password'))
                                <span class="text-danger"><strong>{{ $errors->first('password') }}</strong></span>
                            @endif
                        </div>

                        <div class="form__input-wrapper">
                            <input class="form__input" type="password" name="password_confirmation" placeholder="Confirm Password">
                            <span class="form__input-icon">
                                <i class="fa-solid fa-key"></i>
                            </span>
                            @if ($errors->has('password_confirmation'))
                                <span class="text-danger"><strong>{{ $errors->first('password_confirmation') }}</strong></span>
                            @endif
                        </div>

                        <div class="form__input-wrapper">
                            <input class="form__input" type="text" name="fullname" placeholder="Full name" value="{{ old('fullname') }}">
                            <span class="form__input-icon">
                                <i class="fa-solid fa-user"></i>
                            </span>
                            @if ($errors->has('fullname'))
                                <span class="text-danger"><strong>{{ $errors->first('fullname') }}</strong></span>
                            @endif
                        </div>
                        
                        <div class="form__input-wrapper">
                            <input class="form__input" type="text" name="email" placeholder="Email" value="{{ old('email') }}">
                            <span class="form__input-icon">
                                <i class="fa-solid fa-envelope"></i>
                            </span>
                            @if ($errors->has('email'))
                                <span class="text-danger"><strong>{{ $errors->first('email') }}</strong></span>
                            @endif
                        </div>

                        <div class="form__input-wrapper">
                            <input class="form__input" type="text" name="phoneNumber" placeholder="Phone number" value="{{ old('phoneNumber') }}">
                            <span class="form__input-icon">
                                <i class="fa-solid fa-phone"></i>
                            </span>
                            @if ($errors->has('phoneNumber'))
                                <span class="text-danger"><strong>{{ $errors->first('phoneNumber') }}</strong></span>
                            @endif
                        </div>

                        <div class="form__input-wrapper">
                            <input class="form__input" type="text" name="address" placeholder="Address" value="{{ old('address') }}">
                            <span class="form__input-icon">
                                <i class="fa-solid fa-phone"></i>
                            </span>
                            @if ($errors->has('address'))
                                <span class="text-danger"><strong>{{ $errors->first('address') }}</strong></span>
                            @endif
                        </div>

                        <button class="form__btn" type="submit">Register</button>
                        <p class="form__create">Already have an account? <a href="{{ route('register_customer.index') }}" class="form__create-link">Sign In</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection