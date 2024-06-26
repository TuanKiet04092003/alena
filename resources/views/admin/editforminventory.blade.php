@extends('admin.layout')
@section('inventoryadmin','page-admin-current')
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
        <h3>Cập nhật số lượng tồn kho</h3>
      </div>
      <div class="mt-4 mb-2">
        Mã sản phẩm: <span class="fw-bold">{{ $product->code_product }}</span>
      </div>
      <div class="mb-4">
        Tên sản phẩm: <span class="fw-bold">{{ $product->name }}</span>
      </div>
      <form action="/admin/editinventory" method="post">
        @csrf
              <input type="hidden" name="id_product" value="{{ $product->id }}">
              <table class="table">
                <thead>
                  <tr>
                    <th></th>
                    @foreach ($sizes as $item)
                        <th>{{ $item->code_size }}</th>
                    @endforeach
                  </tr>
                </thead>
                <tbody>
                  @foreach ($imageColors as $item)
                    <tr class="align-middle">
                      <td class="fw-bold">{{ $color->getColorById($item->id_color)->color }}</td>
                      @foreach ($sizes as $item2)
                          <td>
                            <input type="text" class="form-control"  name="inventory{{ $item->id_color.$item2->id }}"
                             value="{{ $product->getIdInventory($product->id, $item->id_color, $item2->id)->quantity }}">
                          </td>
                      @endforeach
                    </tr>
                  @endforeach
                </tbody>
              </table>
              
          
              <div class="d-flex justify-content-end mb-5 mt-4">
                <a href="/admin/inventory">
                  <button type="button" class="btn btn-outline-primary btn-cancel-admin me-3" data-bs-dismiss="modal">Hủy</button>
                </a>
                
                  <button type="submit" class="btn bg-secondary text-light btn-add-admin" id="saveButton">Cập nhật</button>
              
              </div>
  
      </form>
    </div>
  </div>
@endsection