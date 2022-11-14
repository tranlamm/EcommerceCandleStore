@foreach ($manufacturers as $manufacturer)
    @foreach ($manufacturer->products as $product)
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

            <div id="form-list" class="form-import-invoice">
                <div class="row mb-3 align-items-start form-wrapper" id="form-wrapper">
                    <div class="col col-2">
                        <label class="form-label"><strong>Nhà cung cấp</strong></label>
                        <select id="form-nhaCungCap0" class="form-select" name="nhaCungCap[]">
                            @foreach ($manufacturers as $manufacturer)
                                <option value="{{ $manufacturer->id }}">{{ $manufacturer->ten }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="col col-2">
                        <label class="form-label"><strong>Tên sản phẩm</strong></label>
                        <select id="form-tenSanPham0" class="form-select" name="tenSanPham[]">
                            <option selected>Vui lòng chọn nhà cung cấp</option>
                        </select>
                    </div>
    
                    <div class="col col-2">
                        <label class="form-label"><strong>Số lượng</strong></label>
                        <input id="soLuong0" type="number" min="1" class="form-control" name="soLuong[]" value=0> 
                    </div>
    
                    
                    <div class="col col-3">
                        <label class="form-label"><strong>Đơn giá</strong></label>
                        <div class="row align-items-center">
                            <div class="col col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="loaiGia0" value="giaNhap" checked>
                                    <label class="form-check-label">
                                        Giá nhập
                                    </label>
                                </div>
                            </div>
                            <div class="col col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="loaiGia0" value="giaKhac">
                                    <label class="form-check-label">
                                        Giá khác
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-12">
                                <input id="donGia0" type="number" class="form-control form-input-price" name="donGia[]"> 
                            </div>
                        </div>
                    </div>
    
                    <div class="col col-2">
                        <label class="form-label"><strong>Tổng tiền</strong></label>
                        <input id="tongTien0" type="number" class="form-control" name="tongTien[]" readonly value=0> 
                    </div>
                </div>
            </div>

            <button type="button" class="btn btn-outline-primary mb-4" id="btn-add-product">
                Add product<i class="fa-solid fa-plus ms-2"></i>
            </button>

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
// Get manufacturers in server laravel
const manufacturers = {!! json_encode($manufacturers->toArray(), JSON_HEX_TAG) !!};

// Variable to count number of form element
let count = 1;

// Refresh all event listener of each form 
const refreshEventListener = () => {
    for (let i = 0; i < count; ++i) 
    {
        $('#form-nhaCungCap' + i).click(function()
        {
            const manufacturerId = $('option:selected', this).val();
            const manufacturer = manufacturers.find(x => x.id == manufacturerId);
            const products = manufacturer.products;

            const oldSel = $('#form-tenSanPham' + i);
            oldSel.empty(); 

            if (products)
            {
                for (let i = 0; i < products.length; ++i)
                {
                    $('<option>')
                        .val(products[i].id)
                        .attr('data-price', products[i].giaNhap)
                        .text(products[i].tenSanPham)
                        .appendTo(oldSel);
                }
            }
        })
        $('#form-tenSanPham' + i).click(function()
        {
            const donGia = $('option:selected', this).attr('data-price');
            $(`#donGia${i}`).val(donGia);
        })
        $('#soLuong' + i).change(function()
        {
            let price;
            price = $(this).val() * $(`#donGia${i}`).val();

            if (price)
            {
                $('#tongTien' + i).val(price);
            }
            else 
            {
                $('#tongTien' + i).val(0);
            }
        })
        $(`input[type=radio][name=loaiGia${i}]`).change(function() {
            const donGia = $(`#donGia${i}`);
            if (this.value == 'giaNhap') {
                donGia.css("display", "none");
            }
            else {
                donGia.css("display", "block");
            }
        })
        $(`#donGia${i}`).change(function()
        {
            price = $(this).val() * $('#soLuong' + i).val();
            $('#tongTien' + i).val(price);
        })
    }
    for (let i = 1; i < count; ++i)
    {
        $('#deleteForm' + i).click(function ()
        {
            $('#form-wrapper' + i).remove();
        })
    }
}
// First time add event listener to initial form
refreshEventListener();


// Process to create a new form 
const formListElement = $('#form-list');
const addForm = () => {
    let clone = $('#form-wrapper').clone();

    // Change id of clone element and reset attribute
    clone.attr('id', 'form-wrapper' + count);
    clone.find('#form-nhaCungCap0').attr('id', 'form-nhaCungCap' + count);
    const selecter = clone.find('#form-tenSanPham0');
    selecter.attr('id', 'form-tenSanPham' + count)
    selecter.empty();
    $('<option>')
        .text('Vui lòng chọn nhà cung cấp')
        .appendTo(selecter);

    const soLuong = clone.find('#soLuong0');
    soLuong.attr('id', 'soLuong' + count);
    soLuong.val(0);
    clone.find('input[name="loaiGia0"]').each(function()
    {
        $(this).attr('name', 'loaiGia' + count);
    })
    
    const donGia = clone.find('#donGia0');
    donGia.attr('id', 'donGia' + count);
    donGia.val(0);

    const tongTien = clone.find('#tongTien0');
    tongTien.attr('id', 'tongTien' + count);
    tongTien.val(0);

    // Add delete btn to clone element
    $(`<div class="col col-1 d-flex justify-content-center">
            <button type="button" id="deleteForm${count}" class="btn btn-outline-danger">\
                <i class="fa-regular fa-trash-can"></i>
            </button>
        <div>`
    ).appendTo(clone);

    // Append to form list
    clone.appendTo(formListElement);

    // Increase count
    count++;

    // refresh event listener of all form element
    refreshEventListener();
}

// Button to create a new form element
$('#btn-add-product').click(addForm)
</script>

@endsection

