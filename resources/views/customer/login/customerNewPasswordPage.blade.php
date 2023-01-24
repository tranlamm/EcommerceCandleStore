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
                    <form action="{{ route('reset_customer.patch') }}" class="form-wrapper" id="form-sign_in" method="POST">
                        @csrf
                        @method('patch')
                        <div class="form-header">
                            <div class="form-header-main text-success">Create a new password</div>
                        </div>
                        <div class="form-main">
                            <input type="text" class="form-input" value="{{ $customer->username }}" disabled readonly>
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

