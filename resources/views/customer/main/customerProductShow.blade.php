@extends('layouts.customer.customer_layout_main')
@section('content')
<div class="container mt-2">
    <img src="{{ asset('images/shop/banner_sale.jpg') }}" alt="sale merry christmas">
</div>
@include('layouts.customer.components.searchbar')
<div class="content-product-wrapper">
    <div class="container">
        <div class="row">
            @if (count($products) > 0)
                @foreach ($products as $product)
                    <div class="col col-3">
                        <div class="product">
                            <a href="{{ route('product.detail', ['id' => $product->id]) }}" class="product-wrapper">
                                <div class="product-img">
                                    <img src="{{ asset('images/products/' . $product->image_path) }}" alt="Product">
                                </div>
                                <div class="product-info">
                                    <div class="d-flex flex-column align-items-center">
                                        <div class="product-name">{{ $product->tenSanPham }}</div>
                                        <div class="product-type">{{ $product->loaiSanPham }}</div>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <div class="product-manufacturer">{{ 'Nhà cung cấp: ' . $product->manufacturer()->first()->ten }}</div>
                                        <div class="product-fragrance">{{ 'Mùi hương: ' .$product->muiHuong }}</div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <div class="product-price">@currency_format($product->giaBan)</div>
                                        <div class="product-review">
                                            @php
                                                $percent = round($product->diemDanhGia / 5 * 100, 0);
                                            @endphp
                                            <div class="stars-outer">
                                                <div class="stars-inner" style="{{ 'width: ' . $percent . "%" }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="product-btn add-cart-btn" data-id="{{ $product->id }}">Add to cart</div>
                            @if ($product->conLai <= 0)
                                <div class="product-tag product-tag__empty">SOLD OUT<i class="fa-solid fa-sack-xmark ms-2"></i></div> 
                            @elseif ($product->daBan > 10)
                                <div class="product-tag product-tag__hot">BEST SELLER<i class="fa-solid fa-fire ms-2"></i></div>
                            @elseif ($product->diemDanhGia > 4.5)
                                <div class="product-tag product-tag__love">RECOMMENDED<i class="fa-solid fa-heart ms-2"></i></div>
                            @else
                                <div class="product-tag product-tag__good-price">GOOD PRICE<i class="fa-solid fa-coins ms-2"></i></div>
                            @endif
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col col-6 offset-3 empty-product-list">
                    <img src="{{ asset('images/shop/empty-invoice.webp') }}" alt="empty">
                </div>
            @endif
        </div>
        <div class="product-pagination">
            {{ $products->links('pagination::bootstrap-5') }}
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
        $('.add-cart-btn').click(function()
        {   
            @if (Auth::guard('customer')->check())
                const id = $(this).attr('data-id');
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
                        'quantity' : 1,
                    },
                    success: function(data)
                    {
                        $('.add-toast').removeClass('add-toast-active');
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
                        }
                    },
                });
            @else
                window.location = '{{ route('login_customer.index') }}';
            @endif
        });
        $('.add-toast-btn').click(function()
        {
            $('.add-toast').removeClass('add-toast-active');
        })
    })
</script>
@endsection