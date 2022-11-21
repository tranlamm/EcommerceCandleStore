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
                            {{-- @elseif ($product->danhGia > 4.5)
                                <div class="product-detail__tag product-detail__tag--love">YÊU THÍCH<i class="fa-solid fa-heart ms-1"></i></div> --}}
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
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function()
    {
        $('#add-to-cart').click(function()
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'post',
                url:  '{{ route('product.addcart', ['id' => $product->id]) }}',
                data: {
                    'quantity' : $('#quantity').val(),
                },
                success:function()
                {
                }
            });
        })
    })
</script>
@endsection