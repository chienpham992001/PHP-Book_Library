<?php
include('config.php');
if (isset($_GET['id'])) {
    $sql_giahan = "SELECT*FROM book_borrow where borrow_id = '" . $_GET['id'] . "' AND status ='Đang mượn' ";
    $querry_gh = mysqli_query($conn, $sql_giahan);
    $row2 = mysqli_fetch_array($querry_gh);

    $return_date = $row2['return_date'];


    $limit_time = strtotime('+' . $row2['deadline'] . 'day', strtotime($row2['borrow_date']));
    $limit_time = date('Y-m-j', $limit_time);

    $limit_time2 = strtotime('+9 day', strtotime($limit_time));
    $limit_time2 = date('Y-m-j', $limit_time2);

    if ($return_date >= $limit_time2) {
        echo '<script>
        window.alert("Số lần gia hạn đạt tối đa");
        window.location = "profile.php?borrowed";
    </script>';
    } else {
        $newdate = strtotime('+3 day', strtotime($return_date));
        $newdate = date('Y-m-j', $newdate);
        $update_time = "UPDATE book_borrow SET return_date = '" . $newdate . "' where borrow_id = '" . $_GET['id'] . "'";
        mysqli_query($conn, $update_time);
        header('Location:profile.php?borrowed');
    }
}
