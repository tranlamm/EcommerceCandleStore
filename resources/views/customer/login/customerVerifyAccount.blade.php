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
                    <form action="{{ route('register_customer_verify.post') }}" class="form-wrapper" id="form-sign_in" method="POST">
                        @csrf
                        <div class="form-header">
                            <h5 class="text-success">
                                <span>
                                    We've sent you an email with a code to verify your new account. Please check your email ! 
                                </span>
                                <br/>
                                <span>
                                    Notice: Token will be expired after 3 minutes
                                </span>
                            </h5>
                        </div>
                        <div class="form-main">
                            {{-- Token --}}
                            <input type="text" name="token" class="form-input" placeholder="Enter token..." required>
                            @if ($errors->has('token'))
                                <span class="text-danger">{{ $errors->first('token') }}</span>
                            @endif

                            {{-- Wrong message --}}
                            @if (session()->has('wrong'))
                                <span class="text-danger text-center mt-2"><strong>{{ session()->get('wrong') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-submit">
                            <button type="submit" class="form-submit-btn">Submit</button>
                            <div class="form-helper">
                                <a  href="{{ route('register_customer_resend.index') }}" class="form-helper-label">Resend Verify Token</a>
                            </div>
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

