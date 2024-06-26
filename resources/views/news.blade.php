@extends('layout')
@section('title', 'KSHop | Tin tức')
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
                <h5 class="fw-semibold ms-2">Tin tức</h5>
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="card bg-light border-0 mx-4 my-4 my-lg-2">
                            <div class="row">
                                <div class="col-lg-12 col-md-5 card-header p-0 bg-light border-0 position-relative">
                                    <a href="/newsdetail">
                                        <img src="images/newsnoibat1.webp" class="card-img-top rounded-3" alt="...">
                                    </a>
                                </div>
                                <div class="col-lg-12 col-md-7 pt-0 pt-lg-3 card-body ps-4 px-lg-0">
                                    <a href="/newsdetail">
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
                    <div class="col-lg-6 col-md-12">
                        <div class="card bg-light border-0 mx-4 my-4 my-lg-2">
                            <div class="row">
                                <div class="col-lg-12 col-md-5 card-header p-0 bg-light border-0 position-relative">
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
                    <div class="col-lg-6 col-md-12">
                        <div class="card bg-light border-0 mx-4 my-4 my-lg-2">
                            <div class="row">
                                <div class="col-lg-12 col-md-5 card-header p-0 bg-light border-0 position-relative">
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
                    <div class="col-lg-6 col-md-12">
                        <div class="card bg-light border-0 mx-4 my-4 my-lg-2">
                            <div class="row">
                                <div class="col-lg-12 col-md-5 card-header p-0 bg-light border-0 position-relative">
                                    <a href="">
                                        <img src="images/newsnoibat4.webp" class="card-img-top rounded-3" alt="...">
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
                    <div class="col-lg-6 col-md-12">
                        <div class="card bg-light border-0 mx-4 my-4 my-lg-2">
                            <div class="row">
                                <div class="col-lg-12 col-md-5 card-header p-0 bg-light border-0 position-relative">
                                    <a href="">
                                        <img src="images/newsnoibat5.webp" class="card-img-top rounded-3" alt="...">
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
                    <div class="col-lg-6 col-md-12">
                        <div class="card bg-light border-0 mx-4 my-4 my-lg-2">
                            <div class="row">
                                <div class="col-lg-12 col-md-5 card-header p-0 bg-light border-0 position-relative">
                                    <a href="">
                                        <img src="images/newsnoibat6.webp" class="card-img-top rounded-3" alt="...">
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
                <nav aria-label="Page navigation example">
                    <ul class="pagination d-flex justify-content-center mt-4">
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