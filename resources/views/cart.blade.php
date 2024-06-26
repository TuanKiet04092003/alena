@extends('layout')
@section('title', 'KShop | Giỏ hàng')
@section('productpage')
<div class="current-page d-none d-lg-block"></div>
@endsection
@section('homeheader')
@section('content')
<section class="cart my-5">
    <div class="container">
        <div class="row mx-5">
            <h5 class="fs-5 fw-semibold">Giỏ hàng</h5>
            <div class="col-xl-8 col-12">
                <div class="to-freeshipping my-2 p-0 rounded-4">
                    <div class="power-freeshipping h-100 rounded-4" style="width: {{ $powerFreeship }}%"></div>
                </div>
                <p class="text-14 mb-4">Bạn cần mua thêm <span class="text-primary">500.000<span class="text-decoration-underline">đ</span></span> để được miễn phí vận chuyển</p>
                <table class="table table-bordered text-center" style="font-size: 14px;">
                    <thead>
                        <tr>
                            <th class="text-start">Thông tin sản phẩm</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (is_array($carts))
                        @for ($i = 0; $i < count($carts); $i++)
                        <tr class="align-middle cart-product">
                            <td class="d-flex align-items-center">
                                <img src="{{ asset($carts[$i]['image']) }}" height="100px" width="100px" alt="">
                                <div class="text-start ms-2">
                                    <p class="m-0">{{ $productName[$i] }}</p>
                                    <p class="m-0">{{ $colors[$i] }}/{{ $sizes[$i] }}</p>
                                    <a href="/deletecart/{{ $i }}"><i class="fa-solid fa-trash-can"></i></a>
                                </div>
                            </td>
                            <td>{{ number_format($carts[$i]['price'], 0, ',', '.') }}<span class="text-decoration-underline">đ</span></td>
                            <td>
                                <div class="btn-group" role="group" style="height: 30px;" aria-label="Button group with nested dropdown">
                                    <input type="hidden" class="index" value="{{ $i }}">
                                    <input type="hidden" class="price" value="{{ $carts[$i]['price'] }}">
                                    
                                    <button type="button" class="btn btn-outline-warning btn-amount p-0 text-dark btn-amount-cart tru" style="width: 30px;">-</button>
                                    <input type="text" class="form-control text-center fs-6 fw-semibold soluong" value="{{ $carts[$i]['quantity'] }}" style="width: 55px;">
                                    <button type="button" class="btn btn-outline-warning btn-amount p-0 text-dark btn-amount-cart cong" style="width: 30px;">+</button>
                                </div>
                            </td>
                            <td class="pro-price-quantity">{{ number_format($carts[$i]['price']*$carts[$i]['quantity'], 0, ',', '.') }}<span class="text-decoration-underline">đ</span></td>
                        </tr>
                    @endfor
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="col-xl-4 col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title text-dark m-0 text-center">Thông tin đơn hàng</div>
                    </div>
                    <div class="card-body" style="font-size: 14px;">
                        <div class="d-flex justify-content-between">
                            <p class="my-2 fw-medium">Tổng tiền</p>
                            <input type="hidden" class="tong" value="{{ $totalPayment }}">
                            <p class="my-2 fw-medium cart-content__price">{{ number_format($totalPayment, 0, ',', '.') }}<span class="text-decoration-underline">đ</span></p>
                        </div>
                        <hr class="my-2">
                        <div class="d-flex justify-content-between">
                            <p class="mt-2 mb-0 fw-medium">Giảm giá</p>
                            <p class="mt-2 mb-0">Áp dụng tại trang thanh toán</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="my-2 fw-medium">Phí vận chuyển</p>
                            <p class="my-2">Tính tại trang thanh toán</p>
                        </div>
                        <a href="/checkout">
                            <button class="btn btn-primary text-light w-100 bg-secondary my-4 py-2 fw-semibold border-0 btn-checkout">Tiếp tục thanh toán</button>
                        </a>
                        <p class="text-center mb-0">Hỗ trợ thanh toán với</p>
                        <div class="d-flex justify-content-center align-items-center gap-2">
                            <img src="images/visa.svg" height="22px" alt="">
                            <img src="images/napas.svg" height="22px" alt="">
                            <img src="images/zalopay.svg" height="36px" alt="">
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
{{-- <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script> --}}
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  {{-- <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script> --}}
    {{-- <script
      type="text/javascript"
      src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script> --}}
