<!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <title>HaUI Library | Quản lý sách</title>

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
      <?php include "include/header.php"; ?>
    <div  class="wrapper">
      <!-- Preloader-->
      <!--div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="dist/img/logo.png" alt="Logo" height="60" width="60">
      </!--div>
    
    <!- Content Header (Page header) -->
    <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-10">
            <h1 class="m-0">Quản lý đầu sách</h1>
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
        <div class="buttons">
                <a href="add_book.php" ><button class="btn-primary">Thêm sách</button></a>
        </div>
          <table class="table table-bordered mt-3 .bg-light">
            <thead>
                <tr>
                  <!--th style="width:5%">STT</th-->
                  <th>Hình ảnh</th>
                  <th>Tên sách</th>
                  <th>Giá sách</th>
                  <th>Ngành đào tạo</th>
                  <th>Tác giả</th>
                  <th>Nhà xuất bản</th>
                  <th>Ngày cập nhật</th>
                  <th>Tổng số sách</th>
                </tr>
            </thead>
            <tbody>
            <?php
            
                $n = 1;
                require 'config.php';
                if(isset($_GET['page'] )){
                    $page = $_GET['page'];
                }
                else{
                    $page = 1;
                }
                $rowsPerPage = 3;
                $perRow = $page*$rowsPerPage-$rowsPerPage;
                $query=mysqli_query($conn,"SELECT * FROM book INNER JOIN category ON book.nganh_id = category.nganh_id INNER JOIN author ON book.author_id = author.author_id LIMIT $perRow, $rowsPerPage ");
                $totalRows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM book INNER JOIN category ON book.nganh_id = category.nganh_id INNER JOIN author ON book.author_id = author.author_id"));
                $totalPages = ceil($totalRows/$rowsPerPage);
                $listPage = "";
                for($i = 1;$i<=$totalPages;$i++){
                    if($page == $i){
                        $listPage.='<a class = "active" href = "?page='.$i.'">'.$i.'</a>';
                    }
                    else{
                        $listPage.='<a href = "?page='.$i.'">'.$i.'</a>';
                    }
                }
                while($row=mysqli_fetch_array($query)){
            ?>
            <tr>
                <!--td><?php //echo $n++?></td-->
                <td><img id="anh" src = "../user/images/books/<?php echo $row['image'] ?>" alt="<?= $row['book_name'] ?>"></td>
                <td><?php echo $row['book_name']; ?></td>
                <td><?php echo $row['cost'] ?></td>
                <td><?php echo $row['nganh_name']; ?></td>
                <td><?php echo $row['author_name']; ?></td>
                <td><?php echo $row['publisher']; ?></td>
                <td><?php echo $row['uploaded_time']; ?></td>
                <td><?php echo $row['total_qty']; ?></td>
                <td width="14%;"><a href="edit_book.php?id=<?php echo $row['book_id']; ?>" class="btn btn-primary btn-sml" >Sửa</a>
                <input type="button" onClick = "deleteme(<?php echo $row['book_id']; ?>)" name="delete" value="Xóa" class="btn btn-danger btn-sml"></td>
            </tr>
        <?php } ?>
            </tbody>
        </table>
        <div class="pagination">
            <?php 
                echo $listPage;
             ?>
        </div>
    </div>
    
    </section>
    
</div>
    
    <!--?php //} ?-->
    <?php include 'include/footer.php'; ?>
    <script type="text/javascript">
        function deleteme(delid) {
            if(confirm("Bạn có muốn xóa mục này?")){
                window.location.href='delete_book.php?id=' +delid+'';
                return true;
            }
        }
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
    
