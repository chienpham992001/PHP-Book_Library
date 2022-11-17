<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Thêm sách mới</title>
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
<style type="text/css">
  .container{
    width: 50%;
  }
  input{
    width: 20%;
  }
</style>
</head>
<body>
  <div class="wrapper">
      <!-- Preloader-->
      <!--div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="dist/img/logo.png" alt="Logo" height="60" width="60">
      </div-->
      <?php 
      require 'config.php';
        $bookname = "";
        $theloai="";
        $tacgia = "";
        $nxb = "";
        $soluong = "";
        $mota = "";
        $anh ="";
        $cost ="";
        $tg = date('Y-m-d');

        //Lấy giá trị POST từ form vừa submit
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if(isset($_POST["name"])) { $bookname = $_POST['name']; }
            if(isset($_POST["anhne"])) { 
              $anh = $_POST["anhne"];
              
               }
            if(isset($_POST["author"])) { $tacgia = $_POST['author']; }
            if(isset($_POST["category"])) { $theloai = $_POST['category']; }
            if(isset($_POST["nxb"])) { $nxb = $_POST['nxb']; }
            if(isset($_POST["total"])) { $soluong = $_POST['total']; }
            if(isset($_POST["des"])) { $mota = $_POST['des']; }
            if(isset($_POST["cost"])) { $cost = $_POST['cost']; }

            //Code xử lý, insert dữ liệu vào table
            $anh = $_FILES['anhne']['name'];
            $target = "../user/images/books/" . basename($anh);
            $sql = "INSERT INTO book (book_name, image, nganh_id, author_id, publisher, creation_time, uploaded_time ,descrip, total_qty,cost) VALUES ('$bookname','$anh' , '$theloai','$tacgia','$nxb','$tg', '$tg' , '$mota', '$soluong','$cost')";
              
            if (mysqli_query($conn, $sql)) {
              move_uploaded_file($_FILES['anhne']['tmp_name'], $target);
                header('location: manage_book.php');
                
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
            
            
        }

       ?>

      <?php include "include/header.php"; ?>
      <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Thêm thông tin sách mới</h1>
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
      <div class="container">
        <form class="mt-3" method="POST" action="" enctype="multipart/form-data">
          <label class="mt-3">Tên sách</label>
          <input class="form-control" name="name">

          <label class="mt-3">Hình ảnh</label>
          <input class="form-control" type="file" name="anhne">

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

          <label class="mt-3">Nhà xuất bản</label>
          <input class="form-control" name="nxb">

          <label class="mt-3">Số lượng</label>
          <input type="number" class="form-control" name="total" min="1">

          <label class="mt-3">Giá tiền</label>
          <input type="text" class="form-control" name="cost">

          <label class="mt-3">Mô tả</label>
          <input type="text" class="form-control" name="des">

          <input type="submit" class="btn btn-small btn-primary mt-3" name="btnSubmit" value="Thêm mới">
        </form>
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
