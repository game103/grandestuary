<?php

set_include_path($_SERVER['DOCUMENT_ROOT']  . "/" . "modules");
	
// Require modules
require_once( 'Constants.class.php');

$battlewith = $_POST['battlewith'];
$username = $_POST['username'];
$trimmedusername = trim($username);

$connect = mysqli_connect(Constants::DB_HOST, Constants::DB_USER, Constants::DB_PASSWORD);
	mysqli_select_db($connect,"hallaby_housekey");

	$str = "SELECT * FROM variables WHERE username = '$trimmedusername'";
	$query = mysqli_query($connect,$str);
	
	$insert = "UPDATE variables SET battlewith='$battlewith' WHERE username='$trimmedusername'";
	$insertquery = mysqli_query($connect,$insert);
	mysqli_close($connect);
?>