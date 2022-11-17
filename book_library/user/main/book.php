<?php
if (!isset($_GET['id'])) {
	$sql_pro = "SELECT book.image,book_name,author_name,nganh_name,book_id,cost
							FROM author inner join book on book.author_id =author.author_id 
							inner join category on book.nganh_id = category.nganh_id ";
} else {
	$sql_pro  = "SELECT book.image, book_name,nganh_name,author_name,book_id,cost FROM category,book,author WHERE category.nganh_id = book.nganh_id AND book.author_id = author.author_id AND book.nganh_id = '$_GET[id]' ORDER BY book.nganh_id DESC";


	$a = mysqli_query($conn, $sql_pro);

	$row_title = mysqli_fetch_array($a);
}

$query_pro = mysqli_query($conn, $sql_pro);
?>

<div class="col-xs-12 col-sm-8 col-md-8 col-lg-9 pull-right">
	<div id="tg-content" class="tg-content">
		<div class="tg-products">
			<div class="tg-sectionhead">
				<h2><span>Tất cả sách</span>
					<?php
					if (isset($_GET['id'])) {

						echo $row_title['nganh_name'];
						$sql_count = " SELECT COUNT(*)FROM book WHERE book.nganh_id = '$_GET[id]'";
					}
					?>
				</h2>
			</div>

			<div class="tg-productgrid">
				<?php
				while ($row = mysqli_fetch_array($query_pro)) {
				?>
					<div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
						<div class="tg-postbook">
							<form action="themgiosach.php?sach_id=<?php echo $row['book_id'] ?>" method="POST">
								<figure class="tg-featureimg">
									<div class="tg-bookimg">
										<div class="tg-frontcover"><img src="images\books\<?php echo $row['image'] ?>" alt="image description"></div>
										<div class="tg-backcover"><img src="images\books\<?php echo $row['image'] ?>" alt="image description"></div>
									</div>

								</figure>
								<div class="tg-postbookcontent">
									<ul class="tg-bookscategories">
										<li><a href="#"><?php echo $row['nganh_name'] ?></a></li>
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
							</form>
						</div>
					</div>
				<?php } ?>

			</div>
		</div>
	</div>
</div>