@extends('admin.layout')
@section('catalogadmin','page-admin-current')
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
        <h3>Thêm danh mục</h3>
      </div>
  
      <form action="/admin/addcategory" method="post">
        @csrf
              <div class="row my-2">
                <div class="col-3">
                  <label for="" class="form-label fw-semibold mb-0 mt-1">Tên danh mục</label>
                </div>
                <div class="col-9">
                  <input type="text" name="name" class="form-control" placeholder="Nhập tên danh mục">
                  
                </div>
              </div>
              <div class="row my-2">
                <div class="col-3">
                  <label for="" class="form-label fw-semibold mb-0 mt-1">Thứ tự xuất hiện</label>
                </div>
                <div class="col-9">
                  <input type="text" name="stt" class="form-control" placeholder="Nhập thứ tự xuất hiện">
                  
                </div>
              </div>
              
              <div class="row my-2">
                <div class="col-3">
                  <label for="" class="form-label fw-semibold mb-0 mt-1">Xuất hiện ở trang chủ</label>
                </div>
                <div class="col-9">
                  <select name="sethome" id="" class="form-select">
                    <option selected value="0">Không xuất hiện</option>
                    <option value="1">Xuất hiện</option>
                  </select>
                </div>
              </div>
              <div class="row my-2">
                <div class="col-3">
                  <label for="" class="form-label fw-semibold mb-0 mt-1">Danh mục cha</label>
                </div>
                <div class="col-9">
                  <select name="id_parent" id="" class="form-select">
                    <option selected value="0">Không thuộc danh mục nào</option>
                    @foreach ($categories as $item)
                      <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
          
              <div class="d-flex justify-content-end mb-5 mt-4">
                <a href="/admin/catalog">
                  <button type="button" class="btn btn-outline-primary btn-cancel-admin me-3" data-bs-dismiss="modal">Hủy</button>
                </a>
                
                  <button type="submit" class="btn bg-secondary text-light btn-add-admin" id="saveButton">Thêm</button>
              
              </div>
  
      </form>
    </div>
  </div>
@endsection