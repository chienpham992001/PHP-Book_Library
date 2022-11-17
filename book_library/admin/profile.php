<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sửa thông tin sách</title>
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

    <?php

    require 'config.php';
    session_start();
    if (isset($_SESSION['loggedin'])) {
      $id = $_SESSION['id'];
      $sql = "SELECT * FROM admin WHERE id= '$id'";
      $query = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_array($query)) {

    ?>
        <?php include "include/header.php"; ?>
        <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0">Chỉnh sửa thông tin cá nhân</h1>
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
              <form method="POST" class="form mb-3" enctype="multipart/form-data">
                <label class="mt-3">Tài khoản</label>
                <input class="form-control" value="<?php echo $row['username']; ?>" name="name">

                <label class="mt-3">Số điện thoại</label>
                <input class="form-control" value="0<?php echo $row['phone']; ?>" name="sdt">

                <label class="mt-3">Email</label>
                <input type="email" class="form-control" value="<?php echo $row['email']; ?>" name="mail">
              <?php
            }
              ?>

              <input class="mt-3 btn btn-primary btn-sml" type="submit" value="Cập nhật" name="update_profile">
              <a href="recover_password.php" class="btn btn-danger btn-sml mt-3 ms-2">Đổi mật khẩu</a>

              </form>



            <?php
            if (isset($_POST['update_profile'])) {
              if (isset($_POST['name'])) {
                $username = $_POST['name'];
              }
              if (isset($_POST['sdt'])) {
                $phone = $_POST['sdt'];
              }
              if (isset($_POST['mail'])) {
                $mail = $_POST['mail'];
              }
              $q = "UPDATE admin SET username='$username', phone ='$phone', email='$mail'WHERE id='$id'";
              if (mysqli_query($conn, $q)) {
                echo '<script>
                if (confirm("Bạn có chắc chắn muốn sửa thông tin ?")) {
                  window.location = "profile.php";
                }
              </script>';
              }
            }
          }
            ?>
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