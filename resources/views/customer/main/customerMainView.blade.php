@extends('layouts.customer.customer_layout_main')

@section('content')
<div class="banner container-fluid">
    <div class="row">
        <div class="col col-xl-6 col-lg-5 d-lg-block d-none banner-wrapper">
            <img class="banner-main" src="{{ asset('images/shop/banner_image1.webp') }}" alt="banner img">
            <div class="banner-main-info">
                <div class="banner-main-name">CANDLE SHOP</div>
                <div class="banner-main-title">Let fragrance dreams become reality with a unique blend of sapphire berries, night-blooming orchid and crystalized vanilla.</div>
                <a href="{{ route('product.index') }}" class="banner-main-btn">SHOP NOW</a>
            </div>
        </div>

        <div class="col col-xl-6 col-lg-7 col-12">
            <div class="row mb-3">
                <div class="col col-6 banner-wrapper">
                    <img class="banner-category" src="{{ asset('images/products/uidev6_product.jpg') }}" alt="banner img">
                    <div class="banner-category-info">
                        <div class="banner-name">Single Wick Candle</div>
                        <div class="banner-btn header__search-type" data-type="single wick candle">SHOP NOW</div>
                    </div>
                </div>
                <div class="col col-6 banner-wrapper">
                    <img class="banner-category" src="{{ asset('images/products/uidev2_product.jpg') }}" alt="banner img">
                    <div class="banner-category-info">
                        <div class="banner-name">3 Wick Candle</div>
                        <div class="banner-btn header__search-type" data-type="3 wick candle">SHOP NOW</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col col-6 banner-wrapper" >
                    <img class="banner-category" src="{{ asset('images/products/uidev1_product.webp') }}" alt="banner img">
                    <div class="banner-category-info">
                        <div class="banner-name">Essential Oil</div>
                        <div class="banner-btn header__search-type" data-type="essential oil">SHOP NOW</div>
                    </div>
                </div>
                <div class="col col-6 banner-wrapper" >
                    <img class="banner-category" src="{{ asset('images/products/uidev5_product.jpg') }}" alt="banner img">
                    <div class="banner-category-info">
                        <div class="banner-name">Scented Wax</div>
                        <div class="banner-btn header__search-type" data-type="scented wax">SHOP NOW</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-lg">
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

<div class="shopping d-none d-md-block">
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
                        <a href="{{ route('product.index') }}" class="shopping-btn">Search Now<i class="fa-solid fa-magnifying-glass ms-2"></i></a>
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
                <div class="col col-lg-3 col-sm-6 col-12 mt-3 mt-lg-0">
                    <div class="category-item header__search-type" data-type="single wick candle">
                        <div class="category-img">
                            <img src="{{ asset('images/products/uidev6_product.jpg') }}" alt="Product img">
                        </div>
                        <div class="category-name">Single Wick Candle</div>
                    </div>
                </div>
                <div class="col col-lg-3 col-sm-6 col-12 mt-3 mt-lg-0">
                    <div class="category-item header__search-type" data-type="3 wick candle">
                        <div class="category-img">
                            <img src="{{ asset('images/products/uidev2_product.jpg') }}" alt="Product img">
                        </div>
                        <div class="category-name">3 Wick Candle</div>
                    </div>
                </div>
                <div class="col col-lg-3 col-sm-6 col-12 mt-3 mt-lg-0">
                    <div class="category-item header__search-type" data-type="essential oil">
                        <div class="category-img">
                            <img src="{{ asset('images/products/uidev1_product.webp') }}" alt="Product img">
                        </div>
                        <div class="category-name">Essential Oil</div>
                    </div>
                </div>
                <div class="col col-lg-3 col-sm-6 col-12 mt-3 mt-lg-0">
                    <div class="category-item header__search-type" data-type="scented wax">
                        <div class="category-img">
                            <img src="{{ asset('images/products/uidev5_product.jpg') }}" alt="Product img">
                        </div>
                        <div class="category-name">Scented Wax</div>
                    </div>
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
        <a href="{{ route('login_customer.index') }}" class="newsletter-btn">SUBSCRIBE</a>
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
                <div class="col col-lg-3 col-sm-6 col-12 mt-5 mt-lg-0 d-flex justify-content-center">
                    <div class="service-item">
                        <div class="service-icon"><i class="fa-solid fa-truck"></i></div>
                        <div class="service-info">
                            <div class="service-name">FREE SHIPING</div>
                            <div class="service-des">Orders over @currency_format(1000000)</div>
                        </div>
                    </div>
                </div>
                <div class="col col-lg-3 col-sm-6 col-12 mt-5 mt-lg-0 d-flex justify-content-center">
                    <div class="service-item">
                        <div class="service-icon"><i class="fa-solid fa-arrows-rotate"></i></div>
                        <div class="service-info">
                            <div class="service-name">FREE RETURN</div>
                            <div class="service-des">Within 7 days returns</div>
                        </div>
                    </div>
                </div>
                <div class="col col-lg-3 col-sm-6 col-12 mt-5 mt-lg-0 d-flex justify-content-center">
                    <div class="service-item">
                        <div class="service-icon"><i class="fa-solid fa-lock"></i></div>
                        <div class="service-info">
                            <div class="service-name">SUCURE PAYMENT</div>
                            <div class="service-des">100% secure payment</div>
                        </div>
                    </div>
                </div>
                <div class="col col-lg-3 col-sm-6 col-12 mt-5 mt-lg-0 d-flex justify-content-center">
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

<form action="{{ route('product.index') }}">
    <input type="hidden" name="type">
</form>

<script>
    const navbar = $('#header__navbar');
    $(window).scroll(function()
    {
        if($(this).scrollTop() >= 300)
        {
            navbar.addClass('navbar--active');
        }
        else {
            navbar.removeClass('navbar--active');
        }
    })
</script>
@endsection