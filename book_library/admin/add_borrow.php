<?php
  //include 'session.php';
  require 'config.php';
  if(isset($_POST['add'])){
    $student = $_POST['student'];
    $days = $_POST['days'];
    $sl = $_POST['solg'];
    $sql = "SELECT * FROM user WHERE user_id = '$student'";
    $query = $conn->query($sql);
    if($query->num_rows < 1){
        echo '<script>
                alert("Sinh viên không tồn tại");
                </script>';
                echo '<script>
                window.location.href ="add_borrow.php";
                </script>';
    }
    else{
      $row = $query->fetch_assoc();
      $student_id = $row['user_id'];
      $i =  mt_rand(100,6000);
      
      foreach($_POST['isbn'] as $isbn){
        if(!empty($isbn)){
          $sql = "SELECT * FROM book WHERE book_id = '$isbn'";
          $query = $conn->query($sql);
          if($query->num_rows > 0){
            $brow = $query->fetch_assoc();
            $bid = $brow['book_id'];
            $oder_detail_id = "p0".$i."";

            $date = date('Y-m-j');
            $newdate = strtotime ( '+'.$days.' day' , strtotime ( $date ) ) ;
            $newdate = date ( 'Y-m-j' , $newdate );


            

            $sql = "INSERT INTO book_borrow (oder_detail_id, book_id, qty, borrow_date, user_id, deadline, return_date, status) VALUES ('$oder_detail_id', '$bid', '$sl', '$date','$student_id', '$days','$newdate' ,'Chờ xác nhận')";
            if($conn->query($sql)){
                echo '<script>
                alert("Mượn sách thành công");
                </script>';
                echo '<script>
                window.location.href ="manage_accept.php";
                </script>';
            }
          }
          else{
            echo '<script>
                alert("Tên sách không tồn taị");
                </script>';
                echo '<script>
                window.location.href ="add_borrow.php";
                </script>';
          }
    
        }
    }
  }
}


?> 
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <title></title>
</head>
<body>
  <div class="container">
    <div class="modal-dialog">

<!--               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button> -->
              <h4 class="modal-title"><b>Phiếu mượn sách</b></h4>
            </div>
            <div>
              <form class="form-group"  method="POST" action="">
                <div class="form-group">
                    <label for="student" class="col-sm-9 control-label">Mã sinh viên</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="student" name="student" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="student" class="col-sm-9 control-label">Số ngày mượn</label>

                    <div class="col-sm-9">
                      <input type="number" min="1" max = "14" class="form-control" id="days" name="days" required>
                    </div>
                </div>
                <div class="form-group row">
                  <div class="col-5">
                    <label for="isbn" class="col-sm-9 control-label">Danh mục sách</label>

                    <div class="col-sm-9">
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
                    </div>
                  </div>
                  <div  class="col-5">
                    <label for="isbn" class="col-sm-9 control-label">Tên sách</label>

                    <div class="col-sm-9">
                      <select name="isbn[]" class="form-control" >
                        <option value="">Chọn sách</option>
                        <?php 
                          
                          $sql = "SELECT * from  book" ;
                          $query = mysqli_query($conn, $sql);
                          while($row = mysqli_fetch_assoc($query)){
                        ?>  
                          <option value="<?php echo $row['book_id']?>"><?php echo $row['book_name'];?></option>
                           <?php } ?> 
                      </select>
                    </div>
                  </div>
                     <div class="col-2">
                      <label for="sl" class="col-sm-9 control-label">Số lượng</label>

                      <div class="col-sm-9">
                        <input type="number" min="1" max="5" class="form-control" id="sl" name="solg" required>
                      </div>
                    </div>
                </div>
               
                <span id="append-div"></span>
                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                      <input onclick="myFunction()" type="button" class="btn btn-primary btn-xs btn-flat" id="append" value="Thêm sách "/>
                    </div>
                    <div id="add"></div>
                </div>
            </div>
            
                  </form>
                <div style="margin-left: 800px;">
                  <input type="submit" class="btn btn-primary btn-flat" name="add" value="Lưu">
                  <a href="manage_accept.php" ><input type="button" class="btn btn-warning btn-flat" value="Đóng"></a>
                </div>
</div>

<!-- <script>
$(function(){
  $(document).on('click', '#append', function(e){
    e.preventDefault();
    $('#append-div').append(
      '<div class="form-group"><label for="" class="col-sm-3 control-label">ISBN</label><div class="col-sm-9"><input type="text" class="form-control" name="isbn[]"></div></div>'
    );
  });
});
</script> -->

<script>
        function myFunction(){
            document.getElementById('add').innerHTML += '<div id="remove" class="form-group"><div class="form-group row"><div class="col-5"><label for="isbn" class="col-sm-9 control-label">Danh mục sách</label> <div class="col-sm-9"><select name="category" class="form-control" ><option value="">Chọn ngành</option><?php $sql = "SELECT * from  category" ;$query = mysqli_query($conn, $sql);while($row = mysqli_fetch_assoc($query)){?>  <option value="<?php echo $row['nganh_id']?>"><?php echo $row['nganh_name'];?></option><?php } ?> </select></div></div><div  class="col-5"><label for="isbn" class="col-sm-9 control-label">Tên sách</label><div class="col-sm-9"> <select name="isbn[]" class="form-control" ><option value="">Chọn sách</option><?php $sql = "SELECT * from  book" ;$query = mysqli_query($conn, $sql);while($row = mysqli_fetch_assoc($query)){?><option value="<?php echo $row['book_id']?>"><?php echo $row['book_name'];?></option><?php } ?></select></div></div><div class="col-2"><label for="sl" class="col-sm-9 control-label">Số lượng</label><div class="col-sm-9"><input type="number" min="1" max="5" class="form-control" id="sl" name="solg" required> </div> </div></div><button id="remove" class="mt-2 btn btn-danger btn-xs btn-flat" onclick="removeFunc()">Xóa</button></div></div> ';
        }
        function removeFunc(){
            var myobj = document.getElementById('remove');
            myobj.remove();
        }
    </script>
</body>
</html>
<!-- Add -->
