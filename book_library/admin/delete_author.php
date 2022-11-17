
<?php
include_once('config.php');
if(isset($_REQUEST['id']) and $_REQUEST['id']!=""){
	$id=$_GET['id'];
	$sql = "DELETE FROM author WHERE author_id='$id'";
	if (mysqli_query($conn,$sql)) {
		header("location: manage_author.php");
}
}
?>