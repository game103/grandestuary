<?php

set_include_path($_SERVER['DOCUMENT_ROOT']  . "/" . "modules");
	
// Require modules
require_once( 'Constants.class.php');

$x = $_POST['x'];
$y = $_POST['y'];
$speed = $_POST['speed'];
$username = $_POST['username'];
$trimmedusername = trim($username);
$password = $_POST['password'];
$trimmedpassword= trim($password);

$connect = mysqli_connect(Constants::DB_HOST, Constants::DB_USER, Constants::DB_PASSWORD);
	mysqli_select_db($connect,"hallaby_housekey");

	$str = "SELECT * FROM variables WHERE username = '$trimmedusername' AND password='$trimmedpassword'";
	$query = mysqli_query($connect,$str);
	
	$insert = "UPDATE variables SET x='$x', y='$y', speed='$speed' WHERE username='$trimmedusername'";
	$insertquery = mysqli_query($connect,$insert);
	echo $x;
	echo $y;
	echo $trimmedusername;
	echo $trimmedpassword;
	mysqli_close($connect);
?>