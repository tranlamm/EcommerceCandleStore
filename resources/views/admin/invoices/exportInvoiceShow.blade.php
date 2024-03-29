@extends('layouts.admin.admin_invoice_layout')

@section('content')
<div class="page-wrapper">
    <span class="page-title">Danh sách đơn mua trực tiếp tại cửa hàng</span>
    <div class="page__content-wrapper">
        <div class="row mb-3">
            <div class="col col-xl-6 col-12 mt-3">
                <form class="row gx-2" id="form__search" method="GET" action="{{ route('exportinvoice.index') }}">
                    <div class="col col-7">
                        <input class="form-control form-search-input" type="text" name="tenDonHang" placeholder="Nhập tên đơn hàng"/>
                    </div>
            
                    <div class="col col-5">
                        <input type="hidden" name="order-type" id="order-type">
                        <input type="hidden" name="order-name" id="order-name">
                        <select id="form_order" class="form-select form-search-select">
                            <option value="">Sắp xếp</option>
                            <option value="tongTien asc">Tổng tiền ít nhất</option>
                            <option value="tongTien desc">Tổng tiền nhiều nhất</option>
                            <option value="created_at desc">Mới nhất</option>
                            <option value="created_at asc">Cũ nhất</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="col col-xl-6 col-12 mt-3">
                <div class="d-flex">
                    <button class="btn btn-outline-success me-2" id="form__search-btn">Search</button>
                    <a role="button" class="btn btn-outline-secondary me-2" href="{{ route('exportinvoice.index') }}">Reset</a>
                    <div class="ms-auto">
                        <a role="button" class="btn btn-outline-primary" href="{{ route('exportinvoice.create') }}">Thêm Mới<i class="fa-solid fa-plus ms-2"></i></a>
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
                        <th scope="col">Tên đơn hàng</th>
                        <th scope="col">Tên khách hàng</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Tổng tiền</th>
                        <th scope="col">Ngày xuất hàng</th>
                        <th scope="col" colspan="3">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($exportInvoices as $invoice)
                        <tr>
                            <th scope="row">{{ $invoice->id }}</th>
                            <td>{{ $invoice->tenDonHang }}</td>
                            <td>{{ $invoice->tenKhachHang }}</td>
                            <td>{{ $invoice->soDienThoai }}</td>
                            <td>{{ $invoice->diaChi }}</td>
                            <td>@currency_format($invoice->tongTien)</td>
                            <td>@date_format($invoice->created_at)</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a role="button" href="{{ route('exportinvoice.show', "$invoice->id") }}" class="btn btn-outline-success btn-sm">Chi tiết</a>
                                    <button class="btn btn-outline-danger btn-sm" data-id="{{ $invoice->id }}" data-bs-toggle="modal" data-bs-target="#exampleModal">Xóa</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $exportInvoices->appends($data)->onEachSide(1)->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>

<!-- Modal -->
<form method="post" id="deleteForm">
    @csrf
    @method('DELETE')
</form>
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
@endsection

@section('javascript')
<script>
    const exampleModal = document.getElementById('exampleModal')
    const btnDelete = document.getElementById('deleteBtn')
    const formDelete = document.getElementById('deleteForm')
    exampleModal.addEventListener('show.bs.modal', event => {
      const button = event.relatedTarget
      const id = button.getAttribute('data-id')
      formDelete.action = `/admin/invoice/exportinvoice/${id}`
  
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

