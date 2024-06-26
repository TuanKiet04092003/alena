@extends('admin.layout')
@section('orderadmin','page-admin-current')
@section('content')
<div class="col-lg-10 col-12 px-4">
    <div class="row mx-4 my-3">
      <div class="offset-lg-6 col-lg-6 col-md-12">
        <form class="d-flex" role="search">
          <input class="form-control border-0 rounded-end-0 rounded-start-5 ps-4 shadow-sm" type="search"
            placeholder="Tìm kiếm sản phẩm bạn mong muốn" aria-label="Search" style="background-color: #F7F7F8;">
          <button class="btn btn-primary border-0 bg-primary rounded-end-5 rounded-start-0" type="submit"><i
              class="fa-solid fa-magnifying-glass text-light pe-2"></i></button>
        </form>
      </div>
    </div>
    <div class="d-flex justify-content-between my-4">
      <h3>Đơn hàng chỉ tiết</h3>
    </div>
    <div>
      @if (isset($order->code_order))
                                <div class="row admin-company-info mb-3">
                                    <h2  class="col-12">Thông Tin Đơn hàng</h2>
                                    <p class="col-6">Mã đơn hàng: <span style="font-weight: bold;">{{ $order->code_order }}</span></p>
                                    <p class="col-6">Ngày đặt: {{ $order->date_created }}</p>
                                    <p class="col-6">Phương thức thanh toán: {{ $order->method_payment }}</p>
                                    <p class="col-6">Trạng thái: {{ $order->status }}</p>
                                </div>
                        
                                <!-- Customer and Receiver Information Section -->
                                <div class="mb-3">
                                    <!-- Customer Information -->
                                    <div class="row admin-company-info">
                                        <h2 class="col-12">Thông Tin Người Đặt</h2>
                                        <p class="col-6">Tên: {{ $order->name_order }}</p>
                                        <p class="col-6">Địa Chỉ: {{ $order->address_order }}</p>
                                        <p class="col-6">Điện Thoại:  {{ $order->phone_order }} </p>
                                        <p class="col-6">Email: {{ $order->email_order }}</p>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <!-- Receiver Information -->
                                    <div class="row admin-company-info">
                                        <h2 class="col-12">Thông Tin Người Nhận</h2>
                                        <p class="col-6">Tên: {{ $order->name_receive }}</p>
                                        <p class="col-6">Địa Chỉ: {{ $order->address_receive }}</p>
                                        <p class="col-6">Điện Thoại: {{ $order->phone_receive }}</p>
                                        <p class="col-6">Email: {{ $order->email_receive }}</p>
                                    </div>
                                </div>
                                
                                <!-- Items Table Section -->
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
                                        @for ($i = 0; $i < count($orderdetail); $i++)
                                        <tr class="align-middle cart-product">
                                            <td class="d-flex align-items-center">
                                                <img src="{{ asset($orderdetail[$i]['image']) }}" height="100px" width="100px" alt="">
                                                <div class="text-start ms-2">
                                                    <p class="m-0">{{ $productName[$i] }}</p>
                                                    <p class="m-0">{{ $colors[$i] }}/{{ $sizes[$i] }}</p>
                                                </div>
                                            </td>
                                            <td>{{ number_format($orderdetail[$i]['price'], 0, ',', '.') }}<span class="text-decoration-underline">đ</span></td>
                                            <td>
                                                {{ $orderdetail[$i]->quantity }}
                                            </td>
                                            <td class="">{{ number_format($orderdetail[$i]['price']*$orderdetail[$i]['quantity'], 0, ',', '.') }}<span class="text-decoration-underline">đ</span></td>
                                        </tr>
                                    @endfor
                                    </tbody>
                                </table>
                            </div>
                                <!-- Total Section -->
                               
                                    <h2 class="fs-5 total-payment mb-5">Tổng Cộng: {{ number_format($order->total_payment, 0, ',', '.') }} đ</h2>
                             
                            @endif
    
  </div>
@endsection