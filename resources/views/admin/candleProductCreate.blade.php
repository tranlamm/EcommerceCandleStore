@extends('layouts.admin.admin_layout')

@section('content')

<div class="container mt-4">
    <form action="{{ route('candleproduct.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-floating mb-4">
            <input type="text" class="form-control" id="input1" placeholder="name@example.com" name="tenSanPham">
            <label for="input1" class="form-label" >Tên sản phẩm</label>
        </div>
        
        <div class="row">
            <div class="col col6">
                <div class="form-floating mb-4">
                    <input type="text" class="form-control" id="input2" placeholder="name@example.com" name="muiHuong">
                    <label for="input2" class="form-label" >Mùi hương</label>
                </div>
            </div>

            <div class="col col6">
                <div class="form-floating mb-4">
                    <input type="text" class="form-control" id="input3" placeholder="name@example.com" name="mauSac"> 
                    <label for="input3" class="form-label">Màu sắc</label>
                </div> 
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col col-6">
                <div class="form-floating">
                    <input type="text" class="form-control" id="input4" placeholder="name@example.com" name="trongLuong">
                    <label for="input4" class="form-label">Trọng lượng</label>
                </div> 
            </div>
            <div class="col col-6 d-flex align-items-center">
                <label class="form-label me-3 mb-0"><strong>Số Bấc</strong></label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="soBac" value="1" id="flexRadioDefault1" checked>
                    <label class="form-check-label" for="flexRadioDefault1">
                        Single Wick
                    </label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="soBac" value="3" id="flexRadioDefault2">
                    <label class="form-check-label" for="flexRadioDefault2">
                        3 Wick
                    </label>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col col-6">
                <label class="form-label"><strong>Nhà cung cấp</strong></label>
                <select class="form-select" aria-label="Default select example" name="nhaCungCap">
                    @foreach ($manufacturers as $manufacturer)
                        <option value="{{ $manufacturer->id }}">{{ $manufacturer->ten }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col col-6">
                <label class="form-label d-block"><strong>Ảnh</strong></label>
                <input class="form-control" type="file" name="image">
            </div>
        </div>
        
        <div class="mb-4">
            <label for="exampleFormControlTextarea1" class="form-label"><strong>Mô tả</strong></label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="moTa"></textarea>
          </div>
        
        <div class="row">
            <div class="col col-8">
                <div class="form-floating mb-4">
                    <input type="text" class="form-control" id="input6" placeholder="name@example.com" name="giaNhap">
                    <label for="input6" class="form-label">Giá nhập</label>
                </div> 
            </div>
        </div>

        <div class="row">
            <div class="col col-8">
                <div class="form-floating mb-4">
                    <input type="text" class="form-control" id="input7" placeholder="name@example.com" name="giaBan">
                    <label for="input7" class="form-label">Giá bán</label>
                </div> 
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection