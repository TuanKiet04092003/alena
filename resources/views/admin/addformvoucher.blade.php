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
    <div class="mx-5">
      <div class="d-flex justify-content-between my-4">
        <h3>Thêm mã giảm giá</h3>
      </div>
  
      <form action="/admin/addvoucher" method="post">
        @csrf
              <div class="row my-2">
                <div class="col-3">
                  <label for="" class="form-label fw-semibold mb-0 mt-1">Mã giảm giá</label>
                </div>
                <div class="col-9">
                  <input type="text" name="code_voucher" class="form-control" placeholder="Nhập mã giảm giá">
                  
                </div>
              </div>
              <div class="row my-2">
                <div class="col-3">
                  <label for="" class="form-label fw-semibold mb-0 mt-1">Loại giảm giá</label>
                </div>
                <div class="col-9">
                  <select name="type_discount" id="" class="form-select">
                    <option selected value="1">Giảm theo số tiền</option>
                    <option value="2">Giảm theo phần trăm</option>
                  </select>
                </div>
              </div>
              <div class="row my-2">
                <div class="col-3">
                  <label for="" class="form-label fw-semibold mb-0 mt-1">Giảm giá</label>
                </div>
                <div class="col-9">
                  <input type="text" name="discount" class="form-control" placeholder="Nhập giá trị giảm giá">
                  
                </div>
              </div>
              
              <div class="row my-2">
                <div class="col-3">
                  <label for="" class="form-label fw-semibold mb-0 mt-1">Giá trị đơn hàng tối thiểu</label>
                </div>
                <div class="col-9">
                  <input type="text" name="miximum_payment" class="form-control" placeholder="Nhập giá trị đơn hàng tối thiểu">
                  
                </div>
              </div>
              <div class="row my-2">
                <div class="col-3">
                  <label for="" class="form-label fw-semibold mb-0 mt-1">Id khách hàng áp dụng</label>
                </div>
                <div class="col-9">
                  <input type="text" name="id_user" class="form-control" placeholder="Nhập id khách hàng áp dụng">
                  
                </div>
              </div>
              <div class="row my-2">
                <div class="col-3">
                  <label for="" class="form-label fw-semibold mb-0 mt-1">Số lượng</label>
                </div>
                <div class="col-9">
                  <input type="text" name="quantity" class="form-control" placeholder="Nhập số lượng"> 
                  
                </div>
              </div>
              
          
              <div class="d-flex justify-content-end mb-5 mt-4">
                <a href="/admin/voucher">
                  <button type="button" class="btn btn-outline-primary btn-cancel-admin me-3" data-bs-dismiss="modal">Hủy</button>
                </a>
                
                  <button type="submit" class="btn bg-secondary text-light btn-add-admin" id="saveButton">Thêm</button>
              
              </div>
  
      </form>
    </div>
  </div>
@endsection