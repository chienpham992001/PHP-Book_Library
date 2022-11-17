<?php
    include("header.php");

    $sql_borrow = "SELECT * FROM book,book_borrow,user WHERE book.book_id=book_borrow.book_id AND book_borrow.user_id=user.user_id AND user.user_id ='$_GET[id]' ORDER BY book_borrow.book_id" ;

$querry_borrow = mysqli_query($conn, $sql_borrow);

$sql_infor = "SELECT * FROM book_borrow,user WHERE book_borrow.user_id=user.user_id AND  book_borrow.user_id ='$_GET[id]' ORDER BY book_borrow.book_id" ;
$a = mysqli_query($conn,$sql_infor);
$row_title = mysqli_fetch_array($a);


?>

<!doctype html>
<html class="no-js" lang="">
<meta charset="utf-8">
<style>
    td{
        line-height: 50px !important;
    }
</style>
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
                                <li class="tg-active"> <a href="products.php">Đơn sách</a></li>
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
                                <?php if(isset($_GET['id']) && $_GET['id']!=''){
                                    ?>
                                <h4 style="color: #10b571;">Mượn sách thành công</h4>
                                <div style="text-align: center;">
                                    
                                <img width="100px" src="images/logo_truong.jpg" alt="">
                                <h2 >Phiếu mượn sách thư viện ĐHCN Hà Nội</h2>
                                </div>
                                <h4>Mã sinh viên : <span class="user_infor"><?php echo $row_title['user_id'] ?></span> </h4>
                                <h4>Họ và tên : <span class="user_infor"><?php echo  $row_title['fullname'] ?></span> </h4>
                                <h4>Lớp : <span class="user_infor"><?php echo  $row_title['class'] ?></span> </h4>
                                <?php } 
                                else { ?>
                                        
                                <h4 style="color: red;">Mượn sách thất bại</h4>
                                <?php }?>
                                <table class="styled-table">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Mã sách</th>
                                                    <th>Tên sách</th>
                                                    <th>Số lượng</th>
                                                    <th>Ngày mượn</th>
                                                    <th>Số ngày mượn</th>
                                                    <th>Ngày trả</th>
                                                    <th>Tiền cọc</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i=0;
                                                while($row = mysqli_fetch_array($querry_borrow)){
                                                    $i++;
                                                ?>
                                                        <tr class="active-row">
                                                            <td> <?php echo $i ?></td>
                                                            <td> <?php echo $row['book_id'] ?> </td>
                                                            <td> <?php echo $row['book_name'] ?> </td>
                                                            <td> <?php echo $row['qty'] ?> </td>
                                                            <td> <?php echo $row['borrow_date'] ?> </td>
                                                            <td> <?php echo $row['deadline'] ?> </td>
                                                            <td> <?php echo $row['return_date'] ?> </td>
                                                            <td> <?php echo 15000 ?> VNĐ</td>
                                                        </tr>

                                                    <?php
                                                        // } else {
                                                        //         echo 'Mỗi sinh viên chỉ được mượn tối đa 5 quyển sách';
                                                        //         break;
                                                    
                                                    //}
                                                    ?>
                                                <?php }?>
                                            </tbody>
                                        </table>
                                        <h4>Tổng tiền : <span class="user_infor"><?php echo number_format(15000*$i); ?>VNĐ</span></h4>
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