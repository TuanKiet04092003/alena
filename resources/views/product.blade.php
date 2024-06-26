@extends('layout')
@section('title', 'KShop | Sản phẩm')
@section('page', 'product')
@section('productpage')
<div class="current-page d-none d-lg-block"></div>
@endsection
@section('homeheader')
@section('content')
<div id="myDataProducts" data-array='{{ $products }}'></div>
<div id="myDataImages" data-array='{{ $images }}'></div>
<div id="myDataImagesAll" data-array='{{ $imagesAll }}'></div>
<div id="myDataLimitPage" data-array='{{ $limitPage }}'></div>
<div id="myDataInventories" data-array='{{ $inventories }}'></div>

<div id="myDataSizes" data-array='{{ $sizes }}'></div>

<div id="myDataColors" data-array='{{ $colors }}'></div>

<script>
   var products = JSON.parse(document.getElementById('myDataProducts').getAttribute('data-array'));
    console.log(products); // ['apple', 'banana', 'orange']
    var images = JSON.parse(document.getElementById('myDataImages').getAttribute('data-array'));
    console.log(images); // ['apple', 'banana', 'orange']
    var imagesAll = JSON.parse(document.getElementById('myDataImagesAll').getAttribute('data-array'));
    console.log(imagesAll); // ['apple', 'banana', 'orange']
    var limitPage = JSON.parse(document.getElementById('myDataLimitPage').getAttribute('data-array'));
    console.log(limitPage); // ['apple', 'banana', 'orange']
    var inventories = JSON.parse(document.getElementById('myDataInventories').getAttribute('data-array'));
    var sizes = JSON.parse(document.getElementById('myDataSizes').getAttribute('data-array'));
    var colors = JSON.parse(document.getElementById('myDataColors').getAttribute('data-array'));

