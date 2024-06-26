
<!DOCTYPE html>
<html lang="en"  ng-app="productApp">
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
<body  ng-controller="ProductController">
    <header class="bg-body">
        <div class="top-header">
            <div class="container d-flex h-100 align-items-center justify-content-evenly">
                <img src="http://127.0.0.1:8000/images/logo.webp" alt="" class="img-fluid logo">
                <form class="d-flex" role="search">
                    <input class="form-control border-0 rounded-end-0 rounded-start-5 ps-4" type="search" placeholder="Tìm kiếm sản phẩm bạn mong muốn" aria-label="Search">
                    <button class="btn btn-primary border-0 bg-primary rounded-end-5 rounded-start-0" type="submit"><i class="fa-solid fa-magnifying-glass text-light pe-2"></i></button>
                </form>
                <div class="dropdown d-lg-none ms-2">
                  <button class="btn bg-secondary p-0 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
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
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav gap-3 ms-5 me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active text-secondary" aria-current="page" href="home.html">
                      <div class="current-page"></div>
                      Trang chủ
                    </a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link text-secondary" href="/api/product" role="button" aria-expanded="false">
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
        <div id="carouselExampleIndicators" class="carousel slide"   data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active"   data-bs-interval="2000">
                <img src="http://127.0.0.1:8000/images/baner.webp" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item"  data-bs-interval="2000">
                <img src="http://127.0.0.1:8000/images/banner2.png" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item"  data-bs-interval="2000">
                <img src="http://127.0.0.1:8000/images/banner3.jpg" class="d-block w-100" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
          <section class="service bg-primary text-center">
            <div class="container">
              <div class="row">
                <div class="col-lg-3 col-md-6 card bg-primary text-light border-0 py-4">
                  <img src="http://127.0.0.1:8000/images/freeshipping.webp" alt="...">
                  <div class="card-body pb-0 px-0">
                    <h5 class="card-title">MIỄN PHÍ GIAO HÀNG</h5>
                    <p class="card-text">Miễn phí ship với các đơn hàng >499K</p>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 card bg-primary text-light border-0 py-4">
                  <img src="http://127.0.0.1:8000/images/checkout.webp" alt="...">
                  <div class="card-body pb-0 px-0">
                    <h5 class="card-title">THANH TOAN COD</h5>
                    <p class="card-text">Thanh toán khi nhận hàng (COD)</p>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 card bg-primary text-light border-0 py-4">
                  <img src="http://127.0.0.1:8000/images/customervip.webp" alt="...">
                  <div class="card-body pb-0 px-0">
                    <h5 class="card-title">KHÁCH HÀNG VIP</h5>
                    <p class="card-text">Ưu đãi giành cho khách hàng VIP</p>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 card bg-primary text-light border-0 py-4">
                  <img src="http://127.0.0.1:8000/images/guarantee.webp" alt="...">
                  <div class="card-body pb-0 px-0">
                    <h5 class="card-title">HỖ TRỢ BẢO HÀNH</h5>
                    <p class="card-text">Đổi, sửa đồ tại tất cả store</p>
                  </div>
                </div>
              </div>
            </div>
          </section>
        <section class="product-hot bg-body">
          <div class="container" id="myTab" role="tablist">
            <div class="row">
              <div class="section-tittle col-lg-5 col-12 text-center text-lg-start position-relative">
                <div class="d-none d-lg-block section-decoration"></div>
                HÀNG MỚI VỀ
              </div>
              <div class="col-lg-7 col-12">
                <div class="row my-4 d-flex  align-items-center">
                  <div class="col-1"><i class="fa-solid fa-arrow-left"></i></div>
                  <div class="col-10 catalog-btn-body d-flex justify-content-evenly">
                    <button class="me-1 btn bg-primary text-light text-nowrap border-0 active" id="home-tab"
                      data-bs-toggle="tab" data-bs-target="#tab1" aria-controls="home-tab-pane" aria-selected="true">@{{ categoriesHome[0].name }}</button>
                    <button ng-repeat="ca in categoriesHome.slice(1)" class="me-1 btn  bg-body text-nowrap border-0" id="profile-tab" data-bs-toggle="tab"
                    data-bs-target="#tab@{{ $index+2 }}" type="button" role="tab" aria-controls="profile-tab-pane"
                    aria-selected="false">@{{  ca.name  }}</button>
                    
                    
                    
                    {{-- <button class="me-1 btn  bg-body text-nowrap border-0" id="profile-tab" data-bs-toggle="tab"
                      data-bs-target="#tab3" type="button" role="tab" aria-controls="profile-tab-pane"
                      aria-selected="false">Thời trang Unisex</button> --}}
                  </div>
                  <div class="col-1"><i class="fa-solid fa-arrow-right"></i></div>
        
                </div>
              </div>
              
              <div class="tab-content" id="myTabContent">
        
                <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                  <div class="row">
            
                      
                    <div class="col-lg-3 col-md-4 col-sm-6" ng-repeat="pro in getProductNewOfCategory(categoriesHome[0].id).slice(0,4)">
                      <div class="card bg-body border-0">
                          <div class="card-header p-0 bg-body border-0 position-relative">
                              <a href="/detail">
                                  <img ng-src="@{{ getImage(pro.id) }}" class="card-img-top rounded-3" alt="...">
                              </a>
                              <a href="/cart">
                                  <button class="addtocart-product rounded-bottom-3 border-0 bg-addtocart hover:bg-primary">
                                      <i class="fa-solid fa-basket-shopping fs-5 text-light"></i>
                                      Thêm vào giỏ hàng
                                  </button>
                              </a>
                          </div>
                          <div class="card-body px-0">
                              <a class="card-title product-tittle" href="detail.html">@{{ pro.name }}</a>
                              <div class="card-text d-flex gap-2 align-items-center">
                                  <p class="price-product text-primary">@{{ pro.price | number }}<span class="text-decoration-underline">đ</span></p>
                                  <p ng-if="pro.priceold > 0" class="price-product-old text-decoration-line-through">@{{ pro.priceold | number }}<span class="text-decoration-underline">đ</span></p>
                              </div>
                          </div>
                      </div>
                  </div>
                  
                  </div>
                </div>
        
                <div ng-repeat="ca in categoriesHome.slice(1)" class="tab-pane fade" id="tab@{{ $index+1 }}" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                  <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-6" ng-repeat="pro in getProductNewOfCategory(categoriesHome[$index].id).slice(0,4)">
                      <div class="card bg-body border-0">
                          <div class="card-header p-0 bg-body border-0 position-relative">
                              <a href="/detail">
                                  <img ng-src="@{{ getImage(pro.id) }}" class="card-img-top rounded-3" alt="...">
                              </a>
                              <a href="/cart">
                                  <button class="addtocart-product rounded-bottom-3 border-0 bg-addtocart hover:bg-primary">
                                      <i class="fa-solid fa-basket-shopping fs-5 text-light"></i>
                                      Thêm vào giỏ hàng
                                  </button>
                              </a>
                          </div>
                          <div class="card-body px-0">
                              <a class="card-title product-tittle" href="detail.html">@{{ pro.name }}</a>
                              <div class="card-text d-flex gap-2 align-items-center">
                                  <p class="price-product text-primary">@{{ pro.price | number }}<span class="text-decoration-underline">đ</span></p>
                                  <p ng-if="pro.id > 0" class="price-product-old text-decoration-line-through">@{{ pro.priceold | number }}<span class="text-decoration-underline">đ</span></p>
                              </div>
                          </div>
                      </div>
                    </div>
                </div>
               
        
                <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">3</div>
              </div>
        
              <div class="row ms-1 w-100">
                <button class="read-more btn btn-lg bg-secondary text-light hover:bg-primary mx-auto">Xem tất cả</button>
              </div>
            </div>
          </section>
          <section class="product-hot bg-light">
            <div class="container"  id="myTabSale" role="tablist">
              <div class="row">
                <div class="section-tittle col-lg-5 col-12 text-center text-lg-start position-relative">
                  <div class="d-none d-lg-block section-decoration"></div>
                  SẢN PHẨM GIẢM GIÁ
                </div>
                <div class="col-lg-7 col-12">
                  <div class="row my-4 d-flex  align-items-center">
                    <div class="col-1"><i class="fa-solid fa-arrow-left"></i></div>
                    <div class="col-10 catalog-btn-light d-flex justify-content-evenly">
                      <button class="me-1 btn bg-primary text-light text-nowrap border-0 active" id="home-tab"
                      data-bs-toggle="tab" data-bs-target="#tab-sale1" aria-controls="home-tab-pane" aria-selected="true">@{{ categoriesHome[0].name }}</button>
                      {{-- <button class="me-1 btn bg-primary text-light text-nowrap border-0 active" id="home-tab"
                        data-bs-toggle="tab" data-bs-target="#tab-sale1" aria-controls="home-tab-pane" aria-selected="true">@{{ $categoriesHome[0].name }}</button> --}}
                  
                      <button ng-repeat="ca in categoriesHome.slice(1)" class="me-1 btn  bg-light text-nowrap border-0" id="profile-tab" data-bs-toggle="tab"
                      data-bs-target="#tab-sale@{{ $index+2 }}" type="button" role="tab" aria-controls="profile-tab-pane"
                      aria-selected="false">@{{  ca.name  }}</button>
                      
                      
                      
                      {{-- <button class="me-1 btn  bg-body text-nowrap border-0" id="profile-tab" data-bs-toggle="tab"
                        data-bs-target="#tab3" type="button" role="tab" aria-controls="profile-tab-pane"
                        aria-selected="false">Thời trang Unisex</button> --}}
                    </div>
                    <div class="col-1"><i class="fa-solid fa-arrow-right"></i></div>
          
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 d-md-block d-none">
                  <img src="http://127.0.0.1:8000/images/product_new.webp" height="95%" width="100%" alt="">
                </div>
                <div class="col-md-6 col-sm-12">
                 
                    <div class="tab-content" id="myTabContent">
        
                      <div class="tab-pane fade show active" id="tab-sale1" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                        <div class="row">
                        
                            
                            <div class="col-lg-6 col-md-12" ng-repeat="pro in getProductSaleOfCategory(categoriesHome[0].id).slice(0,4)">
                              <div class="card bg-light border-0">
                                <div class="card-header p-0 bg-light border-0 position-relative">
                                  <a href="/detail"><img  ng-src="@{{ getImage(pro.id) }}" class="card-img-top rounded-3"
                                      alt="..."></a>
                                  <a href="/cart">
                                    <button class="addtocart-product rounded-bottom-3 border-0 bg-addtocart hover:bg-primary">
                                      <i class="fa-solid fa-basket-shopping fs-5 text-light"></i>
                                      Thêm vào giỏ hàng
                                    </button>
                                  </a>
                                </div>
                                <div class="card-body px-0">
                                  <a class="card-title product-tittle" href="detail.html">@{{ pro.name }}</a>
                                  <div class="card-text d-flex gap-2 align-items-center">
                                    <p class="price-product text-primary">@{{ pro.price | number }}<span class="text-decoration-underline">đ</span>
                                    </p>
                                    
                                    <p ng-if="pro.priceold>0" class="price-product-old text-decoration-line-through">@{{ pro.priceold | number }}<span
                                      class="text-decoration-underline">đ</span></p>
                                  
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                      </div>
              
                      <div ng-repeat="ca in categoriesHome" class="tab-pane fade" id="tab-sale@{{ $index+2 }}" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                        <div class="row">
                          
                              <div class="col-lg-6 col-md-12" ng-repeat="pro in getProductSaleOfCategory(ca.id).slice(0,4)">
                                <div class="card bg-light border-0">
                                  <div class="card-header p-0 bg-light border-0 position-relative">
                                    <a href="/detail"><img  ng-src="@{{ getImage(pro.id) }}" class="card-img-top rounded-3"
                                        alt="..."></a>
                                    <a href="/cart">
                                      <button class="addtocart-product rounded-bottom-3 border-0 bg-addtocart hover:bg-primary">
                                        <i class="fa-solid fa-basket-shopping fs-5 text-light"></i>
                                        Thêm vào giỏ hàng
                                      </button>
                                    </a>
                                  </div>
                                  <div class="card-body px-0">
                                    <a class="card-title product-tittle" href="detail.html">@{{ pro.name }}</a>
                                    <div class="card-text d-flex gap-2 align-items-center">
                                      <p class="price-product text-primary">@{{ pro.price | number }}<span class="text-decoration-underline">đ</span>
                                      </p>
                                      
                                      <p ng-if="pro.priceold>0" class="price-product-old text-decoration-line-through">@{{ pro.priceold  | number}}<span
                                        class="text-decoration-underline">đ</span></p>
                                      
                                    </div>
                                  </div>
                                </div>
                              </div>
                              
                          </div>
                      </div>
              
                      <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">3</div>
                    </div>
                  
                </div>
              </div>
            </div>
          </section>
          <section class="product-hot bg-secondary">
            <div class="container">
              <div class="row">
                <div class="section-tittle col-12 text-center text-lg-start position-relative text-light">
                  <div class="d-none d-lg-block section-decoration"></div>
                  SALE ĐỒNG GIÁ - ĐỪNG LO VỀ GIÁ
                </div>
              </div>
              <img src="http://127.0.0.1:8000/images/baner-same-price.webp" height="95%" width="100%" class="mb-4" alt="">
              <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6" ng-repeat="pro in getProductFlatPriceOfCategory().slice(0,4)">
                  <div class="card bg-secondary border-0">
                    <div class="card-header p-0 bg-secondary border-0 position-relative">
                      <img ng-src="@{{ getImage(pro.id) }}" class="card-img-top rounded-3" alt="...">
                      <button class="addtocart-product rounded-bottom-3 border-0 bg-addtocart hover:bg-primary">
                        <i class="fa-solid fa-basket-shopping fs-5 text-light"></i>
                        Thêm vào giỏ hàng
                      </button>
                    </div>
                    <div class="card-body px-0">
                      <a class="card-title product-tittle text-light">@{{ pro.name }}</a>
                      <div class="card-text d-flex gap-2 align-items-center">
                        <p class="price-product text-primary">@{{ pro.price | number }}<span class="text-decoration-underline">đ</span></p>
                        <p ng-if="pro.priceold>0" class="price-product-old text-decoration-line-through  text-light">@{{ pro.priceold | number }}<span
                            class="text-decoration-underline">đ</span></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row ms-1 w-100">
                <button class="read-more btn btn-lg bg-primary text-light mx-auto" id="seeall">Xem tất cả</button>
              </div>
            </div>
          </section>
          <section class="bg-primary search-promotion d-flex align-items-center">
            <div class="container">
              <div class="row">
                <div class="col-lg-6 col-12 my-auto ">
                  <h4 class=" fs-6 text-light fw-bold p-0 m-lg-0 mb-2">NHẬP THÔNG TIN KHUYẾN MÃI TỪ CHÚNG TÔI</h4>
                </div>
                <div class="col-lg-6 col-12">
                  <form class="d-flex gap-0" role="search">
                    <input class="form-control h-100 mx-0" type="search" placeholder="Nhập email của bạn" aria-label="Search">
                    <button class="btn btn-outline-success h-100 text-light fw-bold  mx-0" type="submit">Gửi</button>
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
            $http.get('http://127.0.0.1:8000/api/datahome').then(function(response) {
                $scope.categoriesHome = response.data.categoriesHome;
                $scope.categoriesChildren = response.data.categoriesChildren;
                $scope.images = response.data.images;
                $scope.productNew = response.data.productNew;
                $scope.productSale = response.data.productSale;
                $scope.productFlatPrice = response.data.productFlatPrice;
                $scope.baseUrl = window.location.origin;
                for(let i=0;i<$scope.images.length;i++){
                  $scope.images[i].image=$scope.baseUrl + '/' + $scope.images[i].image;
                }
                $scope.getProductNewOfCategory=function(id){
                  $scope.productsTemp=[];
                  $scope.categoriesChildren.filter(e=>e.id_parent==id).forEach(element => {
                    $scope.productsTemp.push(...$scope.productNew.filter(b=>b.id_category==element.id));
                  });
                  return  $scope.productsTemp.sort(function(a, b) {
                        return b.id - a.id;
                    });
                }
                $scope.getProductSaleOfCategory=function(id){
                  $scope.productsTemp=[];
                  $scope.categoriesChildren.filter(e=>e.id_parent==id).forEach(element => {
                    $scope.productsTemp.push(...$scope.productSale.filter(b=>b.id_category==element.id));
                  });

                  return  $scope.productsTemp.filter(e=>e.priceold>0);
                }
                $scope.getProductFlatPriceOfCategory=function(){
                  return $scope.productFlatPrice.filter(b=>b.price==200000)

                }
                $scope.getImage=function(id){
                  return $scope.images.filter(e => e.id_product == id && e.is_main == 1)[0].image;
                }
                console.log($scope.images[0].image);
                $timeout(function(){
                  var catalog_btns = document.getElementsByClassName('catalog-btn-body');
                catalog_btns = Array.from(catalog_btns);
                catalog_btns.forEach(a => {
                    Array.from(a.children).forEach(b => {
                    b.addEventListener('click', function () {
                        var otherbtn = Array.from(b.parentElement.children);
                        otherbtn.forEach(c => {
                        c.classList.remove('bg-primary', 'text-light');
                        c.classList.add('bg-body');
                        });
                        b.classList.remove('bg-body');
                        b.classList.add('bg-primary', 'text-light');
                    });
                    })
                });
                var catalog_btns = document.getElementsByClassName('catalog-btn-light');
                catalog_btns = Array.from(catalog_btns);
                catalog_btns.forEach(a => {
                    Array.from(a.children).forEach(b => {
                    b.addEventListener('click', function () {
                        var otherbtn = Array.from(b.parentElement.children);
                        otherbtn.forEach(c => {
                        c.classList.remove('bg-primary', 'text-light');
                        c.classList.add('bg-light');
                        });
                        b.classList.remove('bg-light');
                        b.classList.add('bg-primary', 'text-light');
                    });
                    })
                  });
                }, 200)
            });

        });
    </script>
    <script src="https://kit.fontawesome.com/b1f196da8e.js" crossorigin="anonymous"></script>
    <script src="{{ asset('bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    {{-- <script src="{{ asset('javascipt.js') }}"></script> --}}
</body>
</html>