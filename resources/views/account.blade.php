@extends('layout')
@section('title', 'KShop | Tài khoản')
@section('homepage')
<div class="current-page d-none d-lg-block"></div>
@endsection
@section('homeheader')
@section('content')
<section>
    <div class="container">
        <div class="row my-5">
            <div class="col-lg-3 col-sm-12">
                <ul id="myTab" role="tablist" class="d-flex flex-lg-column flex-sm-row">
                    <li class="nav-item mb-1" role="presentation">
                        <a class="nav-link  {{ $vieworder==0?'active':'' }}  fw-semibold rounded-2 me-2 p-2  {{ $vieworder==0?'page-admin-current':'page-link-admin' }} tabaccount" rounded-2 me-2 p-2 tabaccount"
                            id="capnhat-tab" data-bs-toggle="tab" data-bs-target="#capnhat-tab-pane" type="button"
                            role="tab" aria-controls="capnhat-tab-pane" aria-selected=" {{ $vieworder==0?'true':'false' }}"><i
                                class="fa-solid fa-pen-to-square text-secondary me-2"></i>Cập nhật hồ sơ</a>
                    </li>

                    <li class="nav-item mb-1" role="presentation">
                        <a class="nav-link  {{ $vieworder==1?'active':'' }} fw-semibold rounded-2 me-2 p-2 {{ $vieworder==1?'page-admin-current':'page-link-admin' }}  tabaccount" id="danhsach-tab"
                            data-bs-toggle="tab" data-bs-target="#danhsach-tab-pane" type="button" role="tab"
                            aria-controls="danhsach-tab-pane"  aria-selected=" {{ $vieworder==0?'false':'true' }}"><i
                                class="fa-solid fa-table-list  text-secondary me-2"></i>Đơn hàng</a>
                    </li>
                    <li class="nav-item mb-1" role="presentation">
                        <a class="nav-link fw-semibold rounded-2 me-2 p-2 page-link-admin " type="button" role="tab"
                            aria-selected="false" href="/logout"><i
                                class="fa-solid fa-right-from-bracket text-secondary me-2"></i>Đăng suất</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-9 col-sm-12">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade {{ $vieworder==0?' show active':'' }}" id="capnhat-tab-pane" role="tabpanel"
                        aria-labelledby="capnhat-tab" tabindex="0">
                        <h3 class="text-secondary mb-4">Cập nhật tài khoản</h3>
                        <form action="/updateaccount" method="post" enctype="multipart/form-data">
                            @csrf
                                <div class="row">
                                
                                    <div class="col-lg-8 col-12">
                                    
                                            <label class="form-label fw-semibold">Email</label>
                                            <input type="email" placeholder="Email" class="form-control mb-4" name="email" value="{{ Auth::user()->email }}">
                                            <label class="form-label fw-semibold">Tên tài khoản</label>
                                            <input type="text" placeholder="Tên tài khoản" class="form-control mb-4" name="username" value="{{ Auth::user()->username }}">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label class="form-label fw-semibold">Họ và tên</label>
                                                    <input type="text" placeholder="Họ và tên"
                                                        class="form-control mb-4"  name="name" value="{{ Auth::user()->name }}">
                                                </div>
                                                <div class="col-6">
                                                    <label class="form-label fw-semibold">Số điện thoại</label>
                                                    <input type="text" placeholder="Số điện thoại"
                                                        class="form-control mb-4" name="phone" value="{{ Auth::user()->phone }}">
                                                </div>
                                            </div>
                                            <label class="form-label fw-semibold">Địa chỉ</label>
                                            <input type="text" placeholder="Địa chỉ" class="form-control mb-4" name="address" value="{{ Auth::user()->address }}">

                                            <button
                                                class="btn-buynow-detail btn btn-lg border-0 text-light fw-semibold bg-secondary"
                                                style="width: 150px;">Cập nhật</button>
                                        </form>
                                    </div>
                                    <div class="col-lg-4 col-12 d-flex flex-column justify-content-center" id="chooseAvatar">
                                        @if (Auth::user()->image)
                                            <div class="image-container-account">
                                                <img src="{{ asset(Auth::user()->image) }}" class="w-100 mb-4" id="imagePreview" alt="">
                                                <button class="remove-btn-account" onclick="deleteAvatar(event)">&times;</button>
                                            </div>
                                        @endif
                                        
                                        <input type="file" onchange="previewImage(event)" name="avatar" id="file-input" class="form-control" accept="image/*">
                                        
                                    </div>
                                    <input type="hidden" name="avatarOld" id="avatarOld" value="1{{ Auth::user()->image }}">
                                   
                                    <script>
                                        function previewImage(event) {
                                        if(document.getElementsByClassName('image-container-account')[0]){
                                            document.getElementsByClassName('image-container-account')[0].remove();
                                        }
                                        var input = event.target;
                                        var reader = new FileReader();

                                        reader.onload = function() {
                                            const imgContainer = document.createElement('div');
                                                imgContainer.className = 'image-container-account';
                                                imgContainer.innerHTML=`<img id="imagePreview" />`;
                                                var chooseAvatar=document.getElementById('chooseAvatar');
                                                chooseAvatar.insertBefore(imgContainer, input);
                                                var imagePreview=document.getElementById('imagePreview');
                                                var dataURL = reader.result;
                                            
                                                imagePreview.src = dataURL;
                                                imgContainer.style.height=imagePreview.style.height;
                                                imgContainer.style.width=imagePreview.style.width;
                                                console.log(imgContainer.style.width);
                                                console.log(imagePreview.style.width);
                                                const removeBtn = document.createElement('button');
                                                removeBtn.innerHTML = '&times;';
                                                removeBtn.className = 'remove-btn-account';
                                                removeBtn.addEventListener('click', (e) => {
                                                    e.preventDefault();
                                                    imgContainer.remove();
                                                    if(document.getElementById('avatarOld')){
                                                    document.getElementById('avatarOld').value='0'+document.getElementById('avatarOld').value.slice(1);
                                                    console.log(document.getElementById('avatarOld').value);
                                                    }
                                                chooseAvatar.innerHTML=`<input type="file" class="form-control" 
                                                placeholder="Chọn hình ảnh" onchange="previewImage(event)">`;
                                                });
                                                imgContainer.appendChild(removeBtn);
                                            
                                        };

                                        if (input.files && input.files[0]) {
                                            reader.readAsDataURL(input.files[0]);
                                        }
                                        }
                                    </script>
                                </div>
                            </form>
                    </div>
                    <div class="tab-pane fade{{ $vieworder==1?' show active':'' }}"" id="danhsach-tab-pane" role="tabpanel" aria-labelledby="danhsach-tab"
                        tabindex="0">
                        <div class="p-0 m-0 {{ $vieworderdetail==1 ? 'd-none':'' }}">
                            <h3 class="text-secondary mb-4">Đơn hàng</h3>
                            <table class="table table-bordered text-center" style="font-size: 14px;">
                                <thead>
                                    <tr>
                                        <th class="text-start">Id</th>
                                        <th>Người đặt</th>
                                        <th>Email đặt</th>
                                        <th>Địa chỉ đặt</th>
                                        <th>Ngày đặt</th>
                                        <th>Trạng thái</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $item)
                                    <tr class="align-middle">
                                        <td>
                                            {{ $item->id }}
                                        </td>
                                        <td>{{ $item->name_order }}</td>
                                        <td>
                                            {{ $item->email_order }}
                                        </td>
                                        <td>
                                            {{ $item->address_order }}
                                        </td>
                                        <td>
                                            {{ $item->date_created }}
                                        </td>
                                        
                                            @switch($item->status)
                                                @case('Chờ thanh toán')
                                                    <td>
                                                    <span class="badge text-bg-warning">{{ $item->status }}</span>
                                                    </td>
                                                    @break
                                                @case('Đã hủy')
                                                    <td>
                                                    <span class="badge text-bg-danger">{{ $item->status }}</span>
                                                    </td>
                                                    @break
                                                @default
                                                    
                                            @endswitch
                                    
                                        <td>
                                            <a href="/orderdetail/{{ $item->id }}"><i  class="fa-solid fa-eye text-info me-2"></i></a>
                                            |
                                            <a href="/cancelorder/{{ $item->id }}"><i class="fa-solid fa-trash-can text-danger mx-2"></i></a>
                                            |
                                            <a href="/reorder/{{ $item->id }}"><i class="fa-solid fa-rotate-left text-warning ms-2"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div  class="{{ $vieworderdetail==0?'d-none':'' }}">
                            <h3 class="text-secondary mb-4">Đơn hàng chi tiết</h3>
                            @if (isset($order->code_order))
                                <div class="row company-info mb-3">
                                    <h2 class="col-12">Thông Tin Đơn hàng</h2>
                                    <p class="col-6">Mã đơn hàng: <span style="font-weight: bold;">{{ $order->code_order }}</span></p>
                                    <p class="col-6">Ngày đặt: {{ $order->date_created }}</p>
                                    <p class="col-6">Phương thức thanh toán: {{ $order->method_payment }}</p>
                                    <p class="col-6">Trạng thái: {{ $order->status }}</p>
                                </div>
                        
                                <!-- Customer and Receiver Information Section -->
                                <div class="mb-3">
                                    <!-- Customer Information -->
                                    <div class="row company-info">
                                        <h2  class="col-12">Thông Tin Người Đặt</h2>
                                        <p class="col-6">Tên: {{ $order->name_order }}</p>
                                        <p class="col-6">Địa Chỉ: {{ $order->address_order }}</p>
                                        <p class="col-6">Điện Thoại:  {{ $order->phone_order }} </p>
                                        <p class="col-6">Email: {{ $order->email_order }}</p>
                                    </div>
                        
                                    <!-- Receiver Information -->
                                    <div class="row company-info">
                                        <h2  class="col-12">Thông Tin Người Nhận</h2>
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
                               
                                    <h2 class="fs-5 total-payment">Tổng Cộng: {{ number_format($order->total_payment, 0, ',', '.') }} đ</h2>
                             
                            @endif
                            <a href="/viewotherorder"><button
                                class="btn btn-primary text-light bg-secondary fw-medium border-0 btn-checkout">Xem đơn hàng khác</button></a>
                        </div>

    
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection