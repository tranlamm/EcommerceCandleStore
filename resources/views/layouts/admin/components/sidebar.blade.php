<div id="sidebar">
    <ul class="nav flex-column">
        <li class="nav-item nav_title">
            Sản phẩm
        </li>
        <li class="nav-item" data-bs-toggle="collapse" data-bs-target="#sanPham" aria-expanded="false" aria-controls="sanPham">
            <a class="nav-link nav_link" href="">Dữ liệu sản phẩm</a>
        </li>
        <div class="collapse" id="sanPham">
            <li class="nav-item">
                <a class="nav-link nav_link ps-5" href="{{ route('candleproduct.index') }}">Nến</a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav_link ps-5" href="">Sáp thơm</a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav_link ps-5" href="{{ route('essentialoilproduct.index') }}">Tinh dầu</a>
            </li>
        </div>
        <li class="nav-item">
            <a class="nav-link nav_link" href="{{ route('manufacturer.index') }}">Nhà cung cấp</a>
        </li>
        <li class="nav-item nav_title">
            Đơn hàng
        </li>
        <li class="nav-item">
            <a class="nav-link nav_link">Dữ liệu nhập hàng</a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav_link">Dữ liệu xuất hàng</a>
        </li>
    </ul>
</div>