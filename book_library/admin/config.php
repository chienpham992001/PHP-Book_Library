<?php 
	$servername = "localhost";
	$username = "root";
	$password = "";
	$mdb = "dtblibrary";

	$conn = mysqli_connect($servername, $username, $password, $mdb);

	if(!$conn){
		die("Lỗi kết nối: ".mysqli_connect_error());
	}

 ?>