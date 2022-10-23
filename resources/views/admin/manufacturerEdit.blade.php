@extends('layouts.admin.admin_layout')

@section('content')

<div class="container mt-4">
    <form action="/admin/manufacturer/{{ $manufacturer->id }}" method="post">
        @csrf
        @method('PATCH')
        <div class="form-floating mb-4">
            <input type="text" class="form-control" id="input1" placeholder="name@example.com" name="ten" value="{{ $manufacturer->ten }}">
            <label for="input1" class="form-label" >Tên nhà cung cấp</label>
        </div>
        
        <div class="row">
            <div class="col col6">
                <div class="form-floating mb-4">
                    <input type="text" class="form-control" id="input2" placeholder="name@example.com" name="diaChi" value="{{ $manufacturer->diaChi }}">
                    <label for="input2" class="form-label">Địa chỉ</label>
                </div>
            </div>

            <div class="col col6">
                <div class="form-floating mb-4">
                    <input type="text" class="form-control" id="input3" placeholder="name@example.com" name="soDienThoai" value="{{ $manufacturer->soDienThoai }}"> 
                    <label for="input3" class="form-label">Số điện thoại</label>
                </div> 
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection