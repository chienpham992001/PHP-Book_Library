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
    <?php include "include/header.php"; 
    require 'config.php';
	    $id=$_GET['id'];
		$query=mysqli_query($conn,"SELECT * FROM book WHERE book_id ='$id'");
		
		$row=mysqli_fetch_assoc($query);
    ?>
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Chỉnh sửa thông tin sách</h1>
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
          <label class="mt-3">Tên sách</label>
          <input  class="form-control" value="<?php echo $row['book_name']; ?>" name="name">

              <label class="mt-3">Nhà xuất bản</label>
              <input class="form-control" value="<?php echo $row['publisher']; ?>" name="nxb">

              <label class="mt-3">Số lượng</label>
              <input type="number" class="form-control" value="<?php echo $row['total_qty']; ?>" name="total" min="1">

              <label class="mt-3">Mô tả</label>
              <input value="<?php echo $row['descrip']; ?>" class="form-control" name="des">

              <label class="mt-3">Hình ảnh</label>
              <input class="form-control" type="file" name="anhne" value="<?php echo $row['image']; ?>">

              <label>Ngành đào tạo</label>
              <select name="category" class="form-control" >
                <option value="">Chọn ngành</option>
                <?php 
                  
                  $sql = "SELECT * from  category" ;
                  $query = mysqli_query($conn, $sql);
                  while($row = mysqli_fetch_assoc($query)){
                ?>  
                  <option value="<?php echo $row['nganh_id']?>"><?php echo $row['nganh_name'];?></option>
                   <?php } ?> 
              </select>

              <label class="mt-3">Tác giả</label>
              <select name="author" class="form-control" >
                <option value="">Chọn tác giả</option>
                <?php 
                  
                  $sql = "SELECT * from  author" ;
                  $query = mysqli_query($conn, $sql);
                  while($row = mysqli_fetch_assoc($query)){
                ?>  
                  <option value="<?php echo $row['author_id']?>"><?php echo $row['author_name'];?></option>

                   <?php } ?> 
              </select>
              

             <input class="mt-3" type="submit" value="Sửa" name="update_book">

      </form>

         

				<?php
					if (isset($_POST['update_book'])){
            if(isset($_POST['name'])){
              $bookname=$_POST['name'];
            }
						if(isset($_POST['author'])){
              $authorname=$_POST['author'];
            }
						if(isset($_POST['category'])){
              $catname=$_POST['category'];
            }
						if(isset($_POST['anhne'])) { $image=$_POST['anhne']; }
            if(isset($_POST['des'])) { $mt=$_POST['des']; }
            if(isset($_POST['nxb'])){
              $nxb = $_POST['nxb'];
            }
            if(isset($_POST['total'])){
              $qty = $_POST['total'];
            }
            $tg = date('Y-m-d');
						$image = $_FILES['anhne']['name'];
            $target = "photo/books/".basename($image);
						$q = "UPDATE book SET book_name='$bookname', author_id='$authorname', nganh_id='$catname', descrip = '$mt', publisher = '$nxb', total_qty = '$qty', uploaded_time = '$tg' WHERE book_id='$id'";
						if (mysqli_query($conn, $q)) {
              
              move_uploaded_file($_FILES['anhne']['tmp_name'], $target);
                
              echo '<script>alert("Sửa sách thành công\nMời bạn quay lại trang quản lý để xem chi tiết")</script>';
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