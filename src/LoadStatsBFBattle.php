<?php

	set_include_path($_SERVER['DOCUMENT_ROOT']  . "/" . "modules");
		
	// Require modules
	require_once( 'Constants.class.php');

	$battlewith = $_POST['battlewith'];

	$connect = mysqli_connect(Constants::DB_HOST, Constants::DB_USER, Constants::DB_PASSWORD);
	mysqli_select_db($connect,"hallaby_housekey");

	$str = "SELECT * FROM variables WHERE username = '$battlewith'";
	$query = mysqli_query($connect,$str);
	
	$num = mysqli_num_rows($query);
	
	while($rows = mysqli_fetch_array($query)):

		$enemyattack = $rows['attack'];
		$enemydefense = $rows['defense'];
		$enemyhealth = $rows['health'];

	endwhile;
	
	echo "&enemyattack=$enemyattack&enemydefense=$enemydefense&enemyhealth=$enemyhealth";
	mysqli_close($connect);
?>