<script>
    $(document).ready(function () {
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        var tong=$('.tong').val();
        $(".tru").click(function (e) { 
            e.preventDefault();
            // alert("ok");
            var soluong=$(this).parent().find('.soluong').val();
            soluongdau=soluong;
            soluong--;
            console.log('Số lượng sau khi bấm nút trừ: ', soluong);
            $(this).parent().find('.soluong').val(soluong);
            // alert(txt);
            // alert(mycart.length);

            // alert(tong);
            var ind=$(this).parent().find('.index').val();
            var price=$(this).parent().find('.price').val();
            if(soluong==0){
                $(".cart-product:eq("+ind+")").remove();
                // $(".fee-cart").find("h1:eq("+(ind*2)+")").remove();
                // $(".fee-cart").find("h1:eq("+(ind*2)+")").remove();
            }else{
                // $(".fee-cart").find("h1:eq("+(ind*2)+")").find("span").html(soluong);
                // $(".fee-cart").find("h1:eq("+(ind*2+1)+")").find("span").html((soluong*price).toLocaleString("en-US", {style:"currency", currency:"USD"}));'
                var thanhtienso=soluong*price;
                var thanhtien='';
                if(thanhtienso==0){
                    thanhtien='0đ';
                }else{
                    while(thanhtienso>0){
                        if(thanhtienso>=1000000){
                            thanhtien+=Math.floor(thanhtienso/1000000)+',';
                            thanhtienso=thanhtienso-Math.floor(thanhtienso/1000000)*1000000;
                        }
                        if(thanhtienso>=1000){
                            thanhtien+=Math.floor(thanhtienso/1000)+',';
                            thanhtienso=thanhtienso-Math.floor(thanhtienso/1000)*1000;
                        }
                        if(thanhtienso<1000){
                            if(thanhtienso>0){
                                thanhtien+=thanhtienso+'đ';
                            }else{
                                thanhtien+='000đ';
                            }
                        }
                    }
                }
                
                $(".cart-product:eq("+ind+")").find('.pro-price-quantity').html(thanhtien);
            }
            tong=parseInt(tong)-parseInt((soluongdau-soluong)*price);
            var shipping=0;
            if(tong>=500000){
                shipping=100;
            }else{
                shipping=Math.round(tong*100/500000);
            }
            
            $('.power-freeshipping').css('width', shipping+'%');
            tong1=tong;
            var tongchuoi='';
            if(tong1==0){
                tongchuoi='0đ';
            }else{
                while(tong1>0){
                    if(tong1>=1000000){
                        tongchuoi+=Math.floor(tong1/1000000)+',';
                        tong1=tong1-Math.floor(tong1/1000000)*1000000;
                    }
                    if(tong1>=1000){
                        tongchuoi+=Math.floor(tong1/1000)+',';
                        tong1=tong1-Math.floor(tong1/1000)*1000;
                    }
                    if(tong1<1000){
                        if(tong1>0){
                            tongchuoi+=tong1+'đ';
                        }else{
                            tongchuoi+='000đ';
                        }
                    }
                }
            }
            $(".cart-content__price").html(tongchuoi);

            // $(".fee-cart:eq(1)").find('span').html(tong.toLocaleString("en-US", {style:"currency", currency:"USD"}));
            // if(tong==0){
            //     $('.layout-cart').find('article').html(str);
            //     $('.layout-cart').find('aside').remove();
            // }
            $.post("/addtocart", {
                soluongmoi: soluong,
                ind: ind
            },
                function (data, textStatus, jqXHR) {
                    $("#msg").html(data);
                }
            );
        });
        $(".cong").click(function (e) { 
            e.preventDefault();
            // alert("ok");
            var soluong=$(this).parent().find('.soluong').val();
            soluongdau=soluong;
            soluong++;
            $(this).parent().find('.soluong').val(soluong);
            // alert(txt);
            // alert(mycart.length);

            // alert(tong);
            var ind=$(this).parent().find('.index').val();
            var price=$(this).parent().find('.price').val();
            if(soluong==0){
                $(".cart-product:eq("+ind+")").remove();
                // $(".fee-cart").find("h1:eq("+(ind*2)+")").remove();
                // $(".fee-cart").find("h1:eq("+(ind*2)+")").remove();
            }else{
                // $(".fee-cart").find("h1:eq("+(ind*2)+")").find("span").html(soluong);
                // $(".fee-cart").find("h1:eq("+(ind*2+1)+")").find("span").html((soluong*price).toLocaleString("en-US", {style:"currency", currency:"USD"}));'
                var thanhtienso=soluong*price;
                var thanhtien='';
                if(thanhtienso==0){
                    thanhtien='0đ';
                }else{
                    while(thanhtienso>0){
                        if(thanhtienso>=1000000){
                            thanhtien+=Math.floor(thanhtienso/1000000)+',';
                            thanhtienso=thanhtienso-Math.floor(thanhtienso/1000000)*1000000;
                        }
                        if(thanhtienso>=1000){
                            thanhtien+=Math.floor(thanhtienso/1000)+',';
                            thanhtienso=thanhtienso-Math.floor(thanhtienso/1000)*1000;
                        }
                        if(thanhtienso<1000){
                            if(thanhtienso>0){
                                thanhtien+=thanhtienso+'đ';
                            }else{
                                thanhtien+='000đ';
                            }
                        }
                    }
                }
                
                $(".cart-product:eq("+ind+")").find('.pro-price-quantity').html(thanhtien);
            }
            tong=parseInt(tong)+parseInt((soluong-soluongdau)*price);
            var shipping=0;
            if(tong>=500000){
                shipping=100;
            }else{
                shipping=Math.round(tong*100/500000);
            }
            
            $('.power-freeshipping').css('width', shipping+'%');
            tong1=tong;
            var tongchuoi='';
            if(tong1==0){
                tongchuoi='0đ';
            }else{
                while(tong1>0){
                    if(tong1>=1000000){
                        tongchuoi+=Math.floor(tong1/1000000)+',';
                        tong1=tong1-Math.floor(tong1/1000000)*1000000;
                    }
                    if(tong1>=1000){
                        tongchuoi+=Math.floor(tong1/1000)+',';
                        tong1=tong1-Math.floor(tong1/1000)*1000;
                    }
                    if(tong1<1000){
                        if(tong1>0){
                            tongchuoi+=tong1+'đ';
                        }else{
                            tongchuoi+='000đ';
                        }
                    }
                }
            }
            $(".cart-content__price").html(tongchuoi);

            // $(".fee-cart:eq(1)").find('span').html(tong.toLocaleString("en-US", {style:"currency", currency:"USD"}));
            // if(tong==0){
            //     $('.layout-cart').find('article').html(str);
            //     $('.layout-cart').find('aside').remove();
            // }
            $.post("/addtocart", {
                soluongmoi: soluong,
                ind: ind
            },
                function (data, textStatus, jqXHR) {
                    $("#msg").html(data);
                }
            );
        });
    });
</script>
@endsection