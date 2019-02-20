<?php

	set_include_path("/var/www/game103/modules");
		
	// Require modules
	require_once( 'Constants.class.php');

	$connect = mysqli_connect(Constants::DB_HOST, Constants::DB_USER, Constants::DB_PASSWORD);
	mysqli_select_db($connect,"hallaby_housekey");
	$insert = "UPDATE variables SET room='None'";
	$insertquery = mysqli_query($connect,$insert);
	mysqli_close($connect);
?>