@extends('layouts.customer.customer_layout_login')

@section('content')

<div class="account_info">
    <div class="container-md">
        <div class="row">
            <div class="col col-xl-6 col-lg-8 col-md-10 col-12 mx-auto">
                <div class="info-wrapper" id="info">
                    <div class="info-header">
                        Thông tin tài khoản cá nhân 
                        @if (session()->has('message'))
                            <h4 class="text-success">{{ session()->get('message') }}</h4>
                        @endif
                    </div>
                    <div class="info-main">
                        <form id="info-change" action="{{ route('info.change') }}" class="info-form" method="POST">
                            @csrf
                            <div class="info-group">
                                <label class="info-label">Họ và tên <span class="text-danger">*</span></label>
                                <input type="text" name="fullname" class="info-input" placeholder="Fullname" value="{{ $customer->fullname }}" required>
                                @if ($errors->has('fullname'))
                                    <span class="text-danger">{{ $errors->first('fullname') }}</span>
                                @endif
                            </div>

                            <div class="info-group">
                            <label class="info-label">Số điện thoại <span class="text-danger">*</span></label>
                            <input type="text" name="phoneNumber" class="info-input" placeholder="Phone Number" 
                            value="{{ $customer->phoneNumber }}" required pattern="(84|0[3|5|7|8|9])+([0-9]{8})\b">
                                @if ($errors->has('phoneNumber'))
                                    <span class="text-danger">{{ $errors->first('phoneNumber') }}</span>
                                @endif
                            </div>

                            <div class="info-group">
                            <label class="info-label">Địa chỉ <span class="text-danger">*</span></label>
                            <input type="text" name="address" class="info-input" placeholder="Address" value="{{ $customer->address }}" required>
                                @if ($errors->has('address'))
                                    <span class="text-danger">{{ $errors->first('address') }}</span>
                                @endif
                            </div>
                        </form>
                    </div>
                    <div class="info-footer">
                        <div class="info-submit info-submit-change" id="switch_to_pass">Đổi mật khẩu</div>
                        <button type="submit" form="info-change" class="info-submit">Xác nhận</button>
                    </div>
                </div>

                <div class="info-wrapper" id="account">
                    <div class="info-header">
                        Đổi mật khẩu
                    </div>
                    <div class="info-main">
                        <form id="password-change" action="{{ route('password.change') }}" class="info-form" method="POST">
                            @csrf
                            <div class="info-group">
                                <label class="info-label">Username <span class="text-danger">*</span></label>
                                <input type="text" class="info-input" placeholder="Username" disabled value="{{ $customer->username }}">            
                            </div>
                            <div class="info-group">
                                <label class="info-label">Mật khẩu cũ <span class="text-danger">*</span></label>
                                <div class="input-reveal">
                                    <input type="password" name="old_password" class="info-input" required placeholder="Old Password" minlength="8">
                                    <i data-name="old_password" class="fa-solid fa-eye-slash reveal-btn"></i>
                                </div>
                                @if ($errors->has('old_password'))
                                    <span class="text-danger">{{ $errors->first('old_password') }}</span>
                                @endif
                            </div>
                            <div class="info-group">
                                <label class="info-label">Mật khẩu mới <span class="text-danger">*</span></label>
                                <div class="input-reveal">
                                    <input type="password" name="password" class="info-input" required placeholder="Password" minlength="8">
                                    <i data-name="password" class="fa-solid fa-eye-slash reveal-btn"></i>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="info-group">
                                <label class="info-label">Nhập lại mật khẩu mới <span class="text-danger">*</span></label>
                                <div class="input-reveal">
                                    <input type="password" name="password_confirmation" class="info-input" required placeholder="Confirm Password" minlength="8">
                                    <i data-name="password_confirmation" class="fa-solid fa-eye-slash reveal-btn"></i>
                                </div>
                            </div>
                        </form> 
                    </div>
                    <div class="info-footer">
                        <div class="info-submit info-submit-change" id="switch_to_info">Chỉnh sửa thông tin</div>
                        <button type="submit" form="password-change" class="info-submit">Xác nhận</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#account').hide();

    @if ($errors->has('password') || $errors->has('old_password'))
        $('#account').show();
        $('#info').hide();
    @endif

    $('#switch_to_info').click(function()
    {
        $('#info').show();
        $('#account').hide();
    })

    $('#switch_to_pass').click(function()
    {
        $('#info').hide();
        $('#account').show();
    })

    $('.reveal-btn').click(function()
    {
        const name = $(this).attr('data-name');
        const input = $(`input[name='${name}']`);
        if (input.attr('type') == 'password')
            input.attr('type', 'text')
        else
            input.attr('type', 'password')
        input.focus();
    })
</script>
@endsection