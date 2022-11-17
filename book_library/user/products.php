<?php
require 'config.php';
include("header.php");
$sql_danhmuc = "SELECT * FROM category  ORDER BY nganh_id DESC";
$query_danhmuc = mysqli_query($conn, $sql_danhmuc);
?>

<!doctype html>

<html class="no-js" lang="">
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
								<li class="tg-active"> <a href="products.php">Sách</a></li>
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

							<!-- Sách -->

							<?php if (isset($_GET['search'])) include("timkiem.php");
							else include("main/book.php");
							?>

							<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3 pull-left">
								<aside id="tg-sidebar" class="tg-sidebar">

									<div class="tg-widget tg-widgetsearch">
										<form action="products.php?quanly=timkiem" class="tg-formtheme tg-formsearch " method="GET">
											<div class="form-group">

												<input type="text" name="search" class="form-group" placeholder="Tìm kiếm sách..." >
												<button type="submit"><i class="icon-magnifier"></i></button>
											</div>
										</form>
									</div>

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

									<?php include("tuongtac.php")?>
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