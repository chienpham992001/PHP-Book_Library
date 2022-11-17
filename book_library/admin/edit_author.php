<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sửa thông tin tác giả</title>
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
</head>
<body>
	<div class="wrapper">
      <!-- Preloader-->
      <!--div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="dist/img/logo.png" alt="Logo" height="60" width="60">
      </div-->
    <?php include "include/header.php"; ?>
    <?php
          require 'config.php';
            $id=$_GET['id'];
          $query=mysqli_query($conn,"SELECT * FROM author WHERE author_id ='$id'");
          
          $row=mysqli_fetch_assoc($query);
          ?>
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Chỉnh sửa thông tin tác giả</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"></a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
      <div class="container"> 
		    <form method="POST" class="form-group" enctype="multipart/form-data">
          <label class="mt-3">Tên tác giả</label>
          <input class="form-control ms-5" name="authname" value="<?php echo $row['author_name']; ?>">

          <label class="mt-3">Mô tả</label>
          <input class="form-control ms-5" value="<?php echo $row['description']; ?>" name="mota">

          <input type="submit" class="btn btn-small btn-primary mt-3" name="update_auth" value="Sửa">
			</form>
		</div>
    <?php
          if (isset($_POST['update_auth'])){
            if(isset($_POST['authname'])) { $name=$_POST['authname']; }
            if(isset($_POST['mota'])) { $mt=$_POST['mota']; }
            
            $tg = date('Y-m-d');
            
            $sql = "UPDATE author SET author_name='$name', description = '$mt', update_time='$tg' WHERE author_id='$id'";
            if (mysqli_query($conn, $sql)) {
              echo '<script>alert("Sửa tác giả thành công\nMời bạn quay lại trang quản lý để xem chi tiết")</script>';
            }
          }
        ?>
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