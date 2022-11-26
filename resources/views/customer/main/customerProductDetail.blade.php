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
                                <div class="product-detail__tag product-detail__tag--empty">HẾT HÀNG<i class="fa-solid fa-sack-xmark ms-1"></i></div> 
                            @elseif ($product->diemDanhGia > 4.5)
                                <div class="product-detail__tag product-detail__tag--love">YÊU THÍCH<i class="fa-solid fa-heart ms-1"></i></div>
                            @elseif ($product->daBan > 100)
                                <div class="product-detail__tag product-detail__tag--hot">BÁN CHẠY<i class="fa-solid fa-fire ms-1"></i></div>
                            @else
                                <div class="product-detail__tag product-detail__tag--good-price">GIÁ TỐT<i class="fa-solid fa-coins ms-1"></i></div>
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
                            <input type="number" min="1" max="{{ $product->conLai }}" class="quantity-input" id="quantity">
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

        <div class="review__wrapper">
            <div class="review__header">Đánh giá sản phẩm</div>
            <div class="row review__main">
                <div class="col col-6">
                    <div class="review-point__wrapper">
                        <div class="d-flex justify-content-center">
                            <div class="point-wrapper">
                                <div class="point-label">Overall</div>
                                <div class="point-content">{{ $product->diemDanhGia }}</div>
                                <div class="point-star">
                                    @php
                                        $percent = round($product->diemDanhGia / 5 * 100, 0);
                                    @endphp
                                    <div class="stars-outer">
                                        <div class="stars-inner" style="{{ 'width: ' . $percent . "%" }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="point-quantity">({{ $product->luotDanhGia }} Reviews)</div>
                            </div>
                        </div>
                        <div class="comment-list">
                            <div class="comment-label">All Comments !</div>
                            @if (count($product->productComment) > 0)
                                @foreach ($product->productComment as $comment)
                                <div class="comment-item">
                                    <div class="d-flex w-100 justify-content-between">
                                        <div class="comment-info">
                                            <div class="comment-name">
                                                {{ $comment->username }}
                                            </div>
                                            <div class="comment-date">
                                                @date_format($comment->created_at)
                                            </div>
                                            <div class="comment-star">
                                                @php
                                                    $percent = $comment->productReview()->where('product_id', '=', $product->id)->first()->pivot->point / 5 * 100;
                                                @endphp
                                                <div class="stars-outer">
                                                    <div class="stars-inner" style="{{ 'width: ' . $percent . "%" }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @if (Auth::guard('customer')->check())
                                            @if (Auth::guard('customer')->user()->id == $comment->id)
                                                <form action="{{ route('comment.delete',  ['customer_id' => Auth::guard('customer')->user()->id, 'product_id' => $product->id]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" value="{{ $comment->pivot->id }}" name="comment_id">
                                                    <button class="comment-delete"><i class="fa-regular fa-trash-can"></i></button>
                                                </form>
                                            @endif
                                        @endif
                                    </div>
                                    <div class="comment-content">
                                        {{ $comment->pivot->comment }}
                                    </div>
                                </div>
                                @endforeach
                            @else
                                <img src="{{ asset('images/shop/empty-invoice.webp') }}" alt="empty">
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col col-6">
                    <div class="review-post-wrapper">
                        <div class="review-post-label">Rating</div>
                        <div class="star-post-wrapper">
                            <span class="star-post-text">Your rating: </span>
                            <div class="star-post">
                                <i id="star1" class="fa-solid fa-star star-post-icon" data-count="1"></i>
                                <i id="star2" class="fa-solid fa-star star-post-icon" data-count="2"></i>
                                <i id="star3" class="fa-solid fa-star star-post-icon" data-count="3"></i>
                                <i id="star4" class="fa-solid fa-star star-post-icon" data-count="4"></i>
                                <i id="star5" class="fa-solid fa-star star-post-icon" data-count="5"></i>
                            </div>
                            <div id="rate-btn" class="post-btn">Send</div>
                        </div>
                        <div class="mt-4"></div>
                        <div class="review-post-label">Add A Comment</div>
                        <div class="comment-post-wrapper">
                            <textarea id="comment-input" rows="4" class="comment-input" spellcheck="false" required></textarea>
                            <div id="comment-btn" class="post-btn">Send Comment !</div>
                        </div>
                    </div>
                </div>
            </div>
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

<div class="add-toast add-toast-special">
    <div class="add-toast-text">Cảm ơn quý khách đã đánh giá sản phẩm</div>
    <div class="add-toast-btn"><i class="fa-solid fa-xmark"></i></div>
</div>

<div class="add-toast add-toast-wrong">
    <div class="add-toast-text">Vui lòng nhập đủ thông tin đánh giá</div>
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

        // Rating
        @if (Auth::guard('customer')->check())
            @if (Auth::guard('customer')->user()->productReview()->where('product_id', '=', $product->id)->exists())
                const tmp = {{ Auth::guard('customer')->user()->productReview()->where('product_id', '=', $product->id)->first()->pivot->point }};
                $('.star-post-icon').removeClass('star-post-icon--active');
                for (let i = 1; i <= tmp; ++i)
                {
                    $(`#star${i}`).addClass('star-post-icon--active');
                }
            @endif
        @endif

        let point = 0;
        $('.star-post-icon').click(function()
        {
            $('.star-post-icon').removeClass('star-post-icon--active');
            const count = $(this).attr('data-count');
            for (let i = 1; i <= count; ++i)
            {
                $(`#star${i}`).addClass('star-post-icon--active');
            }
            point = count;
        });

        $('#rate-btn').click(function()
        {
            @if (Auth::guard('customer')->check())
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'post',
                    url: '{{ route('review.post', ['customer_id' => Auth::guard('customer')->user()->id, 'product_id' => $product->id]) }}',
                    data: {
                        'point': point,
                    },
                    success: function(data)
                    {
                        $('.add-toast').removeClass('add-toast-active');
                        if ($.isEmptyObject(data.errors)) {
                            setTimeout(() => {
                                $('.add-toast-special').addClass('add-toast-active');
                            }, 100);
                        }
                        else {
                            const resp = data.errors;
                            if (resp == 'Failed review')
                                setTimeout(() => {
                                    $('.add-toast-wrong').addClass('add-toast-active');
                                }, 100);
                        }
                    },
                });
            @else
                window.location = '{{ route('login_customer.index') }}';
            @endif
        });

        $('#comment-btn').click(function()
        {
            @if (Auth::guard('customer')->check())
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'post',
                    url: '{{ route('comment.post', ['customer_id' => Auth::guard('customer')->user()->id, 'product_id' => $product->id]) }}',
                    data: {
                        'comment': $('#comment-input').val(),
                    },
                    success: function(data)
                    {
                        $('.add-toast').removeClass('add-toast-active');
                        if ($.isEmptyObject(data.errors)) {
                            setTimeout(() => {
                                $('.add-toast-special').addClass('add-toast-active');
                            }, 100);
                        }
                        else {
                            const resp = data.errors;
                            if (resp == 'Failed review')
                                setTimeout(() => {
                                    $('.add-toast-wrong').addClass('add-toast-active');
                                }, 100);
                        }
                    },
                });
            @else
                window.location = '{{ route('login_customer.index') }}';
            @endif
        })
    })
</script>
@endsection