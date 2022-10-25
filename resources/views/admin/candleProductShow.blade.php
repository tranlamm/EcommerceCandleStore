@extends('layouts.admin.admin_layout')

@section('content')

<div class="mt-4">
  @if (session()->has('message'))
    <h1>{{ session()->get('message') }}</h1>
    {{ session()->forget('message'); }}
  @endif
  <h1 class="text-center mt-4 mb-4"><strong>Thông tin sản phẩm "Nến"</strong></h1>
  <div class="container mb-3">
    <div class="row">
      <div class="col col-8 d-flex">
        <div class="me-2">
          <form class="d-flex" method="GET" action="{{ route('candleproduct.index') }}">
            <input class="form-control me-2" type="text" name="search" placeholder="Search" required/>
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>

        <a role="button" class="btn btn-outline-secondary" href="{{ route('candleproduct.index') }}">Reset</a>
      </div>

      <div class="col col-4 d-flex justify-content-end">
        <a role="button" class="btn btn-primary" href="{{ route('candleproduct.create') }}">Thêm Mới</a>
      </div>
    </div>
  </div>

  <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Hình ảnh</th>
          <th scope="col">Tên sản phẩm</th>
          <th scope="col">Nhà sản xuất</th>
          <th scope="col">Giá Nhập</th>
          <th scope="col">Giá Bán</th>
          <th scope="col">Còn lại</th>
          <th scope="col">Đã bán</th>
          <th scope="col">Created At</th>
          <th scope="col">Updated At</th>
          <th scope="col" colspan="2">Thao tác</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($candleProducts as $candleProduct)
              <tr>
                  <th scope="row">{{ $candleProduct->id }}</th>
                  <td>
                    <div class="product__image-wrapper">
                      <img class="product__image" src="{{ asset('images/' . $candleProduct->image_path) }}" alt="">
                    </div>
                  </td>
                  <td>{{ $candleProduct->tenSanPham }}</td>
                  <td>{{ $candleProduct->manufacturer()->first()->ten }}</td>
                  <td>{{ $candleProduct->giaNhap }}</td>
                  <td>{{ $candleProduct->giaBan }}</td>
                  <td>{{ $candleProduct->conLai }}</td>
                  <td>{{ $candleProduct->daBan }}</td>
                  <td>{{ $candleProduct->created_at }}</td>
                  <td>{{ $candleProduct->updated_at }}</td>
                  <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                      <a role="button" href="/admin/candleproduct/{{ $candleProduct->id }}/edit" class="btn btn-outline-primary btn-sm">Edit</a>
                      <button class="btn btn-outline-danger btn-sm" data-id="{{ $candleProduct->id }}" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</button>
                    </div>
                  </td>
              </tr>
          @endforeach
      </tbody>
    </table>
    <div class="d-flex justify-content-center">
      {{ $candleProducts->links('pagination::bootstrap-4') }}
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
</script>
@endsection