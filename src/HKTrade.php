<?php

	set_include_path($_SERVER['DOCUMENT_ROOT']  . "/" . "modules");
		
	// Require modules
	require_once( 'Constants.class.php');

	$tradewithut = $_POST['tradewith'];
	$tradewith = trim($tradewithut);
	$tradeitem = $_POST['tradeitem'];
	
	$connect = mysqli_connect(Constants::DB_HOST, Constants::DB_USER, Constants::DB_PASSWORD);
	mysqli_select_db($connect,"hallaby_housekey");

	$str = "SELECT * FROM variables WHERE username = '$tradewith'";
	$query = mysqli_query($connect,$str);
	
	$num = mysqli_num_rows($query);
	if($num == 0) {
	$work = "fail";
	}
	else {
	while($rows = mysqli_fetch_array($query)):

		$parcel = $rows['parcel'];
		
	endwhile;	
		
	if($parcel == "None" OR $tradeitem == "None") {
	$insert = "UPDATE variables SET parcel='$tradeitem' WHERE username='$tradewith'";
	$insertquery = mysqli_query($connect,$insert);
	$work = "success";
	}
	else {
	$work = "fail";
	}
	}
	mysqli_close($connect);
	echo "&work=$work";
?>