@extends('admin.layout')
@section('useradmin','page-admin-current')
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
        <h3>Cập nhật tài khoản</h3>
      </div>
  
      <form action="/admin/edituser" method="post"  enctype="multipart/form-data">
        @csrf
              <div class="row my-2">
                <div class="col-3">
                  <label for="" class="form-label fw-semibold mb-0 mt-1">Tên đăng nhập</label>
                </div>
                <div class="col-9">
                  <input type="text" name="user" class="form-control" placeholder="Nhập tên đăng nhập" value="{{ $user->username }}">
                  
                </div>
              </div>
              <div class="row my-2">
                <div class="col-3">
                  <label for="" class="form-label fw-semibold mb-0 mt-1">Đổi mật khẩu</label>
                </div>
                <div class="col-9">
                  <input type="text" name="pass" class="form-control" placeholder="Nhập mật khẩu mới"  value="">
              
                </div>
              </div>
              <div class="row my-2">
                <div class="col-3">
                  <label for="" class="form-label fw-semibold mb-0 mt-1">Họ và tên</label>
                </div>
                <div class="col-9">
                  <input type="text" name="name" class="form-control" placeholder="Nhập họ và tên" value="{{ $user->name }}">
                </div>
              </div>
              <div class="row my-2">
                <div class="col-3">
                  <label for="" class="form-label fw-semibold mb-0 mt-1">Email</label>
                </div>
                <div class="col-9">
                  <input type="text" name="email" class="form-control" placeholder="Nhập email"  value="{{ $user->email }}">
                  
                </div>
              </div>
              <div class="row my-2">
                <div class="col-3">
                  <label for="" class="form-label fw-semibold mb-0 mt-1">Số điện thoại</label>
                </div>
                <div class="col-9">
                  <input type="text" nmae="phone" class="form-control" placeholder="Nhập số điện thoại" value="{{ $user->phone }}" >
                 
                </div>
              </div>
              <div class="row my-2">
                <div class="col-3">
                  <label for="" class="form-label fw-semibold mb-0 mt-1">Giới tính</label>
                </div>
                <div class="col-9">
                  <select name="gender" id="" class="form-select">
                    <option  {{ $user->gender==1 ? 'selected' : '' }} value="1">Nam</option>
                    <option {{ $user->gender==2 ? 'selected' : '' }} value="2">Nữ</option>
                    <option {{ $user->gender==3 ? 'selected' : '' }} value="3">Khác</option>
                  </select>
                </div>
              </div>
              <div class="row my-2">
                <div class="col-3">
                  <label for="" class="form-label fw-semibold mb-0 mt-1">Ngày sinh</label>
                </div>
                <div class="col-9">
                  <input type="date" nmae="birthday" class="form-control" placeholder="Nhập ngày sinh"  value="{{ $user->birthday }}">
                </div>
              </div>
              <div class="row my-2">
                <div class="col-3">
                  <label for="" class="form-label fw-semibold mb-0 mt-1">Địa chỉ</label>
                </div>
                <div class="col-9">
                  <input type="text" nmae="address" class="form-control" placeholder="Nhập địa chỉ" value="{{ $user->address }}">
                </div>
              </div>
              <div class="row my-2">
                <div class="col-3">
                  <label for="" class="form-label fw-semibold mb-0 mt-1">Vai trò</label>
                </div>
                <div class="col-9">
                  <select name="role" id="" class="form-select">
                    <option  {{ $user->role==0 ? 'selected' : '' }} value="0">Khách hàng</option>
                    <option  {{ $user->role==1 ? 'selected' : '' }} value="1">Quản trị viên</option>
                  </select>
                </div>
              </div>
              <div class="row my-2">
                <div class="col-3">
                  <label for="" class="form-label fw-semibold mb-0 mt-1">Hình ảnh</label>
                </div>
                <div class="col-9" id="chooseAvatar">
                  <input type="file" name="image" class="form-control" placeholder="Chọn hình ảnh" onchange="previewImage(event)">
                  @if ($user->image)
                      <div class="image-container">
                        <img id="imagePreview" src="{{ asset($user->image) }}" />
                        <button class="remove-btn" onclick="deleteAvatar(event)">&times;</button>
                      </div>
                  @endif
                </div>
                <input type="hidden" id="avatarOld" name="avatarOld" value="{{ '1'.$user->image }}">
                <input type="hidden" name="id" value="{{ $user->id }}">
              </div>
              <div class="row my-2">
                <div class="col-3">
                  <label for="" class="form-label fw-semibold mb-0 mt-1">Kích hoạt</label>
                </div>
                <div class="col-9">
                  <select name="active" id="" class="form-select">
                    <option {{ $user->active==1 ? 'selected' : '' }} value="1">Kích hoạt</option>
                    <option {{ $user->active==0 ? 'selected' : '' }} value="0">Bị khóa</option>
                  </select>
                </div>
              </div>
          
              <div class="d-flex justify-content-end mb-5 mt-4">
                <a href="/admin/user">
                  <button type="button" class="btn btn-outline-primary btn-cancel-admin me-3" data-bs-dismiss="modal">Hủy</button>
                </a>
                
                  <button type="submit" class="btn bg-secondary text-light btn-add-admin" id="saveButton">Cập nhật</button>
              
              </div>
  
      </form>
    </div>
  </div>
@endsection