<?php
include('config.php');
$sql_borrow = "SELECT*FROM book_borrow,book where book_borrow.book_id = book.book_id AND book_borrow.user_id ='" . $_SESSION['dangnhap'] . "' AND status ='Chờ xác nhận' ";
$querry_borrow = mysqli_query($conn, $sql_borrow);

// $row2 = mysqli_fetch_array($querry_borrow);

?>

<div id="tg-twocolumns" class="tg-twocolumns">

    <div class="tg-sectionhead">
        <h2>Sách đang mượn
        </h2>
    </div>
    <table class="styled-table ">
        <thead>
            <tr>
                <th>STT</th>
                <!-- <th>Mã phiếu</th> -->
                <th>Mã sách</th>
                <th>Tên sách</th>
                <th>Số lượng</th>
                <th>Tiền cọc</th>
                <th>Ngày yêu cầu</th>
                <th>Hạn trả</th>
                <th>Trạng thái</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            $date = date('Y-m-j');
            while ($row = mysqli_fetch_array($querry_borrow)) {
                $i++;
                    if (strtotime($date) > strtotime($row['return_date'])) {
                        $delete_request = "DELETE FROM book_borrow WHERE borrow_id  ='" . $row['borrow_id'] . "'";
                        mysqli_query($conn, $delete_request);
                    }
            ?>
                    <tr class="active-row">
                        <td> <?php echo $i ?></td>
                        <td> <?php echo $row['book_id'] ?> </td>
                        <td> <?php echo $row['book_name'] ?> </td>
                        <td> <?php echo $row['qty'] ?> </td>
                        <td><?php echo number_format($row['cost'] * $row['qty']) ?> VNĐ</td>
                        <td> <?php echo $row['borrow_date'] ?> </td>
                        <td> <?php echo $row['return_date'] ?> </td>
                        <td> <?php echo $row['status'] ?> </td>
                    </tr>

            <?php } ?>
        </tbody>
    </table>
</div>