<?php
include('config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql_borrow = "SELECT*FROM book_borrow where borrow_id  ='" . $id . "'";
    $querry_borrow = mysqli_query($conn, $sql_borrow);
    $row = mysqli_fetch_array($querry_borrow);


    $date = date('Y-m-j');
    $tt = "";
    if (strtotime($date) < strtotime($row['return_date'])) {
        $tt = "Đã trả";
    } else $tt = "Trả muộn";

    $insert_rtb = "INSERT INTO book_return(oder_detail_id,book_id,qty,back_date,user_id,return_date,status) VALUES('" . $row['oder_detail_id'] . "','" . $row['book_id'] . "','" . $row['qty'] . "','" . $date . "','" . $row['user_id'] . "','" . $row['return_date'] . "','" . $tt . "')";

    $delete_borrow = "DELETE FROM book_borrow WHERE borrow_id  ='" . $id . "'";



    if (mysqli_query($conn, $insert_rtb)) {
        if (mysqli_query($conn, $delete_borrow)) {
            echo '<script>
        alert("Trả sách thành công");
        window.location = "manage_borrow.php";
        </script>';

            $sql_sl = "SELECT *FROM book WHERE book_id = '" . $row['book_id'] . "' ";
            $query_sl = mysqli_query($conn, $sql_sl);
            $row3 = mysqli_fetch_array($query_sl);

            $current_sl = $row3['total_qty'] + $row['qty'];
            $update_sl = "UPDATE book SET total_qty = '" . $current_sl . "' WHERE book_id = '" . $row['book_id'] . "'";
            mysqli_query($conn, $update_sl);
        }
    }
}
?>