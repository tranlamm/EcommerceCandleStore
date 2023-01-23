<div class="d-xs-block d-xl-none offcanvas_sidebar">
    <button class="offcanvas_btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_sidebar" aria-controls="offcanvas_sidebar">
        <i class="fa-solid fa-bars"></i>
    </button>
    
    <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvas_sidebar">
        <ul class="offcanvas_nav">
            <li class="ocv_title d-flex justify-content-between align-items-center">
                <span>Home</span>
                <button type="button" class="btn-close btn-close-white float-end" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </li>
            <li class="ocv_item">
                <a href="{{ route('admin.index') }}" class="ocv_link"><i class="fa-solid fa-chart-line"></i>Dashboard</a>
            </li>
            <li class="ocv_item">
                <a class="ocv_link" href="{{ route('admin.chat') }}"><i class="fa-regular fa-comments"></i>Chatting</a>
            </li>
            <li class="ocv_title">
                Thiết lập dữ liệu
            </li>
            <li class="ocv_item" data-bs-toggle="collapse" data-bs-target="#sanPham" aria-expanded="false" aria-controls="sanPham">
                <a class="ocv_link"><i class="fa-brands fa-shopify"></i>Dữ liệu sản phẩm</a>
            </li>
            <div class="collapse" id="sanPham">
                <li class="ocv_item">
                    <a class="ocv_link ps-5" href="{{ route('candleproduct.index') }}"><i class="fa-solid fa-fire-flame-curved"></i>Nến</a>
                </li>
                <li class="ocv_item">
                    <a class="ocv_link ps-5" href="{{ route('scentedwaxproduct.index') }}"><i class="fa-solid fa-soap"></i>Sáp thơm</a>
                </li>
                <li class="ocv_item">
                    <a class="ocv_link ps-5" href="{{ route('essentialoilproduct.index') }}"><i class="fa-solid fa-bottle-droplet"></i>Tinh dầu</a>
                </li>
            </div>
            <li class="ocv_item">
                <a class="ocv_link" href="{{ route('manufacturer.index') }}"><i class="fa-solid fa-building"></i>Nhà cung cấp</a>
            </li>
            <li class="ocv_title">
                Dữ liệu nhập xuất
            </li>
            <li class="ocv_item" data-bs-toggle="collapse" data-bs-target="#nhapHang" aria-expanded="false" aria-controls="nhapHang">
                <a class="ocv_link"><i class="fa-solid fa-download"></i>Dữ liệu nhập hàng</a>
            </li>
            <div class="collapse" id="nhapHang">
                <li class="ocv_item">
                    <a class="ocv_link ps-5" href="{{ route('importinvoice.create') }}"><i class="fa-solid fa-file"></i>Nhập hàng</a>
                </li>
                <li class="ocv_item">
                    <a class="ocv_link ps-5" href="{{ route('importinvoice.index') }}"><i class="fa-solid fa-database"></i>Danh sách đơn nhập</a>
                </li>
            </div>
            <li class="ocv_item" data-bs-toggle="collapse" data-bs-target="#xuatHang" aria-expanded="false" aria-controls="xuatHang">
                <a class="ocv_link"><i class="fa-solid fa-truck"></i>Dữ liệu xuất hàng</a>
            </li>
            <div class="collapse" id="xuatHang">
                <li class="ocv_item">
                    <a class="ocv_link ps-5" href="{{ route('exportinvoice.create') }}"><i class="fa-solid fa-file"></i>Tạo đơn hàng</a>
                </li>
                <li class="ocv_item">
                    <a class="ocv_link ps-5" href="{{ route('onlineinvoice.index') }}"><i class="fa-solid fa-database"></i>Danh sách mua online</a>
                </li>
                <li class="ocv_item">
                    <a class="ocv_link ps-5" href="{{ route('exportinvoice.index') }}"><i class="fa-solid fa-database"></i>Danh sách mua trực tiếp</a>
                </li>
            </div>
            <li class="ocv_title">
                Quản lý đánh giá
            </li>
            <li class="ocv_item">
                <a class="ocv_link" href="{{ route('comment.index') }}"><i class="fa-solid fa-tag"></i>Danh sách bình luận</a>
            </li>
            <li class="ocv_title">
                Quản lý tài khoản
            </li>
            <li class="ocv_item" data-bs-toggle="collapse" data-bs-target="#taiKhoan" aria-expanded="false">
                <a class="ocv_link"><i class="fa-solid fa-user"></i>Tài khoản</a>
            </li>
            <div class="collapse" id="taiKhoan">
                <li class="ocv_item">
                    <a class="ocv_link ps-5"><i class="fa-solid fa-headset"></i>Admins</a>
                </li>
                <li class="ocv_item">
                    <a class="ocv_link ps-5" href="{{ route('customeraccount.index') }}"><i class="fa-solid fa-person"></i>Customers</a>
                </li>
            </div>
        </ul>
    </div>
</div>