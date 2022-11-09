@extends('layouts.admin.admin_invoice_layout')

@section('content')
<div class="page-wrapper">
    <div class="page__content-wrapper">
        <span class="page-title">Tạo đơn xuất hàng</span>

        <form action="{{ route('exportinvoice.store') }}" method="POST">
            @csrf
            <div class="mb-5">
                <label class="form-label mb3"><strong>Thông tin khách hàng <span class="text-red">*</span></strong></label>
                <div class="row">
                    <div class="col col-6">
                        <div class="mb-3">
                            <label class="form-label" spellcheck="false"><strong>Tên khách hàng</strong></label>
                            <input type="text" class="form-control" name="tenKhachHang"> 
                        </div>
                    </div>

                    <div class="col col-6">
                        <div class="mb-3">
                            <label class="form-label" spellcheck="false"><strong>Số điện thoại</strong></label>
                            <input type="number" class="form-control" name="soDienThoai"> 
                        </div>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label class="form-label" spellcheck="false"><strong>Địa chỉ</strong></label>
                    <input type="text" class="form-control" name="diaChi"> 
                </div>
            </div>
            <div class="mb-5">
                <label class="form-label mb3"><strong>Thông tin đơn hàng <span class="text-red">*</span></strong></label>
                <div class="mb-3">
                    <label class="form-label" spellcheck="false"><strong>Tên đơn hàng</strong></label>
                    <input type="text" class="form-control" name="tenDonHang"> 
                </div>
    
                <div class="mb-3">
                    <label class="form-label" spellcheck="false"><strong>Nội dung</strong></label>
                    <textarea class="form-control" rows="5" name="noiDung"></textarea>
                </div>
            </div>

            <label class="form-label mb3"><strong>Dữ liệu nhập hàng <span class="text-red">*</span></strong></label>
            <div class="row mb-5">
                <div class="col col-2">
                    <label class="form-label"><strong>Mặt hàng</strong></label>
                    <select id="form-loaiHang" class="form-select" name="loaiHang">
                        <option value="candle" selected>Nến</option>
                        <option value="scentedWax">Sáp thơm</option>
                        <option value="essentialOil">Tinh dầu</option>
                    </select>
                </div>
                
                <div class="col col-3">
                    <label class="form-label"><strong>Tên sản phẩm</strong></label>
                    <select id="form-tenSanPham" class="form-select" name="tenSanPham">
                        <option value="">Vui lòng chọn loại mặt hàng</option>
                    </select>
                </div>

                <div class="col col-1">
                    <label class="form-label"><strong>Số lượng</strong></label>
                    <input id="soLuong" type="number" min="1" class="form-control" name="soLuong" value=0> 
                </div>

                <div class="col col-4">
                    <label class="form-label"><strong>Đơn giá</strong></label>
                    <div class="row align-items-center">
                        <div class="col col-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="loaiGia" value="giaBan" checked>
                                <label class="form-check-label">
                                    Giá bán
                                </label>
                            </div>
                        </div>
                        <div class="col col-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="loaiGia" value="giaKhac">
                                <label class="form-check-label">
                                    Giá khác
                                </label>
                            </div>
                        </div>
                        <div class="col col-4">
                            <input type="number" class="form-control" name="donGia" value="0" readonly> 
                        </div>
                    </div>
                </div>

                <div class="col col-2">
                    <label class="form-label"><strong>Tổng tiền</strong></label>
                    <input id="tongTien" type="number" class="form-control" disabled value=0> 
                </div>
            </div>

            <div class="d-flex justify-content-end mt-5">
                <div>
                    <a class="btn btn-success me-2" href="{{ route('exportinvoice.index') }}" role="button">Danh sách đơn xuất</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('javascript')
<script>
const candleProducts = {!! json_encode($candleProducts->toArray(), JSON_HEX_TAG) !!};
const essentialOilProducts = {!! json_encode($essentialOilProducts->toArray(), JSON_HEX_TAG) !!};
const scentedWaxProducts = {!! json_encode($scentedWaxProducts->toArray(), JSON_HEX_TAG) !!};

let giaBan = 0;
const donGiaInput = $('input[name=donGia]');
const tongTienInput = $('#tongTien');
const soLuongInput = $('#soLuong');

$('#form-loaiHang').click(function()
{
    const loaiHang = $('option:selected', this).val();
    const oldSel = $('#form-tenSanPham');
    oldSel.empty();

    let product;
    if (loaiHang == 'candle')
        product = candleProducts;
    else if (loaiHang == 'essentialOil')
        product = essentialOilProducts;
    else if (loaiHang == 'scentedWax')
        product = scentedWaxProducts;

    if(product)
    {
        for (let i = 0; i < product.length; ++i)
        {
            $('<option>')
                .val(product[i].tenSanPham)
                .attr({
                    'data-price': product[i].giaNhap,
                    'data-quantity': product[i].conLai,
                })
                .text(product[i].tenSanPham)
                .appendTo(oldSel);
        }
    }
})

$('#form-tenSanPham').click(function() {
    const price = $('option:selected', this).attr('data-price');
    const quantity = $('option:selected', this).attr('data-quantity');
    giaBan = price;
    donGiaInput.val(giaBan);
    soLuongInput.attr({
        "max": quantity,
    })
})

$('input[type=radio][name=loaiGia]').change(function() {
    if (this.value == 'giaBan') {
        donGiaInput.val(giaBan);
        donGiaInput.attr("readonly", true);
        tongTienInput.val(soLuongInput.val() * giaBan);
    }
    else if (this.value == 'giaKhac') {
        donGiaInput.attr("readonly", false);
        donGiaInput.val(0);
        tongTienInput.val(0);
    }
})

soLuongInput.change(function()
{
    tongTienInput.val(soLuongInput.val() * donGiaInput.val());
})

donGiaInput.change(function()
{
    tongTienInput.val(soLuongInput.val() * $(this).val());
})
</script>
@endsection