</script>
<div class="container">
    <div class="row mt-5">
        <div class="col-lg-3">
            <div class="d-lg-block d-none fs-6">
                <p class="fw-semibold">Danh mục sản phẩm</p>
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <a class="text-16 fw-normal ps-4" href="/product">Tất cả sản phẩm</a>
                    @for ($i = 0; $i < count($categoriesParent); $i++)
                        
                        @if ($i==0)
                        <div class="accordion-item mt-3">
                            <h2 class="accordion-header">
                                <div class="ps-4 d-flex justify-content-between align-items-center">
                                    <a class="text-16 fw-normal" href="/product/1">{{ $categoriesParent[$i]->name }}</a>
                                <button  class="accordion-button collapsed bg-light shadow-none w-25" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapse{{ $categoriesParent[$i]->id }}" aria-expanded="false"
                                    aria-controls="flush-collapseOne">
                                    
                                </button>
                                </div>
                            </h2>
                            @php
                                $categoriesChildren=$categoriesParent[$i]->getCategoriesChildrenOf($categoriesParent[$i]->id);
                            @endphp
                            <div id="flush-collapse{{ $categoriesParent[$i]->id }}" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body py-0">
                                    <ul>
                                        @for ($j = 0; $j < count($categoriesChildren); $j++)
                                            <li class="my-2"><a href="/product/{{ $categoriesChildren[$j]->id }}">{{ $categoriesChildren[$j]->name }}</a></li>
                                        @endfor
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <div class="ps-4 d-flex justify-content-between align-items-center">
                                    <a class="text-16 fw-normal" href="/product/{{ $categoriesParent[$i]->id }}">{{ $categoriesParent[$i]->name }}</a>
                                <button  class="accordion-button collapsed bg-light shadow-none w-25" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapse{{ $categoriesParent[$i]->id }}" aria-expanded="false"
                                    aria-controls="flush-collapseOne">
                                    
                                </button>
                                </div>
                            </h2>
                            @php
                                $categoriesChildren=$categoriesParent[$i]->getCategoriesChildrenOf($categoriesParent[$i]->id);
                            @endphp
                            <div id="flush-collapse{{ $categoriesParent[$i]->id }}" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body py-0">
                                    <ul>
                                        @for ($j = 0; $j < count($categoriesChildren); $j++)
                                            <li class="my-2"><a href="/product/{{ $categoriesChildren[$j]->id }}">{{ $categoriesChildren[$j]->name }}</a></li>
                                        @endfor
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif
                    
                    @endfor
                </div>
                <p class="fw-semibold">Màu sắc</p>
                @foreach ($colors as $item)
                <div href="" class="d-flex align-items-center mb-2 ms-2">
                    <input type="checkbox" class="form-check-input me-3 mb-1" id="color{{ $item->id }}" value='{{ $item->id }}' onchange="filterProducts(this)">
                    <label for="color{{ $item->id }}" class="d-flex align-items-center"><span class="filtercolor rounded-5 d-inline-block m-0 me-1" style="background-color: {{ $item->code_color }};"></span> <span>{{ $item->color }}</span></label>
                </div>
                @endforeach
                
                
                <p class="fw-semibold">Mức giá</p>
                <div class="mb-1 form-check">
                    <input type="checkbox" class="form-check-input" id="low1m" value="price_1" onchange="filterProducts(this)">
                    <label class="form-check-label" for="low1m">Giá dưới 100.000<span
                            class="text-decoration-underline">đ</span></label>
                </div>
                <div class="mb-1 form-check">
                    <input type="checkbox" class="form-check-input" id="from1m_2m" value="price_2" onchange="filterProducts(this)">
                    <label class="form-check-label" for="from1m_2m">100.000<span
                            class="text-decoration-underline">đ</span> - 200.000<span
                            class="text-decoration-underline">đ</span></label>
                </div>
                <div class="mb-1 form-check">
                    <input type="checkbox" class="form-check-input" id="from2m_3m" value="price_3" onchange="filterProducts(this)">
                    <label class="form-check-label" for="from2m_3m">200.000<span
                            class="text-decoration-underline">đ</span> - 300.000<span
                            class="text-decoration-underline">đ</span></label>
                </div>
                <div class="mb-1 form-check">
                    <input type="checkbox" class="form-check-input" id="from3m_4m" value="price_4" onchange="filterProducts(this)">
                    <label class="form-check-label" for="from3m_4m">300.000<span
                            class="text-decoration-underline">đ</span> - 400.000<span
                            class="text-decoration-underline">đ</span></label>
                </div>
                <div class="mb-1 form-check">
                    <input type="checkbox" class="form-check-input" id="from4m_5m" value="price_5" onchange="filterProducts(this)">
                    <label class="form-check-label" for="from4m_5m">400.000<span
                            class="text-decoration-underline">đ</span> - 500.000<span
                            class="text-decoration-underline">đ</span></label>
                </div>
                <div class="mb-1 form-check">
                    <input type="checkbox" class="form-check-input" id="up5m" value="price_6" onchange="filterProducts(this)">
                    <label class="form-check-label" for="up5m">Giá trên 500.000<span
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
                <p class="mb-0 pb-0 fs-5 fw-semibold d-none d-lg-block">{{ $categoryName }}</p>
                <div class="row ps-1 ms-auto" style="width: 280px;">
                    <label class="col-4 col-form-label">Sắp xếp: </label>
                    <div class="col-7 p-0">
                        <select class="col-5 form-select" onchange="sortProducts(this)" aria-label="Default select example">
                            <option value="" selected>Mặc định</option>
                            <option value="name_asc">Tên A-Z</option>
                            <option value="name_desc">Tên Z-A</option>
                            <option value="price_asc">Giá tăng dần</option>
                            <option value="price_desc">Giá giảm dần</option>
                            <option value="new">Hàng mới</option>
                            <option value="bestseller">Hàng bán chạy</option>
                            <option value="view">Hàng xem nhiều</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row product-hot py-3" id='productsShow'>
                @if (count($products)>$limitPage)
                    @for ($i = 0; $i < $limitPage; $i++)
                    <div class="col-md-4 col-sm-6">
                        <div class="card bg-light border-0">
                            <div class="card-header p-0 bg-light border-0 position-relative">
                                <form action="/addtocart" method="post">
                                <a href="/detail/{{ $products[$i]->id }}"><img id="imageBox" src="{{ asset($images[$i]->image) }}" class="card-img-top rounded-3" alt="..."></a>
                               
                                    <button class="addtocart-product rounded-bottom-3 border-0 bg-addtocart hover:bg-primary">
                                    <i class="fa-solid fa-basket-shopping fs-5 text-light"></i>
                                    Thêm vào giỏ hàng
                                    </button>
                                    <div class="box-size">
                                        @foreach ($sizes as $item)
                                            <button style="{{ $item->id==$sizes[0]->id?'background-color: #1C5B41; color: white':'' }}" onclick="changeSizeBox(this)" idProduct="{{ $products[$i]->id }}" idSize="{{ $item->id }}">{{ $item->code_size }}</button>
                                        @endforeach
                                    </div>
                                    <div class="box-color">
                                        <div>
                                            <div onclick="changeColorBox(this)"  idProduct="{{ $products[$i]->id }}" idColor="{{ $images[$i]->id_color }}" style="background-color: {{ $color->getColorById($images[$i]->id_color)->code_color }}"></div>
                                        </div>
                                        @foreach ($products[$i]->getImagesColorNotMain() as $item)
                                            <div style="border-color: white">
                                                <div   onclick="changeColorBox(this)"  idProduct="{{ $products[$i]->id }}" idColor="{{ $item->id_color }}" style="background-color: {{ $color->getColorById($item->id_color)->code_color }}"></div>
                                            </div>
                                        @endforeach
                                        
                                        
                                    </div>
                                    
                               
                                @php 
                                    $inventory=$inventory->getInventoryOfMain($products[$i]->id, $images[$i]->id_color)
                                @endphp
                                
                                    @csrf
                                    <input type="hidden" name="idinventory"  id="inpIdInventoryBox" value="{{ $inventory->id }}">
                                    <input type="hidden" name="price" value="{{ $products[$i]->price }}">
                                    <input type="hidden" name="image" id="inpImageBox" value="{{ $images[$i]->image }}">
                                    <input type="hidden" name="quantity" value="1">
                                </form>
                            </div>
                            <div class="card-body px-0">
                                <a class="card-title product-tittle" href="/detail/{{ $products[$i]->id }}">{{ $products[$i]->name }}</a>
                                <div class="card-text d-flex gap-2 align-items-center">
                                    <p class="price-product text-primary">{{ number_format($products[$i]->price, 0, ',', '.') }}<span class="text-decoration-underline">đ</span>
                                    </p>
                                    @if ($products[$i]->priceold)
                                    <p class="price-product-old text-decoration-line-through">{{ number_format($products[$i]->priceold, 0, ',', '.') }}<span
                                        class="text-decoration-underline">đ</span></p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endfor
                @else
                    @for ($i = 0; $i < count($products); $i++)
                    <div class="col-md-4 col-sm-6">
                        <div class="card bg-light border-0">
                            <div class="card-header p-0 bg-light border-0 position-relative">
                                <form action="/addtocart" method="post">
                                <a href="/detail/{{ $products[$i]->id }}"><img id="imageBox" src="{{ asset($images[$i]->image) }}" class="card-img-top rounded-3" alt="..."></a>
                               
                                    <button class="addtocart-product rounded-bottom-3 border-0 bg-addtocart hover:bg-primary">
                                    <i class="fa-solid fa-basket-shopping fs-5 text-light"></i>
                                    Thêm vào giỏ hàng
                                    </button>
                                    <div class="box-size">
                                        @foreach ($sizes as $item)
                                            <button style="{{ $item->id==$sizes[0]->id?'background-color: #1C5B41; color: white':'' }}" onclick="changeSizeBox(this)" idProduct="{{ $products[$i]->id }}" idSize="{{ $item->id }}">{{ $item->code_size }}</button>
                                        @endforeach
                                    </div>
                                    <div class="box-color">
                                        <div>
                                            <div onclick="changeColorBox(this)"  idProduct="{{ $products[$i]->id }}" idColor="{{ $images[$i]->id_color }}" style="background-color: {{ $color->getColorById($images[$i]->id_color)->code_color }}"></div>
                                        </div>
                                        @foreach ($products[$i]->getImagesColorNotMain() as $item)
                                            <div style="border-color: white">
                                                <div   onclick="changeColorBox(this)"  idProduct="{{ $products[$i]->id }}" idColor="{{ $item->id_color }}" style="background-color: {{ $color->getColorById($item->id_color)->code_color }}"></div>
                                            </div>
                                        @endforeach
                                        
                                        
                                    </div>
                                    
                               
                                @php 
                                    $inventory=$inventory->getInventoryOfMain($products[$i]->id, $images[$i]->id_color)
                                @endphp
                                
                                    @csrf
                                    <input type="hidden" name="idinventory"  id="inpIdInventoryBox" value="{{ $inventory->id }}">
                                    <input type="hidden" name="price" value="{{ $products[$i]->price }}">
                                    <input type="hidden" name="image" id="inpImageBox" value="{{ $images[$i]->image }}">
                                    <input type="hidden" name="quantity" value="1">
                                </form>
                            </div>
                            <div class="card-body px-0">
                                <a class="card-title product-tittle" href="/detail/{{ $products[$i]->id }}">{{ $products[$i]->name }}</a>
                                <div class="card-text d-flex gap-2 align-items-center">
                                    <p class="price-product text-primary">{{ number_format($products[$i]->price, 0, ',', '.') }}<span class="text-decoration-underline">đ</span>
                                    </p>
                                    @if ($products[$i]->priceold)
                                    <p class="price-product-old text-decoration-line-through">{{ number_format($products[$i]->priceold, 0, ',', '.') }}<span
                                        class="text-decoration-underline">đ</span></p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endfor
                @endif
                
            </div>
           
                
           
            <nav aria-label="Page navigation example">
                <ul class="pagination d-flex justify-content-center mb-5">
                    
                    @if (ceil(count($products)/$limitPage)>1)
                    {{-- <li class="page-item"><a class="page-link text-secondary" href="#"><i
                        class="fa-solid fa-arrow-left"></i></a></li> --}}
                        @for ($i = 0; $i < ceil(count($products)/$limitPage); $i++)
                            @if ($i==0)
                                <li onclick="changePage(this)" class="page-item"><a class="page-link text-light bg-secondary">{{ $i+1 }}</a></li>
                            @else
                                <li onclick="changePage(this)" class="page-item"><a class="page-link text-secondary">{{ $i+1 }}</a></li>
                            @endif
                        @endfor
                        {{-- <li class="page-item"><a class="page-link text-secondary" href="#"><i
                            class="fa-solid fa-arrow-right"></i></a></li> --}}
                    @endif
                    {{-- <li class="page-item"><a class="page-link bg-secondary text-light" href="#">1</a></li>
                    <li class="page-item"><a class="page-link text-secondary" href="#">2</a></li>
                    <li class="page-item"><a class="page-link text-secondary" href="#">3</a></li> --}}
                    
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
@endsection