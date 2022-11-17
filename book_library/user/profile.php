<?php
    include('config.php');
include("header.php");

?>

<!doctype html>
<html class="no-js" lang="">
<style>
    .container{
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
                                <?php
                                    if(isset($_GET['infor'])) include('infor_user.php');
                                    if(isset($_GET['request'])) include('request.php');
                                    if(isset($_GET['borrowed'])) include('borrowed.php');
                                ?>
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
                                            <li><a href="returned.php">Sách từng mượn</a></li>
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