<?php
            include_once("config.php");
            if(isset($_REQUEST['id']) and $_REQUEST['id']!=""){
              $id=$_GET['id'];
              $sql = "UPDATE book_borrow SET status = 'Đang mượn' WHERE borrow_id='$id'";
              if (mysqli_query($conn, $sql)) {
                echo '<script>alert("Xác nhận mượn thành công")</script>';


                $sql_sl_muon = "SELECT *FROM book_borrow WHERE borrow_id = '" . $id . "' ";
            $query = mysqli_query($conn, $sql_sl_muon);
            $row = mysqli_fetch_array($query);

                $sql_sl = "SELECT *FROM book,book_borrow WHERE book.book_id = book_borrow.book_id AND borrow_id = '" . $id . "' ";
            $query_sl = mysqli_query($conn, $sql_sl);
            $row3 = mysqli_fetch_array($query_sl);

            $current_sl = $row3['total_qty'] - $row['qty'];
            $update_sl = "UPDATE book SET total_qty = '" . $current_sl . "' WHERE book_id = '" . $row['book_id'] . "'";
            mysqli_query($conn, $update_sl);
              }header("location: manage_accept.php");
          }
        
?>

