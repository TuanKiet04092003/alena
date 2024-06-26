
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
                    <a class="nav-link dropdown-toggle text-secondary" href="product.html" role="button" aria-expanded="false">
                      Sản phẩm
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Bé nam</a></li>
                      <li><hr class="dropdown-divider"></li>  
                      <li><a class="dropdown-item" href="#">Bé nữ</a></li>
                    </ul>
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
      <section class="product-detail my-5">
        <div class="container">
          <div class="row mx-5">
            <div class="col-lg-6">
              <div id="carouselExampleIndicators" class="carousel slide">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img ng-src="@{{ imagesColors[0].image }}" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item" ng-repeat="img in imagesDetail">
                    <img ng-src="@{{ img.image }}" class="d-block w-100" alt="...">
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
             
                  <div class="d-flex">
                    <img class="img-fluid img-detail img-thumbnail"  ng-src="@{{ imagesColors[0].image }}"  alt="" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1">
                    <img class="img-fluid img-detail img-thumbnail" ng-repeat="img in imagesDetail"  ng-src="@{{ img.image }}"  alt=""  type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="@{{ $index+1 }}" aria-label="Slide @{{ $index+2 }}">
                    
                    
                  </div>
              
              </div>
              
            </div>
            <div class="col-lg-6 ps-4">
              <h3 class="fw-bold fs-4">@{{product.name}}</h3>
              <p>@{{product.code_product}}</p>
              <div class="d-flex align-items-baseline gap-2">
                <h2 class="price-product-detail fw-bold">@{{product.price | number }}<span class="text-decoration-underline">đ</span></h2>
                <h3 ng-if="product.priceold>0" class="fs-5 text-decoration-line-through price-product-detail-old">@{{ product.priceold | number }}<span class="text-decoration-underline">đ</span></h3>
                <p class="sale-label badge text-light ms-2">Sale</p>
              </div>
              <div class="d-flex align-items-stretch mb-5 mt-3">
                <img src="{{ asset('images/freeshipping-detail.webp') }}" height="47px" width="55px" alt="">
                <div class="ms-4">
                  <p class="fw-bold m-0">Miễn phí vận chuyển</p>
                  <p class="m-0">Cho đơn hàng từ 499.000đ</p>
                </div>
              </div>
              <div class="d-flex align-items-lg-stretch mb-3">
                <img src="{{ asset('images/free-exchange.webp') }}" height="46px" width="52px" alt="">
                <div class="ms-4">
                  <p class="fw-bold m-0">Miễn phí đổi, sửa hàng</p>
                  <p class="m-0">Đổi hàng trong 30 ngày kể từ ngày mua Hỗ trợ sửa đồ miễn phí</p>
                </div>
              </div>
              <p class="fw-medium">Kích thước:</p>
              <div class="btn-group" role="group" style="height: 50px;" aria-label="Button group with nested dropdown">
                <button type="button" class="btn btn-outline-secondary btn-amount bg-secondary text-light" style="width: 50px;">@{{ sizes[0].code_size }}</button>
                <button type="button" class="btn btn-outline-secondary btn-amount" style="width: 50px;" ng-repeat="size in sizes">@{{ size.code_size }}</button>
              </div>
              <p class="fw-medium mt-3">Màu sắc: Đen</p>
              <div class="d-flex mb-3 gap-2">
                <div ng-repeat="image in imagesColors" class="filtercolor rounded-5 d-inline-block me-1"
                    style="background-color: @{{ getColor(image.id_color).code_color }};"></div>
      
              </div>                 
              <p>Số lượng:</p>
              <div class="btn-group" role="group" style="height: 50px;" aria-label="Button group with nested dropdown">
                <button type="button" class="btn btn-outline-secondary btn-amount" style="width: 50px;">-</button>
                <input type="text" class="form-control text-center fs-5 fw-semibold" value="1" style="width: 75px;">
                <button type="button" class="btn btn-outline-secondary btn-amount" style="width: 50px;">+</button>
              </div>
              <br>
              <a href="checkout.html"><button class="my-3 btn-buynow-detail btn btn-lg border-0 text-light fw-semibold bg-secondary">Mua ngay</button></a>
              <button class="btn-addtocart-detail btn btn-outline-primary btn-lg text-secondary fw-semibold">Thêm vào giỏ hàng</button>
              <div class="accordion accordion-flush mt-4" id="accordionFlushExample">
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                      Thông tin chi tiết sản phẩm
                    </button>
                  </h2>
                  <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Áo len lông cừu chất siêu mềm mại,
                       mặc mê ngay các bạn nha. Áo có độ dày vừa phải, phù hợp với thời
                        tiết se lạnh. Kiểu dáng basic rất dễ mix đồ, các bạn có thể mặc
                         với chân váy, quần jeans, hay mix với áo cardigan, áo phao đều đẹp.
                          Hàng Quảng Châu 1000000% luôn nha. Đảm bảo rẻ nhất Shopee vì đây 
                          là mối hàng lâu năm của Shop, sản xuất tận gốc!!!</div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                      Chất liệu
                    </button>
                  </h2>
                  <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Len cao cấp</div>
                  </div>
                </div>
              </div>
            </div>
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
        app.controller('ProductController', function($scope, $http) {
            $http.get('http://127.0.0.1:8000/api/datadetail').then(function(response) {
                $scope.product = response.data.product;
                console.log($scope.product);
                $scope.imagesColors = response.data.imagesColors;
                $scope.imagesDetail = response.data.imagesDetail;
                $scope.sizes = response.data.sizes;
                $scope.colors = response.data.colors;
                $scope.baseUrl = window.location.origin;
                for(let i=0;i<$scope.imagesColors.length;i++){
                  $scope.imagesColors[i].image=$scope.baseUrl + '/' + $scope.imagesColors[i].image;
                }
                for(let i=0;i<$scope.imagesDetail.length;i++){
                  $scope.imagesDetail[i].image=$scope.baseUrl + '/' + $scope.imagesDetail[i].image;
                }
                $scope.getColor=function(id){
                  return $scope.colors.filter(e=>e.id==id)[0];
                }
                console.log($scope.imagesColors);
            });
        });
  
    </script>
    <script src="https://kit.fontawesome.com/b1f196da8e.js" crossorigin="anonymous"></script>
    <script src="{{ asset('bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="javascipt.js"></script>
</body>
</html>