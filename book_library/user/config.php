<?php
$server   = "localhost";   // Khai báo server
$username = "root"; // Khai báo username
$password = "";      // Khai báo password
$dbname   = "dtblibrary";      // Khai báo database

$conn = mysqli_connect($server, $username, $password, $dbname);

if($conn->connect_error){
    die("Connect fail". $conn->connect_error);
}
?>