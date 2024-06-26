@extends('layout')
@section('title', 'KShop | Chi tiết')
@section('productpage')
<div class="current-page d-none d-lg-block"></div>
@endsection
@section('homeheader')
@section('content')
<div id="myDataInventories" data-array='{{ $inventories }}'></div>
<div id="myDataIdColor" data-array='{{  $color->getColorById($imagesColors[0]->id_color)->id }}'></div>
<div id="myDataimagesColors" data-array='{{  $imagesColors }}'></div>
<script>
   var inventories = JSON.parse(document.getElementById('myDataInventories').getAttribute('data-array'));
    var idColorDetail = JSON.parse(document.getElementById('myDataIdColor').getAttribute('data-array'));
    console.log(idColorDetail);
    var imagesColors = JSON.parse(document.getElementById('myDataimagesColors').getAttribute('data-array'));
</script>
<section class="product-detail my-5">
  <form action="/addtocart" method="POST">
    @csrf
    <input type="hidden" id="inputidinventory" name="idinventory" value="{{ $idInventoryDefault }}">
    <input type="hidden" id="inputimage" name="image" value="{{ $imagesColors[0]->image }}">
    <input type="hidden" id="inputprice" name="price" value="{{ $product->price }}">
    <div class="container"  id="myTabDetail" role="tablist">
      <div class="row mx-5">
        <div class="col-lg-6" >
          <div  class="tab-content" id="myTabContent">
          
          @for ($i = 0; $i < count($imagesColors); $i++)
                @if ($i==0)
                <div  class="tab-pane fade show active" id="detail{{ $i }}" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                  <div id="carouselExampleIndicators" class="carousel slide" >
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="{{ asset($imagesColors[$i]->image) }}" class="d-block w-100" alt="...">
                      </div>
                      @for ($j = 0; $j < count($imagesDetail); $j++)
                            <div class="carousel-item">
                              <img src="{{ asset($imagesDetail[$j]->image) }}" class="d-block w-100" alt="...">
                            </div>
                      @endfor
                    </div>
                    <button class="carousel-control-prev h-75" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next h-75" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                    <div class="d-flex">
                      @if (count($imagesDetail)>3)
                      <i class="fa-solid fa-chevron-left my-auto fs-4" onclick="scrollThumbnails(-90)"></i>
                      @endif
                      <div id="thumbnailContainer">
                        <img class="img-fluid img-detail img-thumbnail" src="{{ asset($imagesColors[$i]->image) }}" alt="" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1">
                        @for ($j = 0; $j < count($imagesDetail); $j++)
                          @if ($j==0)
                          <img class="img-fluid img-detail img-thumbnail" src="{{ asset($imagesDetail[$j]->image) }}" alt=""  type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $j+1 }}" aria-label="Slide {{ $j+2 }}">
                          @else
                          <img class="img-fluid img-detail img-thumbnail d-xl-block d-none" src="{{ asset($imagesDetail[$j]->image) }}" alt=""  type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $j+1 }}" aria-label="Slide {{ $j+2 }}">
                          @endif
                        @endfor
                      </div>
                      @if (count($imagesDetail)>3)
                      <i class="fa-solid fa-chevron-right my-auto fs-4"  onclick="scrollThumbnails(90)"></i>
                      @endif
                    </div>
                  </div>
                </div>
                  
                
                    
                @else
                <div  class="tab-pane fade" id="detail{{ $i }}" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                  <div id="carousel{{ $i }}" class="carousel slide" >
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="{{ asset($imagesColors[$i]->image) }}" class="d-block w-100" alt="...">
                      </div>
                      @for ($j = 0; $j < count($imagesDetail); $j++)
                            <div class="carousel-item">
                              <img src="{{ asset($imagesDetail[$j]->image) }}" class="d-block w-100" alt="...">
                            </div>
                      @endfor
                    </div>
                    <button class="carousel-control-prev h-75" type="button" data-bs-target="#carousel{{ $i }}" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon h-75" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next h-75" type="button" data-bs-target="#carousel{{ $i }}" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                    
                    <div class="d-flex">
                      @if (count($imagesDetail)>3)
                      <i class="fa-solid fa-chevron-left my-auto fs-4" onclick="scrollThumbnails(-90)"></i>
                      @endif
                      <div id="thumbnailContainer">
                        <img class="img-fluid img-detail img-thumbnail" src="{{ asset($imagesColors[$i]->image) }}" alt="" type="button" data-bs-target="#carousel{{ $i }}" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1">
                        
                        @for ($j = 0; $j < count($imagesDetail); $j++)
                          @if ($j==0)
                          <img class="img-fluid img-detail img-thumbnail" src="{{ asset($imagesDetail[$j]->image) }}" alt=""  type="button" data-bs-target="#carousel{{ $i }}" data-bs-slide-to="{{ $j+1 }}" aria-label="Slide {{ $j+2 }}">
                          @else
                          <img class="img-fluid img-detail img-thumbnail d-xl-block d-none" src="{{ asset($imagesDetail[$j]->image) }}" alt=""  type="button" data-bs-target="#carousel{{ $i }}" data-bs-slide-to="{{ $j+1 }}" aria-label="Slide {{ $j+2 }}">
                          @endif
                        @endfor
                      </div>
                        @if (count($imagesDetail)>3)
                        <i class="fa-solid fa-chevron-right my-auto fs-4"  onclick="scrollThumbnails(90)"></i>
                        @endif
                      
                    </div>
                  </div>
                </div>
                
                @endif
          @endfor
          
          
              </div>
        </div>
        <div class="col-lg-6 ps-4">
          <h3 class="fw-bold fs-4">{{ $product->name }}</h3>
          <p>Mã sản phẩm: {{ $product->code_product }}</p>
          <div class="d-flex align-items-baseline gap-2">
            <h2 class="price-product-detail fw-bold">{{ number_format($product->price, 0, ',', '.') }}<span class="text-decoration-underline">đ</span></h2>
            @if ($product->priceold>0)
              <h3 class="fs-5 text-decoration-line-through price-product-detail-old">{{ number_format($product->priceold, 0, ',', '.') }}<span class="text-decoration-underline">đ</span></h3>
              <p class="sale-label badge text-light ms-2">Sale</p>
              @endif
            
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
          <div class="btn-group btn-sizes" role="group" style="height: 50px;" aria-label="Button group with nested dropdown">
            @for ($i = 0; $i < count($sizes); $i++)
                @if ($i==0)
                  <button type="button" idSizeDetail="{{ $sizes[$i]->id }}" class="btn btn-outline-secondary fw-medium btn-amount bg-secondary text-light" style="width: 50px;">{{ $sizes[$i]->code_size }}</button>
                @else
                  <button type="button" idSizeDetail="{{ $sizes[$i]->id }}" class="btn btn-outline-secondary fw-medium btn-amount" style="width: 50px;">{{ $sizes[$i]->code_size }}</button>
                @endif
            @endfor
          </div>
          <p class="fw-medium mt-3">Màu sắc: {{ $color->getColorById($imagesColors[0]->id_color)->color }}</p>
          <div class="d-flex mb-3 gap-2 btn-colors">
            @for ($i = 0; $i < count($imagesColors); $i++)
              @if ($i==0)
                <div class="filtercolor rounded-5 d-inline-block me-1 active"  id="home-tab" idColorDetail="{{ $color->getColorById($imagesColors[$i]->id_color)->id }}"
                data-bs-toggle="tab" data-bs-target="#detail{{ $i }}" aria-controls="home-tab-pane" aria-selected="true"
                style="background-color: {{ $color->getColorById($imagesColors[$i]->id_color)->code_color }};"></div>
              @else
                <div class="filtercolor rounded-5 d-inline-block me-1"   id="profile-tab"
                idColorDetail="{{ $color->getColorById($imagesColors[$i]->id_color)->id }}"
                 data-bs-toggle="tab" data-bs-target="#detail{{ $i }}" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false"
                style="background-color: {{ $color->getColorById($imagesColors[$i]->id_color)->code_color }};"></div>
              @endif
            @endfor
            
            {{-- <div class="filtercolor rounded-5 d-inline-block me-1"
                style="background-color: rgb(18, 18, 84);"></div>
        
            <div class="filtercolor rounded-5 d-inline-block me-1"
                style="background-color: rgb(82, 24, 24);"></div>
            <div class="filtercolor rounded-5 d-inline-block me-1"
                style="background-color: rgb(214, 102, 102);"></div>
                <div class="filtercolor rounded-5 d-inline-block me-1"
                style="background-color: rgb(227, 122, 217);"></div> --}}
          </div>                 
          <p>Số lượng:</p>
          <div class="btn-group" role="group" style="height: 50px;" aria-label="Button group with nested dropdown">
            <button type="button" onclick="descamount()" class="btn btn-outline-secondary btn-amount" style="width: 50px;">-</button>
            <input type="text"  name="quantity"  onchange="checkamount()" id="requiredamount" class="form-control text-center fs-5 fw-semibold" value="1" style="width: 75px;">
            <button type="button"  onclick="ascamount()" class="btn btn-outline-secondary btn-amount" style="width: 50px;">+</button>
          </div>
          <span id="amount-required" class="ms-4 fs-5 fw-medium text-secondary">Còn {{ $inventories[0]->quantity }} sản phẩm</span>
          <br>
          <button id="btn-buynow-detail" name="action" value="buynow" class="my-3 btn-buynow-detail btn btn-lg border-0 text-light fw-semibold bg-secondary">Mua ngay</button>
          <button  id="btn-addtocart-detail" name="action" value="addtocart" class="btn-addtocart-detail btn btn-outline-primary btn-lg text-secondary fw-semibold">Thêm vào giỏ hàng</button>
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
  </form>
  </section>
  {{-- <section class="py-5 bg-body">
    <div class="container">
      <div class="ms-5 section-tittle col-lg-5 col-12 text-center text-lg-start position-relative">
        <div class="d-none d-lg-block section-decoration"></div>
        SẢN PHẨM LIÊN QUAN
      </div>
      <div class="row ms-5 product-hot">
        <div class="col-lg-3 col-md-4 col-sm-6">
          <div class="card bg-body border-0">
            <div class="card-header p-0 bg-body border-0 position-relative">
              <img src="images/producthot1.webp" class="card-img-top rounded-3" alt="...">
              <button class="addtocart-product rounded-bottom-3 border-0 bg-addtocart hover:bg-primary">
                <i class="fa-solid fa-basket-shopping fs-5 text-light"></i>
                Thêm vào giỏ hàng
              </button>
            </div>
            <div class="card-body px-0">
              <a class="card-title product-tittle">Áo len nữ</a>
              <div class="card-text d-flex gap-2 align-items-center">
                <p class="price-product text-primary">100.000<span class="text-decoration-underline">đ</span></p>
                <p class="price-product-old text-decoration-line-through">120.000<span class="text-decoration-underline">đ</span></p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 d-sm-block d-none">
          <div class="card bg-body border-0">
            <div class="card-header p-0 bg-body border-0 position-relative">
              <img src="images/producthot2.webp" class="card-img-top rounded-3" alt="...">
              <button class="addtocart-product rounded-bottom-3 border-0 bg-addtocart hover:bg-primary">
                <i class="fa-solid fa-basket-shopping fs-5 text-light"></i>
                Thêm vào giỏ hàng
              </button>
            </div>
            <div class="card-body px-0">
              <a class="card-title product-tittle">Áo len nữ</a>
              <div class="card-text d-flex gap-2 align-items-center">
                <p class="price-product text-primary">100.000<span class="text-decoration-underline">đ</span></p>
                <p class="price-product-old text-decoration-line-through">120.000<span class="text-decoration-underline">đ</span></p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 d-md-block d-none">
          <div class="card bg-body border-0">
            <div class="card-header p-0 bg-body border-0 position-relative">
              <img src="images/producthot3.webp" class="card-img-top rounded-3" alt="...">
              <button class="addtocart-product rounded-bottom-3 border-0 bg-addtocart hover:bg-primary">
                <i class="fa-solid fa-basket-shopping fs-5 text-light"></i>
                Thêm vào giỏ hàng
              </button>
            </div>
            <div class="card-body px-0">
              <a class="card-title product-tittle">Áo len nữ</a>
              <div class="card-text d-flex gap-2 align-items-center">
                <p class="price-product text-primary">100.000<span class="text-decoration-underline">đ</span></p>
                <p class="price-product-old text-decoration-line-through">120.000<span class="text-decoration-underline">đ</span></p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 d-lg-block d-none">
          <div class="card bg-body border-0">
            <div class="card-header p-0 bg-body border-0 position-relative">
              <img src="images/producthot4.webp" class="card-img-top rounded-3" alt="...">
              <button class="addtocart-product rounded-bottom-3 border-0 bg-addtocart hover:bg-primary">
                <i class="fa-solid fa-basket-shopping fs-5 text-light"></i>
                Thêm vào giỏ hàng
              </button>
            </div>
            <div class="card-body px-0">
              <a class="card-title product-tittle">Áo len nữ</a>
              <div class="card-text d-flex gap-2 align-items-center">
                <p class="price-product text-primary">100.000<span class="text-decoration-underline">đ</span></p>
                <p class="price-product-old text-decoration-line-through">120.000<span class="text-decoration-underline">đ</span></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </section> --}}
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
@endsection