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
    <div class="d-flex justify-content-between my-4">
      <h3>Danh mục sản phẩm</h3>
      <a href="/admin/addformcategory">
        <button class="btn-buynow-detail btn border-0 text-light fw-semibold bg-secondary" 
       style="width: 150px;"><i class="fa-solid fa-plus me-2"></i>Thêm</button>
      </a>
    </div>

    


    <table class="table table-striped">
      <thead>
        <tr>
          <th>Stt</th>
          <th>Tên danh mục</th>
          <th>Thứ tự xuất hiện</th>
          <th>Hiện ở trang chủ</th>
          <th>Danh mục cha</th>
          <th>Thao tác</th>
        </tr>
      </thead>
      <tbody>
        @for ($i = 0; $i < count($categories); $i++)
        <tr class="align-middle">
          <td>{{ $i+1 }}</td>
          <td>{{ $categories[$i]->name }}</td>
          <td>{{ $categories[$i]->stt }}</td>
          <td>{{ $categories[$i]->sethome==0?'Không xuất hiện':'Xuất hiện' }}</td>
          <td>{{ $categories[$i]->getCategoryParentOfId($categories[$i]->id_parent)->name }}</td>
          <td>
            <a href="/admin/editformcategory/{{ $categories[$i]->id }}">
              <i class="fa-solid fa-pen-to-square text-info me-2"></i>
            </a>
            |
            <a href="/admin/deletecategory/{{ $categories[$i]->id }}">
              <i class="fa-solid fa-trash-can text-danger ms-2"></i>
            </a>
          </td>
        </tr>
        @endfor
        
      </tbody>
    </table>
    <nav aria-label="Page navigation example">
      <ul class="pagination d-flex justify-content-center mb-5 mt-4">
          <li class="page-item"><a class="page-link text-secondary" href="#"><i
                      class="fa-solid fa-arrow-left"></i></a></li>
          <li class="page-item"><a class="page-link text-secondary" href="#">1</a></li>
          <li class="page-item"><a class="page-link text-secondary" href="#">2</a></li>
          <li class="page-item"><a class="page-link text-secondary" href="#">3</a></li>
          <li class="page-item"><a class="page-link text-secondary" href="#"><i
                      class="fa-solid fa-arrow-right"></i></a></li>
      </ul>
  </nav>
  </div>
@endsection