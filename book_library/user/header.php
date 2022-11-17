<?php
session_start();
include('config.php');
if(!isset($_SESSION['dangnhap'])){
	header("Location:login.php");
	
}
$sql_dm = "SELECT * FROM category  ORDER BY nganh_id DESC";
$query_dm = mysqli_query($conn, $sql_dm);

// if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
// 	unset($_SESSION['dangnhap']);
// 	header("Location:login.php");
// }
?>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Thư viện Online | HaUI</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon" href="apple-touch-icon.png">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/icomoon.css">
	<link rel="stylesheet" href="css/jquery-ui.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/transitions.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/color.css">
	<link rel="stylesheet" href="css/responsive.css">
</head>
<header id="tg-header" class="tg-header tg-haslayout">
	<div class="tg-topbar">
		<div class="container">
			<strong class="tg-logo">
				<a href="index.php">
					<img src="images/logo-thuvien_hauii.png" alt="company name here">
				</a>
			</strong>
			<div class="tg-userlogin">
				<div>
					<li style="list-style:none ;" class="menu-item-has-children">
						<a href=""> <i id="user_icon" class="fa fa-user"></i>Xin chào,
							<?php
							$sql = "SELECT*FROM user where user_id = '" . $_SESSION['dangnhap'] . "' LIMIT 1";
							$query = mysqli_query($conn, $sql);
							$row = mysqli_fetch_array($query);
							echo $row['fullname'];
							?></a>
						<div class="mega-menu user">
							<ul class="tg-themetabnav " role="tablist">
								<li><a href="profile.php?infor">Trang cá nhân</a></li>
								<li><a href="profile.php?request">Yêu cầu mượn</a></li>
								<li><a href="profile.php?borrowed">Sách đang mượn</a></li>
								<li><a href="returned.php">Sách từng mượn</a></li>
								<li><a class="tg-userlogout" href="logout.php">Đăng xuất</a></li>
							</ul>
					</li>
					<div>
						
					</div>
				</div>
			</div>

		</div>
	</div>
	<div class="tg-middlecontainer">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

					<div class="tg-wishlistandcart">

						<div class="dropdown tg-themedropdown tg-minicartdropdown">
							<a href="javascript:void(0);" id="tg-minicart" class="tg-btnthemedropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<?php
								$sl = 0;
								if (isset($_SESSION['cart'])) {
									foreach ($_SESSION['cart'] as $cart_item) {
										$sl++;
								?>

										<span class="tg-themebadge"><?php echo $sl ?></span>

								<?php }
								} ?>

								<i class="icon-cart"></i>
							</a>
							<div class="dropdown-menu tg-themedropdownmenu" aria-labelledby="tg-minicart">
								<div class="tg-minicartbody">
									<?php
									if (isset($_SESSION['cart'])) {
										foreach ($_SESSION['cart'] as $cart_item) {
											$sl++;
									?>
											<div class="tg-minicarproduct">
												<figure>
													<img src=" images/books/<?php echo $cart_item['image'] ?>" alt="image description">
												</figure>
												<div class="tg-minicarproductdata">
													<h5><a href=""><?php echo $cart_item['book_name'] ?></a></h5>
												</div>
											</div>
									<?php }
									} ?>
									
								</div>
								<div class="tg-minicartfoot">
									<a class="tg-btnemptycart" href="javascript:void(0);">
										<i class="fa fa-trash-o"></i>
										<span> <a href="themgiosach.php?xoatatca=1">Xóa tất cả</a> </span>
									</a>
									<div class="tg-btns">
										<a class="tg-btn tg-active" href="giosach.php">Xem giỏ hàng</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tg-searchbox">
						<form class="tg-formtheme tg-formsearch" action="products.php?quanly=timkiem" method="GET">
							<fieldset>
								<input type="text" name="search" class="typeahead form-control" placeholder="Tìm kiếm sách">
								<button type="submit"><i class="icon-magnifier"></i></button>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="tg-navigationarea">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<nav id="tg-nav" class="tg-nav">
						<div id="tg-navigation" class="collapse navbar-collapse tg-navigation">
							<ul>
								<li class=" current-menu-item">
									<a href="index.php">Trang chủ</a>
								</li>
								<li class="menu-item-has-children menu-item-has-mega-menu">
									<a href="javascript:void(0);">Danh mục sách</a>
									<div class="mega-menu">
										<ul class="tg-themetabnav" role="tablist">

											<?php while ($row_dm = mysqli_fetch_array($query_dm)) { ?>

												<li id="category" class="category">
													<a href="products.php?id=<?php echo $row_dm['nganh_id'] ?>">
														<?php echo $row_dm['nganh_name'] ?></a>
												</li>
											<?php } ?>

										</ul>
								</li>
								<li>
									<a href="authors.php">Tác giả</a>
									<!-- <ul class="sub-menu">
										<li><a href="">Tác giả</a></li>
										<li><a href="authordetail.html">Giới thiệu tác giả</a></li>
									</ul> -->
								</li>

								<li><a href="products.php">Sách</a></li>
								<li><a href="contactus.php">Liên hệ</a></li>
							</ul>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</div>
</header>