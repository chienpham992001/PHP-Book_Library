<?php 
  require 'config.php';
  $query = "SELECT DISTINCT book.book_id, book.book_name, book.total_qty, COUNT(book_borrow.borrow_id) AS 'number_book' FROM book_borrow INNER JOIN book ON book_borrow.book_id = book.book_id WHERE status = 'Đang mượn' GROUP BY book_borrow.book_id ";
  $result = mysqli_query($conn, $query);
  $data = [];
  while($row= mysqli_fetch_array($result)){
    $data[] = $row; 
  }

 ?>

<html>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thống kê ngành</title>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['book_name', 'number_book'],
          <?php 
            foreach ($data as $key) {
              echo "['".$key['book_name']."', ".$key['number_book']. "],";
            }
           ?>
        ]);

        var options = {
          title: 'Biểu đồ biểu diễn số lượng sách đang mượn',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
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
            <h1 class="m-0">Thống kế số lượng sách đang mượn</h1>
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
        <div class="row">
      <div class="col-6">
        <table class="table">
          <thead>
                <tr>
                  <th>Mã sách</th>
                  <th>Tên sách</th>
                  <th>Số lượt mượn</th>
                </tr>
            </thead>
            <tbody>
              <?php 
                $q = "SELECT DISTINCT book.book_id, book.book_name, book.total_qty, COUNT(book_borrow.borrow_id) AS 'number_book' FROM book_borrow INNER JOIN book ON book_borrow.book_id = book.book_id WHERE status = 'Đang mượn' GROUP BY book_borrow.book_id";
                $rs = mysqli_query($conn, $q);
                while($r = mysqli_fetch_array($rs)){
               ?>
            <tr>
                <td><?php echo $r['book_id']; ?></td>
                <td><?php echo $r['book_name']; ?></td>
                <td><?php echo $r['number_book']; ?></td>           
            </tr>
              <?php } ?>
            </tbody>
        </table>
      </div>
      <div id="piechart_3d" style="width: 630px; height: 500px;"class="col-6 bg-smoke" ></div>
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
    