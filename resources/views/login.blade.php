@extends('layout')
@section('title', 'KShop | Đăng nhập')
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
                    <h2 class="text-secondary text-center fw-semibold">Đăng nhập</h2>
                    <p class=" text-center mb-4">Nếu bạn chưa có tài khoản, đăng ký <a href="/register"
                            class="text-secondary">tại đây</a></p>
                    <form action="/login" method="post">
                        @csrf
                        <div class="w-75 mx-auto">
                            <input type="text" name="email" class="form-control w-100 my-3 p-2" value="{{ old('email') }}" placeholder="Email">
                            @if ($errors->has('login'))
                                <div class="text-danger">{{ $errors->first('login') }}</div>
                            @endif
                            <input type="password" name="password" class="form-control w-100 my-3 p-2" value="{{ old('password') }}" placeholder="Mật khẩu">
                            @if ($errors->has('login'))
                                <div class="text-danger mb-2">{{ $errors->first('login') }}</div>
                            @endif
                            <div class="d-flex justify-content-between">
                                <div class="form-check">
                                    <input id="rememberpw" type="checkbox" class="form-check-input">
                                    <label for="rememberpw">Nhớ mật khẩu</label>
                                </div>
                                <a href="/forgetpassform" class="text-secondary">Quên mật khẩu?</a>
                            </div>
                                
                                    <button class="btn btn-primary bg-secondary border-0 w-100 btn-login py-2 fw-semibold my-4">Đăng nhập</button>
                    
                            <p class="text-center">Hoặc đăng nhập bằng</p>
                            <div class="d-flex justify-content-between">
                                <a href="{{ url('auth/google') }}" class="btn btn-info btn-facebook text-light "><i class="fa-brands fa-facebook me-2"></i>Facebook</a>
                                <a  href="{{ url('auth/google') }}" class="btn btn-danger btn-google text-light "><i class="fa-brands fa-google me-2"></i>Google</a>
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