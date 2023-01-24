<header class="header">
    <div class="top-bar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col col-6 d-none d-lg-block">
                    <div class="d-flex justify-content-start align-items-center">
                        <div>
                            <i class="fa-solid fa-phone me-2"></i>(+84) 0813345087
                        </div>
                        <div class="split"></div>
                        <div>
                            <i class="fa-solid fa-envelope me-2"></i>lam.t204759@sis.hust.edu.vn
                        </div>
                    </div>
                </div>
                <div class="col col-lg-6 col-12">
                    <div class="d-flex justify-content-end align-items-center">
                        <div class="top-bar__social">
                            <a href="" class="top-bar__social-link"><i class="fa-brands fa-facebook"></i></a>
                            <a href="" class="top-bar__social-link"><i class="fa-brands fa-linkedin"></i></a>
                            <a href="" class="top-bar__social-link"><i class="fa-brands fa-github"></i></a>
                            <a href="" class="top-bar__social-link"><i class="fa-brands fa-google"></i></a>
                        </div>
                        <div class="split"></div>
                        <div class="top-bar__login">
                            @if (Auth::guard('customer')->check())
                                <div class="dropdown">
                                    <div class="logged_header" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-circle-user"></i></div>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <a href="{{ route('account.index') }}" class="dropdown-item">Tài khoản của tôi</a>
                                        <a href="{{ route('invoice.index') }}" class="dropdown-item">Đơn hàng</a>
                                        <form action="{{ route('logout_customer.post') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="dropdown-item">Đăng xuất</button>
                                        </form>
                                    </ul>
                                </div>
                            @else
                                <a href="{{ route('login_customer.index') }}" class="top-bar__login-link"><i class="fa-solid fa-user me-2"></i>Login</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="middle-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col col-lg-2 col-md-4">
                    <div class="row">
                        <div class="col col-md-12 col-6 mx-auto">
                            <div class="logo"><a href="{{ route('shop.index') }}"><img src="{{ asset('images/shop/logo-brand.png') }}" alt=""></a></div>
                        </div>
                    </div>
                </div>
                <div class="col col-lg-8 col-md-8 mb-4 mb-md-0">
                    <div class="d-flex justify-content-center">
                        <div class="search_bar">
                            <div class="dropdown search_bar-select">
                                <button class="dropdown-toggle search_bar-dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                All Category
                                </button>
                                <ul class="dropdown-menu">
                                  <li class="dropdown-item search_bar-item header__search-type" data-type="candle">Nến thơm</li>
                                  <li class="dropdown-item search_bar-item header__search-type" data-type="scented wax">Sáp thơm</li>
                                  <li class="dropdown-item search_bar-item header__search-type" data-type="essential oil">Tinh dầu</li>
                                </ul>
                            </div>
                            <input class="search_bar-input" type="text" placeholder="Search" spellcheck="false" id="header__search-name-text">
                            <button id="search-btn" class="search_bar-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </div>
                </div>
                <div class="col col-lg-2 d-none d-lg-block">
                    @if (Auth::guard('customer')->check())
                    <div class="right_bar">
                        <div class="right_bar-item"><i class="fa-regular fa-heart"></i></div>
                        <div class="right_bar-item">
                            <div class="dropdown-center">
                                <div data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-circle-user"></i></div>
                                <ul class="dropdown-menu">
                                    <a href="{{ route('account.index') }}" class="dropdown-item">Tài khoản của tôi</a>
                                    <a href="{{ route('invoice.index') }}" class="dropdown-item">Đơn hàng</a>
                                    <form action="{{ route('logout_customer.post') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Đăng xuất</button>
                                    </form>
                                </ul>
                            </div>
                        </div>
                        <div class="right_bar-item">
                            <div class="dropdown dropdown-menu-end">
                                <div class="dropdown-toggle cart-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                    @if (session()->has('cart'))
                                        <div class="cart-dropdown-count">{{ count(session()->get('cart')) }}</div>
                                    @endif
                                </div>
                                <div class="dropdown-menu cart-wrapper">
                                    @if (session()->has('cart'))
                                        <div class="cart-header">
                                            <div>{{ count(session()->get('cart')) . ' ITEMS' }}</div>
                                            <a href="{{ route('cart.index') }}" class="view-cart">VIEW CART</a>
                                        </div>
                                        <div class="cart-split"></div>
                                        <div class="cart-list">
                                            @php
                                                $total = 0;
                                            @endphp
                                            @foreach (session()->get('cart') as $cartItem)
                                                @php
                                                    $product = App\Models\products\Product::find($cartItem['id']);
                                                    $total += $product->giaBan * $cartItem['quantity'];
                                                @endphp
                                                <div class="cart-item">
                                                    <div class="item-des">
                                                        <div class="item-name">{{ $product->tenSanPham }}</div>
                                                        <div class="item-price">@currency_format($product->giaBan)</div>
                                                        <div class="item-price">Quantity: {{ $cartItem['quantity'] }}</div>
                                                    </div>
                                                    <div class="item-img">
                                                        <img src="{{ asset('images/products/' . $product->image_path) }}" alt="Product">
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="cart-total">
                                            <div>Total</div>
                                            <div>@currency_format($total)</div>
                                        </div>
                                    @else
                                        <img src="{{ asset('images/shop/empty-cart2.jfif') }}" alt="empty cart">
                                    @endif
                                    <a class="btn btn-dark cart-checkout" href="{{ Request::url() }}" role="button">RELOAD</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="header-inner" id="header__navbar">
        <div class="container">
            <div class="row">
                <div class="col col-lg-3 d-none d-lg-block">
                    <div class="dropdown header__category">
                        <div class="header__category-dropdown dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-bars me-2"></i>CATEGORIES
                        </div>
                        <div class="header__category-list dropdown-menu">
                          <li><div class="dropdown-item header__category-item search-category" data-order-name="daBan" data-order-type="desc"><i class="fa-brands fa-bitcoin me-2"></i>Best seller</div></li>
                          <li><div class="dropdown-item header__category-item search-category" data-order-name="updated_at" data-order-type="desc"><i class="fa-solid fa-truck-fast me-2"></i>New arrivals</div></li>
                          <li><div class="dropdown-item header__category-item search-category" data-order-name="diemDanhGia" data-order-type="desc"><i class="fa-solid fa-thumbs-up me-2"></i>Top rated</div></li>
                          <li><div class="dropdown-item header__category-item header__search-type" data-type="candle"><i class="fa-solid fa-fire-flame-curved me-2"></i>Nến thơm</div></li>
                          <li><div class="dropdown-item header__category-item header__search-type" data-type="scented wax"><i class="fa-solid fa-soap me-2"></i>Sáp thơm</div></li>
                          <li><div class="dropdown-item header__category-item header__search-type" data-type="essential oil"><i class="fa-solid fa-bottle-droplet me-2"></i>Tinh dầu</div></li>
                        </div>
                    </div>
                </div>

                <div class="col col-lg-9 col-6">
                    <div class="header__nav d-none d-lg-flex">
                        <a href="{{ route('shop.index') }}" class="header__nav-item">Home</a>
                        <a href="{{ route('product.index') }}" class="header__nav-item">Product</a>
                        @if (Auth::guard('customer')->check())
                        <a href="{{ route('cart.index') }}" class="header__nav-item">Shopping Cart</a>
                        <a href="{{ route('account.index') }}" class="header__nav-item">My Account</a>
                        <a href="{{ route('invoice.index') }}" class="header__nav-item">My Invoices</a>
                        @else
                        <a href="{{ route('login_customer.index') }}" class="header__nav-item">Login</a>
                        @endif
                    </div>
                    <div class="dropdown header__category d-block d-lg-none">
                        <div class="header__category-dropdown dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-bars me-2"></i>MENU
                        </div>
                        <div class="header__category-list dropdown-menu">
                          <li><div class="dropdown-item header__category-item"><a href="{{ route('shop.index') }}">Home</a></div></li>
                          <li><div class="dropdown-item header__category-item"><a href="{{ route('product.index') }}">Product</a></div></li>
                          @if (Auth::guard('customer')->check())
                            <li><div class="dropdown-item header__category-item"><a href="{{ route('cart.index') }}">Shopping Cart</a></div></li>
                            <li><div class="dropdown-item header__category-item"><a href="{{ route('account.index') }}">My Account</a></div></li>
                            <li><div class="dropdown-item header__category-item"><a href="{{ route('invoice.index') }}">My Invoices</a></div></li>
                          @else
                          <li><div class="dropdown-item header__category-item"><a href="{{ route('login_customer.index') }}">Login</a></div></li>
                          @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{-- Hidden form for search --}}
<form class="search_bar" action="{{ route('product.index') }}" method="GET" id="header__search-form">
    @csrf
    <input type="hidden" id="header__search-name-input" name="search">
    <input type="hidden" id="header__search-type-input" name="type">
    <input type="hidden" id="header__search-order-name" name="order-name">
    <input type="hidden" id="header__search-order-type" name="order-type">
    <input type="hidden" id="header__search-order-fullname" name="order-fullname">
</form>
</header>

