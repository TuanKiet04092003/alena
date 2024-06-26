@extends('layout')
@section('title', 'KShop | Thời trang')
@section('homepage')
<div class="current-page d-none d-lg-block"></div>
@endsection
@section('homeheader')
<div id="carouselExampleIndicators" class="carousel slide"   data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active"   data-bs-interval="2000">
        <img src="images/baner.webp" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item"  data-bs-interval="2000">
        <img src="images/banner2.png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item"  data-bs-interval="2000">
        <img src="images/banner3.jpg" class="d-block w-100" alt="...">
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
          <img src="images/freeshipping.webp" alt="...">
          <div class="card-body pb-0 px-0">
            <h5 class="card-title">MIỄN PHÍ GIAO HÀNG</h5>
            <p class="card-text">Miễn phí ship với các đơn hàng >499K</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 card bg-primary text-light border-0 py-4">
          <img src="images/checkout.webp" alt="...">
          <div class="card-body pb-0 px-0">
            <h5 class="card-title">THANH TOAN COD</h5>
            <p class="card-text">Thanh toán khi nhận hàng (COD)</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 card bg-primary text-light border-0 py-4">
          <img src="images/customervip.webp" alt="...">
          <div class="card-body pb-0 px-0">
            <h5 class="card-title">KHÁCH HÀNG VIP</h5>
            <p class="card-text">Ưu đãi giành cho khách hàng VIP</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 card bg-primary text-light border-0 py-4">
          <img src="images/guarantee.webp" alt="...">
          <div class="card-body pb-0 px-0">
            <h5 class="card-title">HỖ TRỢ BẢO HÀNH</h5>
            <p class="card-text">Đổi, sửa đồ tại tất cả store</p>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
@section('content')
<div id="myDataImagesAll" data-array='{{ $imagesAll }}'></div>
<div id="myDataInventories" data-array='{{ $inventories }}'></div>


<script>
    var imagesAll = JSON.parse(document.getElementById('myDataImagesAll').getAttribute('data-array'));
    var inventories = JSON.parse(document.getElementById('myDataInventories').getAttribute('data-array'));

