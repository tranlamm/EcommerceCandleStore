@extends('layouts.admin.admin_layout')

@section('content')

<div class="page-wrapper">
    <a class="btn btn-outline-dark mb-4 btn-sm" href="{{ route('candleproduct.index') }}" role="button"><i class="fa-solid fa-rotate-left"></i></a>
    <div class="page__content-wrapper">
        <span class="page-title">Cập nhật thông tin sản phẩm</span>
        <form action="/admin/candleproduct/{{ $candle->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-floating mb-4">
                <input type="text" class="form-control" id="input1" placeholder="name@example.com" name="tenSanPham" value="{{ $candle->tenSanPham }}"> 
                <label for="input1" class="form-label"><strong>Tên sản phẩm *</strong></label>
                @if ($errors->has('tenSanPham'))
                    <span class="text-danger">{{ $errors->first('tenSanPham') }}</span>
                @endif
            </div>
            
            <div class="row align-items-center mb-4">
                <div class="col col-6"> 
                    <label class="form-label"><strong>Loại mùi *</strong></label>
                    <select class="form-select" aria-label="Default select example" name="loaiMuiHuong">
                        @foreach ($fragrances as $fragrance)
                            <option value="{{ $fragrance->id }}" {{ ($candle->loaiMuiHuong === $fragrance->id) ? 'selected' : "" }}>{{ $fragrance->theLoai }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('loaiMuiHuong'))
                        <span class="text-danger">{{ $errors->first('loaiMuiHuong') }}</span>
                    @endif
                </div>
                <div class="col col-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="input2" placeholder="name@example.com" name="muiHuong" value="{{ $candle->muiHuong }}">
                        <label for="input2" class="form-label"><strong>Mùi hương *</strong></label>
                        @if ($errors->has('muiHuong'))
                            <span class="text-danger">{{ $errors->first('muiHuong') }}</span>
                        @endif
                    </div>
                </div>
            </div>
    
            <div class="row mb-3">
                <div class="col col-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="input4" placeholder="name@example.com" name="trongLuong" value="{{ $candle->trongLuong }}">
                        <label for="input4" class="form-label"><strong>Trọng lượng *</strong></label>
                        @if ($errors->has('trongLuong'))
                            <span class="text-danger">{{ $errors->first('trongLuong') }}</span>
                        @endif
                    </div> 
                </div>
                <div class="col col-6 d-flex align-items-center">
                    <label class="form-label me-3 mb-0"><strong>Số Bấc *</strong></label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="soBac" value="1" id="flexRadioDefault1" 
                        {{ ($candle->loaiSanPham === 'single wick candle') ? "checked" : "" }}>
                        <label class="form-check-label" for="flexRadioDefault1">
                            Single Wick
                        </label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="soBac" value="3" id="flexRadioDefault2" 
                        {{ ($candle->loaiSanPham === '3 wick candle') ? "checked" : "" }}>
                        <label class="form-check-label" for="flexRadioDefault2">
                            3 Wick
                        </label>
                    </div>
                    @if ($errors->has('soBac'))
                        <span class="text-danger">{{ $errors->first('soBac') }}</span>
                    @endif
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col col-6">
                    <label class="form-label"><strong>Nhà cung cấp *</strong></label>
                    <select class="form-select" aria-label="Default select example" name="nhaCungCap">
                        @foreach ($manufacturers as $manufacturer)
                            <option value="{{ $manufacturer->id }}" {{ ($candle->nhaCungCap === $manufacturer->id) ? 'selected' : "" }}>{{ $manufacturer->ten }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('nhaCungCap'))
                        <span class="text-danger">{{ $errors->first('nhaCungCap') }}</span>
                    @endif
                </div>
    
                <div class="col col-6">
                    <label class="form-label d-block"><strong>Ảnh</strong></label>
                    <input class="form-control" type="file" name="image">
                    <input type="hidden" name="old_image" value="{{ $candle->image_path }}">
                </div>
            </div>
    
            <div class="mb-4">
                <label for="exampleFormControlTextarea1" class="form-label" spellcheck="false"><strong>Mô tả</strong></label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="moTa">{{ $candle->moTa }}</textarea>
              </div>
            
            <div class="row">
                <div class="col col-6">
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="input6" placeholder="name@example.com" name="giaNhap" value="{{ $candle->giaNhap }}"> 
                        <label for="input6" class="form-label"><strong>Giá nhập *</strong></label>
                        @if ($errors->has('giaNhap'))
                            <span class="text-danger">{{ $errors->first('giaNhap') }}</span>
                        @endif
                    </div> 
                </div>
    
                <div class="col col-6">
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="input7" placeholder="name@example.com" name="giaBan" value="{{ $candle->giaBan }}">
                        <label for="input7" class="form-label"><strong>Giá bán *</strong></label>
                        @if ($errors->has('giaBan'))
                            <span class="text-danger">{{ $errors->first('giaBan') }}</span>
                        @endif
                    </div> 
                </div>
            </div>
            
            <div class="d-flex justify-content-between">
                <a class="btn btn-success" href="{{ route('manufacturer.create') }}" role="button">Thêm nhà cung cấp</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection