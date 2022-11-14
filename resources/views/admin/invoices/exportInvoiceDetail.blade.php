@extends('layouts.admin.admin_invoice_layout')

@section('content')
<div class="page-wrapper">
    <div class="page__content-wrapper">
        <span class="page-title">Chi tiết đơn xuất hàng</span>
        
        <div class="invoice-wrapper">
            <div class="d-flex justify-content-between invoice-header">
                <div class="invoice-brand">CANDLE SHOP</div>
                <div class="d-flex">
                    <div class="me-5">Invoice id: <span>{{ $exportInvoice->id }}</span></div>
                    <div>Date: <span>{{ Carbon\Carbon::now() }}</span></div>
                </div>
            </div>

            <div class="invoice-name">Biên lai mua hàng</div>

            <div class="mb-4">
                <div class="invoice-title">
                    <span>Tên đơn hàng: </span>
                    <span class="invoice-content">{{ $exportInvoice->tenDonHang }}</span>
                </div>
                <div class="invoice-title">
                    <span>Nội dung: </span>
                    <span class="invoice-content">{{ $exportInvoice->noiDung }}</span>
                </div>
                <div class="invoice-title">
                    <span>Hình thức mua: </span>
                    <span class="invoice-content">
                        @switch($exportInvoice->hinhThucMua)
                            @case('offline')
                                Trực tiếp tại cửa hàng
                                @break
                            @case('online')
                                Đặt hàng qua website
                                @break
                            @default
                                
                        @endswitch
                    </span>
                </div>
                <div class="invoice-title">
                    <span>Tổng tiền: </span>
                    <span class="invoice-content">@currency_format($exportInvoice->tongTien)</span>
                </div>
                <div class="invoice-title">
                    <span>Ngày mua: </span>
                    <span class="invoice-content">{{ $exportInvoice->created_at }}</span>
                </div>
            </div>

            <div>
                <div class="invoice-title">
                    <span>Tên khách hàng: </span>
                    <span class="invoice-content">{{ $exportInvoice->tenKhachHang }}</span>
                </div>
                <div class="invoice-title">
                    <span>Số điện thoại: </span>
                    <span class="invoice-content">{{ $exportInvoice->soDienThoai }}</span>
                </div>
                <div class="invoice-title">
                    <span>Địa chỉ: </span>
                    <span class="invoice-content">{{ $exportInvoice->diaChi }}</span>
                </div>
            </div>

            <div class="invoice-split"></div>

            <div class="mb-4">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Ảnh sản phẩm</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Mặt hàng</th>
                        <th scope="col">Nhà cung cấp</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Đơn giá</th>
                        <th scope="col">Tổng tiền</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($exportInvoice->products as $product)
                            <tr>
                                <td>
                                    <div class="product__image-wrapper">
                                        <img class="product__image" src="{{ asset('images/products/' . $product->image_path) }}" alt="Ảnh sản phẩm">
                                    </div>
                                </td>
                                <td>{{ $product->tenSanPham }}</td>
                                <td>{{ $product->loaiSanPham }}</td>
                                <td>{{ $product->manufacturer()->first()->ten }}</td>
                                <td>{{ $product->pivot->soLuong }}</td>
                                <td>@currency_format($product->pivot->donGia)</td>
                                <td>@currency_format($product->pivot->tongTien)</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="invoice-title float-end">
                <span>Total: </span>
                <span class="invoice-content">@currency_format($exportInvoice->tongTien)</span>
            </div>
        </div>

        <div class="mt-5 d-flex justify-content-end">
            <a class="btn btn-outline-secondary me-2" href="{{ route('exportinvoice.index') }}" role="button">
                <i class="fa-solid fa-rotate-left me-2"></i>Quay lại
            </a>
            <button type="button" id="print-btn" class="btn btn-primary me-2"><i class="fa-solid fa-print me-2"></i>Print</button>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script>
    $('#print-btn').click(function()
    {
        window.print();
    })
</script>
@endsection




