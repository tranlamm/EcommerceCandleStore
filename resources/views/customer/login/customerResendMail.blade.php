@extends('layouts.customer.customer_layout_login')

@section('content')
<div class="login">
    <div class="container">
        <div class="row">
            <div class="col col-lg-6 col-md-4 d-none d-md-block">
                <div class="login-logo pe-lg-5">
                    <img src="{{ asset('images/shop/logo-brand.png') }}" alt="Logo brand">
                    <div class="login-slogan">Discover your new signature scent</div>
                </div>
            </div>
            <div class="col col-lg-6 col-md-8 col-12">
                <div class="ps-lg-5 ps-md-4">
                    {{-- Reset Password --}}
                    <form action="{{ route('register_customer_resend.post') }}" class="form-wrapper" id="form-sign_in" method="POST">
                        @csrf
                        <div class="form-header">
                            <div class="form-header-main text-danger">Resend Verify Token</div>
                        </div>
                        <div class="form-main">
                            {{-- Email --}}
                            <input type="email" name="email" class="form-input" placeholder="Enter email..." required>
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif

                            {{-- Wrong message --}}
                            @if (session()->has('wrong'))
                                <span class="text-danger text-center mt-2"><strong>{{ session()->get('wrong') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-submit">
                            <button type="submit" class="form-submit-btn">Submit</button>
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

