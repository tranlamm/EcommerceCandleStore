@extends('layouts.customer.customer_layout_main')

@section('content')

<div class="cart">
    @if (session()->has('success'))
        <div class="add-toast add-toast-special">
            <div class="d-flex justify-content-between align-items-center">
                <div class="add-toast-text">{{ session()->get('success') }}</div>
                <div class="add-toast-btn"><i class="fa-solid fa-xmark"></i></div>
            </div>
        </div>
    @endif
    <div class="container-lg">
        @if (session()->has('cart'))
            <div class="cart__wrapper">
                <div class="cart-header">
                    <div class="d-flex align-items-center">
                        <input type="checkbox" class="cart-checkbox-total">
                        <div class="cart-label">Shopping Cart</div>
                    </div>
                    <div class="cart-empty" id="cart-empty">Xóa sản phẩm</div>
                </div>
                @if ($errors->has('wrong_product_id'))
                    <h3 class="text-danger">{{ $errors->first('wrong_product_id') }}</h3>
                @endif

                <form action="{{ route('product.checkout') }}" method="POST" id="checkout-form">
                    @csrf
                    <div class="cart-list">
                        @foreach ($products as $product)
                            <div class="cart-item" id="{{ 'cart-item' . $product['info']->id }}">
                                <input type="hidden" name="id[]", value="{{ $product['info']->id }}">
                                <input type="checkbox" class="cart-checkbox" data-id="{{ $product['info']->id }}">
                                <div class="cart-img">
                                    <img src="{{ asset('images/products/' . $product['info']->image_path) }}" alt="product">
                                </div>
                                <div class="cart-info">
                                    <div class="cart-text">{{ $product['info']->tenSanPham }}</div>
                                    <div class="cart-subtext">{{ $product['info']->manufacturer()->first()->ten }}</div>
                                </div>
                                <div class="cart-info">
                                    <div class="cart-subtext">Trọng lượng: {{ $product['info']->trongLuong }}</div>
                                    <div class="cart-subtext">Mùi hương: {{ $product['info']->fragrance()->first()->theLoai }}</div>
                                    <div class="cart-subtext">Còn lại: <span class="text-danger">{{ $product['info']->conLai }}</span> sản phẩm</div>
                                </div>
                                <div class="cart-dongia" id="{{ 'cart-dongia' . $product['info']->id }}" data-value="{{ $product['info']->giaBan }}">@currency_format( $product['info']->giaBan)</div>
                                <div class="cart-quantity-wrapper">
                                    <input type="number" class="cart-quantity" name="quantity[]" data-id="{{ $product['info']->id }}" 
                                        old-quantity="{{ $product['quantity'] }}" value="{{ $product['quantity'] }}" 
                                        min="1" max="{{ $product['info']->conLai }}" id="{{ 'cart-quantity' . $product['info']->id}}">
                                    @if ($errors->has($product['info']->id))
                                        <span class="cart-error-msg">{{ $errors->first($product['info']->id) }}</span>
                                    @endif
                                </div>
                                <div class="cart-tongtien" id="{{ 'cart-tongtien' . $product['info']->id }}">@currency_format( $product['info']->giaBan * $product['quantity'])</div>
                                <div class="cart-delete" data-id="{{ $product['info']->id }}">Xóa</div>
                            </div>
                        @endforeach
                    </div>
    
                    <div class="cart-checkout">
                        <div class="cart-total">
                            <span class="me-2">Tổng thanh toán:</span>
                            <span id="cart-total" data-value="{{ $total }}">@currency_format( $total )</span>
                        </div>
                        <button type="button" id="modal-btn" data-bs-toggle="modal" data-bs-target="#checkoutModal" class="cart-checkout-btn">Đặt hàng</button>
                    </div>
                </form>
            </div>
        @else
            <div class="empty-cart">
                <div class="empty-cart-img">
                    <img src="{{ asset('images/shop/empty-cart.png') }}" alt="empty cart">
                </div>
                <a href="{{ route('product.index') }}" class="product-show-btn">Buy Product</a>
            </div>
        @endif
    </div>
</div>

