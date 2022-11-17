<?php
require 'config.php';

include("header.php");
//unset($_SESSION['dangnhap']);
$sql_fvr = "SELECT * FROM book,author WHERE book.author_id = author.author_id  AND 2<=(SELECT COUNT(*) FROM book_borrow WHERE book.book_id = book_borrow.book_id)";
$querry_fvr = mysqli_query($conn, $sql_fvr);
?>

<!doctype html>
<html class="no-js" lang="">

<body class="tg-home tg-homeone">
	<div id="tg-wrapper" class="tg-wrapper tg-haslayout">
		<!--************************************
				Inner Banner Start
		*************************************-->
		<div class="tg-innerbanner tg-haslayout tg-parallax tg-bginnerbanner" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="images/parallax/thuvien02.jpg">
		</div>
		<!--************************************
				Inner Banner End
		*************************************-->

		<!--************************************
					Best Selling Start
			*************************************-->
		<section class="tg-sectionspace tg-haslayout">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="tg-sectionhead">
							<h2>Sách Nổi bật</h2>
							<a class="tg-btn" href="products.php">Xem tất cả</a>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div id="tg-bestsellingbooksslider" class="tg-bestsellingbooksslider tg-bestsellingbooks owl-carousel">

							<?php
							$sql = "SELECT book.image,book_name,author_name,nganh_name,book_id,cost
							FROM author inner join book on book.author_id =author.author_id 
							inner join category on book.nganh_id = category.nganh_id ";

							$result = mysqli_query($conn, $sql);
							while ($row = mysqli_fetch_array($result)) {
							?>

								<div class="item">

									<form action="themgiosach.php?sach_id=<?php echo $row['book_id'] ?>" method="POST">
										<div class="tg-postbook">
											<figure class="tg-featureimg">
												<div class="tg-bookimg">
													<div class="tg-frontcover"><img src="images\books\<?php echo $row['image'] ?>" alt="image description"></div>
													<div class="tg-backcover"><img src="images\books\<?php echo $row['image'] ?>" alt="image description"></div>
												</div>

											</figure>
											<div class="tg-postbookcontent">
												<ul class="tg-bookscategories">
													<li><a href="javascript:void(0);"><?php echo $row['nganh_name'] ?></a></li>
												</ul>
												<div class="tg-booktitle">
													<h3><a href="productdetail.php?quanly=sach&book_id=<?php echo $row['book_id'] ?>"><?php echo $row['book_name'] ?> </a></h3>
												</div>
												<span class="tg-bookwriter">Tác giả : <a href="javascript:void(0);"> <?php echo $row['author_name'] ?></a></span>
												<span class="tg-bookwriter">Tiền cọc :  <?php echo number_format($row['cost']) ?> VNĐ</span>
												<span class="tg-stars"><span></span></span>

												<a class="tg-btn tg-btnstyletwo" href="javascript:void(0);">
													<button type="submit" class="themgiosach" name="themgiosach"><i class="fa fa-shopping-basket"></i>
														<em>Thêm vào giỏ</em></button>
												</a>
											</div>
										</div>
								</div>

								</form>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
	</div>
	</section>
	<!--************************************
					Best Selling End
			*************************************-->
	<!--************************************
					Featured Item Start
			*************************************-->
	<section class="tg-bglight tg-haslayout">
		<div class="container">
			<div class="row">
				<div class="tg-featureditm">
					<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 hidden-sm hidden-xs">
						<figure><img src="images/img-02.png" alt="image description"></figure>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
						<div class="tg-featureditmcontent">
							<div class="tg-booktitle">
								<h3><a href="javascript:void(0);">Hạt giống tâm hồn</a></h3>
							</div>
							<span class="tg-bookwriter">Tác giả : <a href="javascript:void(0);">Nhiều Tác Giả</a></span>
							<span class="tg-stars"><span></span></span>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
	</section>
	<!--************************************
					Featured Item End
			*************************************-->
	<?php include("new_book.php") ?>
	<section class="tg-sectionspace tg-haslayout">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="tg-sectionhead">
						<h2><span>Một số cuốn sách hay</span>Bạn đọc săn đón</h2>
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
					Collection Count Start
			*************************************-->
	<section class="tg-parallax tg-bgcollectioncount tg-haslayout" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="images/parallax/bgparallax-04.jpg">
		<div class="tg-sectionspace tg-collectioncount tg-haslayout">
			<div class="container">
				<div class="row">
					<div id="tg-collectioncounters" class="tg-collectioncounters">
						<?php 
							$querry_1 = mysqli_query($conn, "SELECT * FROM book ");
							$querry_2 = mysqli_query($conn, "SELECT * FROM author ");
							$querry_3 = mysqli_query($conn, "SELECT * FROM category ");
							$querry_4 = mysqli_query($conn,"SELECT * FROM user ");
							
						?>
						<div class="tg-collectioncounter tg-drama">
							<div class="tg-collectioncountericon">
								<i class="fa fa-book"></i>
							</div>
							<div class="tg-titlepluscounter">
								<h2>Sách - Tài liệu</h2>
								<h3 data-from="0" data-to="<?php echo mysqli_num_rows($querry_1) ?>" data-speed="1000" data-refresh-interval="50"><?php echo mysqli_num_rows($querry_1) ?></h3>
							</div>
						</div>
						<div class="tg-collectioncounter tg-horror">
							<div class="tg-collectioncountericon">
							<i class="fa fa-user"></i>
							</div>
							<div class="tg-titlepluscounter">
								<h2>Tác giả</h2>
								<h3 data-from="0" data-to="<?php echo mysqli_num_rows($querry_2) ?>" data-speed="1000" data-refresh-interval="50"><?php echo mysqli_num_rows($querry_2) ?></h3>
							</div>
						</div>
						<div class="tg-collectioncounter tg-romance">
							<div class="tg-collectioncountericon">
							<i class="fa fa-list"></i>
							</div>
							<div class="tg-titlepluscounter">
								<h2>Danh mục sách</h2>
								<h3 data-from="0" data-to="<?php echo mysqli_num_rows($querry_3) ?>" data-speed="1000" data-refresh-interval="50"><?php echo mysqli_num_rows($querry_3) ?></h3>
							</div>
						</div>
						<div class="tg-collectioncounter tg-fashion">
							<div class="tg-collectioncountericon">
							<i class="fa fa-user"></i>
							</div>
							<div class="tg-titlepluscounter">
								<h2>Bạn đọc</h2>
								<h3 data-from="0" data-to="<?php echo mysqli_num_rows($querry_4) ?>" data-speed="1000" data-refresh-interval="50"><?php echo mysqli_num_rows($querry_4) ?></h3>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--************************************
					Collection Count End
			*************************************-->
	<!--************************************
					Testimonials Start
			*************************************-->
	<section class="tg-parallax tg-bgtestimonials tg-haslayout" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="images/parallax/bgparallax-05.jpg">
		<div class="tg-sectionspace tg-haslayout">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-lg-push-2">
						<div id="tg-testimonialsslider" class="tg-testimonialsslider tg-testimonials owl-carousel">
							<div class="item tg-testimonial">
								<figure><img src="images/author/giamdoc.jpg" alt="image description"></figure>
								<blockquote><q>Giám đốc Đặng Quang Thạch đã cho thấy bức tranh toàn cảnh của Thư viện và nhấn mạnh sự đổi thay của Thư viện Trường ĐH Công nghiệp Hà Nội chuyển mình từ thư viện truyền thống sang thư viện hiện đại, ứng dụng các thành tựu của khoa học công nghệ mới, đặc biệt là công nghệ thông tin và truyền thông để phát huy vai trò là nơi cung cấp thông tin.</q></blockquote>
								<div class="tg-testimonialauthor">
									<h3>Ths. Đặng Quang Thạch</h3>
									<span>Giám đốc trung tâm</span>
								</div>
							</div>
							<div class="item tg-testimonial">
								<figure><img src="images/author/phogiamdoc.jpg" alt="image description"></figure>
								<blockquote><q>Phương pháp học tập là yếu tố then chốt để biến quá trình đào tạo thành quá trình tự đào tạo, trong đó thói quen đọc sách đóng một vai trò quan trọng. Để giúp các em hình thành được thói quen tự học thông qua việc đọc sách, nghiên cứu tài liệu là những lời phát biểu của ThS. Nguyễn Minh Tân – Phó Giám đốc Trung tâm về “Vai trò của đọc sách với hoạt động học tập và nghiên cứu của sinh viên”.</q></blockquote>
								<div class="tg-testimonialauthor">
									<h3>Ths. Nguyễn Minh Tân</h3>
									<span>Phó Giám đốc trung tâm</span>
								</div>
							</div>
							<div class="item tg-testimonial">
								<figure><img src="images/author/phogiamdoc2.jpg" alt="image description"></figure>
								<blockquote><q>Nhằm tăng cường tương tác, cũng như hỗ trợ sinh viên khai thác nguồn tài nguyên của Thư viện, Thư viện ĐH Công nghiệp Hà Nội đã thành lập các kênh truyền thông: Website, Zalo OA, Facebook và Youtube. Các kênh truyền thông của Thư viện đã được giới thiệu bởi TS. Ngô Đức Vĩnh - Phó Giám đốc trung tâm. TS. Ngô Đức Vĩnh nhấn mạnh sự đồng hành của Thư viện ĐH Công nghiệp Hà Nội với sinh viên trên con đường khám phá, chiếm lĩnh kiến thức.</q></blockquote>
								<div class="tg-testimonialauthor">
									<h3>TS.Ngô Đức Vĩnh</h3>
									<span>Phó Giám đốc trung tâm</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--************************************
					Testimonials End
			*************************************-->



	</main>
	<!--************************************
				Main End
		*************************************-->
	</div>

	<?php include("footer.php"); ?>
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