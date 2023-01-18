@extends('layouts.admin.admin_layout')

@section('content')

<div class="page-wrapper">
  <span class="page-title">Đánh giá sản phẩm</span>
  
  <div class="page__content-wrapper">
    <div class="product-detail">
      <div class="product-img">
        <img src="{{ asset('images/products/' . $product->image_path) }}" alt="product">
      </div>
      <div>
        <div class="product-text"><span class="product-span">ID</span>{{ $product->id }}</div>
        <div class="product-text"><span class="product-span">Tên sản phẩm</span>{{ $product->tenSanPham }}</div>
        <div class="product-text"><span class="product-span">Nhà cung cấp</span>{{ $product->manufacturer()->first()->ten }}</div>
        <div class="product-text"><span class="product-span">Lượt đánh giá</span>{{ $product->luotDanhGia }} reviewers</div>
        <div class="product-text"><span class="product-span">Điểm đánh giá</span><span class="text-danger">{{ $product->diemDanhGia }}</span></div>
        @php
            $point = $product->diemDanhGia / 5 * 100;
        @endphp
        <div class="product-star">
            <div class="stars-outer">
                <div class="stars-inner" style="{{ 'width: ' . $point . "%" }}">
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>

  <div class="page__content-wrapper">
    @if (Session::has('message'))
      <h5 class="text-success mb-2 ms-2"><strong>{{ Session::get('message') }}</strong></h5>
    @endif
    <div class="product-review-label">All Comments</div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Username</th>
            <th scope="col">Fullname</th>
            <th scope="col">Comment</th>
            <th scope="col">Point</th>
            <th scope="col">Created At</th>
            <th scope="col">Thao tác</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($product->productReview as $comment)
            <tr>
                <th scope="row">{{ $comment->pivot->id }}</th>
                <td>{{ $comment->username }}</td>
                <td>{{ $comment->fullname }}</td>
                <td class="comment-table">{{ $comment->pivot->comment }}</td>
                <td>
                    @php
                        $percent = $comment->pivot->point / 5 * 100;
                    @endphp
                    <div class="stars-outer">
                        <div class="stars-inner" style="{{ 'width: ' . $percent . "%" }}">
                        </div>
                    </div>
                </td>
                <td>@date_format($comment->pivot->updated_at)</td>
                <td>
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <button class="btn btn-outline-danger btn-sm" data-id="{{ $comment->pivot->id }}" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</button>
                  </div>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
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
    formDelete.action = `/admin/product/${id}/comment/delete`;

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