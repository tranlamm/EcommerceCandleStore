<div class="sidebar-wrapper d-none d-xl-block">
    <div class="sidebar">
        <ul class="nav flex-column">
            <li class="nav-item nav_title">
                Candle Shop
            </li>
            <li class="nav-item">
                <a class="nav-link nav_link" href="{{ route('admin.index') }}"><i class="fa-solid fa-chart-line"></i>Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav_link" href="{{ route('admin.chat') }}"><i class="fa-regular fa-comments"></i>Chatting</a>
            </li>
            <li class="nav-item nav_title">
                Thiết lập dữ liệu
            </li>
            <li class="nav-item" data-bs-toggle="collapse" data-bs-target="#sanPham" aria-expanded="false" aria-controls="sanPham">
                <a class="nav-link nav_link"><i class="fa-brands fa-shopify"></i>Dữ liệu sản phẩm</a>
            </li>
            <div class="collapse" id="sanPham">
                <li class="nav-item">
                    <a class="nav-link nav_link ps-5" href="{{ route('candleproduct.index') }}"><i class="fa-solid fa-fire-flame-curved"></i>Nến</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav_link ps-5" href="{{ route('scentedwaxproduct.index') }}"><i class="fa-solid fa-soap"></i>Sáp thơm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav_link ps-5" href="{{ route('essentialoilproduct.index') }}"><i class="fa-solid fa-bottle-droplet"></i>Tinh dầu</a>
                </li>
            </div>
            <li class="nav-item">
                <a class="nav-link nav_link" href="{{ route('manufacturer.index') }}"><i class="fa-solid fa-building"></i>Nhà cung cấp</a>
            </li>
            <li class="nav-item nav_title">
                Dữ liệu nhập xuất
            </li>
            <li class="nav-item" data-bs-toggle="collapse" data-bs-target="#nhapHang" aria-expanded="false" aria-controls="nhapHang">
                <a class="nav-link nav_link"><i class="fa-solid fa-download"></i>Dữ liệu nhập hàng</a>
            </li>
            <div class="collapse" id="nhapHang">
                <li class="nav-item">
                    <a class="nav-link nav_link ps-5" href="{{ route('importinvoice.create') }}"><i class="fa-solid fa-file"></i>Nhập hàng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav_link ps-5" href="{{ route('importinvoice.index') }}"><i class="fa-solid fa-database"></i>Danh sách đơn nhập</a>
                </li>
            </div>
            <li class="nav-item" data-bs-toggle="collapse" data-bs-target="#xuatHang" aria-expanded="false" aria-controls="xuatHang">
                <a class="nav-link nav_link"><i class="fa-solid fa-truck"></i>Dữ liệu xuất hàng</a>
            </li>
            <div class="collapse" id="xuatHang">
                <li class="nav-item">
                    <a class="nav-link nav_link ps-5" href="{{ route('exportinvoice.create') }}"><i class="fa-solid fa-file"></i>Tạo đơn hàng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav_link ps-5" href="{{ route('onlineinvoice.index') }}"><i class="fa-solid fa-database"></i>Danh sách mua online</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav_link ps-5" href="{{ route('exportinvoice.index') }}"><i class="fa-solid fa-database"></i>Danh sách mua trực tiếp</a>
                </li>
            </div>
            <li class="nav-item nav_title">
                Quản lý đánh giá
            </li>
            <li class="nav-item">
                <a class="nav-link nav_link" href="{{ route('comment.index') }}"><i class="fa-solid fa-tag"></i>Danh sách bình luận</a>
            </li>
            <li class="nav-item nav_title">
                Quản lý tài khoản
            </li>
            <li class="nav-item" data-bs-toggle="collapse" data-bs-target="#taiKhoan" aria-expanded="false">
                <a class="nav-link nav_link"><i class="fa-solid fa-user"></i>Tài khoản</a>
            </li>
            <div class="collapse" id="taiKhoan">
                <li class="nav-item">
                    <a class="nav-link nav_link ps-5"><i class="fa-solid fa-headset"></i>Admins</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav_link ps-5" href="{{ route('customeraccount.index') }}"><i class="fa-solid fa-person"></i>Customers</a>
                </li>
            </div>
        </ul>
    </div>
</div>