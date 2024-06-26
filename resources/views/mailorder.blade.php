
    <!DOCTYPE html>
    <html lang="vi">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Hóa Đơn Đơn Hàng</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 20px;
                background-color: #f8f9fa;
            }
            .container {
                width: 80%;
                margin: auto;
                background-color: #ffffff;
                padding: 20px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
            .header {
                text-align: center;
                margin-bottom: 20px;
            }
            .header img {
                max-width: 150px;
            }
            .company-info, .customer-info, .receiver-info {
                margin-bottom: 20px;
            }
            .info-section {
                display: flex;
                justify-content: space-between;
            }
            .info-section div {
                width: 48%;
            }
            .info-section h2 {
                margin-top: 0;
            }
            .items-table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 20px;
            }
            .items-table th, .items-table td {
                border: 1px solid #ddd;
                padding: 10px;
                text-align: left;
            }
            .items-table th {
                background-color: #f4f4f4;
            }
            .total {
                text-align: right;
                font-size: 1.2em;
                margin-bottom: 20px;
            }
            .footer {
                text-align: center;
                color: #777;
            }
            .flex-parent{
                display: flex;
            }
            .flex-item-1{
                width: 50%;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <!-- Header Section -->
            <div class="header">
                <h1>Hóa Đơn Đơn Hàng</h1>
                {{-- <img src="logo.png" alt="Logo Công Ty"> --}}
            </div>
    
            <!-- Company Information Section -->
            <div class="company-info">
                <h2>Thông Tin Đơn hàng</h2>
                <div class="flex-parent">
                    <div class="flex-item-1">
                        <p>Mã đơn hàng: <span style="font-weight: bold;">{{ $order->code_order }}</span></p>
                        <p>Địa Chỉ: {{ $order->date_created }}</p>
                    </div>
                    <div>
                        <p>Phương thức thanh toán: {{ $order->method_payment }}</p>
                        <p>Trạng thái: {{ $order->status }}</p>
                    </div>
                </div>
            </div>
    
            <!-- Customer and Receiver Information Section -->
         
                <!-- Customer Information -->
                <div class="customer-info">
                    <h2>Thông Tin Người Đặt</h2>
                    <div class="flex-parent">
                        <div class="flex-item-1">
                            <p>Tên: {{ $order->name_order }}</p>
                            <p>Địa Chỉ: {{ $order->address_order }}</p>
                        </div>
                        <div>
                            <p>Điện Thoại:  {{ $order->phone_order }} </p>
                            <p>Email: {{ $order->email_order }}</p>
                        </div>
                    </div>
                    
                </div>
    
                <!-- Receiver Information -->
                <div class="receiver-info">
                    <h2>Thông Tin Người Nhận</h2>
                    <div class="flex-parent">
                        <div class="flex-item-1">
                            <p>Tên: {{ $order->name_receive }}</p>
                            <p>Địa Chỉ: {{ $order->address_receive }}</p>
                        </div>
                        <div>
                            <p>Điện Thoại: {{ $order->phone_receive }}</p>
                            <p>Email: {{ $order->email_receive }}</p>
                        </div>
                    </div>
                </div>
          
    
            <!-- Items Table Section -->
            <table class="items-table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Size</th>
                        <th>Màu sắc</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < count($orderdetail); $i++)
                        <tr>
                            <td>{{ $i+1 }}</td>
                            <td>{{ $productName[$i] }}</td>
                            <td>{{ $sizes[$i] }}</td>
                            <td>{{ $colors[$i] }}</td>
                            <td>{{ number_format($orderdetail[$i]->price, 0, ',', '.')}}</td>
                            <td>{{ $orderdetail[$i]->quantity}}</td>
                            <td>{{ number_format($orderdetail[$i]->price*$orderdetail[$i]->quantity, 0, ',', '.') }} VND</td>
                        </tr>
                    @endfor
                </tbody>
            </table>
    
            <!-- Total Section -->
            <div class="total">
                <h2>Tổng Cộng: {{ number_format($order->total_payment, 0, ',', '.') }} VND</h2>
            </div>
            <br>
            <br>
            <hr>
            <div class="receiver-info">
                <!-- <h2>Thông Tin Công Ty</h2> -->
                <p>Tên công ty: Alena Shop</p>
                <p>Địa chỉ: Tầng 12, tòa T, Công viên phần mềm Quang Trung</p>
                <p>Hotline: 19006789</p>
                <p>Email: alenashopvn@gmail.com</p>
                <p>Website: https://alena.online/</p>
            </div>
           
            <div class="footer">
                <p>Cảm ơn quý khách đã mua hàng!</p>
                <p>Nếu có bất kỳ thắc mắc nào về hóa đơn này, vui lòng liên hệ với chúng tôi tại contact@xyzcorporation.com</p>
            </div>
        </div>
    </body>
    </html>
    
    
