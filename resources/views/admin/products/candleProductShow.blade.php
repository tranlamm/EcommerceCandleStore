@extends('layouts.admin.admin_layout')

@section('content')

<div class="page-wrapper">
  <span class="page-title">Danh mục sản phẩm nến</span>

  <div class="page__content-wrapper">
    <div class="row mb-3">
      <div class="col col-xxl-8 col-12 mt-3">
        <form class="row gx-2" id="form__search" method="GET" action="{{ route('candleproduct.index') }}">
          <div class="col col-6">
            <input class="form-control" type="text" name="search" placeholder="Search"/>
          </div>

          <div class="col col-3">
            <select name="nhaCungCap" class="form-select">
              <option value="">Nhà cung cấp</option>
              @foreach ($manufacturers as $manufacturer)
                  <option value="{{ $manufacturer->id }}">{{ $manufacturer->ten }}</option>
              @endforeach
          </select>
          </div>

          <div class="col col-3">
            <input type="hidden" name="order-type" id="order-type">
            <input type="hidden" name="order-name" id="order-name">
            <select id="form_order" class="form-select">
              <option value="">Sắp xếp</option>
              <option value="giaNhap asc">Giá nhập tăng dần</option>
              <option value="giaNhap desc">Giá nhập giảm dần</option>
              <option value="giaBan asc">Giá bán tăng dần</option>
              <option value="giaBan desc">Giá bán giảm dần</option>
              <option value="conLai desc">Còn lại nhiều nhất</option>
              <option value="conLai asc">Còn lại ít nhất</option>
              <option value="daBan desc">Đã bán nhiều nhất</option>
              <option value="daBan asc">Đã bán ít nhất</option>
              <option value="updated_at desc">Mới nhất</option>
              <option value="updated_at asc">Cũ nhất</option>
            </select>
          </div>
        </form>
      </div>
      <div class="col col-xxl-4 col-12 mt-3">
        <div class="d-flex">
          <button class="btn btn-outline-success me-2" id="form__search-btn">Search</button>
          <a role="button" class="btn btn-outline-secondary me-2" href="{{ route('candleproduct.index') }}">Reset</a>
          <div class="ms-auto">
            <a role="button" class="btn btn-outline-primary" href="{{ route('candleproduct.create') }}">Thêm Mới<i class="fa-solid fa-plus ms-2"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="page__content-wrapper">
    @if (Session::has('message'))
      <h5 class="text-success mb-2 ms-2"><strong>{{ Session::get('message') }}</strong></h5>
    @endif
    <div class="table-responsive">
      <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Hình ảnh</th>
              <th scope="col">Tên sản phẩm</th>
              <th scope="col">Mặt hàng</th>
              <th scope="col">Nhà sản xuất</th>
              <th scope="col">Giá Nhập</th>
              <th scope="col">Giá Bán</th>
              <th scope="col">Còn lại</th>
              <th scope="col">Đã bán</th>
              <th scope="col">Created At</th>
              <th scope="col">Updated At</th>
              <th scope="col">Thao tác</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($candleProducts as $candleProduct)
                  <tr>
                      <th scope="row">{{ $candleProduct->id }}</th>
                      <td>
                        <div class="product__image-wrapper">
                          <img class="product__image" src="{{ asset('images/products/' . $candleProduct->image_path) }}" alt="Ảnh sản phẩm">
                        </div>
                      </td>
                      <td>{{ $candleProduct->tenSanPham }}</td>
                      <td>{{ $candleProduct->loaiSanPham }}</td>
                      <td>{{ $candleProduct->manufacturer()->first()->ten }}</td>
                      <td>@currency_format($candleProduct->giaNhap)</td>
                      <td>@currency_format($candleProduct->giaBan)</td>
                      <td>{{ $candleProduct->conLai }}</td>
                      <td>{{ $candleProduct->daBan }}</td>
                      <td>@date_format($candleProduct->created_at)</td>
                      <td>@date_format($candleProduct->updated_at)</td>
                      <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                          <a role="button" href="/admin/candleproduct/{{ $candleProduct->id }}/edit" class="btn btn-outline-primary btn-sm">Edit</a>
                          <button class="btn btn-outline-danger btn-sm" data-id="{{ $candleProduct->id }}" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</button>
                          <a role="button" href="{{ route('product.review', ['id' => $candleProduct->id]) }}" class="btn btn-outline-success btn-sm">Reviews</a>
                        </div>
                      </td>
                  </tr>
              @endforeach
          </tbody>
        </table>
    </div>
      <div class="d-flex justify-content-center mt-4">
        {{ $candleProducts->appends($data)->onEachSide(1)->links('pagination::bootstrap-4') }}
      </div>
  </div>
</div>
<form method="post" id="deleteForm">
  @csrf
  @method('DELETE')
</form>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">
          <strong>
            Warning
          </strong>
        </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <span>
          Are you sure you want to delete this item?
        </span>
        <br/>
        <span>
          This action cannot be undone!
        </span>
      </div>
      <div class="modal-footer">
        <button type="button" id="deleteBtn" class="btn btn-danger">Delete</button>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>
  const exampleModal = document.getElementById('exampleModal')
  const btnDelete = document.getElementById('deleteBtn')
  const formDelete = document.getElementById('deleteForm')
  exampleModal.addEventListener('show.bs.modal', event => {
    const button = event.relatedTarget
    const id = button.getAttribute('data-id')
    formDelete.action = `/admin/candleproduct/${id}`;

    btnDelete.onclick = function () {
      formDelete.submit();
    }
  })

  const formSearch = document.getElementById('form__search')
  const formSearchBtn = document.getElementById('form__search-btn')
  formSearchBtn.onclick = function() {
    const formOrder = document.getElementById('form_order');
    if (formOrder.value) {
      const orderNameInput = document.getElementById('order-name');
      const orderTypeInput = document.getElementById('order-type');
      const order = formOrder.value.split(' '); 
      const orderName = order[0];
      const orderType = order[1];
      orderNameInput.value = orderName;
      orderTypeInput.value = orderType;
    }
    formSearch.submit();
  }
</script>
@endsection