<?php
    $sql_danhmuc = "SELECT * FROM category  ORDER BY nganh_id DESC";
    $query_danhmuc = mysqli_query($conn,$sql_danhmuc);
?>

<div class="tg-widget tg-catagories">
    <div class="tg-widgettitle">
        <h3>Categories</h3>
    </div>
    <div class="tg-widgetcontent">
        <ul>
            <?php while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){ ?>
            <li><a href="products.php?main=book&id = <?php echo $row_danhmuc['nganh_id'] ?>"><?php echo $row_danhmuc['nganh_name'] ?> </a></li>
            <?php } ?>
        </ul>
    </div>
</div>