</script>
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
              data-bs-toggle="tab" data-bs-target="#tab1" aria-controls="home-tab-pane" aria-selected="true">{{ $categoriesHome[0]->name }}</button>
            @for ($i = 1; $i < count($categoriesHome); $i++)
            <button class="me-1 btn  bg-body text-nowrap border-0" id="profile-tab" data-bs-toggle="tab"
            data-bs-target="#tab{{ $i+1 }}" type="button" role="tab" aria-controls="profile-tab-pane"
            aria-selected="false">{{  $categoriesHome[$i]->name  }}</button>
            @endfor
            
            
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
          @php
              $limit=0;
          @endphp
          @foreach ($category->getProductsNewOfCategory($categoriesHome[0]->id) as $item)
              
          <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="card bg-body border-0">
                <div class="card-header p-0 bg-body border-0 position-relative">
                    <form action="/addtocart" method="post">
                    <a href="/detail/{{ $item->id }}"><img id="imageBox" src="{{ asset($item->getMainImage()[0] -> image) }}" class="card-img-top rounded-3" alt="..."></a>
                   
                        <button class="addtocart-product rounded-bottom-3 border-0 bg-addtocart hover:bg-primary">
                        <i class="fa-solid fa-basket-shopping fs-5 text-light"></i>
                        Thêm vào giỏ hàng
                        </button>
                        <div class="box-size">
                            @foreach ($sizes as $size)
                                <button style="{{ $size->id==$sizes[0]->id?'background-color: #1C5B41; color: white':'' }}" onclick="changeSizeBox(this)" idProduct="{{ $item->id }}" idSize="{{ $size->id }}">{{ $size->code_size }}</button>
                            @endforeach
                        </div>
                        <div class="box-color">
                            <div>
                                <div onclick="changeColorBox(this)"  idProduct="{{ $item->id }}" idColor="{{ $item->getMainImage()[0] ->id_color }}" style="background-color: {{ $color->getColorById($item->getMainImage()[0] ->id_color)->code_color }}"></div>
                            </div>
                            @foreach ($item->getImagesColorNotMain() as $image)
                                <div style="border-color: white">
                                  <div onclick="changeColorBox(this)"  idProduct="{{ $item->id }}" idColor="{{ $image->id_color }}" style="background-color: {{ $color->getColorById($image ->id_color)->code_color }}"></div>
                                </div>
                            @endforeach
                            
                            
                        </div>
                        
                   
                    @php 
                        $inventory=$inventory->getInventoryOfMain($item->id, $item->getMainImage()[0]->id_color)
                    @endphp
                    
                        @csrf
                        <input type="hidden" name="idinventory"  id="inpIdInventoryBox" value="{{ $inventory->id }}">
                        <input type="hidden" name="price" value="{{ $item->price }}">
                        <input type="hidden" name="image" id="inpImageBox" value="{{ $item->getMainImage()[0]->image }}">
                        <input type="hidden" name="quantity" value="1">
                    </form>
                </div>
                <div class="card-body px-0">
                    <a class="card-title product-tittle" href="/detail/{{ $item->id }}">{{ $item->name }}</a>
                    <div class="card-text d-flex gap-2 align-items-center">
                        <p class="price-product text-primary">{{ number_format($item->price, 0, ',', '.') }}<span class="text-decoration-underline">đ</span>
                        </p>
                        @if ($item->priceold)
                        <p class="price-product-old text-decoration-line-through">{{ number_format($item->priceold, 0, ',', '.') }}<span
                            class="text-decoration-underline">đ</span></p>
                        @endif
                    </div>
                </div>
            </div>
          </div>

              @php
                $limit++;
              @endphp
              @if ($limit==4)
                  @break
              @endif
          @endforeach
          </div>
        </div>

        @for ($i = 1; $i < count($categoriesHome); $i++)
        <div class="tab-pane fade" id="tab{{ $i+1 }}" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
          <div class="row">
            @php
                $limit=0;
            @endphp
            @foreach ($category->getProductsNewOfCategory($categoriesHome[$i]->id) as $item)
                <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="card bg-light border-0">
                <div class="card-header p-0 bg-light border-0 position-relative">
                    <form action="/addtocart" method="post">
                    <a href="/detail/{{ $item->id }}"><img id="imageBox" src="{{ asset($item->getMainImage()[0] -> image) }}" class="card-img-top rounded-3" alt="..."></a>
                   
                        <button class="addtocart-product rounded-bottom-3 border-0 bg-addtocart hover:bg-primary">
                        <i class="fa-solid fa-basket-shopping fs-5 text-light"></i>
                        Thêm vào giỏ hàng
                        </button>
                        <div class="box-size">
                            @foreach ($sizes as $size)
                                <button style="{{ $size->id==$sizes[0]->id?'background-color: #1C5B41; color: white':'' }}" onclick="changeSizeBox(this)" idProduct="{{ $item->id }}" idSize="{{ $size->id }}">{{ $size->code_size }}</button>
                            @endforeach
                        </div>
                        <div class="box-color">
                            <div>
                                <div onclick="changeColorBox(this)"  idProduct="{{ $item->id }}" idColor="{{ $item->getMainImage()[0] ->id_color }}" style="background-color: {{ $color->getColorById($item->getMainImage()[0] ->id_color)->code_color }}"></div>
                            </div>
                            @foreach ($item->getImagesColorNotMain() as $image)
                                <div style="border-color: white">
                                  <div onclick="changeColorBox(this)"  idProduct="{{ $item->id }}" idColor="{{ $image->id_color }}" style="background-color: {{ $color->getColorById($image ->id_color)->code_color }}"></div>
                                </div>
                            @endforeach
                            
                            
                        </div>
                        
                   
                    @php 
                        $inventory=$inventory->getInventoryOfMain($item->id, $item->getMainImage()[0]->id_color)
                    @endphp
                    
                        @csrf
                        <input type="hidden" name="idinventory"  id="inpIdInventoryBox" value="{{ $inventory->id }}">
                        <input type="hidden" name="price" value="{{ $item->price }}">
                        <input type="hidden" name="image" id="inpImageBox" value="{{ $item->getMainImage()[0]->image }}">
                        <input type="hidden" name="quantity" value="1">
                    </form>
                </div>
                <div class="card-body px-0">
                    <a class="card-title product-tittle" href="/detail/{{ $item->id }}">{{ $item->name }}</a>
                    <div class="card-text d-flex gap-2 align-items-center">
                        <p class="price-product text-primary">{{ number_format($item->price, 0, ',', '.') }}<span class="text-decoration-underline">đ</span>
                        </p>
                        @if ($item->priceold)
                        <p class="price-product-old text-decoration-line-through">{{ number_format($item->priceold, 0, ',', '.') }}<span
                            class="text-decoration-underline">đ</span></p>
                        @endif
                    </div>
                </div>
            </div>
          </div>
                @php
                  $limit++;
                @endphp
                @if ($limit==4)
                    @break
                @endif
            @endforeach
            </div>
        </div>
        @endfor

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
                data-bs-toggle="tab" data-bs-target="#tab-sale1" aria-controls="home-tab-pane" aria-selected="true">{{ $categoriesHome[0]->name }}</button>
              @for ($i = 1; $i < count($categoriesHome); $i++)
              <button class="me-1 btn  bg-light text-nowrap border-0" id="profile-tab" data-bs-toggle="tab"
              data-bs-target="#tab-sale{{ $i+1 }}" type="button" role="tab" aria-controls="profile-tab-pane"
              aria-selected="false">{{  $categoriesHome[$i]->name  }}</button>
              @endfor
              
              
              {{-- <button class="me-1 btn  bg-body text-nowrap border-0" id="profile-tab" data-bs-toggle="tab"
                data-bs-target="#tab3" type="button" role="tab" aria-controls="profile-tab-pane"
                aria-selected="false">Thời trang Unisex</button> --}}
            </div>
            <div class="col-1"><i class="fa-solid fa-arrow-right"></i></div>
  
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 d-lg-block d-none">
          <img src="images/product_new.webp" height="95%" width="100%" alt="">
        </div>
        <div class="col-lg-6 col-sm-12">
         
            <div class="tab-content" id="myTabContent">

              <div class="tab-pane fade show active" id="tab-sale1" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                <div class="row">
                @php
                    $limit=0;
                @endphp
                @foreach ($category->getProductsSaleOfCategory($categoriesHome[0]->id) as $item)
                    
                <div class="col-lg-6 col-md-4 col-sm-6">
                  <div class="card bg-light border-0">
                      <div class="card-header p-0 bg-light border-0 position-relative">
                          <form action="/addtocart" method="post">
                          <a href="/detail/{{ $item->id }}"><img id="imageBox" src="{{ asset($item->getMainImage()[0] -> image) }}" class="card-img-top rounded-3" alt="..."></a>
                         
                              <button class="addtocart-product rounded-bottom-3 border-0 bg-addtocart hover:bg-primary">
                              <i class="fa-solid fa-basket-shopping fs-5 text-light"></i>
                              Thêm vào giỏ hàng
                              </button>
                              <div class="box-size">
                                  @foreach ($sizes as $size)
                                      <button style="{{ $size->id==$sizes[0]->id?'background-color: #1C5B41; color: white':'' }}" onclick="changeSizeBox(this)" idProduct="{{ $item->id }}" idSize="{{ $size->id }}">{{ $size->code_size }}</button>
                                  @endforeach
                              </div>
                              <div class="box-color">
                                  <div>
                                      <div onclick="changeColorBox(this)"  idProduct="{{ $item->id }}" idColor="{{ $item->getMainImage()[0] ->id_color }}" style="background-color: {{ $color->getColorById($item->getMainImage()[0] ->id_color)->code_color }}"></div>
                                  </div>
                                  @foreach ($item->getImagesColorNotMain() as $image)
                                      <div style="border-color: white">
                                        <div onclick="changeColorBox(this)"  idProduct="{{ $item->id }}" idColor="{{ $image->id_color }}" style="background-color: {{ $color->getColorById($image ->id_color)->code_color }}"></div>
                                      </div>
                                  @endforeach
                                  
                                  
                              </div>
                              
                         
                          @php 
                              $inventory=$inventory->getInventoryOfMain($item->id, $item->getMainImage()[0]->id_color)
                          @endphp
                          
                              @csrf
                              <input type="hidden" name="idinventory"  id="inpIdInventoryBox" value="{{ $inventory->id }}">
                              <input type="hidden" name="price" value="{{ $item->price }}">
                              <input type="hidden" name="image" id="inpImageBox" value="{{ $item->getMainImage()[0]->image }}">
                              <input type="hidden" name="quantity" value="1">
                          </form>
                      </div>
                      <div class="card-body px-0">
                          <a class="card-title product-tittle" href="/detail/{{ $item->id }}">{{ $item->name }}</a>
                          <div class="card-text d-flex gap-2 align-items-center">
                              <p class="price-product text-primary">{{ number_format($item->price, 0, ',', '.') }}<span class="text-decoration-underline">đ</span>
                              </p>
                              @if ($item->priceold)
                              <p class="price-product-old text-decoration-line-through">{{ number_format($item->priceold, 0, ',', '.') }}<span
                                  class="text-decoration-underline">đ</span></p>
                              @endif
                          </div>
                      </div>
                  </div>
                </div>
                    @php
                      $limit++;
                    @endphp
                    @if ($limit==4)
                        @break
                    @endif
                @endforeach
                </div>
              </div>
      
              @for ($i = 1; $i < count($categoriesHome); $i++)
              <div class="tab-pane fade" id="tab-sale{{ $i+1 }}" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                <div class="row">
                  @php
                      $limit=0;
                  @endphp
                  @foreach ($category->getProductsSaleOfCategory($categoriesHome[$i]->id) as $item)
                  <div class="col-lg-6 col-md-4 col-sm-6">
                    <div class="card bg-light border-0">
                        <div class="card-header p-0 bg-light border-0 position-relative">
                            <form action="/addtocart" method="post">
                            <a href="/detail/{{ $item->id }}"><img id="imageBox" src="{{ asset($item->getMainImage()[0] -> image) }}" class="card-img-top rounded-3" alt="..."></a>
                           
                                <button class="addtocart-product rounded-bottom-3 border-0 bg-addtocart hover:bg-primary">
                                <i class="fa-solid fa-basket-shopping fs-5 text-light"></i>
                                Thêm vào giỏ hàng
                                </button>
                                <div class="box-size">
                                    @foreach ($sizes as $size)
                                        <button style="{{ $size->id==$sizes[0]->id?'background-color: #1C5B41; color: white':'' }}" onclick="changeSizeBox(this)" idProduct="{{ $item->id }}" idSize="{{ $size->id }}">{{ $size->code_size }}</button>
                                    @endforeach
                                </div>
                                <div class="box-color">
                                    <div>
                                        <div onclick="changeColorBox(this)"  idProduct="{{ $item->id }}" idColor="{{ $item->getMainImage()[0] ->id_color }}" style="background-color: {{ $color->getColorById($item->getMainImage()[0] ->id_color)->code_color }}"></div>
                                    </div>
                                    @foreach ($item->getImagesColorNotMain() as $image)
                                        <div style="border-color: white">
                                          <div onclick="changeColorBox(this)"  idProduct="{{ $item->id }}" idColor="{{ $image->id_color }}" style="background-color: {{ $color->getColorById($image ->id_color)->code_color }}"></div>
                                        </div>
                                    @endforeach
                                    
                                    
                                </div>
                                
                           
                            @php 
                                $inventory=$inventory->getInventoryOfMain($item->id, $item->getMainImage()[0]->id_color)
                            @endphp
                            
                                @csrf
                                <input type="hidden" name="idinventory"  id="inpIdInventoryBox" value="{{ $inventory->id }}">
                                <input type="hidden" name="price" value="{{ $item->price }}">
                                <input type="hidden" name="image" id="inpImageBox" value="{{ $item->getMainImage()[0]->image }}">
                                <input type="hidden" name="quantity" value="1">
                            </form>
                        </div>
                        <div class="card-body px-0">
                            <a class="card-title product-tittle" href="/detail/{{ $item->id }}">{{ $item->name }}</a>
                            <div class="card-text d-flex gap-2 align-items-center">
                                <p class="price-product text-primary">{{ number_format($item->price, 0, ',', '.') }}<span class="text-decoration-underline">đ</span>
                                </p>
                                @if ($item->priceold)
                                <p class="price-product-old text-decoration-line-through">{{ number_format($item->priceold, 0, ',', '.') }}<span
                                    class="text-decoration-underline">đ</span></p>
                                @endif
                            </div>
                        </div>
                    </div>
                  </div>
                      @php
                        $limit++;
                      @endphp
                      @if ($limit==4)
                          @break
                      @endif
                  @endforeach
                  </div>
              </div>
              @endfor
      
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
          SẢN PHẨM NHIỀU LƯỢT XEM
        </div>
      </div>
      <img src="images/baner-same-price.webp" height="95%" width="100%" class="mb-4" alt="">
      <div class="row">
        @php
            $limit=0;
        @endphp
        @foreach ($category->getProductsViewOfCategory(0) as $item)
        <div class="col-lg-3 col-md-4 col-sm-6">
          <div class="card bg-secondary border-0">
              <div class="card-header p-0 bg-secondary border-0 position-relative">
                  <form action="/addtocart" method="post">
                  <a href="/detail/{{ $item->id }}"><img id="imageBox" src="{{ asset($item->getMainImage()[0] -> image) }}" class="card-img-top rounded-3" alt="..."></a>
                 
                      <button class="addtocart-product rounded-bottom-3 border-0 bg-addtocart hover:bg-primary">
                      <i class="fa-solid fa-basket-shopping fs-5 text-light"></i>
                      Thêm vào giỏ hàng
                      </button>
                      <div class="box-size">
                          @foreach ($sizes as $size)
                              <button style="{{ $size->id==$sizes[0]->id?'background-color: #1C5B41; color: white':'' }}" onclick="changeSizeBox(this)" idProduct="{{ $item->id }}" idSize="{{ $size->id }}">{{ $size->code_size }}</button>
                          @endforeach
                      </div>
                      <div class="box-color">
                          <div>
                              <div onclick="changeColorBox(this)"  idProduct="{{ $item->id }}" idColor="{{ $item->getMainImage()[0] ->id_color }}" style="background-color: {{ $color->getColorById($item->getMainImage()[0] ->id_color)->code_color }}"></div>
                          </div>
                          @foreach ($item->getImagesColorNotMain() as $image)
                              <div style="border-color: white">
                                <div onclick="changeColorBox(this)"  idProduct="{{ $item->id }}" idColor="{{ $image->id_color }}" style="background-color: {{ $color->getColorById($image ->id_color)->code_color }}"></div>
                              </div>
                          @endforeach
                          
                          
                      </div>
                      
                 
                  @php 
                      $inventory=$inventory->getInventoryOfMain($item->id, $item->getMainImage()[0]->id_color)
                  @endphp
                  
                      @csrf
                      <input type="hidden" name="idinventory"  id="inpIdInventoryBox" value="{{ $inventory->id }}">
                      <input type="hidden" name="price" value="{{ $item->price }}">
                      <input type="hidden" name="image" id="inpImageBox" value="{{ $item->getMainImage()[0]->image }}">
                      <input type="hidden" name="quantity" value="1">
                  </form>
              </div>
              <div class="card-body px-0">
                  <a class="card-title product-tittle text-light" href="/detail/{{ $item->id }}">{{ $item->name }}</a>
                  <div class="card-text d-flex gap-2 align-items-center">
                      <p class="price-product text-primary">{{ number_format($item->price, 0, ',', '.') }}<span class="text-decoration-underline">đ</span>
                      </p>
                      @if ($item->priceold)
                      <p class="price-product-old text-decoration-line-through  text-light">{{ number_format($item->priceold, 0, ',', '.') }}<span
                          class="text-decoration-underline">đ</span></p>
                      @endif
                  </div>
              </div>
          </div>
        </div>
        @php
          $limit++;
        @endphp
        @if ($limit==4)
            @break
        @endif
        @endforeach
        
      </div>
      <div class="row ms-1 w-100">
        <button class="read-more btn btn-lg bg-primary text-light mx-auto" id="seeall">Xem tất cả</button>
      </div>
    </div>
  </section>
  <section class="product-hot bg-light">
    <div class="container"  id="myTabBestseller" role="tablist">
      <div class="row">
        <div class="section-tittle col-lg-5 col-12 text-center text-lg-start position-relative">
          <div class="d-none d-lg-block section-decoration"></div>
          SẢN PHẨM BÁN CHẠY
        </div>
        <div class="col-lg-7 col-12">
          <div class="row my-4 d-flex  align-items-center">
            <div class="col-1"><i class="fa-solid fa-arrow-left"></i></div>
            <div class="col-10 catalog-btn-light d-flex justify-content-evenly">
              <button class="me-1 btn bg-primary text-light text-nowrap border-0 active" id="home-tab"
                data-bs-toggle="tab" data-bs-target="#tab-bestseller1" aria-controls="home-tab-pane" aria-selected="true">{{ $categoriesHome[0]->name }}</button>
              @for ($i = 1; $i < count($categoriesHome); $i++)
              <button class="me-1 btn  bg-light text-nowrap border-0" id="profile-tab" data-bs-toggle="tab"
              data-bs-target="#tab-bestseller{{ $i+1 }}" type="button" role="tab" aria-controls="profile-tab-pane"
              aria-selected="false">{{  $categoriesHome[$i]->name  }}</button>
              @endfor
              
              
              {{-- <button class="me-1 btn  bg-body text-nowrap border-0" id="profile-tab" data-bs-toggle="tab"
                data-bs-target="#tab3" type="button" role="tab" aria-controls="profile-tab-pane"
                aria-selected="false">Thời trang Unisex</button> --}}
            </div>
            <div class="col-1"><i class="fa-solid fa-arrow-right"></i></div>
  
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 d-lg-block d-none">
          <img src="images/baner-nice-price.webp" height="95%" width="100%" alt="">
        </div>
        <div class="col-lg-6 col-sm-12">
         
            <div class="tab-content" id="myTabContent">

              <div class="tab-pane fade show active" id="tab-bestseller1" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                <div class="row">
                @php
                    $limit=0;
                @endphp
                @foreach ($category->getProductsBestsellerOfCategory($categoriesHome[0]->id) as $item)
                    
                <div class="col-lg-6 col-md-4 col-sm-6">
                  <div class="card bg-light border-0">
                      <div class="card-header p-0 bg-light border-0 position-relative">
                          <form action="/addtocart" method="post">
                          <a href="/detail/{{ $item->id }}"><img id="imageBox" src="{{ asset($item->getMainImage()[0] -> image) }}" class="card-img-top rounded-3" alt="..."></a>
                         
                              <button class="addtocart-product rounded-bottom-3 border-0 bg-addtocart hover:bg-primary">
                              <i class="fa-solid fa-basket-shopping fs-5 text-light"></i>
                              Thêm vào giỏ hàng
                              </button>
                              <div class="box-size">
                                  @foreach ($sizes as $size)
                                      <button style="{{ $size->id==$sizes[0]->id?'background-color: #1C5B41; color: white':'' }}" onclick="changeSizeBox(this)" idProduct="{{ $item->id }}" idSize="{{ $size->id }}">{{ $size->code_size }}</button>
                                  @endforeach
                              </div>
                              <div class="box-color">
                                  <div>
                                      <div onclick="changeColorBox(this)"  idProduct="{{ $item->id }}" idColor="{{ $item->getMainImage()[0] ->id_color }}" style="background-color: {{ $color->getColorById($item->getMainImage()[0] ->id_color)->code_color }}"></div>
                                  </div>
                                  @foreach ($item->getImagesColorNotMain() as $image)
                                      <div style="border-color: white">
                                        <div onclick="changeColorBox(this)"  idProduct="{{ $item->id }}" idColor="{{ $image->id_color }}" style="background-color: {{ $color->getColorById($image ->id_color)->code_color }}"></div>
                                      </div>
                                  @endforeach
                                  
                                  
                              </div>
                              
                         
                          @php 
                              $inventory=$inventory->getInventoryOfMain($item->id, $item->getMainImage()[0]->id_color)
                          @endphp
                          
                              @csrf
                              <input type="hidden" name="idinventory"  id="inpIdInventoryBox" value="{{ $inventory->id }}">
                              <input type="hidden" name="price" value="{{ $item->price }}">
                              <input type="hidden" name="image" id="inpImageBox" value="{{ $item->getMainImage()[0]->image }}">
                              <input type="hidden" name="quantity" value="1">
                          </form>
                      </div>
                      <div class="card-body px-0">
                          <a class="card-title product-tittle" href="/detail/{{ $item->id }}">{{ $item->name }}</a>
                          <div class="card-text d-flex gap-2 align-items-center">
                              <p class="price-product text-primary">{{ number_format($item->price, 0, ',', '.') }}<span class="text-decoration-underline">đ</span>
                              </p>
                              @if ($item->priceold)
                              <p class="price-product-old text-decoration-line-through">{{ number_format($item->priceold, 0, ',', '.') }}<span
                                  class="text-decoration-underline">đ</span></p>
                              @endif
                          </div>
                      </div>
                  </div>
                </div>
                    @php
                      $limit++;
                    @endphp
                    @if ($limit==4)
                        @break
                    @endif
                @endforeach
                </div>
              </div>
      
              @for ($i = 1; $i < count($categoriesHome); $i++)
              <div class="tab-pane fade" id="tab-bestseller{{ $i+1 }}" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                <div class="row">
                  @php
                      $limit=0;
                  @endphp
                  @foreach ($category->getProductsBestsellerOfCategory($categoriesHome[$i]->id) as $item)
                  <div class="col-lg-6 col-md-4 col-sm-6">
                    <div class="card bg-light border-0">
                        <div class="card-header p-0 bg-light border-0 position-relative">
                            <form action="/addtocart" method="post">
                            <a href="/detail/{{ $item->id }}"><img id="imageBox" src="{{ asset($item->getMainImage()[0] -> image) }}" class="card-img-top rounded-3" alt="..."></a>
                           
                                <button class="addtocart-product rounded-bottom-3 border-0 bg-addtocart hover:bg-primary">
                                <i class="fa-solid fa-basket-shopping fs-5 text-light"></i>
                                Thêm vào giỏ hàng
                                </button>
                                <div class="box-size">
                                    @foreach ($sizes as $size)
                                        <button style="{{ $size->id==$sizes[0]->id?'background-color: #1C5B41; color: white':'' }}" onclick="changeSizeBox(this)" idProduct="{{ $item->id }}" idSize="{{ $size->id }}">{{ $size->code_size }}</button>
                                    @endforeach
                                </div>
                                <div class="box-color">
                                    <div>
                                        <div onclick="changeColorBox(this)"  idProduct="{{ $item->id }}" idColor="{{ $item->getMainImage()[0] ->id_color }}" style="background-color: {{ $color->getColorById($item->getMainImage()[0] ->id_color)->code_color }}"></div>
                                    </div>
                                    @foreach ($item->getImagesColorNotMain() as $image)
                                        <div style="border-color: white">
                                          <div onclick="changeColorBox(this)"  idProduct="{{ $item->id }}" idColor="{{ $image->id_color }}" style="background-color: {{ $color->getColorById($image ->id_color)->code_color }}"></div>
                                        </div>
                                    @endforeach
                                    
                                    
                                </div>
                                
                           
                            @php 
                                $inventory=$inventory->getInventoryOfMain($item->id, $item->getMainImage()[0]->id_color)
                            @endphp
                            
                                @csrf
                                <input type="hidden" name="idinventory"  id="inpIdInventoryBox" value="{{ $inventory->id }}">
                                <input type="hidden" name="price" value="{{ $item->price }}">
                                <input type="hidden" name="image" id="inpImageBox" value="{{ $item->getMainImage()[0]->image }}">
                                <input type="hidden" name="quantity" value="1">
                            </form>
                        </div>
                        <div class="card-body px-0">
                            <a class="card-title product-tittle" href="/detail/{{ $item->id }}">{{ $item->name }}</a>
                            <div class="card-text d-flex gap-2 align-items-center">
                                <p class="price-product text-primary">{{ number_format($item->price, 0, ',', '.') }}<span class="text-decoration-underline">đ</span>
                                </p>
                                @if ($item->priceold)
                                <p class="price-product-old text-decoration-line-through">{{ number_format($item->priceold, 0, ',', '.') }}<span
                                    class="text-decoration-underline">đ</span></p>
                                @endif
                            </div>
                        </div>
                    </div>
                  </div>
                      @php
                        $limit++;
                      @endphp
                      @if ($limit==4)
                          @break
                      @endif
                  @endforeach
                  </div>
              </div>
              @endfor
      
              <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">3</div>
            </div>
          
        </div>
      </div>
    </div>
  </section>
  <section class="product-hot bg-body pb-2">
    <div class="container">
      <div class="row">
        <div class="section-tittle col-lg-12 col-12 text-center text-lg-start position-relative">
          <div class="d-none d-lg-block section-decoration"></div>
          TIN TỨC THỜI TRANG
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 col-md-12">
          <div class="card bg-body border-0 mx-4 mb-4">
            <div class="row">
              <div class="col-lg-12 col-md-5 card-header p-0 bg-body border-0 position-relative">
                <a href="newsdetail.html">
                  <img src="images/newsnoibat1.webp" class="card-img-top rounded-3" alt="...">
                </a>
              </div>
              <div class="col-lg-12 col-md-7 pt-0 pt-lg-3 card-body ps-4 px-lg-0">
                <a href="newsdetail.html">
                  <h5 class="card-title product-tittle newslink">Cách phối đồ hè nam</h5>
                </a>
                <div class="card-text" id="news-card-text">
                  <p>
                    <i class="fa-regular fa-user"></i>
                    Cafein Team |
                    <i class="fa-regular fa-clock"></i>
                    Ngày 27/05/2022
                  </p>
                  <p class="mb-2">1.Sơ mi hoạ tiết + quần denim + giày sneaker Hãy tranh thủ những
                    ngày hè để</p>
                  <a href="" class="fw-bold text-dark newslink">Xem thêm<i
                      class="fa-solid fa-arrow-right-long text-primary ms-2"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-12">
          <div class="card bg-body border-0 mx-4 mb-4">
            <div class="row">
              <div class="col-lg-12 col-md-5 card-header p-0 bg-body border-0 position-relative">
                <a href="newsdetail.html">
                  <img src="images/newsnoibat2.webp" class="card-img-top rounded-3" alt="...">
                </a>
              </div>
              <div class="col-lg-12 col-md-7 pt-0 pt-lg-3 card-body ps-4 px-lg-0">
                <a href="newsdetail.html">
                  <h5 class="card-title product-tittle newslink">Cách phối đồ hè nam</h5>
                </a>
                <div class="card-text" id="news-card-text">
                  <p>
                    <i class="fa-regular fa-user"></i>
                    Cafein Team |
                    <i class="fa-regular fa-clock"></i>
                    Ngày 27/05/2022
                  </p>
                  <p class="mb-2">1.Sơ mi hoạ tiết + quần denim + giày sneaker Hãy tranh thủ những
                    ngày hè để</p>
                  <a href="" class="fw-bold text-dark newslink">Xem thêm<i
                      class="fa-solid fa-arrow-right-long text-primary ms-2"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-12">
          <div class="card bg-body border-0 mx-4 mb-4">
            <div class="row">
              <div class="col-lg-12 col-md-5 card-header p-0 bg-body border-0 position-relative">
                <a href="newsdetail.html">
                  <img src="images/newsnoibat3.webp" class="card-img-top rounded-3" alt="...">
                </a>
              </div>
              <div class="col-lg-12 col-md-7 pt-0 pt-lg-3 card-body ps-4 px-lg-0">
                <a href="newsdetail.html">
                  <h5 class="card-title product-tittle newslink">Cách phối đồ hè nam</h5>
                </a>
                <div class="card-text" id="news-card-text">
                  <p>
                    <i class="fa-regular fa-user"></i>
                    Cafein Team |
                    <i class="fa-regular fa-clock"></i>
                    Ngày 27/05/2022
                  </p>
                  <p class="mb-2">1.Sơ mi hoạ tiết + quần denim + giày sneaker Hãy tranh thủ những
                    ngày hè để</p>
                  <a href="" class="fw-bold text-dark newslink">Xem thêm<i
                      class="fa-solid fa-arrow-right-long text-primary ms-2"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section>
    <div class="container">
      <div class="row align-items-center my-3">
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 d-flex  justify-content-center">
          <a href=""><img src="images/brand1.webp" alt=""></a>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 d-flex justify-content-center">
          <a href=""><img src="images/brand2.webp" alt=""></a>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 d-md-flex d-none justify-content-center">
          <a href=""><img src="images/brand3.webp" alt=""></a>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 d-lg-flex d-none justify-content-center">
          <a href=""><img src="images/brand4.webp" alt=""></a>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 d-xl-flex d-none justify-content-center">
          <a href=""><img src="images/brand5.webp" alt=""></a>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 d-xl-flex d-none justify-content-center">
          <a href=""><img src="images/brand6.webp" alt=""></a>
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
@endsection