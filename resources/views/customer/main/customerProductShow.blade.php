@extends('layouts.customer.customer_layout_main')
@section('content')
<div class="container mt-2">
    <img src="{{ asset('images/shop/banner_sale.jpg') }}" alt="sale merry christmas">
</div>
@include('layouts.customer.components.searchbar')
<div class="content-product-wrapper">
    <div class="container">
        <div class="row">
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
                                <div class="d-flex justify-content-between">
                                    <div class="product-price">@currency_format($product->giaBan)</div>
                                    {{-- <div class="product-review"></div> --}}
                                </div>
                            </div>
                        </a>
                        <div class="product-btn">Add to bag</div>
                        @if ($product->conLai <= 0)
                            <div class="product-tag product-tag__empty">HẾT HÀNG<i class="fa-solid fa-sack-xmark ms-2"></i></div> 
                        {{-- @elseif ($product->danhGia > 4.5)
                            <div class="product-tag product-tag__love">YÊU THÍCH<i class="fa-solid fa-heart ms-2"></i></div> --}}
                        @elseif ($product->daBan < 100)
                            <div class="product-tag product-tag__hot">BÁN CHẠY<i class="fa-solid fa-fire ms-2"></i></div>
                        @elseif ($product->giaBan < 1000000)
                            <div class="product-tag product-tag__good-price">GIÁ TỐT<i class="fa-solid fa-coins ms-2"></i></div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
        <div class="product-pagination">
            {{ $products->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection