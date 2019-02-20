<?php

set_include_path($_SERVER['DOCUMENT_ROOT']  . "/" . "modules");
	
// Require modules
require_once( 'Constants.class.php');

$power = $_POST['power'];
$ready = $_POST['ready'];
$username = $_POST['username'];
$trimmedusername = trim($username);
$password = $_POST['password'];
$trimmedpassword= trim($password);

$connect = mysqli_connect(Constants::DB_HOST, Constants::DB_USER, Constants::DB_PASSWORD);
	mysqli_select_db($connect,"housekey");

	$str = "SELECT * FROM variables WHERE username = '$trimmedusername'";
	$query = mysqli_query($connect,$str);
	
	$insert = "UPDATE variables SET power='$power', ready='$ready' WHERE username='$trimmedusername'";
	$insertquery = mysqli_query($connect,$insert);
	mysqli_close($connect);
?>