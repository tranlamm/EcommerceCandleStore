@extends('layouts.customer.customer_layout_login')

@section('content')
<div class="login">
    <div class="container">
        <div class="row">
            <div class="col col-6">
                <div class="login-logo">
                    <img src="{{ asset('images/shop/logo-brand.png') }}" alt="Logo brand">
                    <div class="login-slogan">Discover your new signature scent</div>
                </div>
            </div>
            <div class="col col-6">
                <div class="login-form">
                    {{-- Reset Password --}}
                    <form action="{{ route('reset_customer.post') }}" class="form-wrapper" id="form-sign_in" method="POST">
                        @csrf
                        <div class="form-header">
                            <div class="form-header-main">Quên mật khẩu</div>
                        </div>
                        @if (session()->has('message'))
                            <span class="text-success mb-2">{{ session()->get('message') }}</span>
                        @endif
                        <div class="form-main">
                            <input type="text" value="{{ old('username') }}" name="username" class="form-input" placeholder="Username" required>
                            @if ($errors->has('username'))
                                <span class="text-danger">{{ $errors->first('username') }}</span>
                            @endif

                            <input type="email" value="{{ old('email') }}" name="email" class="form-input" placeholder="Email" required>
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif

                            @if (session()->has('wrong'))
                                <span class="text-danger text-center mt-2"><strong>{{ session()->get('wrong') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-submit">
                            <button type="submit" class="form-submit-btn">Send Mail</button>
                        </div>
                        <div class="form-social">
                            <div class="form-social-btn form-facebook">
                                <i class="fa-brands fa-facebook"></i>
                                <div class="form-social-text">Facebook</div>
                            </div>
                            <div class="form-social-btn form-google">
                                <i class="fa-brands fa-google form-google-icon"></i>
                                <div class="form-social-text">Google</div>
                            </div>
                            <div class="form-social-btn form-apple">
                                <i class="fa-brands fa-apple"></i>
                                <div class="form-social-text">Apple</div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection