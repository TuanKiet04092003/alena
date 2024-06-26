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
      <h3>Danh mục sản phẩm</h3>
    </div>

    

    <!-- Button trigger modal -->

    <!-- Modal -->
    

    <table class="table table-striped">
      <thead>
        <tr>
          <th>Stt</th>
          <th>Mã đơn hàng</th>
          <th>Email</th>
          <th>Địa chỉ</th>
          <th>Phương thức thanh toán</th>
          <th>Tổng tiền</th>
          <th>Trang thái</th>
          <th>Thao tác</th>
        </tr>
      </thead>
      <tbody>
        @for ($i = 0; $i < count($orders); $i++)
        <tr class="align-middle">
          <td>{{ $i+1 }}</td>
          <td>{{ $orders[$i]->code_order }}</td>
          <td>{{ $orders[$i]->email_order }}</td>
          <td>{{ $orders[$i]->address_receive }}</td>
          <td>{{ $orders[$i]->method_payment }}</td>
          <td>{{ $orders[$i]->total_payment }}</td>
          @switch($orders[$i]->status)
              @case('Chờ thanh toán')
                <td>
                  <span class="badge text-bg-warning">{{ $orders[$i]->status }}</span>
                </td>
                  @break
              @case('Đã thanh toán')
                <td>
                  <span class="badge text-bg-info">{{ $orders[$i]->status }}</span>
                </td>
                  @break
              @case('Đang giao hàng')
                <td>
                  <span class="badge text-bg-secondary">{{ $orders[$i]->status }}</span>
                </td>
                  @break
                  @case('Đã giao hàng')
                  <td>
                    <span class="badge text-light bg-primary">{{ $orders[$i]->status }}</span>
                  </td>
                    @break
                    @case('Hoàn thành')
                <td>
                  <span class="badge text-bg-success">{{ $orders[$i]->status }}</span>
                </td>
                  @break
              @default
                  
          @endswitch
          
          <td>
            <a href="/admin/vieworder/{{ $orders[$i]->id }}">
              <i class="fa-solid fa-eye text-info me-2"></i>
            </a>
            |
            <a href="/admin/changestatus/{{ $orders[$i]->id }}">
              <i class="fa-solid fa-right-left text-primary ms-2"></i>
            </a>
          </td>
          
        </tr>
        @endfor

       
      </tbody>
    </table>
    
  </div>
@endsection