<html>
<body>

<form action = "resetuser.php"  method = "post">
<input type = "text" name = "username">
<input type = "submit">

<?php

	set_include_path($_SERVER['DOCUMENT_ROOT']  . "/" . "modules");
		
	// Require modules
	require_once( 'Constants.class.php');

	$user = $_POST['username'];
	$connect = mysqli_connect(Constants::DB_HOST, Constants::DB_USER, Constants::DB_PASSWORD);
	mysqli_select_db($connect,"hallaby_housekey");

	$str = "SELECT * FROM variables WHERE username = '$user'";
	$query = mysqli_query($connect,$str);
	
	$insert = "UPDATE variables SET room='None' WHERE username='$user'";
	$insertquery = mysqli_query($connect,$insert);
	mysqli_close($connect);

?>

</body>
</html>