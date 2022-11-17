<?php
include("header.php");

$error = array();
$data  = array();
$user_id = $_SESSION['dangnhap'];


if (!empty($_POST['borrow'])) {
    $data['days'] = isset($_POST['days']) ? $_POST['days'] : '';

    $days = '';

    if (empty($data['days'])) {
        $error['days'] = 'Bạn chưa nhập số ngày mượn sách';
    } else {
        if ($data['days'] > 15 || $data['days'] < 0) {
            $error['days'] = 'Bạn chỉ được mượn sách tối đa 14 ngày. ';
        } else $days = $data['days'];
    }


    if (!$error) {
        $flag = false;
        $i = mt_rand(100, 6000);
        foreach ($_SESSION['cart'] as $key => $value) {
            $date = date('Y-m-j');
            $newdate = strtotime('+' . $days . 'day', strtotime($date));
            $newdate = date('Y-m-j', $newdate);
            $book_id = $value['id'];
            $qty = $value['soluong'];
            $oder_detail_id = "p0" . $i . "";
            //Set điều kiện số lượng mượn 
            $sql_sl = "SELECT *FROM book WHERE book_id = '" . $book_id . "' ";
            $query_sl = mysqli_query($conn, $sql_sl);
            $row3 = mysqli_fetch_array($query_sl);
            // $a =(string) $row3['book_name'] ;
            if ($qty > $row3['total_qty']) {
                $a = "Số lượng sách " . $row3['book_name'] . " không đủ";
                echo "<script>alert('$a');</script>";
            } else {
                $insert_borrow = "INSERT INTO book_borrow(book_id,oder_detail_id,qty,borrow_date,user_id,deadline,return_date,status)
                VALUES ('" . $book_id . "','" . $oder_detail_id . "','" . $qty . "','" . $date . "','" . $user_id . "','" . $days . "','" . $newdate . "','Chờ xác nhận')";
                mysqli_query($conn, $insert_borrow);
                $flag = true;
            }


            // $sql_sl = "SELECT *FROM book WHERE book_id = '".$book_id."' ";
            // $query_sl = mysqli_query($conn,$sql_sl);
            // $row3 = mysqli_fetch_array($query_sl);

            // $current_sl = $row3['total_qty']-$qty;

            // $update_sl = "UPDATE book SET total_qty = '".$current_sl."' WHERE book_id = '".$book_id."'";
            // mysqli_query($conn,$update_sl);
        }

        if ($flag == true) {
            echo '<script>
            alert("Gửi yêu cầu mượn sách thành công");
            </script>';
        }
        unset($_SESSION['cart']);
        echo '<script>
            window.location.href ="index.php";
        </script>';
    }
}

?>

<!doctype html>
<html class="no-js" lang="">
<meta charset="utf-8">

