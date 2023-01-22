@extends('layouts.admin.admin_statistic_layout')

@section('content')
<div class="dashboard">
    <div class="dashboard-header">
        <div class="dashboard-navbar">
            <div class="d-flex align-items-center">
                <form method="GET" action="{{ route('candleproduct.index') }}" class="dashboard-search">
                    <input type="text" class="search-input" name="search" spellcheck="false" placeholder="Nhập tên sản phẩm..." required>
                    <button type="submit" class="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
                <div class="dashboard-label">Dashboard Overview</div>
            </div>
            <a href="{{ route('candleproduct.create') }}" class="dashboard-add-btn"><i class="fa-solid fa-plus me-2"></i>Add Product</a>
        </div>
        <div class="dashboard-shop">
            <div class="dashboard-item dashboard-item-expense">
                <div>
                    <div class="item-text">TOTAL EXPENSE</div>
                    <div class="item-price">@currency_format($expense)</div>
                </div>
                <div class="item-icon-wrapper">
                    <i class="fa-solid fa-coins item-icon"></i>
                </div>
            </div>
            <div class="dashboard-item dashboard-item-income">
                <div>
                    <div class="item-text">TOTAL INCOME</div>
                    <div class="item-price">@currency_format($income)</div>
                </div>
                <div class="item-icon-wrapper">
                    <i class="fa-solid fa-sack-dollar item-icon"></i>
                </div>
            </div>
            <div class="dashboard-item dashboard-item-profit">
                <div>
                    <div class="item-text">PROFIT</div>
                    <div class="item-price">@currency_format($income - $expense)</div>
                </div>
                <div class="item-icon-wrapper">
                    <i class="fa-solid fa-money-bill-trend-up item-icon"></i>
                </div>
            </div>
        </div>
        <div class="dashboard-shop">
            <a href="{{ route('candleproduct.index') }}" class="dashboard-sub-item">
                <div class="item-icon"><i class="fa-solid fa-box-open"></i></div>
                <div>
                    <div class="item-text">Product</div>
                    <div class="item-quantity">@number_format($productCount)</div>
                </div>
            </a>
            <a href="{{ route('manufacturer.index') }}" class="dashboard-sub-item">
                <div class="item-icon"><i class="fa-regular fa-building"></i></div>
                <div>
                    <div class="item-text">Manufacturer</div>
                    <div class="item-quantity">@number_format($manufacturerCount)</div>
                </div>
            </a>
            <a href="{{ route('account.index') }}" class="dashboard-sub-item">
                <div class="item-icon"><i class="fa-solid fa-user"></i></div>
                <div>
                    <div class="item-text">Account</div>
                    <div class="item-quantity">@number_format($accountCount)</div>
                </div>
            </a>
            <a href="{{ route('onlineinvoice.index') }}" class="dashboard-sub-item">
                <div class="item-icon"><i class="fa-solid fa-cart-shopping"></i></div>
                <div>
                    <div class="item-text">Order</div>
                    <div class="item-quantity">@number_format($orderTotal)</div>
                </div>
            </a>
            <a href="{{ route('onlineinvoice.index') }}" class="dashboard-sub-item">
                <div class="item-icon"><i class="fa-solid fa-arrows-rotate"></i></div>
                <div>
                    <div class="item-text">Pending</div>
                    <div class="item-quantity">@number_format($orderPending)</div>
                </div>
            </a>
            <a href="{{ route('onlineinvoice.index') }}" class="dashboard-sub-item">
                <div class="item-icon"><i class="fa-regular fa-calendar"></i></div>
                <div>
                    <div class="item-text">Today</div>
                    <div class="item-quantity">@number_format($orderToday)</div>
                </div>
            </a>
        </div>
    </div>

    <div class="dashboard-main">
        <div id="dashboard-vue">
            <dashboard-wrapper></dashboard-wrapper>
        </div>

        <div class="dashboard-chart-wrapper">
            <div class="toprated-product">
                <div class="toprated-product-header">Top Rated Product <span class="text-danger ms-2"><i class="fa-solid fa-heart"></i></span></div>
                <div class="toprated-product-title">
                    <div class="toprated-label">Image</div>
                    <div class="toprated-label">Product</div>
                    <div class="toprated-label">Manufacturer</div>
                    <div class="toprated-label">Point</div>
                </div>
                <div class="toprated-product-list">
                    @foreach ($products as $product)
                        <div class="toprated-product-item">
                            <div class="toprated-text">
                                <div class="toprated-img">
                                    <img src="{{ asset('images/products/' . $product->image_path) }}" alt="product">
                                </div>
                            </div>
                            <div class="toprated-text">{{ $product->tenSanPham }}</div>
                            <div class="toprated-text">{{ $product->manufacturer()->first()->ten }}</div>
                            <div class="product-rated">
                                <span class="product-point">{{ $product->diemDanhGia }}</span>
                                @php
                                    $point = $product->diemDanhGia / 5 * 100;
                                @endphp
                                <div class="product-star">
                                    <div class="stars-outer">
                                        <div class="stars-inner" style="{{ 'width: ' . $point . "%" }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            
            <div class="order-today">
                <div class="order-today-header">
                    <span>@date_format(Carbon\Carbon::now())</span>
                    <span class="order-today-text">
                        Today Order: 
                        <span class="text-danger">@number_format($orderToday) Orders</span>
                        <span class="ms-2 text-success"><i class="fa-solid fa-truck"></i></span>
                    </span>
                </div>
                @if (count($orders) > 0)
                    <div class="order-today-title">
                        <div class="order-label">Username</div>
                        <div class="order-label">Value</div>
                        <div class="order-label">Status</div>
                        <div class="order-label">Time</div>
                    </div>
                    <div class="order-today-list">
                        @foreach ($orders as $order)
                            <div class="order-today-item">
                                <div class="order-text">{{ $order->account()->first()->username }}</div>
                                <div class="order-text text-danger">@number_format($order->tongTien)</div>
                                <div class="order-text">{{ $order->trangThai }}</div>
                                <div class="order-text">{{ $order->created_at->format('H:i:s') }}</div>
                            </div>
                        @endforeach
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('onlineinvoice.index') }}" class="order-btn">View All</a>
                    </div>
                @else
                    <img class="empty-order" src="{{ asset('images/shop/empty-invoice.webp') }}" alt="Empty">
                @endif
            </div>
        </div>

        <div class="comment-wrapper">
            <div class="comment-header">
                Recent Comments<i class="fa-regular fa-comment ms-2"></i>
                <div class="comment-header-sub">Management all comment. <a href="{{ route('comment.index') }}">View details.</a></div>
            </div>
            <div class="comment-main">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Image</th>
                        <th scope="col">Product</th>
                        <th scope="col">Username</th>
                        <th scope="col">Point</th>
                        <th scope="col">Comment</th>
                        <th scope="col">Time</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($comments as $comment)
                        <tr>
                            <th scope="row">{{ $comment->id }}</th>
                            <td>
                                <div class="comment-img">
                                    <img src="{{ asset('images/products/' . $comment->product()->first()->image_path) }}" alt="product">
                                </div>
                            </td>
                            <td>{{ $comment->product()->first()->tenSanPham }}</td>
                            <td>{{ $comment->account()->first()->username }}</td>
                            <td>
                                @php
                                    $percent = $comment->point / 5 * 100;
                                @endphp
                                <div class="stars-outer">
                                    <div class="stars-inner" style="{{ 'width: ' . $percent . "%" }}">
                                    </div>
                                </div>
                            </td>
                            <td class="comment-area">{{ $comment->comment }}</td>
                            <td>@date_format($comment->created_at)</td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>
@endsection