<?php

	set_include_path($_SERVER['DOCUMENT_ROOT']  . "/" . "modules");
		
	// Require modules
	require_once( 'Constants.class.php');

	$playwith = $_POST['playwith'];

	$connect = mysqli_connect(Constants::DB_HOST, Constants::DB_USER, Constants::DB_PASSWORD);
	mysqli_select_db($connect,"hallaby_housekey");

	$str = "SELECT * FROM variables WHERE username = '$playwith'";
	$query = mysqli_query($connect,$str);
	
	$num = mysqli_num_rows($query);
	
	while($rows = mysqli_fetch_array($query)):

		$power = $rows['power'];
		$ready = $rows['ready'];

	endwhile;
	
	echo "&power=$power&ready=$ready";
	mysqli_close($connect);
?>