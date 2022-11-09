@foreach ($manufacturers as $manufacturer)
    @foreach ($manufacturer->candleProducts as $candleProducts)
    @endforeach
    @foreach ($manufacturer->essentialOilProducts as $essentialOilProducts)
    @endforeach
    @foreach ($manufacturer->scentedWaxProducts as $scentedWaxProducts)
    @endforeach
@endforeach

@extends('layouts.admin.admin_invoice_layout')

@section('content')
<div class="page-wrapper">
    <div class="page__content-wrapper">
        <span class="page-title">Tạo đơn nhập hàng</span>

        <form action="{{ route('importinvoice.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label" spellcheck="false"><strong>Tên đơn hàng <span class="text-red">*</span></strong></label>
                <input type="text" class="form-control" name="tenDonHang"> 
            </div>

            <div class="mb-5">
                <label class="form-label" spellcheck="false"><strong>Nội dung</strong></label>
                <textarea class="form-control" rows="5" name="noiDung"></textarea>
            </div>

            <label class="form-label mb3"><strong>Dữ liệu nhập hàng <span class="text-red">*</span></strong></label>
            <div class="row mb-5">
                <div class="col col-1">
                    <label class="form-label"><strong>Mặt hàng</strong></label>
                    <select id="form-loaiHang" class="form-select" name="loaiHang">
                        <option value="candle" selected>Nến</option>
                        <option value="scentedWax">Sáp thơm</option>
                        <option value="essentialOil">Tinh dầu</option>
                    </select>
                </div>
                <div class="col col-2">
                    <label class="form-label"><strong>Nhà cung cấp</strong></label>
                    <select id="form-nhaCungCap" class="form-select" name="nhaCungCap">
                        @foreach ($manufacturers as $manufacturer)
                            <option value="{{ $manufacturer->id }}">{{ $manufacturer->ten }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col col-2">
                    <label class="form-label"><strong>Tên sản phẩm</strong></label>
                    <select id="form-tenSanPham" class="form-select" name="tenSanPham">
                        <option selected>Vui lòng chọn nhà cung cấp</option>
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
                                <input class="form-check-input" type="radio" name="loaiGia" value="giaNhap" checked>
                                <label class="form-check-label">
                                    Giá nhập
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

            <div class="d-flex justify-content-between mt-5">
                <div>
                    <a class="btn btn-success me-2" href="{{ route('manufacturer.create') }}" role="button">Thêm nhà cung cấp</a>
                    <a class="btn btn-primary" href="{{ route('candleproduct.create') }}" role="button">Thêm sản phẩm</a>
                </div>
                <div>
                    <a class="btn btn-outline-secondary me-2" href="{{ route('importinvoice.index') }}" role="button">Danh sách đơn nhập</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('javascript')

<script>
const manufacturers = {!! json_encode($manufacturers->toArray(), JSON_HEX_TAG) !!};

let giaNhap = 0;
const donGiaInput = $('input[name=donGia]');
const tongTienInput = $('#tongTien');
const soLuongInput = $('#soLuong');

$('#form-nhaCungCap').click(function()
{
    const loaiHang = $('#form-loaiHang').val();
    const manufacturerId = $('option:selected', this).val();
    const manufacturer = manufacturers.find(x => x.id == manufacturerId);

    const oldSel = $('#form-tenSanPham');
    oldSel.empty(); 
    
    let product;
    if (loaiHang == 'candle')
        product = manufacturer.candle_products;
    else if (loaiHang == 'essentialOil')
        product = manufacturer.essential_oil_products;
    else if (loaiHang == 'scentedWax')
        product = manufacturer.scented_wax_products;

    if(product)
    {
        for (let i = 0; i < product.length; ++i)
        {
            $('<option>')
                .val(product[i].tenSanPham)
                .attr('data-price', product[i].giaNhap)
                .text(product[i].tenSanPham)
                .appendTo(oldSel);
        }
    }
})

$('#form-tenSanPham').click(function() {
    const price = $('option:selected', this).attr('data-price');
    giaNhap = price;
    donGiaInput.val(giaNhap);
})

$('input[type=radio][name=loaiGia]').change(function() {
    if (this.value == 'giaNhap') {
        donGiaInput.val(giaNhap);
        donGiaInput.attr("readonly", true);
        tongTienInput.val(soLuongInput.val() * giaNhap);
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

