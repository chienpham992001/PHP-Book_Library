<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sửa thông tin bạn đọc</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
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
          $query=mysqli_query($conn,"SELECT * FROM user WHERE user_id ='$id'");
          
          $row=mysqli_fetch_assoc($query);
          ?>
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Chỉnh sửa thông tin bạn đọc</h1>
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
          <label class="mt-3">Mã sinh viên</label>
          <input class="form-control ms-5" value="<?php echo $row['user_id']; ?>" name="userid">

          <label class="mt-3">Họ và tên</label>
          <input class="form-control ms-5" value="<?php echo $row['fullname']; ?>" name="username">

          <label class="mt-3">Lớp</label>
          <input class="form-control ms-5" value="<?php echo $row['class']; ?>" name="lop">

          <label class="mt-3">Số điện thoại</label>
          <input class="form-control ms-5" value="<?php echo $row['phone']; ?>" name="sdt">

          <label class="mt-3">Email</label>
          <input class="form-control ms-5" value="<?php echo $row['email']; ?>" name="email">

          <input type="submit" class="btn btn-small btn-primary mt-3" name="update_user" value="Sửa">
      </form>
		</div>
    <?php
          if (isset($_POST['update_user'])){
            if(isset($_POST['userid'])) { $id=$_POST['userid']; }
            if(isset($_POST['username'])) { $name=$_POST['username']; }
            if(isset($_POST['lop'])) { $lop=$_POST['lop']; }
            if(isset($_POST['sdt'])) { $phone=$_POST['sdt']; }
            if(isset($_POST['email'])) { $mail=$_POST['email']; }

            
            $sql = "UPDATE user SET fullname='$name', class = '$lop', phone = '$phone', email = '$mail' WHERE user_id='$id'";
            if (mysqli_query($conn, $sql)) {
              echo '<script>alert("Sửa thông tin sinh viên thành công\nMời bạn quay lại trang quản lý để xem chi tiết")</script>';
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