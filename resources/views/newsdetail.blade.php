@extends('layout')
@section('title', 'KShop | Giỏ hàng')
@section('newspage')
<div class="current-page d-none d-lg-block"></div>
@endsection
@section('homeheader')
@section('content')
<section class="news">
    <div class="container">
        <div class="row d-flex">
            <div class="col-lg-4 col-md-12 d-none d-lg-block">
                <div class="news-catalog p-4 rounded-3 mt-4">
                    <h3 class="fw-bold">Danh mục tin tức</h3>
                    <div class="accordion accordion-flush bg-catalog-news" id="accordionFlushExample">
                        <div class="accordion-item border-0">
                            <h2 class="accordion-header">
                                <button
                                    class="accordion-button collapsed bg-catalog-news shadow-none fw-semibold p-0 py-2"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                    aria-expanded="false" aria-controls="flush-collapseOne">
                                    Tin tức thời trang
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body bg-catalog-news p-1">
                                    <ul>
                                        <li class="mb-2"><a href="">Thời trang trong nước</a></li>
                                        <li class="mb-2"><a href="">Thời trang quốc tế</a></li>
                                        <li class="mb-2"><a href="">Bộ sưu tập HOT</a></li>
                                        <li><a href="">Xu hướng thời trang</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item bg-catalog-news border-0">
                            <h2 class="accordion-header">
                                <button
                                    class="accordion-button collapsed bg-catalog-news shadow-none fw-semibold p-0  py-2"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo"
                                    aria-expanded="false" aria-controls="flush-collapseTwo">
                                    Mẹo vặt hay
                                </button>
                            </h2>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body bg-catalog-news p-1">
                                    <ul>
                                        <li class="mb-1"><a href="">Làm sao để giữ đồ luôn thơm mát</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0">
                            <h2 class="accordion-header">
                                <button
                                    class="accordion-button collapsed bg-catalog-news shadow-none fw-semibold p-0 py-2"
                                    type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseThree" aria-expanded="false"
                                    aria-controls="flush-collapseThree">
                                    Làm sao mặt đẹp
                                </button>
                            </h2>
                            <div id="flush-collapseThree" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body bg-catalog-news p-1">
                                <ul>
                                    <li class=" mb-1"><a href="">Phối đồ hợp màu</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="news-catalog p-4 rounded-3 my-4">
                    <h3 class="fw-bold">Danh mục tin tức</h3>
                    <div class="d-flex my-4">
                        <img src="images/newsnoibat1.webp" class="rounded-2 me-2" alt="">
                        <p>Cách Phối Đồ Hè Nam</p>
                    </div>
                    <div class="d-flex my-4">
                        <img src="images/newsnoibat2.webp" class="rounded-2 me-2" alt="">
                        <p>Cách Phối Đồ Với Quần Thể Thao Nam</p>
                    </div>
                    <div class="d-flex my-4">
                        <img src="images/newsnoibat3.webp" class="rounded-2 me-2" alt="">
                        <p>Cách Phối Đồ Sơ Mi Nam</p>
                    </div>
                    <div class="d-flex my-4">
                        <img src="images/newsnoibat4.webp" class="rounded-2 me-2" alt="">
                        <p>Cách Phối Đồ Cho Bé</p>
                    </div>
                    <div class="d-flex my-4">
                        <img src="images/newsnoibat5.webp" class="rounded-2 me-2" alt="">
                        <p>Mẹo Chọn Đồ Giúp Nàng Cao Và Gầy Trở Nên Đầy Đặn Hơn</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12 my-4">
                <h2 class="fw-semibold">Cách phối đồ sơ mi nam</h2>
                <p class="text-14">
                    <i class="fa-regular fa-user"></i>
                    Cafein Team |
                    <i class="fa-regular fa-clock"></i>
                    Ngày 27/05/2022
                </p>
                <h5 class="fw-semibold fs-6">1. Quần jean ống đứng</h5>
                <p class="text-14">Cách phối đồ với áo sơ mi nam đầu tiên mà Cardina gợi ý cho các bạn là mix
                    cùng với quần jean
                    ống đứng hoặc quần jean ống côn. Những chiếc quần jean không hề khó tìm kiếm. Hầu như tất cả
                    mọi người đều có ít nhất một chiếc trong tủ đồ.Đây là cách mix áo sơ mi được nhiều chàng
                    trai chọn lựa. Vừa năng động, trẻ trung mà lại thoải mái. Một đôi giày thể thao hay một đôi
                    dép sandal quai hậu là có thể tự tin đi học hay đi làm.</p>
                <img src="images/newsdetail1.webp" class="img-fluid" alt="">
                <h5 class="fw-semibold fs-6 mt-4">2. Quần baggy</h5>
                <p class="text-14">Nếu bạn không thích quần ống đứng thì cũng có thể chọn những chiếc quần jean
                    dáng baggy. Với thiết kế này, các bạn có thể mặc đi học hay mặc đi chơi. Chọn những chiếc áo
                    sơ mi kẻ hay áo sơ mi họa tiết, ngắn tay để cá tính và sành điệu nhất.</p>
                <img src="images/newsdetail2.webp" class="img-fluid" alt="">
                <h5 class="fw-semibold fs-6 mt-4">3. Quần jean jogger</h5>
                <p class="text-14">Những chàng trai không thích những set đồ quá "an toàn" thì có thể chọn cho
                    mình những chiếc quần jean jogger để mix cùng áo sơ mi nam. </p>
                <p class="text-14">Một chiếc áo sơ mi trắng đơn giản hay thậm chí là áo sơ mi hoa hòe hoa sói
                    màu mè cũng có thể kết hợp siêu hoàn hảo với những chiếc quần jogger. </p>
                <p class="text-14">Các bạn có thể đi cùng với một đôi giày martin 8 lỗ hay giày martin đế cao,
                    một đôi boots cũng là sự lựa chọn không tồi.</p>
                <img src="images/newsdetail3.webp" class="img-fluid" alt="">
                <hr class="mt-4">
                <div class="comment mt-4">
                    <p class="fw-semibold">Viết bình luận của bạn</p>
                    <form action="">
                        <div class="d-flex justify-content-between">
                            <input type="text" class="form-control inp-news-comment text-14" placeholder="Họ và tên">
                            <input type="email" class="form-control inp-news-comment text-14" placeholder="Email">
                        </div>
                        <textarea name="" id="" cols="30" rows="5" class="form-control my-3 text-14" placeholder="Nội dung"></textarea>
                        <button class="btn btn-primary bg-secondary btn-news-comment border-0 fw-medium">Gửi bình luận</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 d-lg-none d-block">
                <div class="news-catalog p-4 rounded-3 mt-4">
                    <h3 class="fw-bold">Danh mục tin tức</h3>
                    <div class="accordion accordion-flush bg-catalog-news" id="accordionFlushExample">
                        <div class="accordion-item border-0">
                            <h2 class="accordion-header">
                                <button
                                    class="accordion-button collapsed bg-catalog-news shadow-none fw-semibold p-0 py-2"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                    aria-expanded="false" aria-controls="flush-collapseOne">
                                    Tin tức thời trang
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body bg-catalog-news p-1">
                                    <ul>
                                        <li class="mb-2"><a href="">Thời trang trong nước</a></li>
                                        <li class="mb-2"><a href="">Thời trang quốc tế</a></li>
                                        <li class="mb-2"><a href="">Bộ sưu tập HOT</a></li>
                                        <li><a href="">Xu hướng thời trang</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item bg-catalog-news border-0">
                            <h2 class="accordion-header">
                                <button
                                    class="accordion-button collapsed bg-catalog-news shadow-none fw-semibold p-0  py-2"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo"
                                    aria-expanded="false" aria-controls="flush-collapseTwo">
                                    Mẹo vặt hay
                                </button>
                            </h2>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body bg-catalog-news p-1">
                                    <ul>
                                        <li class="mb-1"><a href="">Làm sao để giữ đồ luôn thơm mát</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0">
                            <h2 class="accordion-header">
                                <button
                                    class="accordion-button collapsed bg-catalog-news shadow-none fw-semibold p-0 py-2"
                                    type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseThree" aria-expanded="false"
                                    aria-controls="flush-collapseThree">
                                    Làm sao mặt đẹp
                                </button>
                            </h2>
                            <div id="flush-collapseThree" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body bg-catalog-news p-1">
                                <ul>
                                    <li class=" mb-1"><a href="">Phối đồ hợp màu</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="news-catalog p-4 rounded-3 my-4">
                    <h3 class="fw-bold">Danh mục tin tức</h3>
                    <div class="d-flex my-4">
                        <img src="images/newsnoibat1.webp" class="rounded-2 me-2" alt="">
                        <p>Cách Phối Đồ Hè Nam</p>
                    </div>
                    <div class="d-flex my-4">
                        <img src="images/newsnoibat2.webp" class="rounded-2 me-2" alt="">
                        <p>Cách Phối Đồ Với Quần Thể Thao Nam</p>
                    </div>
                    <div class="d-flex my-4">
                        <img src="images/newsnoibat3.webp" class="rounded-2 me-2" alt="">
                        <p>Cách Phối Đồ Sơ Mi Nam</p>
                    </div>
                    <div class="d-flex my-4">
                        <img src="images/newsnoibat4.webp" class="rounded-2 me-2" alt="">
                        <p>Cách Phối Đồ Cho Bé</p>
                    </div>
                    <div class="d-flex my-4">
                        <img src="images/newsnoibat5.webp" class="rounded-2 me-2" alt="">
                        <p>Mẹo Chọn Đồ Giúp Nàng Cao Và Gầy Trở Nên Đầy Đặn Hơn</p>
                    </div>
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
                <a href="">
                  <img src="images/newsnoibat1.webp" class="card-img-top rounded-3" alt="...">
                </a>
              </div>
              <div class="col-lg-12 col-md-7 pt-0 pt-lg-3 card-body ps-4 px-lg-0">
                <a href="">
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
                <a href="">
                  <img src="images/newsnoibat2.webp" class="card-img-top rounded-3" alt="...">
                </a>
              </div>
              <div class="col-lg-12 col-md-7 pt-0 pt-lg-3 card-body ps-4 px-lg-0">
                <a href="">
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
                <a href="">
                  <img src="images/newsnoibat3.webp" class="card-img-top rounded-3" alt="...">
                </a>
              </div>
              <div class="col-lg-12 col-md-7 pt-0 pt-lg-3 card-body ps-4 px-lg-0">
                <a href="">
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