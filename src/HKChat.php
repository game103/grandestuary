<?php

	set_include_path($_SERVER['DOCUMENT_ROOT']  . "/" . "modules");
		
	// Require modules
	require_once( 'Constants.class.php');

	$message=$_POST['message'];
	$notagsmessage = strip_tags($message);
	$username = $_POST['username'];
	$trimmedusername = trim($username);
	$password = $_POST['password'];
	$trimmedpassword= trim($password);
	

$connect = mysqli_connect(Constants::DB_HOST, Constants::DB_USER, Constants::DB_PASSWORD);
	mysqli_select_db($connect,"hallaby_housekey");

	$str = "SELECT * FROM variables WHERE username = '$trimmedusername' AND password='$trimmedpassword'";
	$query = mysqli_query($connect,$str);
	
	$insert = "UPDATE variables SET message='$notagsmessage' WHERE username='$trimmedusername'";
	$insertquery = mysqli_query($connect,$insert);
	echo $message;
	mysqli_close($connect);
?>