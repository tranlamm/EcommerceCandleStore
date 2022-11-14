@extends('layouts.admin.admin_layout')

@section('content')

<div class="page-wrapper">
    <a class="btn btn-outline-dark mb-4 btn-sm" href="{{ route('manufacturer.index') }}" role="button"><i class="fa-solid fa-rotate-left"></i></a>
    <div class="page__content-wrapper">
        <span class="page-title">Cập nhật nhà cung cấp</span>
        <form action="/admin/manufacturer/{{ $manufacturer->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-floating mb-4">
                <input type="text" class="form-control" id="input1" placeholder="name@example.com" name="ten" value="{{ $manufacturer->ten }}">
                <label for="input1" class="form-label">Tên nhà cung cấp *</label>
                @if ($errors->has('ten'))
                    <span class="text-danger">{{ $errors->first('ten') }}</span>
                @endif
            </div>
            
            <div class="row">
                <div class="col col6">
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="input2" placeholder="name@example.com" name="diaChi" value="{{ $manufacturer->diaChi }}">
                        <label for="input2" class="form-label">Địa chỉ *</label>
                        @if ($errors->has('diaChi'))
                            <span class="text-danger">{{ $errors->first('diaChi') }}</span>
                        @endif
                    </div>
                </div>

                <div class="col col6">
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="input3" placeholder="name@example.com" name="soDienThoai" value="{{ $manufacturer->soDienThoai }}"> 
                        <label for="input3" class="form-label">Số điện thoại *</label>
                        @if ($errors->has('soDienThoai'))
                            <span class="text-danger">{{ $errors->first('soDienThoai') }}</span>
                        @endif
                    </div> 
                </div>
            </div>
            
            <div class="row justify-content-between">
                <div class="col col-6">
                    <label class="form-label d-block"><strong>Ảnh</strong></label>
                    <input class="form-control" type="file" name="image">
                    <input type="hidden" name="old_image" value="{{ $manufacturer->image_path }}">
                    @if ($errors->has('image'))
                        <span class="text-danger">{{ $errors->first('image') }}</span>
                    @endif
                </div>

                <div class="col col-1 d-flex justify-content-end align-items-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection