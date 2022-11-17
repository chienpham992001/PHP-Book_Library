<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sửa thông tin ngành</title>
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
    <?php include "include/header.php"; 
    require 'config.php';
	    $id=$_GET['id'];
		$query=mysqli_query($conn,"SELECT * FROM category WHERE nganh_id ='$id'");
		
		$row=mysqli_fetch_assoc($query);
    ?>
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Chỉnh sửa thông tin thể loại</h1>
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
        <div class="container ">
		    <form class="mt-3" method="POST" class="form">
		    	<label class="mt-3">Mã ngành
          <input class="form-control" name="catid" value="<?php echo $row['nganh_id']; ?>"></label><br>

          <label class="mt-3">Tên ngành
          <input class="form-control" name="name" value="<?php echo $row['nganh_name']; ?>"></label><br>

          <input type="submit" class="btn btn-small btn-primary mt-3" name="update_cat" value="Sửa">


			</form>
		</div>
    <?php
          if (isset($_POST['update_cat'])){
            if(isset($_POST['catid'])){
              $catid = $_POST['catid'];
            }
            if(isset($_POST['name'])){
              $catname=$_POST['name'];
            }
            $tg = date('Y-m-d');
            $sql = "UPDATE category SET nganh_id = '$catid', nganh_name='$catname', updated_time = '$tg' WHERE nganh_id='$id'";
            
            if (mysqli_query($conn, $sql)) {
              echo '<script>alert("Sửa danh mục ngành thành công\nMời bạn quay lại trang quản lý để xem chi tiết")</script>';
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