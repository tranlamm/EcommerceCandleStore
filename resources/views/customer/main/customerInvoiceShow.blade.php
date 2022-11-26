@extends('layouts.customer.customer_layout_login')

@section('content')

<div class="invoice">
    <div class="container">
        <div class="invoice-wrapper">
            <div class="invoice-header">
                <div class="invoice-state invoice-state--active" id="switch-to-finished">Đã mua</div>
                <div class="invoice-state" id="switch-to-pending">Đang vận chuyển</div>
            </div>

            <div class="invoice-main" id="invoice_finished">
                @php
                    $i = 0;
                @endphp
                @if (count($invoices_finished) > 0)
                    @foreach ($invoices_finished as $invoice)
                        <div class="invoice-item">
                            <div class="invoice-info">
                                <div class="invoice-text">Ngày mua hàng: @date_format($invoice->created_at)</div>
                                <div class="invoice-text text-danger">Tổng tiền: @currency_format($invoice->tongTien)</div>
                            </div>
                            <div class="invoice-dropdown" id="{{ 'invoice-btn' . $i }}"><i class="fa-solid fa-chevron-down"></i></div>
                        </div>
                        <div class="invoice-detail" id="{{ 'invoice-detail' . $i }}">
                            <div class="product-list">
                                @foreach ($invoice->products as $product)
                                    <div class="product-item">
                                        <div class="product-img">
                                            <img src="{{ asset('images/products/' . $product->image_path) }}" alt="product">
                                        </div>
                                        <div class="product-info">
                                            <div class="product-text--main">{{ $product->tenSanPham }}</div>
                                            <div class="product-text--sub">{{ $product->manufacturer()->first()->ten }}</div>
                                        </div>
                                        <div class="product-info">
                                            <div class="product-text--sub">Loại sản phẩm: {{ $product->loaiSanPham }}</div>
                                            <div class="product-text--sub">Trọng lượng: {{ $product->trongLuong }}</div>
                                        </div>
                                        <div class="product-info">
                                            <div class="product-text--sub">Loại mùi: {{ $product->fragrance()->first()->theLoai }}</div>
                                            <div class="product-text--sub">Mùi hương: {{ $product->muiHuong }}</div>
                                        </div>
                                        <div class="product-info">
                                            <div class="product-price">Đơn giá: @currency_format($product->giaBan)</div>
                                            <div class="product-price">Số lượng: {{ $product->pivot->soLuong }}</div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div> 
                        @php
                            $i++;
                        @endphp
                    @endforeach
                @else
                    <div class="empty-img-wrapper">
                        <img src="{{ asset('images/shop/empty-invoice.webp') }}" alt="empty">
                    </div>
                @endif
            </div>

            <div class="invoice-main" id="invoice_pending">
                @php
                    $k = 0;
                @endphp
                @if (count($invoices_pending) > 0)
                    @foreach ($invoices_pending as $invoice)
                    <div class="invoice-item">
                        <div class="invoice-info">
                            <div class="invoice-text">Ngày mua hàng: @date_format($invoice->created_at)</div>
                            <div class="invoice-text text-danger">Tổng tiền: @currency_format($invoice->tongTien)</div>
                        </div>
                        <div class="invoice-dropdown" id="{{ 'invoice-btn-pending' . $k }}"><i class="fa-solid fa-chevron-down"></i></div>
                    </div>
                    <div class="invoice-detail" id="{{ 'invoice-detail-pending' . $k }}">
                        <div class="product-list">
                            @foreach ($invoice->products as $product)
                                <div class="product-item">
                                    <div class="product-img">
                                        <img src="{{ asset('images/products/' . $product->image_path) }}" alt="product">
                                    </div>
                                    <div class="product-info">
                                        <div class="product-text--main">{{ $product->tenSanPham }}</div>
                                        <div class="product-text--sub">{{ $product->manufacturer()->first()->ten }}</div>
                                    </div>
                                    <div class="product-info">
                                        <div class="product-text--sub">Loại sản phẩm: {{ $product->loaiSanPham }}</div>
                                        <div class="product-text--sub">Trọng lượng: {{ $product->trongLuong }}</div>
                                    </div>
                                    <div class="product-info">
                                        <div class="product-text--sub">Loại mùi: {{ $product->fragrance()->first()->theLoai }}</div>
                                        <div class="product-text--sub">Mùi hương: {{ $product->muiHuong }}</div>
                                    </div>
                                    <div class="product-info">
                                        <div class="product-price">Đơn giá: @currency_format($product->giaBan)</div>
                                        <div class="product-price">Số lượng: {{ $product->pivot->soLuong }}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div> 
                    @endforeach
                    @php
                        $k++;
                    @endphp
                @else
                    <div class="empty-img-wrapper">
                        <img src="{{ asset('images/shop/empty-invoice.webp') }}" alt="empty">
                    </div>
                @endif
                
            </div>
        </div>
    </div>
</div>

<script>
    $('#invoice_pending').hide();
    @for ($j = 0; $j < $i; ++$j)
        $('{{ '#invoice-btn' . $j }}').click(function()
        {
            const detail = $('{{ '#invoice-detail' . $j }}');
            if (detail.is(':hidden')) 
                detail.show();
            else
                detail.hide();
        })
    @endfor
    @for ($j = 0; $j < $k; ++$j)
        $('{{ '#invoice-btn-pending' . $j }}').click(function()
        {
            const detail = $('{{ '#invoice-detail-pending' . $j }}');
            if (detail.is(':hidden')) 
                detail.show();
            else
                detail.hide();
        })
    @endfor
    $('#switch-to-pending').click(function()
    {
        $('#invoice_finished').hide();
        $('#invoice_pending').show();
        $('#switch-to-finished').removeClass('invoice-state--active');
        $(this).addClass('invoice-state--active');
    })
    $('#switch-to-finished').click(function()
    {
        $('#invoice_pending').hide();
        $('#invoice_finished').show();
        $('#switch-to-pending').removeClass('invoice-state--active');
        $(this).addClass('invoice-state--active');
    })
</script>
@endsection