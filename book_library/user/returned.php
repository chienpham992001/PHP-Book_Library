<?php
include('config.php');
include("header.php");
$sql_return = "SELECT*FROM book_return,book where book_return.book_id = book.book_id AND user_id ='" . $_SESSION['dangnhap'] . "' ";
$querry_return = mysqli_query($conn, $sql_return);

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
        window.location = "returned.php";
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

<!doctype html>
<html class="no-js" lang="">
<style>
    .container {
        width: 90%;
    }
</style>

<body>

    <div class="tg-innerbanner tg-haslayout tg-parallax tg-bginnerbanner" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="images/parallax/bgparallax-07.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="tg-innerbannercontent">
                        <h1>Trang cá nhân</h1>
                        <ol class="tg-breadcrumb">
                            <li><a href="index.php">Trang chủ</a></li>
                            <li class="tg-active"> <a href="profile.php?infor">Trang cá nhân</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--************************************
				Main Start
		*************************************-->
    <main id="tg-main" class="tg-main tg-haslayout">
        <!--************************************
					News Grid Start
			*************************************-->
        <div class="tg-sectionspace tg-haslayout">
            <div class="container">
                <div class="row">
                    <div id="tg-twocolumns" class="tg-twocolumns">
                        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-9 pull-right">
                            <div id="tg-content" class="tg-content">
                                <div id="tg-twocolumns" class="tg-twocolumns">

                                    <div class="tg-sectionhead">
                                        <h2>Sách từng mượn
                                        </h2>
                                    </div>
                                    <table class="styled-table ">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Mã sách</th>
                                                <th>Tên sách</th>
                                                <th>Số lượng</th>
                                                <th>Ngày trả</th>
                                                <th>Hạn trả</th>
                                                <th>Trạng thái</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 0;
                                            while ($row1 = mysqli_fetch_array($querry_return)) {
                                                $i++;
                                            ?>
                                                <tr class="active-row">
                                                    <td> <?php echo $i ?></td>
                                                    <td> <?php echo $row1['book_id'] ?> </td>
                                                    <td> <?php echo $row1['book_name'] ?> </td>
                                                    <td> <?php echo $row1['qty'] ?> </td>
                                                    <td> <?php echo $row1['back_date'] ?> </td>
                                                    <td> <?php echo $row1['return_date'] ?> </td>
                                                    <td> <?php echo $row1['status'] ?> </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3 pull-left">
                            <aside id="tg-sidebar" class="tg-sidebar">

                                <div class="tg-widget tg-catagories">
                                    <div class="tg-widgettitle">
                                        <h3>Chức năng</h3>
                                    </div>
                                    <div class="tg-widgetcontent">
                                        <ul>
                                            <li><a href="profile.php?infor">Trang bạn đọc</a></li>
                                            <li><a href="profile.php?request">Yêu cầu mượn</a></li>
                                            <li><a href="profile.php?borrowed">Sách đang mượn</a></li>
                                            <li><a href="profile.php?returned">Sách từng mượn</a></li>
                                        </ul>
                                    </div>
                                </div>

                            </aside>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--************************************
					News Grid End
			*************************************-->
    </main>
    <!--************************************
				Main End
		*************************************-->

    <?php include("footer.php") ?>
    </div>
    <!--************************************
			Wrapper End
	*************************************-->
    <script src="js/vendor/jquery-library.js"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyCR-KEWAVCn52mSdeVeTqZjtqbmVJyfSus&amp;language=en"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.vide.min.js"></script>
    <script src="js/countdown.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/parallax.js"></script>
    <script src="js/countTo.js"></script>
    <script src="js/appear.js"></script>
    <script src="js/gmap3.js"></script>
    <script src="js/main.js"></script>
</body>

</html>