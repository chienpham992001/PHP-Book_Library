<!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <title>HaUI Library | Quản lý phiếu mượn</title>

  <!-- Google Font: Source Sans Pro -->
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <style type="text/css">
    .pagination {
        display: inline-block;
        margin-bottom: 10px;
        float: right;
    }

    .pagination a {

        font-weight:bold;

        font-size:14px;

        color: black;

        padding: 5px 9px;

        text-decoration: none;

        border:1px solid black;

    }

    .pagination a.active {

        background-color: gray;

    }

    .pagination a:hover:not(.active) {

        background-color: black;
        color: white;

    }
    #anh{
        width: 70px;
        height: 100px;
    }
  </style>

    </head>
    <body>
    <div class="wrapper">
      <!-- Preloader-->
      <!--div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="dist/img/logo.png" alt="Logo" height="60" width="60">
      </!--div-->
    <?php include "include/header.php"; 

        require 'config.php';
        $id = $_GET['id'];
        $query = mysqli_query($conn, "SELECT * FROM book_return INNER JOIN book ON book_return.book_id = book.book_id INNER JOIN user ON user.user_id = book_return.user_id WHERE oder_detail_id = '$id'");
        $q = mysqli_query($conn, "SELECT * FROM book_return INNER JOIN user on user.user_id = book_return.user_id WHERE oder_detail_id = '$id'");

    ?>

    <div class="content-wrapper" style="clear: both;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Chi tiết phiếu sách đã trả</h1>
          </div><!-- /.col -->

          <div class="col-sm-6">
            <div class="text-right">
                <button id='btn-print' class="btn btn-info">Xuất phiếu</button>
            </div>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section id="noidung" class="content" style="padding: 10px; font-size: 14px; margin-top: 10px;">
        <div class="container">
            
            <div class="information mb-5">
                <h1>Thông tin sách trả</h1>
            <?php 
                if($rw = mysqli_fetch_assoc($q)){
             ?>
                <table class="table">
                    <tr>
                        <td>Mã phiếu:</td>
                        <td><?php echo $rw['oder_detail_id']; ?></td>
                    </tr>
                    <tr>
                        <td>Mã sinh viên:</td>
                        <td><?php echo $rw['user_id']; ?></td>
                    </tr>
                    <tr>
                        <td>Họ và tên:</td>
                        <td><?php echo $rw['fullname']; ?></td>
                    </tr>
                    <tr>
                        <td>Lớp:</td>
                        <td><?php echo $rw['class']; ?></td>
                    </tr>
                    <tr>
                        <td>Số điện thoại:</td>
                        <td><?php echo $rw['phone']; ?></td>
                    </tr>
                </table>
                
            <?php } ?>
            </div>
            
          <table class="table table-bordered mt-3 .bg-light">
            <thead>
                <tr>
                  <th style="width:5%">STT</th>
                  <th>Tên sách</th>
                  <th>Số lượng</th>
                  <th>Giá tiền (VNĐ)</th>
                  <th>Thành tiền</th>
                  <th>Hạn trả</th>
                  <th>Ngày trả</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $t = 0;
                $n = 0;
                while($row=mysqli_fetch_array($query)){
                   $n++;
                   $tong = $row['cost']*$row['qty']; 
                   $t += $tong;
                    
            ?>
            <tr>
                <td><?php echo $n ?></td>
                <td><?php echo $row['book_name'] ?></td>
                <td><?php echo $row['qty']; ?></td>
                <td><?php echo number_format($row['cost'],0,',','.') ?></td>
                <td><?php echo number_format($tong,0,',','.') ?></td>
                <td><?php echo $row['return_date']; ?></td>
                <td><?php echo $row['back_date']; ?></td>
                
            </tr>
            <?php 
            } ?>
            
            </tbody>
        </table>
        <h5 class="ml-3">Tổng tiền : <span class="user_infor"><?php echo number_format($t,0,',','.'). 'VNĐ' ?></span></h5>
    </div>
    
    </section>
    
</div>

    
    <?php include 'include/footer.php'; ?></div>
    <script type="text/javascript">
        let htmlpdf = document.getElementById("noidung");
        let exportpdf = document.getElementById("btn-print");
        exportpdf.onclick = (e) => html2pdf(htmlpdf);  
    </script>
     
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

    <script src="dist/js/adminlte.js"></script>
    </body>

    </html>
    
