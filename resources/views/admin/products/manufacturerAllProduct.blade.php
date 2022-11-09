@extends('layouts.admin.admin_layout')

@section('content')

<div class="page-wrapper">
  <a class="btn btn-outline-dark mb-4 btn-sm" href="{{ route('manufacturer.index') }}" role="button"><i class="fa-solid fa-rotate-left"></i></a>
    <span class="page-title">Danh mục sản phẩm của nhà cung cấp {{ $manufacturer->ten }}</span>
    <div class="page__content-wrapper">
      <div class="me-2">
        <form class="d-flex" id="form__search" method="GET" action="/admin/manufacturer/{{ $manufacturer->id }}/allproducts">
          <input class="form-control form-search-input" type="text" name="search" placeholder="Search"/>
          
          <div class="d-flex align-items-center justify-content-around">
              <div class="form-check me-4">
                <input class="form-check-input" type="checkbox" value="all" id="flexCheckDefault" name="category[]"
                {{ $old_category ? (in_array('all', $old_category) ? 'checked' : '') : '' }}>
                <label class="form-check-label" for="flexCheckDefault">
                  All
                </label>
              </div>
              <div class="form-check me-4">
                <input class="form-check-input" type="checkbox" value="candle" id="flexCheckDefault1" name="category[]"
                {{ $old_category ? (in_array('candle', $old_category) ? 'checked' : '') : '' }}>
                <label class="form-check-label" for="flexCheckDefault1">
                  Nến
                </label>
              </div>

              <div class="form-check me-4">
                <input class="form-check-input" type="checkbox" value="scentedWax" id="flexCheckDefault2" name="category[]"
                {{ $old_category ? (in_array('scentedWax', $old_category) ? 'checked' : '') : '' }}>
                <label class="form-check-label" for="flexCheckDefault2">
                  Sáp thơm
                </label>
              </div>
              <div class="form-check me-4">
                <input class="form-check-input" type="checkbox" value="essentialOil" id="flexCheckDefault3" name="category[]" 
                {{ $old_category ? (in_array('essentialOil', $old_category) ? 'checked' : '') : '' }}>
                <label class="form-check-label" for="flexCheckDefault3">
                  Tinh dầu
                </label>
              </div>
          </div>
          <button class="btn btn-outline-success me-2" id="form__search-btn">Search</button>
          <a role="button" class="btn btn-outline-secondary" href="/admin/manufacturer/{{ $manufacturer->id }}/allproducts">Reset</a>
        </form>
      </div>
    </div>

    <div class="page__content-wrapper">
      <table class="table">
          <thead>
            <tr>
              <th scope="col">Tên sản phẩm</th>
              <th scope="col">Hình ảnh</th>
              <th scope="col">Giá Nhập</th>
              <th scope="col">Giá Bán</th>
              <th scope="col">Còn lại</th>
              <th scope="col">Đã bán</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($allProducts as $allProduct)
                <tr>
                  <th scope="row">{{ $allProduct['tenSanPham'] }}</th>
                  <td>
                    <div class="product__image-wrapper">
                      <img class="product__image" src="{{ asset('images/' . $allProduct['image_path']) }}" alt="Ảnh sản phẩm">
                    </div>
                  </td>
                  <td>@currency_format($allProduct["giaNhap"])</td>
                  <td>@currency_format($allProduct["giaBan"])</td>
                  <td>{{ $allProduct["conLai"] }}</td>
                  <td>{{ $allProduct["daBan"] }}</td>
                </tr>
              @endforeach
          </tbody>
        </table>
    </div>
</div>
@endsection

