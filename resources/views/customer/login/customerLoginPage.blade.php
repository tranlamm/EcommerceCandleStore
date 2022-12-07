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
                    {{-- Sign in --}}
                    <form action="{{ route('login_customer.post') }}" class="form-wrapper" id="form-sign_in" method="POST">
                        @csrf
                        @if (session()->has('message'))
                            <span class="text-success mb-2">{{ session()->get('message') }}</span>
                        @endif
                        <div class="form-header">
                            <div class="form-header-main">Đăng nhập</div>
                            <div class="form-header-sub" id="switch-to-signup">Đăng ký</div>
                        </div>
                        <div class="form-main">
                            <input type="text" value="{{ old('username') }}" name="username" class="form-input" placeholder="Username" required>
                            @if ($errors->has('username'))
                                <span class="text-danger">{{ $errors->first('username') }}</span>
                            @endif
                            <div class="input-reveal">
                                <input type="password" id="signin-password" name="password" class="form-input" placeholder="Password" required>
                                <i data-name="signin-password" class="fa-solid fa-eye-slash reveal-btn"></i>
                            </div>
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                            @if (session()->has('wrong'))
                                <span class="text-danger text-center mt-2"><strong>{{ session()->get('wrong') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-submit">
                            <button class="form-submit-btn">Đăng nhập</button>
                            <div class="form-helper">
                                <div class="form-helper-label">Quên mật khẩu</div>
                                <div>
                                    <input class="form-helper-input" id="ckb1" type="checkbox">
                                    <label class="form-helper-label" for="ckb1">
                                        Remember me
                                    </label>
                                </div>
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
                    {{-- Sign up --}}
                    <form action="{{ route('register_customer.post') }}" class="form-wrapper" id="form-sign_up" method="POST">
                        @csrf
                        <div class="form-header">
                            <div class="form-header-main">Đăng ký</div>
                            <div class="form-header-sub" id="switch-to-signin">Đăng nhập</div>
                        </div>
                        <div class="form-main">
                            <input type="text" class="form-input form-input-info" placeholder="Full Name" name="fullname" value="{{ old('fullname') }}" required>
                            @if ($errors->has('fullname'))
                                <span class="text-danger">{{ $errors->first('fullname') }}</span>
                            @endif
                            <input type="text" class="form-input form-input-info" placeholder="Address" name="address" value="{{ old('address') }}" required>
                            @if ($errors->has('address'))
                                <span class="text-danger">{{ $errors->first('address') }}</span>
                            @endif
                            <input type="tel" class="form-input form-input-info" placeholder="Phone Number" name="phoneNumber" 
                            value="{{ old('phoneNumber') }}" maxlength="11" required pattern="(84|0[3|5|7|8|9])+([0-9]{8})\b"/> 
                            @if ($errors->has('phoneNumber'))
                                <span class="text-danger">{{ $errors->first('phoneNumber') }}</span>
                            @endif
                            <input type="text" class="form-input form-input-info" placeholder="Email" name="email" 
                            value="{{ old('email') }}" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                            <div class="form-input-split"></div>
                            <input type="text" class="form-input form-input-info" placeholder="Username" name="username" value="{{ old('username') }}" required>
                            @if ($errors->has('username'))
                                <span class="text-danger">{{ $errors->first('username') }}</span>
                            @endif
                            @if ($errors->has('exists'))
                                <span class="text-danger">{{ $errors->first('exists') }}</span>
                            @endif
                            <div class="input-reveal input-reveal-sm">
                                <input type="password" id="register-password" class="form-input form-input-info" placeholder="Password" name="password" required>
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
                            <button class="form-submit-btn">Đăng ký</button>
                            <div class="form-submit-text">
                                <div>Bằng việc đăng kí, bạn đã đồng ý với Shopee về</div>
                                <div>
                                    <span class="text-red">Điều khoản dịch vụ</span> & 
                                    <span class="text-red">Chính sách bảo mật</span>
                                </div>
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

<script>
    $('#form-sign_up').hide();
    @if ($errors->any())
        $('#form-sign_up').show();
        $('#form-sign_in').hide();
    @endif
    $('#switch-to-signin').click(function()
    {
        $('#form-sign_in').show();
        $('#form-sign_up').hide();
    })
    $('#switch-to-signup').click(function()
    {
        $('#form-sign_up').show();
        $('#form-sign_in').hide();
    })
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