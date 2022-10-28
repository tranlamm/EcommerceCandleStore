<div id="sidebar">
    <ul class="nav flex-column">
        <li class="nav-item nav_title">
            Quản lý sản phẩm
        </li>
        <li class="nav-item" data-bs-toggle="collapse" data-bs-target="#sanPham" aria-expanded="false" aria-controls="sanPham">
            <a class="nav-link nav_link" href=""><i class="fa-brands fa-shopify"></i>Danh mục sản phẩm</a>
        </li>
        <div class="collapse" id="sanPham">
            <li class="nav-item">
                <a class="nav-link nav_link ps-5" href="{{ route('candleproduct.index') }}"><i class="fa-solid fa-fire-flame-curved"></i>Nến</a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav_link ps-5" href=""><i class="fa-solid fa-soap"></i>Sáp thơm</a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav_link ps-5" href="{{ route('essentialoilproduct.index') }}"><i class="fa-solid fa-bottle-droplet"></i>Tinh dầu</a>
            </li>
        </div>
        <li class="nav-item">
            <a class="nav-link nav_link" href="{{ route('manufacturer.index') }}"><i class="fa-solid fa-building"></i>Nhà cung cấp</a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav_link" href=""><i class="fa-solid fa-chart-pie"></i>Thống kê</a>
        </li>
        <li class="nav-item nav_title">
            Quản lý đơn hàng
        </li>
        <li class="nav-item">
            <a class="nav-link nav_link"><i class="fa-solid fa-database"></i>Dữ liệu nhập hàng</a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav_link"><i class="fa-solid fa-database"></i>Dữ liệu xuất hàng</a>
        </li>
        <li class="nav-item nav_title">
            Quản lý tài khoản
        </li>
        <li class="nav-item" data-bs-toggle="collapse" data-bs-target="#taiKhoan" aria-expanded="false">
            <a class="nav-link nav_link" href=""><i class="fa-solid fa-user"></i>Tài khoản</a>
        </li>
        <div class="collapse" id="taiKhoan">
            <li class="nav-item">
                <a class="nav-link nav_link ps-5" href=""><i class="fa-solid fa-headset"></i>Admins</a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav_link ps-5" href=""><i class="fa-solid fa-person"></i>Customers</a>
            </li>
        </div>
        <li class="nav-item nav_title">
            Quản lý khuyến mãi
        </li>
        <li class="nav-item">
            <a class="nav-link nav_link"><i class="fa-solid fa-tag"></i>Mã khuyến mãi</a>
        </li>
    </ul>
</div>