{{-- Modal Checkout --}}
<div class="modal fade modal-checkout" id="checkoutModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-header-title">Thông tin đơn hàng</div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="modal-body-text"><span class="modal-body-label">Tên khách hàng</span>: {{ Auth::guard('customer')->user()->fullname }}</div>
                <div class="modal-body-text"><span class="modal-body-label">Địa chỉ</span>: {{ Auth::guard('customer')->user()->address }}</div>
                <div class="modal-body-text"><span class="modal-body-label">Số điện thoại</span>: {{ Auth::guard('customer')->user()->phoneNumber }}</div>
                <div class="modal-body-text"><span class="modal-body-label">Email</span>: {{ Auth::guard('customer')->user()->email }}</div>
            
                <div class="modal-body-detail">
                    <a href="{{ route('account.index') }}" class="modal-btn">Thay đổi thông tin cá nhân</a>
                    <div class="modal-body-total">Tổng thanh toán: <span class="ms-2" id="modal-total-js"></span></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="modal-btn modal-btn-sm modal-btn-cancel" data-bs-dismiss="modal">Hủy</button>
                <button type="submit" form="checkout-form" class="modal-btn modal-btn-sm">Xác nhận</button>
            </div>
        </div>
    </div>
</div>

<meta name="csrf-token" content="{{ csrf_token() }}">
<script type="text/javascript">
    @if (session()->has('success'))
        $('.add-toast-special').addClass('add-toast-active');
        $('.add-toast-btn').click(function()
        {
            $('.add-toast').removeClass('add-toast-active');
        })
    @endif

    $('.cart-checkbox').change(function()
    {
        if ($('.cart-checkbox:checked').length > 0) 
            $('.cart-empty').show();
        else
            $('.cart-empty').hide();
        if ($('.cart-checkbox').length == $('.cart-checkbox:checked').length)
            $('.cart-checkbox-total').prop('checked', true);
        else
            $('.cart-checkbox-total').prop('checked', false);
    });

    $('.cart-checkbox-total').change(function()
    {
        if ($(this).is(':checked'))
        {
            $('.cart-checkbox').prop('checked', true);
            $('.cart-empty').show();
        }
        else
        {
            $('.cart-checkbox').prop('checked', false);
            $('.cart-empty').hide();
        }
    });

    const deleteCartItem = (ids) => {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });
        $.ajax({
            type: 'post',
            url:  '{{ route('product.deletecartitem') }}',
            data: {
                'ids' : ids,
            },
            success: function(data)
            {
                if ($.isEmptyObject(data.errors)) {
                    if (data.empty)
                        location.reload();
                    else 
                    {
                        ids.forEach((id) => {
                            const oldTotal = $('#cart-total').attr('data-value');
                            const newTotal = oldTotal - $(`#cart-dongia${id}`).attr('data-value') * $(`#cart-quantity${id}`).val();
                            $('#cart-total').attr('data-value', newTotal);
                            $('#cart-total').text(newTotal.toLocaleString('it-IT', {style : 'currency', currency : 'VND'}));
                            $('#cart-item' + id).remove();
                        })
                    }
                }
            },
        });
    }

    const deleteAllCart = () => {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });
        $.ajax({
            type: 'post',
            url:  '{{ route('product.deleteallcart') }}',
            success: function(data)
            {
                if ($.isEmptyObject(data.errors)) {
                    location.reload();
                }
            },
        });
    }

    $(document).ready(function()
    {
        $('.cart-delete').click(function()
        {
            const ids = [];
            ids.push($(this).attr('data-id'));
            deleteCartItem(ids);
        });

        $('#cart-empty').click(function()
        {
            if ($('.cart-checkbox-total').is(':checked'))
                deleteAllCart();
            else 
            {
                const ids = [];
                $('.cart-checkbox:checked').each(function()
                {
                    ids.push($(this).attr('data-id'));
                })
                deleteCartItem(ids);
            }
            $('#cart-empty').hide();
        })
    })

    $('.cart-quantity').change(function()
    {
        const id = $(this).attr('data-id');
        const dongia = $(`#cart-dongia${id}`).attr('data-value');
        const newQuantity = $(this).val();
        $(`#cart-tongtien${id}`).text((dongia * newQuantity).toLocaleString('it-IT', {style : 'currency', currency : 'VND'}));
        const oldQuantity = $(this).attr('old-quantity');
        const newTotal = parseInt($('#cart-total').attr('data-value')) + dongia * (newQuantity - oldQuantity);
        $('#cart-total').attr('data-value', newTotal);
        $('#cart-total').text(newTotal.toLocaleString('it-IT', {style : 'currency', currency : 'VND'}));
        $(this).attr('old-quantity', newQuantity);
    })

    $('#modal-btn').click(function()
    {
        $('#modal-total-js').text($('#cart-total').text());
    })
</script>
@endsection