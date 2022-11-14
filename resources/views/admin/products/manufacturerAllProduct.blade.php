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
                <input class="form-check-input" type="radio" value="all" id="flexCheckDefault" name="category"
                {{ $old_category === 'all' ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefault">
                  All
                </label>
              </div>
              <div class="form-check me-4">
                <input class="form-check-input" type="radio" value="candle" id="flexCheckDefault1" name="category"
                {{ $old_category === 'candle' ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefault1">
                  Nến
                </label>
              </div>

              <div class="form-check me-4">
                <input class="form-check-input" type="radio" value="scented wax" id="flexCheckDefault2" name="category"
                {{ $old_category === 'scented wax' ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefault2">
                  Sáp thơm
                </label>
              </div>
              <div class="form-check me-4">
                <input class="form-check-input" type="radio" value="essential oil" id="flexCheckDefault3" name="category" 
                {{ $old_category === 'essentail oil' ? 'checked' : '' }}>
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
              <th scope="col">Loại sản phẩm</th>
              <th scope="col">Mùi hương</th>
              <th scope="col">Trọng lượng</th>
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
                      <img class="product__image" src="{{ asset('images/products/' . $allProduct['image_path']) }}" alt="Ảnh sản phẩm">
                    </div>
                  </td>
                  <td>{{ $allProduct['loaiSanPham'] }}</td>
                  <td>{{ $allProduct["muiHuong"] }}</td>
                  @switch($allProduct['loaiSanPham'])
                    @case('essential oil')
                      <td>{{ $allProduct["trongLuong"] }} ml</td>
                      @break
                    @default
                      <td>{{ $allProduct["trongLuong"] }} g</td>
                      @break
                  @endswitch
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

