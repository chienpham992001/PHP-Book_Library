<?php
include_once('config.php');
if(isset($_REQUEST['id']) and $_REQUEST['id']!=""){
	$id=$_GET['id'];
	//$query = "DELETE FROM book JOIN category WHERE book.nganh_id = category.nganh_id";
	$sql = "DELETE FROM category WHERE nganh_id='$id'";
	if (mysqli_query($conn,$sql)) {
		header("location: manage_category.php");
}
}
?>