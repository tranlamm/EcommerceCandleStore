@extends('layouts.customer.customer_layout_main')

@section('content')
<div class="product-detail">
    <div class="container">
        <div class="product-detail__wrapper">
            <div class="row">
                <div class="col col-4">
                    <div class="product-detail__img">
                        <img src="{{ asset('images/products/' . $product->image_path) }}" alt="">
                    </div>
                </div>
                <div class="col col-8">
                    <div class="product-info">
                        <div class="product-name__wrapper">
                            @if ($product->conLai <= 0)
                                <div class="product-detail__tag product-detail__tag--empty">SOLD OUT<i class="fa-solid fa-sack-xmark ms-1"></i></div> 
                            @elseif ($product->daBan > 100)
                                <div class="product-detail__tag product-detail__tag--hot">BEST SELLER<i class="fa-solid fa-fire ms-1"></i></div>
                            @elseif ($product->diemDanhGia > 4.5)
                                <div class="product-detail__tag product-detail__tag--love">RECOMMENDED<i class="fa-solid fa-heart ms-1"></i></div>
                            @else
                                <div class="product-detail__tag product-detail__tag--good-price">GOOD PRICE<i class="fa-solid fa-coins ms-1"></i></div>
                            @endif
                            <div class="product-name">{{ $product->tenSanPham }}</div>
                        </div>
                        <div class="product-price__wrapper">
                            <div class="product-price"><span class="me-2">HOT PRICE:</span> @currency_format($product->giaBan)</div>
                            <div class="product-price-label"><i class="fa-solid fa-tag me-2"></i>Giá tốt nhất so vỡi các sản phẩm cùng loại</div>
                        </div>
                        <div class="product-text"><span class="product-span">Mặt hàng</span>: {{ $product->loaiSanPham }}</div>
                        <div class="product-text"><span class="product-span">Nhà cung cấp</span>: {{ $product->manufacturer()->first()->ten }}</div>
                        <div class="product-text"><span class="product-span">Loại mùi hương</span>: {{ $product->fragrance()->first()->theLoai }}</div>
                        <div class="product-text"><span class="product-span">Mùi hương</span>: {{ $product->muiHuong }}</div>
                        <div class="product-text"><span class="product-span">Trọng lượng</span>: 
                            {{ $product->trongLuong }}
                            @switch($product->loaiSanPham)
                                @case('essential oil')
                                    <span>ml</span>
                                    @break
                                @default
                                    <span>gam</span>                                
                            @endswitch
                        </div>
                        <div class="product-des">{{ $product->moTa }}</div>
                    </div>

                    <div class="product-buy">
                        <div class="product-quantity">
                            <div class="quantity-label">Số lượng</div>
                            <input type="number" min="1" max="{{ $product->conLai }}" class="quantity-input" id="quantity" required>
                            <div class="quantity-left">{{ $product->conLai }} sản phẩm có sẵn</div>
                        </div>
                        <div class="error-quantity" id="error-message">Vui lòng nhập số lượng sản phẩm</div>
                        <div class="product-buy-btn" id="add-to-cart">Thêm vào giỏ hàng</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="manufacturer-detail__wrapper">
            <div class="manufacturer-logo__wrapper">
                <img src="{{ asset('images/manufacturers/' . $product->manufacturer()->first()->image_path) }}" alt="">
            </div>
            <div class="manufacturer-info">
                <div class="manufacturer-text"><span class="manufacturer-span">Nhà cung cấp</span>: {{ $product->manufacturer()->first()->ten }}</div>
                <div class="manufacturer-text"><span class="manufacturer-span">Địa chỉ</span>: {{ $product->manufacturer()->first()->diaChi }}</div>
                <div class="manufacturer-text"><span class="manufacturer-span">Số điện thoại</span>: {{ $product->manufacturer()->first()->soDienThoai }}</div>
            </div>
        </div>

        <div id="reviewCustomer-vue">
            <review-wrapper :product_id={{ $product->id }}></review-wrapper>
        </div>
    </div>
</div>

{{-- Toast add success to cart --}}
<div class="add-toast add-toast-success">
    <div class="d-flex justify-content-between align-items-center">
        <a href="{{ route('cart.index') }}" class="view-cart-btn">View cart</a>
        <div class="add-toast-btn"><i class="fa-solid fa-xmark"></i></div>
    </div>
    <div class="add-toast-text">Đã thêm sản phẩm vào giỏ hàng</div>
</div>

<div class="add-toast add-toast-fail">
    <div class="add-toast-text">Số lượng sản phẩm trong kho không đủ</div>
    <div class="add-toast-btn"><i class="fa-solid fa-xmark"></i></div>
</div>
{{-- End toast --}}

<meta name="csrf-token" content="{{ csrf_token() }}">
<script type="text/javascript">
    $(document).ready(function()
    {
        $('#add-to-cart').click(function()
        {
            @if (Auth::guard('customer')->check())
                const id = {{ $product->id }};
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'post',
                    url: `/customer/product/${id}/addcart`,
                    data: {
                        'id' : id,
                        'quantity' : $('#quantity').val(),
                    },
                    success: function(data)
                    {
                        $('.add-toast').removeClass('add-toast-active');
                        $('#error-message').hide();
                        if ($.isEmptyObject(data.errors)) {
                            setTimeout(() => {
                                $('.add-toast-success').addClass('add-toast-active');
                            }, 100);
                        }
                        else {
                            const resp = data.errors;
                            if (resp == 'Not enough')
                                setTimeout(() => {
                                    $('.add-toast-fail').addClass('add-toast-active');
                                }, 100);
                            else if (resp == 'Failed')
                                $('#error-message').show();
                        }
                    },
                });
            @else
                window.location = '{{ route('login_customer.index') }}';
            @endif
        })
        $('.add-toast-btn').click(function()
        {
            $('.add-toast').removeClass('add-toast-active');
        })
    })
</script>
@endsection