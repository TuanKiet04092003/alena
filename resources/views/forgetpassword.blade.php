@extends('layout')
@section('title', 'KShop | Quên mật khẩu')
@section('homepage')
<div class="current-page d-none d-lg-block"></div>
@endsection
@section('homeheader')
@section('content')
<section class="login-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-7 col-md-10 col-sm-12 mx-auto">
                <div class="login-form col-6 py-5 rounded-4">
                    
                    <h2 class="text-secondary text-center fw-semibold">Quên mật khẩu</h2>
                    <p class=" text-center mb-4">Nếu bạn chưa có tài khoản, đăng ký <a href="/register"
                            class="text-secondary">tại đây</a></p>
                    <form  action="/forgetpass" method="post">
                        @csrf
                        <div class="w-75 mx-auto">
                            <input type="email" name="email" class="form-control w-100 my-3 p-2" placeholder="Email" value="{{ old('email') }}">
                            @if ($errors->has('forgetpassemail'))
                                <div class="text-danger mb-2">{{ $errors->first('forgetpassemail') }}</div>
                            @endif
                            <button class="btn btn-primary bg-secondary border-0 w-100 btn-login py-2 fw-semibold my-4">Gữi mã xác nhận</button>
                            <p class="text-center">Hoặc đăng nhập bằng</p>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-info btn-facebook text-light "><i class="fa-brands fa-facebook me-2"></i>Facebook</button>
                                <button class="btn btn-danger btn-google text-light "><i class="fa-brands fa-google me-2"></i>Google</button>
                            </div>
                        </div>
                    </form>
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