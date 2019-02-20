<?php

	set_include_path($_SERVER['DOCUMENT_ROOT']  . "/" . "modules");
		
	// Require modules
	require_once( 'Constants.class.php');

	$playwith = $_POST['playwith'];
	$trimmedplaywith = trim($playwith);
	$playwith2 = $_POST['playwith2'];
	$trimmedplaywith2 = trim($playwith2);
	$connect = mysqli_connect(Constants::DB_HOST, Constants::DB_USER, Constants::DB_PASSWORD);
	mysqli_select_db($connect,"hallaby_housekey");

	$str = "SELECT * FROM variables WHERE username = '$trimmedplaywith'";
	$query = mysqli_query($connect,$str);
	
	$num = mysqli_num_rows($query);
	
	while($rows = mysqli_fetch_array($query)):

		$headequipped=$rows['headequipped'];
		$bodyequipped=$rows['bodyequipped'];
		$lefthandequipped=$rows['lefthandequipped'];
		$righthandequipped=$rows['righthandequipped'];
		$legsequipped=$rows['legsequipped'];
		$leftfootequipped=$rows['leftfootequipped'];
		$rightfootequipped=$rows['rightfootequipped'];

	endwhile;
	
	$str2 = "SELECT * FROM variables WHERE username = '$trimmedplaywith2'";
	$query2 = mysqli_query($connect,$str2);
	
	$num2 = mysqli_num_rows($query2);
	
	while($rows2 = mysqli_fetch_array($query2)):

		$headequipped2=$rows2['headequipped'];
		$bodyequipped2=$rows2['bodyequipped'];
		$lefthandequipped2=$rows2['lefthandequipped'];
		$righthandequipped2=$rows2['righthandequipped'];
		$legsequipped2=$rows2['legsequipped'];
		$leftfootequipped2=$rows2['leftfootequipped'];
		$rightfootequipped2=$rows2['rightfootequipped'];

	endwhile;
	
	
	echo "&headequipped=$headequipped&bodyequipped=$bodyequipped&lefthandequipped=$lefthandequipped&righthandequipped=$righthandequipped&legsequipped=$legsequipped&leftfootequipped=$leftfootequipped&rightfootequipped=$rightfootequipped&headequipped2=$headequipped2&bodyequipped2=$bodyequipped2&lefthandequipped2=$lefthandequipped2&righthandequipped2=$righthandequipped2&legsequipped2=$legsequipped2&leftfootequipped2=$leftfootequipped2&rightfootequipped2=$rightfootequipped2";
	mysqli_close($connect);
?>