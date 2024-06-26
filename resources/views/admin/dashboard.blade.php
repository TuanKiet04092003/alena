@extends('admin.layout')
@section('homeadmin','page-admin-current')
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
    <div class="row my-3 p-0">
      <div class="col-lg-3 col-md-6 col-sm-12 card-admin p-0">
        <div class="d-flex justify-content-center align-items-center rounded-2 shadow-sm  gap-4 py-3 mx-2"
          style="background-color: rgb(250, 255, 185);">
          <i class="fa-solid fa-eye text-warning fs-1"></i>
          <div>
            <p class="mb-1 fs-6 fw-semibold">Đã bán</p>
            <p class="mb-0 fs-4 fw-bold">{{ number_format($totalSold, 0, '.', ',') }}</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-12 card-admin p-0">
        <div class="d-flex justify-content-center align-items-center rounded-2 shadow-sm  gap-4 py-3 mx-2"
          style="background-color: rgb(252, 216, 216);">
          <i class="fa-solid fa-shirt text-danger fs-1"></i>
          <div>
            <p class="mb-1 fs-6 fw-semibold">Doanh thu</p>
            <p class="mb-0 fs-4 fw-bold">{{ number_format($totalIncome, 0, '.', ',') }}</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-12 card-admin p-0">
        <div class="d-flex justify-content-center align-items-center rounded-2 shadow-sm  gap-4 py-3 mx-2"
          style="background-color: rgb(188, 209, 255);">
          <i class="fa-solid fa-border-all fs-1" style="color: blue;"></i>
          <div>
            <p class="mb-1 fs-6 fw-semibold">Đơn hàng</p>
            <p class="mb-0 fs-4 fw-bold">{{ number_format($totalOrders, 0, '.', ',') }}</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-12 card-admin p-0">
        <div class="d-flex justify-content-center align-items-center rounded-2 shadow-sm  gap-4 py-3 mx-2"
          style="background-color: rgb(192, 244, 216);">
          <i class="fa-solid fa-users text-secondary fs-1"></i>
          <div>
            <p class="mb-1 fs-6 fw-semibold">Khách hàng</p>
            <p class="mb-0 fs-4 fw-bold">{{ number_format($totalUsers, 0, '.', ',') }}</p>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6 col-12">
        <h3>Thống kê sản phẩm</h3>
        <div>
          <canvas id="myChart"></canvas>
        </div>
  
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  
        <script>
          const ctx = document.getElementById('myChart');
  
          new Chart(ctx, {
            type: 'bar',
            data: {
              labels: ['Quần áo', 'Phụ kiện', 'Giày dép', 'Đồ bé nam', 'Đồ bé nữ'],
              datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2],
                borderWidth: 1
              }]
            },
            options: {
              scales: {
                y: {
                  beginAtZero: true
                }
              }
            }
          });
        </script>
      </div>
      <div class="col-lg-6 col-md-12">
        <h3>Thông kê doanh thu</h3>
        <div id="donutchart" style="width: 700px; height: 400px;"></div>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
          google.charts.load("current", {packages:["corechart"]});
          google.charts.setOnLoadCallback(drawChart);
          function drawChart() {
            var data = google.visualization.arrayToDataTable([
              ['Task', 'Triệu đồng'],
              ['Quần áo',     11],
              ['Phụ kiện',      2],
              ['Giày dép',  2],
              ['Đồ bé nam', 2],
              ['Đồ bé nữ',    7]
            ]);

            var options = {
            
              pieHole: 0.4,
            };

            var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
            chart.draw(data, options);
          }
        </script>
      </div>
    </div>

  </div>
@endsection