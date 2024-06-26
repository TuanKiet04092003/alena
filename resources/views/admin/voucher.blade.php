@extends('admin.layout')
@section('voucheradmin','page-admin-current')
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
      <h3>Tất cả mã giảm giá</h3>
      <a href="/admin/addformvoucher">
        <button class="btn-buynow-detail btn border-0 text-light fw-semibold bg-secondary"
       style="width: 150px;"><i class="fa-solid fa-plus me-2"></i>Thêm</button>
      </a>
    </div>


    <table class="table table-striped">
      <thead>
        <tr>
          <th>Stt</th>
          <th>Mã giảm giá</th>
          <th>Loại giảm giá</th>
          <th>Giảm giá</th>
          <th>Giá trị đơn hàng tối thiểu</th>
          <th>Id khách hàng</th>
          <th>Số lượng</th>
          <th>Thao tác</th>
        </tr>
      </thead>
      <tbody>
        @for ($i = 0; $i < count($vouchers); $i++)
        <tr class="align-middle">
          <td>{{ $i+1 }}</td>
          <td>{{ $vouchers[$i]->code_voucher }}</td>
          <td>{{ $vouchers[$i]->type_discount==1?'Giảm theo số tiền':'Giảm theo phần trăm' }}</td>
          <td>{{ $vouchers[$i]->discount }}</td>
          <td>{{ $vouchers[$i]->miximum_payment }}</td>
          <td>{{ $vouchers[$i]->id_user }}</td>
          <td>{{ $vouchers[$i]->quantity }}</td>
          <td>
            <a href="/admin/editformvoucher/{{ $vouchers[$i]->id }}">
              <i class="fa-solid fa-pen-to-square text-info me-2"></i>
            </a>
            |
            <a href="/admin/deletevoucher/{{ $vouchers[$i]->id }}">
              <i class="fa-solid fa-trash-can text-danger ms-2"></i>
            </a>
          </td>
        </tr>
        @endfor
      </tbody>
    </table>

  </div>
@endsection