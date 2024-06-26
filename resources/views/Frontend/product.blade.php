<!DOCTYPE html>
<html lang="en"  ng-app="productApp" >

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.3-dist/css/bootstrap.min.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
</head>

<body ng-controller="ProductController">
    <header class="bg-body">
        <div class="top-header">
            <div class="container d-flex h-100 align-items-center justify-content-evenly">
                <img src="http://127.0.0.1:8000/images/logo.webp" alt="" class="img-fluid logo">
                <form class="d-flex" role="search">
                    <input class="form-control border-0 rounded-end-0 rounded-start-5 ps-4" type="search"
                        placeholder="Tìm kiếm sản phẩm bạn mong muốn" aria-label="Search">
                    <button class="btn btn-primary border-0 bg-primary rounded-end-5 rounded-start-0" type="submit"><i
                            class="fa-solid fa-magnifying-glass text-light pe-2"></i></button>
                </form>
                <div class="dropdown d-lg-none ms-2">
                    <button class="btn bg-secondary p-0 border-0" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fa-regular fa-user fs-5 mb-0 me-2 text-light"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="login.html">Đăng nhập</a></li>
                        <li><hr class="dropdown-divider"></li>  
                        <li><a class="dropdown-item" href="register.html">Đăng ký</a></li>
                      </ul>
                    </div>
                    
                    <div class="position-relative d-flex align-items-center">
                      <div class="d-lg-flex d-none text-light align-items-center">
                        <i class="fa-regular fa-user fs-5 mb-0 me-2"></i>
                        <a class="p-0 m-0 text-light text-decoration-none" href="login.html">Đăng nhập</a>
                        <p class="p-0 m-0 mx-1">/</p>
                        <a class="p-0 m-0 text-light text-decoration-none" href="register.html">Đăng ký</a>
                        <p class="p-0 m-0 fs-4 mx-3">|</p>
                      </div>
                    <a href="cart.html">
                        <i class="fa-solid fa-basket-shopping fs-5 text-light"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                          3
                          <span class="visually-hidden">unread messages</span>
                        </span>
                      </a>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg menu bg-body">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav gap-3 ms-5 me-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                        <a class="nav-link active text-secondary" aria-current="page" href="home.html">
                          Trang chủ
                        </a>
                      </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link  text-secondary" href="product.html" role="button" aria-expanded="false">
                            <div class="current-page d-none d-lg-block"></div>
                            Sản phẩm
                        </a>
                        
                      </li>  
                      <li class="nav-item">
                        <a class="nav-link text-secondary" href="contact.html">Liên hệ</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link text-secondary" href="news.html">Tin tức</a>
                      </li> 
                      <li class="nav-item">
                        <a class="nav-link text-secondary" href="systemstore.html">Hệ thống của hàng</a>
                      </li>          
                    </ul>          
                  </div> 
                <div class="hotline d-flex align-items-center me-5">
                    <div class="fw-normal fs-3 me-4">|</div>
                    <i class="fa-solid fa-phone-volume me-2"></i>
                    <div class=" me-2">Hotline: </div>
                    <a class="nav-link">1900 6750</a>
                </div>
            </div>
        </nav>
    </header>
    <article>
        <div class="container">
            <div class="row mt-5">
                <div class="col-lg-3">
                    <div class="d-lg-block d-none fs-6">
                        <p class="fw-semibold">Danh mục sản phẩm</p>
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed bg-light shadow-none" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseOne" aria-expanded="false"
                                        aria-controls="flush-collapseOne">
                                        Thời trang nam
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body py-0">
                                        <ul>
                                            <li class="mb-2"><a href="">Quần áo nam</a></li>
                                            <li><a href="">Giày dép nam</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed bg-light shadow-none" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                        aria-controls="flush-collapseTwo">
                                        Thời trang nữ
                                    </button>
                                </h2>
                                <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body py-0">
                                        <ul>
                                            <li class="mb-2"><a href="">Quần áo nữ</a></li>
                                            <li><a href="">Giày dép nữ</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed bg-light shadow-none" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseThree" aria-expanded="false"
                                        aria-controls="flush-collapseThree">
                                        Thời trang trẻ em
                                    </button>
                                </h2>
                                <div id="flush-collapseThree" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body py-0">
                                        <ul>
                                            <li class="mb-2"><a href="">Thời trang bé nam</a></li>
                                            <li><a href="">Thời trang bé nữ</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <p class="fw-semibold">Màu sắc</p>
                        <a href="" class="d-flex align-items-center mb-2 ms-2">
                            <div class="filtercolor rounded-5 bg-dark d-inline-block me-1"></div> Đen
                        </a>
                        <a href="" class="d-flex align-items-center mb-2 ms-2">
                            <div class="filtercolor rounded-5 d-inline-block me-1"
                                style="background-color: rgb(18, 18, 84);"></div> Xanh đen
                        </a>
                        <a href="" class="d-flex align-items-center mb-2 ms-2">
                            <div class="filtercolor rounded-5 d-inline-block me-1"
                                style="background-color: rgb(82, 24, 24);"></div> Nâu đậm
                        </a>
                        <a href="" class="d-flex align-items-center mb-2 ms-2">
                            <div class="filtercolor rounded-5 d-inline-block me-1"
                                style="background-color: rgb(130, 39, 39);"></div> Nâu nhạt
                        </a>
                        <a href="" class="d-flex align-items-center mb-2 ms-2">
                            <div class="filtercolor rounded-5 d-inline-block me-1"
                                style="background-color: rgb(212, 66, 178);"></div> Hồng
                        </a>
                        <p class="fw-semibold">Mức giá</p>
                        <div class="mb-1 form-check">
                            <input type="checkbox" class="form-check-input" id="low1m">
                            <label class="form-check-label" for="low1m">Giá dưới 1.000.000<span
                                    class="text-decoration-underline">đ</span></label>
                        </div>
                        <div class="mb-1 form-check">
                            <input type="checkbox" class="form-check-input" id="from1m_2m">
                            <label class="form-check-label" for="from1m_2m">1.000.000<span
                                    class="text-decoration-underline">đ</span> - 2.000.000<span
                                    class="text-decoration-underline">đ</span></label>
                        </div>
                        <div class="mb-1 form-check">
                            <input type="checkbox" class="form-check-input" id="from2m_3m">
                            <label class="form-check-label" for="from2m_3m">2.000.000<span
                                    class="text-decoration-underline">đ</span> - 3.000.000<span
                                    class="text-decoration-underline">đ</span></label>
                        </div>
                        <div class="mb-1 form-check">
                            <input type="checkbox" class="form-check-input" id="from3m_4m">
                            <label class="form-check-label" for="from3m_4m">3.000.000<span
                                    class="text-decoration-underline">đ</span> - 4.000.000<span
                                    class="text-decoration-underline">đ</span></label>
                        </div>
                        <div class="mb-1 form-check">
                            <input type="checkbox" class="form-check-input" id="from4m_5m">
                            <label class="form-check-label" for="from4m_5m">4.000.000<span
                                    class="text-decoration-underline">đ</span> - 5.000.000<span
                                    class="text-decoration-underline">đ</span></label>
                        </div>
                        <div class="mb-1 form-check">
                            <input type="checkbox" class="form-check-input" id="up5m">
                            <label class="form-check-label" for="up5m">Giá trên 5.000.000<span
                                    class="text-decoration-underline">đ</span></label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-12">
                    <div class="d-flex justify-content-between">
                        <div class="d-lg-none d-block">
                            <button class="btn btn-outline-dark btn-filter d-lg-none d-block" type="button"
                                data-bs-toggle="offcanvas" data-bs-target="#product-filter"><i
                                    class="fa-solid fa-filter me-1"></i>Bộ lọc</button>
                            <div class="offcanvas offcanvas-start" id="product-filter">
                                <div class="offcanvas-header">
                                    <h5 class="offcanvas-title">Bộ lọc sản phẩm</h5>
                                    <button class="btn-close" type="button" data-bs-dismiss="offcanvas"></button>
                                </div>
                                <div class="offcanvas-body">
                                    <form action="">
                                        <p class="fw-semibold">Danh mục sản phẩm</p>
                                        <div class="accordion accordion-flush" id="accordionFlushExample">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed bg-light shadow-none" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                                        aria-expanded="false" aria-controls="flush-collapseOne">
                                                        Thời trang nam
                                                    </button>
                                                </h2>
                                                <div id="flush-collapseOne" class="accordion-collapse collapse"
                                                    data-bs-parent="#accordionFlushExample">
                                                    <div class="accordion-body py-0">
                                                        <ul>
                                                            <li class="mb-1"><a href="">Quần áo nam</a></li>
                                                            <li><a href="">Giày dép nam</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed bg-light shadow-none" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo"
                                                        aria-expanded="false" aria-controls="flush-collapseTwo">
                                                        Thời trang nữ
                                                    </button>
                                                </h2>
                                                <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                                    data-bs-parent="#accordionFlushExample">
                                                    <div class="accordion-body py-0">
                                                        <ul>
                                                            <li class="mb-1"><a href="">Quần áo nữ</a></li>
                                                            <li><a href="">Giày dép nữ</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed bg-light shadow-none" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#flush-collapseThree"
                                                        aria-expanded="false" aria-controls="flush-collapseThree">
                                                        Thời trang trẻ em
                                                    </button>
                                                </h2>
                                                <div id="flush-collapseThree" class="accordion-collapse collapse"
                                                    data-bs-parent="#accordionFlushExample">
                                                    <div class="accordion-body py-0">
                                                        <ul>
                                                            <li class="mb-1"><a href="">Thời trang bé nam</a></li>
                                                            <li><a href="">Thời trang bé nữ</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="fw-semibold">Thương hiệu</p>
                                        <div class="mb-3 form-check">
                                            <input type="checkbox" class="form-check-input" id="chanel">
                                            <label class="form-check-label" for="chanel">Chanel</label>
                                        </div>
                                        <div class="mb-3 form-check">
                                            <input type="checkbox" class="form-check-input" id="louisvuitton">
                                            <label class="form-check-label" for="louisvuitton">Louis Vuitton</label>
                                        </div>
                                        <div class="mb-3 form-check">
                                            <input type="checkbox" class="form-check-input" id="balanciaga">
                                            <label class="form-check-label" for="balanciaga">Balanciaga</label>
                                        </div>
                                        <div class="mb-3 form-check">
                                            <input type="checkbox" class="form-check-input" id="hermes">
                                            <label class="form-check-label" for="hermes">Hermes</label>
                                        </div>
                                        <p class="fw-semibold">Màu sắc</p>
                                        <a href="" class="d-flex align-items-center mb-2 ms-2">
                                            <div class="filtercolor rounded-5 bg-dark d-inline-block me-1"></div> Đen
                                        </a>
                                        <a href="" class="d-flex align-items-center mb-2 ms-2">
                                            <div class="filtercolor rounded-5 d-inline-block me-1"
                                                style="background-color: rgb(18, 18, 84);"></div> Xanh đen
                                        </a>
                                        <a href="" class="d-flex align-items-center mb-2 ms-2">
                                            <div class="filtercolor rounded-5 d-inline-block me-1"
                                                style="background-color: rgb(82, 24, 24);"></div> Nâu đậm
                                        </a>
                                        <a href="" class="d-flex align-items-center mb-2 ms-2">
                                            <div class="filtercolor rounded-5 d-inline-block me-1"
                                                style="background-color: rgb(130, 39, 39);"></div> Nâu nhạt
                                        </a>
                                        <a href="" class="d-flex align-items-center mb-2 ms-2">
                                            <div class="filtercolor rounded-5 d-inline-block me-1"
                                                style="background-color: rgb(212, 66, 178);"></div> Hồng
                                        </a>
                                        <p class="fw-semibold">Mức giá</p>
                                        <div class="mb-1 form-check">
                                            <input type="checkbox" class="form-check-input" id="low1m">
                                            <label class="form-check-label" for="low1m">Giá dưới 1.000.000<span
                                                    class="text-decoration-underline">đ</span></label>
                                        </div>
                                        <div class="mb-1 form-check">
                                            <input type="checkbox" class="form-check-input" id="from1m_2m">
                                            <label class="form-check-label" for="from1m_2m">1.000.000<span
                                                    class="text-decoration-underline">đ</span> - 2.000.000<span
                                                    class="text-decoration-underline">đ</span></label>
                                        </div>
                                        <div class="mb-1 form-check">
                                            <input type="checkbox" class="form-check-input" id="from2m_3m">
                                            <label class="form-check-label" for="from2m_3m">2.000.000<span
                                                    class="text-decoration-underline">đ</span> - 3.000.000<span
                                                    class="text-decoration-underline">đ</span></label>
                                        </div>
                                        <div class="mb-1 form-check">
                                            <input type="checkbox" class="form-check-input" id="from3m_4m">
                                            <label class="form-check-label" for="from3m_4m">3.000.000<span
                                                    class="text-decoration-underline">đ</span> - 4.000.000<span
                                                    class="text-decoration-underline">đ</span></label>
                                        </div>
                                        <div class="mb-1 form-check">
                                            <input type="checkbox" class="form-check-input" id="from4m_5m">
                                            <label class="form-check-label" for="from4m_5m">4.000.000<span
                                                    class="text-decoration-underline">đ</span> - 5.000.000<span
                                                    class="text-decoration-underline">đ</span></label>
                                        </div>
                                        <div class="mb-1 form-check">
                                            <input type="checkbox" class="form-check-input" id="up5m">
                                            <label class="form-check-label" for="up5m">Giá trên 5.000.000<span
                                                    class="text-decoration-underline">đ</span></label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <p class="mb-0 pb-0 fs-5 fw-semibold d-none d-lg-block">Tất cả sản phẩm</p>
                        <div class="row ps-1 ms-auto" style="width: 280px;">
                            <label class="col-4 col-form-label">Sắp xếp: </label>
                            <div class="col-7 p-0">
                                <select class="col-5 form-select" aria-label="Default select example">
                                    <option selected>Tên A-Z</option>
                                    <option value="1">Tên Z-A</option>
                                    <option value="2">Giá tăng dần</option>
                                    <option value="3">Giá giảm dần</option>
                                    <option value="3">Hàng mới</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row product-hot py-3">
                        <div class="col-md-4 col-sm-6" ng-repeat="pro in products">
                            <div class="card bg-light border-0">
                                <div class="card-header p-0 bg-light border-0 position-relative">
                                    <a href="/api/detail"><img ng-src="@{{ images[$index].image }}" class="card-img-top rounded-3" alt="..."></a>
                                    <a href="cart.html">
                                        <button class="addtocart-product rounded-bottom-3 border-0 bg-addtocart hover:bg-primary">
                                          <i class="fa-solid fa-basket-shopping fs-5 text-light"></i>
                                          Thêm vào giỏ hàng
                                        </button>
                                      </a>
                                </div>
                                <div class="card-body px-0">
                                    <a class="card-title product-tittle" href="detail.html">@{{ pro.name }}</a>
                                    <div class="card-text d-flex gap-2 align-items-center">
                                        <p class="price-product text-primary">@{{ pro.price | number }}<span
                                                class="text-decoration-underline">đ</span></p>
                                        <p ng-if="pro.priceold>0" class="price-product-old text-decoration-line-through">@{{ pro.priceold | number }}<span
                                                class="text-decoration-underline">đ</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <nav aria-label="Page navigation example">
                        <ul class="pagination d-flex justify-content-center mb-5">
                            <li class="page-item"><a class="page-link text-secondary" href="#"><i
                                        class="fa-solid fa-arrow-left"></i></a></li>
                            <li class="page-item"><a class="page-link text-secondary" href="#">1</a></li>
                            <li class="page-item"><a class="page-link text-secondary" href="#">2</a></li>
                            <li class="page-item"><a class="page-link text-secondary" href="#">3</a></li>
                            <li class="page-item"><a class="page-link text-secondary" href="#"><i
                                        class="fa-solid fa-arrow-right"></i></a></li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
        </div>
        <section class="bg-primary search-promotion d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-12 my-auto ">
                        <h4 class=" fs-6 text-light fw-bold p-0 m-lg-0 mb-2">NHẬP THÔNG TIN KHUYẾN MÃI TỪ CHÚNG TÔI</h4>
                    </div>
                    <div class="col-lg-6 col-12">
                        <form class="d-flex gap-0" role="search">
                            <input class="form-control h-100 mx-0" type="search" placeholder="Nhập email của bạn"
                                aria-label="Search">
                            <button class="btn btn-outline-success h-100 text-light fw-bold  mx-0"
                                type="submit">Gửi</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </article>
    


  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-5 col-md-7">
          <img src="images/logo.webp" alt="">
          <h3 class="text-primary fs-5 my-3">Shop Thời trang và phụ kiện Alena</h3>
          <div class="row align-items-center mb-3">
            <div class="col-1">
              <i class="fa-solid fa-location-dot"></i>
            </div>
            <div class="col-11">
              <p class="m-0 ms-2">Tầng 6, Tòa nhà Ladeco, 266 Đội Cấn, Phường Liễu Giai, Quận Ba Đình, TP Hà Nội</p>
            </div>
          </div>
          <div class="row align-items-center mb-3">
            <div class="col-1">
              <i class="fa-solid fa-clock"></i>
            </div>
            <div class="col-11">
              <p class="m-0 ms-2">Giờ làm việc: Từ 9:00 đến 22:00 các ngày trong tuần từ Thứ 2 đến Chủ nhật</p>
            </div>
          </div>
          <div class="row align-items-center mb-3">
            <div class="col-1">
              <i class="fa-solid fa-phone"></i>
            </div>
            <div class="col-11">
              <p class=" m-0 ms-2">Hotline</p>
              <h3 class="text-primary fs-5 m-0 ms-2">1900 6750</h3>
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-md-5">
          <div class="text-light fw-bold mt-2">Về chúng tôi</div>
          <ul class="p-0 mt-3">
            <li class="mb-2"><a href="">Trang chủ</a></li>
            <li class="mb-2"><a href="">Sản phẩm áo</a></li>
            <li class="mb-2"><a href="">Quấn áo</a></li>
            <li class="mb-2"><a href="">Phụ kiện</a></li>
            <li class="mb-2"><a href="">Giới thiệu</a></li>
            <li class="mb-2"><a href="">Liên hệ</a></li>
            <li class="mb-2"><a href="">Tin tức</a></li>
          </ul>
        </div>
        <div class="col-lg-3 col-md-7">
          <div class="text-light fw-bold mt-2">Hỗ trợ khách hàng</div>
          <ul class="p-0 mt-3">
            <li class="mb-2"><a href="">Chính sách đối tác</a></li>
            <li class="mb-2"><a href="">Chính sách đổi trả</a></li>
            <li class="mb-2"><a href="">Chính sách thanh toán</a></li>
            <li class="mb-2"><a href="">Chính sách giao hàng</a></li>
            <li class="mb-2"><a href="">Khiếu nại</a></li>
          </ul>
        </div>
        <div class="col-lg-2 col-md-5">
          <div class="text-light fw-bold mt-2">Dịch vụ</div>
          <ul class="p-0 mt-3">
            <li class="mb-2"><a href="">Tư vấn</a></li>
            <li class="mb-2"><a href="">Mua hàng</a></li>
            <li class="mb-2"><a href="">Giao hàng</a></li>
            <li class="mb-2"><a href="">Khuyến mãi</a></li>
          </ul>
        </div>
      </div>
      <div class="row">
        <div class="offset-xl-10 col-xl-2 offset-lg-9 col-lg-3 offset-md-7 col-md-5">
          <i class="fa-brands fa-youtube me-1"></i>
          <i class="fa-brands fa-instagram mx-1"></i>
          <i class="fa-brands fa-facebook-f mx-1"></i>
        </div>
      </div>
    </div>
  </footer>
  <script>
    var app = angular.module('productApp', []);
    app.controller('ProductController', function($scope, $http,$timeout) {
        $http.get('http://127.0.0.1:8000/api/dataproduct').then(function(response) {
            $scope.categoriesParent = response.data.categoriesParent;
            $scope.categoriesChildren = response.data.categoriesChildren;
            $scope.images = response.data.images;
            $scope.colors = response.data.colors;
            $scope.products = response.data.products;
            $scope.products=$scope.products.filter(e=>e.hide==0);
            
            $scope.baseUrl = window.location.origin;
            for(let i=0;i<$scope.images.length;i++){
              $scope.images[i].image=$scope.baseUrl + '/' + $scope.images[i].image;
            }
            $scope.getCategoriesChildrenOf=function(id){
                return $scope.categoriesChildren.filter(e=>e.id_parent==id);
            }
            console.log($scope.images);
        });

    });
</script>
  <script src="https://kit.fontawesome.com/b1f196da8e.js" crossorigin="anonymous"></script>
  <script src="{{ asset('bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

  <<script src="https://kit.fontawesome.com/b1f196da8e.js" crossorigin="anonymous"></script>
  <script src="{{ asset('bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</body>

</html>