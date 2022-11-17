<?php
$sql = "SELECT book_id, book.image,book_name,author_name,nganh_name,book_id,cost
FROM author inner join book on book.author_id =author.author_id 
inner join category on book.nganh_id = category.nganh_id ";

$result = mysqli_query($conn, $sql);
?>

<!--************************************
					New Release Start
			*************************************-->
            <section class="tg-sectionspace tg-haslayout">
		<div class="container">
			<div class="row">
				<div class="tg-newrelease">
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<div class="tg-sectionhead">
							<h2>Sách mới nhất</h2>
						</div>
						<div class="tg-description">
							<p>Sách có lẽ là một trong những phát minh quan trọng và vĩ đại nhất của con người. Mỗi cuốn sách là kết tinh từ tri thức và cuộc sống, đọc sách không chỉ là một sở thích mà còn là con đường ngắn nhất để tiếp cận với nền văn minh của nhân loại. Ngày nay, với sự phát triển của những phương tiện điện tử, sách trở nên mờ nhạt trong cuộc sống của mọi người, không còn nhiều người hiểu được giá trị to lớn mà mộ quyển sách có thể mang lại, đó thực sự là một điều đáng buồn. Sau đây là những câu nói nói về giá trị của sách để ta khẳng định sách cần được trở về với đúng vai trò của nó, chứ không đơn thuần chỉ để giải trí

								.</p>
						</div>
						<div class="tg-btns">
							<a class="tg-btn tg-active" href="products.php">Xem tất cả</a>
							<a  class="tg-btn" href="productdetail.php?quanly=sach&book_id=3 ?>">Đọc thêm</a>
							<a href="javascript:void(0);"></a>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<div class="row">
							<div class="tg-newreleasebooks">
							<?php
							
							while ($row = mysqli_fetch_array($result)) {
								if($row['book_id']>2 && $row['book_id']<7){
							?>
								<div class="col-xs-4 col-sm-4 col-md-6 col-lg-4">
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
											<span class="tg-bookwriter">Tác giả : <a href="javascript:void(0);"><?php echo $row['author_name'] ?></a></span>
											<span class="tg-bookwriter">Tiền cọc :  <?php echo number_format($row['cost']) ?> VNĐ</span>
											<span class="tg-stars"><span></span></span>
											<a class="tg-btn tg-btnstyletwo" href="javascript:void(0);">
												<button type="submit" class="themgiosach" name="themgiosach"><i class="fa fa-shopping-basket"></i>
													<em>Thêm vào giỏ</em></button>
											</a>
										</div>
									</div>
								</form>
								</div>
								<?php } } ?>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--************************************
					New Release End
			*************************************-->