@extends('layouts.customer.customer_layout_main')

@section('content')
<div class="banner container-fluid">
    <div class="row">
        <div class="col col-6 banner-wrapper">
            <img class="banner-main" src="{{ asset('images/shop/banner_image1.webp') }}" alt="banner img">
            <div class="banner-main-info">
                <div class="banner-main-name">CANDLE SHOP</div>
                <div class="banner-main-title">Let fragrance dreams become reality with a unique blend of sapphire berries, night-blooming orchid and crystalized vanilla.</div>
                <a href="{{ route('product.index') }}" class="banner-main-btn">SHOP NOW</a>
            </div>
        </div>

        <div class="col col-6">
            <div class="row mb-3">
                <div class="col col-6 banner-wrapper">
                    <img class="banner-category" src="{{ asset('images/products/uidev6_product.jpg') }}" alt="banner img">
                    <div class="banner-category-info">
                        <div class="banner-name">Single Wick Candle</div>
                        <a href="" class="banner-btn">SHOP NOW</a>
                    </div>
                </div>
                <div class="col col-6 banner-wrapper">
                    <img class="banner-category" src="{{ asset('images/products/uidev2_product.jpg') }}" alt="banner img">
                    <div class="banner-category-info">
                        <div class="banner-name">3 Wick Candle</div>
                        <a href="" class="banner-btn">SHOP NOW</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col col-6 banner-wrapper" >
                    <img class="banner-category" src="{{ asset('images/products/uidev1_product.webp') }}" alt="banner img">
                    <div class="banner-category-info">
                        <div class="banner-name">Essential Oil</div>
                        <a href="" class="banner-btn">SHOP NOW</a>
                    </div>
                </div>
                <div class="col col-6 banner-wrapper" >
                    <img class="banner-category" src="{{ asset('images/products/uidev5_product.jpg') }}" alt="banner img">
                    <div class="banner-category-info">
                        <div class="banner-name">Scented Wax</div>
                        <a href="" class="banner-btn">SHOP NOW</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <img src="{{ asset('images/shop/banner_sale.jpg') }}" alt="sale merry christmas">
</div>

<div class="trending-item container-fluid">
    @include('layouts.customer.components.carousel')
</div>

<div class="banner-sale container">
    <div class="row gx-2">
        <div class="col col-6 px-1">
            <img src="{{ asset('images/shop/banner_image8.webp') }}" alt="">
        </div>
        <div class="col col-6 px-1">
            <img src="{{ asset('images/shop/banner_image7.webp') }}" alt="sale merry christmas">
        </div>
    </div>
</div>

<div class="shopping">
    <div class="container">
        <div class="row gx-2">
            <div class="col col-6 shopping-wrapper px-1">
                <img src="{{ asset('images/shop/banner_image3.webp') }}" alt="shopping">
            </div>
            <div class="col col-6 shopping-wrapper  px-1">
                <div class="shopping-info-wrapper">
                    <div class="shopping-info">
                        <div class="shopping-name">CANDLE SHOP WONDERLAND</div>
                        <div class="shopping-label">Experience the Wonder</div>
                        <div class="shopping-des">Experience the holiday magic of a Candle Shop with fragrances that embrace a perfect day.</div>
                        <a href="" class="shopping-btn">Search Now<i class="fa-solid fa-magnifying-glass ms-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="category">
    <div class="category-wrapper">
        <div class="category-label">SHOP BY CATEGORY</div>
        <div class="container">
            <div class="row">
                <div class="col col-3">
                    <a href="" class="category-item">
                        <div class="category-img">
                            <img src="{{ asset('images/products/uidev6_product.jpg') }}" alt="Product img">
                        </div>
                        <div class="category-name">Single Wick Candle</div>
                    </a>
                </div>
                <div class="col col-3">
                    <a href="" class="category-item">
                        <div class="category-img">
                            <img src="{{ asset('images/products/uidev2_product.jpg') }}" alt="Product img">
                        </div>
                        <div class="category-name">3 Wick Candle</div>
                    </a>
                </div>
                <div class="col col-3">
                    <a href="" class="category-item">
                        <div class="category-img">
                            <img src="{{ asset('images/products/uidev1_product.webp') }}" alt="Product img">
                        </div>
                        <div class="category-name">Essential Oil</div>
                    </a>
                </div>
                <div class="col col-3">
                    <a href="" class="category-item">
                        <div class="category-img">
                            <img src="{{ asset('images/products/uidev5_product.jpg') }}" alt="Product img">
                        </div>
                        <div class="category-name">Scented Wax</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="newsletter container">
    <div class="row">
        <div class="newsletter-label">NEWSLETTER</div>
        <div class="newsletter-des">Subscribe to our newsletter and get 10% off your first purchase</div>
    </div>
    <div class="row justify-content-center">
        <a href="" class="newsletter-btn">SUBSCRIBE</a>
    </div>
</div>

<div class="service">
    <div class="category-banner">
        <div class="category-banner-wrapper">
            <img src="{{ asset('images/shop/banner_image2.1.webp') }}" alt="">
            <img src="{{ asset('images/shop/banner_image2.webp') }}" alt="banner category">
            <a href="" class="view-banner">
                View Pages
            </a>
        </div>
        <div class="category-banner-wrapper">
            <img src="{{ asset('images/shop/banner_image4.1.webp') }}" alt="">
            <img src="{{ asset('images/shop/banner_image4.webp') }}" alt="banner category">
            <a href="" class="view-banner">
                View Blogs
            </a>
        </div>
    </div>
    <div class="service-wrapper">

        <div class="container">
            <div class="row">
                <div class="col col-3 d-flex justify-content-center">
                    <div class="service-item">
                        <div class="service-icon"><i class="fa-solid fa-truck"></i></div>
                        <div class="service-info">
                            <div class="service-name">FREE SHIPING</div>
                            <div class="service-des">Orders over @currency_format(1000000)</div>
                        </div>
                    </div>
                </div>
                <div class="col col-3 d-flex justify-content-center">
                    <div class="service-item">
                        <div class="service-icon"><i class="fa-solid fa-arrows-rotate"></i></div>
                        <div class="service-info">
                            <div class="service-name">FREE RETURN</div>
                            <div class="service-des">Within 7 days returns</div>
                        </div>
                    </div>
                </div>
                <div class="col col-3 d-flex justify-content-center">
                    <div class="service-item">
                        <div class="service-icon"><i class="fa-solid fa-lock"></i></div>
                        <div class="service-info">
                            <div class="service-name">SUCURE PAYMENT</div>
                            <div class="service-des">100% secure payment</div>
                        </div>
                    </div>
                </div>
                <div class="col col-3 d-flex justify-content-center">
                    <div class="service-item">
                        <div class="service-icon"><i class="fa-solid fa-tag"></i></div>
                        <div class="service-info">
                            <div class="service-name">BEST PRICE</div>
                            <div class="service-des">Guaranteed price</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="banner-image-bottom">
    <img src="{{ asset('images/shop/banner_image5.webp') }}" alt="Christmas Event">
</div>

@endsection