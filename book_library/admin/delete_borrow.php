<?php
include_once('config.php');
if(isset($_REQUEST['id']) and $_REQUEST['id']!=""){
	$id=$_GET['id'];
	$sql = "DELETE FROM book_borrow WHERE borrow_id='$id'";
	if (mysqli_query($conn,$sql)) {
		header("location: manage_accept.php");
}
}
?>