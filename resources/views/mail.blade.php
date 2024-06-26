<html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <script src="https://kit.fontawesome.com/945522403a.js" crossorigin="anonymous"></script>
            <style>
                body {
                    font-family: Arial, sans-serif;
                }
        
                .container {
                    max-width: 600px;
                    margin: 0 auto;
                }
        
                .container>img{
                    display: block;
                    margin: 0 auto;
                    color: black;
                    width: 100px;
                }
        
                p {
    
                    text-align: center;
                }
        
                table {
                    width: 100%;
                    border-collapse: collapse;
                    margin: 20px 0;
                }
    
                th{
                    background-color: #1C5B41;
                    color: #fff;
                }
                
        
                th, td {
                    border: 1px solid #1C5B41;
                    text-align: left;
                    padding: 8px;
                }
                .title{
                    text-align:center;
                    font-size:18px;
                    color: #1C5B41; 
                }
                .td-trong{
                    border:none;
                }
    
                .icon{
                    margin: 10px 0;
                    text-align: center;
                }
    
                .icon>i{
                    padding: 3px;
                    color: #1C5B41;
                }
    
                #code{
                    width: 80px;
                    margin: 50px auto;
                    padding: 10px 20px;
                    border: 3px solid #dddddd;
                    border-radius: 5px;
                    text-align: center;
                    font-weight: bold;
                    font-size: 28px;
                    color: #1C5B41;
    
                }
                h2{
                    text-align: center;
                    color: #1C5B41;
                }
                td{
                    width:50%;
                }
        
            </style>
        </head>
        <body>
            
            <div class="container">
                <br>
                <hr>
                
                <h2>Xác nhận đổi mật khẩu!</h2>
                
                
                <div id="code">
                    {{ $token }}
                </div>
                <p class="text">Vui lòng nhập mã này để xác nhận. Mã chỉ có tác dụng trong 60 giây </p>

                Trân trọng, <strong>Alena</strong>
                <hr>
    
                Alena Shop <br>
            Website: https://alena.online/ <br>
            Địa chỉ: Tầng 12, tòa T, Công viên phần mềm Quang Trung <br>
            Email: alenashopvn@gmail.com <br>
            Hotline: 19006789 <br>
            </div>
        </body>
        </html>