<?php
if (isset($_GET['search']) && !empty($_GET['search'])) {
	$key = $_GET['search'];
	$sql_pro = "SELECT book_id, book.image,book_name,author_name,nganh_name 
    FROM author inner join book on book.author_id =author.author_id 
    inner join category on book.nganh_id = category.nganh_id
	WHERE UPPER(book.book_name) LIKE UPPER('%$key%') ";
} else {
	$sql_pro = "SELECT book.image,book_name,author_name,nganh_name 
							FROM author inner join book on book.author_id =author.author_id 
							inner join category on book.nganh_id = category.nganh_id ";
}

$query_tk =  mysqli_query($conn, $sql_pro);
?>

<div class="col-xs-12 col-sm-8 col-md-8 col-lg-9 pull-right">
	<div id="tg-content" class="tg-content">
		<div class="tg-products">
			<div class="tg-sectionhead">
				<h2>Từ khóa tìm kiếm : <?php if (isset($_GET['search'])) echo $_GET['search'] ?> </h2>
			</div>

			<div class="tg-productgrid">

				<?php
				while ($row = mysqli_fetch_array($query_tk)) {
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
										<li><a href="javascript:void(0);"><?php echo $row['nganh_name'] ?></a></li>
									</ul>
									<div class="tg-booktitle">
									<h3><a href="productdetail.php?quanly=sach&book_id=<?php echo $row['book_id'] ?>"><?php echo $row['book_name'] ?> </a></h3>
									</div>
									<span class="tg-bookwriter">Tác giả : <a href="javascript:void(0);"> <?php echo $row['author_name'] ?></a></span>
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