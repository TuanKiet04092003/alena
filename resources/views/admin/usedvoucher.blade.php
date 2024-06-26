@extends('admin.layout')
@section('usedvoucheradmin','page-admin-current')
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
      <h3>Tất cả khách hàng đã dùng mã giảm giá</h3>
      <a href="/admin/addformvoucher">
        {{-- <button class="btn-buynow-detail btn border-0 text-light fw-semibold bg-secondary"
       style="width: 150px;"><i class="fa-solid fa-plus me-2"></i>Thêm</button> --}}
      </a>
    </div>


    <table class="table table-striped">
      <thead>
        <tr>
          <th>Stt</th>
          <th>Id khách hàng</th>
          <th>Id mã giảm giá</th>
        </tr>
      </thead>
      <tbody>
        @for ($i = 0; $i < count($usedvouchers); $i++)
        <tr class="align-middle">
          <td>{{ $i+1 }}</td>
          <td>{{ $usedvouchers[$i]->id_user }}</td>
          <td>{{ $usedvouchers[$i]->id_voucher }}</td>
        </tr>
        @endfor
      </tbody>
    </table>

  </div>
@endsection