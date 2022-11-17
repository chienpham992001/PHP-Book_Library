<?php 
  require 'config.php';
  $query = "SELECT DISTINCT borrow_date AS 'Ngày', COUNT(borrow_id) AS 'Số lượt mượn' FROM book_borrow WHERE status = 'Đang mượn' GROUP BY borrow_date";
  $result = mysqli_query($conn, $query);
  $data = [];
  while($row = mysqli_fetch_array($result)){
    $data[]= $row;
  }

  $query1 = "SELECT DISTINCT back_date AS 'Ngày', COUNT(return_id) AS 'Số lượt trả' FROM book_return WHERE status = 'Đã trả' GROUP BY return_date";
      $result1 = mysqli_query($conn, $query1);
      $data1 = [];
      while($row1 = mysqli_fetch_array($result1)){
        $data1[]= $row1;
      }

 ?>


<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thống kê mượn trả</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap 
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css"-->
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);
      google.charts.setOnLoadCallback(drawChart1);


      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Ngày', 'Số lượt mượn'],
          <?php 
            foreach ($data as $key) {
              echo "['".$key['Ngày']."', ".$key['Số lượt mượn']."],";
            }
           ?>
        ]);

        var options = {
          chart: {
            title: 'Thống kê lượt mượn theo ngày',
            subtitle: 'Sales, Expenses: 2014-2017',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));      
      }


      function drawChart1() {
        var data1 = google.visualization.arrayToDataTable([
          ['Ngày', 'Số lượt trả'],
          <?php 
            foreach ($data1 as $key) {
              echo "['".$key['Ngày']."', ".$key['Số lượt trả']."],";
            }
           ?>
        ]);

        var options = {
          chart: {
            title: 'Thống kê lượt trả theo ngày',
            subtitle: 'Sales, Expenses: 2014-2017',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material1'));

        chart.draw(data1, google.charts.Bar.convertOptions(options));      
      }
    </script>
  </head>
  <body>
  	
    <div class="wrapper">
      
      <?php include "include/header.php"; ?>
      <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Thống kế số lượng lượt mượn - trả</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"></a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content mb-2">
       <div class="row mt-5">
        <div class="col-6">
        <table class="table" style="width: 550px;">
          <thead>
                <tr>
                  <th>STT</th>
                  <th>Ngày</th>
                  <th>Số lượt mượn</th>
                </tr>
            </thead>
            <tbody>
              <?php 
                $q = "SELECT DISTINCT borrow_date, COUNT(borrow_id) AS 'sl' FROM book_borrow WHERE status = 'Đang mượn' GROUP BY borrow_date";
                $i = 1;
                $rs = mysqli_query($conn, $q);
                while($r = mysqli_fetch_array($rs)){
               ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $r['borrow_date']; ?></td>
                <td><?php echo $r['sl']; ?></td>           
            </tr>
              <?php } ?>
            </tbody>
        </table>
      </div>
      <div id="columnchart_material" class="col-6 ms-5" style="width: 550px; height: 250px;"></div>
    </div>
    <div class="row mt-5">
        <div class="col-6">
        <table class="table" style="width: 550px;">
          <thead>
                <tr>
                  <th>STT</th>
                  <th>Ngày</th>
                  <th>Số lượt trả</th>
                </tr>
            </thead>
            <tbody>
              <?php 
                $q = "SELECT DISTINCT back_date , COUNT(return_id) AS 'sl' FROM book_return WHERE status = 'Đã trả' GROUP BY return_date";
                $i = 1;
                $rs = mysqli_query($conn, $q);
                while($r = mysqli_fetch_array($rs)){
               ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $r['back_date']; ?></td>
                <td><?php echo $r['sl']; ?></td>           
            </tr>
              <?php } ?>
            </tbody>
        </table>
      </div>
         <div id="columnchart_material1" class="col-6 ms-5" style="width: 550px; height: 300px;"></div>
    </div>
    </section>
    
</div>


<?php include 'include/footer.php'; ?>
<script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

    <script src="dist/js/adminlte.js"></script>
  </body>
</html>

