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
                    <form action="{{ route('reset_customer.patch') }}" class="form-wrapper" id="form-sign_in" method="POST">
                        @csrf
                        @method('patch')
                        <div class="form-header">
                            <div class="form-header-main text-success">We've sent you an email with a code to reset password. Please check your email !</div>
                        </div>
                        <div class="form-main">
                            {{-- Token --}}
                            <input type="text" name="token" class="form-input" placeholder="Token" required>
                            @if ($errors->has('token'))
                                <span class="text-danger">{{ $errors->first('token') }}</span>
                            @endif
                            
                            {{-- Password --}}
                            <div class="input-reveal input-reveal-sm">
                                <input type="password" id="register-password" class="form-input form-input-info" placeholder="New Password" name="password" required>
                                <i data-name="register-password" class="fa-solid fa-eye-slash reveal-btn"></i>
                            </div>
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                            <div class="input-reveal input-reveal-sm">
                                <input type="password" id="register-password_confirmation" class="form-input form-input-info" placeholder="Confirm Password" name="password_confirmation" required> 
                                <i data-name="password_confirmation" class="fa-solid fa-eye-slash reveal-btn"></i>
                            </div>
                            @if ($errors->has('password_confirmation'))
                                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
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

<script>
    $('.reveal-btn').click(function()
    {
        const name = $(this).attr('data-name');
        let input;
        if (name == 'signin-password')
            input = $('#signin-password');
        else if (name == 'register-password')
            input = $('#register-password');
        else 
            input = $('#register-password_confirmation'); 
                   
        if (input.attr('type') == 'password')
            input.attr('type', 'text')
        else
            input.attr('type', 'password')
        input.focus();
    })
</script>
@endsection

