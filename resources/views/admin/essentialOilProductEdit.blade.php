@extends('layouts.admin.admin_layout')

@section('content')

<div class="container mt-4">
    <form action="/admin/essentialoilproduct/{{ $essentialOil->id }}" method="post">
        @csrf
        @method('PATCH')
        <div class="form-floating mb-4">
            <input type="text" class="form-control" id="input1" placeholder="name@example.com" name="tenSanPham" value="{{ $essentialOil->tenSanPham }}"> 
            <label for="input1" class="form-label" >Tên sản phẩm</label>
        </div>
        
        <div class="row">
            <div class="col col12">
                <div class="form-floating mb-4">
                    <input type="text" class="form-control" id="input2" placeholder="name@example.com" name="muiHuong" value="{{ $essentialOil->muiHuong }}">
                    <label for="input2" class="form-label" >Mùi hương</label>
                </div>
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col col-8">
                <label for="input3" class="form-label">Nhà cung cấp</label>
                <select class="form-select" aria-label="Default select example" name="nhaCungCap">
                    @foreach ($manufacturers as $manufacturer)
                        <option value="{{ $manufacturer->id }}" {{ ($essentialOil->nhaCungCap === $manufacturer->id) ? "selected" : "" }}>{{ $manufacturer->ten }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col col-4">
                <div class="form-floating mb-3 mt-2">
                    <input type="text" class="form-control" id="input4" placeholder="name@example.com" name="theTich" value="{{ $essentialOil->theTich }}">
                    <label for="input4" class="form-label">Thể tích</label>
                </div> 
            </div>
        </div>
        
        <div class="mb-4">
            <label for="exampleFormControlTextarea1" class="form-label">Mô tả</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="moTa">{{ $essentialOil->moTa }}</textarea>
          </div>
        
        <div class="row">
            <div class="col col-8">
                <div class="form-floating mb-4">
                    <input type="text" class="form-control" id="input6" placeholder="name@example.com" name="giaNhap" value="{{ $essentialOil->giaNhap }}"> 
                    <label for="input6" class="form-label">Giá nhập</label>
                </div> 
            </div>
        </div>

        <div class="row">
            <div class="col col-8">
                <div class="form-floating mb-4">
                    <input type="text" class="form-control" id="input7" placeholder="name@example.com" name="giaBan" value="{{ $essentialOil->giaBan }}">
                    <label for="input7" class="form-label">Giá bán</label>
                </div> 
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection