<header class="header">
    <div class="top-bar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col col-6">
                    <div class="d-flex justify-content-start">
                        <div>
                            <i class="fa-solid fa-phone me-2"></i>(+84) 0813345087
                        </div>
                        <div class="split"></div>
                        <div>
                            <i class="fa-solid fa-envelope me-2"></i>lam.t204759@sis.hust.edu.vn
                        </div>
                    </div>
                </div>
                <div class="col col-6">
                    <div class="d-flex justify-content-end">
                        <div class="top-bar__social">
                            <a href="" class="top-bar__social-link"><i class="fa-brands fa-facebook"></i></a>
                            <a href="" class="top-bar__social-link"><i class="fa-brands fa-linkedin"></i></a>
                            <a href="" class="top-bar__social-link"><i class="fa-brands fa-github"></i></a>
                            <a href="" class="top-bar__social-link"><i class="fa-brands fa-google"></i></a>
                        </div>
                        <div class="split"></div>
                        <div class="top-bar__login">
                            <a href="{{ route('login_customer.index') }}" class="top-bar__login-link"><i class="fa-solid fa-user me-2"></i>Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="middle-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col col-lg-2 col-md-2 col-12">
                    <div class="logo"><a href="{{ route('shop.index') }}"><img src="{{ asset('images/shop/logo-brand.png') }}" alt=""></a></div>
                </div>
                <div class="col col-lg-8 col-md-7 col-12">
                    <div class="d-flex justify-content-center">
                        <div class="search_bar">
                            <div class="dropdown search_bar-select">
                                <button class="dropdown-toggle search_bar-dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                All Category
                                </button>
                                <ul class="dropdown-menu">
                                  <li class="dropdown-item search_bar-item search-type" data-type="candle">Nến thơm</li>
                                  <li class="dropdown-item search_bar-item search-type" data-type="scented wax">Sáp thơm</li>
                                  <li class="dropdown-item search_bar-item search-type" data-type="essential oil">Tinh dầu</li>
                                </ul>
                            </div>
                            <input class="search_bar-input" type="text" placeholder="Search" spellcheck="false" id="search-name-text">
                            <button id="search-btn" class="search_bar-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </div>
                </div>
                <div class="col col-lg-2 col-md-3 col-12">
                    <div class="right_bar">
                        <div class="right_bar-item"><i class="fa-regular fa-heart"></i></div>
                        <div class="right_bar-item"><i class="fa-solid fa-circle-user"></i></div>
                        <div class="right_bar-item">
                            <div class="dropdown dropdown-menu-end">
                                <div class="dropdown-toggle cart-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </div>
                                <div class="dropdown-menu cart-wrapper">
                                    <div class="cart-header">
                                        <div>2 ITEMS</div>
                                        <a class="view-cart">VIEW CART</a>
                                    </div>
                                    <div class="cart-split"></div>
                                    <div class="cart-list">
                                        <div class="cart-item">
                                            <div class="item-des">
                                                <div class="item-name">Nến thơm</div>
                                                <div class="item-price">@currency_format(100)</div>
                                            </div>
                                            <div class="item-img">
                                                <img src="{{ asset('images/products/uidev1_product.webp') }}" alt="Product">
                                            </div>
                                        </div>
                                        <div class="cart-item">
                                            <div class="item-des">
                                                <div class="item-name">Tinh dầu</div>
                                                <div class="item-price">@currency_format(100)</div>
                                            </div>
                                            <div class="item-img">
                                                <img src="{{ asset('images/products/uidev2_product.jpg') }}" alt="Product">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cart-total">
                                        <div>Total</div>
                                        <div>@currency_format(100)</div>
                                    </div>
                                    <a class="btn btn-dark cart-checkout" href="#" role="button">CHECKOUT</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header-inner" id="header__navbar">
        <div class="container">
            <div class="row">
                <div class="col col-3">
                    <div class="dropdown header__category">
                        <div class="header__category-dropdown dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-bars me-2"></i>CATEGORIES
                        </div>
                        <div class="header__category-list dropdown-menu">
                          <li><div class="dropdown-item header__category-item search-category" data-order-name="daBan" data-order-type="desc"><i class="fa-brands fa-bitcoin me-2"></i>Best seller</div></li>
                          <li><div class="dropdown-item header__category-item search-category" data-order-name="updated_at" data-order-type="desc"><i class="fa-solid fa-truck-fast me-2"></i>New arrivals</div></li>
                          {{-- <li><div class="dropdown-item header__category-item search-category" data-order-name="danhGia" data-order-type=""><i class="fa-solid fa-thumbs-up me-2"></i>Top rated</div></li> --}}
                          <li><div class="dropdown-item header__category-item search-type" data-type="candle"><i class="fa-solid fa-fire-flame-curved me-2"></i>Nến thơm</div></li>
                          <li><div class="dropdown-item header__category-item search-type" data-type="scented wax"><i class="fa-solid fa-soap me-2"></i>Sáp thơm</div></li>
                          <li><div class="dropdown-item header__category-item search-type" data-type="essential oil"><i class="fa-solid fa-bottle-droplet me-2"></i>Tinh dầu</div></li>
                        </div>
                    </div>
                </div>

                <div class="col col-9">
                    <div class="header__nav">
                        <a href="{{ route('shop.index') }}" class="header__nav-item">Home</a>
                        <a href="{{ route('product.index') }}" class="header__nav-item">Product</a>
                        <a href="" class="header__nav-item">Service</a>
                        <a href="" class="header__nav-item">Shop</a>
                        <a href="" class="header__nav-item">Pages</a>
                        <a href="" class="header__nav-item">Blog</a>
                        <a href="" class="header__nav-item">Contact us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{-- Hidden form for search --}}
<form class="search_bar" action="{{ route('product.index') }}" method="GET" id="search-form">
    @csrf
    <input type="hidden" id="search-name-input" name="search">
    <input type="hidden" id="search-type-input" name="type">
    <input type="hidden" id="search-order-name" name="order-name">
    <input type="hidden" id="search-order-type" name="order-type">
    <input type="hidden" id="search-order-fullname" name="order-fullname">
</form>
</header>

