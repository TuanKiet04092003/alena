@extends('layout')
@section('title', 'KShop | Liên hệ')
@section('contactpage')
<div class="current-page d-none d-lg-block"></div>
@endsection
@section('homeheader')
@section('content')
<section class="contact my-5">
    <div class="container">
        <div class="row mx-5">
            <div class="col-lg-6 col-12">
                <h5 class="fw-bold text-secondary fs-6 mb-3">CÔNG TY TNHH THỜI TRANG ALENA</h5>
                <p><span class="text-secondary fw-semibold"><i class="fa-solid fa-location-dot me-2"></i>Địa
                        chỉ: </span>Tầng 6, Tòa nhà Ladeco, 266 Đội
                    Cấn, Phường Liễu Giai, Quận Ba Đình, TP Hà Nội</p>
                <p><span class="text-secondary fw-semibold"><i class="fa-solid fa-envelope me-2"></i>Email:
                    </span>hoa48488474773@gmail.com</p>
                <p><span class="text-secondary fw-semibold"><i class="fa-solid fa-phone me-2"></i>Hotline:
                    </span>1900 6750</p>
                <h5 class="fw-bold text-secondary fs-6 mb-3">Liên hệ với chúng tôi</h5>
                <form action="">
                    <input type="text" class="form-control text-14 mb-3" placeholder="Họ và tên">
                    <div class="d-flex justify-content-between">
                        <input type="email" class="form-control inp-news-comment text-14" placeholder="Email">
                        <input type="text" class="form-control inp-news-comment text-14"
                            placeholder="Số điện thoại">
                    </div>
                    <textarea name="" id="" cols="30" rows="5" class="form-control my-3 text-14"
                        placeholder="Nội dung"></textarea>
                    <button class="btn btn-primary bg-secondary btn-news-comment border-0 fw-medium">Gửi thông
                        tin</button>
                </form>
            </div>
            <div class="col-lg-6 col-12">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.443592406485!2d106.62525347451808!3d10.853826357762367!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752bee0b0ef9e5%3A0x5b4da59e47aa97a8!2zQ8O0bmcgVmnDqm4gUGjhuqduIE3hu4FtIFF1YW5nIFRydW5n!5e0!3m2!1svi!2s!4v1710935421662!5m2!1svi!2s"
                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
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