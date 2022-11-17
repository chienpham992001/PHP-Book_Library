<?php
include("header.php");

$sql_tg = "SELECT * FROM author";
$querry_tg = mysqli_query($conn, $sql_tg);

$sql_fvr = "SELECT * FROM book,author WHERE book.author_id = author.author_id  AND 2<=(SELECT COUNT(*) FROM book_borrow WHERE book.book_id = book_borrow.book_id)";
$querry_fvr = mysqli_query($conn, $sql_fvr);
?>
<!doctype html>
<html class="no-js" lang="zxx">


<body>

	<div id="tg-wrapper" class="tg-wrapper tg-haslayout">

		<!--************************************
				Inner Banner Start
		*************************************-->
		<div class="tg-innerbanner tg-haslayout tg-parallax tg-bginnerbanner" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="images/parallax/bgparallax-05.jpg">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="tg-innerbannercontent">
							<h1>Tác giả</h1>
							<ol class="tg-breadcrumb">
								<li><a href="index.php">Trang chủ</a></li>
								<li class="#">Tác giả</li>
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
					Authors Start
			*************************************-->
			<div class="tg-authorsgrid">
				<div class="container">
					<div class="row">
						<div class="tg-authors">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="tg-sectionhead">
									<h2>Tác giả tiêu biểu</h2>
								</div>
							</div>
							<?php
							while ($row = mysqli_fetch_array($querry_tg)) {

							?>
								<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
									<div class="tg-author">
										<figure><a href="javascript:void(0);"><img src="images\author\<?php echo $row['author_image'] ?>" alt="image description"></a></figure>
										<div class="tg-authorcontent">
											<h2><a href="javascript:void(0);"><?php echo $row['author_name'] ?></a></h2>
											<span> <?php echo $row['description'] ?></span>

										</div>
									</div>
								</div>
							<?php	} ?>

						</div>
					</div>
				</div>
			</div>
			<!--************************************
					Authors End
			*************************************-->

			<!--************************************
					Picked By Author Start
			*************************************-->
			<section class="tg-sectionspace tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="tg-sectionhead">
								<h2><span>Một số cuốn sách hay</span>Bạn đọc săn đón</h2>
								<a class="tg-btn" href="javascript:void(0);">Xem tất cả</a>
							</div>
						</div>
						<div id="tg-pickedbyauthorslider" class="tg-pickedbyauthor tg-pickedbyauthorslider owl-carousel">
							<?php
							while ($row2 = mysqli_fetch_array($querry_fvr)) {
							?>
								<div class="item">
									<div class="tg-postbook">
										<figure class="tg-featureimg">
											<div class="tg-bookimg">
												<div class="tg-frontcover"><img src="images/books/<?php echo $row2['image'] ?>" alt="image description"></div>
											</div>
											<div class="tg-hovercontent">
												<div class="tg-description">
													<p><?php echo $row2['descrip'] ?></p>
												</div>
												<strong class="tg-bookpage">Nhà xuất bản: <?php echo $row2['publisher'] ?></strong>
												<div class="tg-ratingbox"><span class="tg-stars"><span></span></span></div>
											</div>
										</figure>
										<div class="tg-postbookcontent">
											<div class="tg-booktitle">
												<h3><a href="productdetail.php?quanly=sach&book_id=<?php echo $row2['book_id'] ?>"><?php echo $row2['book_name'] ?> </a></h3>
											</div>
											<span class="tg-bookwriter">Tác giả : <a href="javascript:void(0);"> <?php echo $row2['author_name'] ?></a></span>
											<a class="tg-btn tg-btnstyletwo" href="javascript:void(0);">
												<i class="fa fa-shopping-basket"></i>
												<em>Thêm vào giỏ</em>
											</a>
										</div>
									</div>
								</div>
							<?php
							}
							?>

						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Picked By Author End
			*************************************-->
		</main>
		<!--************************************
				Main End
		*************************************-->
		<?php include("footer.php") ?>
	</div>

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