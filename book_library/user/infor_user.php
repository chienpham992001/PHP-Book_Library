<?php

    include('config.php');
    $sql_info = "SELECT *FROM user where user_id ='".$_SESSION['dangnhap']."' ";
    $querry_info = mysqli_query($conn,$sql_info);
    $row = mysqli_fetch_array($querry_info);
?>

<div class="tg-products">
    <div class="tg-sectionhead">
        <h2>Thông tin bạn đọc
        </h2>
    </div>
    <div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="tg-postbook">
                <figure class="tg-featureimg"><img src="images/author/nam.png" alt="image description"></figure>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <div class="tg-productcontent">
                <div class="tg-booktitle">
                    <h3 style="padding-bottom:10px;"><?php  echo $row['fullname'] ?></h3>
                    <h4>Mã sinh viên  : <span><?php  echo $row['user_id'] ?></span></h4>
                    <h4>Lớp: <span><?php  echo $row['class'] ?></span></h4>
                    <h4>Số điện thoại : <span><?php  echo $row['phone'] ?></span></h4>
                    <h4>Email : <span><?php  echo $row['email'] ?></span></h4>
                </div>
            </div>
        </div>
    </div>

</div>