<div class="top-header">
      <div class="container d-flex h-100 align-items-center justify-content-between">
        <img src="{{ asset('images/logo.webp') }}" alt="" class="img-fluid logo">
        <form class="d-flex" role="search">
          <input class="form-control border-0 rounded-end-0 rounded-start-5 ps-4" type="search"
            placeholder="Tìm kiếm sản phẩm bạn mong muốn" aria-label="Search" onkeyup="searchProducts(this)">
          <button class="btn btn-primary border-0 bg-primary rounded-end-5 rounded-start-0" type="submit"><i
              class="fa-solid fa-magnifying-glass text-light pe-2"></i></button>
        </form>
        <div class="dropdown d-lg-none ms-2">
          <button class="btn bg-secondary p-0 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-regular fa-user fs-5 mb-0 me-2 text-light"></i>
          </button>
          @if (!Auth::check())
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/loginform">Đăng nhập</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="/registerform">Đăng ký</a></li>
          </ul>
          @endif
        </div>

        <div class="position-relative d-flex align-items-center justify-content-between">
          @if (Auth::check())
          <div class="d-lg-flex d-none text-light gap-2 align-items-center me-3">
            @if (Auth::user()->image)
            <img src="{{ asset(Auth::user()->image) }}" class="icon-avatar" alt="">
            @else
            <img src="{{ asset('images/avatar.png') }}" alt="">
            @endif
            
            <a href="/account" class="text-light">{{ Auth::user()->email }}</a>
          </div>
          @else
          <div class="d-lg-flex d-none text-light align-items-center">
            <i class="fa-regular fa-user fs-5 mb-0 me-2"></i>
            <a class="p-0 m-0 text-light text-decoration-none" href="/loginform">Đăng nhập</a>
            <p class="p-0 m-0 mx-1">/</p>
            <a class="p-0 m-0 text-light text-decoration-none" href="/registerform">Đăng ký</a>
            <p class="p-0 m-0 fs-4 mx-3">|</p>
          </div>
          @endif 
          
          @php
              $totalQuantity=0;
              if(is_array(session('carts'))){
                foreach (session('carts') as  $item) {
                  $totalQuantity+=$item['quantity'];
                }
              }
          @endphp
          <a href="/cart">
            <i class="fa-solid fa-basket-shopping fs-5 text-light"></i>
            @if ($totalQuantity>0)
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
              {{ $totalQuantity }}
              <span class="visually-hidden">unread messages</span>
            @endif
            </span>
          </a>
        </div>
      </div>
    </div>
    <nav class="navbar navbar-expand-lg menu bg-body">
      <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav gap-3 mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active text-secondary" aria-current="page" href="/">
                @yield('homepage')
                Trang chủ
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link text-secondary" role="button" aria-expanded="false"
                href="/product">
                @yield('productpage')
                Sản phẩm
              </a>
              
            </li>
            <li class="nav-item">
              
              <a class="nav-link text-secondary" href="/contact">
                @yield('contactpage')
                Liên hệ</a>
            </li>
            <li class="nav-item">
              
              <a class="nav-link text-secondary" href="/news">
                @yield('newspage')
                Tin tức</a>
            </li>
            <li class="nav-item">
              
              <a class="nav-link text-secondary" href="/systemstore">
                @yield('systemstorepage')
                Hệ thống của hàng</a>
            </li>
          </ul>
        </div>
        <div class="hotline d-flex align-items-center">
          <div class="fw-normal fs-3 me-4">|</div>
          <i class="fa-solid fa-phone-volume me-2"></i>
          <div class=" me-2">Hotline: </div>
          <a class="nav-link">1900 6750</a>
        </div>
      </div>
    </nav>