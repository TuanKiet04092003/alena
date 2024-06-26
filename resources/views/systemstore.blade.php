@extends('layout')
@section('title', 'KShop | Hệ thống cửa hàng')
@section('systemstorepage')
<div class="current-page d-none d-lg-block"></div>
@endsection
@section('homeheader')
@section('content')
<section class="systemstore my-5">
    <div class="container">
        <div class="row mx-5">
            <div class="system-info rounded-4">
                <div class="row align-items-center py-3">
                    <div class="col-lg-4 col-12">
                        <div class="system-item d-flex align-items-center mb-3 mb-lg-0 justify-content-center">
                            <i class="fa-solid fa-store icon-systemstore me-2"></i>
                            <div>
                                <p class="mb-1 fw-medium">Hệ thống 8 cửa hàng</p>
                                <p class="mb-0 fw-medium">Trên toàn quốc</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="system-item d-flex align-items-center mb-3 mb-lg-0 justify-content-center">
                            <i class="fa-solid fa-users icon-systemstore me-2"></i>
                            <div>
                                <p class="mb-1 fw-medium">Hơn 100 nhân viên</p>
                                <p class="mb-0 fw-medium">Để phục vụ quý khách</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="system-item d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-clock icon-systemstore me-2"></i>
                            <div>
                                <p class="mb-1 fw-medium">Mở cửa từ 8h đến 22h</p>
                                <p class="mb-0 fw-medium">cả chủ nhật & Lễ Tết</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mx-5 mt-5">
            <div class="col-12 col-lg-4">
                <div class="systemstoreaddress text-14">
                    <div class="row systemstore-form rounded-2 p-2">
                        <div class="col-6 col-lg-12 col-xl-6">
                            <label for="province" class="form-label">Tỉnh/Thành phố</label>
                            <select name="" id="province" class="form-select text-14">
                                <option value="1">Hồ Chí Minh</option>
                                <option value="2">Hà Nội</option>
                                <option value="3">Đằng Nẵng</option>
                                <option value="4">Cần Thơ</option>
                                <option value="5">Hải Phòng</option>
                                <option value="6">Bến Tre</option>
                            </select>
                        </div>
                        <div class="col-6 col-lg-12 col-xl-6">
                            <label for="province" class="form-label">Tên cửa hàng</label>
                            <input type="text" class="form-control text-14" placeholder="Nhập tên cửa hàng">
                        </div>
                        <div class="col-6"></div>
                    </div>
                    <div class="row p-2 rounded-2 system-direct py-3 mt-3">
                        <h6 class="text-secondary fw-semibold">Alena Sài Gòn</h6>
                        <div class="d-flex align-items-center my-2">
                            <i class="fa-solid fa-location-dot me-2 text-secondary fs-5"></i>
                            <p class="mb-0">Tầng 3, 70 Lữ Gia, Phường 15, Quận 11, Thành phố Hồ Chí Minh</p>
                        </div>
                        <div class="d-flex align-items-center my-2">
                            <i class="fa-solid fa-phone me-2 text-secondary fs-5"></i>
                            <p class="mb-0">1900 6750</p>
                        </div>
                        <button
                            class="btn btn-outline-danger text-secondary mt-2 ms-2 w-50 rounded-4 btn-direct">
                            <i class="fa-solid fa-location-arrow me-2"></i>
                            Chỉ đường
                        </button>
                    </div>
                    <div class="row p-2 rounded-2 system-direct py-3 mt-3">
                        <h6 class="text-secondary fw-semibold">Alena Hà Nội</h6>
                        <div class="d-flex align-items-center my-2">
                            <i class="fa-solid fa-location-dot me-2 text-secondary fs-5"></i>
                            <p class="mb-0">Tầng 3, 70 Lữ Gia, Phường 15, Quận 11, Thành phố Hồ Chí Minh</p>
                        </div>
                        <div class="d-flex align-items-center my-2">
                            <i class="fa-solid fa-phone me-2 text-secondary fs-5"></i>
                            <p class="mb-0">1900 6750</p>
                        </div>
                        <button
                            class="btn btn-outline-danger text-secondary mt-2 ms-2 w-50 rounded-4 btn-direct">
                            <i class="fa-solid fa-location-arrow me-2"></i>
                            Chỉ đường
                        </button>
                    </div>
                    <div class="row p-2 rounded-2 system-direct py-3 mt-3">
                        <h6 class="text-secondary fw-semibold">Alena Đà Nẵng</h6>
                        <div class="d-flex align-items-center my-2">
                            <i class="fa-solid fa-location-dot me-2 text-secondary fs-5"></i>
                            <p class="mb-0">Tầng 3, 70 Lữ Gia, Phường 15, Quận 11, Thành phố Hồ Chí Minh</p>
                        </div>
                        <div class="d-flex align-items-center my-2">
                            <i class="fa-solid fa-phone me-2 text-secondary fs-5"></i>
                            <p class="mb-0">1900 6750</p>
                        </div>
                        <button
                            class="btn btn-outline-danger text-secondary mt-2 ms-2 w-50 rounded-4 btn-direct">
                            <i class="fa-solid fa-location-arrow me-2"></i>
                            Chỉ đường
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-8 mt-3 mt-lg-0">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.443592406485!2d106.62525347451808!3d10.853826357762367!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752bee0b0ef9e5%3A0x5b4da59e47aa97a8!2zQ8O0bmcgVmnDqm4gUGjhuqduIE3hu4FtIFF1YW5nIFRydW5n!5e0!3m2!1svi!2s!4v1710935421662!5m2!1svi!2s"
                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade" class="rounded-2"></iframe>
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