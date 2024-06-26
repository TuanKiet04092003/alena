@extends('admin.layout')
@section('productadmin','page-admin-current')
@section('content')

<div class="col-lg-10 col-12 px-4">
    <div class="row mx-4 my-3">
      <div class="offset-lg-6 col-lg-6 col-md-12">
        <form class="d-flex" role="search">
          <input onkeyup="searchProduct(this)" class="form-control border-0 rounded-end-0 rounded-start-5 ps-4 shadow-sm" type="search"
            placeholder="Tìm kiếm sản phẩm bạn mong muốn" aria-label="Search" style="background-color: #F7F7F8;">
          <button class="btn btn-primary border-0 bg-primary rounded-end-5 rounded-start-0" type="submit"><i
              class="fa-solid fa-magnifying-glass text-light pe-2"></i></button>
        </form>
      </div>
    </div>
    <div class="d-flex justify-content-between my-4">
      <h3>Tất cả sản phẩm</h3>
      <a href="/admin/addformproduct">
        <button class="btn-buynow-detail btn border-0 text-light fw-semibold bg-secondary" 
       style="width: 150px;"><i class="fa-solid fa-plus me-2"></i>Thêm</button>
      </a>
    </div>


    <table class="table table-striped">
      <thead>
        <tr>
          <th>Stt</th>
          <th>Mã sản phẩm</th>
          <th>Hình ảnh</th>
          <th>Giá</th>
          <th>Giá cũ</th>
          <th>Tên</th>
          <th>Lượt xem</th>
          <th>Đã bán</th>
          <th>Thao tác</th>
        </tr>
      </thead>
      <tbody id="tableProducts">
        
        @for ($i = 0; $i < $limitPage; $i++)
        <tr class="align-middle">
          <td>{{ $i+1 }}</td>
          <td>{{ $products[$i]->code_product }}</td>
          <td><img src="{{ asset($products[$i]->getMainImage()[0]->image) }}" height="70px" alt=""></td>
          <td>{{ number_format($products[$i]->price, 0, ',', '.') }}</td>
          <td>{{ number_format($products[$i]->priceold, 0, ',', '.') }}</td>
          <td>{{ $products[$i]->name }}</td>
          <td>{{ $products[$i]->view }}</td>
          <td>{{ $products[$i]->sold }}</td>
          <td>
            @if ($products[$i]->hide==0)
              <a href="/admin/hideproduct/{{ $products[$i]->id }}">
                <i class="fa-solid fa-eye text-dark me-2"></i>
              </a>
            @else
              <a href="/admin/hideproduct/{{ $products[$i]->id }}">
                <i class="fa-solid fa-eye-slash text-dark me-2"></i>
              </a>
            @endif
            
            |
            <a href="/admin/editformproduct/{{ $products[$i]->id }}">
              <i class="fa-solid fa-pen-to-square text-info me-2"></i>
            </a>
            |
            <a href="/admin/deleteproduct/{{ $products[$i]->id }}">
              <i class="fa-solid fa-trash-can text-danger ms-2"></i>
            </a>
          </td>
        </tr>
        @endfor
       
      </tbody>
    </table>
    <nav aria-label="Page navigation example">
      <ul class="pagination d-flex justify-content-center mb-5">
          
          @if (ceil(count($products)/$limitPage)>1)
          {{-- <li class="page-item"><a class="page-link text-secondary" href="#"><i
              class="fa-solid fa-arrow-left"></i></a></li> --}}
              @for ($i = 0; $i < ceil(count($products)/$limitPage); $i++)
                  @if ($i==0)
                      <li onclick="changePage(this)" class="page-item"><a class="page-link text-light bg-secondary">{{ $i+1 }}</a></li>
                  @else
                      <li onclick="changePage(this)" class="page-item"><a class="page-link text-secondary">{{ $i+1 }}</a></li>
                  @endif
              @endfor
              {{-- <li class="page-item"><a class="page-link text-secondary" href="#"><i
                  class="fa-solid fa-arrow-right"></i></a></li> --}}
          @endif
          {{-- <li class="page-item"><a class="page-link bg-secondary text-light" href="#">1</a></li>
          <li class="page-item"><a class="page-link text-secondary" href="#">2</a></li>
          <li class="page-item"><a class="page-link text-secondary" href="#">3</a></li> --}}
          
      </ul>
  </nav>
  </div>
  <div id="myDataProducts" data-array='{{ $products }}'></div>
  <div id="myDataLimitPage" data-array='{{ $limitPage }}'></div>
  <div id="myDataImages" data-array='{{ $images }}'></div>
<script>
   var products = JSON.parse(document.getElementById('myDataProducts').getAttribute('data-array'));
    console.log(products); // ['apple', 'banana', 'orange']
    var limitPage = JSON.parse(document.getElementById('myDataLimitPage').getAttribute('data-array'));
    console.log(limitPage); // ['apple', 'banana', 'orange']
    var images = JSON.parse(document.getElementById('myDataImages').getAttribute('data-array'));
    console.log(images); // ['apple', 'banana', 'orange']
</script>
@endsection