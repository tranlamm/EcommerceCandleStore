@extends('layouts.admin.admin_layout')

@section('content')

<div class="page-wrapper">
  <span class="page-title">Danh sách bình luận đánh giá sản phẩm</span>
  <div class="page__content-wrapper">
    <div class="row mb-3">
      <div class="col col-xl-6 col-12 mt-3">
        <form class="row gx-2" id="form__search" method="GET" action="{{ route('comment.index') }}">
          <div class="col col-7">
            <input class="form-control form-search-input" type="text" name="search" placeholder="Nhập tên sản phẩm"/>
          </div>

          <div class="col col-5">
            <input type="hidden" name="order-type" id="order-type">
            <input type="hidden" name="order-name" id="order-name">
            <select id="form_order" class="form-select">
              <option value="">Sắp xếp</option>
              <option value="updated_at desc">Mới nhất</option>
              <option value="updated_at asc">Cũ nhất</option>
            </select>
          </div>
        </form>
      </div>
      <div class="col col-xl-6 col-12 mt-3">
        <div class="d-flex">
          <button class="btn btn-outline-success me-2" id="form__search-btn">Search</button>
          <a role="button" class="btn btn-outline-secondary me-2" href="{{ route('comment.index') }}">Reset</a>
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
                  <th scope="col">Image</th>
                  <th scope="col">Product</th>
                  <th scope="col">Username</th>
                  <th scope="col">Comment</th>
                  <th scope="col">Point</th>
                  <th scope="col">Created At</th>
                  <th scope="col">Thao tác</th>
                </tr>
          </thead>
          <tbody>
              @foreach ($comments as $comment)
                  <tr>
                      <th scope="row">{{ $comment->id }}</th>
                      <td>
                          <div class="product__image-wrapper">
                              <img class="product__image" src="{{ asset('images/products/' . $comment->product()->first()->image_path) }}" alt="product">
                          </div>
                      </td>
                      <td>{{ $comment->product()->first()->tenSanPham }}</td>
                      <td>{{ $comment->account()->first()->username }}</td>
                      <td class="comment-table">{{ $comment->comment }}</td>
                      <td>
                          @php
                              $percent = $comment->point / 5 * 100;
                          @endphp
                          <div class="stars-outer">
                              <div class="stars-inner" style="{{ 'width: ' . $percent . "%" }}">
                              </div>
                          </div>
                      </td>
                      <td>@date_format($comment->created_at)</td>
                      <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                          <button class="btn btn-outline-danger btn-sm" data-id="{{ $comment->id }}" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</button>
                        </div>
                      </td>
                  </tr>
              @endforeach
          </tbody>
        </table>
    </div>
      <div class="d-flex justify-content-center mt-4">
        {{ $comments->appends($data)->onEachSide(1)->links('pagination::bootstrap-4') }}
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
    formDelete.action = `/admin/comment/${id}`;

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