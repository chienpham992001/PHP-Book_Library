<?php
include('config.php');
$sql_borrow = "SELECT*FROM book_borrow,book where book_borrow.book_id = book.book_id AND user_id ='" . $_SESSION['dangnhap'] . "' AND status ='Đang mượn' ";
$querry_borrow = mysqli_query($conn, $sql_borrow);


?>

<div id="tg-twocolumns" class="tg-twocolumns">

    <div class="tg-sectionhead">
        <h2>Sách đang mượn
        </h2>
    </div>

    <p>Mỗi cuốn sách được gia hạn tối đa <span style="color: red;">3 lần</span> </p>
    <table class="styled-table ">
        <thead>
            <tr>
                <th>STT</th>
                <th>Mã sách</th>
                <th>Tên sách</th>
                <th>Số lượng</th>
                <th>Ngày mượn</th>
                <th>Hạn trả</th>
                <th>Trạng thái</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            while ($row = mysqli_fetch_array($querry_borrow)) {
                $i++;
            ?>
                <tr class="active-row">
                    <td> <?php echo $i ?></td>
                    <td> <?php echo $row['book_id'] ?> </td>
                    <td> <?php echo $row['book_name'] ?> </td>
                    <td> <?php echo $row['qty'] ?> </td>
                    <td> <?php echo $row['borrow_date'] ?> </td>
                    <td> <?php echo $row['return_date'] ?> </td>
                    <td> <?php echo $row['status'] ?> </td>
                    <td>
                        <a class="func_borrow" href="returned.php?id=<?php echo $row['borrow_id'] ?>">Trả sách</a>
                        <br>
                        <a class="func_borrow" href="giahan.php?id=<?php echo $row['borrow_id'] ?>">Gia hạn</a>
                    </td>

                </tr>

            <?php } ?>
        </tbody>
    </table>
</div>