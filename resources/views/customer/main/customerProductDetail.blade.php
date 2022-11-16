@extends('layouts.customer.customer_layout_main')

@section('content')
<div class="product-detail">
    <div class="container">
        <div class="row">
            <div class="col col-6">
                <img src="{{ asset('images/products/' . $product->image_path) }}" alt="">
            </div>
            <div class="col col-6">
                <div class="product-info">
                    <div class="product-name">{{ $product->tenSanPham }}</div>
                    <div class="product-price">@currency_format($product->giaBan)</div>
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
            </div>
        </div>
    </div>
</div>
@endsection