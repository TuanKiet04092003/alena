@extends('layout')
@section('title', 'KShop | Giỏ hàng')
@section('productpage')
<div class="current-page d-none d-lg-block"></div>
@endsection
@section('homeheader')
@section('content')
<section class="checkout my-5">
    <form action="/checkout" method="post">
    @csrf
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="info-ship">
                    <h5 class="fs-5 text-secondary fw-semibold mb-3">Thông tin giao hàng</h5>
                    
                        <div class="row">
                            <div class="d-flex justify-content-between">
                                <label for="name" class="form-label fw-semibold">Họ và tên: </label>
                                <a href="/loginform" class="text-secondary">Đã có tài khoản?</a>
                            </div>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Nhập họ và tên" 
                            value="{{ Auth::user() && Auth::user()->name ? Auth::user()->name : old('name') }}">
                            @if ($errors->has('name'))
                                <div class="text-danger">{{ $errors->first('name') }}</div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-6 p-0 pe-2">
                                <label for="email" class="form-label fw-semibold ms-2">Email: </label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="Nhập email"
                                value="{{ Auth::user() && Auth::user()->email ? Auth::user()->email : old('email') }}">
                                @if ($errors->has('email'))
                                    <div class="text-danger">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                            <div class="col-6 p-0 ps-2">
                                <label for="phone" class="form-label fw-semibold ms-2">Số điện thoại: </label>
                                <input type="text" id="phone" class="form-control"
                                    placeholder="Nhập số điện thoại" name="phone" value="{{ Auth::user() && Auth::user()->phone ? Auth::user()->phone : old('phone') }}">
                                @if ($errors->has('phone'))
                                    <div class="text-danger">{{ $errors->first('phone') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <label for="address" class="form-label fw-semibold">Địa chỉ: </label>
                            <input type="text" id="address" name="address" class="form-control" placeholder="Nhập địa chỉ"
                            value="{{ Auth::user() && Auth::user()->address ? Auth::user()->address : old('address') }}">
                            @if ($errors->has('address'))
                                <div class="text-danger">{{ $errors->first('address') }}</div>
                            @endif
                        </div>
                        
                        <div class="form-check-label mt-3"  onclick="addressother()">
                            <input type="checkbox" id="address-other-check" name="addressothercheck" class="form-check-input">
                            <label for="address-other-check">Giao hàng đến địa chỉ khác</label>
                        </div>
                        <div id="address-other" style="display: none" class="mt-3">
                            <div class="row">
                                <label for="name" class="form-label fw-semibold">Họ và tên: </label>
                                <input type="text" id="name" name="nameother" class="form-control" placeholder="Nhập họ và tên" 
                                >
                            </div>
                            <div class="row">
                                <div class="col-6 p-0 pe-2">
                                    <label for="email" class="form-label fw-semibold ms-2">Email: </label>
                                    <input type="email" id="email" name="emailother" class="form-control" placeholder="Nhập email"
                                    >
                                </div>
                                <div class="col-6 p-0 ps-2">
                                    <label for="phone" class="form-label fw-semibold ms-2">Số điện thoại: </label>
                                    <input type="text" name="phoneother" id="phone" class="form-control"
                                        placeholder="Nhập số điện thoại">
                                </div>
                            </div>
                            <div class="row">
                                <label for="address" class="form-label fw-semibold">Địa chỉ: </label>
                                <input type="text" id="address" name="addressother" class="form-control" placeholder="Nhập địa chỉ"
                              >
                            </div>
                        </div>
                        
                        
                        <h5 class="fs-5 text-secondary fw-semibold my-3">Phương thức thanh toán</h5>
                        <div class="form-check-label">
                            <input type="radio" name="methodcheckout" checked value="offline" id="1">
                            <label for="1">Thanh toán trực tiếp khi giao hàng</label>
                        </div>
                        <div class="form-check-label">
                            <input type="radio" name="methodcheckout" value="online" id="3">
                            <label for="3">Thanh toán trực tuyến</label>
                        </div>
                        <h5 class="fs-5 text-secondary fw-semibold my-3">Giao hàng nhanh</h5>
                        <div class="form-check-label mt-3">
                            <input type="checkbox" id="nhanh"  name="fast" class="form-check-input">
                            <label for="nhanh">Giao hàng nhanh (2-5 ngày)</label>
                        </div>
                </div>
                
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Đơn hàng ({{ count($carts) }} sản phẩm)</h5>
                    </div>
                    <div class="card-body">
                        @for ($i = 0; $i < count($carts); $i++)
                        <div class="d-flex justify-content-between position-relative">
                            <div class="d-flex gap-4">
                                <img src="{{ asset($carts[$i]['image']) }}" height="70px" class="rounded-2" alt="">
                                @if ($carts[$i]['quantity']>1)
                                <div class="badge text-bg-danger rounded-5 position-absolute amount-checkout">{{ $carts[$i]['quantity'] }}
                                </div>
                                @endif
                                <div>
                                    <p class="fw-semibold mb-0">{{ $productName[$i] }}</p>
                                    <p class="mb-0">{{ $colors[$i] }}/{{ $sizes[$i] }}</p>
                                </div>
                            </div>
                            <p class="fw-medium">{{ number_format($carts[$i]['price']*$carts[$i]['quantity'], 0, ',', '.') }}<span class="text-decoration-underline">đ</span></p>
                        </div>
                        @endfor
                        <div class="d-flex align-items-center justify-content-between w-100 my-3">
                            <input type="text" name="voucher" class="form-control" style="height: 40px; width: 65%;" placeholder="Nhập mã giảm giá">
                            <button name="action" value="voucher"
                                class="btn btn-primary text-light bg-secondary fw-medium border-0 btn-checkout">Áp dụng</button>
                        </div>
                        @if ($errors->has('voucher'))
                                <div class="text-danger mb-2">{{ $errors->first('voucher') }}</div>
                            @endif
                        <div class="d-flex align-items-center justify-content-between w-100 my-xxl-1">
                            <p>Tạm tính</p>
                            <p class="fw-medium">{{ number_format($totalPayment, 0, ',', '.') }}<span class="text-decoration-underline">đ</span></p>
                        </div>
                        <div class="d-flex align-items-center justify-content-between w-100">
                            <p>Phí vận chuyển</p>
                            <p class="fw-medium {{ $feeShipping==0 ? 'text-decoration-line-through':'' }}">30,000<span class="text-decoration-underline">đ</span></p>
                        </div>
                        @if ($feeShipping==0)
                        <div class="d-flex align-items-center justify-content-between w-100">
                            <p></p>
                            <p class="fw-medium">0<span class="text-decoration-underline">đ</span></p>
                        </div>
                        @endif
                        @if (session('discount')>0)
                            <div class="d-flex align-items-center justify-content-between w-100">
                                <p>Giảm giá</p>
                                <p class="fw-medium">{{ number_format(session('discount'), 0, ',', '.') }}<span class="text-decoration-underline">đ</span></p>
                            </div>
                        @endif
                        <hr class="mt-0">
                        <div class="d-flex align-items-center justify-content-between w-100 my-3">
                            <p>Tổng cộng</p>
                            <p class="fw-medium">{{ number_format($totalPayment+$feeShipping-session('discount'), 0, ',', '.') }}<span class="text-decoration-underline">đ</span></p>
                        </div>
                        <input type="hidden" name="totalPayment" value="{{ $totalPayment+$feeShipping-session('discount') }}">
                        <input type="hidden" name="totalPaymentTemp" value="{{ $totalPayment }}">

                        <div class="row">
                            <div class="col-6">
                                <a href="/cart" class="btn-addtocart-detail btn btn-outline-primary text-secondary fw-semibold" style="font-size: 18px; padding:10px 12px;">Giỏ hàng</a>
                            </div>
                            <div class="col-6">
                                <button name="action" value="order" class="btn-buynow-detail btn border-0 text-light fw-semibold bg-secondary">Đặt hàng</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
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