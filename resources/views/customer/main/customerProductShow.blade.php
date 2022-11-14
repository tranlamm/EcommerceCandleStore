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
                        <a href="" class="product-wrapper">
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