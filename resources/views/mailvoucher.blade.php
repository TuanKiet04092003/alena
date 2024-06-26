<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tặng Voucher</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #1C5B41;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
        }
        .content {
            padding: 20px;
            color: #333333;
        }
        .content h2 {
            color: #1C5B41;
        }
        .content p {
            line-height: 1.6;
        }
        .voucher {
            display: block;
            width: 50%;
            margin: 20px auto;
            padding: 15px;
            border: 2px dashed#1C5B41;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            color: #1C5B41;
            background-color: #f9f9f9;
        }
        .footer {
            background-color: #f4f4f4;
            color: #777777;
            padding: 20px;
            text-align: center;
            font-size: 0.9em;
        }
        .footer a {
            color: #1C5B41;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Mã giảm giá giành cho bạn!</h1>
        </div>
        <div class="content">
            <p>Cảm ơn quý khách đã mua hàng tại cửa hàng của chúng tôi</p>
            <div class="voucher">{{ $code_voucher }}</div>
            <p>Mã giảm giá 10% với các đơn hàng từ 500,000đ trở lên</p>
            <p>Cảm ơn bạn đã tin tưởng và sử dụng dịch vụ của chúng tôi.</p>
        </div>
        <div class="footer">
            <p>Trân trọng,<br>Đội ngũ của chúng tôi</p>
        </div>
    </div>
</body>
</html>
