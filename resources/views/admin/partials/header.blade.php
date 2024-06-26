<div class="row m-0">
    <div class="col-lg-2 p-0 h-100">
      <nav class="navbar navbar-expand-lg navbar-light bg-light m-0 p-0">

        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav d-flex flex-column w-100">
            <li class="bg-secondary li-logo d-flex align-items-center ps-3">
              <img src="{{ asset('../images/logo.webp') }}" height="50%" alt="">
            </li>
            <li class="nav-item ps-3 mt-2">
              <a class="nav-link fw-semibold @yield('homeadmin') rounded-2 me-2" href="/admin"><i
                  class="fa-solid fa-gauge text-secondary me-2"></i>Dashboard</a>
            </li>
            <li class="nav-item ps-3 mt-2">
              <a class="nav-link fw-semibold @yield('productadmin') rounded-2 me-2" href="/admin/product"><i
                  class="fa-solid fa-shirt text-secondary me-2"></i>Sản phẩm</a>
            </li>
            <li class="nav-item ps-3 mt-2">
              <a class="nav-link fw-semibold @yield('inventoryadmin') rounded-2 me-2" href="/admin/inventory"><i
                  class="fa-solid fa-warehouse text-secondary me-2"></i>
                  Số lượng tồn kho</a>
            </li>
            <li class="nav-item ps-3 mt-2">
              <a class="nav-link fw-semibold @yield('catalogadmin') rounded-2 me-2" href="/admin/catalog"><i
                  class="fa-solid fa-rectangle-list text-secondary me-2"></i>Danh mục</a>
            </li>
            <li class="nav-item ps-3 mt-2">
              <a class="nav-link fw-semibold @yield('useradmin') rounded-2 me-2" href="/admin/user"><i
                  class="fa-solid fa-users text-secondary me-2"></i>Tài khoản</a>
            </li>
            {{-- <li class="nav-item ps-3 mt-2">
              <a class="nav-link fw-semibold @yield('newsadmin') rounded-2 me-2" href="/admin/news"><i
                  class="fa-solid fa-newspaper text-secondary me-2"></i>Tin tức</a>
            </li> --}}
            <li class="nav-item ps-3 mt-2">
              <a class="nav-link fw-semibold @yield('orderadmin') rounded-2 me-2" href="/admin/order"><i
                  class="fa-solid fa-border-all text-secondary me-2"></i>Đơn hàng</a>
            </li>
            <li class="nav-item ps-3 mt-2">
              <a class="nav-link fw-semibold @yield('voucheradmin') rounded-2 me-2" href="/admin/voucher"><i
                  class="fa-solid fa-ticket text-secondary me-2"></i>
                  Mã giảm giá</a>
            </li>
            <li class="nav-item ps-3 mt-2">
              <a class="nav-link fw-semibold @yield('usedvoucheradmin') rounded-2 me-2" href="/admin/usedvoucher"><i
                  class="fa-solid fa-ticket-simple text-secondary me-2"></i>Đã dùng mã giảm giá</a>
            </li>
            <li class="nav-item ps-3 mt-2">
              <a class="nav-link fw-semibold page-link-admin rounded-2 me-2" href="/logout"><i
                  class="fa-solid fa-right-from-bracket text-secondary me-2"></i>Đăng suất</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>