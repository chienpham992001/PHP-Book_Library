<?php
include("header.php");
$sql_chitiet  = "SELECT book_id,book.image,book_name,nganh_name,author_name,descrip,cost,total_qty FROM category,book,author WHERE category.nganh_id = book.nganh_id AND book.author_id = author.author_id AND book.book_id = '$_GET[book_id]'  LIMIT 1";
$query_chitiet = mysqli_query($conn, $sql_chitiet);
$id = $_GET['book_id'];
$row = mysqli_fetch_array($query_chitiet);
// echo $row['nganh_name'];
$sql_fvr = "SELECT * FROM book,author,category WHERE book.author_id = author.author_id AND book.nganh_id = category.nganh_id AND nganh_name = '" . $row['nganh_name'] . "' AND book.book_id NOT IN ('$_GET[book_id]')";
$querry_fvr = mysqli_query($conn, $sql_fvr);

$sql_danhmuc = "SELECT * FROM category  ORDER BY nganh_id DESC";
$query_danhmuc = mysqli_query($conn, $sql_danhmuc);
?>

<!doctype html>
<html class="no-js" lang="zxx">


<body>
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
							<li class="tg-active"> <a href="products.php">Sách</a></li>
							<li class="tg-active"> <a href="#">Chi tiết sách</a></li>
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
						<div class="col-xs-12 col-sm-8 col-md-8 col-lg-9 pull-right">
							<div id="tg-content" class="tg-content" style="padding-bottom: 100px !important;">
								<div class="tg-productdetail">
									<div class="row">
										<?php
										?>
										<form action="themgiosach.php?sach_id=<?php echo $row['book_id'] ?>" method="POST">
											<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
												<div class="tg-postbook">
													<figure class="tg-featureimg"><img src="images\books\<?php echo $row['image'] ?>" alt="image description"></figure>
													<div class="tg-postbookcontent">
														<a class="tg-btn tg-btnstyletwo" href="javascript:void(0);">
															<button type="submit" class="themgiosach" name="themgiosach"><i class="fa fa-shopping-basket"></i>
																<em>Thêm vào giỏ</em></button>
														</a>
													</div>
												</div>
											</div>
										</form>

										<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
											<div class="tg-productcontent">

												<ul class="tg-bookscategories">
													<li><a href="javascript:void(0);"><?php echo $row['nganh_name'] ?></a></li>
												</ul>
												<div class="tg-booktitle">
													<h3><?php echo $row['book_name'] ?></h3>
												</div>
												<span class="tg-bookwriter">Tác giả : <a href="javascript:void(0);"><?php echo $row['author_name'] ?></a></span>
												<span class="tg-bookwriter">Giá cọc :  <?php echo number_format($row['cost']) ?> VNĐ</span>
												<span class="tg-bookwriter">Số lượng còn : <?php echo $row['total_qty'] ?></span>
												<span class="tg-stars"><span></span></span>
												<div class="tg-share">
													<span>Share:</span>
													<ul class="tg-socialicons">
														<li class="tg-facebook"><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
														<li class="tg-twitter"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
														<li class="tg-linkedin"><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
														<li class="tg-googleplus"><a href="javascript:void(0);"><i class="fa fa-google-plus"></i></a></li>
														<li class="tg-rss"><a href="javascript:void(0);"><i class="fa fa-rss"></i></a></li>
													</ul>
												</div>
												<div class="tg-description">

													<?php echo $row['descrip'] ?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<!-- <div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<div class="tg-sectionhead">
										<h2><span>Một số cuốn sách liên quan</span>Bạn có thể thích</h2>
									</div>
								</div>
								<div id="tg-pickedbyauthorslider" class="tg-pickedbyauthor tg-pickedbyauthorslider owl-carousel">
									<?php

									while ($row2 = mysqli_fetch_array($querry_fvr)) {
									?>
										<div class="item">
											<div class="tg-postbook" style=" padding: 0 0 20px;">
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
												</div>
											</div>
										</div>
									<?php
									}
									?>

								</div>
							</div> -->
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3 pull-left">
							<aside id="tg-sidebar" class="tg-sidebar">
								<div class="tg-widget tg-catagories">
										<div class="tg-widgettitle">
											<h3>Danh mục ngành đào tạo</h3>
										</div>
										<div class="tg-widgetcontent">
											<ul>
												<?php while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) { ?>
													<li><a href="products.php?main=book&id=<?php echo $row_danhmuc['nganh_id'] ?>"><?php echo $row_danhmuc['nganh_name'] ?> </a></li>
												<?php } ?>
											</ul>
										</div>
									</div>
								<?php include("tuongtac.php") ?>
							</aside>
						</div>
					</div>
				</div>
			</div>
		</div>
		<section class="tg-sectionspace tg-haslayout">
			<div class="container">

			</div>
		</section>
		<!--************************************
					News Grid End
			*************************************-->
	</main>
	<!--************************************
				Main End
		*************************************-->

	<?php include("footer.php") ?>
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