<body>

    <div id="tg-wrapper" class="tg-wrapper tg-haslayout">
        <!--************************************
				Inner Banner Start
		*************************************-->
        <div class="tg-innerbanner tg-haslayout tg-parallax tg-bginnerbanner" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="images/parallax/bgparallax-07.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="tg-innerbannercontent">
                            <h1>Sách</h1>
                            <ol class="tg-breadcrumb">
                                <li><a href="index.php">Trang chủ</a></li>
                                <li class="tg-active"> <a href="products.php">Giỏ sách</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--************************************
				Inner Banner End
		*************************************-->

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

                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3 pull-left">
                                <aside id="tg-sidebar" class="tg-sidebar">

                                    <div class="tg-widget tg-widgetsearch">
                                        <form action="products.php?quanly=timkiem" class="tg-formtheme tg-formsearch " method="GET">
                                            <div class="form-group">

                                                <input type="text" name="search" class="form-group" placeholder="Tìm kiếm sách...">
                                                <button type="submit"><i class="icon-magnifier"></i></button>
                                            </div>
                                        </form>
                                    </div>

                                    <?php include("tuongtac.php") ?>
                                </aside>
                            </div>

                            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-9 pull-right">

                                <h2> <span>Tất cả sách muốn mượn </h2>
                                <?php
                                if (isset($_SESSION['cart'])) {
                                    // echo '<pre>';
                                    // print_r($_SESSION['cart']);
                                    // echo '</pre>';
                                }
                                ?>
                                <div>
                                    <span style="color: #10b571;">Chú ý :</span>
                                    <!-- : Mỗi sinh viên chỉ được mượn với số lượng là 1 với mỗi đầu sách
                                    <br>  -->
                                    Sinh viên cần phải đặt cọc với mỗi đầu sách tương ứng tại thư viện để nhận sách
                                    <form action="" autocomplete="off" method="POST">
                                        <table class="styled-table">
                                            <thead>

                                                <tr>
                                                    <th>STT</th>
                                                    <th>Mã sách</th>
                                                    <th>Tên sách</th>
                                                    <th>Hình ảnh</th>
                                                    <th>Số lượng</th>
                                                    <th>Tiền cọc</th>
                                                    <th>Quản lý</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (isset($_SESSION['cart'])) {
                                                    $stt = 0;
                                                    $sl = 0;
                                                    $tong_tien=0;
                                                    foreach ($_SESSION['cart'] as $cart_item) {
                                                        $stt++;
                                                        $sl++;
                                                        $tong_tien+=($cart_item['cost'] * $cart_item['soluong']);
                                                        //if ($sl <= 3) {
                                                ?>
                                                        <tr class="active-row">
                                                            <td> <?php echo $stt ?> </td>
                                                            <td> <?php echo $cart_item['book_id'] ?> </td>
                                                            <td> <?php echo $cart_item['book_name'] ?> </td>
                                                            <td> <img src=" images/books/<?php echo $cart_item['image'] ?>" alt="image description"> </td>
                                                            <td>
                                                                <a class="add-minus" href="themgiosach.php?tru_sl=<?php echo $cart_item['id'] ?>"><i class="fa fa-minus"></i></a>
                                                                <?php echo $cart_item['soluong'] ?>
                                                                <a class="add-minus" href="themgiosach.php?cong_sl=<?php echo $cart_item['id'] ?>"><i class="fa fa-plus"></i></a>
                                                            </td>
                                                            <td><?php echo number_format($cart_item['cost'] * $cart_item['soluong']) ?> VNĐ</td>
                                                            <td><a href="themgiosach.php?xoa=<?php echo $cart_item['id'] ?>">Xóa </a></td>
                                                        </tr>
                                                        
                                                    <?php
                                                        // } else {
                                                        //         echo 'Mỗi sinh viên chỉ được mượn tối đa 5 quyển sách';
                                                        //         break;
                                                    }
                                                    
                                                    //}
                                                    ?>
                                                    <tr>
                                                        <td colspan="7">
                                                            <h5 style="color: red; text-align: left;">Tổng tiền cần cọc : 
                                                                <span style="color:#00A963 ;">
                                                                <?php echo number_format($tong_tien) ?> VND
                                                                </span>    
                                                        </h5>
                                                        </td>
                                                    </tr>
                                                <?php
                                                
                                                } 
                                                else { ?>
                                                
                                                    <tr>
                                                        <td colspan="7">
                                                            <h5 style="color: red;">Hiện tại giỏ sách trống</h5>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                                <td colspan="7">
                                                    <a class="delete" href="themgiosach.php?xoatatca=1">XÓA TẤT CẢ</a>
                                                </td>
                                            </tbody>
                                        </table>

                                        <div class="form-group">

                                            <li class="list-group-item active">Nhập số ngày mượn </li>

                                            <div class="form-group">
                                                <label for="">Số ngày mượn <span style="color: red;">*</span> </label>
                                                <div>
                                                    <input class="form-control" type="text" name="days" value="<?php echo isset($_POST['days']) ? $_POST['days'] : ''; ?>">
                                                    <div style="color: red;">
                                                        <?php echo isset($error['days']) ? $error['days'] : ''; ?></div>
                                                </div>
                                            </div>
                                            <input type="submit" name="borrow" class="borrow" value="Mượn sách">
                                            <!-- <a name="print" href="hoadon.php?id=<?php echo $user_id ?> "> Xem phiếu mượn</a> -->
                                        </div>
                                    </form>
                                </div>
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